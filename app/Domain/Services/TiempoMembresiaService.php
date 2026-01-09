<?php

namespace App\Domain\Services;

use App\Models\Persona;
use App\Models\AreaPersona;
use Carbon\Carbon;

/**
 * Servicio de Dominio: TiempoMembresiaService
 * 
 * Responsabilidad: Calcular el tiempo total de membresía de una persona en SEDIPRO UNT,
 * considerando todos los periodos de pertenencia y cambios de área como continuidad.
 * 
 * Reglas de Negocio:
 * - Suma todos los periodos de pertenencia en area_persona
 * - Considera cambios de área como continuidad (no reinicia el tiempo)
 * - Maneja solapamientos de fechas (si existen)
 * - Maneja periodos sin fecha_fin (activo actualmente)
 * - 365 días = 1 año (redondeo simple)
 * 
 * @package App\Domain\Services
 */
class TiempoMembresiaService
{
    /**
     * Calcula el tiempo total de membresía de una persona en SEDIPRO UNT.
     * 
     * @param Persona|int $persona Instancia de Persona o ID de persona
     * @return array Estructura con:
     *   - total_dias: int - Total de días de membresía
     *   - total_anios: float - Total de años (365 días = 1 año)
     *   - detalle_por_periodo: array - Detalle de cada periodo calculado
     * 
     * @example
     * $service = new TiempoMembresiaService();
     * $resultado = $service->calcularTiempoMembresia($persona);
     * echo "Total días: " . $resultado['total_dias'];
     * echo "Total años: " . $resultado['total_anios'];
     */
    public function calcularTiempoMembresia($persona): array
    {
        // Obtener la instancia de Persona si se pasó un ID
        if (is_int($persona)) {
            $persona = Persona::findOrFail($persona);
        }

        // Obtener todos los registros de area_persona para esta persona
        // Cargar la relación 'area' para acceder a la abreviatura
        $registrosAreaPersona = AreaPersona::where('persona_id', $persona->id)
            ->with('area')
            ->orderBy('fecha_inicio', 'asc')
            ->get();

        // Si no hay registros, retornar valores en cero
        if ($registrosAreaPersona->isEmpty()) {
            return [
                'total_dias' => 0,
                'total_anios' => 0.0,
                'detalle_por_periodo' => [],
            ];
        }

        // Procesar periodos y calcular tiempo total
        $periodos = $this->procesarPeriodos($registrosAreaPersona);
        $totalDias = $this->calcularDiasTotales($periodos);

        // Calcular años (365 días = 1 año)
        $totalAnios = round($totalDias / 365, 2);

        return [
            'total_dias' => $totalDias,
            'total_anios' => $totalAnios,
            'detalle_por_periodo' => $periodos,
        ];
    }

    /**
     * Procesa los registros de area_persona y genera periodos normalizados.
     * 
     * Maneja:
     * - Periodos con fecha_fin NULL (usa fecha actual)
     * - Solapamientos (los resuelve unificando periodos)
     * - Cambios de área (se consideran continuidad)
     * 
     * @param \Illuminate\Database\Eloquent\Collection $registrosAreaPersona
     * @return array Array de periodos normalizados con:
     *   - fecha_inicio: string (Y-m-d)
     *   - fecha_fin: string|null (Y-m-d)
     *   - dias: int
     *   - area: string (abreviatura)
     *   - estado: string
     *   - registros_originales: array (IDs de los registros que contribuyeron)
     */
    private function procesarPeriodos($registrosAreaPersona): array
    {
        $fechaActual = Carbon::now()->format('Y-m-d');
        $periodos = [];

        // Convertir registros a periodos simples
        foreach ($registrosAreaPersona as $registro) {
            $fechaInicio = Carbon::parse($registro->fecha_inicio);
            $fechaFin = $registro->fecha_fin 
                ? Carbon::parse($registro->fecha_fin) 
                : Carbon::parse($fechaActual);

            // Obtener abreviatura del área (con manejo defensivo)
            $areaAbreviatura = $registro->area && $registro->area->abreviatura 
                ? $registro->area->abreviatura 
                : 'N/A';

            $periodos[] = [
                'fecha_inicio' => $fechaInicio->format('Y-m-d'),
                'fecha_fin' => $registro->fecha_fin ? $fechaFin->format('Y-m-d') : null,
                'fecha_inicio_carbon' => $fechaInicio,
                'fecha_fin_carbon' => $fechaFin,
                'area' => $areaAbreviatura,
                'estado' => $registro->estado,
                'registro_id' => $registro->id,
            ];
        }

        // Ordenar por fecha_inicio
        usort($periodos, function ($a, $b) {
            return $a['fecha_inicio_carbon']->lt($b['fecha_inicio_carbon']) ? -1 : 1;
        });

        // Unificar periodos solapados
        $periodosUnificados = $this->unificarPeriodosSolapados($periodos);

        // Calcular días para cada periodo unificado
        foreach ($periodosUnificados as &$periodo) {
            $periodo['dias'] = $periodo['fecha_inicio_carbon']
                ->diffInDays($periodo['fecha_fin_carbon']) + 1; // +1 para incluir ambos días
            
            // Limpiar objetos Carbon del resultado final
            unset($periodo['fecha_inicio_carbon']);
            unset($periodo['fecha_fin_carbon']);
        }

        return $periodosUnificados;
    }

