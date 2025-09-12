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
         * .
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
