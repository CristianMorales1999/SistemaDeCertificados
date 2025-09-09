<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas=[
            [
                'nombre' => 'Gestión de Talento Humano',
                'abreviatura' => 'GTH',
                'estado' => 'Activa'
            ],
            [
                'nombre' => 'Logística y Finanzas',
                'abreviatura' => 'LTK & FNZ',
                'estado' => 'Activa'
            ],
            [
                'nombre' => 'Marketing',
                'abreviatura' => 'MKT',
                'estado' => 'Activa'
            ],
            [
                'nombre' => 'Project Management Office',
                'abreviatura' => 'PMO',
                'estado' => 'Activa'
            ],
            [
                'nombre' => 'Tecnologías de la Información',
                'abreviatura' => 'TI',
                'estado' => 'Activa'
            ]
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
