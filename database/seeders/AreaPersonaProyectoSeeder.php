<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaPersona;
use App\Models\Proyecto;
use App\Models\Persona;
use App\Models\Area;

class AreaPersonaProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Roles posibles para personas en proyectos (según migración):
         * 
         * 'Miembro',
         * 'Staff de apoyo',
         */

        $personasEnProyectos = [
            /************************************
              ********* PROYECTOS 2025 **********
              *********************************** */
            // SEDITALKS - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 'dasanchezca@unitru.edu.pe',//Daniel Angel Sanchez Cabrera - DP
                'proyecto' => 'SEDITALKS',
                'rol' => 'Miembro',
            ],
            // SediPatitas - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',//Maria Celine Huaman Martinez - DP
                'proyecto' => 'SediPatitas',
                'rol' => 'Miembro',
            ],
            // Amigos de la Tecnología - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 'dnalayosi@unitru.edu.pe',//Dalery Nicoll Alayo Sifuentes - DP
                'proyecto' => 'Amigos de la Tecnología',
                'rol' => 'Miembro',
            ],
            // NAVISEDIPRO 9.0 - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 'axloayzag@unitru.edu.pe',//Angela Xiomara Loayza Gutierrez - DP
                'proyecto' => 'NAVISEDIPRO 9.0',
                'rol' => 'Miembro',
            ],
            // Gestión de Proyectos 360 - Miembros internos
            [
                'area' => 'GTH',
                'correo_persona' => 'jdavilas@unitru.edu.pe',//José Daniel Avila Santillan - DP
                'proyecto' => 'Gestión de Proyectos 360',
                'rol' => 'Miembro',
            ],
            // CHEQUEATE UNT - Miembros internos
            [
                'area' => 'GTH',
                'correo_persona' => 'nalama@unitru.edu.pe',//Nashaly Nicolle Alama Terrones - DP
                'proyecto' => 'CHEQUEATE UNT',
                'rol' => 'Miembro',
            ],
            /************************************
              ********* PROYECTOS 2024 **********
              *********************************** */
            // IPMC - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 'mfherrerace@unitru.edu.pe',//Maria Fernanda de la Caridad Herrera Cerquín - CO-DP
                'proyecto' => 'IPMC',
                'rol' => 'Miembro',
            ],
            // RENACER - Miembros internos
            [
                'area' => 'GTH',
                'correo_persona' => 't028100120@unitru.edu.pe',//Lesly Fiorella Pérez Rodríguez - DP
                'proyecto' => 'RENACER',
                'rol' => 'Miembro',
            ],
            // MIS AMIGOS LOS LIBROS - Miembros internos
            [
                'area' => 'GTH',
                'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Lizeth Gonzales Torres - DP
                'proyecto' => 'MIS AMIGOS LOS LIBROS',
                'rol' => 'Miembro',
            ],
            // PROYECTATE COMO CAPM - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 't050100720@unitru.edu.pe',//Aitana Sofía Requejo Valle - DP
                'proyecto' => 'PROYECTATE COMO CAPM',
                'rol' => 'Miembro',
            ],
            // WEBINARS - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez - DP
                'proyecto' => 'WEBINARS',
                'rol' => 'Miembro',
            ],
            // CONCEPMI - Miembros internos
            [
                'area' => 'LTK & FNZ',
                'correo_persona' => 't053300720@unitru.edu.pe',//Anahy Estrella Cruz Ulloa - DP
                'proyecto' => 'CONCEPMI',
                'rol' => 'Miembro',
            ],
            // NAVISEDIPRO 8.0 - Miembros internos
            [
                'area' => 'TI',
                'correo_persona' => 'avelarde@unitru.edu.pe',//Alexandra Brighit Valverde Escobar - DP
                'proyecto' => 'NAVISEDIPRO 8.0',
                'rol' => 'Miembro',
            ],
            [
                'area' => 'TI',
                'correo_persona' => 't1511601421@unitru.edu.pe',//Jhosmel Anderson Vigo Cepeda - CO-DP
                'proyecto' => 'NAVISEDIPRO 8.0',
                'rol' => 'Miembro',
            ],
            // OLIMPOKAMPING - Miembros internos
            [
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Jesús Rodriguez Sabana - DP
                'proyecto' => 'OLIMPOKAMPING',
                'rol' => 'Miembro',
            ],
            [
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1510101021@unitru.edu.pe',//Kevin Gamaliel Rodriguez Alfaro - CO-DP
                'proyecto' => 'OLIMPOKAMPING',
                'rol' => 'Miembro',
            ],
            [
                'area' => 'GTH',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Valeria Pereda Llave - CO-DP
                'proyecto' => 'OLIMPOKAMPING',
                'rol' => 'Miembro',
            ],
            [
                'area' => 'PMO',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',//María Celine Huamán Martínez - CO-DP
                'proyecto' => 'OLIMPOKAMPING',
                'rol' => 'Miembro',
            ],
            // PROYECTANDO VOCACIONES - Miembros internos
            [
                'area' => 'PMO',
                'correo_persona' => 't1051300621@unitru.edu.pe',//Lucía de Fátima Amaya Cáceda - DP
                'proyecto' => 'PROYECTANDO VOCACIONES',
                'rol' => 'Miembro',
            ],
            // SEDIAWARDS - Miembros internos
            [
                'area' => 'GTH',
                'correo_persona' => 'jdavilas@unitru.edu.pe',//José Daniel Avila Santillan - DP
                'proyecto' => 'SEDIAWARDS',
                'rol' => 'Miembro',
            ],
            // CONCURSO DE MARKETING 2024 - Miembros internos
            [
                'area' => 'MKT',
                'correo_persona' => 't010101220@unitru.edu.pe',//José Efrain Calle Gutierrez - DP
                'proyecto' => 'CONCURSO DE MARKETING 2024',
                'rol' => 'Miembro',
            ],
        ];

        foreach ($personasEnProyectos as $personaEnProyecto) {
            $area = Area::where('abreviatura', $personaEnProyecto['area'])->first();
            $persona = Persona::where('correo_institucional', $personaEnProyecto['correo_persona'])->first();
            $proyecto = Proyecto::where('nombre', $personaEnProyecto['proyecto'])->first();

            if ($area && $persona && $proyecto) {
                $areaPersona = AreaPersona::where('area_id', $area->id)
                    ->where('persona_id', $persona->id)
                    ->first();

                if ($areaPersona) {
                    $areaPersona->proyectos()->attach($proyecto->id, [
                        'rol' => $personaEnProyecto['rol']
                    ]);
                }
            }
        }
    }
}
