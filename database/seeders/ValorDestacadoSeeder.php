<?php

namespace Database\Seeders;

use App\Models\ValorDestacado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValorDestacadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $valoresDestacados=[
            [
                'nombre' => 'Actitud Positiva',
            ],
            [
                'nombre' => 'Innovación',
            ],
            [
                'nombre' => 'Integridad',
            ],
            [
                'nombre' => 'Trabajo en Equipo',
            ],
            [
                'nombre' => 'Vocación de Servicio',
            ],
        ];

        foreach ($valoresDestacados as $valorDestacado) {
            ValorDestacado::create($valorDestacado);
        }
    }
}
