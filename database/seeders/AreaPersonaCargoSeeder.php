<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
use App\Models\Persona;
use App\Models\AreaPersona;
use App\Models\Cargo;
use App\Models\Proyecto;
use App\Models\AreaPersonaCargo;

class AreaPersonaCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /***
         * Estados posibles para personas en áreas que ocupan un cargo:
         * 
            'Cargo activo',
            'Cambio de cargo',
            'Retiro voluntario de cargo',
            'Retiro de cargo por bajo rendimiento',
            'Cargo finalizado',
         */

        /***
         * Cargos disponibles para personas en áreas:
         * 
         * CARGOS INTERNOS:
            'Presidente SEDIPRO UNT',
            'Vicepresidente SEDIPRO UNT',
            'Director de GTH SEDIPRO UNT',
            'Director de LTK&FNZ SEDIPRO UNT',
            'Director de MKT SEDIPRO UNT',
            'Director de PMO SEDIPRO UNT',
            'Director de TI SEDIPRO UNT',

            'Director de Proyecto',
            'Codirector de Proyecto',
            'Coordinador de Proyecto',

         * CARGOS EXTERNOS:
            'Presidente',
            'Director General',
            'Jefe',

            'Patrocinador',//Sponsor Sedipro UNT
         */

        $personasConCargo=[
            /********************************************
              ********* DIRECTIVAS SEDIPRO UNT **********
              ******************************************* */
            /************************************
              ********* DIRECTIVA 2025 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'PMO',//Area de la persona que desempeña el cargo
                'correo_persona' => 't1051300621@unitru.edu.pe',//lucia Amaya | Correo institucional unico de la persona que desempeña el cargo
                'cargo' => 'Presidente SEDIPRO UNT',//Nombre del cargo
                'proyecto' => NULL, //NULL solo si el cargo desempeñado no esta asociado a ningun proyecto determinado
                'fecha_inicio' => '2025-03-19',//Fecha en que empezó a desempeñar el cargo
                'fecha_fin' => NULL,//NULL solo si aún sigue desempeñando el cargo 
                'estado' =>'Cargo activo',//Estado actual del cargo desempeñado
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'GTH',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Pereda
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Gonzales
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Rodriguez
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1024000721@unitru.edu.pe',//Angel Iparraguirre
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 'mfherrerace@unitru.edu.pe',//Mafer Herrera
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DIRECTOR(A) TI
                'area' => 'TI',
                'correo_persona' => 'chmoralese@unitru.edu.pe',//Cristian Morales
                'cargo' => 'Director de TI SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2025-03-19',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            /************************************
              ********* DIRECTIVA 2024 **********
              *********************************** */
            [
                //PRESIDENTE(A)
                'area' => 'PMO',
                'correo_persona' => 't010100820@unitru.edu.pe',//Cinthya Gil
                'cargo' => 'Presidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => 'GTH',
                'correo_persona' => 't1052500521@unitru.edu.pe',//Romina Seclen
                'cargo' => 'Vicepresidente SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => 'GTH',
                'correo_persona' => 't020101420@unitru.edu.pe',//Bricelly Ruiz
                'cargo' => 'Director de GTH SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1512400421@unitru.edu.pe',//Sebastian Facundo
                'cargo' => 'Director de LTK&FNZ SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => 'MKT',
                'correo_persona' => 't1510100321@unitru.edu.pe',//Adeli Valverde
                'cargo' => 'Director de MKT SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => 'PMO',
                'correo_persona' => 't510100520@unitru.edu.pe',//Ivanna Vela
                'cargo' => 'Director de PMO SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) TI
                'area' => 'TI',
                'correo_persona' => 'chmoralese@unitru.edu.pe',//Cristian Morales
                'cargo' => 'Director de TI SEDIPRO UNT',
                'proyecto' => NULL,
                'fecha_inicio' => '2024-04-20',
                'fecha_fin' => '2025-03-18',
                'estado' =>'Cargo finalizado',
            ],
            /************************************
              ********* DIRECTIVA 2023 **********
              *********************************** */
            /*
            [
                //PRESIDENTE(A)
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],
            [
                //VICEPRESIDENTE(A)
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) GTH
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) LTK&FNZ
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) MKT
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) PMO
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DIRECTOR(A) TI
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],*/
            /************************************
              ********* PROYECTOS 2025 **********
              *********************************** */
            /*
            [
                //Cargo 
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //Cargo 
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],*/
            /************************************
              ********* PROYECTOS 2024 **********
              *********************************** */
            /*
            [
                //Cargo 
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //Cargo 
                'area' => '',
                'correo_persona' => '',//Nombre Apellido
                'cargo' => '',
                'proyecto' => NULL,
                'fecha_inicio' => '',
                'fecha_fin' => '',
                'estado' =>'Cargo finalizado',
            ],*/
        ];

        foreach( $personasConCargo as $personaConCargo){
            $idArea=Area::where('abreviatura', $personaConCargo['area'])->first()->id;
            $idPersona = Persona::where('correo_institucional', $personaConCargo['correo_persona'])->first()->id;

            $personaConCargo['area_persona_id']=AreaPersona::where('area_id', $idArea)->where('persona_id', $idPersona)->first()->id;
            unset($personaConCargo['area']);
            unset($personaConCargo['correo_persona']);

            $personaConCargo['cargo_id']=Cargo::where('nombre', $personaConCargo['cargo'])->first()->id;
            unset($personaConCargo['cargo']);

            if($personaConCargo['proyecto']!=NULL){
                $personaConCargo['proyecto_id']=Proyecto::where('nombre', $personaConCargo['proyecto'])->first()->id;
            }else{
                $personaConCargo['proyecto_id']=NULL;
            }
            unset($personaConCargo['proyecto']);
            AreaPersonaCargo::create($personaConCargo);
        }
    }
}
