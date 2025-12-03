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
             ********** SPONSOR SEDIPRO UNT ************
             ******************************************* */
            [
                //SPONSOR SEDIPRO UNT (Patrocinador)
                'nombres' => 'Luis Alberto',
                'apellidos' => 'Julca Verastegui',
                'correo_personal' => NULL,
                'correo_institucional' => 'ljulcav@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L1J23',
                'imagen_firma' => 'fotos_firmas/Luis Alberto Julca Verastegui.png'
            ],
            /********************************************
             *************** DIRECTIVA 2025 ************
             ******************************************* */
            [
                //PRESIDENTA-2025
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
                //VICEPRESIDENTA-2025
                //Ingresó a GTH el 01 de Junio de 2024
                'nombres' => 'Silvana Valeria',
                'apellidos' => 'Pereda Llave',
                'correo_personal' => 'silvanapereda02@gmail.com',
                'correo_institucional' => 'speredal@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S23P12',
                'imagen_firma' => 'fotos_firmas/Silvana Valeria Pereda Llave.png',
            ],
            [
                //DIRECTORA DE GTH-2025
                //Ingresó a GTH el 10 De Mayo 2022
                'nombres' => 'Marina Lizeth',
                'apellidos' => 'Gonzales Torres',
                'correo_personal' => 'marinalizethgonzalestorres@gmail.com',
                'correo_institucional' => 't1510600121@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M12G21',
                'imagen_firma' => 'fotos_firmas/Marina Lizeth Gonzales Torres.png',
            ],
            [
                //DIRECTOR DE LTK&FNZ-2025
                //Ingresó a LTK&FNZ el 01 de Junio de 2024
                'nombres' => 'Diego Jesús',
                'apellidos' => 'Rodríguez Sabana',
                'correo_personal' => 'diego.rodriguez160103@gmail.com',
                'correo_institucional' => 't1010100421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D10R20',
                'imagen_firma' => 'fotos_firmas/Diego Jesús Rodríguez Sabana.png',
            ],
            [
                //DIRECTOR DE MKT-2025
                //Ingresó a MKT el 13 de Junio de 2023
                'nombres' => 'Ángel',
                'apellidos' => 'Iparraguirre Aguilar',
                'correo_personal' => 'aia230704@gmail.com',
                'correo_institucional' => 't1024000721@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A9A',
                'imagen_firma' => 'fotos_firmas/Ángel Iparraguirre Aguilar.png',
            ],
            [
                //DIRECTORA DE PMO-2025
                //Ingresó a PMO el 13 de Junio de 2023
                'nombres' => 'María Fernanda de la Caridad',
                'apellidos' => 'Herrera Cerquín',
                'correo_personal' => 'mariafe.herrera.c@gmail.com',
                'correo_institucional' => 'mfherrerace@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M6D12C8C',
                'imagen_firma' => 'fotos_firmas/María Fernanda de la Caridad Herrera Cerquín.png',
            ],
            [
                //DIRECTOR DE TI-2025
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
            [
                //PRESIDENTA-2024
                //Ingresó a PMO el 10 de Mayo de 2022
                //Egresó de PMO el 17 de Marzo 2025
                'nombres' => 'Cinthya Soledad',
                'apellidos' => 'Gil Toribio',
                'correo_personal' => 'cinthyagiltoribio7@gmail.com',
                'correo_institucional' => 't010100820@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C20G21',
                'imagen_firma' => 'fotos_firmas/Cinthya Soledad Gil Toribio.png',
            ],
            [
                //VICEPRESIDENTA-2024
                //Ingresó a GTH el 13 de Junio de 2023
                //Se retiró de GTH el 03 de Agosto de 2025
                'nombres' => 'Romina Alejandra',
                'apellidos' => 'Seclen Cespedes',
                'correo_personal' => 'rominaalejandraseclen@gmail.com',
                'correo_institucional' => 't1052500521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'R1S3',
                'imagen_firma' => 'fotos_firmas/Romina Alejandra Seclen Cespedes.png',
            ],
            [
                //DIRECTORA DE GTH-2024
                //Ingresó a GTH el 10 de Mayo de 2022
                //Egresó de GTH el 17 de Marzo 2025
                'nombres' => 'Bricelly Jazmin',
                'apellidos' => 'Ruiz Rodriguez',
                'correo_personal' => 'bricelly2001@gmail.com',
                'correo_institucional' => 't020101420@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'B10R19',
                'imagen_firma' => 'fotos_firmas/Bricelly Jazmin Ruiz Rodriguez.png',
            ],
            [
                //DIRECTOR DE LTK&FNZ-2024
                //Ingresó a LTK&FNZ el 20 de Diciembre de 2022(Convo-Extraordinaria)
                'nombres' => 'Sebastian Emanuel',
                'apellidos' => 'Facundo Reyes',
                'correo_personal' => 'sebas.facu.18@gmail.com',
                'correo_institucional' => 't1512400421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S5F19',
                'imagen_firma' => 'fotos_firmas/Sebastian Emanuel Facundo Reyes.png',
            ],
            [
                //DIRECTORA DE MKT-2024
                //Ingresó a MKT el 20 de Diciembre de 2022(Convo-Extraordinaria)
                'nombres' => 'Zulema Adeli',
                'apellidos' => 'Valverde Zavaleta',
                'correo_personal' => 'adelivalverdezavaleta@gmail.com',
                'correo_institucional' => 't1510100321@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Z1V27',
                'imagen_firma' => 'fotos_firmas/Zulema Adeli Valverde Zavaleta.png',
            ],
            [
                //DIRECTORA DE PMO-2024
                //Ingresó a PMO el 20 de Noviembre de 2021
                'nombres' => 'Ivanna Sofia',
                'apellidos' => 'Vela Ocampo',
                'correo_personal' => 'ivannavelaocampo@gmail.com',
                'correo_institucional' => 't510100520@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'I20V16',
                'imagen_firma' => 'fotos_firmas/Ivanna Sofia Vela Ocampo.png',
            ],
            //DIRECTOR DE TI-2024
            //Aqui estuvo CHRISTIAN ANTHONY MORALES ESQUIVEL <chmoralese@unitru.edu.pe>
            //- Director de TI-2025

            /********************************************
             *************** DIRECTIVA 2023 ************
             ******************************************* */
            [
                //PRESIDENTA-2023
                //Ingresó a MKT el 09 de Junio de 2020(Segun: https://drive.google.com/file/d/1CxcZRJBxSGDuZcJybGfkLPjsV-xyJjIJ/view?usp=sharing)
                //Se cambió a PMO el 8 de Noviembre de 2020(Esta fecha es del ingreso de los nuevos y es referencial)
                //Egresó de PMO el 17 de Marzo 2025
                'nombres' => 'Micaela Anthoaneth',
                'apellidos' => 'Cardenas Contreras',
                'correo_personal' => 'micantho1105@gmail.com',
                'correo_institucional' => 't534000120@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M1C3',
                'imagen_firma' => 'fotos_firmas/Micaela Anthoaneth Cardenas Contreras.png',
            ],
            [
                //VICEPRESIDENTA-2023
                //Ingresó a GTH el 8 de Noviembre de 2020(Es lo más seguro, aunque no aparece en el post de bienvenida)
                //No hay registro de si egresó o se retiró acabando el 2023.
                'nombres' => 'Alejandra Verenisse',
                'apellidos' => 'Ruiz Rodriguez',
                'correo_personal' => 'aleruizrodriguez.14@gmail.com',
                'correo_institucional' => 't050101120@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A23R19',
                'imagen_firma' => 'fotos_firmas/Alejandra Verenisse Ruiz Rodriguez.png',
            ],
            [
                //DIRECTORA DE GTH-2023
                //Ingresó a GTH el 20 de Noviembre 2021
                //Se retiró de GTH el 02 de Marzo de 2024
                'nombres' => 'Yessenia Jackelyne',
                'apellidos' => 'Angulo Urbina',
                'correo_personal' => 'jangulourbina09@gmail.com',
                'correo_institucional' => 't510601520@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y10A22',
                'imagen_firma' => 'fotos_firmas/Yessenia Jackelyne Angulo Urbina.jpg',
            ],
            [
                //DIRECTOR DE LTK&FNZ-2023
                //Ingresó a MKT el 08 de Noviembre 2020
                //Se cambió a LTK en 2021
                //Egresó de LTK&FNZ el 08 de Marzo 2024
                'nombres' => 'Edwin Jardel',
                'apellidos' => 'Zelada Vasquez',
                'correo_personal' => 'edwin.jardel.2000@gmail.com',
                'correo_institucional' => 'ejzeladav@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E10Z23',
                'imagen_firma' => 'fotos_firmas/Edwin Jardel Zelada Vasquez.jpg',
            ],
            [
                //DIRECTOR DE MKT-2023
                //Ingresó a GTH el 08 de Noviembre 2020
                //Se cambió a MKT en 2021
                //Egresó de MKT el 08 de Marzo 2024
                'nombres' => 'Willian Alexander',
                'apellidos' => 'Paredes Rojas',
                'correo_personal' => 'paredeswar23@gmail.com',
                'correo_institucional' => 'waparedesr@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'W1P19',
                'imagen_firma' => 'fotos_firmas/Willian Alexander Paredes Rojas.jpg',
            ],
            [
                //DIRECTOR DE PMO-2023
                //Ingresó a MKT el 08 de Noviembre 2020
                //Se cambió a PMO a finales del 2021
                //No hay registro de si egresó o se retiró
                'nombres' => 'Edwin Jeyson',
                'apellidos' => 'Valencia Gaona',
                'correo_personal' => 'jeyvalencia2019@gmail.com',
                'correo_institucional' => 'evalencia@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E10V7',
                'imagen_firma' => 'fotos_firmas/Edwin Jeyson Valencia Gaona.jpg',
            ],

            /********************************************
             *************** DIRECTIVA 2022 ************
             ******************************************* */
            [
                //PRESIDENTA-2022
                //Ingresó a MKT el 03 de Septiembre 2019
                //Se cambió a PMO a finales de 2020 (Esto lo asumo ya que puede que se haya cambiado en 2021)
                //Egresó de PMO el 21 de Marzo 2023
                'nombres' => 'Angie Evelin',
                'apellidos' => 'Cabrera Garcia',
                'correo_personal' => 'angie0717cab@gmail.com',
                'correo_institucional' => 'aecabrerag@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A5C7',
                'imagen_firma' => 'fotos_firmas/Angie Evelin Cabrera Garcia.jpg',
            ],
            //VICEPRESIDENTA-2022
            //Aqui estuvo MICAELA ANTHOANETH CARDENAS CONTRERAS <t534000120@unitru.edu.pe>
            //- Presidenta SEDIPRO-2023
            //DIRECTORA DE GTH-2022
            //Aqui estuvo ALEJANDRA VERENISSE RUIZ RODRIGUEZ <t050101120@unitru.edu.pe>
            //- Vicepresidenta SEDIPRO-2023
            [
                //DIRECTOR DE LTK&FNZ-2022
                //Ingresó a LTK&FNZ el 8 de Noviembre de 2020
                //Egresó de LTK&FNZ el 21 de Marzo 2023
                'nombres' => 'Danjhel Noe',
                'apellidos' => 'Villanueva Valera',
                'correo_personal' => 'dvillanuevavalera@gmail.com',
                'correo_institucional' => 'dnvillanuevav@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D14V23',
                'imagen_firma' => 'fotos_firmas/Danjhel Noe Villanueva Valera.jpg',
            ],
            [
                //DIRECTOR DE MKT-2022
                //Ingresó a MKT el 08 de Noviembre de 2020
                //Egresó de MKT el 08 de Marzo 2024
                'nombres' => 'Elian Carlos',
                'apellidos' => 'Pinedo Gomez',
                'correo_personal' => 'elian.16.ecpg@gmail.com',
                'correo_institucional' => 'epinedog@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E3P7',
                'imagen_firma' => 'fotos_firmas/Elian Carlos Pinedo Gomez.jpg',
            ],
            [
                //DIRECTOR DE PMO-2022
                //Ingresó a MKT el 03 de Septiembre 2019
                //Se cambió a PMO a finales de 2020
                //Egresó de PMO el 21 de Marzo 2023
                'nombres' => 'Hans',
                'apellidos' => 'Cubeños Montoya',
                'correo_personal' => 'hanscubenos@gmail.com',
                'correo_institucional' => 'hcubenos@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'H3M',
                'imagen_firma' => 'fotos_firmas/Hans Cubeños Montoya.jpg',
            ],

            /********************************************
             *************** DIRECTIVA 2021 ************
             ******************************************* */
            [
                //PRESIDENTA-2021
                //Ingresó a GTH el 03 de Septiembre 2019
                //Egresó el 03 de Abril de 2022
                'nombres' => 'Melva Noemi',
                'apellidos' => 'Carranza Rodriguez',
                'correo_personal' => 'noemi.02.carranza@gmail.com',
                'correo_institucional' => 'mcarranzar@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M14C19',
                'imagen_firma' => 'fotos_firmas/Melva Noemi Carranza Rodriguez.jpg',
            ],
            [
                //VICEPRESIDENTA-2021
                //Ingresó a GTH el 03 de Septiembre 2019
                //No hay registro de si egresó o si se retiró
                'nombres' => 'Lucciana Kathiuzka',
                'apellidos' => 'Hurtado Soledad',
                'correo_personal' => 'Luccianahs@gmail.com',
                'correo_institucional' => 'lhurtados@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L11H20',
                'imagen_firma' => 'fotos_firmas/Lucciana Kathiuzka Hurtado Soledad.jpg',
            ],
            [
                //DIRECTOR DE GTH-2021
                //Ingresó a GTH el 03 de Septiembre 2019
                //No hay registro de si egresó o si se retiró
                'nombres' => 'José Armando',
                'apellidos' => 'Vasquez Lopez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jvasquezl@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J1V12',
                'imagen_firma' => 'fotos_firmas/José Armando Vasquez Lopez.jpg',
            ],
            [
                //DIRECTORA DE LTK&FNZ-2021
                //Ingresó a LTK&FNZ el D de M de Y
                //Egresó el 03 de Abril de 2022
                'nombres' => 'Jemina Rebeca',
                'apellidos' => 'Barboza Vilchez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jbarboza@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J19B23',
                'imagen_firma' => 'fotos_firmas/Jemina Rebeca Barboza Vilchez.jpg',
            ],
            [
                //DIRECTOR DE MKT-2021
                //Ingresó a MKT el D de M de Y
                //No hay registro de si egresó o si se retiró
                'nombres' => 'Bagner Mallher',
                'apellidos' => 'Guzman Gonzales',
                'correo_personal' => 'bagnerguzmangonzales@gmail.com',
                'correo_institucional' => 'bguzman@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'B13G7',
                'imagen_firma' => 'fotos_firmas/Bagner Mallher Guzman Gonzales.jpg',
            ],
            [
                //DIRECTOR DE PMO-2021
                //Ingresó a GTH el 29 de Octubre de 2018
                //Se cambió a PMO el D de M de Y
                //Egresó el 03 de Abril de 2022
                'nombres' => 'Pablo César',
                'apellidos' => 'Vasquez Narvaez',
                'correo_personal' => 'Pablocesa25@gmail.com',
                'correo_institucional' => 'pvasquez@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P3V14',
                'imagen_firma' => 'fotos_firmas/Pablo César Vasquez Narvaez.jpg',
            ],

            /********************************************
             *************** DIRECTIVA 2020 ************
             ******************************************* */
            [
                //PRESIDENTA-2020
                //Ingresó a LTK&FNZ el 11 de Agosto de 2017
                //No hay registro de si egresó o si se retiró
                'nombres' => 'Stephanie Catherine',
                'apellidos' => 'Figueroa Olivares',
                'correo_personal' => NULL,
                'correo_institucional' => 'sfigueroao@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S3F16',
                'imagen_firma' => 'fotos_firmas/Stephanie Catherine Figueroa Olivares.jpg',
            ],
            [
                //VICEPRESIDENTA-2020
                //Ingresó a A el D de M de Y
                //Egresó el 03 de Abril de 2022
                'nombres' => 'Jesabel del Carmen',
                'apellidos' => 'Crespin Chavez',
                'correo_personal' => 'jesabeldelcarmen@gmail.com',
                'correo_institucional' => 'jcrespinc@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J4C3C',
                'imagen_firma' => 'fotos_firmas/Jesabel del Carmen Crespin Chavez.jpg',
            ],
            //DIRECTORA DE GTH-2020
            //Aqui estuvo MELVA NOEMI CARRANZA RODRIGUEZ:
            //- Presidenta Sedipro-2021
            [
                //DIRECTOR DE LTK&FNZ-2020
                //Ingresó a LTK&FNZ el D de M de Y
                //Egresó el 03 de Abril de 2022
                'nombres' => 'Diego Martín',
                'apellidos' => 'Moreno Vargas',
                'correo_personal' => 'diegomoreno4a@gmail.com',
                'correo_institucional' => 'dmorenoa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D13M23',
                'imagen_firma' => 'fotos_firmas/Diego Martín Moreno Vargas.jpg',
            ],
            [
                //DIRECTOR DE MKT-2020
                //Ingresó a MKT el 29 de Octubre de 2018
                //Egresó el 03 de Abril de 2022
                'nombres' => 'Rogger Manuel',
                'apellidos' => 'Mejía Zuñiga',
                'correo_personal' => 'roggermejia2000@gmail.com',
                'correo_institucional' => 'rmejiaz@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R13M27',
                'imagen_firma' => 'fotos_firmas/Rogger Manuel Mejía Zuñiga.jpg',
            ],
            [
                //DIRECTOR DE PMO-2020
                //Ingresó a MKT el 14 de Octubre de 2016
                //Se cambió a PMO el D de M de Y
                //No hay registro de si egresó o si se retiró
                'nombres' => 'Mauricio Sebastian',
                'apellidos' => 'Bedón Oliva',
                'correo_personal' => NULL,
                'correo_institucional' => 'mbedono@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M20B16',
                'imagen_firma' => 'fotos_firmas/Mauricio Sebastian Bedón Oliva.jpg',
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
                //Egresó el 03 de Abril de 2022
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
                'nombres' => 'Jesús David',
                'apellidos' => 'Nuñez Arteaga',
                'correo_personal' => NULL,
                'correo_institucional' => 'jdnuneza@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J4N1',
                'imagen_firma' => NULL,
            ],

            //Aqui ingresó WILLIAN ALEXANDER PAREDES ROJAS <waparedesr@unitru.edu.pe> a GTH
            //- Nuevo miembro de MKT en 2021
            //- Director de MKT-2023

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
                //Egresó el 03 de Abril de 2022
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
                'nombres' => 'Beatriz Nancy',
                'apellidos' => 'Bamberger Leyva',
                'correo_personal' => NULL,
                'correo_institucional' => 't1454000221@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'B14B12',
                'imagen_firma' => NULL,
            ],
            //Aqui ingresó YESSENIA JACKELYNE ANGULO URBINA <t510601520@unitru.edu.pe>
            //- Directora de GTH-2023
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
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 20 de Noviembre 2021
                'nombres' => 'Elber Isaí',
                'apellidos' => 'Pichén Zavaleta',
                'correo_personal' => 'pichenzavaleta@gmail.com',
                'correo_institucional' => 't1024000121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E9P2',
                'imagen_firma' => NULL,
            ],

            //Ingresó en CONVOCATORIA 2022-I (Total : 8 personas)

            //Aqui ingresó MARINA LIZETH GONZALES TORRES <t1510600121@unitru.edu.pe>
            //- Directora de GTH-2025
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

            //Aqui ingresó BRICELLY JAZMIN RUIZ RODRIGUEZ <t020101420@unitru.edu.pe>
            //- Directora de GTH-2024

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
                //MIEMBRO ACTIVO 2025-I
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
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 13 De Junio 2023
                'nombres' => 'Dulce Geraldine',
                'apellidos' => 'Chavez Padilla',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051302521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D7C17',
                'imagen_firma' => NULL,
            ],
            //Aqui ingresó ROMINA ALEJANDRA SECLEN CESPEDES <t1052500521@unitru.edu.pe>
            //- Vicepresidenta SEDIPRO-2024
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
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 10 De Diciembre 2024
                'nombres' => 'Ana Nicoll',
                'apellidos' => 'Segura Aredo',
                'correo_personal' => 'anaseguraaredo@gmail.com',
                'correo_institucional' => 'anseguraa@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A14S1',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 10 De Diciembre 2024
                //Se le retiró de GTH por bajo rendimiento el 17 de Junio de 2025
                'nombres' => 'Gerson Gabriel',
                'apellidos' => 'Alfaro Tandaypan',
                'correo_personal' => 'gersonalfa20@gmail.com',
                'correo_institucional' => 't1051500121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'G7A21',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 01 De Junio 2024
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
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 01 De Junio 2024
                'nombres' => 'Lisseth Adelaida',
                'apellidos' => 'Chávez Rosales',
                'correo_personal' => 'Chavezadelaida25@gmail.com',
                'correo_institucional' => 'lichavezr@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L1C19',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 01 De Junio 2024
                'nombres' => 'Mariann Estefany',
                'apellidos' => 'Fernández Leyva',
                'correo_personal' => 'maryferley.2004@gmail.com',
                'correo_institucional' => 't1050102021@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M5F12',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 01 De Junio 2024
                'nombres' => 'Michael Junior',
                'apellidos' => 'García García',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051300421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M10G7',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 01 De Junio 2024
                'nombres' => 'Nashaly Nicolle',
                'apellidos' => 'Alama Terrones',
                'correo_personal' => 'nashalyalamaterrones@gmail.com',
                'correo_institucional' => 'nalama@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N14A21',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 01 De Junio 2024
                'nombres' => 'Renzo Georkael',
                'apellidos' => 'Carrasco Lalangui',
                'correo_personal' => 'renzocarrascola02@gmail.com', //Duda
                'correo_institucional' => 'rgcarrascol@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R7C12',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 10 De Diciembre 2024
                'nombres' => 'Corina Marilu',
                'apellidos' => 'Sanchez Delgado',
                'correo_personal' => NULL,
                'correo_institucional' => 'csanchezd@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C13S4',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a GTH el 10 De Diciembre 2025
                'nombres' => 'Andrweeu Daniel',
                'apellidos' => 'Urtecho Avila',
                'correo_personal' => 'aurtechoa@gmail.com',
                'correo_institucional' => 'aurtechoa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A4U1',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 2 De Mayo 2025
                'nombres' => 'Anderson Alexander',
                'apellidos' => 'Saavedra Nolasco',
                'correo_personal' => NULL,
                'correo_institucional' => 'aasaavedrano@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A1S14',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 2 De Mayo 2025
                'nombres' => 'Luis Enrique',
                'apellidos' => 'Montoya Aguirre',
                'correo_personal' => NULL,
                'correo_institucional' => 'lemontoyaa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L5M1',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 2 De Mayo 2025
                'nombres' => 'Cristhian Luis David',
                'apellidos' => 'Sánchez Obeso',
                'correo_personal' => NULL,
                'correo_institucional' => 'clsanchezo@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C12D20O',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 2 De Mayo 2025
                'nombres' => 'Joaquin Adriano',
                'apellidos' => 'Bocanegra Peláez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jabocanegrap@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J1B17',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 2 De Mayo 2025
                'nombres' => 'Emilly Nicoll',
                'apellidos' => 'Zavaleta Chigne',
                'correo_personal' => NULL,
                'correo_institucional' => 'enzavaletac@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F14Z3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 2 De Mayo 2025
                'nombres' => 'Eleanor Marycielo',
                'apellidos' => 'Roca Mendoza',
                'correo_personal' => NULL,
                'correo_institucional' => 'emrocam@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E13R13',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a GTH el 2 De Mayo 2025
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

            /********************************************
             *************** ÁREA DE LTK&FNZ ************
             ******************************************* */
            //Total de miembros activos en LTK&FNZ - 21
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 20 De Noviembre 2021
                //Se cambió a LTK&FNZ el 03 de Mayo 2023
                'nombres' => 'Jhosmel Anderson',
                'apellidos' => 'Vigo Cepeda',
                'correo_personal' => 'jhosmelvigoc4@gmail.com',
                'correo_institucional' => 't1511601421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J1V3',
                'imagen_firma' => NULL, //Falta firma por ser DP
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 20 De Diciembre 2022 (Convo-Extraordinaria)
                'nombres' => 'Fernanda Milagros',
                'apellidos' => 'Rojas Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510101721@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F13R19',
                'imagen_firma' => NULL,
            ],
            //Aqui ingresó SEBASTIAN EMANUEL FACUNDO REYES <t1512400421@unitru.edu.pe> 
            //Ingresó a LTK&FNZ el 20 de Diciembre de 2022(Convo-Extraordinaria)
            //- Director de LTK&FNZ-2024
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 13 De Junio 2023
                'nombres' => 'Kevin Gamaliel',
                'apellidos' => 'Rodríguez Alfaro',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510101021@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'K7R1',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 01 De Junio 2024
                'nombres' => 'Grecia Alexandra',
                'apellidos' => 'Paredes Cachique',
                'correo_personal' => NULL,
                'correo_institucional' => 'gaparedesca@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'G1P3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el 01 De Junio 2024
                //Se le retiró de LTK&FNZ por bajo rendimiento el 15 de Julio de 2025
                'nombres' => 'Jimmy Andersonn',
                'apellidos' => 'Cáceda Olivera',
                'correo_personal' => NULL,
                'correo_institucional' => 'jcacedao@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J1C16',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 01 De Junio 2024 
                'nombres' => 'Maria Fernanda',
                'apellidos' => 'Pretell Leon',
                'correo_personal' => NULL,
                'correo_institucional' => 't1010700721@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M6P12',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 01 De Junio 2024 
                'nombres' => 'Mixie Arleni',
                'apellidos' => 'Gil Zapata',
                'correo_personal' => NULL,
                'correo_institucional' => 'magilza@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M1G27',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 01 De Junio 2024 
                'nombres' => 'Nestor Rafael',
                'apellidos' => 'Placencia De la Cruz',
                'correo_personal' => NULL,
                'correo_institucional' => 'nrplasenciade@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'N19P4L3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 01 De Junio 2024
                'nombres' => 'Tatiana Yuleisy',
                'apellidos' => 'Aliaga Pretell',
                'correo_personal' => NULL,
                'correo_institucional' => 'taliaga@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'T26A17',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 10 De Diciembre 2024
                'nombres' => 'Christian Rodrigo',
                'apellidos' => 'Valverde Caspito',
                'correo_personal' => 'christiancvalverdecaspito@gmail.com',
                'correo_institucional' => 'crvalverdeca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C19V3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 10 De Diciembre 2024
                'nombres' => 'Eddie Alessandro',
                'apellidos' => 'Jiménez Vilchez',
                'correo_personal' => 'eddiealessandro20@gmail.com',
                'correo_institucional' => 'ejimenezv@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E1J23',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 10 De Diciembre 2024
                'nombres' => 'Fabián Nicolas',
                'apellidos' => 'Paredes Calderón',
                'correo_personal' => NULL,
                'correo_institucional' => 'fnparedesca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'F14P3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 10 De Diciembre 2024
                'nombres' => 'Kiara Marife',
                'apellidos' => 'Rodriguez Sifuentes',
                'correo_personal' => NULL,
                'correo_institucional' => 'krodriguezsi@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'K13R20',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 10 De Diciembre 2024
                'nombres' => 'Luis Angel',
                'apellidos' => 'Laureano Escobedo',
                'correo_personal' => 'luislaureanoescobedo@gmail.com',
                'correo_institucional' => 't1511300521@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L1L5',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 02 De Mayo 2025
                'nombres' => 'Cristhian Imanol',
                'apellidos' => 'Campos Castro',
                'correo_personal' => 'Cristhianimanol@hotmail.com', //Hotmail 
                'correo_institucional' => 'cicamposc@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C9C3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 02 De Mayo 2025
                'nombres' => 'Dalia Irina',
                'apellidos' => 'Garcia De la Cruz',
                'correo_personal' => 'daliagarciadelacruz@gmail.com',
                'correo_institucional' => 'digarciad@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D9G4L3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 02 De Mayo 2025
                'nombres' => 'Diego Andree',
                'apellidos' => 'Garro Taboada',
                'correo_personal' => NULL,
                'correo_institucional' => 'dgarro@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D1G21',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 02 De Mayo 2025
                'nombres' => 'Fabiana Belen',
                'apellidos' => 'Sosa Parra',
                'correo_personal' => 'fabianasosaparra@gmail.com',
                'correo_institucional' => 'fsosap@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F2S17',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 02 De Mayo 2025 
                'nombres' => 'Nory Ann Marie',
                'apellidos' => 'Touzet Meneses',
                'correo_personal' => NULL,
                'correo_institucional' => 'ntouzet@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N1M21M',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 02 De Mayo 2025
                'nombres' => 'Priscila Crystal',
                'apellidos' => 'Villegas Dominguez',
                'correo_personal' => 'Priscilavillegas.13@gmail.com',
                'correo_institucional' => 'pcvillegasdo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'P3V4',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a LTK&FNZ el 02 De Mayo 2025
                'nombres' => 'Yamelyn Leslie',
                'apellidos' => 'Rios Tandaypan',
                'correo_personal' => NULL,
                'correo_institucional' => 'yriost@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y12R21',
                'imagen_firma' => NULL,
            ],

            /*******************************************
             *************** ÁREA DE MKT ***************
             ******************************************* */
            //Total de miembros activos en MKT - 22
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Adriana Gabriela',
                'apellidos' => 'Castillo Ochoa',
                'correo_personal' => NULL,
                'correo_institucional' => 'acastilloo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A7C16',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 10 de Mayo de 2022
                'nombres' => 'Anderson Abat',
                'apellidos' => 'Otiniano Morales',
                'correo_personal' => 'anderson.otiniano.avanz@gmail.com',
                'correo_institucional' => 'aotinianom@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A1O13',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Angelo Salvattore',
                'apellidos' => 'Chavarry Bustamante',
                'correo_personal' => 'angelochavarry03@gmail.com',
                'correo_institucional' => 'aschavarryb@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A20C2',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 01 de Junio de 2024
                'nombres' => 'Angie Tatiana',
                'apellidos' => 'Recuenco Tapia',
                'correo_personal' => NULL,
                'correo_institucional' => 't1013600421@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A21R21',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 10 de Diciembre de 2024
                'nombres' => 'Belinda Maricielo',
                'apellidos' => 'Arroyo Esquivel',
                'correo_personal' => NULL,
                'correo_institucional' => 'barroyo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'B13A5',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Cesar Junior',
                'apellidos' => 'Quito Cruz',
                'correo_personal' => NULL,
                'correo_institucional' => 'cquito@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C10Q3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 01 de Junio de 2024
                'nombres' => 'Cielo Valentina',
                'apellidos' => 'Abanto Rojas',
                'correo_personal' => NULL,
                'correo_institucional' => 'cvabantor@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C23A19',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 10 de Diciembre de 2024
                'nombres' => 'Diego Jesús',
                'apellidos' => 'Ullilén Chávez',
                'correo_personal' => 'diegoullilen250503@gmail.com',
                'correo_institucional' => 'dullilen@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D10U3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 01 de Junio de 2024
                'nombres' => 'Emelyn Yasmin',
                'apellidos' => 'Aguirre Valverde',
                'correo_personal' => NULL,
                'correo_institucional' => 't1520100421@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E26A23',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 10 de Mayo de 2022
                'nombres' => 'Ghenary Tais',
                'apellidos' => 'Esquivel Davila',
                'correo_personal' => NULL,
                'correo_institucional' => 't1053200921@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'G21E4',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 01 de Junio de 2024
                'nombres' => 'Jakori Nayeli',
                'apellidos' => 'Hoyos Terrones',
                'correo_personal' => NULL,
                'correo_institucional' => 'jnhoyoste@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J14H21',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 01 de Junio de 2024
                'nombres' => 'Jordyna Del Carmen',
                'apellidos' => 'Robles Solorzano',
                'correo_personal' => NULL,
                'correo_institucional' => 't1024100421@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J4C19S',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Juan José',
                'apellidos' => 'Chávez Tenorio',
                'correo_personal' => NULL,
                'correo_institucional' => 'jchavezt@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J10C21',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el 13 De Junio 2023
                //Egresó el 17 de marzo de 2025
                'nombres' => 'Lesly Fiorella',
                'apellidos' => 'Perez Rodriguez',
                'correo_personal' => 'perezrodriguezlesly791@gmail.com',
                'correo_institucional' => 't028100120@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L6P19',
                'imagen_firma' => 'fotos_firmas/Lesly Fiorella Perez Rodriguez.png',
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Lorena Midalís',
                'apellidos' => 'Primo Bueno',
                'correo_personal' => NULL,
                'correo_institucional' => 'lmprimob@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L13P2',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 10 de Diciembre de 2024
                'nombres' => 'Luis Angel',
                'apellidos' => 'Lecca Cortez',
                'correo_personal' => NULL,
                'correo_institucional' => 'lleccac@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L1L3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a MKT el 01 de Junio de 2024
                //Se retiró de MKT el 16 de Agosto de 2025
                'nombres' => 'Maite',
                'apellidos' => 'Palacios Asto',
                'correo_personal' => NULL,
                'correo_institucional' => 'mpalaciosas@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M17A',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Malena Shecid',
                'apellidos' => 'Huamán Arana',
                'correo_personal' => NULL,
                'correo_institucional' => 'mshuaman@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M20H1',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 13 de Junio de 2023
                'nombres' => 'Maria Fernanda',
                'apellidos' => 'Cárdenas Hidalgo',
                'correo_personal' => NULL,
                'correo_institucional' => 'mcardenash@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M6C8',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Melissa del Rosario',
                'apellidos' => 'Muñoz Uriarte',
                'correo_personal' => NULL,
                'correo_institucional' => 'mdmunozu@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M4R13U',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 02 de Mayo de 2025
                'nombres' => 'Milene Xiomara',
                'apellidos' => 'Delgado Silva',
                'correo_personal' => NULL,
                'correo_institucional' => 'mxdelgados@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M25D20',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 13 de Junio de 2023
                'nombres' => 'Stefany Isabel',
                'apellidos' => 'Gutierrez Vega',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510101221@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S9G23',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a MKT el 01 de Junio de 2024
                'nombres' => 'Yojhania Taitt',
                'apellidos' => 'Gonzales Contreras',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510102521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y21G3',
                'imagen_firma' => NULL,
            ],
            //Aqui ingresó ZULEMA ADELI VALVERDE ZAVALETA <t1510100321@unitru.edu.pe>
            //MIEMBRO ACTIVO 2025-I
            //- Directora de MKT-2024

            /*******************************************
             *************** ÁREA DE PMO ***************
             ******************************************* */
            //Total de miembros activos en PMO - 14

            //CONVOCATORIA 2021(20-11-2021)
            /**
                Ivanna Sofia Vela Ocampo
                    //Aqui ingresó IVANNA SOFIA VELA OCAMPO <t510100520@unitru.edu.pe>
                    //Ingresó a PMO el 20 de Noviembre de 2021
                    //- Directora de PMO-2024
            **/

            //CONVOCATORIA 2023(13-06-2023)
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 13 de Junio de 2023
                'nombres' => 'Aaron Kaleb',
                'apellidos' => 'Arteaga Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1452700121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A11A19',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el 13 de Junio de 2023
                //Egresó el 17 de marzo de 2025
                'nombres' => 'David Caleb',
                'apellidos' => 'Céspedes Esquivel',
                'correo_personal' => 'dacacees@gmail.com',
                'correo_institucional' => 't511301120@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D3C5',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el 13 de Junio de 2023
                //Egresó el 17 de marzo de 2025
                'nombres' => 'Giancarlo José',
                'apellidos' => 'Benavides Rodríguez',
                'correo_personal' => 'gian07benarodri@gmail.com',
                'correo_institucional' => 't450100220@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'G10B19',
                'imagen_firma' => "fotos_firmas/Giancarlo Jose Benavides Rodriguez.png",
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 13 de Junio de 2023
                'nombres' => 'Jeoselyn Maribel',
                'apellidos' => 'Espejo Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jespejor@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J13E19',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 13 de Junio de 2023
                'nombres' => 'Maria Celine',
                'apellidos' => 'Huaman Martinez',
                'correo_personal' => 'celineehm51@gmail.com',
                'correo_institucional' => 'mhuamanm@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M3H13',
                'imagen_firma' => "fotos_firmas/María Celine Huamán Martínez.jpg",//Representante de Centro de Estudiantes de Ingeniería Metalúrgica
            ],
            /**
                María Fernanda de la Caridad Herrera Cerquín
                    //Aqui ingresó María Fernanda de la Caridad Herrera Cerquín <mfherrerace@unitru.edu.pe>
                    //Ingresó a PMO el 13 de Junio de 2023
                    //- Directora de PMO-2025
            **/
            [
                //Ingresó a PMO el 13 de Junio de 2023
                //Egresó el 17 de marzo de 2025
                'nombres' => 'Renato Martin',
                'apellidos' => 'Nuñez Ortiz',
                'correo_personal' => 'Nunezortizrenato@gmail.com',
                'correo_institucional' => 'rnunezo@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R13N16',
                'imagen_firma' => "fotos_firmas/Renato Martin Nunez Ortiz.png",
            ],

            //CONVOCATORIA 2024(01-06-2024)
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 01 de Junio de 2024
                'nombres' => 'Abel Maximiliano',
                'apellidos' => 'Pereda Cabanillas',
                'correo_personal' => NULL,
                'correo_institucional' => 'amperedaca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A13P3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a PMO el 01 de Junio de 2024
                //Se retiró voluntariamente el 07 de marzo de 2025
                'nombres' => 'Alexandra Brighit',
                'apellidos' => 'Velarde Escobar',
                'correo_personal' => NULL,
                'correo_institucional' => 'avelarde@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A2V5',
                'imagen_firma' => "fotos_firmas/Alexandra Brighit Valverde Escobar.png",
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 01 de Junio de 2024
                'nombres' => 'Angela Xiomara',
                'apellidos' => 'Loayza Gutierrez',
                'correo_personal' => NULL,
                'correo_institucional' => 'axloayzag@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A25L7',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 01 de Junio de 2024
                'nombres' => 'Dalery Nicoll',
                'apellidos' => 'Alayo Sifuentes',
                'correo_personal' => NULL,
                'correo_institucional' => 'dnalayosi@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D14AS',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 10 de Diciembre de 2024
                'nombres' => 'Daniel Angel',
                'apellidos' => 'Sanchez Cabrera',
                'correo_personal' => NULL,
                'correo_institucional' => 'dasanchezca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D1S3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 01 de Junio de 2024
                'nombres' => 'Diego Alejandro',
                'apellidos' => 'Mostacero Lecca',
                'correo_personal' => NULL,
                'correo_institucional' => 't1020100121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D1M12',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 01 de Junio de 2024
                'nombres' => 'Diego Alonso',
                'apellidos' => 'Gutierrez Vasquez',
                'correo_personal' => NULL,
                'correo_institucional' => 'dgutierrezva@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D1G23',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 01 de Junio de 2024
                'nombres' => 'Ruben Dario',
                'apellidos' => 'Alcantara Toribio',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051300821@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R4A21',
                'imagen_firma' => NULL,
            ],
            //CONVOCATORIA 2025(02-05-2025)
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 02 de Mayo de 2025 
                'nombres' => 'Ariana',
                'apellidos' => 'Morales Ipanaqué',
                'correo_personal' => NULL,
                'correo_institucional' => 'amoralesi@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A13I',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 02 de Mayo de 2025 
                'nombres' => 'Rodrigo Alexander',
                'apellidos' => 'Quispe Cortijo',
                'correo_personal' => 'rodrigocortijo122333@gmail.com', //Duda
                'correo_institucional' => 'raquispeco@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R1Q3',
                'imagen_firma' => NULL,
            ],
            [
                //MIEMBRO ACTIVO 2025-I
                //Ingresó a PMO el 02 de Mayo de 2025 
                'nombres' => 'Sebastian Javier',
                'apellidos' => 'Vásquez Estrada',
                'correo_personal' => 'sebastianvasquezestrada2007@gmail.com',
                'correo_institucional' => 'sjvasqueze@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S10V5',
                'imagen_firma' => NULL,
            ],

            /******************************************
             *************** ÁREA DE TI ***************
             ****************************************** */
            //Total de miembros activos en TI - 10

            //Creación del área de TI (17-03-2023)
            [
                //Se cambió a TI el 17 de Marzo de 2023
                //Se retiró voluntariamente el 07 de Marzo de 2025
                'nombres' => 'Anahy Estrella',
                'apellidos' => 'Cruz Ulloa',
                'correo_personal' => NULL,
                'correo_institucional' => 't053300720@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A5C22',
                'imagen_firma' => 'fotos_firmas/Anahy Estrella Cruz Ulloa.png',
            ],
            [
                //Ingresó a MKT el 20 de Noviembre de 2021
                //Se cambió a TI el 17 de Marzo de 2023
                //Egresó en TI el 17 de marzo de 2025
                'nombres' => 'Rommel Eduardo',
                'apellidos' => 'Ulco Chavarria',
                'correo_personal' => 'ulkrmmlo@gmail.com',
                'correo_institucional' => 'rulco@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R5U3',
                'imagen_firma' => 'fotos_firmas/Rommel Eduardo Ulco Chavarria.jpg',
            ],
            [
                //Ingresó a LTK&FNZ el 20 de Noviembre de 2021
                //Se cambió a PMO el 10 de Mayo de 2022(Referencia Fecha de convo), fué +- 2 meses.
                //Ingresó a TI el 17 de Marzo de 2023(Fecha que ya no va: 25 de Abril de 2023)
                //Se retiró de TI el 08 de Junio de 2024
                'nombres' => 'Jorge Luis',
                'apellidos' => 'Vargas Baltodano',
                'correo_personal' => 'jorge.baltodano.21.10@gmail.com',
                'correo_institucional' => 't012700120@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J12V23',
                'imagen_firma' => 'fotos_firmas/Jorge Luis Vargas Baltodano.jpg',
            ],
            //CONVOCATORIA 2024(10-12-2024)
            [
                //Ingresó a TI el 10 de Diciembre de 2024
                'nombres' => 'Luis Angel',
                'apellidos' => 'Morales Lino',
                'correo_personal' => 'luno2402@gmail.com',
                'correo_institucional' => 't012700620@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L1M12',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 10 de Diciembre de 2024
                'nombres' => 'Marco Camilo',
                'apellidos' => 'Toledo Campos',
                'correo_personal' => 'martold.1210@gmail.com',
                'correo_institucional' => 't022700720@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M3T3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 10 de Diciembre de 2024
                'nombres' => 'Mirella Esteffany',
                'apellidos' => 'Gamboa Valderrama',
                'correo_personal' => NULL,
                'correo_institucional' => 'mgamboav@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M5G23',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 10 de Diciembre de 2024
                'nombres' => 'Paúl Jamir',
                'apellidos' => 'Lazaro Solano',
                'correo_personal' => 'paulazarsol00@gmail.com',
                'correo_institucional' => 't052700520@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P10L20',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 10 de Diciembre de 2024
                'nombres' => 'Sadhu',
                'apellidos' => 'Rojas García',
                'correo_personal' => 'sadhurojasgarcia@gmail.com',
                'correo_institucional' => 't012701020@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S19G',
                'imagen_firma' => NULL,
            ],

            //CONVOCATORIA 2025(02-05-2025)
            [
                //Ingresó a TI el 02 de Mayo de 2025
                'nombres' => 'Elder Eli',
                'apellidos' => 'De la Cruz Calderón',
                'correo_personal' => 'pereedc.3002@gmail.com',
                'correo_institucional' => 'edelacruzca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E5D12C3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 02 de Mayo de 2025
                'nombres' => 'Jhoanny Jheimilyn Xiomara',
                'apellidos' => 'Vargas Ramos',
                'correo_personal' => 'vargasramosjhoanny@gmail.com',
                'correo_institucional' => 'jjvargasr@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J10X23R',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 02 de Mayo de 2025
                'nombres' => 'Pablo César',
                'apellidos' => 'Sánchez Cabrera',
                'correo_personal' => NULL,
                'correo_institucional' => 'psanchezca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P3S3',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 02 de Mayo de 2025
                'nombres' => 'Renato Alexander',
                'apellidos' => 'Martinez Aguilar',
                'correo_personal' => NULL,
                'correo_institucional' => 'ramartinezag@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R1M1',
                'imagen_firma' => NULL,
            ],
            [
                //Ingresó a TI el 02 de Mayo de 2025
                //Se retiró de TI el 22 de Agosto de 2025
                'nombres' => 'Zaleth Valentina',
                'apellidos' => 'Rivas Calderón',
                'correo_personal' => NULL,
                'correo_institucional' => 'zvrivasca@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Z23R3',
                'imagen_firma' => NULL,
            ],

            /********************************************
             *********** ENDIDADES ALIADAS *************
             ******************************************* */
            //ENTIDADES ALIADAS : Voluntariado UNT
            [
                //Representante
                'nombres' => 'Irving Luis',
                'apellidos' => 'Herrera Llovera',
                'correo_personal' => NULL,
                'correo_institucional' => 'ilherrerall@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'I12H12',
                'imagen_firma' => 'fotos_firmas/Irving Luis Herrera Llovera.jpg',
            ],
            [
                'nombres' => 'Mauricio Jesús',
                'apellidos' => 'Meléndez Sánchez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1061900121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M10M20',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Jesús Manuel',
                'apellidos' => 'Andrade Loyola',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510601721@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J13A12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Paola Fernanda',
                'apellidos' => 'Desposorio Sanchez',
                'correo_personal' => NULL,
                'correo_institucional' => 'pdesposorio@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'P6D20',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Katya Gabriela',
                'apellidos' => 'Florian Rogel',
                'correo_personal' => NULL,
                'correo_institucional' => 'kflorian@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'K7F19',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Diego Arturo',
                'apellidos' => 'Ruiz Villanueva',
                'correo_personal' => NULL,
                'correo_institucional' => 'daruizvi@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D1R23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Milenka Jasmin Lucero',
                'apellidos' => 'Villanueva Arrambide',
                'correo_personal' => NULL,
                'correo_institucional' => 'mjvillanuevaa@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M10L23A',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Alberto Raul',
                'apellidos' => 'Velasquez Miñano',
                'correo_personal' => NULL,
                'correo_institucional' => 't053500820@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A19V13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Nardia Beatriz',
                'apellidos' => 'Valladoli Vega',
                'correo_personal' => NULL,
                'correo_institucional' => 'nbvalladolive@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N2V23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Liz Valeria',
                'apellidos' => 'Chaiguaque Vera',
                'correo_personal' => NULL,
                'correo_institucional' => 'lchaiguaque@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L23C23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Jimena Nayeli',
                'apellidos' => 'Tello Nieves',
                'correo_personal' => NULL,
                'correo_institucional' => 'jtellon@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J14T14',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cristhian Ernesto',
                'apellidos' => 'Vega Orbegoso',
                'correo_personal' => NULL,
                'correo_institucional' => 'cvegao@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C5V16',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Anayhely Dayana',
                'apellidos' => 'Medina Vasquez',
                'correo_personal' => NULL,
                'correo_institucional' => 'admedinav@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A4M23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Susy Solange',
                'apellidos' => 'Guanilo Gil',
                'correo_personal' => NULL,
                'correo_institucional' => 'ssguanilog@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A4M23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Junior Jesus',
                'apellidos' => 'Lopez Lopez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051401721@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J10L12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Mayra Danitza',
                'apellidos' => 'Eustaquio Ruiz',
                'correo_personal' => NULL,
                'correo_institucional' => 'mdeustaquioru@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M4E19',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'William Eduardo',
                'apellidos' => 'Cueva Gomez',
                'correo_personal' => NULL,
                'correo_institucional' => 'wecuevag@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'W5C7',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Damaris Alexandra',
                'apellidos' => 'Arce Alave',
                'correo_personal' => NULL,
                'correo_institucional' => 't1050602621@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D1A1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Jumer Erick',
                'apellidos' => 'Martel Ugalde',
                'correo_personal' => NULL,
                'correo_institucional' => 'jemartelu@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J5M22',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Doris Ysabel',
                'apellidos' => 'Muñoz Leyva',
                'correo_personal' => NULL,
                'correo_institucional' => 'dymunozl@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D26M12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'David Calet',
                'apellidos' => 'Aguilar Chávez',
                'correo_personal' => NULL,
                'correo_institucional' => 'daguilarc@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D3A3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Sandra Ysabel',
                'apellidos' => 'Sachun Quispe',
                'correo_personal' => NULL,
                'correo_institucional' => 'sysachunqu@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S26S18',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Carlos Emiliano',
                'apellidos' => 'Livias Otiniano',
                'correo_personal' => NULL,
                'correo_institucional' => 'celiviasot@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C5L16',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Jorge Darío',
                'apellidos' => 'Salas Martínez',
                'correo_personal' => NULL,
                'correo_institucional' => 'jdsalasma@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J4S13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Leonardo Matthews',
                'apellidos' => 'Rojas Davalos',
                'correo_personal' => NULL,
                'correo_institucional' => 't1511900821@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L13R4',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Luceli Ani',
                'apellidos' => 'Reyes Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 'lreyesro@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L1R19',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Lesly Yamileth',
                'apellidos' => 'Tantalean Arteaga',
                'correo_personal' => NULL,
                'correo_institucional' => 'ltantaleana@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L26T1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Christopher Jesus Enrique',
                'apellidos' => 'Cardenas Contreras',
                'correo_personal' => NULL,
                'correo_institucional' => 't1050702921@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C10E3C',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Damaris Lucero',
                'apellidos' => 'Celis Castro',
                'correo_personal' => NULL,
                'correo_institucional' => 'dcelis@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D12C3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Adabella Yerena',
                'apellidos' => 'Romero Portilla',
                'correo_personal' => NULL,
                'correo_institucional' => 'ayromeropo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A26R17',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Nicolas Dante',
                'apellidos' => 'Mendez Lozano',
                'correo_personal' => NULL,
                'correo_institucional' => 'ndmendezl@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'N4M12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Eros Althair',
                'apellidos' => 'Crisologo Zavaleta',
                'correo_personal' => NULL,
                'correo_institucional' => 'ecrisologoz@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E1C27',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Neyser Yampier',
                'apellidos' => 'Cumpa Inoñan',
                'correo_personal' => NULL,
                'correo_institucional' => 'ncumpa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'N26C9',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Clarita Mariliz',
                'apellidos' => 'Salazar Corcuera',
                'correo_personal' => NULL,
                'correo_institucional' => 'cmsalazarc@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C13S3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Anderson Joel',
                'apellidos' => 'Orbegoso Olivares',
                'correo_personal' => NULL,
                'correo_institucional' => 't1511301421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A10O16',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Nidia Helen',
                'apellidos' => 'Neyra Perez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1050601821@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N8N17',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Marcia Fernanda',
                'apellidos' => 'Flores Llamoga',
                'correo_personal' => NULL,
                'correo_institucional' => 'mfloresll@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M6F12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Luis Fernando',
                'apellidos' => 'Cabrera Huaman',
                'correo_personal' => NULL,
                'correo_institucional' => 'lcabrerah@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L6C8',
                'imagen_firma' => NULL,
            ],

            //ENTIDADES ALIADAS: CENTRO ESTUDIANTILES
            //CENTRO ESTUDIANTIL 1: CESADM(Centro de Estudiantes de Administración)
            [
                //Representante
                'nombres' => 'Jheferson Jhoel',
                'apellidos' => 'Cubas Fuentes',
                'correo_personal' => NULL,
                'correo_institucional' => 't010100220@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J10C6',
                'imagen_firma' => "fotos_firmas/Jheferson Jhoel Cubas Fuentes.jpg",
            ],
            [
                'nombres' => 'María Eugenia',
                'apellidos' => 'Del Río Becerra',
                'correo_personal' => NULL,
                'correo_institucional' => 't1020101721@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M5D19B',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Valery Yanina',
                'apellidos' => 'Cedron Arroyo',
                'correo_personal' => NULL,
                'correo_institucional' => 'vycedronar@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'V26C1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Marilia Lizbeth',
                'apellidos' => 'Juarez Lopez',
                'correo_personal' => NULL,
                'correo_institucional' => 'mljuarezlo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M12J12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Ana Cecilia',
                'apellidos' => 'Rios García',
                'correo_personal' => NULL,
                'correo_institucional' => 'acriosga@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A3R7',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Lesly Judith',
                'apellidos' => 'Mejia Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1020100721@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L10M19',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 2: CEAU(Centro de Estudiantes de Arquitectura y Urbanismo)
            [
                //Representante
                'nombres' => 'Víctor José',
                'apellidos' => 'Pajares Abanto',
                'correo_personal' => NULL,
                'correo_institucional' => 't514100120@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'V10P1',
                'imagen_firma' => "fotos_firmas/Víctor José Pajares Abanto.jpg",
            ],
            [
                'nombres' => 'Bryan Jhoel',
                'apellidos' => 'Tomás Custodio',
                'correo_personal' => NULL,
                'correo_institucional' => 'bjtomasc@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'B10T3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Carlos',
                'apellidos' => 'Bardales Orduña',
                'correo_personal' => NULL,
                'correo_institucional' => 'cbardales@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'B10T3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Daniel Eduardo',
                'apellidos' => 'Alvarez Abanto',
                'correo_personal' => NULL,
                'correo_institucional' => 'ealvarez@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D5A1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Karol Lisbeth',
                'apellidos' => 'Vera Sánchez',
                'correo_personal' => NULL,
                'correo_institucional' => 't524100120@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'K12V20',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 3: CEMYP(Centro de Estudiantes de Microbiología y Parasitología)
            [
                //Representante
                'nombres' => 'Gustavo Alberto',
                'apellidos' => 'Reyes Alfaro',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051901721@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'G1R1',
                'imagen_firma' => "fotos_firmas/Gustavo Alberto Reyes Alfaro.jpg",
            ],
            [
                'nombres' => 'Magnibeth Yesenia',
                'apellidos' => 'Rabanal Chiroque',
                'correo_personal' => NULL,
                'correo_institucional' => 'mrabanalc@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M26R3',
                'imagen_firma' => NULL,
            ],
            //Aqui va MAURICIO JESUS MELENDEZ SANCHEZ <t1061900121@unitru.edu.pe>
                //- MIEMBRO VOLUNTARIADO UNT


            //CENTRO ESTUDIANTIL 4: CEIAM(Centro de estudiantes de Ingeniería Ambiental)

                //Aqui va ABEL MAXIMILIANO PEREDA CABANILLAS <amperedaca@unitru.edu.pe>
                    //- MIEMBRO ACTIVO DE PMO 2025-I
                    //Ingresó a PMO el 01 de Junio de 2024
                
                //Aqui va NASHALY NICOLLE ALAMA TERRONES <nalama@unitru.edu.pe>
                    //Representante de CEIAM
                    //- MIEMBRO ACTIVO DE GTH 2025-I
                    //Ingresó a GTH el 01 De Junio 2024
            [
                'nombres' => 'Trasy Yadhira',
                'apellidos' => 'Solis Medina',
                'correo_personal' => NULL,
                'correo_institucional' => 'tysolisme@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'T26S13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Rosa Naghely',
                'apellidos' => 'Alipio Gonzales',
                'correo_personal' => NULL,
                'correo_institucional' => 'ralipio@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A14A7',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cristian Alejandro',
                'apellidos' => 'De La Cruz Herrera',
                'correo_personal' => NULL,
                'correo_institucional' => 'cdelacruzh@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C1D12C8',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Flavia Angelica',
                'apellidos' => 'Villegas Villar',
                'correo_personal' => NULL,
                'correo_institucional' => 'favillegasvi@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F1V23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Valeria Alejandra',
                'apellidos' => 'Ramos Hernandez',
                'correo_personal' => NULL,
                'correo_institucional' => 'varamoshe@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'V1R8',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 5: CEICI(Centro de Estudiantes de Ingeniería Civil)
            [
                //Representante
                'nombres' => 'Leonardo Eugenio',
                'apellidos' => 'Díaz Gutierrez',
                'correo_personal' => NULL,
                'correo_institucional' => 't054001220@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L5D7',
                'imagen_firma' => "fotos_firmas/Leonardo Eugenio Díaz Gutierrez.jpg",
            ],
            [
                'nombres' => 'Yorvan',
                'apellidos' => 'Bustamante Giron',
                'correo_personal' => NULL,
                'correo_institucional' => 't514000120@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'Y2B7',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Carlos Eduardo',
                'apellidos' => 'Terán Revilla',
                'correo_personal' => NULL,
                'correo_institucional' => 'ceteranre@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C5T19',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 6: CEIMAT(Centro de Estudiantes de Ingeniería de Materiales)
            [
                'nombres' => 'Evelyn',
                'apellidos' => 'Mollo Villanueva',
                'correo_personal' => NULL,
                'correo_institucional' => 't053500420@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E13V',
                'imagen_firma' => NULL,
            ],
            [
                //Representante
                'nombres' => 'Erika Ciklary',
                'apellidos' => 'De La Cruz Barrueto',
                'correo_personal' => NULL,
                'correo_institucional' => 't1053500721@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E3D12C2',
                'imagen_firma' => "fotos_firmas/Erika Ciklary De La Cruz Barrueto.jpg",
            ],
            [
                'nombres' => 'Bryam',
                'apellidos' => 'Montañez Correa',
                'correo_personal' => NULL,
                'correo_institucional' => 't513500620@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'B13C',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Emerson Josue',
                'apellidos' => 'Ruiz Polo',
                'correo_personal' => NULL,
                'correo_institucional' => 'ejruizp@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E10R17',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 7: (Centro de Estudiantes de Fisica)/(Física de la UNT)
            [
                //Representante
                'nombres' => 'Jose Franco',
                'apellidos' => 'Rengifo Cabrera',
                'correo_personal' => NULL,
                'correo_institucional' => 'jfrengifoca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J6R3',
                'imagen_firma' => "fotos_firmas/Jose Franco Rengifo Cabrera.jpg",
            ],
            [
                'nombres' => 'Emanuel',
                'apellidos' => 'Santa Cruz Casiano',
                'correo_personal' => NULL,
                'correo_institucional' => 't1511200221@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E20C3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Andrew Carlos',
                'apellidos' => 'Abal Mendoza',
                'correo_personal' => NULL,
                'correo_institucional' => 'aabal@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A3A13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Pedro Alberto',
                'apellidos' => 'Abanto Muñoz',
                'correo_personal' => NULL,
                'correo_institucional' => 'peabanto@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P1A13',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 8: Centro de Estudiantes de Ingeniería Industrial
            [
                'nombres' => 'Samuel Esteban',
                'apellidos' => 'Yovera Cueva',
                'correo_personal' => NULL,
                'correo_institucional' => 't1521300121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S5Y3',
                'imagen_firma' => NULL,
            ],
            [
                //Representante
                'nombres' => 'José Manuel',
                'apellidos' => 'Marin Espinoza',
                'correo_personal' => NULL,
                'correo_institucional' => 't1051300921@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J13M5',
                'imagen_firma' => "fotos_firmas/José Manuel Marin Espinoza.jpg",
            ],
            [
                'nombres' => 'Juan Pablo',
                'apellidos' => 'Miranda Varas',
                'correo_personal' => NULL,
                'correo_institucional' => 'jpmirandava@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J17M23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Moisés David',
                'apellidos' => 'Huamán Torres',
                'correo_personal' => NULL,
                'correo_institucional' => 't011300620@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M4H21',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Christy Marisol',
                'apellidos' => 'Zeferino Zavaleta',
                'correo_personal' => NULL,
                'correo_institucional' => 'cmzeferinoza@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C13Z27',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cristhian Daniel',
                'apellidos' => 'Liza Marroquin',
                'correo_personal' => NULL,
                'correo_institucional' => 't021300520@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C4L13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Sofia Georgette',
                'apellidos' => 'Amaya Caceda',
                'correo_personal' => NULL,
                'correo_institucional' => 't1011300821@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S7A3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Mauricio Sebastian',
                'apellidos' => 'Rosas Alvarez',
                'correo_personal' => NULL,
                'correo_institucional' => 'msrosasa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M20R1',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 9: CEM(Centro de Estudiantes de Medicina)
            [
                'nombres' => 'Luis Fernando',
                'apellidos' => 'Romero Nolasco',
                'correo_personal' => NULL,
                'correo_institucional' => 't1021801421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L6R14',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Miguel Angel',
                'apellidos' => 'Zavaleta Ríos',
                'correo_personal' => NULL,
                'correo_institucional' => 't1053702220@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M1Z19',
                'imagen_firma' => NULL,
            ],
            [
                //Representante
                'nombres' => 'Victor Eduardo',
                'apellidos' => 'Vera Delgado',
                'correo_personal' => NULL,
                'correo_institucional' => 'vverad@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'V5V4',
                'imagen_firma' => "fotos_firmas/Victor Eduardo Vera Delgado.jpg",
            ],
            //CENTRO ESTUDIANTIL 10: Centro de Estudiantes de Trabajo Social
            [
                //Representante
                'nombres' => 'Yadira Estefani',
                'apellidos' => 'Floreano Caballero',
                'correo_personal' => NULL,
                'correo_institucional' => 't1052500221@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y5F3',
                'imagen_firma' => "fotos_firmas/Yadira Estefani Floreano Caballero.jpg",
            ],
            [
                'nombres' => 'Alexia Nirvana',
                'apellidos' => 'Espinola Mendez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1012500321@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A14E13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Mileny Arely',
                'apellidos' => 'Lázaro Salvador',
                'correo_personal' => NULL,
                'correo_institucional' => 'malazarosa@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M1L20',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cristina Alexandra',
                'apellidos' => 'Narvaez Ortiz',
                'correo_personal' => NULL,
                'correo_institucional' => 'cnarvaezo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C1N16',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Deysi Esther',
                'apellidos' => 'Bobadilla Valderrama',
                'correo_personal' => NULL,
                'correo_institucional' => 't1052500121@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D5B23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Carlita Blezy',
                'apellidos' => 'Maiquen Crisanto',
                'correo_personal' => NULL,
                'correo_institucional' => 'cmaiquen@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C2M3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Ana Cecilia',
                'apellidos' => 'Ruiz Dias',
                'correo_personal' => NULL,
                'correo_institucional' => 'aruizd@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A3R4',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Sandra Patricia',
                'apellidos' => 'Valderrama Mercedes',
                'correo_personal' => NULL,
                'correo_institucional' => 'spvalderramam@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S17V13',
                'imagen_firma' => NULL,
            ],

            //CENTRO ESTUDIANTIL 11: Centro de Estudiantes de Ingeniería Metalúrgica

                //Aqui va MARIA CELINE HUAMAN MARTINEZ <mhuamanm@unitru.edu.pe>
                    //Representante de Centro de Estudiantes de Ingeniería Metalúrgica
                    //MIEMBRO ACTIVO 2025-I
                    //Ingresó a PMO el 13 de Junio de 2023
            [
                'nombres' => 'Oliver Frank',
                'apellidos' => 'Tirado Alfaro',
                'correo_personal' => NULL,
                'correo_institucional' => 'otirado@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'O6T1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Elva Briguith',
                'apellidos' => 'Caballero Zamalloa',
                'correo_personal' => NULL,
                'correo_institucional' => 'ecaballeroz@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E2C27',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cristhian Andres',
                'apellidos' => 'García Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 'cgarciaro@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C1G19',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 12: CETUR(Centro de Estudiantes de Turismo)
            [
                //Representante
                'nombres' => 'Sebastián Gabriel',
                'apellidos' => 'Narváez Velásquez',
                'correo_personal' => NULL,
                'correo_institucional' => 'sgnarvaezv@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S7N23',
                'imagen_firma' => "fotos_firmas/Sebastián Gabriel Narváez Velásquez.jpg",
            ],
            //CENTRO ESTUDIANTIL 13: CEIQ(Centro de Estudiantes de Ingeniería Química)
            [
                'nombres' => 'José Benjamin',
                'apellidos' => 'Tamariz Mimbela',
                'correo_personal' => NULL,
                'correo_institucional' => 'jbtamarizmi@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J2T13',
                'imagen_firma' => NULL,
            ],
            //Aqui va JORGE DARIO SALAS MARTINEZ <jdsalasma@unitru.edu.pe>
                //- MIEMBRO VOLUNTARIADO UNT
            [
                'nombres' => 'Adamaris Gibely',
                'apellidos' => 'Blas Calderonz',
                'correo_personal' => NULL,
                'correo_institucional' => 'agblasca@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A7B3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Ibeth Akenmy',
                'apellidos' => 'Loje Polo',
                'correo_personal' => NULL,
                'correo_institucional' => 'iloje@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'I1L17',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Keiko Marianella',
                'apellidos' => 'Infante Palacios',
                'correo_personal' => NULL,
                'correo_institucional' => 'kinfante@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'K13I17',
                'imagen_firma' => NULL,
            ],
            [
                //Representante
                'nombres' => 'Andrea Ines',
                'apellidos' => 'Jimenez Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 'ajimenezr@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A9J19',
                'imagen_firma' => "fotos_firmas/Andrea Ines Jimenez Rodriguez.jpg",
            ],
            [
                'nombres' => 'Erick Humberto',
                'apellidos' => 'Yovera Hernández',
                'correo_personal' => NULL,
                'correo_institucional' => 'ehyoverah@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E8Y8',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 14: Centro de Estudiantes de Ingeniería Mecatrónica
            [
                //Representante
                'nombres' => 'Sergio Anderson',
                'apellidos' => 'Gil Gonzalez',
                'correo_personal' => NULL,
                'correo_institucional' => 't023600420@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S1G7',
                'imagen_firma' => "fotos_firmas/Sergio Anderson Gil Gonzalez.jpg",
            ],
            [
                'nombres' => 'Fernando Miguel',
                'apellidos' => 'Aurazo Alvarado',
                'correo_personal' => NULL,
                'correo_institucional' => 't533600520@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'F13A1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Karl Alejandro',
                'apellidos' => 'Espinoza León',
                'correo_personal' => NULL,
                'correo_institucional' => 't513600520@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'K1E12',
                'imagen_firma' => NULL,
            ],
            //CENTRO ESTUDIANTIL 15: Centro de Estudiantes de Estomatología
            [
                //Representante
                'nombres' => 'Jose Edwin',
                'apellidos' => 'Cruz Gallo',
                'correo_personal' => NULL,
                'correo_institucional' => 'jecruzg@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J5C7',
                'imagen_firma' => "fotos_firmas/Jose Edwin Cruz Gallo.jpg",
            ],
            [
                'nombres' => 'Daniela Dariana',
                'apellidos' => 'Avila Padilla',
                'correo_personal' => NULL,
                'correo_institucional' => 'davilap@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'D4A17',
                'imagen_firma' => NULL,
            ],

            //ENTIDADES ALIADAS: CENTRO FEDERADOS
            //CENTRO FEDERADO 1: Centro Federado De Ciencia Política
            [
                // Representante
                'nombres' => 'Melany Jasmin',
                'apellidos' => 'Cabrera García',
                'correo_personal' => NULL,
                'correo_institucional' => 't1513900521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M10C7',
                'imagen_firma' => 'fotos_firmas/Melany Jasmin Cabrera Garcia.jpg',
            ],
            [
                // Miembro
                'nombres' => 'Néstor Abelardo',
                'apellidos' => 'Gutiérrez León',
                'correo_personal' => NULL,
                'correo_institucional' => 'nagutierrezl@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'N1G12',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Juan José',
                'apellidos' => 'Vasquez Mendoza',
                'correo_personal' => NULL,
                'correo_institucional' => 't1053901321@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J10V13',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Carlos Yemeri Aron',
                'apellidos' => 'Herrera Alayo',
                'correo_personal' => NULL,
                'correo_institucional' => 'cherreraa@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C26A8A',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Luciano Alberto',
                'apellidos' => 'Chuquihuara Tirado',
                'correo_personal' => NULL,
                'correo_institucional' => 't1023900521@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L1C21',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Cesia Yomira',
                'apellidos' => 'Torres León',
                'correo_personal' => NULL,
                'correo_institucional' => 'ctorresl@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C26T12',
                'imagen_firma' => NULL,
            ], 
            [
                // Miembro
                'nombres' => 'Leticia Mariana',
                'apellidos' => 'Miranda Pérez',
                'correo_personal' => NULL,
                'correo_institucional' => 'lmirandap@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L13M17',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Jorge Jonatan',
                'apellidos' => 'Campos Rodriguez',
                'correo_personal' => NULL,
                'correo_institucional' => 't1053900221@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J10C19',
                'imagen_firma' => NULL,
            ],
            //CENTRO FEDERADO 2: Centro Federado De Economía
            [
                // Miembro
                'nombres' => 'Bruno Jeanpier',
                'apellidos' => 'Garay Rojas',
                'correo_personal' => NULL,
                'correo_institucional' => 'bgarayr@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'B10G19',
                'imagen_firma' => NULL,
            ],
            //Aqui va MARIA FERNANDA PRETELL LEÓN<t1010700721@unitru.edu.pe>
                //- MIEMBRO ACTIVO 2025-I
                //- Ingresó a LTK&FNZ el 01 De Junio 2024
            [
                // Miembro
                'nombres' => 'Roxana Luzbeth',
                'apellidos' => 'Alfaro Vasquez',
                'correo_personal' => NULL,
                'correo_institucional' => 'rlalfarova@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'R12A23',
                'imagen_firma' => NULL,
            ],
            [
                // Representante
                'nombres' => 'Frandux Lee',
                'apellidos' => 'Manayay Cieza',
                'correo_personal' => NULL,
                'correo_institucional' => 't1050702421@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'F12M3',
                'imagen_firma' => 'fotos_firmas/Frandux Lee Manayay Cieza.jpg',
            ],
            [
                // Miembro
                'nombres' => 'Jeiser Maycol',
                'apellidos' => 'Jugo Evangelista',
                'correo_personal' => NULL,
                'correo_institucional' => 'jmjugoev@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J13J5',
                'imagen_firma' => NULL,
            ],
            //CENTRO FEDERADO 3: Centro Federado De Ingeniería Agroindustrial
            [
                // Representante
                'nombres' => 'Fabricio',
                'apellidos' => 'Uceda Garcia',
                'correo_personal' => NULL,
                'correo_institucional' => 'fuceda@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'F22G',
                'imagen_firma' => 'fotos_firmas/Fabricio Uceda Garcia.jpg',
            ],
            [
                // Miembro
                'nombres' => 'Cielo Carolina',
                'apellidos' => 'Vigo Flores',
                'correo_personal' => NULL,
                'correo_institucional' => 'ccvigof@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C3V6',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Nayely',
                'apellidos' => 'Vasquez Villarreal',
                'correo_personal' => NULL,
                'correo_institucional' => 'nvasquezvi@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N23V',
                'imagen_firma' => NULL,
            ],
            //CENTRO FEDERADO 4: Centro Federado De Derecho 
            [
                // Representante
                'nombres' => 'Jeremy Rorievans',
                'apellidos' => 'Valverde Tolentino',
                'correo_personal' => NULL,
                'correo_institucional' => 'jvalverdet@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J19V21',
                'imagen_firma' => 'fotos_firmas/Jeremy Rorievans Valverde Tolentino.jpg',
            ],
            [
                // Miembro
                'nombres' => 'Leydi Diana',
                'apellidos' => 'Cuba Barrantes',
                'correo_personal' => NULL,
                'correo_institucional' => 'ldcubaba@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L4C2',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Flor Andrea',
                'apellidos' => 'Cáceda Rumay',
                'correo_personal' => NULL,
                'correo_institucional' => 'facacedaru@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'F1C18',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Ana Lucia',
                'apellidos' => 'Ulloa Ruiz',
                'correo_personal' => NULL,
                'correo_institucional' => 'alulloar@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A12U18',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Leydi Laurita',
                'apellidos' => 'Miñano Corro',
                'correo_personal' => NULL,
                'correo_institucional' => 'lminanoco@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L12M3',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Geraldo Samir',
                'apellidos' => 'Bravo Lucano',
                'correo_personal' => NULL,
                'correo_institucional' => 'gsbravolu@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'G20B12',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Paolo Mariano',
                'apellidos' => 'Vallejo Fernandez',
                'correo_personal' => NULL,
                'correo_institucional' => 'pmvallejof@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P13V6',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Nataly Mayte',
                'apellidos' => 'Sánchez Gil',
                'correo_personal' => NULL,
                'correo_institucional' => 'nmsanchezg@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N13S7',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Milagros',
                'apellidos' => 'Contreras Valdez',
                'correo_personal' => NULL,
                'correo_institucional' => 'mcontrerasv@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M3V',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Anyelin',
                'apellidos' => 'Casas Junquera',
                'correo_personal' => NULL,
                'correo_institucional' => 'acasasj@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A3J',
                'imagen_firma' => NULL,
            ],
            //CENTRO FEDERADO 5: Centro Federado De Ingeniería Agrícola
            [
                // Representante
                'nombres' => 'Virginia Jhoana',
                'apellidos' => 'Abanto Castillo',
                'correo_personal' => NULL,
                'correo_institucional' => 't042300220@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'V10A3',
                'imagen_firma' => 'fotos_firmas/Virginia Jhoana Abanto Castillo.jpg',
            ],
            [
                // Miembro
                'nombres' => 'Vilma Alexandra',
                'apellidos' => 'Minchola Chavez',
                'correo_personal' => NULL,
                'correo_institucional' => 'vminchola@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'V1M3',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Pedro Willy',
                'apellidos' => 'Vasquez Solis Benavides',
                'correo_personal' => NULL,
                'correo_institucional' => 'pvasquezs@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P24V20B',
                'imagen_firma' => NULL,
            ],
            //CENTRO FEDERADO 6: Centro Federado De Ingeniería Mecánica
            [
                // Representante
                'nombres' => 'Jairo Arturo',
                'apellidos' => 'Olivera Ramos',
                'correo_personal' => NULL,
                'correo_institucional' => 'jaoliverar@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J1O19',
                'imagen_firma' => 'fotos_firmas/Jairo Arturo Olivera Ramos.jpg',
            ],
            [
                // Miembro
                'nombres' => 'Erick Jesus',
                'apellidos' => 'Salvador Lizarraga',
                'correo_personal' => NULL,
                'correo_institucional' => 'ejsalvadorl@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E10S12',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Akihito Bryan',
                'apellidos' => 'Barrueto Ipushima',
                'correo_personal' => NULL,
                'correo_institucional' => 'abbarruetoi@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A2B9',
                'imagen_firma' => NULL,
            ],
            //CENTRO FEDERADO 7: Centro Federado De Enfermería
            [
                // Representante
                'nombres' => 'Anny Nayeli Yireh',
                'apellidos' => 'Sánchez Vásquez',
                'correo_personal' => NULL,
                'correo_institucional' => 'asanchezva@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A14Y20V',
                'imagen_firma' => 'fotos_firmas/Anny Nayeli Yireh Sánchez Vásquez.jpg',
            ],
            [
                // Miembro
                'nombres' => 'Erika Elizabeth',
                'apellidos' => 'Ruiz Vera',
                'correo_personal' => NULL,
                'correo_institucional' => 't1050900621@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E5R23',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Jordy David',
                'apellidos' => 'Rodriguez Rubio',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510900121@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'J4R19',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Norma Elizabeth',
                'apellidos' => 'León Tongombol',
                'correo_personal' => NULL,
                'correo_institucional' => 'neleonto@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N5L21',
                'imagen_firma' => NULL,
            ],
            [
                // Miembro
                'nombres' => 'Nicol Stefanny',
                'apellidos' => 'Ruiz Benites',
                'correo_personal' => NULL,
                'correo_institucional' => 'nsruizbe@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'N20R2',
                'imagen_firma' => NULL,
            ],
        ];

        foreach ($personas as $persona) {
            Persona::create($persona);
        }
    }
}
