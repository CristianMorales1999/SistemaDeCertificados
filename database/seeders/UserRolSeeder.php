<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;
use App\Models\Persona;
use App\Models\AreaPersona;
use App\Models\Area;

class UserRolSeeder extends Seeder
{
    public function run()
    {
        // Obtiene los roles
        $roles = Rol::all();
        $rolMarketing = Rol::where('nombre', 'Marketing')->first();

        if (!$rolMarketing) {
            $this->command->error('No se encontró el rol "Marketing". Crea ese rol antes de correr este seeder.');
            return;
        }

        // Obtiene el área TI
        $areaTI = Area::where('abreviatura', 'TI')->orWhere('nombre', 'like', '%Tecnologías de la Información%')->first();

        if (!$areaTI) {
            $this->command->error('No se encontró el área de TI.');
            return;
        }

        // Obtiene las personas que pertenecen al área TI activamente
        $personasTI = AreaPersona::where('area_id', $areaTI->id)
            ->whereNull('fecha_fin')
            ->whereIn('estado', ['Miembro Activo', 'Cargo en Directiva'])
            ->pluck('persona_id');

        // Usuarios activos
        $usuariosActivos = User::where('status', 'Activo')->get();

        foreach ($usuariosActivos as $user) {
            // Verifica si el usuario pertenece a TI
            $esDeTI = $personasTI->contains($user->persona_id);

            if ($esDeTI) {
                // Asigna todos los roles
                $user->roles()->syncWithoutDetaching($roles->pluck('id')->toArray());
            } else {
                // Solo asigna el rol Marketing
                $user->roles()->syncWithoutDetaching([$rolMarketing->id]);
            }
        }

        $this->command->info('Roles asignados correctamente según área y estado.');
    }
}
