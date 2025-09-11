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
                //Ingresó a PMO el 8 de Noviembre de 2020(Es lo más seguro, aunque no aparece en el post de bienvenida)
                'nombres' => 'Micaela Anthoaneth',
                'apellidos' => 'Cardenas Contreras',
                'correo_personal' => 'micantho1105@gmail.com',
                'correo_institucional' => 't534000120@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M1C3',
                'imagen_firma' => 'fotos_firmas/Micaela Anthoaneth Cardenas Contreras.jpg',
            ],
            [
                //VICEPRESIDENTA-2023
                //Ingresó a GTH el 8 de Noviembre de 2020(Es lo más seguro, aunque no aparece en el post de bienvenida)
                'nombres' => 'Alejandra Verenisse',
                'apellidos' => 'Ruiz Rodriguez',
                'correo_personal' => 'aleruizrodriguez.14@gmail.com',
                'correo_institucional' => 't050101120@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A23R19',
                'imagen_firma' => 'fotos_firmas/Alejandra Verenisse Ruiz Rodriguez.jpg',
            ],
            [
                //DIRECTORA DE GTH-2023
                //Ingresó a GTH el 20 de Noviembre 2021
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
                //Ingresó a MKT el D de M de Y
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
                //Ingresó a PMO el D de M de Y
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
                //Ingresó a A el D de M de Y
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
                //Ingresó a MKT el D de M de Y
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
                //Ingresó a PMO el D de M de Y
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
            */
            //ÁREA DE MKT - 15
            [
                'nombres' => 'Adriana Gabriela',
                'apellidos' => 'Castillo Ochoa',
                'correo_personal' => NULL,
                'correo_institucional' => 'acastilloo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A7C16',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Anderson Abat',
                'apellidos' => 'Otiniano Morales',
                'correo_personal' => 'anderson.otiniano.avanz@gmail.com',
                'correo_institucional' => 'aotinianom@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A1O13',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Angelo Salvattore',
                'apellidos' => 'Chavarry Bustamante',
                'correo_personal' => 'angelochavarry03@gmail.com',
                'correo_institucional' => 'aschavarryb@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'A20C2',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Angie Tatiana',
                'apellidos' => 'Recuenco Tapia',
                'correo_personal' => NULL,
                'correo_institucional' => 't1013600421@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'A21R21',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Belinda Maricielo',
                'apellidos' => 'Arroyo Esquivel',
                'correo_personal' => NULL,
                'correo_institucional' => 'barroyo@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'B13A5',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cesar Junior',
                'apellidos' => 'Quito Cruz',
                'correo_personal' => NULL,
                'correo_institucional' => 'cquito@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'C10Q3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Cielo Valentina',
                'apellidos' => 'Abanto Rojas',
                'correo_personal' => NULL,
                'correo_institucional' => 'cvabantor@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'C23A19',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Diego Jesús',
                'apellidos' => 'Ullilén Chávez',
                'correo_personal' => 'diegoullilen250503@gmail.com',
                'correo_institucional' => 'dullilen@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'D10U3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Emelyn Yasmin',
                'apellidos' => 'Aguirre Valverde',
                'correo_personal' => NULL,
                'correo_institucional' => 't1520100421@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'E26A23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Ghenary Tais',
                'apellidos' => 'Esquivel Davila',
                'correo_personal' => NULL,
                'correo_institucional' => 't1053200921@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'G21E4',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Jakori Nayeli',
                'apellidos' => 'Hoyos Terrones',
                'correo_personal' => NULL,
                'correo_institucional' => 'jnhoyoste@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J14H21',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Jordyna Del Carmen',
                'apellidos' => 'Robles Solorzano',
                'correo_personal' => NULL,
                'correo_institucional' => 't1024100421@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J4C19S',
                'imagen_firma' => NULL,
            ],
            [
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
                'nombres' => 'Lorena Midalís',
                'apellidos' => 'Primo Bueno',
                'correo_personal' => NULL,
                'correo_institucional' => 'lmprimob@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'L13P2',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Luis Angel',
                'apellidos' => 'Lecca Cortez',
                'correo_personal' => NULL,
                'correo_institucional' => 'lleccac@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L1L3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Malena Shecid',
                'apellidos' => 'Huamán Arana',
                'correo_personal' => NULL,
                'correo_institucional' => 'mshuaman@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M20H1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Maria Fernanda',
                'apellidos' => 'Cárdenas Hidalgo',
                'correo_personal' => NULL,
                'correo_institucional' => 'mcardenash@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M6C8',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Melissa del Rosario',
                'apellidos' => 'Muñoz Uriarte',
                'correo_personal' => NULL,
                'correo_institucional' => 'mdmunozu@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M4R13U',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Milene Xiomara',
                'apellidos' => 'Delgado Silva',
                'correo_personal' => NULL,
                'correo_institucional' => 'mxdelgados@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M25D20',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Stefany Isabel',
                'apellidos' => 'Gutierrez Vega',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510101221@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'S9G23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Yojhania Taitt',
                'apellidos' => 'Gonzales Contreras',
                'correo_personal' => NULL,
                'correo_institucional' => 't1510102521@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'Y21G3',
                'imagen_firma' => NULL,
            ],
            //Aqui ingresó ZULEMA ADELI VALVERDE ZAVALETA <t1510100321@unitru.edu.pe>
                //- Directora de MKT-2024
            
            /*
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
            ],*/
            
            //ÁREA DE TI - 10
            [
                'nombres' => 'Elder Eli',
                'apellidos' => 'De la Cruz Calderón',
                'correo_personal' => 'pereedc.3002@gmail.com',
                'correo_institucional' => 'edelacruzca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'E5D12C3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Jhoanny Jheimilyn Xiomara',
                'apellidos' => 'Vargas Ramos',
                'correo_personal' => 'vargasramosjhoanny@gmail.com',
                'correo_institucional' => 'jjvargasr@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'J10X23R',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Luis Angel',
                'apellidos' => 'Morales Lino',
                'correo_personal' => 'luno2402@gmail.com',
                'correo_institucional' => 't012700620@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'L1M12',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Marco Camilo',
                'apellidos' => 'Toledo Campos',
                'correo_personal' => 'martold.1210@gmail.com',
                'correo_institucional' => 't022700720@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'M3T3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Mirella Esteffany',
                'apellidos' => 'Gamboa Valderrama',
                'correo_personal' => NULL,
                'correo_institucional' => 'mgamboav@unitru.edu.pe',
                'sexo' => 'Femenino',
                'codigo' => 'M5G23',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Pablo César',
                'apellidos' => 'Sánchez Cabrera',
                'correo_personal' => NULL,
                'correo_institucional' => 'psanchezca@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P3S3',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Paúl Jamir',
                'apellidos' => 'Larazo Solano',
                'correo_personal' => 'paulazarsol00@gmail.com',
                'correo_institucional' => 't052700520@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'P10L20',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Renato Alexander',
                'apellidos' => 'Martinez Aguilar',
                'correo_personal' => NULL,
                'correo_institucional' => 'ramartinezag@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'R1M1',
                'imagen_firma' => NULL,
            ],
            [
                'nombres' => 'Sadhu',
                'apellidos' => 'Rojas García',
                'correo_personal' => 'sadhurojasgarcia@gmail.com',
                'correo_institucional' => 't012701020@unitru.edu.pe',
                'sexo' => 'Masculino',
                'codigo' => 'S19G',
                'imagen_firma' => NULL,
            ],
           
            

        ];

        foreach ($personas as $persona) {
            Persona::create($persona);
        }
        
    }
}
