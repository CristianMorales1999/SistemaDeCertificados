<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personas = [
            /********************************************
              *************** DIRECTIVA 2025 ************
              ******************************************* */
            [
                //Ingresó a PMO el 01 de Junio de 2024
                'nombres' => 'Lucía de Fátima',
                'apellidos' => 'Amaya Cáceda',
                'correo_personal' => 'aclucia21@gmail.com',
                'correo_institucional' => 't1051300621@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L4F1C',
                'imagen_firma' => 'fotos_firmas/Lucía de Fátima Amaya Cáceda.png'
            ],
            [
                //Ingresó a GTH el 01 de Junio de 2024
                'nombres' => 'Silvana Valeria',
                'apellidos' => 'Pereda Llave',
                'correo_personal' => 'silvanapereda02@gmail.com',
                'correo_institucional' => 'speredal@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S23P12',
                'imagen_firma' => 'fotos_firmas/Silvana Valeria Pereda Llave.jpg',
            ],
            [
                //Ingresó a GTH el 10 De Mayo 2022 
                'nombres' => 'Marina Lizeth',
                'apellidos' => 'Gonzales Torres',
                'correo_personal' => 'marinalizethgonzalestorres@gmail.com',
                'correo_institucional' => 't1510600121@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M12G21',
                'imagen_firma' => 'fotos_firmas/Marina Lizeth Gonzales Torres.jpg',
            ],
            [
                //Ingresó a LTK&FNZ el 01 de Junio de 2024
                'nombres' => 'Diego Jesús',
                'apellidos' => 'Rodríguez Sabana',
                'correo_personal' => 'diego.rodriguez160103@gmail.com',
                'correo_institucional' => 't1010100421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D10R20',
                'imagen_firma' => 'fotos_firmas/Diego Jesús Rodríguez Sabana.jpg',
            ],
            [
                //Ingresó a MKT el 13 de Junio de 2023
                'nombres' => 'Ángel',
                'apellidos' => 'Iparraguirre Aguilar',
                'correo_personal' => 'aia230704@gmail.com',
                'correo_institucional' => 't1024000721@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A9A',
                'imagen_firma' => 'fotos_firmas/Ángel Iparraguirre Aguilar.jpg',
            ],
            [
                //Ingresó a PMO el 13 de Junio de 2023
                'nombres' => 'María Fernanda de la Caridad',
                'apellidos' => 'Herrera Cerquín',
                'correo_personal' => 'mariafe.herrera.c@gmail.com',
                'correo_institucional' => 'mfherrerace@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M6D12C8C',
                'imagen_firma' => 'fotos_firmas/María Fernanda de la Caridad Herrera Cerquín.jpg',
            ],
            [
                //Ingresó a TI el 13 de Junio de 2023
                'nombres' => 'Christian Anthony',
                'apellidos' => 'Morales Esquivel',
                'correo_personal' => 'cm9225064@gmail.com',
                'correo_institucional' => 'chmoralese@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C1M5',
                'imagen_firma' => 'fotos_firmas/Cristian Anthony Morales Esquivel.png',
            ],

            /********************************************
              *************** DIRECTIVA 2024 ************
              ******************************************* */
            /*[
                //Ingresó a A el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a A el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a LTK&FNZ el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],*/

            /********************************************
              *************** DIRECTIVA 2023 ************
              ******************************************* */
            /*[
                //Ingresó a A el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a A el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a LTK&FNZ el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],*/

            /********************************************
              *************** DIRECTIVA 2022 ************
              ******************************************* */
            /*[
                //Ingresó a A el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a A el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a LTK&FNZ el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el D de M de Y
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],*/

            /********************************************
              *************** DIRECTIVA 2021 ************
              ******************************************* */
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Melva Noemi',
                'apellidos' => 'Carranza Rodriguez',
                'correo_personal' => 'noemi.02.carranza@gmail.com',
                'correo_institucional' => 'mcarranzar@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M14C19',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Lucciana Kathiuzka',
                'apellidos' => 'Hurtado Soledad',
                'correo_personal' => 'Luccianahs@gmail.com',
                'correo_institucional' => 'lhurtados@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L11H20',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'José Armando',
                'apellidos' => 'Vasquez Lopez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jvasquezl@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J1V12',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a LTK&FNZ el D de M de Y
                'nombres' => 'Jemina Rebeca',
                'apellidos' => 'Barboza Vilchez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jbarboza@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J19B23',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el D de M de Y
                'nombres' => 'Bagner Mallher',
                'apellidos' => 'Guzman Gonzales',
                'correo_personal' => 'bagnerguzmangonzales@gmail.com',
                'correo_institucional' => 'bguzman@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'B13G7',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el D de M de Y
                'nombres' => 'Pablo César',
                'apellidos' => 'Vasquez Narvaez',
                'correo_personal' => 'Pablocesa25@gmail.com',
                'correo_institucional' => 'pvasquez@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P3V14',
                'imagen_firma' => NULL,
            ],

            /********************************************
              *************** DIRECTIVA 2020 ************
              ******************************************* */
              [
                //Ingresó a A el D de M de Y
                'nombres' => 'Stephanie Catherine',
                'apellidos' => 'Figueroa Olivares',
                'correo_personal' => NULL,
                'correo_institucional' => 'sfigueroao@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S3F16',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a A el D de M de Y
                'nombres' => 'Jesabel del Carmen',
                'apellidos' => 'Crespin Chavez',
                'correo_personal' => 'jesabeldelcarmen@gmail.com',
                'correo_institucional' => 'jcrespinc@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J4C3C',
                'imagen_firma' => NULL,
            ],
            //Aqui estuvo MELVA NOEMI CARRANZA RODRIGUEZ:
                //- Presidenta Sedipro-2021
            [
                //Ingresó a LTK&FNZ el D de M de Y
                'nombres' => 'Diego Martín',
                'apellidos' => 'Moreno Vargas',
                'correo_personal' => 'diegomoreno4a@gmail.com',
                'correo_institucional' => 'dmorenoa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D13M23',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el D de M de Y
                'nombres' => 'Rogger Manuel',
                'apellidos' => 'Mejía Zuñiga',
                'correo_personal' => 'roggermejia2000@gmail.com',
                'correo_institucional' => 'rmejiaz@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R13M27',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el D de M de Y
                'nombres' => 'Mauricio Sebastian',
                'apellidos' => 'Bedón Oliva',
                'correo_personal' => NULL,
                'correo_institucional' => 'mbedono@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M20B16',
                'imagen_firma' => NULL,
            ],

            /********************************************
              *************** ÁREA DE GTH ***************
              ******************************************* */
            //INGRESO EN CONVOCATORIA 2019-I (Total : 9 personas)
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Fiorella Alexandra',
                'apellidos' => 'Alfaro Aguilar',
                'correo_personal' => NULL,
                'correo_institucional' => 'falfaro@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F1A1',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Leydi Estefani',
                'apellidos' => 'Cueva Zavaleta',
                'correo_personal' => NULL,
                'correo_institucional' => 'lcuevaz@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L5C27',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Angela Mariel',
                'apellidos' => 'Pereda Morales',
                'correo_personal' => NULL,
                'correo_institucional' => 'aperedaa@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A13P13',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Fiorella Rocio',
                'apellidos' => 'Reyes Cruz',
                'correo_personal' => NULL,
                'correo_institucional' => 'freyesc@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F19R3',
                'imagen_firma' => NULL,
            ],

            //Aqui ingresó MELVA NOEMI CARRANZA RODRIGUEZ 
                //- Directora de GTH-2020
                //- Presidenta de SEDIPRO-2021
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Azucena Lisseth',
                'apellidos' => 'Dominguez Vargas',
                'correo_personal' => NULL,
                'correo_institucional' => 'aldominguezv@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A12D23',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 03 de Septiembre 2019
                'nombres' => 'Angelica Alicia',
                'apellidos' => 'Campuzano Guevara',
                'correo_personal' => NULL,
                'correo_institucional' => 'acampuzanoa@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A1C7',
                'imagen_firma' => NULL,
            ],
            //Aqui ingresó JOSE ARMANDO VASQUEZ LOPEZ <jvasquezl@unitru.edu.pe>
                //- Director de GTH-2021
            //Aqui ingresó LUCCIANA KATHIUZKA HURTADO SOLEDAD <lhurtados@unitru.edu.pe>
                //- Vicepresidenta de SEDIPRO-2021

            //INGRESO EN CONVOCATORIA 2020-I (Total : 7 personas)
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                //Se cambió a MKT en 2021 y fue director de MKT en 2023
                'nombres' => 'Willian Alexander',
                'apellidos' => 'Paredes Rojas',
                'correo_personal' => 'paredeswar23@gmail.com',
                'correo_institucional' => 'waparedesr@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'W1P19',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                'nombres' => 'Jesús David',
                'apellidos' => 'Nuñez Arteaga',
                'correo_personal' => NULL,
                'correo_institucional' => 'jdnuneza@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J4N1',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                'nombres' => 'Esmeralda Marianela',
                'apellidos' => 'Valverde Moreno',
                'correo_personal' => NULL,
                'correo_institucional' => 'evalverdem@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E13V13',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                'nombres' => 'Edgar Enrique',
                'apellidos' => 'Grijalba Atavios',
                'correo_personal' => NULL,
                'correo_institucional' => 'egrijalbaa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E5G1',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                'nombres' => 'Alexis Angel Raúl',
                'apellidos' => 'Carrera Condo',
                'correo_personal' => NULL,
                'correo_institucional' => 'acarrerac@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A1R3C',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                'nombres' => 'Kevin Alexander',
                'apellidos' => 'Meregildo Garcia',
                'correo_personal' => NULL,
                'correo_institucional' => 'kmeregildo@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'K1M7',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 08 de Noviembre 2020
                'nombres' => 'Hilda Patricia',
                'apellidos' => 'Rodriguez Horna',
                'correo_personal' => NULL,
                'correo_institucional' => 'hrodriguezh@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'H17R8',
                'imagen_firma' => NULL,
            ],
            
            //INGRESO EN CONVOCATORIA 2021-I (Total : 11 personas)
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Yessenia Jackelyne',
                'apellidos' => 'Angulo Urbina',
                'correo_personal' => 'jangulourbina09@gmail.com',
                'correo_institucional' => 't510601520@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y10A22',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Beatriz Nancy',
                'apellidos' => 'Bamberger Leyva',
                'correo_personal' => NULL,
                'correo_institucional' => 't1454000221@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'B14B12',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Carlos Alberto',
                'apellidos' => 'Catañeda Santisteban',
                'correo_personal' => 'carlosalberto262000@gmail.com',
                'correo_institucional' => 'ccastanedas@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C1C20',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Diana Noemi',
                'apellidos' => 'De la Cruz Condor',
                'correo_personal' => NULL,
                'correo_institucional' => 'ddelacruzc@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D14D12C3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Geraldine Kathleen Azucena',
                'apellidos' => 'Gonzales Alquizar',
                'correo_personal' => NULL,
                'correo_institucional' => 't510102020@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'G11A7A',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Santiago Manuel',
                'apellidos' => 'Rodriguez Castillo',
                'correo_personal' => NULL,
                'correo_institucional' => 'smrodriguezc@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S13R3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Alexandra Fiorela',
                'apellidos' => 'Ruiz Alfaro',
                'correo_personal' => NULL,
                'correo_institucional' => 't1012600121@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A6R1',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Luis David',
                'apellidos' => 'Uriol Campos',
                'correo_personal' => NULL,
                'correo_institucional' => 'luriolc@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L4U3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Cinthia Azucena',
                'apellidos' => 'Narro Mendoza',
                'correo_personal' => NULL,
                'correo_institucional' => 't050100420@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C1N13',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Jhonner David',
                'apellidos' => 'Pesantes Huaylla',
                'correo_personal' => NULL,
                'correo_institucional' => 'jpesantesh@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J4P8',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Elber Isaí',
                'apellidos' => 'Pichén Zavaleta',
                'correo_personal' => 'pichenzavaleta@gmail.com',
                'correo_institucional' => 't1024000121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E9P2',
                'imagen_firma' => NULL,
            ],

            //Ingresó en CONVOCATORIA 2022-I (Total : 8 personas)
                //Aqui ingresó Marina Lizeth Gonzales Actual Direct de GTH-2025
            [
                'nombres' => 'Santiago Alonso',
                'apellidos' => 'Morales Flores',
                'correo_personal' => NULL,
                'correo_institucional' => 't010601720@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S1M6',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Eduardo David',
                'apellidos' => 'Risco Rios',
                'correo_personal' => NULL,
                'correo_institucional' => 't514000420@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E4R19',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Aitana Sofia',
                'apellidos' => 'Requejo Valle',
                'correo_personal' => NULL,
                'correo_institucional' => 't050100720@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A20R23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Bricelly Jazmin',
                'apellidos' => 'Ruiz Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 't020101420@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'B10R19',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Brayan Micael',
                'apellidos' => 'Linares Oyos',
                'correo_personal' => NULL,
                'correo_institucional' => 'blinares@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'B13L16',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Miguel Segundo',
                'apellidos' => 'Cabrera Morales',
                'correo_personal' => NULL,
                'correo_institucional' => 't020100320@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M20C13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Ariana Esther',
                'apellidos' => 'Navarro Zavaleta',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510602021@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A5N27',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Crhistian Fernando',
                'apellidos' => 'Hilario Salvador',
                'correo_personal' => NULL,
                'correo_institucional' => 'chilario@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C6H20',
                'imagen_firma' => NULL,
            ],

            //Ingresó en CONVOCATORIA 2023-I (Total : 6 personas)
            [
                //Ingresó a GTH el 13 De Junio 2023
                'nombres' => 'Alisson Milagros',
                'apellidos' => 'Pretell Canchas',
                'correo_personal' => 'pretellalisson@gmail.com',
                'correo_institucional' => 't050601920@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A13P3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 13 De Junio 2023
                'nombres' => 'Dulce Geraldine',
                'apellidos' => 'Chavez Padilla',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051302521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D7C17',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 13 De Junio 2023
                'nombres' => 'Romina Alejandra',
                'apellidos' => 'Seclen Cespedes',
                'correo_personal' => 'rominaalejandraseclen@gmail.com',
                'correo_institucional' => 't1052500521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'R1S3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 13 De Junio 2023
                'nombres' => 'Fernando Felipe',
                'apellidos' => 'Sanchez Palacios',
                'correo_personal' => NULL,
                'correo_institucional' => 't054000920@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'F6S17',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 13 De Junio 2023
                'nombres' => 'Luz Karina',
                'apellidos' => 'Angulo Urbina',
                'correo_personal' => NULL,
                'correo_institucional' => 'lkangulour@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L11A22',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 13 De Junio 2023
                'nombres' => 'Santos Maria',
                'apellidos' => 'Juarez Cruz',
                'correo_personal' => NULL,
                'correo_institucional' => 'sjuarez@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S13J3',
                'imagen_firma' => NULL,
            ],


            [
                'nombres' => 'Ana Nicoll',
                'apellidos' => 'Segura Aredo',
                'correo_personal' => 'anaseguraaredo@gmail.com',
                'correo_institucional' => 'anseguraa@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A14S1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Gerson Gabriel',
                'apellidos' => 'Alfaro Tandaypan',
                'correo_personal' => 'gersonalfa20@gmail.com',
                'correo_institucional' => 't1051500121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'G7A21',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'José Daniel',
                'apellidos' => 'Avila Santillan',
                'correo_personal' => 'Josedanielsantiavila@gmail.com',
                'correo_institucional' => 'jdavilas@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J4A20',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Juan Diego',
                'apellidos' => 'Hernández Jáuregui',
                'correo_personal' => 'juanhjauregui15@gmail.com',
                'correo_institucional' => 't1041500221@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J4H10',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Lisseth Adelaida',
                'apellidos' => 'Chávez Rosales',
                'correo_personal' => 'Chavezadelaida25@gmail.com',
                'correo_institucional' => 'lichavezr@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L1C19',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Mariann Estefany',
                'apellidos' => 'Fernández Leyva',
                'correo_personal' => 'maryferley.2004@gmail.com',
                'correo_institucional' => 't1050102021@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M5F12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Michael Junior',
                'apellidos' => 'García García',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051300421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M10G7',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Nashaly Nicolle',
                'apellidos' => 'Alama Terrones',
                'correo_personal' => 'nashalyalamaterrones@gmail.com',
                'correo_institucional' => 'nalama@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N14A21',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Renzo Georkael',
                'apellidos' => 'Carrasco Lalangui',
                'correo_personal' => 'renzocarrascola02@gmail.com',//Duda
                'correo_institucional' => 'rgcarrascol@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R7C12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Corina Marilu',
                'apellidos' => 'Sanchez Delgado',
                'correo_personal' => NULL,
                'correo_institucional' => 'Csanchezd@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C13S4',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Andrweeu Daniel',
                'apellidos' => 'Urtecho Avila',
                'correo_personal' => 'aurtechoa@gmail.com',
                'correo_institucional' => 'aurtechoa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A4U1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Anderson Alexander',
                'apellidos' => 'Saavedra Nolasco',
                'correo_personal' => NULL,
                'correo_institucional' => 'aasaavedrano@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A1S14',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Luis Enrique',
                'apellidos' => 'Montoya Aguirre',
                'correo_personal' => NULL,
                'correo_institucional' => 'lemontoyaa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L5M1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cristhian Luis David',
                'apellidos' => 'Sánchez Obeso',
                'correo_personal' => NULL,
                'correo_institucional' => 'clsanchezo@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C12D20O',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Joaquin Adriano',
                'apellidos' => 'Bocanegra Peláez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jabocanegrap@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J1B17',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Emilly Nicoll',
                'apellidos' => 'Zavaleta Chigne',
                'correo_personal' => NULL,
                'correo_institucional' => 'enzavaletac@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F14Z3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Eleanor Marycielo',
                'apellidos' => 'Roca Mendoza',
                'correo_personal' => NULL,
                'correo_institucional' => 'emrocam@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E13R13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Valeria Angelie',
                'apellidos' => 'Valderrama Muñoz',
                'correo_personal' => NULL,
                'correo_institucional' => 'vavalderramam@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'V1V13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Rodrigo Marcial',
                'apellidos' => 'Gamboa Gonzáles',
                'correo_personal' => 'rodrigogg0812@gmail.com',
                'correo_institucional' => 'rmgamboag@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R13G7',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Yrma Lucero',
                'apellidos' => 'Carruitero Aspiros',
                'correo_personal' => NULL,
                'correo_institucional' => 'ycarruitero@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y12C1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Yuliana Zarai',
                'apellidos' => 'Cuadra Rodriguez',
                'correo_personal' => 'Zaraicuadra18@gmail.com',
                'correo_institucional' => 't1020100521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y27C19',
                'imagen_firma' => NULL,
            ],

            //ÁREA DE LTK&FNZ - 20
            /*[
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],

            //ÁREA DE MKT - 15
            [
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],

            //ÁREA DE PMO - 15
            [
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],

            //ÁREA DE TI - 10
            [
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => '',
                'apellidos' => '',
                'correo_personal' => NULL,
                'correo_institucional' => '',
                'sexo' => '',
                'codigo' => '',
                'imagen_firma' => NULL,
            ],*/
           
            

        ];

        foreach ($personas as $persona) {
            Persona::create($persona);
        }
        
    }
}
