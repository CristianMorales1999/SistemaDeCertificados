<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntidadAliadaPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
         * Estados posibles para personas en entidades aliadas:
         * .
                'Activo',
                'Inactivo',
                'Retirado',
         */
        /*
         * Roles posibles para personas en entidades aliadas:
         * .
                'Representante',
                'Miembro',
         */

        $personasEnEntidadesAliadas = [
            /*******************
              **** VUNT ******
            ******************** */
            //Irving Luis Herrera Llovera
            [
                'entidad_aliada' => 'VUNT',
                'correo_persona' => '',
                'fecha_inicio' => '01-01-2024',
                'fecha_fin' => NULL,
                'rol' =>'',
                'estado' =>'Activo',
            ],
            [
                'entidad_aliada' => '',
                'correo_persona' => '',
                'fecha_inicio' => '01-01-2024',
                'fecha_fin' => NULL,
                'rol' =>'',
                'estado' =>'Activo',
            ],
        ];
    }
}
