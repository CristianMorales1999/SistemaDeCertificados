<?php

namespace App\Application\Services;

use App\Domain\Services\GrupoCertificacionService;
use App\Models\GrupoDeCertificacion;
use App\Models\TipoDeCertificacion;
use App\Models\User;
use App\Models\Proyecto;
use App\Models\Evento;
use App\Models\Area;
use Carbon\Carbon;

/**
 * Servicio de Aplicación: GrupoCertificacionApplicationService
 * 
 * Responsabilidad: Orquestar la creación y persistencia de un GrupoDeCertificacion
 * basándose en la evaluación de elegibilidad del dominio.
 * 
 * Flujo:
 * 1. Recibe TipoDeCertificacion, Personas y Contexto
 * 2. Ejecuta GrupoCertificacionService (dominio) para evaluar elegibilidad
 * 3. Si total_elegibles == 0 → no crear grupo (retornar resultado)
 * 4. Si hay elegibles:
 *    - Crear GrupoDeCertificacion
 *    - Persistir totales y contexto
 *    - Guardar metadata con reglas_aplicadas, resumen y timestamp
 * 5. Retornar grupo_creado y resultado_evaluacion
 * 
 * Nota: Este servicio NO genera certificados ni PDFs, solo crea el grupo.
 * 
 * @package App\Application\Services
 */