    /**
     * Unifica periodos que se solapan en un solo periodo continuo.
     * 
     * Ejemplo:
     * - Periodo 1: 2020-01-01 a 2020-06-30
     * - Periodo 2: 2020-05-01 a 2020-12-31
     * Resultado: 2020-01-01 a 2020-12-31 (un solo periodo)
     * 
     * @param array $periodos Array de periodos con objetos Carbon
     * @return array Array de periodos unificados
     */
    private function unificarPeriodosSolapados(array $periodos): array
    {
        if (empty($periodos)) {
            return [];
        }

        $periodosUnificados = [];
        $periodoActual = null;

        foreach ($periodos as $periodo) {
            if ($periodoActual === null) {
                // Primer periodo
                $periodoActual = [
                    'fecha_inicio' => $periodo['fecha_inicio'],
                    'fecha_fin' => $periodo['fecha_fin'],
                    'fecha_inicio_carbon' => $periodo['fecha_inicio_carbon'],
                    'fecha_fin_carbon' => $periodo['fecha_fin_carbon'],
                    'areas' => [$periodo['area']],
                    'estados' => [$periodo['estado']],
                    'registros_originales' => [$periodo['registro_id']],
                ];
            } else {
                // Verificar si se solapa con el periodo actual
                $inicioNuevo = $periodo['fecha_inicio_carbon'];
                $finNuevo = $periodo['fecha_fin_carbon'];
                $finActual = $periodoActual['fecha_fin_carbon'];

                // Si el nuevo periodo comienza antes o en el mismo día que termina el actual (o hay solapamiento)
                if ($inicioNuevo->lte($finActual->copy()->addDay()) || 
                    $inicioNuevo->between($periodoActual['fecha_inicio_carbon'], $finActual)) {
                    // Hay solapamiento o continuidad: extender el periodo actual
                    if ($finNuevo->gt($finActual)) {
                        $periodoActual['fecha_fin'] = $periodo['fecha_fin'];
                        $periodoActual['fecha_fin_carbon'] = $finNuevo;
                    }
                    // Agregar información del nuevo periodo
                    if (!in_array($periodo['area'], $periodoActual['areas'])) {
                        $periodoActual['areas'][] = $periodo['area'];
                    }
                    if (!in_array($periodo['estado'], $periodoActual['estados'])) {
                        $periodoActual['estados'][] = $periodo['estado'];
                    }
                    $periodoActual['registros_originales'][] = $periodo['registro_id'];
                } else {
                    // No hay solapamiento: guardar el periodo actual y empezar uno nuevo
                    $periodosUnificados[] = $this->formatearPeriodoUnificado($periodoActual);
                    $periodoActual = [
                        'fecha_inicio' => $periodo['fecha_inicio'],
                        'fecha_fin' => $periodo['fecha_fin'],
                        'fecha_inicio_carbon' => $periodo['fecha_inicio_carbon'],
                        'fecha_fin_carbon' => $periodo['fecha_fin_carbon'],
                        'areas' => [$periodo['area']],
                        'estados' => [$periodo['estado']],
                        'registros_originales' => [$periodo['registro_id']],
                    ];
                }
            }
        }

        // Agregar el último periodo
        if ($periodoActual !== null) {
            $periodosUnificados[] = $this->formatearPeriodoUnificado($periodoActual);
        }

        return $periodosUnificados;
    }

