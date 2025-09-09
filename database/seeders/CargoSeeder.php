<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargos=[
            [
                'nombre' => 'Presidente SEDIPRO UNT',
                'nombre_femenino' => 'Presidenta SEDIPRO UNT'
            ],
            [
                'nombre' => 'Vicepresidente SEDIPRO UNT',
                'nombre_femenino' => 'Vicepresidenta SEDIPRO UNT'
            ],
            [
                'nombre' => 'Director de GTH SEDIPRO UNT',
                'nombre_femenino' => 'Directora de GTH SEDIPRO UNT'
            ],
            [
                'nombre' => 'Director de LTK&FNZ SEDIPRO UNT',
                'nombre_femenino' => 'Directora de LTK&FNZ SEDIPRO UNT'
            ],
            [
                'nombre' => 'Director de MKT SEDIPRO UNT',
                'nombre_femenino' => 'Directora de MKT SEDIPRO UNT'
            ],
            [
                'nombre' => 'Director de PMO SEDIPRO UNT',
                'nombre_femenino' => 'Directora de PMO SEDIPRO UNT'
            ],
            [
                'nombre' => 'Director de TI SEDIPRO UNT',
                'nombre_femenino' => 'Directora de TI SEDIPRO UNT'
            ],
            [
                'nombre' => 'Director de Proyecto',
                'nombre_femenino' => 'Directora de Proyecto'
            ],
            [
                'nombre' => 'Codirector de Proyecto',
                'nombre_femenino' => 'Codirectora de Proyecto'
            ],
            [
                'nombre' => 'Coordinador de Proyecto',
                'nombre_femenino' => 'Coordinadora de Proyecto'
            ],
            [
                'nombre' => 'Presidente',
                'nombre_femenino' => 'Presidenta',
                'cargo_interno' => false
            ],
            [
                'nombre' => 'Director General',
                'nombre_femenino' => 'Directora General',
                'cargo_interno' => false
            ],
            [
                'nombre' => 'Jefe',
                'nombre_femenino' => 'Jefa',
                'cargo_interno' => false
            ],
            [
                'nombre' => 'Sponsor SEDIPRO UNT',
                'cargo_interno' => false
            ]
        ];

        foreach ($cargos as $cargo) {
            Cargo::create($cargo);
        }
    }
}
