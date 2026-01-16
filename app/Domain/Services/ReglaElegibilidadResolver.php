<?php

namespace App\Domain\Services;

use App\Models\TipoDeCertificacion;
use App\Models\Persona;
use App\Models\Proyecto;
use App\Models\Evento;
use App\Models\AreaPersona;
use App\Models\AreaPersonaCargo;
use App\Models\AreaPersonaValorDestacado;
use App\Models\EntidadAliadaPersona;
use App\Models\GrupoDeCertificacion;
use Illuminate\Support\Collection;

/**
 * Servicio de Dominio: ReglaElegibilidadResolver
 * 
 * Responsabilidad: Resolver las reglas de elegibilidad específicas por tipo de certificación
 * según las 16 reglas documentadas del dominio.
 * 
 * Este servicio implementa EXACTAMENTE las reglas de negocio especificadas,
 * sin inferencias ni simplificaciones.
 * 
 * @package App\Domain\Services
 */
class ReglaElegibilidadResolver
{
    /**
     * Resuelve las personas elegibles según el tipo de certificación y contexto.
     * 
     * @param TipoDeCertificacion $tipoCertificacion
     * @param array $contexto Puede contener: proyecto_id, evento_id, anio, periodo
     * @return Collection<Persona> Colección de personas elegibles
     */
    public function resolverPersonasElegibles(TipoDeCertificacion $tipoCertificacion, array $contexto = []): Collection
    {
        $nombreTipo = $tipoCertificacion->nombre;
        
        return match($nombreTipo) {
            'Certificado de Egresado' => $this->regla1_Egresado(),
            'Certificado de Retiro Voluntario' => $this->regla2_RetiroVoluntario(),
            'Certificado de Directiva' => $this->regla3_Directiva(),
            'Certificado de Director de Proyecto' => $this->regla4_DirectorProyecto(),
            'Certificado de Co-Director de Proyecto' => $this->regla5_CoDirectorProyecto(),
            'Certificado de Coordinadores de Proyecto' => $this->regla6_CoordinadoresProyecto($contexto),
            'Certificado de Miembros Internos del Proyecto' => $this->regla7_MiembrosInternosProyecto($contexto),
            'Certificado de Staff Interno de Apoyo de Proyecto' => $this->regla8_StaffInternoProyecto($contexto),
            'Certificado de Miembros Externos del Proyecto' => $this->regla9_MiembrosExternosProyecto($contexto),
            'Certificado de Staff Externo de Apoyo de Proyecto' => $this->regla10_StaffExternoProyecto($contexto),
            'Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT' => $this->regla11_PonenteEventosGenerales(),
            'Certificado de Participación en Evento General de SEDIPRO UNT' => $this->regla12_ParticipacionEventoGeneral($contexto),
            'Certificado de Participación como Ponente para Proyecto' => $this->regla13_PonenteParaProyecto(),
            'Certificado de Participación en Evento de Proyecto' => $this->regla14_ParticipacionEventoProyecto($contexto),
            'Certificado de Participación en Ejecución de Proyecto' => $this->regla15_ParticipacionEjecucionProyecto($contexto),
            'Certificado de Valores Destacados' => $this->regla16_ValoresDestacados($contexto),
            default => collect([]),
        };
    }
    
    /**
     * Regla 1: Certificado de Egresado
     * Mostrar como personas elegibles a todos los miembros de Sedipro UNT (tabla: area_persona) 
     * con estado 'Miembro activo'.
     */
    private function regla1_Egresado(): Collection
    {
        return Persona::whereHas('areaPersonas', function ($q) {
            $q->where('estado', 'Miembro activo');
        })->get();
    }
    
    /**
     * Regla 2: Certificado de Retiro Voluntario
     * Mostrar como personas elegibles a todos los miembros de Sedipro UNT (tabla: area_persona) 
     * con estado 'Miembro activo'.
     */
    private function regla2_RetiroVoluntario(): Collection
    {
        return Persona::whereHas('areaPersonas', function ($q) {
            $q->where('estado', 'Miembro activo');
        })->get();
    }
    
