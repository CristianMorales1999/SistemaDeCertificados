<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\Area;
use Carbon\Carbon;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proyectos=[
            /************************************
              ********* PROYECTOS 2024 **********
              ************************************/
            /*******************************
              ******* PROYECTO : IPMC ******
              *******************************/
            /* - DP: Geancarlo José Benavides Rodriguez 
               - CO-DP: Maria Fernanda de la Caridad Herrera Cerquín */
            [
                'area' => NULL,
                'nombre' => 'IPMC',
                'imagen_logo' => 'fotos_logos/IPMC.png',
                'fecha_inicio' => '',
                'fecha_fin' => '',
            ],
            /*******************************
              ***** PROYECTO : RENACER *****
              *******************************/
            /* - DP: Lesly Fiorella Pérez Rodríguez  */
            [
                'area' => NULL,
                'nombre' => 'RENACER',
                'imagen_logo' => 'fotos_logos/RENACER.png',
                'fecha_inicio' => '',
                'fecha_fin' => '',
            ],
            /*****************************************
              *** PROYECTO : MIS AMIGOS LOS LIBROS ***
              ****************************************/
            /* - DP: Marina Lizeth Gonzales Torres  */
            [
                'area' => NULL,
                'nombre' => 'MIS AMIGOS LOS LIBROS',
                'imagen_logo' => 'fotos_logos/MIS AMIGOS LOS LIBROS.png',
                'fecha_inicio' => '',
                'fecha_fin' => '',
            ],
            /****************************************
              *** PROYECTO : PROYECTATE COMO CAPM ***
              ****************************************/
            /* - DP: Aitana Sofía Requejo Valle  */
            [
                'area' => NULL,
                'nombre' => 'PROYECTATE COMO CAPM',
                'imagen_logo' => 'fotos_logos/PROYECTATE COMO CAPM.png',
                'fecha_inicio' => '',
                'fecha_fin' => '',
            ],
            /************************************
              ********* PROYECTOS 2025 **********
              *********************************** */
            [
                'area' => NULL,
                'nombre' => 'NAVISEDIPRO 9.0',
                'imagen_logo' => 'fotos_logos/NAVISEDIPRO 9.0.png',
                'fecha_inicio' => '',
                'fecha_fin' => NULL,
            ],
        ];

        foreach( $proyectos as $proyecto){
            if($proyecto['area']!=NULL){
                $proyecto['area_id']=Area::where('abreviatura', $proyecto['area'])->first()->id;
            }else{
                $proyecto['area_id']=NULL;
            }
            unset($proyecto['area']);
            Proyecto::create($proyecto);
        }
    }
}
