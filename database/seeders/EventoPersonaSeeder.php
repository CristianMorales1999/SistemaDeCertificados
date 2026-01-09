<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evento;
use App\Models\Persona;

class EventoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Roles posibles para personas en eventos (según migración):
         * 
         * 'Ponente',
         * 'Participante',
         */

        $personasEnEventos = [
            /************************************
              ********* EVENTOS 2024 **********
              *********************************** */
            // Webinar: Gestión de Proyectos con Metodologías Ágiles
            [
                'evento' => 'Webinar: Gestión de Proyectos con Metodologías Ágiles',
                'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez - DP WEBINARS
                'rol' => 'Participante',
            ],
            // Webinar: Liderazgo en Equipos de Trabajo
            [
                'evento' => 'Webinar: Liderazgo en Equipos de Trabajo',
                'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez - DP WEBINARS
                'rol' => 'Participante',
            ],
            // Webinar: Comunicación Efectiva en Proyectos
            [
                'evento' => 'Webinar: Comunicación Efectiva en Proyectos',
                'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez - DP WEBINARS
                'rol' => 'Participante',
            ],
            // Conferencia: Gestión de Proyectos (CONCEPMI)
            [
                'evento' => 'Conferencia: Gestión de Proyectos',
                'correo_persona' => 't053300720@unitru.edu.pe',//Anahy Estrella Cruz Ulloa - DP CONCEPMI
                'rol' => 'Participante',
            ],
            // Taller: Metodologías Ágiles (CONCEPMI)
            [
                'evento' => 'Taller: Metodologías Ágiles',
                'correo_persona' => 't053300720@unitru.edu.pe',//Anahy Estrella Cruz Ulloa - DP CONCEPMI
                'rol' => 'Participante',
            ],
            // Concurso de Marketing 2024 - Fase de Inscripción
            [
                'evento' => 'Concurso de Marketing 2024 - Fase de Inscripción',
                'correo_persona' => 't010101220@unitru.edu.pe',//José Efrain Calle Gutierrez - DP
                'rol' => 'Participante',
            ],
            // Concurso de Marketing 2024 - Premiación
            [
                'evento' => 'Concurso de Marketing 2024 - Premiación',
                'correo_persona' => 't010101220@unitru.edu.pe',//José Efrain Calle Gutierrez - DP
                'rol' => 'Participante',
            ],
            // Olimpokamping 2024 - Inauguración
            [
                'evento' => 'Olimpokamping 2024 - Inauguración',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Jesús Rodriguez Sabana - DP
                'rol' => 'Participante',
            ],
            [
                'evento' => 'Olimpokamping 2024 - Inauguración',
                'correo_persona' => 't1510101021@unitru.edu.pe',//Kevin Gamaliel Rodriguez Alfaro - CO-DP
                'rol' => 'Participante',
            ],
            [
                'evento' => 'Olimpokamping 2024 - Inauguración',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Valeria Pereda Llave - CO-DP
                'rol' => 'Participante',
            ],
            [
                'evento' => 'Olimpokamping 2024 - Inauguración',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',//María Celine Huamán Martínez - CO-DP
                'rol' => 'Participante',
            ],
            // NAVISEDIPRO 8.0 - Lanzamiento
            [
                'evento' => 'NAVISEDIPRO 8.0 - Lanzamiento',
                'correo_persona' => 'avelarde@unitru.edu.pe',//Alexandra Brighit Valverde Escobar - DP
                'rol' => 'Participante',
            ],
            [
                'evento' => 'NAVISEDIPRO 8.0 - Lanzamiento',
                'correo_persona' => 't1511601421@unitru.edu.pe',//Jhosmel Anderson Vigo Cepeda - CO-DP
                'rol' => 'Participante',
            ],
            // Ceremonia de Reconocimiento SEDIPRO UNT 2024
            [
                'evento' => 'Ceremonia de Reconocimiento SEDIPRO UNT 2024',
                'correo_persona' => 't010100820@unitru.edu.pe',//Cinthya Gil - Presidenta 2024
                'rol' => 'Participante',
            ],
            [
                'evento' => 'Ceremonia de Reconocimiento SEDIPRO UNT 2024',
                'correo_persona' => 't1052500521@unitru.edu.pe',//Romina Seclen - Vicepresidenta 2024
                'rol' => 'Participante',
            ],
            /************************************
              ********* EVENTOS 2025 **********
              *********************************** */
            // SediTalks - Primera Sesión
            [
                'evento' => 'SediTalks - Primera Sesión',
                'correo_persona' => 'dasanchezca@unitru.edu.pe',//Daniel Angel Sanchez Cabrera - DP
                'rol' => 'Participante',
            ],
            // SediTalks - Segunda Sesión
            [
                'evento' => 'SediTalks - Segunda Sesión',
                'correo_persona' => 'dasanchezca@unitru.edu.pe',//Daniel Angel Sanchez Cabrera - DP
                'rol' => 'Participante',
            ],
            // SediPatitas - Campaña de Adopción
            [
                'evento' => 'SediPatitas - Campaña de Adopción',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',//Maria Celine Huaman Martinez - DP
                'rol' => 'Participante',
            ],
            // SediPatitas - Jornada de Vacunación
            [
                'evento' => 'SediPatitas - Jornada de Vacunación',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',//Maria Celine Huaman Martinez - DP
                'rol' => 'Participante',
            ],
            // Taller: Introducción a la Programación
            [
                'evento' => 'Taller: Introducción a la Programación',
                'correo_persona' => 'dnalayosi@unitru.edu.pe',//Dalery Nicoll Alayo Sifuentes - DP
                'rol' => 'Participante',
            ],
            // Taller: Desarrollo Web Básico
            [
                'evento' => 'Taller: Desarrollo Web Básico',
                'correo_persona' => 'dnalayosi@unitru.edu.pe',//Dalery Nicoll Alayo Sifuentes - DP
                'rol' => 'Participante',
            ],
            // Asamblea General SEDIPRO UNT 2025
            [
                'evento' => 'Asamblea General SEDIPRO UNT 2025',
                'correo_persona' => 't1051300621@unitru.edu.pe',//Lucía de Fátima Amaya Cáceda - Presidenta 2025
                'rol' => 'Participante',
            ],
            [
                'evento' => 'Asamblea General SEDIPRO UNT 2025',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Valeria Pereda Llave - Vicepresidenta 2025
                'rol' => 'Participante',
            ],
        ];

        foreach ($personasEnEventos as $personaEnEvento) {
            $evento = Evento::where('nombre', $personaEnEvento['evento'])->first();
            $persona = Persona::where('correo_institucional', $personaEnEvento['correo_persona'])->first();

            if ($evento && $persona) {
                $evento->personas()->attach($persona->id, [
                    'rol' => $personaEnEvento['rol']
                ]);
            }
        }
    }
}
