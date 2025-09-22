<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\AreaPersona;
use App\Models\Area;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Este seeder está deshabilitado porque las personas ya están insertadas
        // mediante el PersonaSeeder original que usa los datos del SQL
        $this->command->info('PersonasSeeder omitido: las personas ya están cargadas por PersonaSeeder.');
        return;
    }
}