    /**
     * Regla 3: Certificado de Directiva
     * Mostrar como personas elegibles a todos los miembros de Sedipro (tabla: area_persona) 
     * que actualmente ocupan los cargos de 'Presidente SEDIPRO UNT', 'Vicepresidente SEDIPRO UNT' 
     * y cualquier otro cargo que inicie con 'Director de ' y termine con 'SEDIPRO UNT' 
     * y que tienen el estado en 'Cargo activo' en la tabla 'area_persona_cargo'.
     */
    private function regla3_Directiva(): Collection
    {
        $cargosDirectiva = ['Presidente SEDIPRO UNT', 'Vicepresidente SEDIPRO UNT'];
        
        // Buscar cargos de directiva específicos
        $cargosIds = \App\Models\Cargo::whereIn('nombre', $cargosDirectiva)
            ->pluck('id');
        
        // Buscar cargos que inicien con 'Director de ' y terminen con 'SEDIPRO UNT'
        $cargosDirectores = \App\Models\Cargo::where('nombre', 'like', 'Director de %')
            ->where('nombre', 'like', '%SEDIPRO UNT')
            ->pluck('id');
        
        $cargos = $cargosIds->merge($cargosDirectores)->unique();
        
        if ($cargos->isEmpty()) {
            return collect([]);
        }
        
        return Persona::whereHas('areaPersonas.areaPersonaCargos', function ($q) use ($cargos) {
            $q->whereIn('cargo_id', $cargos)
              ->where('estado', 'Cargo activo')
              ->whereNull('proyecto_id'); // Cargos de directiva no tienen proyecto_id
        })->get();
    }
    
    /**
     * Regla 4: Certificado de Director de Proyecto
     * Obtener todos los proyectos existentes que NO están vinculados a algún grupo de certificación 
     * validado que esté asociado a este tipo de certificación. 
     * Y finalmente mostrar como personas elegibles a los DPs de esos proyectos obtenidos previamente.
     */
    private function regla4_DirectorProyecto(): Collection
    {
        // Obtener proyectos no vinculados a grupos validados de este tipo
        $proyectosDisponibles = $this->obtenerProyectosDisponibles('Certificado de Director de Proyecto');
        
        // Obtener DPs de esos proyectos
        $cargoDP = \App\Models\Cargo::where('nombre', 'Director de Proyecto')->first();
        if (!$cargoDP) {
            return collect([]);
        }
        
        return Persona::whereHas('areaPersonas.areaPersonaCargos', function ($q) use ($proyectosDisponibles, $cargoDP) {
            $q->where('cargo_id', $cargoDP->id)
              ->whereIn('proyecto_id', $proyectosDisponibles->pluck('id'))
              ->where('estado', 'Cargo activo');
        })->get();
    }
    
    /**
     * Regla 5: Certificado de Co-Director de Proyecto
     * Obtener todos los proyectos existentes que NO están vinculados a algún grupo de certificación 
     * validado que esté asociado a este tipo de certificación. 
     * Y finalmente mostrar como personas elegibles a los CODPs de esos proyectos obtenidos previamente.
     */
    private function regla5_CoDirectorProyecto(): Collection
    {
        $proyectosDisponibles = $this->obtenerProyectosDisponibles('Certificado de Co-Director de Proyecto');
        
        $cargoCODP = \App\Models\Cargo::where('nombre', 'Codirector de Proyecto')->first();
        if (!$cargoCODP) {
            return collect([]);
        }
        
        return Persona::whereHas('areaPersonas.areaPersonaCargos', function ($q) use ($proyectosDisponibles, $cargoCODP) {
            $q->where('cargo_id', $cargoCODP->id)
              ->whereIn('proyecto_id', $proyectosDisponibles->pluck('id'))
              ->where('estado', 'Cargo activo');
        })->get();
    }
    
