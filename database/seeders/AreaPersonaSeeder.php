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
            // DIRECTIVA 2025
            [
                //PRESIDENTA 2025
                'area' => 'PMO',
                'correo_persona' => 't1051300621@unitru.edu.pe',//lucia Amaya
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //VICEPRESIDENTA
                'area' => 'GTH',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Pereda
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Gonzales
                'fecha_inicio' => '2022-05-10',
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Rodriguez
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1024000721@unitru.edu.pe',//Angel Iparraguirre
                'fecha_inicio' => '2023-06-13',
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'mfherrerace@unitru.edu.pe',//Mafer Herrera
                'fecha_inicio' => '2023-06-13',
                'fecha_fin' => NULL,
                'estado' =>'Cargo en Directiva',
            ],
            [
                //DIRECTOR(A) TI
                'area' => 'TI',
                'correo_persona' => 'chmoralese@unitru.edu.pe',//Cristian Morales
                'fecha_inicio' => '2023-06-13',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Cargo en Directiva',
            ],

            // GTH

            // GTH MIEMBROS ACTIVOS EN 2025
            [
                //Cristhian Luis David Sánchez Obeso
                'area' => 'GTH',
                'correo_persona' => 'clsanchezo@unitru.edu.pe',
                'fecha_inicio' => '2025-06-02',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Emilly Nicoll Zavaleta Chigne
                'area' => 'GTH',
                'correo_persona' => 'enzavaletac@unitru.edu.pe',
                'fecha_inicio' => '2025-06-02',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Anderson Alexander Saavedra Nolasco
                'area' => 'GTH',
                'correo_persona' => 'aasaavedrano@unitru.edu.pe',
                'fecha_inicio' => '2025-06-02',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Joaquin Adriano Bocanegra Peláez
                'area' => 'GTH',
                'correo_persona' => 'jabocanegrap@unitru.edu.pe',
                'fecha_inicio' => '2025-06-02',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Luis Enrique Montoya Aguirre
                'area' => 'GTH',
                'correo_persona' => 'lemontoyaa@unitru.edu.pe',
                'fecha_inicio' => '2025-06-02',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Eleanor Marycielo Roca Mendoza
                'area' => 'GTH',
                'correo_persona' => 'emrocam@unitru.edu.pe',
                'fecha_inicio' => '2025-06-02',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Valeria Angelie Valderrama Muñoz
                'area' => 'GTH',
                'correo_persona' => 'vavalderramam@unitru.edu.pe',
                'fecha_inicio' => '2025-06-02',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Andrweeu Daniel Urtecho Avila
                'area' => 'GTH',
                'correo_persona' => 'aurtechoa@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //VCorina Marilu Sanchez Delgado
                'area' => 'GTH',
                'correo_persona' => 'Csanchezd@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Romina Alejandra Seclen Cespedes
                'area' => 'GTH',
                'correo_persona' => 't1052500521@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Renzo Georkael Carrasco Lalangui
                'area' => 'GTH',
                'correo_persona' => 'rgcarrascol@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Nashaly Nicolle Alama Terrones
                'area' => 'GTH',
                'correo_persona' => 'nalama@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Michael Junior García García
                'area' => 'GTH',
                'correo_persona' => 't1051300421@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Mariann Estefany Fernández Leyva
                'area' => 'GTH',
                'correo_persona' => 't1050102021@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Lisseth Adelaida Chávez Rosales
                'area' => 'GTH',
                'correo_persona' => 'lichavezr@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //José Daniel Avila Santillan
                'area' => 'GTH',
                'correo_persona' => 'jdavilas@unitru.edu.pe',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Gerson Gabriel Alfaro Tandaypan
                'area' => 'GTH',
                'correo_persona' => 't1051500121@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Dulce Geraldine Chavez Padilla
                'area' => 'GTH',
                'correo_persona' => 't1051302521@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Ana Nicoll Segura Aredo
                'area' => 'GTH',
                'correo_persona' => 'anseguraa@unitru.edu.pe',
                'fecha_inicio' => '2024-12-10',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Alisson Milagros Pretell Canchas
                'area' => 'GTH',
                'correo_persona' => 't050601920@unitru.edu.pe',
                'fecha_inicio' => '2023-06-13',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],
            [
                //Elber Isaí Pichén Zavaleta
                'area' => 'GTH',
                'correo_persona' => 't1024000121@unitru.edu.pe',
                'fecha_inicio' => '2021-11-20',
                'fecha_fin' =>NULL,//NULL mientras no se retire o egrese
                'estado' =>'Miembro activo',
            ],

            //LTK & FNZ

            //MKT

            //PMO

            //TI

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