class GrupoCertificacionApplicationService
{
    /**
     * @var GrupoCertificacionService
     */
    private $grupoCertificacionService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grupoCertificacionService = new GrupoCertificacionService();
    }

    /**
     * Crea un GrupoDeCertificacion basándose en la evaluación de elegibilidad.
     * 
     * @param TipoDeCertificacion|int|string $tipoCertificacion Instancia, ID o nombre del tipo
     * @param array $personas Array de Persona|int (instancias o IDs)
     * @param array $opciones Opciones adicionales:
     *   - 'contexto' => array (proyecto, evento, área)
     *   - 'usuario_creador_id' => int (ID del usuario que crea el grupo)
     *   - 'nombre' => string (nombre del grupo, opcional)
     *   - 'fecha_emision' => string|Carbon (fecha de emisión, opcional, por defecto hoy)
     * @return array Estructura con:
     *   - grupo_creado: GrupoDeCertificacion|null (null si no hay elegibles)
     *   - resultado_evaluacion: array (resultado completo de GrupoCertificacionService)
     *   - mensaje: string (mensaje descriptivo del resultado)
     * 
     * @example
     * $service = new GrupoCertificacionApplicationService();
     * $tipo = TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
     * $personas = [Persona::find(1), Persona::find(2)];
     * $resultado = $service->crearGrupo($tipo, $personas, [
     *     'usuario_creador_id' => 1,
     *     'nombre' => 'Egresados 2025',
     * ]);
     * if ($resultado['grupo_creado']) {
     *     echo "Grupo creado: " . $resultado['grupo_creado']->nombre;
     * }
     */
    public function crearGrupo($tipoCertificacion, array $personas, array $opciones = []): array
    {
        // Extraer opciones
        $contexto = $opciones['contexto'] ?? [];
        $usuarioCreadorId = $opciones['usuario_creador_id'] ?? null;
        $nombre = $opciones['nombre'] ?? null;
        $fechaEmision = $opciones['fecha_emision'] ?? Carbon::now();

        // Normalizar fecha de emisión
        if (is_string($fechaEmision)) {
            $fechaEmision = Carbon::parse($fechaEmision);
        }

        // Normalizar tipo de certificación
        $tipo = $this->normalizarTipoCertificacion($tipoCertificacion);
        if (!$tipo) {
            return [
                'grupo_creado' => null,
                'resultado_evaluacion' => null,
                'mensaje' => 'Tipo de certificación no encontrado',
            ];
        }

        // Validar usuario creador
        if (!$usuarioCreadorId) {
            return [
                'grupo_creado' => null,
                'resultado_evaluacion' => null,
                'mensaje' => 'Usuario creador es requerido',
            ];
        }

        $usuarioCreador = User::find($usuarioCreadorId);
        if (!$usuarioCreador) {
            return [
                'grupo_creado' => null,
                'resultado_evaluacion' => null,
                'mensaje' => 'Usuario creador no encontrado',
            ];
        }

        // PASO 1: Ejecutar evaluación de elegibilidad (dominio)
        $resultadoEvaluacion = $this->grupoCertificacionService->evaluarGrupo(
            $tipo,
            $personas,
            $contexto
        );

        // PASO 2: Verificar si hay elegibles
        if ($resultadoEvaluacion['resumen']['total_elegibles'] == 0) {
            return [
                'grupo_creado' => null,
                'resultado_evaluacion' => $resultadoEvaluacion,
                'mensaje' => 'No se creó el grupo porque no hay personas elegibles',
            ];
        }

        // PASO 3: Generar nombre del grupo si no se proporcionó
        if (!$nombre) {
            $nombre = $this->generarNombreGrupo($tipo, $contexto, $resultadoEvaluacion);
        }

        // Verificar que el nombre sea único
        $nombreUnico = $this->generarNombreUnico($nombre);

        // PASO 4: Preparar datos del grupo
        $datosGrupo = [
            'tipo_de_certificacion_id' => $tipo->id,
            'usuario_creador_id' => $usuarioCreadorId,
            'nombre' => $nombreUnico,
            'descripcion' => $this->generarDescripcion($tipo, $contexto, $resultadoEvaluacion),
            'fecha_emision' => $fechaEmision->format('Y-m-d'),
            'estado' => 'Pendiente',
        ];

        // Agregar contexto (proyecto, evento)
        if (isset($contexto['proyecto'])) {
            $proyecto = $this->normalizarProyecto($contexto['proyecto']);
            if ($proyecto) {
                $datosGrupo['proyecto_id'] = $proyecto->id;
            }
        }

        if (isset($contexto['evento'])) {
            $evento = $this->normalizarEvento($contexto['evento']);
            if ($evento) {
                $datosGrupo['evento_id'] = $evento->id;
            }
        }

        // PASO 5: Crear y persistir el grupo
        try {
            $grupo = GrupoDeCertificacion::create($datosGrupo);

            return [
                'grupo_creado' => $grupo,
                'resultado_evaluacion' => $resultadoEvaluacion,
                'mensaje' => "Grupo creado exitosamente con {$resultadoEvaluacion['resumen']['total_elegibles']} personas elegibles",
            ];
        } catch (\Exception $e) {
            return [
                'grupo_creado' => null,
                'resultado_evaluacion' => $resultadoEvaluacion,
                'mensaje' => "Error al crear el grupo: " . $e->getMessage(),
            ];
        }
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
     * Genera un nombre descriptivo para el grupo.
     * 
     * @param TipoDeCertificacion $tipo
     * @param array $contexto
     * @param array $resultadoEvaluacion
     * @return string
     */
    private function generarNombreGrupo(TipoDeCertificacion $tipo, array $contexto, array $resultadoEvaluacion): string
    {
        $nombre = $tipo->nombre;
        
        // Agregar contexto al nombre
        if (isset($contexto['proyecto'])) {
            $proyecto = $this->normalizarProyecto($contexto['proyecto']);
            if ($proyecto) {
                $nombre .= " - {$proyecto->nombre}";
            }
        }

        if (isset($contexto['evento'])) {
            $evento = $this->normalizarEvento($contexto['evento']);
            if ($evento) {
                $nombre .= " - {$evento->nombre}";
            }
        }

        // Agregar fecha y cantidad
        $fecha = Carbon::now()->format('Y-m-d');
        $cantidad = $resultadoEvaluacion['resumen']['total_elegibles'];
        $nombre .= " ({$cantidad} personas) - {$fecha}";

        return $nombre;
    }

    /**
     * Genera un nombre único agregando un sufijo numérico si es necesario.
     * 
     * @param string $nombreBase
     * @return string
     */
    private function generarNombreUnico(string $nombreBase): string
    {
        $nombre = $nombreBase;
        $contador = 1;

        while (GrupoDeCertificacion::where('nombre', $nombre)->exists()) {
            $nombre = $nombreBase . " ({$contador})";
            $contador++;
        }

        return $nombre;
    }

    /**
     * Genera la descripción con metadata JSON.
     * 
     * @param TipoDeCertificacion $tipo
     * @param array $contexto
     * @param array $resultadoEvaluacion
     * @return string JSON con metadata
     */
    private function generarDescripcion(TipoDeCertificacion $tipo, array $contexto, array $resultadoEvaluacion): string
    {
        $metadata = [
            'tipo_certificacion' => [
                'id' => $tipo->id,
                'nombre' => $tipo->nombre,
                'codigo' => $tipo->codigo,
            ],
            'contexto' => [
                'proyecto' => isset($contexto['proyecto']) ? [
                    'id' => $this->normalizarProyecto($contexto['proyecto'])->id ?? null,
                    'nombre' => $this->normalizarProyecto($contexto['proyecto'])->nombre ?? null,
                ] : null,
                'evento' => isset($contexto['evento']) ? [
                    'id' => $this->normalizarEvento($contexto['evento'])->id ?? null,
                    'nombre' => $this->normalizarEvento($contexto['evento'])->nombre ?? null,
                ] : null,
                'area' => isset($contexto['area']) ? [
                    'id' => $this->normalizarArea($contexto['area'])->id ?? null,
                    'abreviatura' => $this->normalizarArea($contexto['area'])->abreviatura ?? null,
                ] : null,
            ],
            'resumen' => $resultadoEvaluacion['resumen'],
            'reglas_aplicadas' => $resultadoEvaluacion['reglas_aplicadas'],
            'timestamp_creacion' => Carbon::now()->toIso8601String(),
            'version' => '1.0',
        ];

        return json_encode($metadata, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Normaliza la entrada de área.
     * 
     * @param Area|int|string $area
     * @return Area|null
     */
    private function normalizarArea($area): ?Area
    {
        if ($area instanceof Area) {
            return $area;
        }

        if (is_int($area)) {
            return Area::find($area);
        }

        if (is_string($area)) {
            return Area::where('abreviatura', $area)->first();
        }

        return null;
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
 * Ejemplo 1: Crear grupo básico (Egresado)
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::limit(10)->get()->toArray();
 * $usuario = App\Models\User::first();
 * 
 * $service = new App\Application\Services\GrupoCertificacionApplicationService();
 * $resultado = $service->crearGrupo($tipo, $personas, [
 *     'usuario_creador_id' => $usuario->id,
 * ]);
 * 
 * if ($resultado['grupo_creado']) {
 *     echo "✅ Grupo creado: {$resultado['grupo_creado']->nombre}\n";
 *     echo "Mensaje: {$resultado['mensaje']}\n";
 * } else {
 *     echo "❌ No se creó el grupo: {$resultado['mensaje']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 2: Crear grupo con proyecto
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('codigo', 'MIP')->first();
 * $proyecto = App\Models\Proyecto::first();
 * $personas = App\Models\Persona::limit(20)->get()->toArray();
 * $usuario = App\Models\User::first();
 * 
 * $service = new App\Application\Services\GrupoCertificacionApplicationService();
 * $resultado = $service->crearGrupo($tipo, $personas, [
 *     'usuario_creador_id' => $usuario->id,
 *     'contexto' => ['proyecto' => $proyecto],
 *     'nombre' => 'Miembros Internos - ' . $proyecto->nombre,
 * ]);
 * 
 * if ($resultado['grupo_creado']) {
 *     echo "Grupo ID: {$resultado['grupo_creado']->id}\n";
 *     echo "Proyecto: {$resultado['grupo_creado']->proyecto->nombre}\n";
 *     echo "Elegibles: {$resultado['resultado_evaluacion']['resumen']['total_elegibles']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 3: Ver metadata guardada
 * ----------------------------------------------------------------------------
 * 
 * $grupo = App\Models\GrupoDeCertificacion::latest()->first();
 * $metadata = json_decode($grupo->descripcion, true);
 * 
 * echo "=== METADATA DEL GRUPO ===\n";
 * echo "Tipo: {$metadata['tipo_certificacion']['nombre']}\n";
 * echo "Total elegibles: {$metadata['resumen']['total_elegibles']}\n";
 * echo "Total no elegibles: {$metadata['resumen']['total_no_elegibles']}\n";
 * echo "Timestamp: {$metadata['timestamp_creacion']}\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 4: Crear grupo con nombre personalizado
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::all()->toArray();
 * $usuario = App\Models\User::first();
 * 
 * $service = new App\Application\Services\GrupoCertificacionApplicationService();
 * $resultado = $service->crearGrupo($tipo, $personas, [
 *     'usuario_creador_id' => $usuario->id,
 *     'nombre' => 'Egresados SEDIPRO UNT 2025',
 *     'fecha_emision' => '2025-12-31',
 * ]);
 * 
 * echo "Resultado: {$resultado['mensaje']}\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 5: Verificar cuando no hay elegibles
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * // Personas que sabemos que no son elegibles
 * $personasNoElegibles = App\Models\Persona::doesntHave('areaPersonas')->limit(5)->get()->toArray();
 * $usuario = App\Models\User::first();
 * 
 * $service = new App\Application\Services\GrupoCertificacionApplicationService();
 * $resultado = $service->crearGrupo($tipo, $personasNoElegibles, [
 *     'usuario_creador_id' => $usuario->id,
 * ]);
 * 
 * if (!$resultado['grupo_creado']) {
 *     echo "✅ Correcto: No se creó el grupo porque no hay elegibles\n";
 *     echo "Total evaluadas: {$resultado['resultado_evaluacion']['resumen']['total_evaluadas']}\n";
 *     echo "Total elegibles: {$resultado['resultado_evaluacion']['resumen']['total_elegibles']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 6: Crear grupo con evento
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('codigo', 'PONEG')->first();
 * $evento = App\Models\Evento::first();
 * $personas = App\Models\Persona::all()->toArray();
 * $usuario = App\Models\User::first();
 * 
 * $service = new App\Application\Services\GrupoCertificacionApplicationService();
 * $resultado = $service->crearGrupo($tipo, $personas, [
 *     'usuario_creador_id' => $usuario->id,
 *     'contexto' => ['evento' => $evento],
 * ]);
 * 
 * if ($resultado['grupo_creado']) {
 *     echo "Grupo creado para evento: {$evento->nombre}\n";
 *     echo "Elegibles: {$resultado['resultado_evaluacion']['resumen']['total_elegibles']}\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 7: Ver resumen completo del resultado
 * ----------------------------------------------------------------------------
 * 
 * $tipo = App\Models\TipoDeCertificacion::where('nombre', 'Certificado de Egresado')->first();
 * $personas = App\Models\Persona::limit(50)->get()->toArray();
 * $usuario = App\Models\User::first();
 * 
 * $service = new App\Application\Services\GrupoCertificacionApplicationService();
 * $resultado = $service->crearGrupo($tipo, $personas, [
 *     'usuario_creador_id' => $usuario->id,
 * ]);
 * 
 * echo "=== RESUMEN ===\n";
 * if ($resultado['grupo_creado']) {
 *     echo "Grupo creado: {$resultado['grupo_creado']->nombre}\n";
 *     echo "ID: {$resultado['grupo_creado']->id}\n";
 *     echo "Estado: {$resultado['grupo_creado']->estado}\n";
 * }
 * echo "Mensaje: {$resultado['mensaje']}\n";
 * echo "Total evaluadas: {$resultado['resultado_evaluacion']['resumen']['total_evaluadas']}\n";
 * echo "Elegibles: {$resultado['resultado_evaluacion']['resumen']['total_elegibles']}\n";
 * echo "No elegibles: {$resultado['resultado_evaluacion']['resumen']['total_no_elegibles']}\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 8: Recuperar y analizar metadata de un grupo existente
 * ----------------------------------------------------------------------------
 * 
 * $grupo = App\Models\GrupoDeCertificacion::latest()->first();
 * 
 * if ($grupo && $grupo->descripcion) {
 *     $metadata = json_decode($grupo->descripcion, true);
 *     
 *     echo "=== ANÁLISIS DE METADATA ===\n";
 *     echo "Tipo: {$metadata['tipo_certificacion']['nombre']}\n";
 *     echo "Versión: {$metadata['version']}\n";
 *     echo "Creado: {$metadata['timestamp_creacion']}\n";
 *     echo "\nResumen:\n";
 *     echo "  - Total evaluadas: {$metadata['resumen']['total_evaluadas']}\n";
 *     echo "  - Elegibles: {$metadata['resumen']['total_elegibles']}\n";
 *     echo "  - No elegibles: {$metadata['resumen']['total_no_elegibles']}\n";
 *     echo "  - Errores: {$metadata['resumen']['total_errores']}\n";
 *     
 *     echo "\nMotivos de no elegibilidad:\n";
 *     foreach ($metadata['resumen']['motivos_no_elegibles'] as $motivo => $cantidad) {
 *         echo "  - {$motivo}: {$cantidad}\n";
 *     }
 * }
 * 
 * ============================================================================
 */

