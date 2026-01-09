<?php

namespace App\Domain\Services;

use App\Models\Persona;
use App\Models\AreaPersona;

/**
 * Servicio de Dominio: EstadoPersonaService
 * 
 * Responsabilidad: Determinar el estado actual y histórico de una persona respecto a SEDIPRO UNT,
 * especialmente si está retirada por bajo rendimiento.
 * 
 * Reglas de Negocio:
 * - EXTERNO: Persona sin registros en area_persona
 * - ACTIVO: Tiene al menos un area_persona con fecha_fin NULL
 * - EGRESADO: No activo y con historial ≥ 1 año de membresía
 * - RETIRADO_POR_BAJO_RENDIMIENTO: Marcado explícitamente en area_persona (prioridad absoluta)
 * 
 * Nota: Si una persona tiene estado "Retiro por bajo rendimiento" en cualquier registro,
 * su estado será RETIRADO_POR_BAJO_RENDIMIENTO, independientemente de otros factores.
 * 
 * @package App\Domain\Services
 */
class EstadoPersonaService
{
    /**
     * Estados posibles de una persona
     */
    const ESTADO_EXTERNO = 'EXTERNO';
    const ESTADO_ACTIVO = 'ACTIVO';
    const ESTADO_EGRESADO = 'EGRESADO';
    const ESTADO_RETIRADO_POR_BAJO_RENDIMIENTO = 'RETIRADO_POR_BAJO_RENDIMIENTO';

