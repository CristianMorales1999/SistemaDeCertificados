<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
use App\Models\Persona;
use App\Models\AreaPersona;

class AreaPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /***
         * Estados posibles para personas en áreas:
         * 
            'Miembro activo',
            'Cambio de área',
            'Cargo en Directiva',
            'Retiro voluntario',
            'Retiro por bajo rendimiento',
            'Egresado',
         */
        $personasEnAreas = [
            /********************************************
              *************** DIRECTIVA 2025 ************
              ******************************************* */
            [
                //PRESIDENTA 2025
                'area' => 'PMO',
                'correo_persona' => 't1051300621@unitru.edu.pe',//lucia de fatima Amaya Caceda
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio de 2024
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //VICEPRESIDENTA
                'area' => 'GTH',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Pereda Llave
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 de Junio de 2024
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Gonzales Torres
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 De Mayo 2022
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Jesus Rodriguez Sabana
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK&FNZ el 01 de Junio de 2024
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1024000721@unitru.edu.pe',//Angel Iparraguirre Aguilar
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 de Junio de 2023
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'mfherrerace@unitru.edu.pe',//María Fernanda de la Caridad Herrera Cerquín
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio de 2023
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) TI
                'area' => 'TI',
                'correo_persona' => 'chmoralese@unitru.edu.pe',//Christian Anthony Morales Esquivel
                'fecha_inicio' => '2023-06-13',//Ingresó a TI el 13 de Junio de 2023
                'fecha_fin' =>NULL,
                'estado' =>'Cargo en Directiva',
            ],
            /********************************************
              *************** DIRECTIVA 2024 ************
              ******************************************* */
              [
                //PRESIDENTA 2025
                'area' => 'PMO',
                'correo_persona' => 't010100820@unitru.edu.pe',//Cinthya Gil
                'fecha_inicio' => '2022-05-10',//Ingresó a PMO el 10 de Mayo de 2022
                'fecha_fin' => '2025-03-17',//Egresó de PMO el 17 de Marzo 2025
                'estado' =>'Egresado',
            ],
            [
                //VICEPRESIDENTA
                'area' => 'GTH',
                'correo_persona' => 't1052500521@unitru.edu.pe',//Romina Seclen
                'fecha_inicio' => '2023-06-13',//Ingresó a GTH el 13 de Junio de 2023
                'fecha_fin' => '2025-11-19',//Se retiró voluntariamente de GTH el 19 de Noviembre de 2025
                'estado' =>'Retiro voluntario',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't020101420@unitru.edu.pe',//Bricelly Ruiz
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo de 2022
                'fecha_fin' => '2025-03-17',//Egresó de GTH el 17 de Marzo 2025
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1512400421@unitru.edu.pe',//Sebastian Facundo
                'fecha_inicio' => '2022-12-20',//Ingresó a LTK&FNZ el 20 de Diciembre 2022
                'fecha_fin' => NULL,
                'estado' =>'Miembro activo',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1510100321@unitru.edu.pe',//Adeli Valverde
                'fecha_inicio' => '2022-12-20',//Ingresó a MKT el 20 de Diciembre 2022
                'fecha_fin' => NULL,
                'estado' =>'Miembro activo',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 't510100520@unitru.edu.pe',//Ivanna Vela
                'fecha_inicio' => '2021-11-20',//Ingresó a PMO el 20 de Noviembre 2021
                'fecha_fin' => NULL,
                'estado' =>'Miembro activo',
            ],
                //DIRECTOR(A) TI
                //Aqui estuvo CHRISTIAN ANTHONY MORALES ESQUIVEL <chmoralese@unitru.edu.pe>
                    //- Director de TI-2025

            /********************************************
              *************** DIRECTIVA 2023 ************
              ******************************************* */
            [
                //PRESIDENTA-2023
                'area' => 'PMO',
                'correo_persona' => 't534000120@unitru.edu.pe',//Micaela Cardenas
                'fecha_inicio' => '2020-11-08',//Se cambió a PMO el 8 de Noviembre de 2020
                'fecha_fin' => '2025-03-17',//Egresó de PMO el 17 de Marzo 2025
                'estado' =>'Egresado',
            ],
            [
                //VICEPRESIDENTA-2023
                'area' => 'GTH',
                'correo_persona' => 't050101120@unitru.edu.pe',//Alejandra Ruiz
                'fecha_inicio' => '2020-11-08',//Ingresó a GTH el 8 de Noviembre de 2020
                'fecha_fin' => '2024-03-07',//Se retiró voluntariamente de GTH el 07 de Marzo de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //DIRECTORA DE GTH-2023
                'area' => 'GTH',
                'correo_persona' => 't510601520@unitru.edu.pe',//Yessenia Angulo
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2024-03-02',//Se retiró voluntariamente de GTH el 02 de Marzo de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //DIRECTOR DE LTK&FNZ-2023
                'area' => 'LTK & FNZ',
                'correo_persona' => 'ejzeladav@unitru.edu.pe',//Edwin Zelada
                'fecha_inicio' => '2021-02-21',//Se cambió a LTK en 2021 (Asumiré: 21 de Febrero 2021)
                'fecha_fin' => '2024-03-08',//Egresó de LTK&FNZ el 08 de Marzo 2024
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE MKT-2023
                'area' => 'MKT',
                'correo_persona' => 'waparedesr@unitru.edu.pe',//Willian Paredes
                'fecha_inicio' => '2021-02-21',//Se cambió a MKT en 2021 (Asumiré: 21 de Febrero 2021)
                'fecha_fin' => '2024-03-08',//Egresó de MKT el 08 de Marzo 2024
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE PMO-2023
                'area' => 'PMO',
                'correo_persona' => 'evalencia@unitru.edu.pe',//Edwin Valencia
                'fecha_inicio' => '2021-12-01',//Se cambió a PMO a finales del 2021 (Asumiré: 01 de Diciembre de 2021)
                'fecha_fin' => '2023-12-04',//Se retiró voluntariamente de SEDIPRO el 04 de Diciembre de 2023
                'estado' =>'Retiro voluntario',
            ],
            /********************************************
              *************** DIRECTIVA 2022 ************
              ******************************************* */
            [
                //PRESIDENTA-2022
                'area' => 'PMO',
                'correo_persona' => 'aecabrerag@unitru.edu.pe',//Angie Cabrera
                'fecha_inicio' => '2021-02-21',//Se cambió a PMO a inicios del 2021 (Asumiré: 21 Febrero de 2021)
                'fecha_fin' => '2023-03-21',//Egresó de PMO el 21 de Marzo 2023
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE LTK&FNZ-2022
                'area' => 'LTK & FNZ',
                'correo_persona' => 'dnvillanuevav@unitru.edu.pe',//Danjhel Villanueva
                'fecha_inicio' => '2020-11-08',//Ingresó a LTK&FNZ el 8 de Noviembre de 2020
                'fecha_fin' => '2023-03-21',//Egresó de LTK&FNZ el 21 de Marzo 2023
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE MKT-2022
                'area' => 'MKT',
                'correo_persona' => 'epinedog@unitru.edu.pe',//Elian Pinedo
                'fecha_inicio' => '2020-11-08',//Ingresó a MKT el 08 de Noviembre de 2020
                'fecha_fin' => '2024-03-08',//Egresó de MKT el 08 de Marzo 2024
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE PMO-2022
                'area' => 'PMO',
                'correo_persona' => 'hcubenos@unitru.edu.pe',//Hans Cubeños
                'fecha_inicio' => '2021-02-21',//Se cambió a PMO a inicios de 2021 (Asumiré: 21 de Febrero de 2021)
                'fecha_fin' => '2023-03-21',//Egresó de PMO el 21 de Marzo 2023
                'estado' =>'Egresado',
            ],
            /********************************************
              *************** DIRECTIVA 2021 ************
              ******************************************* */
            [
                //PRESIDENTA-2021
                'area' => 'GTH',
                'correo_persona' => 'mcarranzar@unitru.edu.pe',//Melva Carranza
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            [
                //VICEPRESIDENTA-2021
                'area' => 'GTH',
                'correo_persona' => 'lhurtados@unitru.edu.pe',//Lucciana Hurtado
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2022-04-03',//Asumo que cumplió con su cargo y se retiró voluntariamente el 03 de Abril de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //DIRECTOR DE GTH-2021
                'area' => 'GTH',
                'correo_persona' => 'jvasquezl@unitru.edu.pe',//José Vasquez
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2022-07-22',//Asumiré que se retiró voluntariamente el 22 de Julio de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //DIRECTORA DE LTK&FNZ-2021
                'area' => 'LTK & FNZ',
                'correo_persona' => 'jbarboza@unitru.edu.pe',//Jemina Barboza
                'fecha_inicio' => '2020-11-08',//Ingresó a LTK&FNZ el 08 de Noviembre de 2020
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE MKT-2021
                'area' => 'MKT',
                'correo_persona' => 'bguzman@unitru.edu.pe',//Bagner Guzman
                'fecha_inicio' => '2020-11-08',//Ingresó a MKT el 08 de Noviembre de 2020
                'fecha_fin' => '2022-07-26',//Asumiré que se retiró voluntariamente el 26 de Julio de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //DIRECTOR DE PMO-2021
                'area' => 'PMO',
                'correo_persona' => 'pvasquez@unitru.edu.pe',//Pablo Vasquez
                'fecha_inicio' => '2019-02-21',//Asumiré que se cambió al inicio de la directiva 2019 (21 de Febrero de 2019)
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            /********************************************
              *************** DIRECTIVA 2020 ************
              ******************************************* */
            [
                //PRESIDENTA-2020
                'area' => 'LTK & FNZ',
                'correo_persona' => 'sfigueroao@unitru.edu.pe',//Stephanie Figueroa
                'fecha_inicio' => '2017-08-11',//Ingresó a LTK&FNZ el 11 de Agosto de 2017
                'fecha_fin' => '2021-02-21',//Asumiré que cumplió con su cargo y se retiró voluntariamente el 21 de Febrero de 2021
                'estado' =>'Retiro voluntario',
            ],
            [
                //VICEPRESIDENTA-2020
                'area' => 'LTK & FNZ',
                'correo_persona' => 'jcrespinc@unitru.edu.pe',//Jesabel Crespin
                'fecha_inicio' => '2018-10-29',//Ingresó a LTK&FNZ el 29 de Octubre de 2018
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE LTK&FNZ-2020
                'area' => 'LTK & FNZ',
                'correo_persona' => 'dmorenoa@unitru.edu.pe',//Diego Moreno
                'fecha_inicio' => '2018-10-29',//Asumiré que Ingresó a LTK&FNZ el 29 de Octubre de 2018
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE MKT-2020
                'area' => 'MKT',
                'correo_persona' => 'rmejiaz@unitru.edu.pe',//Rogger Mejia
                'fecha_inicio' => '2018-10-29',//Ingresó a MKT el 29 de Octubre de 2018
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            [
                //DIRECTOR DE PMO-2020
                'area' => 'PMO',
                'correo_persona' => 'mbedono@unitru.edu.pe',//Mauricio Bedon
                'fecha_inicio' => '2020-02-01',//Se cambió a PMO el 01 de Febrero de 2020
                'fecha_fin' => '2021-02-21',//Asumiré que se retiró voluntariamente después de culminar su cargo el 21 de Febrero de 2021
                'estado' =>'Retiro voluntario',
            ],
            /********************************************
              ****************** GTH ********************
              ******************************************* */
            // GTH MIEMBROS ACTIVOS EN 2025 (21: 19 MIEMBROS ACTIVO - 2 RETIRADOS)
            //CONVOCATORIA 2025 (02-05-2025)
            [
                //Anderson Alexander Saavedra Nolasco
                'area' => 'GTH',
                'correo_persona' => 'aasaavedrano@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a GTH el 02 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Cristhian Luis David Sánchez Obeso
                'area' => 'GTH',
                'correo_persona' => 'clsanchezo@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a GTH el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Eleanor Marycielo Roca Mendoza
                'area' => 'GTH',
                'correo_persona' => 'emrocam@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a GTH el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Emilly Nicoll Zavaleta Chigne
                'area' => 'GTH',
                'correo_persona' => 'enzavaletac@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a GTH el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Joaquin Adriano Bocanegra Peláez
                'area' => 'GTH',
                'correo_persona' => 'jabocanegrap@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a GTH el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Luis Enrique Montoya Aguirre
                'area' => 'GTH',
                'correo_persona' => 'lemontoyaa@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a GTH el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Valeria Angelie Valderrama Muñoz
                'area' => 'GTH',
                'correo_persona' => 'vavalderramam@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a GTH el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2024(10-12-2024)
            [
                //Ana Nicoll Segura Aredo
                'area' => 'GTH',
                'correo_persona' => 'anseguraa@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a GTH el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Andrweeu Daniel Urtecho Avila
                'area' => 'GTH',
                'correo_persona' => 'aurtechoa@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a GTH el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Corina Marilu Sanchez Delgado
                'area' => 'GTH',
                'correo_persona' => 'csanchezd@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a GTH el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Gerson Gabriel Alfaro Tandaypan
                'area' => 'GTH',
                'correo_persona' => 't1051500121@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a GTH el 10 De Diciembre 2024
                'fecha_fin' =>'2025-06-17',//Se le retiró de GTH por bajo rendimiento el 17 de Junio de 2025
                'estado' =>'Retiro por bajo rendimiento',
            ],
            [
                //Juan Diego Hernández Jáuregui
                'area' => 'GTH',
                'correo_persona' => 't1041500221@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a GTH el 10 De Diciembre 2024
                'fecha_fin' => '2025-03-07',//Se retiró voluntariamente de GTH el 07 de Marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA 2024(01-06-2024)
            [
                //José Daniel Avila Santillan
                'area' => 'GTH',
                'correo_persona' => 'jdavilas@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Lisseth Adelaida Chávez Rosales
                'area' => 'GTH',
                'correo_persona' => 'lichavezr@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Mariann Estefany Fernández Leyva
                'area' => 'GTH',
                'correo_persona' => 't1050102021@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Michael Junior García García
                'area' => 'GTH',
                'correo_persona' => 't1051300421@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Nashaly Nicolle Alama Terrones
                'area' => 'GTH',
                'correo_persona' => 'nalama@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Renzo Georkael Carrasco Lalangui
                'area' => 'GTH',
                'correo_persona' => 'rgcarrascol@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Rodrigo Marcial Gamboa Gonzáles
                'area' => 'GTH',
                'correo_persona' => 'rmgamboag@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' => '2025-03-07',//Se retiró voluntariamente de GTH el 07 de Marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            [
                //Yrma Lucero Carruitero Aspiros
                'area' => 'GTH',
                'correo_persona' => 'ycarruitero@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 De Junio 2024
                'fecha_fin' => '2025-03-07',//Se retiró voluntariamente de GTH el 07 de Marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA 2023(13-06-2023)
            [
                //Alisson Milagros Pretell Canchas
                'area' => 'GTH',
                'correo_persona' => 't050601920@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a GTH el 13 De Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Dulce Geraldine Chavez Padilla
                'area' => 'GTH',
                'correo_persona' => 't1051302521@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a GTH el 13 De Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //Aqui ingresó ROMINA ALEJANDRA SECLEN CESPEDES <t1052500521@unitru.edu.pe>
                //-VicePresidenta SEDIPRO UNT-2024
                //Ingresó a GTH el 13 de Junio de 2023
                //Se retiró voluntariamente de GTH el 19 de Noviembre de 2025
            [
                //Fernando Felipe Sanchez Palacios
                'area' => 'GTH',
                'correo_persona' => 't054000920@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a GTH el 13 De Junio 2023
                'fecha_fin' => '2025-03-07',//Se retiró voluntariamente de GTH el 07 de Marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            [
                //Luz Karina Angulo Urbina
                'area' => 'GTH',
                'correo_persona' => 'lkangulour@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a GTH el 13 De Junio 2023
                'fecha_fin' => '2025-03-20',//Se retiró voluntariamente de GTH el 20 de Marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            [
                //Santos Maria Juarez Cruz
                'area' => 'GTH',
                'correo_persona' => 'sjuarez@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a GTH el 13 De Junio 2023
                'fecha_fin' => '2025-03-07',//Se retiró voluntariamente de GTH el 07 de Marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2022(20-12-2022)
            [
                //Angela Valentina Castro Esquivel
                'area' => 'GTH',
                'correo_persona' => 't020600820@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a GTH el 20 De Diciembre 2022
                'fecha_fin' => '2024-03-07',//Se retiró de GTH el 07 de Marzo de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //Fernando Javier Paredes Juarez
                'area' => 'GTH',
                'correo_persona' => 't1051501221@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a GTH el 20 De Diciembre 2022
                'fecha_fin' => '2023-10-06',//Se le retiró de GTH por bajo rendimiento el 06 de Octubre de 2023
                'estado' =>'Retiro por bajo rendimiento',
            ],
            [
                //Roger Alfredo Morante Escajadillo
                'area' => 'GTH',
                'correo_persona' => 'rmorante@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a GTH el 20 De Diciembre 2022
                'fecha_fin' => '2024-01-03',//Se retiró voluntariamente de GTH el 03 de Enero de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //Yuliana Zarai Cuadra Rodriguez
                'area' => 'GTH',
                'correo_persona' => 't1020100521@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a GTH el 20 De Diciembre 2022
                'fecha_fin' => '2024-12-31',//Se retiró de GTH a finales del 2024
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA 2022(10-05-2022)
            [
                //Santiago Alonso Morales Flores
                'area' => 'GTH',
                'correo_persona' => 't010601720@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo 2022
                'fecha_fin' => '2022-12-27',//Asumiré que se retiró voluntariamente de GTH el 27 de Diciembre de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Eduardo David Risco Rios
                'area' => 'GTH',
                'correo_persona' => 't514000420@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo 2022
                'fecha_fin' => '2023-02-26',//Se retiró voluntariamente de GTH el 26 de Febrero de 2023
                'estado' =>'Retiro voluntario',
            ],
            [
                //Aitana Sofia Requejo Valle
                'area' => 'GTH',
                'correo_persona' => 't050100720@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo 2022
                'fecha_fin' => '2025-03-17',//Egresó en GTH el 17 de Marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Brayan Micael Linares Oyos
                'area' => 'GTH',
                'correo_persona' => 'blinares@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo 2022
                'fecha_fin' => '2022-07-21',//Asumiré que se retiró voluntariamente de GTH el 21 de Julio de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Miguel Segundo Cabrera Morales
                'area' => 'GTH',
                'correo_persona' => 't020100320@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo 2022
                'fecha_fin' => '2023-01-13',//Asumiré que se retiró voluntariamente de GTH el 13 de Enero de 2023
                'estado' =>'Retiro voluntario',
            ],
            [
                //Ariana Esther Navarro Zavaleta
                'area' => 'GTH',
                'correo_persona' => 't1510602021@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo 2022
                'fecha_fin' => '2023-04-25',//Asumiré que se retiró voluntariamente de GTH el 25 de Abril de 2023
                'estado' =>'Retiro voluntario',
            ],
            [
                //Crhistian Fernando Hilario Salvador
                'area' => 'GTH',
                'correo_persona' => 'chilario@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 de Mayo 2022
                'fecha_fin' => '2023-03-21',//Egresó en GTH el 21 de Marzo 2023
                'estado' =>'Egresado',
            ],
            //CONVOCATORIA 2021(20-11-2021)
            [
                //Beatriz Nancy Bamberger Leyva
                'area' => 'GTH',
                'correo_persona' => 't1454000221@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2022-04-11',//Asumiré que se retiró voluntariamente de GTH el 11 de Abril de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Carlos Alberto Catañeda Santisteban
                'area' => 'GTH',
                'correo_persona' => 'ccastanedas@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2024-03-08',//Egresó en GTH el 08 de Marzo 2024
                'estado' =>'Egresado',
            ],
            [
                //Diana Noemi De la Cruz Condor
                'area' => 'GTH',
                'correo_persona' => 'ddelacruzc@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2024-11-17',//Se retiró voluntariamente de GTH el 17 de Noviembre de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //Geraldine Kathleen Azucena Gonzales Alquizar
                'area' => 'GTH',
                'correo_persona' => 't510102020@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2024-11-23',//Se retiró voluntariamente de GTH el 23 de Noviembre de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //Santiago Manuel Rodriguez Castillo
                'area' => 'GTH',
                'correo_persona' => 'smrodriguezc@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2022-03-06',//Asumiré que se retiró voluntariamente de GTH el 06 de Marzo de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Alexandra Fiorela Ruiz Alfaro
                'area' => 'GTH',
                'correo_persona' => 't1012600121@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2022-06-22',//Asumiré que se retiró voluntariamente de GTH el 22 de Junio de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Luis David Uriol Campos
                'area' => 'GTH',
                'correo_persona' => 'luriolc@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2022-03-06',//Asumiré que se retiró voluntariamente de GTH el 06 de Marzo de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Cinthia Azucena Narro Mendoza
                'area' => 'GTH',
                'correo_persona' => 't050100420@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2023-04-30',//Asumiré que se retiró voluntariamente de GTH el 30 de Abril de 2023
                'estado' =>'Retiro voluntario',
            ],
            [
                //Jhonner David Pesantes Huaylla
                'area' => 'GTH',
                'correo_persona' => 'jpesantesh@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' => '2023-03-21',//Egresó en GTH el 21 de Marzo de 2023
                'estado' =>'Egresado',
            ],
            //CONVOCATORIA 2021(20-11-2021)
            [
                //Elber Isaí Pichén Zavaleta
                'area' => 'GTH',
                'correo_persona' => 't1024000121@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2020(08-11-2020)
            [
                //Jesús David Nuñez Arteaga
                'area' => 'GTH',
                'correo_persona' => 'jdnuneza@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',//Ingresó a GTH el 08 de Noviembre 2020
                'fecha_fin' => '2022-05-09',//Se retiró voluntariamente de GTH el 09 de Mayo de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Esmeralda Marianela Valverde Moreno
                'area' => 'GTH',
                'correo_persona' => 'evalverdem@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',//Ingresó a GTH el 08 de Noviembre 2020
                'fecha_fin' => '2024-03-08',//Egresó en GTH el 08 de Marzo 2024
                'estado' =>'Egresado',
            ],
            [
                //Edgar Enrique Grijalba Atavios
                'area' => 'GTH',
                'correo_persona' => 'egrijalbaa@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',//Ingresó a GTH el 08 de Noviembre 2020
                'fecha_fin' => '2021-02-21',//Asumiré que se retiró voluntariamente de GTH el 21 de Febrero de 2021
                'estado' =>'Retiro voluntario',
            ],
            [
                //Alexis Angel Raúl Carrera Condo
                'area' => 'GTH',
                'correo_persona' => 'acarrerac@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',//Ingresó a GTH el 08 de Noviembre 2020
                'fecha_fin' => '2021-02-06',//Asumiré que se retiró voluntariamente de GTH el 06 de Febrero de 2021
                'estado' =>'Retiro voluntario',
            ],
            [
                //Kevin Alexander Meregildo Garcia
                'area' => 'GTH',
                'correo_persona' => 'kmeregildo@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',//Ingresó a GTH el 08 de Noviembre 2020
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            [
                //Hilda Patricia Rodriguez Horna
                'area' => 'GTH',
                'correo_persona' => 'hrodriguezh@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',//Ingresó a GTH el 08 de Noviembre 2020
                'fecha_fin' => '2022-10-02',//Se retiró voluntariamente de GTH el 02 de Octubre de 2022
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA 2019(03-09-2019)
            [
                //Fiorella Alexandra Alfaro Aguilar
                'area' => 'GTH',
                'correo_persona' => 'falfaro@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2022-01-20',//Asumiré que se retiró voluntariamente de GTH el 20 de Enero de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Leydi Estefani Cueva Zavaleta
                'area' => 'GTH',
                'correo_persona' => 'lcuevaz@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2022-02-28',//Se retiró voluntariamente de GTH el 28 de Febrero de 2022
                'estado' =>'Retiro voluntario',
            ],
            [
                //Angela Mariel Pereda Morales
                'area' => 'GTH',
                'correo_persona' => 'aperedaa@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2022-04-03',//Egresó el 03 de Abril de 2022
                'estado' =>'Egresado',
            ],
            [
                //Fiorella Rocio Reyes Cruz
                'area' => 'GTH',
                'correo_persona' => 'freyesc@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2021-03-28',//Se retiró voluntariamente de GTH el 28 de Marzo de 2021
                'estado' =>'Retiro voluntario',
            ],
            [
                //Azucena Lisseth Dominguez Vargas
                'area' => 'GTH',
                'correo_persona' => 'aldominguezv@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2020-06-22',//Asumiré que se retiró voluntariamente de GTH el 22 de Junio de 2020
                'estado' =>'Retiro voluntario',
            ],
            [
                //Angelica Alicia Campuzano Guevara
                'area' => 'GTH',
                'correo_persona' => 'acampuzanoa@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',//Ingresó a GTH el 03 de Septiembre 2019
                'fecha_fin' => '2020-06-22',//Asumiré que se retiró voluntariamente de GTH el 22 de Junio de 2020
                'estado' =>'Retiro voluntario',
            ],

            /********************************************
              *************** LTK & FNZ *****************
              ******************************************* */
            // LTK&FNZ MIEMBROS ACTIVOS EN 2025(22: 21 MIEMBROS ACTIVO - 1 RETIRADO)
            //CONVOCATORIA 2025 (02-05-2025)
            [
                //Cristhian Imanol Campos Castro
                'area' => 'LTK & FNZ',
                'correo_persona' => 'cicamposc@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a LTK & FNZ el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Dalia Irina García De La Cruz 
                'area' => 'LTK & FNZ',
                'correo_persona' => 'digarciad@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a LTK & FNZ el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Diego Andree Garro Taboada 
                'area' => 'LTK & FNZ',
                'correo_persona' => 'dgarro@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a LTK & FNZ el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Fabiana Belén Sosa Parra
                'area' => 'LTK & FNZ',
                'correo_persona' => 'fsosap@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a LTK & FNZ el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Nory Ann Marie Touzet Meneses
                'area' => 'LTK & FNZ',
                'correo_persona' => 'ntouzet@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a LTK & FNZ el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Priscila Crystal Villegas Dominguez
                'area' => 'LTK & FNZ',
                'correo_persona' => 'pcvillegasdo@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a LTK & FNZ el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Yamelyn Leslie Rios Tandaypan
                'area' => 'LTK & FNZ',
                'correo_persona' => 'yriost@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a LTK & FNZ el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2024(10-12-2024)
            [
                //Christian Rodrigo Valverde Caspito
                'area' => 'LTK & FNZ',
                'correo_persona' => 'crvalverdeca@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a LTK & FNZ el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Eddie Alessandro Jiménez Vilchez
                'area' => 'LTK & FNZ',
                'correo_persona' => 'ejimenezv@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a LTK & FNZ el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Fabián Nicolas Paredes Calderón 
                'area' => 'LTK & FNZ',
                'correo_persona' => 'fnparedesca@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a LTK & FNZ el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Kiara Marife Rodriguez Sifuentes 
                'area' => 'LTK & FNZ',
                'correo_persona' => 'krodriguezsi@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a LTK & FNZ el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Luis Angel Laureano Escobedo
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1511300521@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a LTK & FNZ el 10 De Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2024(01-06-2024)
            [
                //Grecia Alexandra Paredes Cachique
                'area' => 'LTK & FNZ',
                'correo_persona' => 'gaparedesca@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK & FNZ el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Jimmy Andersonn Cáceda Olivera
                'area' => 'LTK & FNZ',
                'correo_persona' => 'jcacedao@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK&FNZ el 01 de Junio 2024
                'fecha_fin' =>'2025-07-15',//Se le retiró de LTK&FNZ por bajo rendimiento el 15 de Julio de 2025
                'estado' =>'Retiro por bajo rendimiento',
            ],
            [
                //Maria Fernanda Pretell Leon
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010700721@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK & FNZ el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Mixie Arleni Gil Zapata
                'area' => 'LTK & FNZ',
                'correo_persona' => 'magilza@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK & FNZ el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Nestor Rafael Placencia De la Cruz
                'area' => 'LTK & FNZ',
                'correo_persona' => 'nrplasenciade@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK & FNZ el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Tatiana Yuleisy Aliaga Pretell
                'area' => 'LTK & FNZ',
                'correo_persona' => 'taliaga@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK & FNZ el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2023(13-06-2023)
            [
                //Kevin Gamaliel Rodríguez Alfaro
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1510101021@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a LTK & FNZ el 13 de Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2022(20-12-2022)
            [
                //Fernanda Milagros Rojas Rodriguez
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1510101721@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a LTK & FNZ el 20 de Diciembre 2022
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //Aqui ingresó SEBASTIAN EMANUEL FACUNDO REYES <t1512400421@unitru.edu.pe> 
                    //- Director de LTK&FNZ-2024
                    //- MIEMBRO ACTIVO DE LTK&FNZ 2025-I
                    //Ingresó a LTK&FNZ el 20 de Diciembre de 2022
            //CONVOCATORIA 2023(13-06-2023)
            [
                //Candy Yoana Castro Torres
                'area' => 'LTK & FNZ',
                'correo_persona' => 't051301320@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a LTK&FNZ el 13 De Junio 2023
                'fecha_fin' => '2025-03-17',//Egresó en LTK&FNZ el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Handalee Georjina Graus Silva
                'area' => 'LTK & FNZ',
                'correo_persona' => 't050101020@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a LTK&FNZ el 13 De Junio 2023
                'fecha_fin' => '2025-03-17',//Egresó en LTK&FNZ el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Jean Cristopher Elias León Mallqui
                'area' => 'LTK & FNZ',
                'correo_persona' => 't513701420@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a LTK&FNZ el 13 De Junio 2023
                'fecha_fin' => '2025-03-17',//Egresó en LTK&FNZ el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2022(20-12-2022)
            [
                //Bryan Anghelo Michael Perez Proaño
                'area' => 'LTK & FNZ',
                'correo_persona' => 'baperezp@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a LTK&FNZ el 20 De Diciembre 2022
                'fecha_fin' => '2025-03-17',//Egresó en LTK&FNZ el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //José Carlos Cabrera Huaman
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1051300221@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a LTK&FNZ el 20 De Diciembre 2022
                'fecha_fin' => '2024-11-22',//Se retiró voluntariamente de LTK&FNZ el 22 de Noviembre de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //Karol Nicolle Apaza Rodriguez
                'area' => 'LTK & FNZ',
                'correo_persona' => 't510100720@unitru.edu.pe',
                'fecha_inicio' => '2022-12-20',//Ingresó a LTK&FNZ el 20 De Diciembre 2022
                'fecha_fin' => '2024-10-01',//Se retiró voluntariamente de LTK&FNZ el 01 de Octubre de 2024
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA 2022(10-05-2022)
            [
                //Jessenia Marleth Lopez Llanos
                'area' => 'LTK & FNZ',
                'correo_persona' => 't010100520@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a LTK&FNZ el 10 De Mayo 2022
                'fecha_fin' => '2023-08-04',//Se retiró voluntariamente de LTK&FNZ el 04 de Agosto de 2023
                'estado' =>'Retiro voluntario',
            ],
            [
                //Jorge Ernesto Rondo Valeriano
                'area' => 'LTK & FNZ',
                'correo_persona' => 'jorondov@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a LTK&FNZ el 10 De Mayo 2022
                'fecha_fin' => '2024-12-23',//Se retiró voluntariamente de LTK&FNZ el 23 de Diciembre de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //José Carlos Diaz Muñoz
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1051301521@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a LTK&FNZ el 10 De Mayo 2022
                'fecha_fin' => '2024-02-15',//Asumiré que se le retiró de LTK&FNZ por bajo rendimiento el 15 de Febrero de 2024
                'estado' =>'Retiro por bajo rendimiento',
            ],
            //CONVOCATORIA 2021(20-11-2021)
            [
                //Dajhana del Rocio Rivera Medina
                'area' => 'LTK & FNZ',
                'correo_persona' => 't020100520@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a LTK&FNZ el 20 De Noviembre 2021
                'fecha_fin' => '2025-03-17',//Egresó de LTK&FNZ el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Jimmy Andersonn Cáceda Olivera - Cambio de área
                'area' => 'MKT',
                'correo_persona' => 'jcacedao@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 De Junio 2024
                'fecha_fin' => '2024-06-01',//Se cambió a LTK&FNZ el mismo día (asumiré que fue inmediato)
                'estado' =>'Cambio de área',
            ],
            [
                //Jimmy Javier Tisnado Sauceda - Cambio de área
                'area' => 'MKT',
                'correo_persona' => 't1050101421@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 De Junio 2024
                'fecha_fin' => '2024-06-01',//Se cambió a LTK&FNZ el mismo día (asumiré que fue inmediato)
                'estado' =>'Cambio de área',
            ],
            [
                //Jimmy Javier Tisnado Sauceda
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1050101421@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Se cambió a LTK&FNZ el 01 De Junio 2024
                'fecha_fin' => '2024-09-27',//Se retiró voluntariamente de LTK&FNZ el 27 de Septiembre de 2024
                'estado' =>'Retiro voluntario',
            ],
            
            /********************************************
              ****************** MKT ********************
              ******************************************* */
            // MKT MIEMBROS ACTIVOS EN 2025(23: 22 MIEMBROS ACTIVO - 1 RETIRADO)
            //CONVOCATORIA 2025 (02-05-2025)
            /**
                Adriana Gabriela Castillo Ochoa 
                Angelo Salvattore Chavarry Bustamante 
                Cesar Junior Quito Cruz 
                Juan José Chávez Tenorio 
                lorena Midalís Primo Bueno 
                Malena Shecid Huamán Arana
                Melissa del Rosario Muñoz Uriarte 
                Milene Xiomara Delgado silva
            **/
            [
                //Adriana Gabriela Castillo Ochoa 
                'area' => 'MKT',
                'correo_persona' => 'acastilloo@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Angelo Salvattore Chavarry Bustamante 
                'area' => 'MKT',
                'correo_persona' => 'aschavarryb@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Cesar Junior Quito Cruz 
                'area' => 'MKT',
                'correo_persona' => 'cquito@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Juan José Chávez Tenorio 
                'area' => 'MKT',
                'correo_persona' => 'jchavezt@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //lorena Midalís Primo Bueno
                'area' => 'MKT',
                'correo_persona' => 'lmprimob@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Malena Shecid Huamán Arana
                'area' => 'MKT',
                'correo_persona' => 'mshuaman@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Melissa del Rosario Muñoz Uriarte 
                'area' => 'MKT',
                'correo_persona' => 'mdmunozu@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Milene Xiomara Delgado silva
                'area' => 'MKT',
                'correo_persona' => 'mxdelgados@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a MKT el 2 De Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2024(10-12-2024)
            [
                //Stephanie Angeline Arizola Rodriguez
                'area' => 'MKT',
                'correo_persona' => 't1051301921@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a MKT el 10 de Diciembre de 2024
                'fecha_fin' => '2025-03-19',//Se le retiró de MKT por bajo rendimiento el 19 de Marzo de 2025
                'estado' =>'Retiro por bajo rendimiento',
            ],
            /**
                BELINDA MARICIELO ARROYO ESQUIVEL
                DIEGO JESÚS	ULLILÉN CHÁVEZ
                LUIS ANGEL LECCA CORTEZ
            **/
            [
                //Belinda Maricielo Arroyo Esquivel
                'area' => 'MKT',
                'correo_persona' => 'barroyo@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a MKT el 10 de Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Diego Jesús Ullilén Chávez
                'area' => 'MKT',
                'correo_persona' => 'dullilen@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a MKT el 10 de Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Luis Angel Lecca Cortez
                'area' => 'MKT',
                'correo_persona' => 'lleccac@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a MKT el 10 de Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2024(01-06-2024)
            [
                //César Manuel Sánchez Castillo
                'area' => 'MKT',
                'correo_persona' => 'cmsanchezca@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio de 2024
                'fecha_fin' => '2025-01-03',//Se le retiró de MKT por bajo rendimiento el 03 de Enero de 2025
                'estado' =>'Retiro por bajo rendimiento',
            ],
            [
                //Darla Mariana Yparraguirre Ortiz
                'area' => 'MKT',
                'correo_persona' => 't1513900321@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio de 2024
                'fecha_fin' => '2025-01-03',//Se le retiró de MKT por bajo rendimiento el 03 de Enero de 2025
                'estado' =>'Retiro por bajo rendimiento',
            ],
            /**
                Angie Tatiana Recuenco Tapia
                Cielo Valentina	Abanto Rojas
                Emelyn Yasmin Aguirre Valverde 
                Jakori Nayeli Hoyos Terrones 
                JORDYNA DEL CARMEN ROBLES SOLORZANO
                Maite Palacios Asto
                Yojhania Taitt Gonzales Contreras
            **/
            [
                //Angie Tatiana Recuenco Tapia
                'area' => 'MKT',
                'correo_persona' => 't1013600421@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Cielo Valentina Abanto Rojas
                'area' => 'MKT',
                'correo_persona' => 'cvabantor@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Emelyn Yasmin Aguirre Valverde 
                'area' => 'MKT',
                'correo_persona' => 't1520100421@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Jakori Nayeli Hoyos Terrones
                'area' => 'MKT',
                'correo_persona' => 'jnhoyoste@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Jordyna Del Carmen Robles Solorzano
                'area' => 'MKT',
                'correo_persona' => 't1024100421@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Maite Palacios Asto
                'area' => 'MKT',
                'correo_persona' => 'mpalaciosas@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio 2024
                'fecha_fin' =>'2025-08-16',//Se retiró de MKT el 16 de Agosto de 2025
                'estado' =>'Retiro voluntario',
            ],
            [
                //Yojhania Taitt Gonzales Contreras
                'area' => 'MKT',
                'correo_persona' => 't1510102521@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a MKT el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2023(13-06-2023)
            [
                //Ana Lucía Rojas Chavez
                'area' => 'MKT',
                'correo_persona' => 't1020101321@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 De Junio 2023
                'fecha_fin' => '2024-11-23',//Se retiró voluntariamente de MKT el 23 de Noviembre de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //César Arturo Ulloa Torres
                'area' => 'MKT',
                'correo_persona' => 't050700220@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 De Junio 2023
                'fecha_fin' => '2025-03-17',//Egresó el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //José Efrain Calle Gutierrez
                'area' => 'MKT',
                'correo_persona' => 't010101220@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 de Junio de 2023
                'fecha_fin' => '2025-03-17',//Egresó de MKT el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Lesly Fiorella Pérez Rodríguez
                'area' => 'MKT',
                'correo_persona' => 't028100120@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 De Junio 2023
                'fecha_fin' => '2025-03-17',//Egresó el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            /**
                Maria Fernanda Cárdenas Hidalgo
                Stefany Isabel Gutierrez Vega
            **/
            [
                //Maria Fernanda Cárdenas Hidalgo
                'area' => 'MKT',
                'correo_persona' => 'mcardenash@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 de Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Stefany Isabel Gutierrez Vega
                'area' => 'MKT',
                'correo_persona' => 't1510101221@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 de Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2022(20-12-2022)
            /**
                Zulema Adeli Valverde Zavaleta
            **/
            //Aqui ingresó ZULEMA ADELI VALVERDE ZAVALETA <t1510100321@unitru.edu.pe>
                    //- Directora de MKT-2024
                    //- MIEMBRO ACTIVO DE MKT 2025-I
                    //Ingresó a MKT el 20 de Diciembre 2022
            
            //CONVOCATORIA 2022(10-05-2022)
            [
                //Christian Giancarlo Cortijo Quispe
                'area' => 'MKT',
                'correo_persona' => 'ccortijoq@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a MKT el 10 de Mayo de 2022
                'fecha_fin' => '2023-12-07',//Se retiró voluntariamente de MKT el 07 de Diciembre de 2023
                'estado' =>'Retiro voluntario',
            ],
            [
                //Fabrizio Andree Aliaga Pretell
                'area' => 'MKT',
                'correo_persona' => 'faliaga@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a MKT el 10 de Mayo de 2022
                'fecha_fin' => '2024-03-08',//Egresó el 08 de marzo de 2024
                'estado' =>'Egresado',
            ],
            [
                //Nathaly Silvana Quiroz Mestanza
                'area' => 'MKT',
                'correo_persona' => 't530100220@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a MKT el 10 de Mayo de 2022
                'fecha_fin' => '2025-03-17',//Egresó el 17 de Marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Yasumi Judith Guevara Quispe
                'area' => 'MKT',
                'correo_persona' => 't1040100521@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a MKT el 10 de Mayo de 2022
                'fecha_fin' => '2024-07-14',//Se retiró voluntariamente de MKT el 14 de Julio de 2024
                'estado' =>'Retiro voluntario',
            ],
            /**
                Anderson Abat Otiniano Morales
                Ghenary Tais Esquivel Davila
            **/
            [
                //Anderson Abat Otiniano Morales
                'area' => 'MKT',
                'correo_persona' => 'aotinianom@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a MKT el 10 de Mayo 2022
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Ghenary Tais Esquivel Davila
                'area' => 'MKT',
                'correo_persona' => 't1053200921@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',//Ingresó a MKT el 10 de Mayo 2022
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2021(20-11-2021)
            [
                //Jhosmel Anderson Vigo Cepeda
                'area' => 'MKT',
                'correo_persona' => 't1511601421@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a MKT el 20 De Noviembre 2021
                'fecha_fin' => '2023-05-03',//Se cambió a LTK&FNZ el 03 de Mayo 2023
                'estado' =>'Cambio de área',
            ],
            /********************************************
              ****************** PMO *********************
              ******************************************* */
            // PMO MIEMBROS ACTIVOS EN 2025(14: 14 MIEMBROS ACTIVOS - 0 RETIRADOS)
            //CONVOCATORIA 2025 (02-05-2025)
            /**
                Ariana	Morales Ipanaqué 
                Rodrigo Alexander Quispe Cortijo
                Sebastián Javier Vásquez Estrada
            **/
            [
                //Ariana Morales Ipanaqué 
                'area' => 'PMO',
                'correo_persona' => 'amoralesi@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a PMO el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Rodrigo Alexander Quispe Cortijo
                'area' => 'PMO',
                'correo_persona' => 'raquispeco@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a PMO el 02 de Mayo 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Sebastián Javier Vásquez Estrada
                'area' => 'PMO',
                'correo_persona' => 'sjvasqueze@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a PMO el 02 de Mayo 2025
                'fecha_fin' => '2025-12-17',//Se retiró voluntariamente el 17 de Diciembre de 2025
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2024(10-12-2024)
            /**
                DANIEL ANGEL SÁNCHEZ CABRERA 
            **/
            [
                //Daniel Angel Sánchez Cabrera
                'area' => 'PMO',
                'correo_persona' => 'dasanchezca@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a PMO el 10 de Diciembre 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2024(01-06-2024)
            [
                //Alexandra Brighit Valverde Escobar
                'area' => 'PMO',
                'correo_persona' => 'avelarde@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio de 2024
                'fecha_fin' => '2025-03-07',//Se retiró voluntariamente el 07 de marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            /**   
                ABEL MAXIMILIANO PEREDA CABANILLAS
                Angela Xiomara Loayza Gutierrez
                Dalery Nicoll Alayo Sifuentes
                Diego Alejandro Mostacero Lecca 
                DIEGO ALONSO GUTIERREZ VASQUEZ
                Rubén Darío	Alcántara Toribio
            **/
            [
                //Abel Maximiliano Pereda Cabanillas
                'area' => 'PMO',
                'correo_persona' => 'amperedaca@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Angela Xiomara Loayza Gutierrez
                'area' => 'PMO',
                'correo_persona' => 'axloayzag@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Dalery Nicoll Alayo Sifuentes
                'area' => 'PMO',
                'correo_persona' => 'dnalayosi@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Diego Alejandro Mostacero Lecca 
                'area' => 'PMO',
                'correo_persona' => 't1020100121@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Diego Alonso Gutierrez Vasquez
                'area' => 'PMO',
                'correo_persona' => 'dgutierrezva@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Rubén Darío Alcántara Toribio
                'area' => 'PMO',
                'correo_persona' => 't1051300821@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2023(13-06-2023)
            [
                //David Caleb Céspedes Esquivel
                'area' => 'PMO',
                'correo_persona' => 't511301120@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio de 2023
                'fecha_fin' => '2025-03-17',//Egresó el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Giancarlo Jose Benavides Rodriguez
                'area' => 'PMO',
                'correo_persona' => 't450100220@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio de 2023
                'fecha_fin' => '2025-03-17',//Egresó el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            [
                //Renato Martin Nunez Ortiz
                'area' => 'PMO',
                'correo_persona' => 'rnunezo@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio de 2023
                'fecha_fin' => '2025-03-17',//Egresó el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
            /**
                Jeoselyn Maribel Espejo Rodríguez
                Kaleb Arteaga Rodriguez
                María Celine Huamán Martínez
            **/
            [
                //Jeoselyn Maribel Espejo Rodríguez
                'area' => 'PMO',
                'correo_persona' => 'jespejor@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Kaleb Arteaga Rodriguez
                'area' => 'PMO',
                'correo_persona' => 't1452700121@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //María Celine Huamán Martínez
                'area' => 'PMO',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio 2023
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //CONVOCATORIA 2021(20-11-2021)
            /**
                Ivanna Sofia Vela Ocampo
            **/
            //Aqui ingresó IVANNA SOFIA VELA OCAMPO <t510100520@unitru.edu.pe>
                    //- Directora de PMO-2024
                    //- MIEMBRO ACTIVO DE PMO 2025-I
                    //Ingresó a PMO el 20 de Noviembre 2021
            
            /********************************************
              ****************** TI *********************
              ******************************************* */
            // TI MIEMBROS ACTIVOS EN 2025
            //CONVOCATORIA 2025 (02-05-2025)
            [
                //Elder Eli De la Cruz Calderón
                'area' => 'TI',
                'correo_persona' => 'edelacruzca@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a TI el 02 de Mayo de 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Jhoanny Jheimilyn Xiomara Vargas Ramos
                'area' => 'TI',
                'correo_persona' => 'jjvargasr@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a TI el 02 de Mayo de 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Pablo César Sánchez Cabrera
                'area' => 'TI',
                'correo_persona' => 'psanchezca@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a TI el 02 de Mayo de 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Renato Alexander Martinez Aguilar
                'area' => 'TI',
                'correo_persona' => 'ramartinezag@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a TI el 02 de Mayo de 2025
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Zaleth Valentina Rivas Calderón
                'area' => 'TI',
                'correo_persona' => 'zvrivasca@unitru.edu.pe',
                'fecha_inicio' => '2025-05-02',//Ingresó a TI el 02 de Mayo de 2025
                'fecha_fin' =>'2025-08-22',//Se retiró de TI el 22 de Agosto de 2025
                'estado' =>'Retiro voluntario',
            ],
            //CONVOCATORIA EXTRAORDINARIA 2024 (10-12-2024)
            [
                //Luis Angel Morales Lino
                'area' => 'TI',
                'correo_persona' => 't012700620@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a TI el 10 de Diciembre de 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Marco Camilo Toledo Campos
                'area' => 'TI',
                'correo_persona' => 't022700720@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a TI el 10 de Diciembre de 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Mirella Esteffany Gamboa Valderrama
                'area' => 'TI',
                'correo_persona' => 'mgamboav@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a TI el 10 de Diciembre de 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Paúl Jamir Lazaro Solano
                'area' => 'TI',
                'correo_persona' => 't052700520@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a TI el 10 de Diciembre de 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Sadhú Rojas García
                'area' => 'TI',
                'correo_persona' => 't012701020@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',//Ingresó a TI el 10 de Diciembre de 2024
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            //INGRESO A TI EN AÑO DE FUNDACIÓN DEL ÁREA MEDIANTE CAMBIO DE ÁREA (2023)
            [
                //Anahy Estrella Cruz Ulloa
                'area' => 'TI',
                'correo_persona' => 't053300720@unitru.edu.pe',
                'fecha_inicio' => '2023-03-17',//Se cambió a TI el 17 de Marzo de 2023
                'fecha_fin' => '2025-03-07',//Se retiró voluntariamente el 07 de Marzo de 2025
                'estado' =>'Retiro voluntario',
            ],
            [
                //Jorge Luis Vargas Baltodano
                'area' => 'TI',
                'correo_persona' => 't012700120@unitru.edu.pe',
                'fecha_inicio' => '2023-03-17',//Ingresó a TI el 17 de Marzo de 2023
                'fecha_fin' =>'2024-06-08',//Se retiró de TI el 08 de Junio de 2024
                'estado' =>'Retiro voluntario',
            ],
            [
                //Rommel Eduardo Ulco Chavarria
                'area' => 'TI',
                'correo_persona' => 'rulco@unitru.edu.pe',
                'fecha_inicio' => '2023-03-17',//Se cambió a TI el 17 de Marzo de 2023
                'fecha_fin' =>'2025-03-17',//Egresó en TI el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],

            /********************************************
              ********** CAMBIOS DE ÁREA **************
              ******************************************* */
            //Micaela Anthoaneth Cardenas Contreras - Registro inicial en MKT
            [
                //Ingresó a MKT el 09 de Junio de 2020
                'area' => 'MKT',
                'correo_persona' => 't534000120@unitru.edu.pe',
                'fecha_inicio' => '2020-06-09',//Ingresó a MKT el 09 de Junio de 2020
                'fecha_fin' => '2020-11-08',//Se cambió a PMO el 8 de Noviembre de 2020
                'estado' =>'Cambio de área',
            ],
            //Edwin Jardel Zelada Vasquez
            [
                //Ingresó a MKT el 08 de Noviembre 2020
                'area' => 'MKT',
                'correo_persona' => 'ejzeladav@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',
                'fecha_fin' => '2021-02-21',//Se cambió a LTK en 2021 (Asumiré: 21 de Febrero 2021)
                'estado' =>'Cambio de área',
            ],
            //Willian Alexander Paredes Rojas
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                'area' => 'GTH',
                'correo_persona' => 'waparedesr@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',
                'fecha_fin' => '2021-02-21',//Se cambió a MKT en 2021 (Asumiré: 21 de Febrero 2021)
                'estado' =>'Cambio de área',
            ],
            //Edwin Jeyson Valencia Gaona
            [
                //Ingresó a MKT el 08 de Noviembre 2020
                'area' => 'MKT',
                'correo_persona' => 'evalencia@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',
                'fecha_fin' => '2021-12-01',//Se cambió a PMO a finales del 2021 (Asumiré: 01 de Diciembre de 2021)
                'estado' =>'Cambio de área',
            ],
            //Angie Evelin Cabrera Garcia - Registro inicial en MKT
            [
                //Ingresó a MKT el 03 de Septiembre 2019
                'area' => 'MKT',
                'correo_persona' => 'aecabrerag@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',//Ingresó a MKT el 03 de Septiembre 2019
                'fecha_fin' => '2021-02-21',//Se cambió a PMO a inicios del 2021 (Asumiré: 21 Febrero de 2021)
                'estado' =>'Cambio de área',
            ],
            //Hans Cubeños Montoya
            [
                //Ingresó a MKT el 03 de Septiembre 2019
                'area' => 'MKT',
                'correo_persona' => 'hcubenos@unitru.edu.pe',
                'fecha_inicio' => '2019-09-03',
                'fecha_fin' => '2021-02-21',//Se cambió a PMO a inicios de 2021(Asumiré: 21 de Febrero de 2021)
                'estado' =>'Cambio de área',
            ],
            //Pablo Cesar Vasquez Narvaez
            [
                //Ingresó a GTH el 29 de Octubre de 2018
                'area' => 'GTH',
                'correo_persona' => 'pvasquez@unitru.edu.pe',
                'fecha_inicio' => '2018-10-29',
                'fecha_fin' => '2019-02-21',//Asumiré que se cambió al inicio de la directiva 2019 (21 de Febrero de 2019)
                'estado' =>'Cambio de área',
            ],
            //Mauricio Sebastian Bedon Oliva
            [
                //Ingresó a MKT el 14 de Octubre de 2016
                'area' => 'MKT',
                'correo_persona' => 'mbedono@unitru.edu.pe',
                'fecha_inicio' => '2016-10-14',
                'fecha_fin' => '2018-10-01',//Se cambió a GTH el 01 de Octubre de 2018
                'estado' =>'Cambio de área',
            ],
            [
                //Se cambió a GTH el 01 de Octubre de 2018
                'area' => 'GTH',
                'correo_persona' => 'mbedono@unitru.edu.pe',
                'fecha_inicio' => '2018-10-01',
                'fecha_fin' => '2020-02-01',//Se cambió a PMO el 01 de Febrero de 2020
                'estado' =>'Cambio de área',
            ],
            //Jhosmel Anderson Vigo Cepeda
            [
                //Se cambió a LTK&FNZ el 03 de Mayo 2023
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1511601421@unitru.edu.pe',
                'fecha_inicio' => '2023-05-03',
                'fecha_fin' => NULL,//MIEMBRO ACTIVO 2025-I
                'estado' =>'Miembro activo',
            ],
            //Rommel Eduardo Ulco Chavarria
            [
                //Ingresó a MKT el 20 de Noviembre de 2021
                'area' => 'MKT',
                'correo_persona' => 'rulco@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',
                'fecha_fin' => '2023-03-17',//Se cambió a TI el 17 de Marzo de 2023
                'estado' =>'Cambio de área',
            ],
            //Jorge Luis Vargas Baltodano
            [
                //Ingresó a LTK&FNZ el 20 de Noviembre de 2021
                'area' => 'LTK & FNZ',
                'correo_persona' => 't012700120@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',
                'fecha_fin' => '2022-05-10',//Se cambió a PMO el 10 de Mayo de 2022
                'estado' =>'Cambio de área',
            ],
            [
                //Se cambió a PMO el 10 de Mayo de 2022
                'area' => 'PMO',
                'correo_persona' => 't012700120@unitru.edu.pe',
                'fecha_inicio' => '2022-05-10',
                'fecha_fin' => '2023-03-17',//Ingresó a TI el 17 de Marzo de 2023
                'estado' =>'Cambio de área',
            ],

            /********************************************
              ********** MIEMBROS FALTANTES **************
              ******************************************* */
            //LTK&FNZ - CONVOCATORIA 2022
            [
                //Geraldine Lucia Solano Carranza - Cambio de área
                'area' => 'MKT',
                'correo_persona' => 'gsolano@unitru.edu.pe',
                'fecha_inicio' => '2020-11-08',//Ingresó a MKT el 08 de Noviembre 2020
                'fecha_fin' => '2022-04-03',//Se cambió a LTK&FNZ en 2022(Asi que asumiré: 03 de Abril de 2022)
                'estado' =>'Cambio de área',
            ],
            [
                //Geraldine Lucia Solano Carranza
                'area' => 'LTK & FNZ',
                'correo_persona' => 'gsolano@unitru.edu.pe',
                'fecha_inicio' => '2022-04-03',//Se cambió a LTK&FNZ en 2022(Asi que asumiré: 03 de Abril de 2022)
                'fecha_fin' => '2024-01-05',//Se retiró voluntariamente de LTK&FNZ el 05 de Enero de 2024
                'estado' =>'Retiro voluntario',
            ],
            //MKT - CONVOCATORIA 2023
            [
                //Santos Medali Quiliche Vasquez
                'area' => 'MKT',
                'correo_persona' => 't020101720@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 De Junio 2023
                'fecha_fin' => '2025-03-17',//Egresó el 17 de marzo de 2025
                'estado' =>'Egresado',
            ],
        ];

        foreach ($personasEnAreas as $personaEnArea) {
            $personaEnArea['area_id'] = Area::where('abreviatura', $personaEnArea['area'])->first()->id;
            $personaEnArea['persona_id'] = Persona::where('correo_institucional', $personaEnArea['correo_persona'])->first()->id;

            unset($personaEnArea['area']);
            unset($personaEnArea['correo_persona']);

            AreaPersona::create($personaEnArea);
        }
    }
}
