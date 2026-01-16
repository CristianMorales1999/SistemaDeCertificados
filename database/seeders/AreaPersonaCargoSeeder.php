<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
use App\Models\Persona;
use App\Models\AreaPersona;
use App\Models\Cargo;
use App\Models\Proyecto;
use App\Models\AreaPersonaCargo;

class AreaPersonaCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /***
         * Estados posibles para personas en áreas que ocupan un cargo:
         * 
            'Cargo activo',
            'Cambio de cargo',
            'Retiro voluntario de cargo',
            'Retiro de cargo por bajo rendimiento',
            'Cargo finalizado',
         */

        /***
         * Cargos disponibles para personas en áreas:
         * 
         * CARGOS INTERNOS:
            'Presidente SEDIPRO UNT',
            'Vicepresidente SEDIPRO UNT',
            'Director de GTH SEDIPRO UNT',
            'Director de LTK&FNZ SEDIPRO UNT',
            'Director de MKT SEDIPRO UNT',
            'Director de PMO SEDIPRO UNT',
            'Director de TI SEDIPRO UNT',

            'Director de Proyecto',
            'Codirector de Proyecto',
            'Coordinador de Proyecto',

         * CARGOS EXTERNOS:
            'Presidente',
            'Director General',
            'Jefe',

            'Patrocinador',//Sponsor Sedipro UNT
         */

        $personasConCargo=[
            /********************************************
              ********* DIRECTIVAS SEDIPRO UNT **********
              ******************************************* */
            /************************************
              ********* DIRECTIVA 2025 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'PMO',//Area de la persona que desempeña el cargo
                'correo_persona' => 't1051300621@unitru.edu.pe',//lucia Amaya | Correo institucional unico de la persona que desempeña el cargo
                'cargo' => 'Presidente SEDIPRO UNT',//Nombre del cargo
                'proyecto' => NULL, //NULL solo si el cargo desempeñado no esta asociado a ningun proyecto determinado
                'fecha_inicio' => '2025-03-19',//Fecha en que empezó a desempeñar el cargo
                'fecha_fin' => NULL,//NULL solo si aún sigue desempeñando el cargo 
                'estado' =>'Cargo activo',//Estado actual del cargo desempeñado
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'GTH',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Pereda
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Gonzales
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Rodriguez
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1024000721@unitru.edu.pe',//Angel Iparraguirre
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'mfherrerace@unitru.edu.pe',//Mafer Herrera
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) TI
                'area' => 'TI',
                'correo_persona' => 'chmoralese@unitru.edu.pe',//Cristian Morales
                'cargo' => 'Director de TI SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            /************************************
              ********* DIRECTIVA 2024 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'PMO',
                'correo_persona' => 't010100820@unitru.edu.pe',//Cinthya Gil
                'cargo' => 'Presidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'GTH',
                'correo_persona' => 't1052500521@unitru.edu.pe',//Romina Seclen
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't020101420@unitru.edu.pe',//Bricelly Ruiz
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1512400421@unitru.edu.pe',//Sebastian Facundo
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1510100321@unitru.edu.pe',//Adeli Valverde
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 't510100520@unitru.edu.pe',//Ivanna Vela
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) TI
                'area' => 'TI',
                'correo_persona' => 'chmoralese@unitru.edu.pe',//Cristian Morales
                'cargo' => 'Director de TI SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            /************************************
              ********* DIRECTIVA 2023 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'PMO',
                'correo_persona' => 't534000120@unitru.edu.pe',//Micaela Cardenas
                'cargo' => 'Presidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2023-03-31',//Empezó a desempeñar el cargo el 31 de Marzo de 2023
                'fecha_fin' => '2024-04-19',//Finalizó el cargo el 19 de Abril de 2024
                'estado' =>'Cargo finalizado',
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'GTH',
                'correo_persona' => 't050101120@unitru.edu.pe',//Alejandra Ruiz
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2023-03-31',//Empezó a desempeñar el cargo el 31 de Marzo de 2023
                'fecha_fin' => '2024-04-19',//Finalizó el cargo el 19 de Abril de 2024
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't510601520@unitru.edu.pe',//Yessenia Angulo
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2023-03-31',//Empezó a desempeñar el cargo el 31 de Marzo de 2023
                'fecha_fin' => '2024-04-19',//Finalizó el cargo el 19 de Abril de 2024
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 'ejzeladav@unitru.edu.pe',//Edwin Zelada
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2023-03-31',//Empezó a desempeñar el cargo el 31 de Marzo de 2023
                'fecha_fin' => '2024-04-19',//Finalizó el cargo el 19 de Abril de 2024
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 'waparedesr@unitru.edu.pe',//Willian Paredes
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2023-03-31',//Empezó a desempeñar el cargo el 31 de Marzo de 2023
                'fecha_fin' => '2024-04-19',//Finalizó el cargo el 19 de Abril de 2024
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'evalencia@unitru.edu.pe',//Edwin Valencia
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2023-03-31',//Empezó a desempeñar el cargo el 31 de Marzo de 2023
                'fecha_fin' => '2023-12-04',//Se retiró voluntariamente de SEDIPRO el 04 de Diciembre de 2023
                'estado' =>'Retiro voluntario de cargo',
            ],
            [
                //DIRECTOR(A) REEMPLAZO DE PMO
                'area' => 'PMO',
                'correo_persona' => 't510100520@unitru.edu.pe',//Ivanna Vela
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2023-12-04',//Empezó a desempeñar el cargo el 04 de Diciembre de 2023
                'fecha_fin' => '2024-04-19',//finalizó el cargo el 19 de Abril de 2024
                'estado' =>'Cargo finalizado',
            ],
            /************************************
              ********* DIRECTIVA 2022 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'PMO',
                'correo_persona' => 'aecabrerag@unitru.edu.pe',//Angie Cabrera
                'cargo' => 'Presidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2022-03-29',//Empezó a desempeñar el cargo el 29 de Marzo de 2022
                'fecha_fin' => '2023-03-30',//Finalizó el cargo el 30 de Marzo de 2023
                'estado' =>'Cargo finalizado',
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'PMO',
                'correo_persona' => 't534000120@unitru.edu.pe',//Micaela Cardenas
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2022-03-29',//Empezó a desempeñar el cargo el 29 de Marzo de 2022
                'fecha_fin' => '2023-03-30',//Finalizó el cargo el 30 de Marzo de 2023
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't050101120@unitru.edu.pe',//Alejandra Ruiz
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2022-03-29',//Empezó a desempeñar el cargo el 29 de Marzo de 2022
                'fecha_fin' => '2023-03-30',//Finalizó el cargo el 30 de Marzo de 2023
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 'dnvillanuevav@unitru.edu.pe',//Danjhel Villanueva
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2022-03-29',//Empezó a desempeñar el cargo el 29 de Marzo de 2022
                'fecha_fin' => '2023-03-30',//Finalizó el cargo el 30 de Marzo de 2023
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 'epinedog@unitru.edu.pe',//Elian Pinedo
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2022-03-29',//Empezó a desempeñar el cargo el 29 de Marzo de 2022
                'fecha_fin' => '2023-03-30',//Finalizó el cargo el 30 de Marzo de 2023
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'hcubenos@unitru.edu.pe',//Hans Cubeños
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2022-03-29',//Empezó a desempeñar el cargo el 29 de Marzo de 2022
                'fecha_fin' => '2023-03-30',//Finalizó el cargo el 30 de Marzo de 2023
                'estado' =>'Cargo finalizado',
            ],
            /************************************
              ********* DIRECTIVA 2021 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'GTH',
                'correo_persona' => 'mcarranzar@unitru.edu.pe',//Melva Noemi Carranza Rodriguez
                'cargo' => 'Presidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2021-02-21',//Empezó a desempeñar el cargo el 21 de Febrero de 2021
                'fecha_fin' => '2022-03-28',//Finalizó el cargo el 28 de Marzo de 2022
                'estado' =>'Cargo finalizado',
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'GTH',
                'correo_persona' => 'lhurtados@unitru.edu.pe',//Lucciana Hurtado
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2021-02-21',//Empezó a desempeñar el cargo el 21 de Febrero de 2021
                'fecha_fin' => '2022-03-28',//Finalizó el cargo el 28 de Marzo de 2022
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 'jvasquezl@unitru.edu.pe',//José Vasquez
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2021-02-21',//Empezó a desempeñar el cargo el 21 de Febrero de 2021
                'fecha_fin' => '2022-03-28',//Finalizó el cargo el 28 de Marzo de 2022
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 'jbarboza@unitru.edu.pe',//Jemina Barboza
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2021-02-21',//Empezó a desempeñar el cargo el 21 de Febrero de 2021
                'fecha_fin' => '2022-03-28',//Finalizó el cargo el 28 de Marzo de 2022
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 'bguzman@unitru.edu.pe',//Bagner Guzman
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2021-02-21',//Empezó a desempeñar el cargo el 21 de Febrero de 2021
                'fecha_fin' => '2022-03-28',//Finalizó el cargo el 28 de Marzo de 2022
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'pvasquez@unitru.edu.pe',//Pablo Vasquez
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2021-02-21',//Empezó a desempeñar el cargo el 21 de Febrero de 2021
                'fecha_fin' => '2022-03-28',//Finalizó el cargo el 28 de Marzo de 2022
                'estado' =>'Cargo finalizado',
            ],
            /************************************
              ********* DIRECTIVA 2020 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'LTK & FNZ',
                'correo_persona' => 'sfigueroao@unitru.edu.pe',//Stephanie Figueroa
                'cargo' => 'Presidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2020-06-22',//Empezó a desempeñar el cargo el 22 de Junio de 2020
                'fecha_fin' => '2021-02-20',//Finalizó el cargo el 20 de Febrero de 2021
                'estado' =>'Cargo finalizado',
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'LTK & FNZ',
                'correo_persona' => 'jcrespinc@unitru.edu.pe',//Jesabel Crespin
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2020-06-22',//Empezó a desempeñar el cargo el 22 de Junio de 2020
                'fecha_fin' => '2021-02-20',//Finalizó el cargo el 20 de Febrero de 2021
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 'mcarranzar@unitru.edu.pe',//Melva Noemi Carranza Rodriguez
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2020-06-22',//Empezó a desempeñar el cargo el 22 de Junio de 2020
                'fecha_fin' => '2021-02-20',//Finalizó el cargo el 20 de Febrero de 2021
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 'dmorenoa@unitru.edu.pe',//Diego Moreno
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2020-06-22',//Empezó a desempeñar el cargo el 22 de Junio de 2020
                'fecha_fin' => '2021-02-20',//Finalizó el cargo el 20 de Febrero de 2021
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 'rmejiaz@unitru.edu.pe',//Rogger Manuel Mejia Zuñiga
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2020-06-22',//Empezó a desempeñar el cargo el 22 de Junio de 2020
                'fecha_fin' => '2021-02-20',//Finalizó el cargo el 20 de Febrero de 2021
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'mbedono@unitru.edu.pe',//Mauricio Bedon Oliva
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2020-06-22',//Empezó a desempeñar el cargo el 22 de Junio de 2020
                'fecha_fin' => '2021-02-20',//Finalizó el cargo el 20 de Febrero de 2021
                'estado' =>'Cargo finalizado',
            ],
            /************************************
              ********* PROYECTOS 2025 **********
              *********************************** */
              /***********************************
                ***** PROYECTO : SEDITALKS *******
                ***********************************/
                /**  
                    - DP: Daniel Angel Sanchez Cabrera - PMO
                    Coordinadores de proyecto:
                        - Mariann Estefany Fernández Leyva - GTH
                        - Kevin Gamaliel Rodriguez Alfaro - LTK & FNZ
                        - Luis Angel Lecca Cortez - MKT
                        - Ruben Darío Alcántara Toribio - PMO
                        - Renato Alexander Martinez Aguilar - TI
                **/
                //DP: SEDITALKS
                [
                    'area' => 'PMO',
                    'correo_persona' => 'dasanchezca@unitru.edu.pe',//Daniel Angel Sanchez Cabrera
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'SEDITALKS',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-30',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: SEDITALKS
                    'area' => 'GTH',
                    'correo_persona' => 't1050102021@unitru.edu.pe',//Mariann Estefany Fernández Leyva
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SEDITALKS',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SEDITALKS
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't1510101021@unitru.edu.pe',//Kevin Gamaliel Rodriguez Alfaro
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SEDITALKS',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SEDITALKS
                    'area' => 'MKT',
                    'correo_persona' => 'lleccac@unitru.edu.pe',//Luis Angel Lecca Cortez
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SEDITALKS',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SEDITALKS
                    'area' => 'PMO',
                    'correo_persona' => 't1051300821@unitru.edu.pe',//Ruben Darío Alcántara Toribio
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SEDITALKS',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SEDITALKS
                    'area' => 'TI',
                    'correo_persona' => 'ramartinezag@unitru.edu.pe',//Renato Alexander Martinez Aguilar
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SEDITALKS',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-30',
                    'estado' =>'Cargo finalizado',
                ],

              /**************************************
                ***** PROYECTO : SediPatitas ********
                **************************************/
                /**  
                    - DP: Maria Celine Huaman Martinez - PMO
                    Coordinadores de proyecto:
                        - Anderson Alexander Saavedra Nolasco - GTH
                        - Diego Andree Garro Taboada - LTK & FNZ
                        - Yojhania Taitt Gonzales Contreras - MKT
                        - Diego Alonso Gutierrez Vasquez - PMO
                        - Marco Camilo Toledo Campos - TI
                **/
                [
                    //DP: SediPatitas
                    'area' => 'PMO',
                    'correo_persona' => 'mhuamanm@unitru.edu.pe',//Maria Celine Huaman Martinez
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'SediPatitas',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-08-08',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: SediPatitas
                    'area' => 'GTH',
                    'correo_persona' => 'aasaavedrano@unitru.edu.pe',//Anderson Alexander Saavedra Nolasco
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SediPatitas',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-08-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SediPatitas
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'dgarro@unitru.edu.pe',//Diego Andree Garro Taboada
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SediPatitas',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-08-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SediPatitas
                    'area' => 'MKT',
                    'correo_persona' => 't1510102521@unitru.edu.pe',//Yojhania Taitt Gonzales Contreras
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SediPatitas',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-08-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SediPatitas
                    'area' => 'PMO',
                    'correo_persona' => 'dgutierrezva@unitru.edu.pe',//Diego Alonso Gutierrez Vasquez
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SediPatitas',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-08-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: SediPatitas
                    'area' => 'TI',
                    'correo_persona' => 't022700720@unitru.edu.pe',//Marco Camilo Toledo Campos
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'SediPatitas',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-08-08',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************************
                ***** PROYECTO : Amigos de la Tecnología ********
                **************************************************/
                /**  
                    - DP: Dalery Nicoll Alayo Sifuentes - PMO
                    Coordinadores de proyecto:
                        - Corina Marilu Sanchez Delgado - GTH
                        - Nestor Rafael Placencia De la Cruz - LTK & FNZ
                        - Maite Palacios Astor - MKT
                        - Jeoselyn Maribel Espejo Rodriguez - PMO
                        - Mirella Esteffany Gamboa Valderrama - TI
                **/
                [
                    //DP: Amigos de la Tecnología
                    'area' => 'PMO',
                    'correo_persona' => 'dnalayosi@unitru.edu.pe',//Dalery Nicoll Alayo Sifuentes
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'Amigos de la Tecnología',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-12',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: Amigos de la Tecnología
                    'area' => 'GTH',
                    'correo_persona' => 'csanchezd@unitru.edu.pe',//Corina Marilu Sanchez Delgado
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Amigos de la Tecnología',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Amigos de la Tecnología
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'nrplasenciade@unitru.edu.pe',//Nestor Rafael Placencia De la Cruz
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Amigos de la Tecnología',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Amigos de la Tecnología
                    'area' => 'MKT',
                    'correo_persona' => 'mpalaciosas@unitru.edu.pe',//Maite Palacios Astor
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Amigos de la Tecnología',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Amigos de la Tecnología
                    'area' => 'PMO',
                    'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Amigos de la Tecnología',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Amigos de la Tecnología
                    'area' => 'TI',
                    'correo_persona' => 'mgamboav@unitru.edu.pe',//Mirella Esteffany Gamboa Valderrama
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Amigos de la Tecnología',
                    'fecha_inicio' => '2025-05-18',
                    'fecha_fin' => '2025-07-12',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************************
                ********** PROYECTO : NAVISEDIPRO 9.0 ***********
                **************************************************/
                /**  
                    - DP: Angela Xiomara Loayza Gutierrez - PMO
                    Coordinadores de proyecto:
                        - Cristhian Luis David Sánchez Obeso - GTH
                        - Priscila Crystal Villegas Dominguez - LTK & FNZ
                        - Lorena Midalís Primo Bueno - MKT
                        - Ariana Morales Ipanaqué - PMO
                        - Renato Alexander Martinez Aguilar - TI
                **/
                [
                    //DP: NAVISEDIPRO 9.0
                    'area' => 'PMO',
                    'correo_persona' => 'axloayzag@unitru.edu.pe',//Angela Xiomara Loayza Gutierrez
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 9.0',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2026-01-12',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: NAVISEDIPRO 9.0
                    'area' => 'GTH',
                    'correo_persona' => 'clsanchezo@unitru.edu.pe',//Cristhian Luis David Sánchez Obeso
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 9.0',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2026-01-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: NAVISEDIPRO 9.0
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'pcvillegasdo@unitru.edu.pe',//Priscila Crystal Villegas Dominguez
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 9.0',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2026-01-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: NAVISEDIPRO 9.0
                    'area' => 'MKT',
                    'correo_persona' => 'lmprimob@unitru.edu.pe',//Lorena Midalís Primo Bueno
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 9.0',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2026-01-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: NAVISEDIPRO 9.0
                    'area' => 'PMO',
                    'correo_persona' => 'amoralesi@unitru.edu.pe',//Ariana Morales Ipanaqué
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 9.0',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2026-01-12',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: NAVISEDIPRO 9.0
                    'area' => 'TI',
                    'correo_persona' => 'ramartinezag@unitru.edu.pe',//Renato Alexander Martinez Aguilar
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 9.0',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2026-01-12',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************************
                ****** PROYECTO : Gestión de Proyectos 360 ******
                **************************************************/
                /**  
                    - DP: José Daniel Avila Santillan - GTH
                    - DP: Diego Alonso Gutierrez Vasquez - PMO
                    Coordinadores de proyecto:
                        - Joaquin Adriano Bocanegra Peláez - GTH
                        - Nory Ann Marie Touzet Meneses - LTK & FNZ
                        - Cielo Valentina Abanto Rojas - MKT
                        - Abel Maximiliano Pereda Cabanillas - PMO
                        - Luis Angel Morales Lino - TI
                **/
                [
                    //DP: Gestión de Proyectos 360
                    'area' => 'GTH',
                    'correo_persona' => 'jdavilas@unitru.edu.pe',//José Daniel Avila Santillan
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'Gestión de Proyectos 360',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2025-12-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //DP: Gestión de Proyectos 360
                    'area' => 'PMO',
                    'correo_persona' => 'dgutierrezva@unitru.edu.pe',//Diego Alonso Gutierrez Vasquez
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'Gestión de Proyectos 360',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2025-12-30',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: Gestión de Proyectos 360
                    'area' => 'GTH',
                    'correo_persona' => 'jabocanegrap@unitru.edu.pe',//Joaquin Adriano Bocanegra Peláez
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Gestión de Proyectos 360',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2025-12-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Gestión de Proyectos 360
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'ntouzet@unitru.edu.pe',//Nory Ann Marie Touzet Meneses
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Gestión de Proyectos 360',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2025-12-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Gestión de Proyectos 360
                    'area' => 'MKT',
                    'correo_persona' => 'cvabantor@unitru.edu.pe',//Cielo Valentina Abanto Rojas
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Gestión de Proyectos 360',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2025-12-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Gestión de Proyectos 360
                    'area' => 'PMO',
                    'correo_persona' => 'amperedaca@unitru.edu.pe',//Abel Maximiliano Pereda Cabanillas
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Gestión de Proyectos 360',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2025-12-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: Gestión de Proyectos 360
                    'area' => 'TI',
                    'correo_persona' => 't012700620@unitru.edu.pe',//Luis Angel Morales Lino
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Gestión de Proyectos 360',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => '2025-12-30',
                    'estado' =>'Cargo finalizado',
                ],
                
              /***********************************************
                ******* PROYECTO : CHEQUEATE UNT *************
                ***********************************************/
                /**  
                    - DP: Nashaly Nicolle Alama Terrones - GTH
                    Coordinadores de proyecto:
                        - Corina Marilu Sanchez Delgado - GTH
                        - Grecia Alexandra Paredes Cachique - LTK & FNZ
                        - Adriana Gabriela Castillo Ochoa - MKT
                        - Daniel Angel Sanchez Cabrera - PMO
                        - Marco Camilo Toledo Campos - TI
                **/
                [
                    //DP: CHEQUEATE UNT
                    'area' => 'GTH',
                    'correo_persona' => 'nalama@unitru.edu.pe',//Nashaly Nicolle Alama Terrones
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'CHEQUEATE UNT',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: CHEQUEATE UNT
                    'area' => 'GTH',
                    'correo_persona' => 'csanchezd@unitru.edu.pe',//Corina Marilu Sanchez Delgado
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'CHEQUEATE UNT',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: CHEQUEATE UNT
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'gaparedesca@unitru.edu.pe',//Grecia Alexandra Paredes Cachique
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'CHEQUEATE UNT',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: CHEQUEATE UNT
                    'area' => 'MKT',
                    'correo_persona' => 'acastilloo@unitru.edu.pe',//Adriana Gabriela Castillo Ochoa
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'CHEQUEATE UNT',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: CHEQUEATE UNT
                    'area' => 'PMO',
                    'correo_persona' => 'dasanchezca@unitru.edu.pe',//Daniel Angel Sanchez Cabrera
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'CHEQUEATE UNT',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: CHEQUEATE UNT
                    'area' => 'TI',
                    'correo_persona' => 't022700720@unitru.edu.pe',//Marco Camilo Toledo Campos
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'CHEQUEATE UNT',
                    'fecha_inicio' => '2025-10-22',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
              /*******************************************************
                ******** PROYECTO : Proyectando Vocaciones 3.0 *******
                *******************************************************/
                /**  
                    - DP: Cielo Valentina Abanto Rojas - MKT
                    Coordinadores de proyecto:
                        - Eleanor Marycielo Roca Mendoza - GTH(Duda)
                        - Fabián Nicolas Paredes Calderón - LTK & FNZ
                        - Lorena Midalís Primo Bueno - MKT
                        - Abel Maximiliano Pereda Cabanillas - PMO
                        - Sadhú Rojas García - TI
                **/
                [
                    //DP: Proyectando Vocaciones 3.0
                    'area' => 'MKT',
                    'correo_persona' => 'cvabantor@unitru.edu.pe',//Cielo Valentina Abanto Rojas
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'Proyectando Vocaciones 3.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: Proyectando Vocaciones 3.0
                    'area' => 'GTH',
                    'correo_persona' => 'emrocam@unitru.edu.pe',//Eleanor Marycielo Roca Mendoza
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Proyectando Vocaciones 3.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Proyectando Vocaciones 3.0
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'fnparedesca@unitru.edu.pe',//Fabián Nicolas Paredes Calderón
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Proyectando Vocaciones 3.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Proyectando Vocaciones 3.0
                    'area' => 'MKT',
                    'correo_persona' => 'lmprimob@unitru.edu.pe',//Lorena Midalís Primo Bueno
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Proyectando Vocaciones 3.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Proyectando Vocaciones 3.0
                    'area' => 'PMO',
                    'correo_persona' => 'amperedaca@unitru.edu.pe',//Abel Maximiliano Pereda Cabanillas
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Proyectando Vocaciones 3.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Proyectando Vocaciones 3.0
                    'area' => 'TI',
                    'correo_persona' => 't012701020@unitru.edu.pe',//Sadhú Rojas García
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Proyectando Vocaciones 3.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
              /*************************************************
                ******** PROYECTO : Camping 6.0 ****************
                *************************************************/
                /**  
                    - DP: Christian Rodrigo Valverde Caspito - LTK & FNZ
                    - DP: Kevin Gamaliel Rodriguez Alfaro - LTK & FNZ
                    Coordinadores de proyecto:
                        - Nashaly Nicolle Alama Terrones - GTH
                        - Kiara Marife Rodriguez Sifuentes - LTK & FNZ
                        - Belinda Maricielo Arroyo Esquivel - MKT
                        - Rodrigo Alexander Quispe Cortijo - PMO
                        - Luis Angel Morales Lino - TI
                **/
                [
                    //DP: Camping 6.0
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'crvalverdeca@unitru.edu.pe',//Christian Rodrigo Valverde Caspito
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'Camping 6.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //DP: Camping 6.0
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't1510101021@unitru.edu.pe',//Kevin Gamaliel Rodriguez Alfaro
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'Camping 6.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: Camping 6.0
                    'area' => 'GTH',
                    'correo_persona' => 'nalama@unitru.edu.pe',//Nashaly Nicolle Alama Terrones
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Camping 6.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Camping 6.0
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'krodriguezsi@unitru.edu.pe',//Kiara Marife Rodriguez Sifuentes
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Camping 6.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Camping 6.0
                    'area' => 'MKT',
                    'correo_persona' => 'barroyo@unitru.edu.pe',//Belinda Maricielo Arroyo Esquivel
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Camping 6.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Camping 6.0
                    'area' => 'PMO',
                    'correo_persona' => 'raquispeco@unitru.edu.pe',//Rodrigo Alexander Quispe Cortijo
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Camping 6.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
                [
                    //Coordinador: Camping 6.0
                    'area' => 'TI',
                    'correo_persona' => 't012700620@unitru.edu.pe',//Luis Angel Morales Lino
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'Camping 6.0',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],
              /*************************************************
                ******** PROYECTO : Elecciones 2026 *************
                **************************************************/
                /**  
                    - DP: Luis Angel Laureano Escobedo - LTK & FNZ
                    Coordinadores de proyecto:
                        - Aún no se han definido los coordinadores de proyecto
                **/
                [
                    //DP: Elecciones 2026
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't1511300521@unitru.edu.pe',//Luis Angel Laureano Escobedo
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'Elecciones 2026',
                    'fecha_inicio' => '2026-01-04',
                    'fecha_fin' => NULL,
                    'estado' =>'Cargo activo',
                ],

            /************************************
              ********* PROYECTOS 2024 **********
              *********************************** */
              /*************************************
                ******** PROYECTO : IPMC ***********
                *************************************/
                /**  
                    - DP: Giancarlo José Benavides Rodriguez - PMO
                    - CO-DP: Maria Fernanda de la Caridad Herrera Cerquín - PMO
                **/
                [
                    //DP: IPMC
                    'area' => 'PMO',
                    'correo_persona' => 't450100220@unitru.edu.pe',//Giancarlo José Benavides Rodriguez
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'IPMC',
                    'fecha_inicio' => '2024-04-18',
                    'fecha_fin' => '2024-09-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //CO-DP: IPMC
                    'area' => 'PMO',
                    'correo_persona' => 'mfherrerace@unitru.edu.pe',//Maria Fernanda de la Caridad Herrera Cerquín
                    'cargo' => 'Codirector de Proyecto',
                    'proyecto' => 'IPMC',
                    'fecha_inicio' => '2024-04-18',
                    'fecha_fin' => '2024-09-08',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************
                ******** PROYECTO : RENACER *********
                **************************************/
                /**  
                    - DP: Lesly Fiorella Pérez Rodríguez - MKT
                    Coordinadores de proyecto:
                        - Dulce Geraldine Chavez Padilla - GTH
                        - Nestor Rafael Placencia De la Cruz - LTK & FNZ
                        - Stefany Isabel Gutierrez Vega - MKT
                        - Giancarlo José Benavides Rodriguez - PMO
                **/
                [
                    //DP: RENACER
                    'area' => 'MKT',
                    'correo_persona' => 't028100120@unitru.edu.pe',//Lesly Fiorella Pérez Rodríguez
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'RENACER',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-30',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: RENACER
                    'area' => 'GTH',
                    'correo_persona' => 't1051302521@unitru.edu.pe',//Dulce Geraldine Chavez Padilla
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'RENACER',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: RENACER
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 'nrplasenciade@unitru.edu.pe',//Nestor Rafael Placencia De la Cruz
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'RENACER',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: RENACER
                    'area' => 'MKT',
                    'correo_persona' => 't1510101221@unitru.edu.pe',//Stefany Isabel Gutierrez Vega
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'RENACER',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-30',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: RENACER
                    'area' => 'PMO',
                    'correo_persona' => 't450100220@unitru.edu.pe',//Giancarlo José Benavides Rodriguez
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'RENACER',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-30',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************************
                ******** PROYECTO : MIS AMIGOS LOS LIBROS *******
                **************************************************/
                /**  
                    - DP: Marina Lizeth Gonzales Torres - GTH
                    Coordinadores de proyecto:
                        - Luz Karina Angulo Urbina - GTH
                        - Jean Cristopher Elias León Mallqui - LTK & FNZ
                        - Cielo Valentina Abanto Rojas - MKT
                        - Alexandra Brighit Valverde Escobar - PMO
                        - Rommel Eduardo Ulco Chavarria - TI
                **/
                [
                    //DP: MIS AMIGOS LOS LIBROS
                    'area' => 'GTH',
                    'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Lizeth Gonzales Torres
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'MIS AMIGOS LOS LIBROS',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-31',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: MIS AMIGOS LOS LIBROS
                    'area' => 'GTH',
                    'correo_persona' => 'lkangulour@unitru.edu.pe',//Luz Karina Angulo Urbina
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'MIS AMIGOS LOS LIBROS',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-31',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: MIS AMIGOS LOS LIBROS
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't513701420@unitru.edu.pe',//Jean Cristopher Elias León Mallqui
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'MIS AMIGOS LOS LIBROS',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-31',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: MIS AMIGOS LOS LIBROS
                    'area' => 'MKT',
                    'correo_persona' => 'cvabantor@unitru.edu.pe',//Cielo Valentina Abanto Rojas
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'MIS AMIGOS LOS LIBROS',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-31',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: MIS AMIGOS LOS LIBROS
                    'area' => 'PMO',
                    'correo_persona' => 'avelarde@unitru.edu.pe',//Alexandra Brighit Valverde Escobar
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'MIS AMIGOS LOS LIBROS',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-31',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: MIS AMIGOS LOS LIBROS
                    'area' => 'TI',
                    'correo_persona' => 'rulco@unitru.edu.pe',//Rommel Eduardo Ulco Chavarria
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'MIS AMIGOS LOS LIBROS',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-10-31',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************************
                ******** PROYECTO : PROYECTATE COMO CAPM ********
                **************************************************/
                /**  
                    - DP: Aitana Sofía Requejo Valle - GTH
                    Coordinadores de proyecto:
                        - Silvana Valeria Pereda Llave - GTH
                        - Dajhana del Rocio Rivera Medina - LTK & FNZ
                        - César Arturo Ulloa Torres - MKT
                        - Jeoselyn Maribel Espejo Rodriguez - PMO
                        - Anthony Jhonatan Osorio Trujillo - TI
                **/
                [
                    //DP: PROYECTATE COMO CAPM
                    'area' => 'GTH',
                    'correo_persona' => 't050100720@unitru.edu.pe',//Aitana Sofía Requejo Valle
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'PROYECTATE COMO CAPM',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-11-01',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: PROYECTATE COMO CAPM
                    'area' => 'GTH',
                    'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Valeria Pereda Llave
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTATE COMO CAPM',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-11-01',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTATE COMO CAPM
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't020100520@unitru.edu.pe',//Dajhana del Rocio Rivera Medina
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTATE COMO CAPM',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-11-01',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTATE COMO CAPM
                    'area' => 'MKT',
                    'correo_persona' => 't050700220@unitru.edu.pe',//César Arturo Ulloa Torres
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTATE COMO CAPM',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-11-01',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTATE COMO CAPM
                    'area' => 'PMO',
                    'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTATE COMO CAPM',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-11-01',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTATE COMO CAPM
                    'area' => 'TI',
                    'correo_persona' => 'ajosoriot@unitru.edu.pe',//Anthony Jhonatan Osorio Trujillo
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTATE COMO CAPM',
                    'fecha_inicio' => '2024-08-20',
                    'fecha_fin' => '2024-11-01',
                    'estado' =>'Cargo finalizado',
                ],
              /********************************************
                ******** PROYECTO : WEBINARS **************
                ********************************************/
                /**  
                    - DP: Jeoselyn Maribel Espejo Rodriguez - PMO
                    Coordinadores de proyecto:
                        - Maria Fernanda Cárdenas Hidalgo - MKT
                        - Diego Alejandro Mostacero Lecca - PMO
                **/
                [
                    //DP: WEBINARS
                    'area' => 'PMO',
                    'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'WEBINARS',
                    'fecha_inicio' => '2024-07-10',
                    'fecha_fin' => '2024-10-28',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: WEBINARS
                    'area' => 'MKT',
                    'correo_persona' => 'mcardenash@unitru.edu.pe',//Maria Fernanda Cárdenas Hidalgo
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'WEBINARS',
                    'fecha_inicio' => '2024-07-10',
                    'fecha_fin' => '2024-10-28',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: WEBINARS
                    'area' => 'PMO',
                    'correo_persona' => 't1020100121@unitru.edu.pe',//Diego Alejandro Mostacero Lecca
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'WEBINARS',
                    'fecha_inicio' => '2024-07-10',
                    'fecha_fin' => '2024-10-28',
                    'estado' =>'Cargo finalizado',
                ],
              /**********************************************
                ******** PROYECTO : CONCEPMI ****************
                **********************************************/
                /**  
                    - DP: Anahy Estrella Cruz Ulloa - TI
                **/
                [
                    //DP: CONCEPMI
                    'area' => 'TI',
                    'correo_persona' => 't053300720@unitru.edu.pe',//Anahy Estrella Cruz Ulloa
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'CONCEPMI',
                    'fecha_inicio' => '2024-03-22',
                    'fecha_fin' => '2024-12-01',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************************
                ******** PROYECTO : NAVISEDIPRO 8.0 *************
                **************************************************/
                /**  
                    - DP: Alexandra Brighit Valverde Escobar - PMO
                    - CO-DP: Jhosmel Anderson Vigo Cepeda - LTK & FNZ
                **/
                [
                    //DP: NAVISEDIPRO 8.0
                    'area' => 'PMO',
                    'correo_persona' => 'avelarde@unitru.edu.pe',//Alexandra Brighit Valverde Escobar
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 8.0',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2024-12-25',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //CO-DP: NAVISEDIPRO 8.0
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't1511601421@unitru.edu.pe',//Jhosmel Anderson Vigo Cepeda
                    'cargo' => 'Codirector de Proyecto',
                    'proyecto' => 'NAVISEDIPRO 8.0',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2024-12-25',
                    'estado' =>'Cargo finalizado',
                ],
              /**************************************************
                ******** PROYECTO : OLIMPOKAMPING ***************
                **************************************************/
                /**  
                    - DP: Diego Jesús Rodriguez Sabana - LTK & FNZ
                    - DP: Kevin Gamaliel Rodriguez Alfaro - LTK & FNZ
                    - CO-DP: Silvana Valeria Pereda Llave - GTH
                    - CO-DP: María Celine Huaman Martinez - PMO
                **/
                [
                    //DP NRO 1: OLIMPOKAMPING
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Jesús Rodriguez Sabana
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'OLIMPOKAMPING',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-02-27',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //DP NRO 2: OLIMPOKAMPING
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't1510101021@unitru.edu.pe',//Kevin Gamaliel Rodriguez Alfaro
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'OLIMPOKAMPING',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-02-27',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //CO-DP NRO 1: OLIMPOKAMPING
                    'area' => 'GTH',
                    'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Valeria Pereda Llave
                    'cargo' => 'Codirector de Proyecto',
                    'proyecto' => 'OLIMPOKAMPING',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-02-27',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //CO-DP NRO 2: OLIMPOKAMPING
                    'area' => 'PMO',
                    'correo_persona' => 'mhuamanm@unitru.edu.pe',//María Celine Huamán Martínez
                    'cargo' => 'Codirector de Proyecto',
                    'proyecto' => 'OLIMPOKAMPING',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-02-27',
                    'estado' =>'Cargo finalizado',
                ],
              /*********************************************************
                ******** PROYECTO : PROYECTANDO VOCACIONES 2.0 *********
                *********************************************************/
                /**  
                    - DP: Lucía de Fátima Amaya Cáceda - PMO
                    Coordinadores de proyecto:
                        - Silvana Valeria Pereda Llave - GTH
                        - Dajhana del Rocio Rivera Medina - LTK & FNZ
                        - Jhosmel Anderson Vigo Cepeda - LTK & FNZ
                        - Cielo Valentina Abanto Rojas - MKT
                        - Daniel Angel Sanchez Cabrera - PMO
                        - Braggi Jayson Bamberger Plasencia - TI
                **/
                [
                    //DP: PROYECTANDO VOCACIONES
                    'area' => 'PMO',
                    'correo_persona' => 't1051300621@unitru.edu.pe',//Lucía de Fátima Amaya Cáceda
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'PROYECTANDO VOCACIONES',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
                //COORDINADORES DE PROYECTO
                [
                    //Coordinador: PROYECTANDO VOCACIONES
                    'area' => 'GTH',
                    'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Valeria Pereda Llave
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTANDO VOCACIONES',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTANDO VOCACIONES
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't020100520@unitru.edu.pe',//Dajhana del Rocio Rivera Medina
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTANDO VOCACIONES',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTANDO VOCACIONES
                    'area' => 'LTK & FNZ',
                    'correo_persona' => 't1511601421@unitru.edu.pe',//Jhosmel Anderson Vigo Cepeda
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTANDO VOCACIONES',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTANDO VOCACIONES
                    'area' => 'MKT',
                    'correo_persona' => 'cvabantor@unitru.edu.pe',//Cielo Valentina Abanto Rojas
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTANDO VOCACIONES',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTANDO VOCACIONES
                    'area' => 'PMO',
                    'correo_persona' => 'dasanchezca@unitru.edu.pe',//Daniel Angel Sanchez Cabrera
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTANDO VOCACIONES',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
                [
                    //Coordinador: PROYECTANDO VOCACIONES
                    'area' => 'TI',
                    'correo_persona' => 'bbamberger@unitru.edu.pe',//Braggi Jayson Bamberger Plasencia
                    'cargo' => 'Coordinador de Proyecto',
                    'proyecto' => 'PROYECTANDO VOCACIONES',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
              /************************************************
                ******** PROYECTO : SEDIAWARDS ****************
                ************************************************/
                /**  
                    - DP: José Daniel Avila Santillan - GTH
                **/
                [
                    //DP: SEDIAWARDS
                    'area' => 'GTH',
                    'correo_persona' => 'jdavilas@unitru.edu.pe',//José Daniel Avila Santillan
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'SEDIAWARDS',
                    'fecha_inicio' => '2024-12-12',
                    'fecha_fin' => '2025-03-08',
                    'estado' =>'Cargo finalizado',
                ],
              /******************************************************
                ******** PROYECTO : CONCURSO DE MARKETING 2024 ******
                ******************************************************/
                /**  
                    - DP: José Efrain Calle Gutierrez - MKT
                **/
                [
                    //DP: CONCURSO DE MARKETING 2024
                    'area' => 'MKT',
                    'correo_persona' => 't010101220@unitru.edu.pe',//José Efrain Calle Gutierrez
                    'cargo' => 'Director de Proyecto',
                    'proyecto' => 'CONCURSO DE MARKETING 2024',
                    'fecha_inicio' => '2024-07-17',
                    'fecha_fin' => '2024-10-30',
                    'estado' =>'Cargo finalizado',
                ],
        ];

        foreach( $personasConCargo as $personaConCargo){
            $idArea=Area::where('abreviatura', $personaConCargo['area'])->first()->id;
            $idPersona = Persona::where('correo_institucional', $personaConCargo['correo_persona'])->first()->id;

            if($idArea!=NULL && $idPersona!=NULL){
                // Buscar el registro de area_persona que corresponde a esta combinación
                // Buscamos el registro más reciente que coincida con el área y persona
                // Si hay múltiples registros (cambios de área), tomamos el que esté activo en la fecha del cargo
                $areaPersona = AreaPersona::where('area_id', $idArea)
                    ->where('persona_id', $idPersona)
                    ->where('fecha_inicio', '<=', $personaConCargo['fecha_inicio'])
                    ->where(function($query) use ($personaConCargo) {
                        $query->whereNull('fecha_fin')
                              ->orWhere('fecha_fin', '>=', $personaConCargo['fecha_inicio']);
                    })
                    ->orderBy('fecha_inicio', 'desc')
                    ->first();
                
                // Si no encontramos uno que coincida con las fechas, buscamos el más reciente sin restricción de fechas
                if(!$areaPersona){
                    $areaPersona = AreaPersona::where('area_id', $idArea)
                        ->where('persona_id', $idPersona)
                        ->orderBy('fecha_inicio', 'desc')
                        ->first();
                }

                if($areaPersona){
                    //imprimir el area y la persona
                    //echo "Area: ".$personaConCargo['area']." - Persona: ".$personaConCargo['correo_persona']."\n";
                    
                    unset($personaConCargo['area']);
                    unset($personaConCargo['correo_persona']);

                    $personaConCargo['area_persona_id'] = $areaPersona->id;
                    $personaConCargo['cargo_id']=Cargo::where('nombre', $personaConCargo['cargo'])->first()->id;
                    unset($personaConCargo['cargo']);

                    if($personaConCargo['proyecto']!=NULL){
                        $personaConCargo['proyecto_id']=Proyecto::where('nombre', $personaConCargo['proyecto'])->first()->id;
                    }else{
                        $personaConCargo['proyecto_id']=NULL;
                    }
                    unset($personaConCargo['proyecto']);
                    AreaPersonaCargo::create($personaConCargo);
                } else {
                    echo "ERROR: No se encontró registro de area_persona para Area: ".$personaConCargo['area']." - Persona: ".$personaConCargo['correo_persona']."\n";
                }
            } else {
                echo "ERROR: No se encontró Area o Persona para Area: ".$personaConCargo['area']." - Persona: ".$personaConCargo['correo_persona']."\n";
            }
        }
    }
}
