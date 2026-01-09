<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EntidadAliada;
use App\Models\Persona;
use App\Models\EntidadAliadaPersona;

class EntidadAliadaPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Estados posibles para personas en entidades aliadas:
         * .
                'Activo',
                'Inactivo',
                'Retirado',
         */
        /**
         * Roles posibles para personas en entidades aliadas:
         * .
                'Representante',
                'Miembro',
         */

         $personasEnEntidadesAliadas = [
            /*********************
             **** VUNT **********
             ********************
             */
            //Representante
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'ilherrerall@unitru.edu.pe',// Irving Luis Herrera Llovera
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => NULL,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],
            // Miembros
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 't1061900121@unitru.edu.pe',//Mauricio Jesús Meléndez Sánchez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => NULL,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 't1510601721@unitru.edu.pe', // Jesús Manuel Andrade Loyola
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'pdesposorio@unitru.edu.pe', // Paola Fernanda Desposorio Sanchez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'kflorian@unitru.edu.pe', // Katya Gabriela Florian Rogel
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'daruizvi@unitru.edu.pe', // Diego Arturo Ruiz Villanueva
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'mjvillanuevaa@unitru.edu.pe', // Milenka Jasmin Lucero Villanueva Arrambide
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 't053500820@unitru.edu.pe', // Alberto Raul Velasquez Miñano
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'nbvalladolive@unitru.edu.pe', // Nardia Beatriz Valladoli Vega
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'lchaiguaque@unitru.edu.pe', // Liz Valeria Chaiguaque Vera
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'jtellon@unitru.edu.pe', // Jimena Nayeli Tello Nieves
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'cvegao@unitru.edu.pe', // Cristhian Ernesto Vega Orbegoso
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'admedinav@unitru.edu.pe', // Anayhely Dayana Medina Vasquez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'ssguanilog@unitru.edu.pe', // Susy Solange Guanilo Gil
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 't1051401721@unitru.edu.pe', // Junior Jesus Lopez Lopez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'mdeustaquioru@unitru.edu.pe', // Mayra Danitza Eustaquio Ruiz
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'wecuevag@unitru.edu.pe', // William Eduardo Cueva Gomez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 't1050602621@unitru.edu.pe', // Damaris Alexandra Arce Alave
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'jemartelu@unitru.edu.pe', // Jumer Erick Martel Ugalde
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'dymunozl@unitru.edu.pe', // Doris Ysabel Muñoz Leyva
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'daguilarc@unitru.edu.pe', // David Calet Aguilar Chávez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'sysachunqu@unitru.edu.pe', // Sandra Ysabel Sachun Quispe
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'celiviasot@unitru.edu.pe', // Carlos Emiliano Livias Otiniano
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'jdsalasma@unitru.edu.pe', // Jorge Darío Salas Martínez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 't1511900821@unitru.edu.pe', // Leonardo Matthews Rojas Davalos
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'lreyesro@unitru.edu.pe', // Luceli Ani Reyes Rodriguez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'ltantaleana@unitru.edu.pe', // Lesly Yamileth Tantalean Arteaga
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 't1050702921@unitru.edu.pe', // Christopher Jesus Enrique Cardenas Contreras
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'dcelis@unitru.edu.pe', // Damaris Lucero Celis Castro
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'ayromeropo@unitru.edu.pe', // Adabella Yerena Romero Portilla
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'ndmendezl@unitru.edu.pe', // Nicolas Dante Mendez Lozano
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'ecrisologoz@unitru.edu.pe', // Eros Althair Crisologo Zavaleta
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            //Retirado
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'ncumpa@unitru.edu.pe', // Neyser Yampier Cumpa Inoñan
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],

            //Inactivo
            [
                'entidad_aliada' => 'Voluntariado UNT',
                'correo_persona' => 'cmsalazarc@unitru.edu.pe', // Clarita Mariliz Salazar Corcuera
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],

            /*********************
             **** CESADM ********
             ********************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Administración',
                'correo_persona' => 't010100220@unitru.edu.pe', // Jheferson Jhoel Cubas Fuentes
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Administración',
                'correo_persona' => 't1020101721@unitru.edu.pe', // María Eugenia Del Río Becerra
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Administración',
                'correo_persona' => 'vycedronar@unitru.edu.pe', // Valery Yanina Cedron Arroyo
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Administración',
                'correo_persona' => 'mljuarezlo@unitru.edu.pe', // Marilia Lizbeth Juarez Lopez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            //Retirado
            [
                'entidad_aliada' => 'Centro de Estudiantes de Administración',
                'correo_persona' => 'acriosga@unitru.edu.pe', // Ana Cecilia Rios García
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado', // penúltimo
            ],
            //Inactivo
            [
                'entidad_aliada' => 'Centro de Estudiantes de Administración',
                'correo_persona' => 't1020100721@unitru.edu.pe', // Lesly Judith Mejia Rodriguez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo', // último
            ],

            /*********************
             **** CEAU **********
             ********************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Arquitectura y Urbanismo',
                'correo_persona' => 't514100120@unitru.edu.pe', // Víctor José Pajares Abanto
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Arquitectura y Urbanismo',
                'correo_persona' => 'bjtomasc@unitru.edu.pe', // Bryan Jhoel Tomás Custodio
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Arquitectura y Urbanismo',
                'correo_persona' => 'cbardales@unitru.edu.pe', // Carlos Bardales Orduña
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            //Retirado
            [
                'entidad_aliada' => 'Centro de Estudiantes de Arquitectura y Urbanismo',
                'correo_persona' => 'ealvarez@unitru.edu.pe', // Daniel Eduardo Alvarez Abanto
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado', //  penúltimo
            ],
            //Inactivo
            [
                'entidad_aliada' => 'Centro de Estudiantes de Arquitectura y Urbanismo',
                'correo_persona' => 't524100120@unitru.edu.pe', // Karol Lisbeth Vera Sánchez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo', // último 
            ],

            /*********************
             **** CEMYP **********
             ********************/
            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Microbiología y Parasitología',
                'correo_persona' => 't1051901721@unitru.edu.pe', // Gustavo Alberto Reyes Alfaro
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],
            //Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Microbiología y Parasitología',
                'correo_persona' => 'mrabanalc@unitru.edu.pe', // Magnibeth Yesenia Rabanal Chiroque
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            /*********************
             **** CEIAM *********
             ********************/

            [
                'entidad_aliada' => 'Centro de estudiantes de Ingeniería Ambiental',
                'correo_persona' => 'tysolisme@unitru.edu.pe', // Trasy Yadhira Solis Medina
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de estudiantes de Ingeniería Ambiental',
                'correo_persona' => 'ralipio@unitru.edu.pe', // Rosa Naghely Alipio Gonzales
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de estudiantes de Ingeniería Ambiental',
                'correo_persona' => 'cdelacruzh@unitru.edu.pe', // Cristian Alejandro De La Cruz Herrera
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de estudiantes de Ingeniería Ambiental',
                'correo_persona' => 'favillegasvi@unitru.edu.pe', // Flavia Angelica Villegas Villar
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            [
                'entidad_aliada' => 'Centro de estudiantes de Ingeniería Ambiental',
                'correo_persona' => 'varamoshe@unitru.edu.pe', // Valeria Alejandra Ramos Hernandez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],
            /*********************
             **** CEICI *********
             ********************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Civil',
                'correo_persona' => 't054001220@unitru.edu.pe', // Leonardo Eugenio Díaz Gutierrez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Civil',
                'correo_persona' => 't514000120@unitru.edu.pe', // Yorvan Bustamante Giron
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Civil',
                'correo_persona' => 'ceteranre@unitru.edu.pe', // Carlos Eduardo Terán Revilla
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            /*********************
             **** CEIMAT ********
             ********************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería de Materiales',
                'correo_persona' => 't1053500721@unitru.edu.pe', // Erika Ciklary De La Cruz Barrueto
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería de Materiales',
                'correo_persona' => 't053500420@unitru.edu.pe', // Evelyn Mollo Villanueva
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería de Materiales',
                'correo_persona' => 't513500620@unitru.edu.pe', // Bryam Montañez Correa
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería de Materiales',
                'correo_persona' => 'ejruizp@unitru.edu.pe', // Emerson Josue Ruiz Polo
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],
            /****************************
             **** FÍSICA UNT ***********
             ****************************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Fisica',
                'correo_persona' => 'jfrengifoca@unitru.edu.pe', // Jose Franco Rengifo Cabrera
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Fisica',
                'correo_persona' => 't1511200221@unitru.edu.pe', // Emanuel Santa Cruz Casiano
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Fisica',
                'correo_persona' => 'aabal@unitru.edu.pe', // Andrew Carlos Abal Mendoza
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Fisica',
                'correo_persona' => 'peabanto@unitru.edu.pe', // Pedro Alberto Abanto Muñoz
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],
            /**************************************
             **** ING. INDUSTRIAL *****************
             **************************************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 't1051300921@unitru.edu.pe', // José Manuel Marin Espinoza
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 't1521300121@unitru.edu.pe', // Samuel Esteban Yovera Cueva
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 'jpmirandava@unitru.edu.pe', // Juan Pablo Miranda Varas
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 't011300620@unitru.edu.pe', // Moisés David Huamán Torres
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 'cmzeferinoza@unitru.edu.pe', // Christy Marisol Zeferino Zavaleta
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 't021300520@unitru.edu.pe', // Cristhian Daniel Liza Marroquin
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 't1011300821@unitru.edu.pe', // Sofia Georgette Amaya Cáceda
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Industrial',
                'correo_persona' => 'msrosasa@unitru.edu.pe', // Mauricio Sebastian Rosas Alvarez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            /*********************
             **** CEM **********
             ********************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Medicina',
                'correo_persona' => 'vverad@unitru.edu.pe', // Victor Eduardo Vera Delgado
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Medicina',
                'correo_persona' => 't1021801421@unitru.edu.pe', // Luis Fernando Romero Nolasco
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Medicina',
                'correo_persona' => 't1053702220@unitru.edu.pe', // Miguel Angel Zavaleta Ríos
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            /*************************************
             **** TRABAJO SOCIAL *****************
             *************************************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 't1052500221@unitru.edu.pe', // Yadira Estefani Floreano Caballero
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 't1012500321@unitru.edu.pe', // Alexia Nirvana Espinola Mendez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 'malazarosa@unitru.edu.pe', // Mileny Arely Lázaro Salvador
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 'cnarvaezo@unitru.edu.pe', // Cristina Alexandra Narvaez Ortiz
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 't1052500121@unitru.edu.pe', // Deysi Esther Bobadilla Valderrama
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 'cmaiquen@unitru.edu.pe', // Carlita Blezy Maiquen Crisanto
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 'aruizd@unitru.edu.pe', // Ana Cecilia Ruiz Dias
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Trabajo Social',
                'correo_persona' => 'spvalderramam@unitru.edu.pe', // Sandra Patricia Valderrama Mercedes
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],
            /********************************************
             **** ING. METALÚRGICA **********************
             ********************************************/

            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Metalúrgica',
                'correo_persona' => 'otirado@unitru.edu.pe', // Oliver Frank Tirado Alfaro
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Metalúrgica',
                'correo_persona' => 'ecaballeroz@unitru.edu.pe', // Elva Briguith Caballero Zamalloa
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Metalúrgica',
                'correo_persona' => 'cgarciaro@unitru.edu.pe', // Cristhian Andres García Rodriguez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],
            /********************************************
             **** TURISMO **********************
             ********************************************/
            [
                'entidad_aliada' => 'Centro de Estudiantes de Turismo',
                'correo_persona' => 'sgnarvaezv@unitru.edu.pe', // 'Sebastián Gabriel Narváez Velásquez',
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            /*************************************
             **** CEIQ ***************************
             *************************************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Química',
                'correo_persona' => 'ajimenezr@unitru.edu.pe', // Andrea Ines Jimenez Rodriguez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Química',
                'correo_persona' => 'jbtamarizmi@unitru.edu.pe', // José Benjamin Tamariz Mimbela
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Química',
                'correo_persona' => 'agblasca@unitru.edu.pe', // Adamaris Gibely Blas Calderonz
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Química',
                'correo_persona' => 'iloje@unitru.edu.pe', // Ibeth Akenmy Loje Polo
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Química',
                'correo_persona' => 'kinfante@unitru.edu.pe', // Keiko Marianella Infante Palacios
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Retirado',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Química',
                'correo_persona' => 'ehyoverah@unitru.edu.pe', // Erick Humberto Yovera Hernández
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],
            /****************************************
             **** ING. MECATRÓNICA *****************
             ****************************************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Mecatrónica',
                'correo_persona' => 't023600420@unitru.edu.pe', // Sergio Anderson Gil Gonzalez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Mecatrónica',
                'correo_persona' => 't533600520@unitru.edu.pe', // Fernando Miguel Aurazo Alvarado
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
            [
                'entidad_aliada' => 'Centro de Estudiantes de Ingeniería Mecatrónica',
                'correo_persona' => 't513600520@unitru.edu.pe', // Karl Alejandro Espinoza León
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2025-12-31',
                'rol' => 'Miembro',
                'estado' => 'Inactivo',
            ],
            /****************************************
             **** ESTOMATOLOGÍA ********************
             ****************************************/

            // Representante
            [
                'entidad_aliada' => 'Centro de Estudiantes de Estomatología',
                'correo_persona' => 'jecruzg@unitru.edu.pe', // Jose Edwin Cruz Gallo
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro de Estudiantes de Estomatología',
                'correo_persona' => 'davilap@unitru.edu.pe', // Daniela Dariana Avila Padilla
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            /*************************************
             **** CENTROS FEDERADOS ***************************
             *************************************/

            /*************************************
             **** Centro Federado De Ciencia Política ***************************
             *************************************/

             //Representante

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 't1513900521@unitru.edu.pe', // Melany Jasmin Cabrera Garcia 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 'nagutierrezl@unitru.edu.pe', // Néstor Abelardo Gutiérrez León 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 't1053901321@unitru.edu.pe', //  Juan José Vasquez Mendoza 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 'cherreraa@unitru.edu.pe', //  Carlos Yemeri Aron Herrera Alayo 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 't1023900521@unitru.edu.pe', //  Luciano Alberto Chuquihuara Tirado 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 'ctorresl@unitru.edu.pe', //  Cesia Yomira Torres León
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 'lmirandap@unitru.edu.pe', //  Leticia Mariana Miranda Pérez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado De Ciencia Política',
                'correo_persona' => 't1053900221@unitru.edu.pe', //  Jorge Jonatan Campos Rodriguez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            /*************************************
             **** Centro Federado de Economía ***************************
             *************************************/

             //Representante

            [
                'entidad_aliada' => 'Centro Federado de Economía',
                'correo_persona' => 't1050702421@unitru.edu.pe', // Frandux Lee Manayay Cieza 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros

            [
                'entidad_aliada' => 'Centro Federado de Economía',
                'correo_persona' => 'jmjugoev@unitru.edu.pe', // Jeiser Maycol Jugo Evangelista 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Economía',
                'correo_persona' => 'bgarayr@unitru.edu.pe', // Bruno Jeanpier Garay Rojas 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Economía',
                'correo_persona' => 't1010700721@unitru.edu.pe', // María Fernanda Pretell León 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Economía',
                'correo_persona' => 'rlalfarova@unitru.edu.pe', // Roxana Luzbeth Alfaro Vasquez 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            /*************************************
             **** Centro Federado de Estudiantes de Ingeniería Agroindustrial ***************************
             *************************************/

             //Representante

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Ingeniería Agroindustrial',
                'correo_persona' => 'fuceda@unitru.edu.pe', // Fabricio Uceda Garcia 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Ingeniería Agroindustrial',
                'correo_persona' => 'ccvigof@unitru.edu.pe', // Cielo Carolina Vigo Flores 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Ingeniería Agroindustrial',
                'correo_persona' => 'nvasquezvi@unitru.edu.pe', // Nayely Vasquez Villarreal 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            /*************************************
             **** Centro Federado de Derecho ***************************
             *************************************/

             //Representante

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'jvalverdet@unitru.edu.pe', // Jeremy Rorievans Valverde Tolentino 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'ldcubaba@unitru.edu.pe', // Leydi Diana Cuba Barrantes 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'facacedaru@unitru.edu.pe', // Flor Andrea Cáceda Rumay 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'alulloar@unitru.edu.pe', // Ana Lucia Ulloa Ruiz 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'lminanoco@unitru.edu.pe', // Leydi Laurita Miñano Corro 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'gsbravolu@unitru.edu.pe', // Geraldo Samir Bravo Lucano 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'pmvallejof@unitru.edu.pe', // Paolo Mariano Vallejo Fernandez 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'nmsanchezg@unitru.edu.pe', // Nataly Mayte Sánchez Gil 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'mcontrerasv@unitru.edu.pe', // Milagros Contreras Valdez 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Derecho',
                'correo_persona' => 'acasasj@unitru.edu.pe', // Anyelin Casas Junquera 
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            /*************************************
             **** Centro Federado de Ingeniería Agrícola ***************************
             *************************************/

             //Representante

            [
                'entidad_aliada' => 'Centro Federado de Ingeniería Agrícola',
                'correo_persona' => 't042300220@unitru.edu.pe', // Virginia Jhoana Abanto Castillo
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros

            [
                'entidad_aliada' => 'Centro Federado de Ingeniería Agrícola',
                'correo_persona' => 'vminchola@unitru.edu.pe', // Vilma Alexandra Minchola Chavez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Ingeniería Agrícola',
                'correo_persona' => 'pvasquezs@unitru.edu.pe', // Pedro Willy Vasquez Solis Benavides
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            /*************************************
             **** Centro Federado de Ingeniería Mecánica ***************************
             *************************************/

             //Representante

            [
                'entidad_aliada' => 'Centro Federado de Ingeniería Mecánica',
                'correo_persona' => 'jaoliverar@unitru.edu.pe', // Jairo Arturo Olivera Ramos
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros

            [
                'entidad_aliada' => 'Centro Federado de Ingeniería Mecánica',
                'correo_persona' => 'ejsalvadorl@unitru.edu.pe', // Erick Jesus Salvador Lizarraga
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Ingeniería Mecánica',
                'correo_persona' => 'abbarruetoi@unitru.edu.pe', // Akihito Bryan Barrueto Ipushima
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            /*************************************
             **** Centro Federado de Estudiantes de Enfermería ***************************
             *************************************/

             //Representante

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Enfermería',
                'correo_persona' => 'asanchezva@unitru.edu.pe', // Anny Nayeli Yireh Sánchez Vásquez
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Representante',
                'estado' => 'Activo',
            ],

            // Miembros

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Enfermería',
                'correo_persona' => 't1050900621@unitru.edu.pe', // Erika Elizabeth Ruiz Vera
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Enfermería',
                'correo_persona' => 't1510900121@unitru.edu.pe', // Jordy David Rodriguez Rubio
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Enfermería',
                'correo_persona' => 'neleonto@unitru.edu.pe', // Norma Elizabeth León Tongombol
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],

            [
                'entidad_aliada' => 'Centro Federado de Estudiantes de Enfermería',
                'correo_persona' => 'nsruizbe@unitru.edu.pe', // Nicol Stefanny Ruiz Benites
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => null,
                'rol' => 'Miembro',
                'estado' => 'Activo',
            ],
        ];

        foreach ($personasEnEntidadesAliadas as $personaEnEntidadAliada) {
            $personaEnEntidadAliada['entidad_aliada_id'] = EntidadAliada::where('nombre', $personaEnEntidadAliada['entidad_aliada'])->first()->id;
            $personaEnEntidadAliada['persona_id'] = Persona::where('correo_institucional', $personaEnEntidadAliada['correo_persona'])->first()->id;
            unset($personaEnEntidadAliada['entidad_aliada']);
            unset($personaEnEntidadAliada['correo_persona']);
            EntidadAliadaPersona::create($personaEnEntidadAliada);
        }
    }
}
