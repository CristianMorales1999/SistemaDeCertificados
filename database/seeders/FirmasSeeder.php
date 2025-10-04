<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class FirmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        // Obtener todos los archivos de firmas del directorio
        $firmasPath = storage_path('app/public/fotos_firmas');

        if (!is_dir($firmasPath)) {
            $this->command->error('El directorio de firmas no existe: ' . $firmasPath);
            return;
        }

        $archivos = scandir($firmasPath);
        $archivos = array_filter($archivos, function($archivo) {
            return !in_array($archivo, ['.', '..']) &&
                   in_array(pathinfo($archivo, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg']);
        });

        $firmasCreadas = 0;

        foreach ($archivos as $archivo) {
            $nombre = pathinfo($archivo, PATHINFO_FILENAME);
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);
            $ruta = 'fotos_firmas/' . $archivo;

            // Verificar si ya existe
            $existente = Imagen::where('ruta', $ruta)
                              ->where('tipo', 'Firma')
                              ->first();

            if (!$existente) {
                Imagen::create([
                    'nombre' => $nombre,
                    'ruta' => $ruta,
                    'tipo' => 'Firma',
                    'estado' => 'Activa',
                    'extension' => $extension
                ]);
                $firmasCreadas++;
            }
        }

        $this->command->info("✅ Se crearon {$firmasCreadas} firmas en la base de datos.");
        $this->command->info("📊 Total de firmas ahora: " . Imagen::where('tipo', 'Firma')->count());
        */
    }
}