    /**
     * Regla 6: Certificado de Coordinadores de Proyecto
     * Seleccionar el proyecto de la lista desplegable de proyectos, este campo de selección de proyecto 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y solo mostrará todos los 
     * proyectos existentes que NO están vinculados a algún grupo de certificación validado que esté 
     * asociado a este tipo de certificación. 
     * Mostrar como personas elegibles a todos los miembros de sedipro que ocupan el cargo de 
     * 'Coordinador de proyecto' y que a su vez están asociados al proyecto seleccionado previamente 
     * y que también tienen el campo estado en 'Cargo activo' de la tabla 'area_persona_cargo'.
     */
    private function regla6_CoordinadoresProyecto(array $contexto): Collection
    {
        if (!isset($contexto['proyecto_id'])) {
            return collect([]);
        }
        
        $cargoCoordinador = \App\Models\Cargo::where('nombre', 'Coordinador de Proyecto')->first();
        if (!$cargoCoordinador) {
            return collect([]);
        }
        
        return Persona::whereHas('areaPersonas.areaPersonaCargos', function ($q) use ($contexto, $cargoCoordinador) {
            $q->where('cargo_id', $cargoCoordinador->id)
              ->where('proyecto_id', $contexto['proyecto_id'])
              ->where('estado', 'Cargo activo');
        })->get();
    }
    
    /**
     * Regla 7: Certificado de Miembros Internos del Proyecto
     * Seleccionar el proyecto de la lista desplegable de proyectos, este campo de selección de proyecto 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y solo mostrará todos los 
     * proyectos existentes que NO están vinculados a algún grupo de certificación validado que esté 
     * asociado a este tipo de certificación. 
     * Mostrar como personas elegibles a todos los miembros de sedipro que están vinculado al proyecto 
     * seleccionado previamente y ocupan el rol de 'Miembro' en la tabla 'area_persona_proyecto'.
     */
    private function regla7_MiembrosInternosProyecto(array $contexto): Collection
    {
        if (!isset($contexto['proyecto_id'])) {
            return collect([]);
        }
        
        return Persona::whereHas('areaPersonas.proyectos', function ($q) use ($contexto) {
            $q->where('proyectos.id', $contexto['proyecto_id'])
              ->where('area_persona_proyecto.rol', 'Miembro');
        })->get();
    }
    
    /**
     * Regla 8: Certificado de Staff Interno de Apoyo de Proyecto
     * Seleccionar el proyecto de la lista desplegable de proyectos, este campo de selección de proyecto 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y solo mostrará todos los 
     * proyectos existentes que NO están vinculados a algún grupo de certificación validado que esté 
     * asociado a este tipo de certificación. 
     * Mostrar como personas elegibles a todos los miembros de sedipro que están vinculado al proyecto 
     * seleccionado previamente y ocupan el rol de 'Staff de apoyo' en la tabla 'area_persona_proyecto'.
     */
    private function regla8_StaffInternoProyecto(array $contexto): Collection
    {
        if (!isset($contexto['proyecto_id'])) {
            return collect([]);
        }
        
        return Persona::whereHas('areaPersonas.proyectos', function ($q) use ($contexto) {
            $q->where('proyectos.id', $contexto['proyecto_id'])
              ->where('area_persona_proyecto.rol', 'Staff de apoyo');
        })->get();
    }
    
