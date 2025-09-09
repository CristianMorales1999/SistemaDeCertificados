<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeccionDeInformacion;

class SeccionDeInformacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seccionesDeInformacion = [
            [
                'nombre' => 'Titulo de certificación'
            ],
            [
                'nombre' => 'Subtitulo de certificación'
            ],
            [
                'nombre' => 'Texto previo a titular de certificación'
            ],
            [
                'nombre' => 'Titular de certificación'
            ],
            [
                'nombre' => 'Línea debajo de la sección del Titular'
            ],
            [
                'nombre' => 'Cuerpo del certificado'
            ],
            [
                'nombre' => 'Lugar y fecha del certificado'
            ],
            [
                'nombre' => 'Firmantes del certificado'
            ],
            [
                'nombre' => 'Líneas debajo de la sección de firmantes'
            ],
            [
                'nombre' => 'Cargos de los firmantes'
            ]
        ];
        foreach ($seccionesDeInformacion as $seccionDeInformacion) {
            SeccionDeInformacion::create($seccionDeInformacion);
        }
    }
}