    /**
     * Formatea un periodo unificado para el resultado final.
     * 
     * @param array $periodo Periodo con información completa
     * @return array Periodo formateado
     */
    private function formatearPeriodoUnificado(array $periodo): array
    {
        return [
            'fecha_inicio' => $periodo['fecha_inicio'],
            'fecha_fin' => $periodo['fecha_fin'],
            'fecha_inicio_carbon' => $periodo['fecha_inicio_carbon'],
            'fecha_fin_carbon' => $periodo['fecha_fin_carbon'],
            'area' => implode(', ', $periodo['areas']), // Si hay múltiples áreas, se concatenan
            'estado' => implode(', ', $periodo['estados']), // Si hay múltiples estados, se concatenan
            'registros_originales' => $periodo['registros_originales'],
        ];
    }

    /**
     * Calcula el total de días sumando todos los periodos.
     * 
     * Si hay solapamientos, solo cuenta una vez cada día.
     * 
     * @param array $periodos Array de periodos unificados
     * @return int Total de días
     */
    private function calcularDiasTotales(array $periodos): int
    {
        $totalDias = 0;

        foreach ($periodos as $periodo) {
            $totalDias += $periodo['dias'];
        }

        return $totalDias;
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
 * Ejemplo 1: Calcular tiempo de membresía por ID de persona
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\TiempoMembresiaService();
 * $resultado = $service->calcularTiempoMembresia(1); // ID de persona
 * 
 * echo "Total días: " . $resultado['total_dias'] . "\n";
 * echo "Total años: " . $resultado['total_anios'] . "\n";
 * print_r($resultado['detalle_por_periodo']);
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 2: Calcular tiempo de membresía por instancia de Persona
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::where('correo_institucional', 'chmoralese@unitru.edu.pe')->first();
 * $service = new App\Domain\Services\TiempoMembresiaService();
 * $resultado = $service->calcularTiempoMembresia($persona);
 * 
 * echo "Persona: " . $persona->nombres . " " . $persona->apellidos . "\n";
 * echo "Total días: " . $resultado['total_dias'] . "\n";
 * echo "Total años: " . number_format($resultado['total_anios'], 2) . "\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 3: Verificar si una persona cumple el mínimo de 1 año
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $service = new App\Domain\Services\TiempoMembresiaService();
 * $resultado = $service->calcularTiempoMembresia($persona);
 * 
 * $cumpleMinimo = $resultado['total_dias'] >= 365;
 * echo "¿Cumple mínimo de 1 año? " . ($cumpleMinimo ? 'Sí' : 'No') . "\n";
 * echo "Días actuales: " . $resultado['total_dias'] . "\n";
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 4: Listar todas las personas con su tiempo de membresía
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\TiempoMembresiaService();
 * $personas = App\Models\Persona::all();
 * 
 * foreach ($personas as $persona) {
 *     $resultado = $service->calcularTiempoMembresia($persona);
 *     echo sprintf(
 *         "%s %s: %d días (%.2f años)\n",
 *         $persona->nombres,
 *         $persona->apellidos,
 *         $resultado['total_dias'],
 *         $resultado['total_anios']
 *     );
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 5: Ver detalle completo de periodos de una persona
 * ----------------------------------------------------------------------------
 * 
 * $persona = App\Models\Persona::find(1);
 * $service = new App\Domain\Services\TiempoMembresiaService();
 * $resultado = $service->calcularTiempoMembresia($persona);
 * 
 * echo "Detalle de periodos:\n";
 * foreach ($resultado['detalle_por_periodo'] as $index => $periodo) {
 *     echo sprintf(
 *         "Periodo %d: %s a %s (%d días) - Área: %s - Estado: %s\n",
 *         $index + 1,
 *         $periodo['fecha_inicio'],
 *         $periodo['fecha_fin'] ?? 'Activo',
 *         $periodo['dias'],
 *         $periodo['area'],
 *         $periodo['estado']
 *     );
 * }
 * 
 * ----------------------------------------------------------------------------
 * Ejemplo 6: Buscar personas que cumplen mínimo de 1 año
 * ----------------------------------------------------------------------------
 * 
 * $service = new App\Domain\Services\TiempoMembresiaService();
 * $personas = App\Models\Persona::all();
 * $personasElegibles = [];
 * 
 * foreach ($personas as $persona) {
 *     $resultado = $service->calcularTiempoMembresia($persona);
 *     if ($resultado['total_dias'] >= 365) {
 *         $personasElegibles[] = [
 *             'persona' => $persona->nombres . ' ' . $persona->apellidos,
 *             'dias' => $resultado['total_dias'],
 *             'anios' => $resultado['total_anios']
 *         ];
 *     }
 * }
 * 
 * echo "Personas que cumplen mínimo de 1 año: " . count($personasElegibles) . "\n";
 * print_r($personasElegibles);
 * 
 * ============================================================================
 */