    /**
     * Regla 9: Certificado de Miembros Externos del Proyecto
     * Seleccionar el proyecto de la lista desplegable de proyectos, este campo de selección de proyecto 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y solo mostrará todos los 
     * proyectos existentes que NO están vinculados a algún grupo de certificación validado que esté 
     * asociado a este tipo de certificación. 
     * Mostrar como personas elegibles a todos los miembros de cualquier entidad aliada que están vinculado 
     * al proyecto seleccionado previamente y ocupan el rol de 'Miembro externo' en la tabla 
     * 'entidad_aliada_persona_proyecto'.
     */
    private function regla9_MiembrosExternosProyecto(array $contexto): Collection
    {
        if (!isset($contexto['proyecto_id'])) {
            return collect([]);
        }
        
        // Obtener EntidadAliadaPersona vinculadas al proyecto con rol 'Miembro externo'
        $entidadAliadaPersonaIds = \App\Models\EntidadAliadaPersona::whereHas('proyectos', function ($q) use ($contexto) {
            $q->where('proyectos.id', $contexto['proyecto_id'])
              ->where('entidad_aliada_persona_proyecto.rol', 'Miembro externo');
        })->pluck('persona_id');
        
        return Persona::whereIn('id', $entidadAliadaPersonaIds)->get();
    }
    
    /**
     * Regla 10: Certificado de Staff Externo de Apoyo de Proyecto
     * Seleccionar el proyecto de la lista desplegable de proyectos, este campo de selección de proyecto 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y solo mostrará todos los 
     * proyectos existentes que NO están vinculados a algún grupo de certificación validado que esté 
     * asociado a este tipo de certificación. 
     * Mostrar como personas elegibles a todos los miembros de cualquier entidad aliada que están vinculado 
     * al proyecto seleccionado previamente y ocupan el rol de 'Staff de apoyo' en la tabla 
     * 'entidad_aliada_persona_proyecto'.
     */
    private function regla10_StaffExternoProyecto(array $contexto): Collection
    {
        if (!isset($contexto['proyecto_id'])) {
            return collect([]);
        }
        
        // Obtener EntidadAliadaPersona vinculadas al proyecto con rol 'Staff de apoyo'
        $entidadAliadaPersonaIds = \App\Models\EntidadAliadaPersona::whereHas('proyectos', function ($q) use ($contexto) {
            $q->where('proyectos.id', $contexto['proyecto_id'])
              ->where('entidad_aliada_persona_proyecto.rol', 'Staff de apoyo');
        })->pluck('persona_id');
        
        return Persona::whereIn('id', $entidadAliadaPersonaIds)->get();
    }
    
    /**
     * Regla 11: Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT
     * Obtener todos los eventos existentes que NO están vinculados a algún grupo de certificación 
     * validado que esté asociado a este tipo de certificación. 
     * Y finalmente mostrar como personas elegibles a todas las personas asociadas a esos eventos obtenidos 
     * previamente pero aquellas que tienen únicamente el rol de 'Ponente' en la tabla 'evento_persona'.
     */
    private function regla11_PonenteEventosGenerales(): Collection
    {
        $eventosDisponibles = $this->obtenerEventosDisponibles('Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT');
        
        return Persona::whereHas('eventos', function ($q) use ($eventosDisponibles) {
            $q->whereIn('eventos.id', $eventosDisponibles->pluck('id'))
              ->where('evento_persona.rol', 'Ponente');
        })->get();
    }
    
    /**
     * Regla 12: Certificado de Participación en Evento General de SEDIPRO UNT
     * Seleccionar el evento de la lista desplegable de eventos, este campo de selección de evento 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y solo mostrará todos los 
     * eventos existentes con campo 'proyecto_id=NULL' que NO están vinculados a algún grupo de certificación 
     * validado que esté asociado a este tipo de certificación. 
     * Mostrar como personas elegibles a todos las personas que están vinculadas al evento seleccionado 
     * previamente y ocupan el rol de 'Participante' en la tabla 'evento_persona'.
     */
    private function regla12_ParticipacionEventoGeneral(array $contexto): Collection
    {
        if (!isset($contexto['evento_id'])) {
            return collect([]);
        }
        
        return Persona::whereHas('eventos', function ($q) use ($contexto) {
            $q->where('eventos.id', $contexto['evento_id'])
              ->where('evento_persona.rol', 'Participante');
        })->get();
    }
    
