<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evento;
use App\Models\Proyecto;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Tipos de eventos posibles (según migración):
         * 
         * 'Taller',
         * 'Capacitación',
         * 'Conferencia',
         * 'Seminario',
         * 'Ejecución de Proyecto',
         */

        $eventos = [
            /************************************
              ********* EVENTOS 2024 **********
              *********************************** */
            // Eventos del proyecto WEBINARS
            [
                'proyecto' => 'WEBINARS',
                'nombre' => 'Webinar: Gestión de Proyectos con Metodologías Ágiles',
                'fecha' => '2024-08-15',
                'tipo' => 'Capacitación',
            ],
            [
                'proyecto' => 'WEBINARS',
                'nombre' => 'Webinar: Liderazgo en Equipos de Trabajo',
                'fecha' => '2024-09-20',
                'tipo' => 'Capacitación',
            ],
            [
                'proyecto' => 'WEBINARS',
                'nombre' => 'Webinar: Comunicación Efectiva en Proyectos',
                'fecha' => '2024-10-10',
                'tipo' => 'Capacitación',
            ],
            // Eventos del proyecto CONCEPMI
            [
                'proyecto' => 'CONCEPMI',
                'nombre' => 'Conferencia: Gestión de Proyectos',
                'fecha' => '2024-06-15',
                'tipo' => 'Conferencia',
            ],
            [
                'proyecto' => 'CONCEPMI',
                'nombre' => 'Taller: Metodologías Ágiles',
                'fecha' => '2024-08-20',
                'tipo' => 'Taller',
            ],
            // Eventos del proyecto CONCURSO DE MARKETING 2024
            [
                'proyecto' => 'CONCURSO DE MARKETING 2024',
                'nombre' => 'Concurso de Marketing 2024 - Fase de Inscripción',
                'fecha' => '2024-07-20',
                'tipo' => 'Ejecución de Proyecto',
            ],
            [
                'proyecto' => 'CONCURSO DE MARKETING 2024',
                'nombre' => 'Concurso de Marketing 2024 - Premiación',
                'fecha' => '2024-10-25',
                'tipo' => 'Ejecución de Proyecto',
            ],
            // Eventos del proyecto OLIMPOKAMPING
            [
                'proyecto' => 'OLIMPOKAMPING',
                'nombre' => 'Olimpokamping 2024 - Inauguración',
                'fecha' => '2024-12-15',
                'tipo' => 'Ejecución de Proyecto',
            ],
            [
                'proyecto' => 'OLIMPOKAMPING',
                'nombre' => 'Olimpokamping 2024 - Competencias',
                'fecha' => '2025-01-20',
                'tipo' => 'Ejecución de Proyecto',
            ],
            [
                'proyecto' => 'OLIMPOKAMPING',
                'nombre' => 'Olimpokamping 2024 - Clausura',
                'fecha' => '2025-02-25',
                'tipo' => 'Ejecución de Proyecto',
            ],
            // Eventos del proyecto NAVISEDIPRO 8.0
            [
                'proyecto' => 'NAVISEDIPRO 8.0',
                'nombre' => 'NAVISEDIPRO 8.0 - Lanzamiento',
                'fecha' => '2024-12-15',
                'tipo' => 'Ejecución de Proyecto',
            ],
            [
                'proyecto' => 'NAVISEDIPRO 8.0',
                'nombre' => 'NAVISEDIPRO 8.0 - Presentación de Proyectos',
                'fecha' => '2024-12-20',
                'tipo' => 'Ejecución de Proyecto',
            ],
            /************************************
              ********* EVENTOS 2025 **********
              *********************************** */
            // Eventos del proyecto SEDITALKS
            [
                'proyecto' => 'SEDITALKS',
                'nombre' => 'SediTalks - Primera Sesión',
                'fecha' => '2025-06-10',
                'tipo' => 'Seminario',
            ],
            [
                'proyecto' => 'SEDITALKS',
                'nombre' => 'SediTalks - Segunda Sesión',
                'fecha' => '2025-07-15',
                'tipo' => 'Seminario',
            ],
            // Eventos del proyecto SediPatitas
            [
                'proyecto' => 'SediPatitas',
                'nombre' => 'SediPatitas - Campaña de Adopción',
                'fecha' => '2025-06-20',
                'tipo' => 'Ejecución de Proyecto',
            ],
            [
                'proyecto' => 'SediPatitas',
                'nombre' => 'SediPatitas - Jornada de Vacunación',
                'fecha' => '2025-07-25',
                'tipo' => 'Ejecución de Proyecto',
            ],
            // Eventos del proyecto Amigos de la Tecnología
            [
                'proyecto' => 'Amigos de la Tecnología',
                'nombre' => 'Taller: Introducción a la Programación',
                'fecha' => '2025-06-05',
                'tipo' => 'Taller',
            ],
            [
                'proyecto' => 'Amigos de la Tecnología',
                'nombre' => 'Taller: Desarrollo Web Básico',
                'fecha' => '2025-07-10',
                'tipo' => 'Taller',
            ],
            // Eventos generales (sin proyecto)
            [
                'proyecto' => NULL,
                'nombre' => 'Ceremonia de Reconocimiento SEDIPRO UNT 2024',
                'fecha' => '2024-12-10',
                'tipo' => 'Ejecución de Proyecto',
            ],
            [
                'proyecto' => NULL,
                'nombre' => 'Asamblea General SEDIPRO UNT 2025',
                'fecha' => '2025-03-19',
                'tipo' => 'Ejecución de Proyecto',
            ],
        ];

        foreach ($eventos as $evento) {
            $eventoData = [
                'nombre' => $evento['nombre'],
                'fecha' => $evento['fecha'],
                'tipo' => $evento['tipo'],
            ];

            if ($evento['proyecto'] !== NULL) {
                $proyecto = Proyecto::where('nombre', $evento['proyecto'])->first();
                if ($proyecto) {
                    $eventoData['proyecto_id'] = $proyecto->id;
                }
            } else {
                $eventoData['proyecto_id'] = NULL;
            }

            Evento::create($eventoData);
        }
    }
}
