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
                  'fecha_inicio' => '2024-04-18',
                  'fecha_fin' => '2024-09-08',
              ],
              /*******************************
                ***** PROYECTO : RENACER *****
                *******************************/
              /* - DP: Lesly Fiorella Pérez Rodríguez  */
              [
                  'area' => NULL,
                  'nombre' => 'RENACER',
                  'imagen_logo' => 'fotos_logos/RENACER.png',
                  'fecha_inicio' => '2024-08-20',
                  'fecha_fin' => '2024-10-30',
              ],
              /*****************************************
                *** PROYECTO : MIS AMIGOS LOS LIBROS ***
                ****************************************/
              /* - DP: Marina Lizeth Gonzales Torres  */
              [
                  'area' => NULL,
                  'nombre' => 'MIS AMIGOS LOS LIBROS',
                  'imagen_logo' => 'fotos_logos/MIS AMIGOS LOS LIBROS.png',
                  'fecha_inicio' => '2024-08-20',
                  'fecha_fin' => '2024-10-31',
              ],
              /****************************************
                *** PROYECTO : PROYECTATE COMO CAPM ***
                ****************************************/
              /* - DP: Aitana Sofía Requejo Valle  */
              [
                  'area' => NULL,
                  'nombre' => 'PROYECTATE COMO CAPM',
                  'imagen_logo' => 'fotos_logos/PROYECTATE COMO CAPM.png',
                  'fecha_inicio' => '2024-08-20',
                  'fecha_fin' => '2024-11-01',
              ],
              /********************************
                ***** PROYECTO : WEBINARS *****
                *******************************/
              /* - DP: Jeoselyn Maribel Espejo Rodriguez  */
              [
                'area' => NULL,
                'nombre' => 'WEBINARS',
                'imagen_logo' => 'fotos_logos/WEBINARS PRIMERA EDICIÓN.png',
                'fecha_inicio' => '2024-07-10',
                'fecha_fin' => '2024-10-28',
              ],
              /********************************
                ***** PROYECTO : CONCEPMI *****
                *******************************/
              /* - DP: Anahy Estrella Cruz Ulloa  */
              [
                'area' => NULL,
                'nombre' => 'CONCEPMI',
                'imagen_logo' => 'fotos_logos/CONCEPMI.png',
                'fecha_inicio' => '2024-03-22',
                'fecha_fin' => '2024-12-01',
              ],
              /**************************************
                **** PROYECTO : NAVISEDIPRO 8.0 *****
                **************************************/
              /* - DP: Alexandra Brighit Valverde Escobar 
                 - CO-DP: Jhosmel Anderson Vigo Cepeda */
              [
                'area' => NULL,
                'nombre' => 'NAVISEDIPRO 8.0',
                'imagen_logo' => 'fotos_logos/NAVISEDIPRO 8.0.png',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2024-12-25',
              ],
              /**************************************
                ***** PROYECTO : OLIMPOKAMPING ******
                ***************************************/
              /* - DP: Diego Jesús Rodriguez Sabana  
                 - DP: Kevin Gamaliel Rodriguez Alfaro 
                 - CO-DP: Silvana Valeria Pereda Llave  
                 - CO-DP: María Celine Huamán Martínez */
              [
                'area' => NULL,
                'nombre' => 'OLIMPOKAMPING',
                'imagen_logo' => 'fotos_logos/OLIMPOKAMPING.png',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-02-27',
              ],
              /************************************************
                ******* PROYECTO : PROYECTANDO VOCACIONES *******
                ***************************************************/
              /* - DP: Lucía de Fátima Amaya Cáceda  */
              [
                'area' => NULL,
                'nombre' => 'PROYECTANDO VOCACIONES',
                'imagen_logo' => 'fotos_logos/PROYECTANDO VOCACIONES.png',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-03-08',
              ],
              /**************************************
                ***** PROYECTO : SEDIAWARDS ******
                ***************************************/
              /* - DP: José Daniel Avila Santillan  */
              [
                'area' => NULL,
                'nombre' => 'SEDIAWARDS',
                'imagen_logo' => 'fotos_logos/SEDIAWARDS.png',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-03-08',
              ],
              /******************************************************
                ***** PROYECTO : CONCURSO DE MARKETING 2024 *********
                *****************************************************/
              /* - DP: José Efrain Calle Gutierrez  */
              [
                'area' => 'MKT',
                'nombre' => 'CONCURSO DE MARKETING 2024',
                'imagen_logo' => 'fotos_logos/CONCURSO DE MARKETING 2024.png',
                'fecha_inicio' => '2024-07-17',
                'fecha_fin' => '2024-10-30',
              ],

            /************************************
              ********* PROYECTOS 2025 **********
              *********************************** */
              /*************************************
                ****** PROYECTO : SediTalks ********
                *************************************/
              /* - DP: Daniel Angel Sanchez Cabrera  */
              [
                'area' => NULL,
                'nombre' => 'SEDITALKS',
                'imagen_logo' => 'fotos_logos/SEDITALKS.png',
                'fecha_inicio' => '2025-05-18',
                'fecha_fin' => '2025-07-31',
              ],
              /*************************************
                ****** PROYECTO : SediPatitas ********
                *************************************/
              /* - DP: Maria Celine Huaman Martinez  */
              [
                'area' => NULL,
                'nombre' => 'SediPatitas',
                'imagen_logo' => 'fotos_logos/SediPatitas.png',
                'fecha_inicio' => '2025-05-18',
                'fecha_fin' => '2025-08-08',
              ],
              /*************************************
                ****** PROYECTO : Amigos de la Tecnología ********
                *************************************/
              /* - DP: Dalery Nicoll Alayo Sifuentes  */
              [
                'area' => NULL,
                'nombre' => 'Amigos de la Tecnología',
                'imagen_logo' => 'fotos_logos/Amigos de la Tecnología.png',
                'fecha_inicio' => '2025-05-18',
                'fecha_fin' => '2025-07-12',
              ],
              
              /**************************************
                **** PROYECTO : NAVISEDIPRO 9.0 *****
                **************************************/
              /* - DP: Angela Xiomara Loayza Gutierrez  */
              [
                  'area' => NULL,
                  'nombre' => 'NAVISEDIPRO 9.0',
                  'imagen_logo' => 'fotos_logos/NAVISEDIPRO 9.0.png',
                  'fecha_inicio' => '2025-10-22',
                  'fecha_fin' => NULL,
              ],
              /**************************************************
                ****** PROYECTO : Gestión de Proyectos 360 ******
                *************************************************/
              /* - DP: José Daniel Avila Santillan  */
              [
                'area' => NULL,
                'nombre' => 'Gestión de Proyectos 360',
                'imagen_logo' => 'fotos_logos/Gestión de Proyectos 360.png',
                'fecha_inicio' => '2025-10-22',
                'fecha_fin' => NULL,
              ],
              /**************************************************
                ****** PROYECTO : CHEQUEATE UNT ******
                *************************************************/
              /* - DP: Nashaly Nicolle Alama Terrones  */
              [
                'area' => NULL,
                'nombre' => 'CHEQUEATE UNT',
                'imagen_logo' => 'fotos_logos/CHEQUEATE UNT.png',
                'fecha_inicio' => '2025-10-22',
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