    /**
     * Regla 13: Certificado de Participación como Ponente para Proyecto
     * Obtener todos los proyectos existentes (con al menos 1 evento asociado con campo 'tipo' diferente 
     * de 'Ejecución de proyecto') que NO están vinculados a algún grupo de certificación validado que 
     * esté asociado a este tipo de certificación. 
     * Y finalmente mostrar como personas elegibles a todas las personas asociadas a esos proyecto 
     * (mediante los eventos del estos proyecto, pero solo los eventos con 'tipo' diferente de 'Ejecución' 
     * de proyecto) obtenidos previamente pero aquellas que tienen únicamente el rol de 'Ponente' en la 
     * tabla 'evento_persona'.
     */
    private function regla13_PonenteParaProyecto(): Collection
    {
        $proyectosDisponibles = $this->obtenerProyectosDisponibles('Certificado de Participación como Ponente para Proyecto');
        
        // Filtrar proyectos que tienen al menos un evento con tipo diferente de 'Ejecución de proyecto'
        $proyectosConEventos = $proyectosDisponibles->filter(function ($proyecto) {
            return $proyecto->eventos()
                ->where('tipo', '!=', 'Ejecución de proyecto')
                ->exists();
        });
        
        // Obtener eventos de esos proyectos (excluyendo 'Ejecución de proyecto')
        $eventosIds = Evento::whereIn('proyecto_id', $proyectosConEventos->pluck('id'))
            ->where('tipo', '!=', 'Ejecución de proyecto')
            ->pluck('id');
        
        return Persona::whereHas('eventos', function ($q) use ($eventosIds) {
            $q->whereIn('eventos.id', $eventosIds)
              ->where('evento_persona.rol', 'Ponente');
        })->get();
    }
    
    /**
     * Regla 14: Certificado de Participación en Evento de Proyecto
     * Seleccionar el proyecto de la lista desplegable de proyectos, este campo de selección de proyecto 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y después de seleccionar el 
     * proyecto el desplegable de eventos solo mostrará todos los eventos existentes con campo 'proyecto_id' 
     * igual al ID del proyecto previamente seleccionado. 
     * Mostrar como personas elegibles a todos las personas que están vinculadas al evento del proyecto 
     * seleccionado y que ocupan el rol de 'Participante' en la tabla 'evento_persona'.
     */
    private function regla14_ParticipacionEventoProyecto(array $contexto): Collection
    {
        if (!isset($contexto['proyecto_id']) || !isset($contexto['evento_id'])) {
            return collect([]);
        }
        
        return Persona::whereHas('eventos', function ($q) use ($contexto) {
            $q->where('eventos.id', $contexto['evento_id'])
              ->where('eventos.proyecto_id', $contexto['proyecto_id'])
              ->where('evento_persona.rol', 'Participante');
        })->get();
    }
    
    /**
     * Regla 15: Certificado de Participación en Ejecución de Proyecto
     * Seleccionar el proyecto de la lista desplegable de proyectos, este campo de selección de proyecto 
     * aparecerá dinámicamente en caso seleccione este tipo de certificación y solo mostrará todos los 
     * proyectos existentes que NO están vinculados a algún grupo de certificación validado que esté 
     * asociado a este tipo de certificación. 
     * Mostrar como personas elegibles a todos las personas que están vinculadas al evento de ejecución 
     * (evento único con campo tipo igual a 'Ejecución de proyecto') del proyecto seleccionado y que 
     * ocupan el rol de 'Participante' en la tabla 'evento_persona'.
     */
    private function regla15_ParticipacionEjecucionProyecto(array $contexto): Collection
    {
        if (!isset($contexto['proyecto_id'])) {
            return collect([]);
        }
        
        // Obtener el evento de ejecución del proyecto
        $eventoEjecucion = Evento::where('proyecto_id', $contexto['proyecto_id'])
            ->where('tipo', 'Ejecución de proyecto')
            ->first();
        
        if (!$eventoEjecucion) {
            return collect([]);
        }
        
        return Persona::whereHas('eventos', function ($q) use ($eventoEjecucion) {
            $q->where('eventos.id', $eventoEjecucion->id)
              ->where('evento_persona.rol', 'Participante');
        })->get();
    }
    
