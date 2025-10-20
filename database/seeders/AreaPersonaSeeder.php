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
                'correo_persona' => 't1051300621@unitru.edu.pe',//lucia Amaya
                'fecha_inicio' => '2024-06-01',//Ingresó a PMO el 01 de Junio de 2024
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //VICEPRESIDENTA
                'area' => 'GTH',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Pereda
                'fecha_inicio' => '2024-06-01',//Ingresó a GTH el 01 de Junio de 2024
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Gonzales
                'fecha_inicio' => '2022-05-10',//Ingresó a GTH el 10 De Mayo 2022
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Rodriguez
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK&FNZ el 01 de Junio de 2024
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1024000721@unitru.edu.pe',//Angel Iparraguirre
                'fecha_inicio' => '2023-06-13',//Ingresó a MKT el 13 de Junio de 2023
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'mfherrerace@unitru.edu.pe',//Mafer Herrera
                'fecha_inicio' => '2023-06-13',//Ingresó a PMO el 13 de Junio de 2023
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) TI
                'area' => 'TI',
                'correo_persona' => 'chmoralese@unitru.edu.pe',//Cristian Morales
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
                'fecha_fin' => '2025-08-03',//Se retiró de GTH el 03 de Agosto de 2025
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
                'correo_persona' => 'Csanchezd@unitru.edu.pe',
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
                //Se retiró de GTH el 03 de Agosto de 2025
                
            //CONVOCATORIA 2021(20-11-2021)
            [
                //Elber Isaí Pichén Zavaleta
                'area' => 'GTH',
                'correo_persona' => 't1024000121@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',//Ingresó a GTH el 20 de Noviembre 2021
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
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
                'fecha_inicio' => '2024-06-01',//Ingresó a LTK & FNZ el 01 de Junio 2024
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
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
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
                //Jorge Luis Vargas Baltodano
                'area' => 'TI',
                'correo_persona' => 't012700120@unitru.edu.pe',
                'fecha_inicio' => '2023-04-25',//Se cambió a TI el 25 de Abril de 2023
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
