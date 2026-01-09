<?php

namespace App\Domain\Services;

use App\Models\Persona;
use App\Models\TipoDeCertificacion;
use App\Models\Proyecto;
use App\Models\Evento;
use App\Models\Area;

/**
 * Servicio de Dominio: ElegibilidadCertificacionService
 * 
 * Responsabilidad: Determinar si una Persona es elegible para un TipoDeCertificacion específico,
 * basándose exclusivamente en reglas de negocio documentadas.
 * 
 * Reglas de Negocio:
 * 1. RETIRADO_POR_BAJO_RENDIMIENTO → nunca elegible (prioridad absoluta)
 * 2. Certificados exclusivos para miembros: Debe ser miembro, no externo
 * 3. Certificados que permiten externos: Permitir externos explícitamente
 * 4. Certificados de Egresado/Retiro Voluntario: Tiempo de membresía ≥ 1 año
 * 5. Certificados por cargos/proyectos: Validar pertenencia al contexto
 * 
 * @package App\Domain\Services
 */
class ElegibilidadCertificacionService
{
    /**
     * Tipos de certificación que requieren membresía (historial en area_persona)
     */
    const TIPOS_REQUIEREN_MEMBRESIA = [
        'Certificado de Egresado',
        'Certificado de Retiro Voluntario',
        'Certificado de Directiva',
        'Certificado de Director de Proyecto',
        'Certificado de Co-Director de Proyecto',
        'Certificado de Coordinador de Proyecto',
        'Certificado de Miembros Internos del Proyecto',
        'Certificado de Staff Interno de Apoyo de Proyecto',
        'Certificado de Valores Destacados',
    ];

    /**
     * Tipos de certificación que requieren tiempo mínimo de 1 año
     */
    const TIPOS_REQUIEREN_TIEMPO_MINIMO = [
        'Certificado de Egresado',
        'Certificado de Retiro Voluntario',
    ];

    /**
     * Tipos de certificación que requieren contexto de proyecto
     */
    const TIPOS_REQUIEREN_PROYECTO = [
        'Certificado de Director de Proyecto',
        'Certificado de Co-Director de Proyecto',
        'Certificado de Coordinador de Proyecto',
        'Certificado de Miembros Internos del Proyecto',
        'Certificado de Miembros Externos del Proyecto',
        'Certificado de Staff Interno de Apoyo de Proyecto',
        'Certificado de Staff Externo de Apoyo de Proyecto',
        'Certificado de Participación como Ponente para Proyecto',
        'Certificado de Participación en Evento de Proyecto',
        'Certificado de Participación en Ejecución de Proyecto',
    ];

    /**
     * Tipos de certificación que requieren contexto de evento
     */
    const TIPOS_REQUIEREN_EVENTO = [
        'Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT',
        'Certificado de Participación como Ponente para Proyecto',
        'Certificado de Participación en Evento General de SEDIPRO UNT',
        'Certificado de Participación en Evento de Proyecto',
    ];

    /**
     * Tipos de certificación que requieren contexto de área (para Directiva)
     */
    const TIPOS_REQUIEREN_AREA = [
        'Certificado de Directiva',
    ];

    /**
     * @var EstadoPersonaService
     */
    private $estadoPersonaService;

