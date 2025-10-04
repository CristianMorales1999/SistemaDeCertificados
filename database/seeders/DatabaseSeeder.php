<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Certificado;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this -> call([
            AreaSeeder::class,
            CargoSeeder::class,
            EntidadAliadaSeeder::class,
            FuenteSeeder::class,
            ImagenSeeder::class,
            RolSeeder::class,
            SeccionDeInformacionSeeder::class,
            TipoDeCertificacionSeeder::class,
            ValorDestacadoSeeder::class,
            PersonaSeeder::class,
            UserSeeder::class,
            AreaPersonaSeeder::class,
            AreaPersonaCargoSeeder::class,
            ProyectoSeeder::class,
            EventoSeeder::class,
            AreaPersonaProyectoSeeder::class,
            AreaPersonaValorDestacadoSeeder::class,
            EntidadAliadaPersonaSeeder::class,
            EventoPersonaSeeder::class,
            EntidadAliadaPersonaProyectoSeeder::class,
            GrupoDeCertificacionSeeder::class,
            CertificadoSeeder::class,
            ConfiguracionSeeder::class,
            UserRolSeeder::class
        ]);
    }
}
