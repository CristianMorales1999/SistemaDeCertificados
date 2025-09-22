<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\Area;
use App\Models\AreaPersonaCargo;
use Illuminate\Support\Carbon;

class ProyectosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener áreas y cargos existentes
        $areaPersonaCargos = AreaPersonaCargo::all();
        $areas = Area::all();

        if ($areaPersonaCargos->isEmpty()) {
            $this->command->info('No hay registros en area_persona_cargo aún. Se crearán proyectos sin directores específicos.');
        }

        if ($areas->isEmpty()) {
            $this->command->error('No hay áreas disponibles. Ejecuta primero el AreaSeeder.');
            return;
        }

        $proyectos = [
            [
                'nombre' => 'RENACER - Programa de Rehabilitación y Reinserción Social',
                'fecha_inicio' => Carbon::create(2024, 2, 1),
                'fecha_fin' => Carbon::create(2024, 12, 31),
                'area_id' => $areas->where('nombre', 'Project Management Office')->first()?->id ?? $areas->first()->id,
                'imagen_logo' => 'fotos_logos/logo_renacer.png'
            ],
            [
                'nombre' => 'Programa de Capacitación en Habilidades Blandas 2024',
                'fecha_inicio' => Carbon::create(2024, 3, 15),
                'fecha_fin' => Carbon::create(2024, 11, 30),
                'area_id' => $areas->where('nombre', 'Gestión del Talento Humano')->first()?->id ?? $areas->first()->id,
                'imagen_logo' => 'fotos_logos/logo_habilidades.png'
            ],
            [
                'nombre' => 'Talleres de Emprendimiento Juvenil SEDIPRANO 2024',
                'fecha_inicio' => Carbon::create(2024, 4, 1),
                'fecha_fin' => null, // Proyecto en curso
                'area_id' => $areas->where('nombre', 'Marketing')->first()?->id ?? $areas->first()->id,
                'imagen_logo' => 'fotos_logos/logo_emprendimiento.png'
            ],
            [
                'nombre' => 'Certificación Digital en Tecnologías Emergentes',
                'fecha_inicio' => Carbon::create(2024, 5, 1),
                'fecha_fin' => Carbon::create(2024, 10, 31),
                'area_id' => $areas->where('nombre', 'Tecnologías de la Información')->first()?->id ?? $areas->first()->id,
                'imagen_logo' => 'fotos_logos/logo_tech.png'
            ],
            [
                'nombre' => 'Programa de Mentoría y Acompañamiento Profesional',
                'fecha_inicio' => Carbon::create(2024, 6, 1),
                'fecha_fin' => Carbon::create(2025, 3, 31),
                'area_id' => $areas->where('nombre', 'Logística y Finanzas')->first()?->id ?? $areas->first()->id,
                'imagen_logo' => null
            ]
        ];

        foreach ($proyectos as $proyectoData) {
            // Verificar si ya existe un proyecto con ese nombre
            $proyectoExistente = Proyecto::where('nombre', $proyectoData['nombre'])->first();

            if (!$proyectoExistente) {
                $datosProy = [
                    'nombre' => $proyectoData['nombre'],
                    'fecha_inicio' => $proyectoData['fecha_inicio'],
                    'fecha_fin' => $proyectoData['fecha_fin'],
                    'area_id' => $proyectoData['area_id'],
                    'imagen_logo' => $proyectoData['imagen_logo'],
                ];

                // Solo asignar directores si existen registros en area_persona_cargo
                if (!$areaPersonaCargos->isEmpty()) {
                    // Seleccionar director y codirector aleatorios
                    $director = $areaPersonaCargos->random();
                    $codirector = $areaPersonaCargos->where('id', '!=', $director->id)->random();

                    $datosProy['area_persona_cargo_id_dp'] = $director->id;
                    $datosProy['area_persona_cargo_id_codp'] = $codirector->id;
                }

                $proyecto = Proyecto::create($datosProy);
                $this->command->info("Proyecto creado: {$proyecto->nombre}");
            }
        }

        $this->command->info('Se completó el seeding de proyectos de prueba.');
    }
}