    /**
     * Regla 16: Certificado de Valores Destacados
     * Seleccionar el año y periodo de la lista desplegable de año y periodo, estos campos de selección 
     * de año y periodo aparecerá dinámicamente en caso seleccione este tipo de certificación y solo 
     * mostrará todos los años y periodos de los que se tenga registro de ganadores a algún valor destacado 
     * por parte de los miembros de sedipro, y esto estará registradas en la tabla 'area_persona_valor_destacado' 
     * que es donde se hace el vinculo entre el sediprano y el valor destacado ganado, ahora para la 
     * selección del año y periodo se tomarán solo los años y periodos donde algún registro de 
     * 'area_persona_valor_destacado' tengan el campo 'estado_certificacion' igual a 'FALSE'. 
     * Mostrar como personas elegibles a todos los miembros de sedipro ganadores de los diferentes valores 
     * destacados en ese año y periodo seleccionados.
     */
    private function regla16_ValoresDestacados(array $contexto): Collection
    {
        if (!isset($contexto['anio']) || !isset($contexto['periodo'])) {
            return collect([]);
        }
        
        $areaPersonaIds = AreaPersonaValorDestacado::where('anio', $contexto['anio'])
            ->where('periodo', $contexto['periodo'])
            ->where('estado_certificacion', false)
            ->pluck('area_persona_id');
        
        return Persona::whereHas('areaPersonas', function ($q) use ($areaPersonaIds) {
            $q->whereIn('area_persona.id', $areaPersonaIds);
        })->get();
    }
    
    /**
     * Obtiene proyectos disponibles (no vinculados a grupos validados del tipo especificado).
     * 
     * @param string $nombreTipoCertificacion
     * @return Collection<Proyecto>
     */
    private function obtenerProyectosDisponibles(string $nombreTipoCertificacion): Collection
    {
        $tipoCertificacion = TipoDeCertificacion::where('nombre', $nombreTipoCertificacion)->first();
        if (!$tipoCertificacion) {
            return collect([]);
        }
        
        // Obtener proyectos vinculados a grupos validados de este tipo
        $proyectosVinculados = GrupoDeCertificacion::where('tipo_de_certificacion_id', $tipoCertificacion->id)
            ->where('estado', 'Validado')
            ->whereNotNull('proyecto_id')
            ->pluck('proyecto_id')
            ->unique();
        
        // Retornar proyectos no vinculados
        return Proyecto::whereNotIn('id', $proyectosVinculados)->get();
    }
    
    /**
     * Obtiene eventos disponibles (no vinculados a grupos validados del tipo especificado).
     * 
     * @param string $nombreTipoCertificacion
     * @return Collection<Evento>
     */
    private function obtenerEventosDisponibles(string $nombreTipoCertificacion): Collection
    {
        $tipoCertificacion = TipoDeCertificacion::where('nombre', $nombreTipoCertificacion)->first();
        if (!$tipoCertificacion) {
            return collect([]);
        }
        
        // Obtener eventos vinculados a grupos validados de este tipo
        $eventosVinculados = GrupoDeCertificacion::where('tipo_de_certificacion_id', $tipoCertificacion->id)
            ->where('estado', 'Validado')
            ->whereNotNull('evento_id')
            ->pluck('evento_id')
            ->unique();
        
        // Retornar eventos no vinculados
        return Evento::whereNotIn('id', $eventosVinculados)->get();
    }
}

