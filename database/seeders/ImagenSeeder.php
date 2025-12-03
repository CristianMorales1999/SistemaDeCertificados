<?php

namespace Database\Seeders;

use App\Models\Imagen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        //Para crear el acceso directo para las rutas de las imagenes ejecutar el comando "php artisan storage:link"
        $imagenes=[
            /*****************************
             ****** FOTOS DE LOGOS *******
             ***************************** */
            [
                'nombre' => 'Sedipro UNT - Logo Principal',
                'ruta' => 'fotos_logos/Sedipro UNT-Logo Principal.svg',
                'tipo' => 'Logo',
                'extension' => '.svg',
            ],
            [
                'nombre' => 'Sedipro UNT - Logo Alternativo',
                'ruta' => 'fotos_logos/Sedipro UNT-Logo Alternativo.png',
                'tipo' => 'Logo',
                'extension' => '.png',
            ],

            /*********************************
             ****** FOTOS DE PLANTILLAS ******
             ********************************* */
            [
                'nombre' => 'Diseño 01',
                'ruta' => 'fotos_plantillas/Plantilla 01.jpg',
                'tipo' => 'Plantilla',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'Diseño 02',
                'ruta' => 'fotos_plantillas/Plantilla 02.jpg',
                'tipo' => 'Plantilla',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'Diseño 03',
                'ruta' => 'fotos_plantillas/Plantilla 03.jpg',
                'tipo' => 'Plantilla',
                'extension' => '.jpg',
            ],
            [
                'nombre' => 'Diseño 04',
                'ruta' => 'fotos_plantillas/Plantilla 04.jpg',
                'tipo' => 'Plantilla',
                'extension' => '.jpg',
            ],
            //
            /*****************************
             ****** FOTOS DE SELLOS ******
             ***************************** */
            [
                'nombre' => 'SEDIPRO UNT 2024',
                'ruta' => 'fotos_sellos/SEDIPRO UNT 2024.png',
                'tipo' => 'Sello',
                'extension' => '.png',
            ],
            [
                'nombre' => 'SEDIPRO UNT 2025',
                'ruta' => 'fotos_sellos/SEDIPRO UNT 2025.png',
                'tipo' => 'Sello',
                'extension' => '.png',
            ],
        ];

        foreach ($imagenes as $imagen) {
            Imagen::create($imagen);
        }
    }
}
