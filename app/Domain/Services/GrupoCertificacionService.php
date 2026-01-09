<?php

namespace App\Domain\Services;

use App\Models\Persona;
use App\Models\TipoDeCertificacion;
use App\Models\Proyecto;
use App\Models\Evento;
use App\Models\Area;

/**
 * Servicio de Dominio: GrupoCertificacionService
 * 
 * Responsabilidad: Orquestar el proceso de evaluación de elegibilidad masiva
 * para un grupo de personas y un tipo de certificación específico.
 * 
 * Funcionalidad:
 * - Evalúa la elegibilidad de múltiples personas de forma individual
 * - Agrupa resultados en elegibles y no elegibles
 * - Proporciona resumen y auditoría completa
 * - No se detiene por errores individuales
 * 
 * Reglas:
 * - Cada persona se evalúa individualmente usando ElegibilidadCertificacionService
 * - Los errores individuales no detienen el proceso
 * - El resultado debe ser explicable y auditable
 * 
 * @package App\Domain\Services
 */
class GrupoCertificacionService
{
    /**
     * @var ElegibilidadCertificacionService
     */
    private $elegibilidadService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->elegibilidadService = new ElegibilidadCertificacionService();
    }

    /**
     * Evalúa la elegibilidad de un grupo de personas para un tipo de certificación.
     * 
     * @param TipoDeCertificacion|int|string $tipoCertificacion Instancia, ID o nombre del tipo
     * @param array $personas Array de Persona|int (instancias o IDs)
     * @param array $contexto Opcional. Puede contener:
     *   - 'proyecto' => Proyecto|int (ID o instancia)
     *   - 'evento' => Evento|int (ID o instancia)
     *   - 'area' => Area|int|string (ID, instancia o abreviatura)
     * @return array Estructura con:
     *   - total_personas: int
     *   - elegibles: array (personas elegibles con detalle)
     *   - no_elegibles: array (personas no elegibles con motivo)
     *   - resumen: array (estadísticas)
     *   - reglas_aplicadas: array (auditoría global)
     * 
     * @example
     * $service = new GrupoCertificacionService();
     * $personas = [Persona::find(1), Persona::find(2), Persona::find(3)];
     * $tipo = TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
     * $resultado = $service->evaluarGrupo($tipo, $personas);
     * echo "Elegibles: " . $resultado['resumen']['total_elegibles'];
     */
    public function evaluarGrupo($tipoCertificacion, array $personas, array $contexto = []): array
    {
        // Normalizar tipo de certificación
        $tipo = $this->normalizarTipoCertificacion($tipoCertificacion);
        if (!$tipo) {
            return $this->crearRespuestaError('Tipo de certificación no encontrado');
        }

        // Normalizar contexto
        $contextoNormalizado = $this->normalizarContexto($contexto);

        // Inicializar estructuras de resultado
        $elegibles = [];
        $noElegibles = [];
        $errores = [];
        $inicioProceso = now();

        // Evaluar cada persona
        foreach ($personas as $index => $persona) {
            try {
                // Normalizar persona
                $personaNormalizada = $this->normalizarPersona($persona);
                
                if (!$personaNormalizada) {
                    $personaInfo = is_object($persona) 
                        ? get_class($persona) 
                        : (is_array($persona) ? 'Array' : (string)$persona);
                    $errores[] = [
                        'indice' => $index,
                        'persona' => $personaInfo,
                        'error' => 'Persona no encontrada o inválida',
                    ];
                    continue;
                }

                // Evaluar elegibilidad
                $evaluacion = $this->elegibilidadService->verificarElegibilidad(
                    $personaNormalizada,
                    $tipo,
                    $contextoNormalizado
                );

                // Clasificar resultado
                if ($evaluacion['es_elegible']) {
                    $elegibles[] = [
                        'persona_id' => $personaNormalizada->id,
                        'persona' => [
                            'id' => $personaNormalizada->id,
                            'nombres' => $personaNormalizada->nombres,
                            'apellidos' => $personaNormalizada->apellidos,
                            'correo_institucional' => $personaNormalizada->correo_institucional,
                        ],
                        'estado_persona' => $evaluacion['estado_persona'],
                        'tiempo_membresia' => $evaluacion['tiempo_membresia'],
                        'reglas_aplicadas' => $evaluacion['reglas_aplicadas'],
                    ];
                } else {
                    $noElegibles[] = [
                        'persona_id' => $personaNormalizada->id,
                        'persona' => [
                            'id' => $personaNormalizada->id,
                            'nombres' => $personaNormalizada->nombres,
                            'apellidos' => $personaNormalizada->apellidos,
                            'correo_institucional' => $personaNormalizada->correo_institucional,
                        ],
                        'motivo' => $evaluacion['motivo'],
                        'estado_persona' => $evaluacion['estado_persona'],
                        'tiempo_membresia' => $evaluacion['tiempo_membresia'],
                        'reglas_aplicadas' => $evaluacion['reglas_aplicadas'],
                    ];
                }
            } catch (\Exception $e) {
                // Capturar errores sin detener el proceso
                $personaInfo = is_object($persona) 
                    ? get_class($persona) 
                    : (is_array($persona) ? 'Array' : (string)$persona);
                $errores[] = [
                    'indice' => $index,
                    'persona' => $personaInfo,
                    'error' => $e->getMessage(),
                    'archivo' => $e->getFile(),
                    'linea' => $e->getLine(),
                ];
            }
        }

        // Calcular resumen
        $resumen = $this->calcularResumen($elegibles, $noElegibles, $errores);

        // Preparar auditoría global
        $reglasAplicadas = $this->prepararAuditoriaGlobal(
            $tipo,
            $contextoNormalizado,
            $elegibles,
            $noElegibles,
            $inicioProceso
        );

        return [
            'total_personas' => count($personas),
            'elegibles' => $elegibles,
            'no_elegibles' => $noElegibles,
            'resumen' => $resumen,
            'reglas_aplicadas' => $reglasAplicadas,
        ];
    }

    /**
     * Normaliza la entrada de tipo de certificación.
     * 
     * @param TipoDeCertificacion|int|string $tipoCertificacion
     * @return TipoDeCertificacion|null
     */
    private function normalizarTipoCertificacion($tipoCertificacion): ?TipoDeCertificacion
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
     * Normaliza la entrada de persona.
     * 
     * @param Persona|int|array $persona Instancia, ID o array con datos de persona
     * @return Persona|null
     */
    private function normalizarPersona($persona): ?Persona
    {
        if ($persona instanceof Persona) {
            return $persona;
        }

        if (is_int($persona)) {
            return Persona::find($persona);
        }

        // Si es un array, intentar obtener por ID
        if (is_array($persona)) {
            if (isset($persona['id'])) {
                return Persona::find($persona['id']);
            }
            // Si el array tiene la estructura de un modelo Eloquent serializado
            if (isset($persona['attributes']['id'])) {
                return Persona::find($persona['attributes']['id']);
            }
        }

        return null;
    }

    /**
     * Normaliza el contexto.
     * 
     * @param array $contexto
     * @return array
     */
    private function normalizarContexto(array $contexto): array
    {
        $normalizado = [];

        // Normalizar proyecto
        if (isset($contexto['proyecto'])) {
            if ($contexto['proyecto'] instanceof Proyecto) {
                $normalizado['proyecto'] = $contexto['proyecto'];
            } elseif (is_int($contexto['proyecto'])) {
                $normalizado['proyecto'] = Proyecto::find($contexto['proyecto']);
            }
        }

        // Normalizar evento
        if (isset($contexto['evento'])) {
            if ($contexto['evento'] instanceof Evento) {
                $normalizado['evento'] = $contexto['evento'];
            } elseif (is_int($contexto['evento'])) {
                $normalizado['evento'] = Evento::find($contexto['evento']);
            }
        }

        // Normalizar área
        if (isset($contexto['area'])) {
            if ($contexto['area'] instanceof Area) {
                $normalizado['area'] = $contexto['area'];
            } elseif (is_int($contexto['area'])) {
                $normalizado['area'] = Area::find($contexto['area']);
            } elseif (is_string($contexto['area'])) {
                $normalizado['area'] = Area::where('abreviatura', $contexto['area'])->first();
            }
        }

        return $normalizado;
    }

    /**
     * Calcula el resumen estadístico de la evaluación.
     * 
     * @param array $elegibles
     * @param array $noElegibles
     * @param array $errores
     * @return array
     */
    private function calcularResumen(array $elegibles, array $noElegibles, array $errores): array
    {
        $totalEvaluadas = count($elegibles) + count($noElegibles);
        $totalElegibles = count($elegibles);
        $totalNoElegibles = count($noElegibles);
        $totalErrores = count($errores);

        // Agrupar motivos de no elegibilidad
        $motivosNoElegibles = [];
        foreach ($noElegibles as $noElegible) {
            $motivo = $noElegible['motivo'];
            $motivosNoElegibles[$motivo] = ($motivosNoElegibles[$motivo] ?? 0) + 1;
        }

        // Calcular porcentajes
        $porcentajeElegibles = $totalEvaluadas > 0 
            ? round(($totalElegibles / $totalEvaluadas) * 100, 2) 
            : 0;
        $porcentajeNoElegibles = $totalEvaluadas > 0 
            ? round(($totalNoElegibles / $totalEvaluadas) * 100, 2) 
            : 0;

        return [
            'total_evaluadas' => $totalEvaluadas,
            'total_elegibles' => $totalElegibles,
            'total_no_elegibles' => $totalNoElegibles,
            'total_errores' => $totalErrores,
            'porcentaje_elegibles' => $porcentajeElegibles,
            'porcentaje_no_elegibles' => $porcentajeNoElegibles,
            'motivos_no_elegibles' => $motivosNoElegibles,
            'errores' => $errores,
        ];
    }

    /**
     * Prepara la auditoría global del proceso.
     * 
     * @param TipoDeCertificacion $tipo
     * @param array $contexto
     * @param array $elegibles
     * @param array $noElegibles
     * @param \Carbon\Carbon $inicioProceso
     * @return array
     */
    private function prepararAuditoriaGlobal(
        TipoDeCertificacion $tipo,
        array $contexto,
        array $elegibles,
        array $noElegibles,
        $inicioProceso
    ): array {
        $finProceso = now();
        $duracion = $inicioProceso->diffInMilliseconds($finProceso);

        // Extraer reglas comunes de las evaluaciones
        $reglasComunes = [];
        if (!empty($elegibles)) {
            $primeraEvaluacion = $elegibles[0]['reglas_aplicadas'] ?? [];
            if (isset($primeraEvaluacion['evaluaciones'])) {
                foreach ($primeraEvaluacion['evaluaciones'] as $evaluacion) {
                    $reglasComunes[] = [
                        'regla' => $evaluacion['regla'],
                        'descripcion' => $evaluacion['razon'] ?? '',
                    ];
                }
            }
        }

        return [
            'tipo_certificacion' => [
                'id' => $tipo->id,
                'nombre' => $tipo->nombre,
                'codigo' => $tipo->codigo,
            ],
            'contexto' => [
                'proyecto' => isset($contexto['proyecto']) ? [
                    'id' => $contexto['proyecto']->id ?? null,
                    'nombre' => $contexto['proyecto']->nombre ?? null,
                ] : null,
                'evento' => isset($contexto['evento']) ? [
                    'id' => $contexto['evento']->id ?? null,
                    'nombre' => $contexto['evento']->nombre ?? null,
                ] : null,
                'area' => isset($contexto['area']) ? [
                    'id' => $contexto['area']->id ?? null,
                    'abreviatura' => $contexto['area']->abreviatura ?? null,
                ] : null,
            ],
            'reglas_comunes' => $reglasComunes,
            'proceso' => [
                'inicio' => $inicioProceso->toDateTimeString(),
                'fin' => $finProceso->toDateTimeString(),
                'duracion_ms' => $duracion,
            ],
        ];
    }

    /**
     * Crea una respuesta de error.
     * 
     * @param string $mensaje
     * @return array
     */
    private function crearRespuestaError(string $mensaje): array
    {
        return [
            'total_personas' => 0,
            'elegibles' => [],
            'no_elegibles' => [],
            'resumen' => [
                'total_evaluadas' => 0,
                'total_elegibles' => 0,
                'total_no_elegibles' => 0,
                'total_errores' => 1,
                'porcentaje_elegibles' => 0,
                'porcentaje_no_elegibles' => 0,
                'motivos_no_elegibles' => [],
                'errores' => [['error' => $mensaje]],
            ],
            'reglas_aplicadas' => [
                'error' => $mensaje,
            ],
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
 * Ejemplo 1: Evaluar grupo básico (Egresado)
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::limit(10)->get()->toArray();
 * 
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * $resultado = $service->evaluarGrupo($tipo, $personas);
 * 
 * echo "Total personas: {$resultado['total_personas']}\n";
 * echo "Elegibles: {$resultado['resumen']['total_elegibles']}\n";
 * echo "No elegibles: {$resultado['resumen']['total_no_elegibles']}\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 2: Evaluar grupo con proyecto
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('codigo', 'MIP')->first();
 * $proyecto = App\Models\Proyecto::first();
 * $personas = App\Models\Persona::limit(20)->get()->toArray();
 * 
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * $resultado = $service->evaluarGrupo($tipo, $personas, ['proyecto' => $proyecto]);
 * 
 * echo "Elegibles para Miembro Interno del Proyecto '{$proyecto->nombre}':\n";
 * foreach ($resultado['elegibles'] as $elegible) {
 *     echo "  - {$elegible['persona']['nombres']} {$elegible['persona']['apellidos']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 3: Ver detalles de no elegibles
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::all()->toArray();
 * 
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * $resultado = $service->evaluarGrupo($tipo, $personas);
 * 
 * echo "Motivos de no elegibilidad:\n";
 * foreach ($resultado['resumen']['motivos_no_elegibles'] as $motivo => $cantidad) {
 *     echo "  - {$motivo}: {$cantidad} personas\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 4: Evaluar grupo con evento
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('codigo', 'PONEG')->first();
 * $evento = App\Models\Evento::first();
 * $personas = App\Models\Persona::all()->toArray();
 * 
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * $resultado = $service->evaluarGrupo($tipo, $personas, ['evento' => $evento]);
 * 
 * echo "Elegibles para Ponente en evento '{$evento->nombre}': {$resultado['resumen']['total_elegibles']}\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 5: Ver resumen completo
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::all()->toArray();
 * 
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * $resultado = $service->evaluarGrupo($tipo, $personas);
 * 
 * echo "=== RESUMEN ===\n";
 * echo "Total personas: {$resultado['total_personas']}\n";
 * echo "Total evaluadas: {$resultado['resumen']['total_evaluadas']}\n";
 * echo "Elegibles: {$resultado['resumen']['total_elegibles']} ({$resultado['resumen']['porcentaje_elegibles']}%)\n";
 * echo "No elegibles: {$resultado['resumen']['total_no_elegibles']} ({$resultado['resumen']['porcentaje_no_elegibles']}%)\n";
 * echo "Errores: {$resultado['resumen']['total_errores']}\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 6: Listar personas elegibles con detalles
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::all()->toArray();
 * 
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * $resultado = $service->evaluarGrupo($tipo, $personas);
 * 
 * echo "Personas elegibles:\n";
 * foreach ($resultado['elegibles'] as $elegible) {
 *     $p = $elegible['persona'];
 *     $tm = $elegible['tiempo_membresia'];
 *     echo "  - {$p['nombres']} {$p['apellidos']} ({$p['correo_institucional']})\n";
 *     echo "    Tiempo membresía: {$tm['total_dias']} días (" . number_format($tm['total_anios'], 2) . " años)\n";
 *     echo "    Estado: {$elegible['estado_persona']['estado']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 7: Evaluar múltiples tipos de certificado
 * ----------------------------------------------------------------------------
 * 
 * $tipos = App\Models\TipoDeCertificacion::all();
 * $personas = App\Models\Persona::limit(50)->get()->toArray();
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * 
 * foreach ($tipos as $tipo) {
 *     $resultado = $service->evaluarGrupo($tipo, $personas);
 *     echo "{$tipo->nombre}: {$resultado['resumen']['total_elegibles']} elegibles de {$resultado['resumen']['total_evaluadas']} evaluadas\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 8: Ver auditoría completa
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::limit(100)->get()->toArray();
 * 
 * $service = new App\Domain\Services\GrupoCertificacionService();
 * $resultado = $service->evaluarGrupo($tipo, $personas);
 * 
 * echo "=== AUDITORÍA ===\n";
 * echo "Tipo: {$resultado['reglas_aplicadas']['tipo_certificacion']['nombre']}\n";
 * echo "Duración: {$resultado['reglas_aplicadas']['proceso']['duracion_ms']} ms\n";
 * echo "Reglas aplicadas:\n";
 * foreach ($resultado['reglas_aplicadas']['reglas_comunes'] as $regla) {
 *     echo "  - {$regla['regla']}: {$regla['descripcion']}\n";
 * }
 * 
 * ============================================================================
 */

