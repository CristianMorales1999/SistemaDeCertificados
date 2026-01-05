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
                'descripcion' => 'Rol encargado de administrar todo el dashboard e información sensible del sistema, realiza validaciones importantes. Tiene acceso a todas las secciones del sistema.'
            ],
            [
                'nombre' => 'Marketing',
                'descripcion' => 'Rol encargado de la generación y configuración del diseño de los diferentes grupos de certificación. Tiene acceso a las secciones de Marketing.'
            ],
            [
                'nombre' => 'Supervisor',
                'descripcion' => 'Rol encargado de la supervisión y control de los diferentes procesos del sistema. Tiene acceso a todas las secciones del sistema al igual que el rol de Administrador, pero solo en modo lectura.'
            ],
            [
                'nombre' => 'Usuario Normal',
                'descripcion' => 'Rol con acceso limitado a las funcionalidades del sistema. Solo tiene acceso a administrar su perfil y ver sus certificados.'
            ]
        ];
        foreach ($roles as $rol) {
            Rol::create($rol);
        }
    }
}
