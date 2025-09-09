<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fuente;

class FuenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Fuentes de letras para secciones de información del certificado ordenadas por orden alfabético
        $fuentes=[
            [
                'nombre' => 'Alex Brush'
            ],
            [
                'nombre' => 'Allura'
            ],
            [
                'nombre' => 'Arial'
            ],
            [
                'nombre' => 'Belleza'
            ],
            [
                'nombre' => 'Bogart'
            ],
            [
                'nombre' => 'Calibri'
            ],
            [
                'nombre' => 'Cinzel'
            ],
            [
                'nombre' => 'Comic Sans'
            ],
            [
                'nombre' => 'Cormorant Garamond'
            ],
            [
                'nombre' => 'Dancing Script'
            ],
            [
                'nombre' => 'DM Sans'
            ],
            [
                'nombre' => 'DM Serif Display'
            ],
            [
                'nombre' => 'Droid Serif'
            ],
            [
                'nombre' => 'Garamond'
            ],
            [
                'nombre' => 'Georgia Pro'
            ],
            [
                'nombre' => 'Great Vibes'
            ],
            [
                'nombre' => 'Helvetica'
            ],
            [
                'nombre' => 'Impact'
            ],
            [
                'nombre' => 'Lato'
            ],
            [
                'nombre' => 'Libre Baskerville'
            ],
            [
                'nombre' => 'Lora'
            ],
            [
                'nombre' => 'Lucida Console'
            ],
            [
                'nombre' => 'Lucida Sans Unicode'
            ],
            [
                'nombre' => 'Merriweather'
            ],
            [
                'nombre' => 'Montserrat'
            ],
            [
                'nombre' => 'Now'
            ],
            [
                'nombre' => 'Open Sans'
            ],
            [
                'nombre' => 'Pacifico'
            ],
            [
                'nombre' => 'Playfair Display'
            ],
            [
                'nombre' => 'Poppins'
            ],
            [
                'nombre' => 'PT Serif'
            ],
            [
                'nombre' => 'Quicksand'
            ],
            [
                'nombre' => 'Raleway'
            ],
            [
                'nombre' => 'Roboto'
            ],
            [
                'nombre' => 'Source Sans Pro'
            ],
            [
                'nombre' => 'Tahoma'
            ],
            [
                'nombre' => 'Times New Roman'
            ],
            [
                'nombre' => 'Verdana'
            ]
        ];
        foreach ($fuentes as $fuente) {
            Fuente::create($fuente);
        }
    }
}
