<?php

/**
 * ============================================================================
 * EJEMPLOS INTERACTIVOS PARA TINKER - TiempoMembresiaService
 * ============================================================================
 * 
 * Para usar estos ejemplos:
 * 1. Ejecuta: php artisan tinker
 * 2. Copia y pega cualquiera de los ejemplos siguientes
 * 
 * ============================================================================
 */

/*
 * ----------------------------------------------------------------------------
 * EJEMPLO 1: Calcular tiempo de membresía de una persona específica por correo
 * ----------------------------------------------------------------------------
 */

$persona = App\Models\Persona::where('correo_institucional', 't1051300621@unitru.edu.pe')->first();
$service = new App\Domain\Services\TiempoMembresiaService();
$resultado = $service->calcularTiempoMembresia($persona);

echo "Persona: {$persona->nombres} {$persona->apellidos}\n";
echo "Total días: {$resultado['total_dias']}\n";
echo "Total años: " . number_format($resultado['total_anios'], 2) . "\n";
echo "¿Cumple mínimo de 1 año? " . ($resultado['total_dias'] >= 365 ? 'Sí' : 'No') . "\n";


/*
 * ----------------------------------------------------------------------------
 * EJEMPLO 2: Ver detalle completo de periodos
 * ----------------------------------------------------------------------------
 */

$persona = App\Models\Persona::where('correo_institucional', 'mbedono@unitru.edu.pe')->first();
$service = new App\Domain\Services\TiempoMembresiaService();
$resultado = $service->calcularTiempoMembresia($persona);

echo "Detalle de periodos para: {$persona->nombres} {$persona->apellidos}\n";
echo str_repeat("-", 80) . "\n";
foreach ($resultado['detalle_por_periodo'] as $idx => $periodo) {
    $fechaFin = $periodo['fecha_fin'] ?? 'Activo';
    echo "Periodo " . ($idx + 1) . ":\n";
    echo "  Fecha inicio: {$periodo['fecha_inicio']}\n";
    echo "  Fecha fin: {$fechaFin}\n";
    echo "  Días: {$periodo['dias']}\n";
    echo "  Área(s): {$periodo['area']}\n";
    echo "  Estado(s): {$periodo['estado']}\n";
    echo "  IDs registros: " . implode(', ', $periodo['registros_originales']) . "\n";
    echo "\n";
}


/*
 * ----------------------------------------------------------------------------
 * EJEMPLO 3: Buscar todas las personas que cumplen mínimo de 1 año
 * ----------------------------------------------------------------------------
 */

$service = new App\Domain\Services\TiempoMembresiaService();
$personas = App\Models\Persona::whereHas('areaPersonas')->get();
$elegibles = [];

foreach ($personas as $persona) {
    $resultado = $service->calcularTiempoMembresia($persona);
    if ($resultado['total_dias'] >= 365) {
        $elegibles[] = [
            'nombre' => "{$persona->nombres} {$persona->apellidos}",
            'correo' => $persona->correo_institucional,
            'dias' => $resultado['total_dias'],
            'anios' => $resultado['total_anios']
        ];
    }
}

echo "Total personas elegibles (≥365 días): " . count($elegibles) . "\n";
// Mostrar primeras 10
foreach (array_slice($elegibles, 0, 10) as $elegible) {
    echo "  - {$elegible['nombre']}: {$elegible['dias']} días (" . number_format($elegible['anios'], 2) . " años)\n";
}


/*
 * ----------------------------------------------------------------------------
 * EJEMPLO 4: Comparar registros originales vs periodos unificados
 * ----------------------------------------------------------------------------
 */

$persona = App\Models\Persona::where('correo_institucional', 'mbedono@unitru.edu.pe')->first();
$service = new App\Domain\Services\TiempoMembresiaService();

echo "=== COMPARACIÓN: Registros Originales vs Periodos Unificados ===\n\n";
echo "Registros originales en area_persona:\n";
foreach ($persona->areaPersonas->sortBy('fecha_inicio') as $idx => $ap) {
    $fechaFin = $ap->fecha_fin ?? 'Activo';
    echo "  " . ($idx + 1) . ". {$ap->fecha_inicio} a {$fechaFin} | {$ap->area->abreviatura} | {$ap->estado}\n";
}

$resultado = $service->calcularTiempoMembresia($persona);
echo "\nPeriodos unificados por el servicio:\n";
foreach ($resultado['detalle_por_periodo'] as $idx => $periodo) {
    $fechaFin = $periodo['fecha_fin'] ?? 'Activo';
    echo "  " . ($idx + 1) . ". {$periodo['fecha_inicio']} a {$fechaFin} ({$periodo['dias']} días) | {$periodo['area']}\n";
}

echo "\nTotal días calculados: {$resultado['total_dias']} (" . number_format($resultado['total_anios'], 2) . " años)\n";


/*
 * ----------------------------------------------------------------------------
 * EJEMPLO 5: Verificar persona específica antes de generar certificado
 * ----------------------------------------------------------------------------
 */

$correo = 't1051300621@unitru.edu.pe'; // Cambiar por el correo que quieras verificar
$persona = App\Models\Persona::where('correo_institucional', $correo)->first();

if (!$persona) {
    echo "Persona no encontrada\n";
} else {
    $service = new App\Domain\Services\TiempoMembresiaService();
    $resultado = $service->calcularTiempoMembresia($persona);
    
    echo "=== VERIFICACIÓN DE ELEGIBILIDAD ===\n";
    echo "Persona: {$persona->nombres} {$persona->apellidos}\n";
    echo "Correo: {$persona->correo_institucional}\n\n";
    
    echo "Tiempo de membresía:\n";
    echo "  Días: {$resultado['total_dias']}\n";
    echo "  Años: " . number_format($resultado['total_anios'], 2) . "\n";
    
    $cumpleMinimo = $resultado['total_dias'] >= 365;
    echo "\n¿Cumple mínimo de 1 año (365 días)? " . ($cumpleMinimo ? '✅ SÍ' : '❌ NO') . "\n";
    
    if ($cumpleMinimo) {
        echo "✅ Esta persona PUEDE recibir certificado de Egresado/Retiro Voluntario\n";
    } else {
        $diasFaltantes = 365 - $resultado['total_dias'];
        echo "❌ Esta persona NO puede recibir certificado. Faltan {$diasFaltantes} días.\n";
    }
}


/*
 * ----------------------------------------------------------------------------
 * EJEMPLO 6: Estadísticas rápidas
 * ----------------------------------------------------------------------------
 */

$service = new App\Domain\Services\TiempoMembresiaService();
$personas = App\Models\Persona::whereHas('areaPersonas')->get();

$conMinimo = 0;
$sinMinimo = 0;
$tiempos = [];

foreach ($personas as $persona) {
    $resultado = $service->calcularTiempoMembresia($persona);
    $tiempos[] = $resultado['total_dias'];
    if ($resultado['total_dias'] >= 365) {
        $conMinimo++;
    } else {
        $sinMinimo++;
    }
}

$total = count($personas);
$promedio = array_sum($tiempos) / count($tiempos);

echo "=== ESTADÍSTICAS RÁPIDAS ===\n";
echo "Total personas con registros: {$total}\n";
echo "Cumplen mínimo (≥365 días): {$conMinimo} (" . round(($conMinimo / $total) * 100, 2) . "%)\n";
echo "NO cumplen mínimo (<365 días): {$sinMinimo} (" . round(($sinMinimo / $total) * 100, 2) . "%)\n";
echo "Tiempo promedio: " . number_format($promedio, 2) . " días (" . number_format($promedio / 365, 2) . " años)\n";