    /**
     * @var TiempoMembresiaService
     */
    private $tiempoMembresiaService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estadoPersonaService = new EstadoPersonaService();
        $this->tiempoMembresiaService = new TiempoMembresiaService();
    }

    /**
     * Determina si una persona es elegible para un tipo de certificación específico.
     * 
     * @param Persona|int $persona Instancia de Persona o ID de persona
     * @param TipoDeCertificacion|int|string $tipoCertificacion Instancia, ID o nombre del tipo
     * @param array $contexto Opcional. Puede contener:
     *   - 'proyecto' => Proyecto|int (ID o instancia)
     *   - 'evento' => Evento|int (ID o instancia)
     *   - 'area' => Area|int|string (ID, instancia o abreviatura)
     * @return array Estructura con:
     *   - es_elegible: bool
     *   - motivo: string (explicación del resultado)
     *   - estado_persona: array (resultado de EstadoPersonaService)
     *   - tiempo_membresia: array (resultado de TiempoMembresiaService)
     *   - reglas_aplicadas: array (detalle de reglas evaluadas para auditoría)
     * 
     * @example
     * $service = new ElegibilidadCertificacionService();
     * $resultado = $service->verificarElegibilidad($persona, $tipoCertificacion, ['proyecto' => $proyecto]);
     * if ($resultado['es_elegible']) {
     *     echo "La persona es elegible: " . $resultado['motivo'];
     * }
     */
    public function verificarElegibilidad($persona, $tipoCertificacion, array $contexto = []): array
    {
        // Normalizar entrada de persona
        if (is_int($persona)) {
            $persona = Persona::find($persona);
            if (!$persona) {
                return $this->crearRespuestaNoElegible(
                    'Persona no encontrada',
                    ['persona_id' => $persona]
                );
            }
        }

        // Normalizar entrada de tipo de certificación
        $tipo = $this->obtenerTipoCertificacion($tipoCertificacion);
        if (!$tipo) {
            return $this->crearRespuestaNoElegible(
                'Tipo de certificación no encontrado',
                ['tipo_certificacion' => $tipoCertificacion]
            );
        }

        // Obtener estado de la persona
        $estadoPersona = $this->estadoPersonaService->determinarEstado($persona);
        $tiempoMembresia = $estadoPersona['tiempo_membresia'];

        // Inicializar registro de reglas aplicadas
        $reglasAplicadas = [
            'tipo_certificacion' => $tipo->nombre,
            'persona' => "{$persona->nombres} {$persona->apellidos}",
            'evaluaciones' => [],
        ];

        // REGLA 1: Prioridad absoluta - Retiro por bajo rendimiento
        if ($estadoPersona['estado'] === EstadoPersonaService::ESTADO_RETIRADO_POR_BAJO_RENDIMIENTO) {
            $reglasAplicadas['evaluaciones'][] = [
                'regla' => 'Retiro por bajo rendimiento',
                'resultado' => 'NO ELEGIBLE',
                'razon' => 'Persona retirada por bajo rendimiento no puede recibir ningún certificado',
            ];
            return $this->crearRespuestaNoElegible(
                'Persona retirada por bajo rendimiento no puede recibir ningún certificado',
                $estadoPersona,
                $tiempoMembresia,
                $reglasAplicadas
            );
        }
        $reglasAplicadas['evaluaciones'][] = [
            'regla' => 'Retiro por bajo rendimiento',
            'resultado' => 'PASÓ',
            'razon' => 'Persona no está retirada por bajo rendimiento',
        ];

        // REGLA 2: Verificar si el tipo requiere membresía
        $requiereMembresia = in_array($tipo->nombre, self::TIPOS_REQUIEREN_MEMBRESIA);
        
        if ($requiereMembresia) {
            if (!$estadoPersona['es_miembro']) {
                $reglasAplicadas['evaluaciones'][] = [
                    'regla' => 'Requisito de membresía',
                    'resultado' => 'NO ELEGIBLE',
                    'razon' => 'Este tipo de certificado requiere ser miembro de SEDIPRO UNT',
                ];
                return $this->crearRespuestaNoElegible(
                    'Este tipo de certificado requiere ser miembro de SEDIPRO UNT (historial en area_persona)',
                    $estadoPersona,
                    $tiempoMembresia,
                    $reglasAplicadas
                );
            }
            $reglasAplicadas['evaluaciones'][] = [
                'regla' => 'Requisito de membresía',
                'resultado' => 'PASÓ',
                'razon' => 'Persona es miembro de SEDIPRO UNT',
            ];
        }

        // REGLA 3: Verificar tiempo mínimo (solo para Egresado/Retiro Voluntario)
        if (in_array($tipo->nombre, self::TIPOS_REQUIEREN_TIEMPO_MINIMO)) {
            if ($tiempoMembresia['total_dias'] < 365) {
                $diasFaltantes = 365 - $tiempoMembresia['total_dias'];
                $reglasAplicadas['evaluaciones'][] = [
                    'regla' => 'Tiempo mínimo de membresía (1 año)',
                    'resultado' => 'NO ELEGIBLE',
                    'razon' => "Tiempo de membresía insuficiente: {$tiempoMembresia['total_dias']} días (faltan {$diasFaltantes} días)",
                ];
                return $this->crearRespuestaNoElegible(
                    "Tiempo de membresía insuficiente: {$tiempoMembresia['total_dias']} días. Se requiere mínimo 365 días (1 año)",
                    $estadoPersona,
                    $tiempoMembresia,
                    $reglasAplicadas
                );
            }
            $reglasAplicadas['evaluaciones'][] = [
                'regla' => 'Tiempo mínimo de membresía (1 año)',
                'resultado' => 'PASÓ',
                'razon' => "Tiempo de membresía suficiente: {$tiempoMembresia['total_dias']} días (" . number_format($tiempoMembresia['total_anios'], 2) . " años)",
            ];
        }

        // REGLA 4: Validar contexto requerido
        $validacionContexto = $this->validarContexto($persona, $tipo, $contexto, $estadoPersona);
        if (!$validacionContexto['valido']) {
            $reglasAplicadas['evaluaciones'][] = [
                'regla' => 'Validación de contexto',
                'resultado' => 'NO ELEGIBLE',
                'razon' => $validacionContexto['razon'],
            ];
            return $this->crearRespuestaNoElegible(
                $validacionContexto['razon'],
                $estadoPersona,
                $tiempoMembresia,
                $reglasAplicadas
            );
        }
        if (isset($validacionContexto['razon'])) {
            $reglasAplicadas['evaluaciones'][] = [
                'regla' => 'Validación de contexto',
                'resultado' => 'PASÓ',
                'razon' => $validacionContexto['razon'],
            ];
        }

        // Si llegamos aquí, la persona es elegible
        $reglasAplicadas['evaluaciones'][] = [
            'regla' => 'Evaluación final',
            'resultado' => 'ELEGIBLE',
            'razon' => 'Persona cumple con todos los requisitos para este tipo de certificado',
        ];

        return [
            'es_elegible' => true,
            'motivo' => 'Persona cumple con todos los requisitos para este tipo de certificado',
            'estado_persona' => $estadoPersona,
            'tiempo_membresia' => $tiempoMembresia,
            'reglas_aplicadas' => $reglasAplicadas,
        ];
    }

    /**
     * Obtiene la instancia de TipoDeCertificacion desde diferentes formatos de entrada.
     * 
     * @param TipoDeCertificacion|int|string $tipoCertificacion
     * @return TipoDeCertificacion|null
     */
    private function obtenerTipoCertificacion($tipoCertificacion): ?TipoDeCertificacion
    {
        if ($tipoCertificacion instanceof TipoDeCertificacion) {
            return $tipoCertificacion;
        }

        if (is_int($tipoCertificacion)) {
            return TipoDeCertificacion::find($tipoCertificacion);
        }

        if (is_string($tipoCertificacion)) {
            return TipoDeCertificacion::where('nombre', $tipoCertificacion)
                ->orWhere('codigo', $tipoCertificacion)
                ->first();
        }

        return null;
    }

    /**
     * Valida el contexto requerido para el tipo de certificación.
     * 
     * @param Persona $persona
     * @param TipoDeCertificacion $tipo
     * @param array $contexto
     * @param array $estadoPersona
     * @return array ['valido' => bool, 'razon' => string|null]
     */
    private function validarContexto(Persona $persona, TipoDeCertificacion $tipo, array $contexto, array $estadoPersona): array
    {
        // Validar proyecto si es requerido
        if (in_array($tipo->nombre, self::TIPOS_REQUIEREN_PROYECTO)) {
            if (!isset($contexto['proyecto'])) {
                return [
                    'valido' => false,
                    'razon' => 'Este tipo de certificado requiere un proyecto en el contexto',
                ];
            }

            $proyecto = $this->normalizarProyecto($contexto['proyecto']);
            if (!$proyecto) {
                return [
                    'valido' => false,
                    'razon' => 'Proyecto no encontrado en el contexto',
                ];
            }

            // Verificar si la persona pertenece al proyecto
            $perteneceProyecto = $this->perteneceAProyecto($persona, $proyecto, $estadoPersona);
            if (!$perteneceProyecto) {
                return [
                    'valido' => false,
                    'razon' => "La persona no está asociada al proyecto: {$proyecto->nombre}",
                ];
            }

            return [
                'valido' => true,
                'razon' => "Persona asociada al proyecto: {$proyecto->nombre}",
            ];
        }

        // Validar evento si es requerido
        if (in_array($tipo->nombre, self::TIPOS_REQUIEREN_EVENTO)) {
            if (!isset($contexto['evento'])) {
                return [
                    'valido' => false,
                    'razon' => 'Este tipo de certificado requiere un evento en el contexto',
                ];
            }

            $evento = $this->normalizarEvento($contexto['evento']);
            if (!$evento) {
                return [
                    'valido' => false,
                    'razon' => 'Evento no encontrado en el contexto',
                ];
            }

            // Verificar si la persona participó en el evento
            $participaEvento = $this->participaEnEvento($persona, $evento);
            if (!$participaEvento) {
                return [
                    'valido' => false,
                    'razon' => "La persona no participó en el evento: {$evento->nombre}",
                ];
            }

            return [
                'valido' => true,
                'razon' => "Persona participó en el evento: {$evento->nombre}",
            ];
        }

        // Validar área si es requerida (para Directiva)
        if (in_array($tipo->nombre, self::TIPOS_REQUIEREN_AREA)) {
            // Para Directiva, se puede validar si la persona tiene cargo en directiva
            // Por ahora, si es miembro activo, se considera elegible
            if ($estadoPersona['es_miembro']) {
                return [
                    'valido' => true,
                    'razon' => 'Persona es miembro de SEDIPRO UNT',
                ];
            }
        }

        // Si no requiere contexto específico, es válido
        return [
            'valido' => true,
            'razon' => 'No se requiere contexto específico para este tipo de certificado',
        ];
    }

    /**
     * Normaliza la entrada de proyecto.
     * 
     * @param Proyecto|int $proyecto
     * @return Proyecto|null
     */
    private function normalizarProyecto($proyecto): ?Proyecto
    {
        if ($proyecto instanceof Proyecto) {
            return $proyecto;
        }

        if (is_int($proyecto)) {
            return Proyecto::find($proyecto);
        }

        return null;
    }

    /**
     * Normaliza la entrada de evento.
     * 
     * @param Evento|int $evento
     * @return Evento|null
     */
    private function normalizarEvento($evento): ?Evento
    {
        if ($evento instanceof Evento) {
            return $evento;
        }

        if (is_int($evento)) {
            return Evento::find($evento);
        }

        return null;
    }

    /**
     * Verifica si una persona pertenece a un proyecto.
     * 
     * @param Persona $persona
     * @param Proyecto $proyecto
     * @param array $estadoPersona
     * @return bool
     */
    private function perteneceAProyecto(Persona $persona, Proyecto $proyecto, array $estadoPersona): bool
    {
        // Si es miembro, verificar a través de area_persona_proyecto
        if ($estadoPersona['es_miembro']) {
            $areaPersonas = $persona->areaPersonas;
            foreach ($areaPersonas as $areaPersona) {
                $pertenece = $areaPersona->proyectos()->where('proyectos.id', $proyecto->id)->exists();
                if ($pertenece) {
                    return true;
                }
            }
        }

        // Verificar a través de area_persona_cargo (director, co-director, coordinador)
        $cargosEnProyecto = \App\Models\AreaPersonaCargo::whereHas('areaPersona', function($query) use ($persona) {
            $query->where('persona_id', $persona->id);
        })->where('proyecto_id', $proyecto->id)->exists();

        if ($cargosEnProyecto) {
            return true;
        }

        // Verificar a través de entidad_aliada_persona_proyecto (personas externas)
        $entidadAliadaPersona = $persona->entidadAliadaPersonas()->first();
        if ($entidadAliadaPersona) {
            $pertenece = $entidadAliadaPersona->proyectos()->where('proyectos.id', $proyecto->id)->exists();
            if ($pertenece) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verifica si una persona participó en un evento.
     * 
     * @param Persona $persona
     * @param Evento $evento
     * @return bool
     */
    private function participaEnEvento(Persona $persona, Evento $evento): bool
    {
        return $persona->eventos()->where('eventos.id', $evento->id)->exists();
    }

    /**
     * Crea una respuesta de no elegible.
     * 
     * @param string $motivo
     * @param array|null $estadoPersona
     * @param array|null $tiempoMembresia
     * @param array|null $reglasAplicadas
     * @return array
     */
    private function crearRespuestaNoElegible(
        string $motivo,
        ?array $estadoPersona = null,
        ?array $tiempoMembresia = null,
        ?array $reglasAplicadas = null
    ): array {
        return [
            'es_elegible' => false,
            'motivo' => $motivo,
            'estado_persona' => $estadoPersona ?? [],
            'tiempo_membresia' => $tiempoMembresia ?? ['total_dias' => 0, 'total_anios' => 0.0, 'detalle_por_periodo' => []],
            'reglas_aplicadas' => $reglasAplicadas ?? [],
        ];
    }
}

/*
 * ============================================================================
 * EJEMPLOS DE USO CON TINKER
 * ============================================================================
 * 
 * Para usar este servicio desde Tinker, ejecuta: php artisan tinker
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 1: Verificar elegibilidad básica (Egresado)
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::where('correo_institucional', 't010100820@unitru.edu.pe')->first();
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * 
 * $resultado = $service->verificarElegibilidad($persona, $tipo);
 * 
 * echo "¿Es elegible? " . ($resultado['es_elegible'] ? 'Sí' : 'No') . "\n";
 * echo "Motivo: {$resultado['motivo']}\n";
 * echo "Tiempo membresía: {$resultado['tiempo_membresia']['total_dias']} días\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 2: Verificar elegibilidad con proyecto
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $tipo = App\Models\TipoDeCertificacion::where('codigo', 'MIP')->first();
 * $proyecto = App\Models\Proyecto::first();
 * 
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * $resultado = $service->verificarElegibilidad($persona, $tipo, ['proyecto' => $proyecto]);
 * 
 * if ($resultado['es_elegible']) {
 *     echo "✅ Elegible para certificado de Miembro Interno del Proyecto\n";
 * } else {
 *     echo "❌ No elegible: {$resultado['motivo']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 3: Verificar elegibilidad con evento
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $tipo = App\Models\TipoDeCertificacion::where('codigo', 'PONEG')->first();
 * $evento = App\Models\Evento::first();
 * 
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * $resultado = $service->verificarElegibilidad($persona, $tipo, ['evento' => $evento]);
 * 
 * echo "Resultado: " . ($resultado['es_elegible'] ? 'Elegible' : 'No elegible') . "\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 4: Verificar persona retirada por bajo rendimiento
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::whereHas('areaPersonas', function($q) {
 *     $q->where('estado', 'Retiro por bajo rendimiento');
 * })->first();
 * 
 * $tipo = App\Models\TipoDeCertificacion::first();
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * 
 * $resultado = $service->verificarElegibilidad($persona, $tipo);
 * 
 * echo "¿Es elegible? " . ($resultado['es_elegible'] ? 'Sí' : 'No') . "\n";
 * echo "Motivo: {$resultado['motivo']}\n";
 * // Debe mostrar: "Persona retirada por bajo rendimiento no puede recibir ningún certificado"
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 5: Ver reglas aplicadas (auditoría)
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * 
 * $resultado = $service->verificarElegibilidad($persona, $tipo);
 * 
 * echo "Reglas aplicadas:\n";
 * foreach ($resultado['reglas_aplicadas']['evaluaciones'] as $evaluacion) {
 *     echo "  - {$evaluacion['regla']}: {$evaluacion['resultado']} - {$evaluacion['razon']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 6: Listar personas elegibles para un tipo de certificado
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * $personas = App\Models\Persona::all();
 * 
 * $elegibles = [];
 * foreach ($personas as $persona) {
 *     $resultado = $service->verificarElegibilidad($persona, $tipo);
 *     if ($resultado['es_elegible']) {
 *         $elegibles[] = [
 *             'nombre' => "{$persona->nombres} {$persona->apellidos}",
 *             'correo' => $persona->correo_institucional,
 *             'tiempo_dias' => $resultado['tiempo_membresia']['total_dias'],
 *         ];
 *     }
 * }
 * 
 * echo "Personas elegibles para Egresado: " . count($elegibles) . "\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 7: Verificar múltiples tipos de certificado
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $tipos = App\Models\TipoDeCertificacion::all();
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * 
 * echo "Elegibilidad de {$persona->nombres} {$persona->apellidos}:\n";
 * foreach ($tipos as $tipo) {
 *     $resultado = $service->verificarElegibilidad($persona, $tipo);
 *     $icono = $resultado['es_elegible'] ? '✅' : '❌';
 *     echo "{$icono} {$tipo->nombre}: " . ($resultado['es_elegible'] ? 'Elegible' : $resultado['motivo']) . "\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 8: Verificar con contexto completo
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $tipo = App\Models\TipoDeCertificacion::where('codigo', 'DP')->first();
 * $proyecto = App\Models\Proyecto::first();
 * 
 * $service = new App\Domain\Services\ElegibilidadCertificacionService();
 * $resultado = $service->verificarElegibilidad($persona, $tipo, [
 *     'proyecto' => $proyecto->id, // También puede ser instancia
 * ]);
 * 
 * if ($resultado['es_elegible']) {
 *     echo "✅ Elegible para ser Director de Proyecto\n";
 *     echo "Estado: {$resultado['estado_persona']['estado']}\n";
 *     echo "Tiempo membresía: {$resultado['tiempo_membresia']['total_dias']} días\n";
 * } else {
 *     echo "❌ No elegible: {$resultado['motivo']}\n";
 *     echo "\nReglas evaluadas:\n";
 *     foreach ($resultado['reglas_aplicadas']['evaluaciones'] as $eval) {
 *         echo "  - {$eval['regla']}: {$eval['resultado']}\n";
 *     }
 * }
 * 
 * ============================================================================
 */

