<?php

namespace App\Domain\Services;

use App\Models\TipoDeCertificacion;

/**
 * Servicio de Dominio: ContextoRequeridoResolver
 * 
 * Responsabilidad: Determinar qué contexto (proyecto, evento, año/periodo) requiere
 * cada tipo de certificación según las reglas del dominio.
 * 
 * Este servicio es la fuente única de verdad para determinar qué campos de contexto
 * deben aparecer dinámicamente en la UI.
 * 
 * @package App\Domain\Services
 */
class ContextoRequeridoResolver
{
    /**
     * Determina qué contexto requiere un tipo de certificación.
     * 
     * @param TipoDeCertificacion|int|string $tipoCertificacion
     * @return array Estructura con:
     *   - requiere_proyecto: bool
     *   - requiere_evento: bool
     *   - requiere_anio_periodo: bool
     *   - proyecto_filtrado: bool (si los proyectos deben filtrarse por disponibilidad)
     *   - evento_filtrado: bool (si los eventos deben filtrarse)
     *   - evento_depende_proyecto: bool (si el evento depende del proyecto seleccionado)
     */
    public function resolverContextoRequerido($tipoCertificacion): array
    {
        $tipo = $this->normalizarTipo($tipoCertificacion);
        if (!$tipo) {
            return $this->contextoVacio();
        }
        
        $nombreTipo = $tipo->nombre;
        
        return match($nombreTipo) {
            'Certificado de Egresado' => $this->contextoVacio(),
            'Certificado de Retiro Voluntario' => $this->contextoVacio(),
            'Certificado de Directiva' => $this->contextoVacio(),
            'Certificado de Director de Proyecto' => $this->contextoVacio(), // No requiere selección, muestra todos
            'Certificado de Co-Director de Proyecto' => $this->contextoVacio(), // No requiere selección, muestra todos
            'Certificado de Coordinadores de Proyecto' => [
                'requiere_proyecto' => true,
                'requiere_evento' => false,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => true,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ],
            'Certificado de Miembros Internos del Proyecto' => [
                'requiere_proyecto' => true,
                'requiere_evento' => false,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => true,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ],
            'Certificado de Staff Interno de Apoyo de Proyecto' => [
                'requiere_proyecto' => true,
                'requiere_evento' => false,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => true,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ],
            'Certificado de Miembros Externos del Proyecto' => [
                'requiere_proyecto' => true,
                'requiere_evento' => false,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => true,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ],
            'Certificado de Staff Externo de Apoyo de Proyecto' => [
                'requiere_proyecto' => true,
                'requiere_evento' => false,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => true,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ],
            'Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT' => $this->contextoVacio(), // No requiere selección, muestra todos
            'Certificado de Participación en Evento General de SEDIPRO UNT' => [
                'requiere_proyecto' => false,
                'requiere_evento' => true,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => false,
                'evento_filtrado' => true,
                'evento_depende_proyecto' => false,
                'evento_solo_generales' => true, // Solo eventos con proyecto_id = NULL
            ],
            'Certificado de Participación como Ponente para Proyecto' => $this->contextoVacio(), // No requiere selección, muestra todos
            'Certificado de Participación en Evento de Proyecto' => [
                'requiere_proyecto' => true,
                'requiere_evento' => true,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => true,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => true, // Evento depende del proyecto
            ],
            'Certificado de Participación en Ejecución de Proyecto' => [
                'requiere_proyecto' => true,
                'requiere_evento' => false,
                'requiere_anio_periodo' => false,
                'proyecto_filtrado' => true,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ],
            'Certificado de Valores Destacados' => [
                'requiere_proyecto' => false,
                'requiere_evento' => false,
                'requiere_anio_periodo' => true,
                'proyecto_filtrado' => false,
                'evento_filtrado' => false,
                'evento_depende_proyecto' => false,
            ],
            default => $this->contextoVacio(),
        };
    }
    
    /**
     * Retorna contexto vacío (sin requisitos).
     */
    private function contextoVacio(): array
    {
        return [
            'requiere_proyecto' => false,
            'requiere_evento' => false,
            'requiere_anio_periodo' => false,
            'proyecto_filtrado' => false,
            'evento_filtrado' => false,
            'evento_depende_proyecto' => false,
        ];
    }
    
    /**
     * Normaliza el tipo de certificación.
     */
    private function normalizarTipo($tipoCertificacion): ?TipoDeCertificacion
    {
        if ($tipoCertificacion instanceof TipoDeCertificacion) {
            return $tipoCertificacion;
        }
        
        if (is_int($tipoCertificacion)) {
            return TipoDeCertificacion::find($tipoCertificacion);
        }
        
        if (is_string($tipoCertificacion)) {
            return TipoDeCertificacion::where('nombre', $tipoCertificacion)->first();
        }
        
        return null;
    }
    
    /**
     * Obtiene proyectos disponibles para un tipo de certificación (filtrados por disponibilidad).
     * 
     * @param TipoDeCertificacion $tipoCertificacion
     * @return Collection<Proyecto>
     */
    public function obtenerProyectosDisponibles(TipoDeCertificacion $tipoCertificacion)
    {
        // Obtener proyectos vinculados a grupos validados de este tipo
        $proyectosVinculados = \App\Models\GrupoDeCertificacion::where('tipo_de_certificacion_id', $tipoCertificacion->id)
            ->where('estado', 'Validado')
            ->whereNotNull('proyecto_id')
            ->pluck('proyecto_id')
            ->unique();
        
        return \App\Models\Proyecto::whereNotIn('id', $proyectosVinculados)->get();
    }
    
    /**
     * Obtiene eventos disponibles para un tipo de certificación.
     * 
     * @param TipoDeCertificacion $tipoCertificacion
     * @param int|null $proyectoId Si se proporciona, filtra eventos del proyecto
     * @param bool $soloGenerales Si es true, solo eventos con proyecto_id = NULL
     * @return Collection<Evento>
     */
    public function obtenerEventosDisponibles(TipoDeCertificacion $tipoCertificacion, ?int $proyectoId = null, bool $soloGenerales = false)
    {
        $query = \App\Models\Evento::query();
        
        // Filtrar por proyecto si se proporciona
        if ($proyectoId) {
            $query->where('proyecto_id', $proyectoId);
        }
        
        // Solo eventos generales (sin proyecto)
        if ($soloGenerales) {
            $query->whereNull('proyecto_id');
        }
        
        // Obtener eventos vinculados a grupos validados de este tipo
        $eventosVinculados = \App\Models\GrupoDeCertificacion::where('tipo_de_certificacion_id', $tipoCertificacion->id)
            ->where('estado', 'Validado')
            ->whereNotNull('evento_id')
            ->pluck('evento_id')
            ->unique();
        
        if ($eventosVinculados->isNotEmpty()) {
            $query->whereNotIn('id', $eventosVinculados);
        }
        
        return $query->get();
    }
    
    /**
     * Obtiene años y periodos disponibles para Valores Destacados.
     * 
     * @return Collection Array de ['anio' => int, 'periodo' => string]
     */
    public function obtenerAniosPeriodosDisponibles()
    {
        return \App\Models\AreaPersonaValorDestacado::where('estado_certificacion', false)
            ->select('anio', 'periodo')
            ->distinct()
            ->orderBy('anio', 'desc')
            ->orderBy('periodo', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'anio' => $item->anio,
                    'periodo' => $item->periodo,
                ];
            });
    }
}

