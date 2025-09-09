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
            // [
            //     'nombre' => '',
            //     'ruta' => 'fotos_logos/',
            //     'tipo' => 'Logo',
            //     'extension' => '.jpg',
            // ],
            //
            /*********************************
             ****** FOTOS DE PLANTILLAS ******
             ********************************* */
            // [
            //     'nombre' => '',
            //     'ruta' => 'fotos_plantillas/',
            //     'tipo' => 'Plantilla',
            //     'extension' => '.jpg',
            // ],
            //
            /*****************************
             ****** FOTOS DE SELLOS ******
             ***************************** */
            // [
            //     'nombre' => '',
            //     'ruta' => 'fotos_sellos/',
            //     'tipo' => 'Sello',
            //     'extension' => '.jpg',
            // ],
        ];

        foreach ($imagenes as $imagen) {
            Imagen::create($imagen);
        }
    }
}
