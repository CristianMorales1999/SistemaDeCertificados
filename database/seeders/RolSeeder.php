<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nombre' => 'Administrador',
                'descripcion' => 'Rol encargado de administrar todo el dashboard e información sensible del sistema, realiza validaciones importantes.'
            ],
            [
                'nombre' => 'Marketing',
                'descripcion' => 'Rol encargado de la generación y configuración del diseño de los diferentes grupos de certificación.'
            ]
        ];
        foreach ($roles as $rol) {
            Rol::create($rol);
        }
    }
}