    /**
     * @var TiempoMembresiaService
     */
    private $tiempoMembresiaService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tiempoMembresiaService = new TiempoMembresiaService();
    }

    /**
     * Determina el estado actual de una persona en SEDIPRO UNT.
     * 
     * @param Persona|int $persona Instancia de Persona o ID de persona
     * @return array Estructura con:
     *   - estado: string - Estado actual (EXTERNO, ACTIVO, EGRESADO, RETIRADO_POR_BAJO_RENDIMIENTO)
     *   - es_miembro: bool - Si tiene historial en area_persona
     *   - es_activo: bool - Si tiene al menos un registro activo (fecha_fin NULL)
     *   - tiempo_membresia: array - Resultado de TiempoMembresiaService
     *   - detalle: array - Información detallada para auditoría
     * 
     * @example
     * $service = new EstadoPersonaService();
     * $resultado = $service->determinarEstado($persona);
     * echo "Estado: " . $resultado['estado'];
     * echo "Es miembro: " . ($resultado['es_miembro'] ? 'Sí' : 'No');
     */
    public function determinarEstado($persona): array
    {
        // Obtener la instancia de Persona si se pasó un ID
        if (is_int($persona)) {
            $persona = Persona::find($persona);
            if (!$persona) {
                return $this->crearRespuestaExterno();
            }
        }

        // Obtener todos los registros de area_persona para esta persona
        $registrosAreaPersona = AreaPersona::where('persona_id', $persona->id)
            ->with('area')
            ->orderBy('fecha_inicio', 'asc')
            ->get();

        // Si no hay registros, es EXTERNO
        if ($registrosAreaPersona->isEmpty()) {
            return $this->crearRespuestaExterno();
        }

        // Verificar si tiene "Retiro por bajo rendimiento" (prioridad absoluta)
        $tieneRetiroBajoRendimiento = $this->tieneRetiroBajoRendimiento($registrosAreaPersona);
        
        if ($tieneRetiroBajoRendimiento) {
            return $this->crearRespuestaRetiradoBajoRendimiento($persona, $registrosAreaPersona);
        }

        // Verificar si tiene registros activos (fecha_fin NULL)
        $tieneActivo = $this->tieneRegistroActivo($registrosAreaPersona);
        
        if ($tieneActivo) {
            return $this->crearRespuestaActivo($persona, $registrosAreaPersona);
        }

        // Si no está activo, verificar si es EGRESADO (historial ≥ 1 año)
        return $this->crearRespuestaEgresado($persona, $registrosAreaPersona);
    }

    /**
     * Verifica si la persona tiene algún registro con estado "Retiro por bajo rendimiento".
     * 
     * @param \Illuminate\Database\Eloquent\Collection $registrosAreaPersona
     * @return bool
     */
    private function tieneRetiroBajoRendimiento($registrosAreaPersona): bool
    {
        return $registrosAreaPersona->contains(function ($registro) {
            return $registro->estado === 'Retiro por bajo rendimiento';
        });
    }

    /**
     * Verifica si la persona tiene al menos un registro activo (fecha_fin NULL).
     * 
     * @param \Illuminate\Database\Eloquent\Collection $registrosAreaPersona
     * @return bool
     */
    private function tieneRegistroActivo($registrosAreaPersona): bool
    {
        return $registrosAreaPersona->contains(function ($registro) {
            return $registro->fecha_fin === null;
        });
    }

    /**
     * Crea la respuesta para una persona EXTERNA.
     * 
     * @return array
     */
    private function crearRespuestaExterno(): array
    {
        return [
            'estado' => self::ESTADO_EXTERNO,
            'es_miembro' => false,
            'es_activo' => false,
            'tiempo_membresia' => [
                'total_dias' => 0,
                'total_anios' => 0.0,
                'detalle_por_periodo' => [],
            ],
            'detalle' => [
                'razon' => 'No tiene registros en area_persona',
                'registros_count' => 0,
            ],
        ];
    }

    /**
     * Crea la respuesta para una persona RETIRADA POR BAJO RENDIMIENTO.
     * 
     * @param Persona $persona
     * @param \Illuminate\Database\Eloquent\Collection $registrosAreaPersona
     * @return array
     */
    private function crearRespuestaRetiradoBajoRendimiento($persona, $registrosAreaPersona): array
    {
        $tiempoMembresia = $this->tiempoMembresiaService->calcularTiempoMembresia($persona);
        
        // Obtener el registro con retiro por bajo rendimiento
        $registroRetiro = $registrosAreaPersona->firstWhere('estado', 'Retiro por bajo rendimiento');
        
        return [
            'estado' => self::ESTADO_RETIRADO_POR_BAJO_RENDIMIENTO,
            'es_miembro' => true,
            'es_activo' => false,
            'tiempo_membresia' => $tiempoMembresia,
            'detalle' => [
                'razon' => 'Marcado como "Retiro por bajo rendimiento" en area_persona',
                'registro_retiro' => $registroRetiro ? [
                    'id' => $registroRetiro->id,
                    'fecha_inicio' => $registroRetiro->fecha_inicio,
                    'fecha_fin' => $registroRetiro->fecha_fin,
                    'area' => $registroRetiro->area ? $registroRetiro->area->abreviatura : 'N/A',
                ] : null,
                'registros_count' => $registrosAreaPersona->count(),
                'tiene_activo' => $this->tieneRegistroActivo($registrosAreaPersona),
            ],
        ];
    }

    /**
     * Crea la respuesta para una persona ACTIVA.
     * 
     * @param Persona $persona
     * @param \Illuminate\Database\Eloquent\Collection $registrosAreaPersona
     * @return array
     */
    private function crearRespuestaActivo($persona, $registrosAreaPersona): array
    {
        $tiempoMembresia = $this->tiempoMembresiaService->calcularTiempoMembresia($persona);
        
        // Obtener registros activos
        $registrosActivos = $registrosAreaPersona->filter(function ($registro) {
            return $registro->fecha_fin === null;
        });
        
        return [
            'estado' => self::ESTADO_ACTIVO,
            'es_miembro' => true,
            'es_activo' => true,
            'tiempo_membresia' => $tiempoMembresia,
            'detalle' => [
                'razon' => 'Tiene al menos un registro activo (fecha_fin NULL)',
                'registros_count' => $registrosAreaPersona->count(),
                'registros_activos_count' => $registrosActivos->count(),
                'registros_activos' => $registrosActivos->map(function ($registro) {
                    return [
                        'id' => $registro->id,
                        'fecha_inicio' => $registro->fecha_inicio,
                        'area' => $registro->area ? $registro->area->abreviatura : 'N/A',
                        'estado' => $registro->estado,
                    ];
                })->values()->toArray(),
            ],
        ];
    }

    /**
     * Crea la respuesta para una persona EGRESADA.
     * 
     * @param Persona $persona
     * @param \Illuminate\Database\Eloquent\Collection $registrosAreaPersona
     * @return array
     */
    private function crearRespuestaEgresado($persona, $registrosAreaPersona): array
    {
        $tiempoMembresia = $this->tiempoMembresiaService->calcularTiempoMembresia($persona);
        
        // Obtener el último registro
        $ultimoRegistro = $registrosAreaPersona->sortByDesc('fecha_inicio')->first();
        
        return [
            'estado' => self::ESTADO_EGRESADO,
            'es_miembro' => true,
            'es_activo' => false,
            'tiempo_membresia' => $tiempoMembresia,
            'detalle' => [
                'razon' => 'No está activo pero tiene historial de membresía',
                'registros_count' => $registrosAreaPersona->count(),
                'ultimo_registro' => $ultimoRegistro ? [
                    'id' => $ultimoRegistro->id,
                    'fecha_inicio' => $ultimoRegistro->fecha_inicio,
                    'fecha_fin' => $ultimoRegistro->fecha_fin,
                    'area' => $ultimoRegistro->area ? $ultimoRegistro->area->abreviatura : 'N/A',
                    'estado' => $ultimoRegistro->estado,
                ] : null,
                'cumple_minimo_1_anio' => $tiempoMembresia['total_dias'] >= 365,
            ],
        ];
    }

    /**
     * Verifica si una persona está retirada por bajo rendimiento.
     * 
     * Método de conveniencia para consultas rápidas.
     * 
     * @param Persona|int $persona
     * @return bool
     */
    public function estaRetiradaPorBajoRendimiento($persona): bool
    {
        $estado = $this->determinarEstado($persona);
        return $estado['estado'] === self::ESTADO_RETIRADO_POR_BAJO_RENDIMIENTO;
    }

    /**
     * Verifica si una persona es miembro activo.
     * 
     * Método de conveniencia para consultas rápidas.
     * 
     * @param Persona|int $persona
     * @return bool
     */
    public function esActivo($persona): bool
    {
        $estado = $this->determinarEstado($persona);
        return $estado['es_activo'] === true;
    }

    /**
     * Verifica si una persona es miembro (tiene historial).
     * 
     * Método de conveniencia para consultas rápidas.
     * 
     * @param Persona|int $persona
     * @return bool
     */
    public function esMiembro($persona): bool
    {
        $estado = $this->determinarEstado($persona);
        return $estado['es_miembro'] === true;
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
 * Ejemplo 1: Determinar estado de una persona por ID
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\EstadoPersonaService();
 * $resultado = $service->determinarEstado(1); // ID de persona
 * 
 * echo "Estado: " . $resultado['estado'] . "\n";
 * echo "Es miembro: " . ($resultado['es_miembro'] ? 'Sí' : 'No') . "\n";
 * echo "Es activo: " . ($resultado['es_activo'] ? 'Sí' : 'No') . "\n";
 * echo "Tiempo membresía: " . $resultado['tiempo_membresia']['total_dias'] . " días\n";
 * print_r($resultado['detalle']);
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 2: Determinar estado de una persona por correo
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::where('correo_institucional', 't1051300621@unitru.edu.pe')->first();
 * $service = new App\Domain\Services\EstadoPersonaService();
 * $resultado = $service->determinarEstado($persona);
 * 
 * echo "Persona: {$persona->nombres} {$persona->apellidos}\n";
 * echo "Estado: {$resultado['estado']}\n";
 * echo "Es miembro: " . ($resultado['es_miembro'] ? 'Sí' : 'No') . "\n";
 * echo "Es activo: " . ($resultado['es_activo'] ? 'Sí' : 'No') . "\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 3: Verificar si una persona está retirada por bajo rendimiento
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $service = new App\Domain\Services\EstadoPersonaService();
 * 
 * if ($service->estaRetiradaPorBajoRendimiento($persona)) {
 *     echo "⚠️  Esta persona está retirada por bajo rendimiento\n";
 *     echo "NO puede recibir ningún certificado\n";
 * } else {
 *     echo "✅ Esta persona NO está retirada por bajo rendimiento\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 4: Listar todas las personas con su estado
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\EstadoPersonaService();
 * $personas = App\Models\Persona::all();
 * 
 * foreach ($personas as $persona) {
 *     $resultado = $service->determinarEstado($persona);
 *     echo sprintf(
 *         "%s %s: %s (Miembro: %s, Activo: %s)\n",
 *         $persona->nombres,
 *         $persona->apellidos,
 *         $resultado['estado'],
 *         $resultado['es_miembro'] ? 'Sí' : 'No',
 *         $resultado['es_activo'] ? 'Sí' : 'No'
 *     );
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 5: Buscar personas retiradas por bajo rendimiento
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\EstadoPersonaService();
 * $personas = App\Models\Persona::all();
 * $retiradas = [];
 * 
 * foreach ($personas as $persona) {
 *     if ($service->estaRetiradaPorBajoRendimiento($persona)) {
 *         $resultado = $service->determinarEstado($persona);
 *         $retiradas[] = [
 *             'nombre' => "{$persona->nombres} {$persona->apellidos}",
 *             'correo' => $persona->correo_institucional,
 *             'tiempo_membresia' => $resultado['tiempo_membresia']['total_dias'],
 *             'detalle' => $resultado['detalle'],
 *         ];
 *     }
 * }
 * 
 * echo "Personas retiradas por bajo rendimiento: " . count($retiradas) . "\n";
 * foreach ($retiradas as $retirada) {
 *     echo "  - {$retirada['nombre']} ({$retirada['correo']})\n";
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 6: Ver detalle completo del estado de una persona
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::where('correo_institucional', 't1051300621@unitru.edu.pe')->first();
 * $service = new App\Domain\Services\EstadoPersonaService();
 * $resultado = $service->determinarEstado($persona);
 * 
 * echo "=== ESTADO DE PERSONA ===\n";
 * echo "Nombre: {$persona->nombres} {$persona->apellidos}\n";
 * echo "Correo: {$persona->correo_institucional}\n";
 * echo "Estado: {$resultado['estado']}\n";
 * echo "Es miembro: " . ($resultado['es_miembro'] ? 'Sí' : 'No') . "\n";
 * echo "Es activo: " . ($resultado['es_activo'] ? 'Sí' : 'No') . "\n";
 * echo "\nTiempo de membresía:\n";
 * echo "  Días: {$resultado['tiempo_membresia']['total_dias']}\n";
 * echo "  Años: " . number_format($resultado['tiempo_membresia']['total_anios'], 2) . "\n";
 * echo "\nDetalle:\n";
 * print_r($resultado['detalle']);
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 7: Filtrar personas elegibles para certificados
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\EstadoPersonaService();
 * $personas = App\Models\Persona::all();
 * $elegibles = [];
 * 
 * foreach ($personas as $persona) {
 *     $estado = $service->determinarEstado($persona);
 *     
 *     // Elegibles: Activos o Egresados, pero NO retirados por bajo rendimiento
 *     if (in_array($estado['estado'], ['ACTIVO', 'EGRESADO']) && 
 *         !$service->estaRetiradaPorBajoRendimiento($persona)) {
 *         $elegibles[] = [
 *             'nombre' => "{$persona->nombres} {$persona->apellidos}",
 *             'correo' => $persona->correo_institucional,
 *             'estado' => $estado['estado'],
 *         ];
 *     }
 * }
 * 
 * echo "Personas elegibles: " . count($elegibles) . "\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 8: Estadísticas de estados
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\EstadoPersonaService();
 * $personas = App\Models\Persona::all();
 * 
 * $estadisticas = [
 *     'EXTERNO' => 0,
 *     'ACTIVO' => 0,
 *     'EGRESADO' => 0,
 *     'RETIRADO_POR_BAJO_RENDIMIENTO' => 0,
 * ];
 * 
 * foreach ($personas as $persona) {
 *     $resultado = $service->determinarEstado($persona);
 *     $estadisticas[$resultado['estado']]++;
 * }
 * 
 * echo "=== ESTADÍSTICAS DE ESTADOS ===\n";
 * foreach ($estadisticas as $estado => $cantidad) {
 *     echo "{$estado}: {$cantidad}\n";
 * }
 * 
 * ============================================================================
 */

