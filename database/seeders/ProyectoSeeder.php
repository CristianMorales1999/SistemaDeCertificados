<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\Area;
use App\Models\AreaPersonaCargo;
use App\Models\AreaPersona;
use Carbon\Carbon;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * ⚠️ SEEDER PROVISIONAL PARA PRUEBAS - REEMPLAZAR CON DATOS REALES
     * Este seeder genera datos de prueba para poder probar la funcionalidad
     * de generación de certificados. Los datos reales deben ser importados
     * desde las fuentes correspondientes.
     */
    public function run(): void
    {
        // Obtener datos base necesarios
        $primeraArea = Area::first();
        $primerAreaPersonaCargo = AreaPersonaCargo::first();

        if (!$primeraArea || !$primerAreaPersonaCargo) {
            $this->command->warn('No hay datos base suficientes (áreas o cargos). Ejecuta los seeders base primero.');
            return;
        }

        // Verificar si ya existen proyectos de prueba
        $proyectosExistentes = false;
        if (Proyecto::where('nombre', 'like', '%Taller de Gestión de Proyectos%')->exists()) {
            $this->command->info('Los proyectos de prueba ya existen. Verificando asociaciones de personas...');
            $proyectosExistentes = true;
        }

        // PROYECTO 1: Taller de Gestión de Proyectos
        if (!$proyectosExistentes) {
            $proyecto1 = Proyecto::create([
                'nombre' => 'Taller de Gestión de Proyectos con Metodologías Ágiles',
                'fecha_inicio' => Carbon::now()->subDays(30),
                'fecha_fin' => Carbon::now()->subDays(28),
                'area_persona_cargo_id_dp' => $primerAreaPersonaCargo->id,
                'area_persona_cargo_id_codp' => $primerAreaPersonaCargo->id,
                'area_id' => $primeraArea->id,
                'imagen_logo' => null
            ]);

            // PROYECTO 2: Capacitación en Liderazgo
            $proyecto2 = Proyecto::create([
                'nombre' => 'Capacitación en Liderazgo y Trabajo en Equipo',
                'fecha_inicio' => Carbon::now()->subDays(15),
                'fecha_fin' => Carbon::now()->subDays(13),
                'area_persona_cargo_id_dp' => $primerAreaPersonaCargo->id,
                'area_persona_cargo_id_codp' => $primerAreaPersonaCargo->id,
                'area_id' => $primeraArea->id,
                'imagen_logo' => null
            ]);

            // PROYECTO 3: Seminario de Innovación Tecnológica
            $proyecto3 = Proyecto::create([
                'nombre' => 'Seminario de Innovación Tecnológica en la Educación',
                'fecha_inicio' => Carbon::now()->subDays(7),
                'fecha_fin' => Carbon::now()->subDays(5),
                'area_persona_cargo_id_dp' => $primerAreaPersonaCargo->id,
                'area_persona_cargo_id_codp' => $primerAreaPersonaCargo->id,
                'area_id' => $primeraArea->id,
                'imagen_logo' => null
            ]);
        }

        // Obtener los proyectos para asociar personas (ya sean nuevos o existentes)
        $proyecto1 = Proyecto::where('nombre', 'Taller de Gestión de Proyectos con Metodologías Ágiles')->first();
        $proyecto2 = Proyecto::where('nombre', 'Capacitación en Liderazgo y Trabajo en Equipo')->first();
        $proyecto3 = Proyecto::where('nombre', 'Seminario de Innovación Tecnológica en la Educación')->first();

        // Asociar personas a los proyectos (siempre ejecutar esto para asegurar las asociaciones)
        $areaPersonas = AreaPersona::take(10)->get();

        if ($areaPersonas->count() > 0) {
            foreach ($areaPersonas as $index => $areaPersona) {
                // Distribuir personas entre los 3 proyectos
                $proyectoIndex = $index % 3;
                $proyecto = [$proyecto1, $proyecto2, $proyecto3][$proyectoIndex];

                if ($proyecto) {
                    // Verificar si la asociación ya existe
                    if (!$proyecto->areaPersonas()->where('area_persona.id', $areaPersona->id)->exists()) {
                        $proyecto->areaPersonas()->attach($areaPersona->id, [
                            'rol' => 'Miembro',
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }
            }
            echo "✅ Se asociaron " . $areaPersonas->count() . " personas a los proyectos de prueba.\n";
        } else {
            echo "⚠️ No hay personas disponibles para asociar a los proyectos.\n";
        }

        $this->command->info('✅ Se crearon 3 proyectos de prueba con personas asociadas');
        $this->command->warn('⚠️  RECUERDA: Este es un seeder provisional. Reemplaza con datos reales.');
    }
}
