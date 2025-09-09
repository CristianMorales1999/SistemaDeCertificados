<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EntidadAliada;
use App\Models\Cargo;

class EntidadAliadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entidadesAliadas = [
            //Volunariado UNT
            [
                'nombre' => 'Voluntariado UNT',  
                'acronimo' => 'VUNT',
                'cargo_representante' => 'Presidente'
            ],
            //Centros de Estudiantes
            [
                'nombre' => 'Centro de Estudiantes de Administración', 
                'acronimo' => 'CESADM',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Arquitectura y Urbanismo', 
                'acronimo' => 'CEAU',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Microbiología y Parasitología', 
                'acronimo' => 'CEMYP',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de estudiantes de Ingeniería Ambiental', 
                'acronimo' => 'CEIAM',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Ingeniería Civil', 
                'acronimo' => 'CEICI',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Ingeniería de Materiales', 
                'acronimo' => 'CEIMAT',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Fisica', 
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Ingeniería Industrial', 
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Medicina', 
                'acronimo' => 'CEM',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Trabajo Social', 
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Ingeniería Metalúrgica', 
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Turismo', 
                'acronimo' => 'CETUR',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Ingeniería Química', 
                'acronimo' => 'CEIQ',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Ingeniería Mecatrónica', 
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro de Estudiantes de Estomatología', 
                'acronimo' => 'CEEST',
                'cargo_representante' => 'Presidente'
            ],
            //Centros Federados
            [
                'nombre' => 'Centro Federado De Ciencia Política', 
                'acronimo' => 'CEFECIP',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro Federado de Economía', 
                'acronimo' => 'CEFECON',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro Federado de Estudiantes de Ingeniería Agroindustrial', 
                'acronimo' => 'CFEIA',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro Federado de Derecho', 
                'acronimo' => 'CEFEDER',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro Federado de Ingeniería Agrícola', 
                'acronimo' => 'CEFEIA',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro Federado de Ingeniería Mecánica', 
                'acronimo' => 'CFIM',
                'cargo_representante' => 'Presidente'
            ],
            [
                'nombre' => 'Centro Federado de Estudiantes de Enfermería', 
                'acronimo' => 'CEFENF',
                'cargo_representante' => 'Presidente'
            ],
            //Personas de apoyo de escuelas
            [
                'nombre' => 'Centro Federado de Estudiantes de Biología Pesquera', 
                'acronimo' => 'CFEBIOPES',
                'cargo_representante' => 'Presidente'
            ],
            //Falta 'Eduacion Secundaria Lengua y Literatura' y 'Educación Primaria'
        ];
        foreach ($entidadesAliadas as $entidadAliada) {
            $entidadAliada['cargo_representante_id'] = Cargo::where('nombre', $entidadAliada['cargo_representante'])->first()->id;
            unset($entidadAliada['cargo_representante']);
            EntidadAliada::create($entidadAliada);
        }
    }
}
