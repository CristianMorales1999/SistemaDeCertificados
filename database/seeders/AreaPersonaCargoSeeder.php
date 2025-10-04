<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaPersonaCargo;
use App\Models\AreaPersona;
use App\Models\Cargo;

class AreaPersonaCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * ⚠️ SEEDER PROVISIONAL PARA PRUEBAS - REEMPLAZAR CON DATOS REALES
     */
    public function run(): void
    {
        /*
        $areaPersona = AreaPersona::first();
        $cargo = Cargo::first();

        if (!$areaPersona || !$cargo) {
            $this->command->warn('No hay datos base para crear cargos de área');
            return;
        }

        // Crear un cargo temporal simplificado
        AreaPersonaCargo::create([
            'area_persona_id' => $areaPersona->id,
            'cargo_id' => $cargo->id,
            'proyecto_coordinado_id' => null,
            'fecha_inicio' => now(),
            'fecha_fin' => null,
            'estado_inicial' => '1', // Intentar con un valor numérico
            'estado_final' => null
        ]);

        $this->command->info('✅ Creado cargo de área temporal para pruebas');
        */
    }
}
