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
            [
                //DP: SEDITALKS
                'area' => 'PMO',
                'correo_persona' => 'dasanchezca@unitru.edu.pe',//Daniel Angel Sanchez Cabrera
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'SEDITALKS',
                'fecha_inicio' => '2025-05-18',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DP: SediPatitas
                'area' => 'PMO',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',//Maria Celine Huaman Martinez
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'SediPatitas',
                'fecha_inicio' => '2025-05-18',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DP: Amigos de la Tecnología
                'area' => 'PMO',
                'correo_persona' => 'dnalayosi@unitru.edu.pe',//Dalery Nicoll Alayo Sifuentes
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'Amigos de la Tecnología',
                'fecha_inicio' => '2025-05-18',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DP: NAVISEDIPRO 9.0
                'area' => 'PMO',
                'correo_persona' => 'axloayzag@unitru.edu.pe',//Angela Xiomara Loayza Gutierrez
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'NAVISEDIPRO 9.0',
                'fecha_inicio' => '2025-10-22',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DP: Gestión de Proyectos 360
                'area' => 'GTH',
                'correo_persona' => 'jdavilas@unitru.edu.pe',//José Daniel Avila Santillan
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'Gestión de Proyectos 360',
                'fecha_inicio' => '2025-10-22',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            [
                //DP: CHEQUEATE UNT
                'area' => 'GTH',
                'correo_persona' => 'nalama@unitru.edu.pe',//Nashaly Nicolle Alama Terrones
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'CHEQUEATE UNT',
                'fecha_inicio' => '2025-10-22',
                'fecha_fin' => NULL,
                'estado' =>'Cargo activo',
            ],
            /************************************
              ********* PROYECTOS 2024 **********
              *********************************** */
            [
                //DP: IPMC
                'area' => 'PMO',
                'correo_persona' => 't450100220@unitru.edu.pe',//Giancarlo José Benavides Rodriguez
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'IPMC',
                'fecha_inicio' => '2024-04-18',
                'fecha_fin' => '2024-09-08',
                'estado' =>'Cargo finalizado',
            ],
            [
                //CO-DP: IPMC
                'area' => 'PMO',
                'correo_persona' => 'mfherrerace@unitru.edu.pe',//Maria Fernanda de la Caridad Herrera Cerquín
                'cargo' => 'Codirector de Proyecto',
                'proyecto' => 'IPMC',
                'fecha_inicio' => '2024-04-18',
                'fecha_fin' => '2024-09-08',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: RENACER
                'area' => 'GTH',
                'correo_persona' => 't028100120@unitru.edu.pe',//Lesly Fiorella Pérez Rodríguez
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'RENACER',
                'fecha_inicio' => '2024-08-20',
                'fecha_fin' => '2024-10-30',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: MIS AMIGOS LOS LIBROS
                'area' => 'GTH',
                'correo_persona' => 't1510600121@unitru.edu.pe',//Marina Lizeth Gonzales Torres
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'MIS AMIGOS LOS LIBROS',
                'fecha_inicio' => '2024-08-20',
                'fecha_fin' => '2024-10-31',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: PROYECTATE COMO CAPM
                'area' => 'PMO',
                'correo_persona' => 't050100720@unitru.edu.pe',//Aitana Sofía Requejo Valle
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'PROYECTATE COMO CAPM',
                'fecha_inicio' => '2024-08-20',
                'fecha_fin' => '2024-11-01',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: WEBINARS
                'area' => 'PMO',
                'correo_persona' => 'jespejor@unitru.edu.pe',//Jeoselyn Maribel Espejo Rodriguez
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'WEBINARS',
                'fecha_inicio' => '2024-07-10',
                'fecha_fin' => '2024-10-28',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: CONCEPMI
                'area' => 'LTK & FNZ',
                'correo_persona' => 't053300720@unitru.edu.pe',//Anahy Estrella Cruz Ulloa
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'CONCEPMI',
                'fecha_inicio' => '2024-03-22',
                'fecha_fin' => '2024-12-01',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: NAVISEDIPRO 8.0
                'area' => 'TI',
                'correo_persona' => 'avelarde@unitru.edu.pe',//Alexandra Brighit Valverde Escobar
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'NAVISEDIPRO 8.0',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2024-12-25',
                'estado' =>'Cargo finalizado',
            ],
            [
                //CO-DP: NAVISEDIPRO 8.0
                'area' => 'TI',
                'correo_persona' => 't1511601421@unitru.edu.pe',//Jhosmel Anderson Vigo Cepeda
                'cargo' => 'Codirector de Proyecto',
                'proyecto' => 'NAVISEDIPRO 8.0',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2024-12-25',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: OLIMPOKAMPING
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1010100421@unitru.edu.pe',//Diego Jesús Rodriguez Sabana
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'OLIMPOKAMPING',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-02-27',
                'estado' =>'Cargo finalizado',
            ],
            [
                //CO-DP: OLIMPOKAMPING
                'area' => 'LTK & FNZ',
                'correo_persona' => 't1510101021@unitru.edu.pe',//Kevin Gamaliel Rodriguez Alfaro
                'cargo' => 'Codirector de Proyecto',
                'proyecto' => 'OLIMPOKAMPING',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-02-27',
                'estado' =>'Cargo finalizado',
            ],
            [
                //CO-DP: OLIMPOKAMPING
                'area' => 'GTH',
                'correo_persona' => 'speredal@unitru.edu.pe',//Silvana Valeria Pereda Llave
                'cargo' => 'Codirector de Proyecto',
                'proyecto' => 'OLIMPOKAMPING',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-02-27',
                'estado' =>'Cargo finalizado',
            ],
            [
                //CO-DP: OLIMPOKAMPING
                'area' => 'PMO',
                'correo_persona' => 'mhuamanm@unitru.edu.pe',//María Celine Huamán Martínez
                'cargo' => 'Codirector de Proyecto',
                'proyecto' => 'OLIMPOKAMPING',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-02-27',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: PROYECTANDO VOCACIONES
                'area' => 'PMO',
                'correo_persona' => 't1051300621@unitru.edu.pe',//Lucía de Fátima Amaya Cáceda
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'PROYECTANDO VOCACIONES',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-03-08',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: SEDIAWARDS
                'area' => 'GTH',
                'correo_persona' => 'jdavilas@unitru.edu.pe',//José Daniel Avila Santillan
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'SEDIAWARDS',
                'fecha_inicio' => '2024-12-12',
                'fecha_fin' => '2025-03-08',
                'estado' =>'Cargo finalizado',
            ],
            [
                //DP: CONCURSO DE MARKETING 2024
                'area' => 'MKT',
                'correo_persona' => 't010101220@unitru.edu.pe',//José Efrain Calle Gutierrez
                'cargo' => 'Director de Proyecto',
                'proyecto' => 'CONCURSO DE MARKETING 2024',
                'fecha_inicio' => '2024-07-17',
                'fecha_fin' => '2024-10-30',
                'estado' =>'Cargo finalizado',
            ],
        ];

        foreach( $personasConCargo as $personaConCargo){
            $idArea=Area::where('abreviatura', $personaConCargo['area'])->first()->id;
            $idPersona = Persona::where('correo_institucional', $personaConCargo['correo_persona'])->first()->id;

            if($idArea!=NULL && $idPersona!=NULL){
                // Buscar el registro de area_persona que corresponde a esta combinación
                // Buscamos el registro más reciente que coincida con el área y persona
                // Si hay múltiples registros (cambios de área), tomamos el que esté activo en la fecha del cargo
                $areaPersona = AreaPersona::where('area_id', $idArea)
                    ->where('persona_id', $idPersona)
                    ->where('fecha_inicio', '<=', $personaConCargo['fecha_inicio'])
                    ->where(function($query) use ($personaConCargo) {
                        $query->whereNull('fecha_fin')
                              ->orWhere('fecha_fin', '>=', $personaConCargo['fecha_inicio']);
                    })
                    ->orderBy('fecha_inicio', 'desc')
                    ->first();
                
                // Si no encontramos uno que coincida con las fechas, buscamos el más reciente sin restricción de fechas
                if(!$areaPersona){
                    $areaPersona = AreaPersona::where('area_id', $idArea)
                        ->where('persona_id', $idPersona)
                        ->orderBy('fecha_inicio', 'desc')
                        ->first();
                }

                if($areaPersona){
                    //imprimir el area y la persona
                    echo "Area: ".$personaConCargo['area']." - Persona: ".$personaConCargo['correo_persona']."\n";
                    
                    unset($personaConCargo['area']);
                    unset($personaConCargo['correo_persona']);

                    $personaConCargo['area_persona_id'] = $areaPersona->id;
                    $personaConCargo['cargo_id']=Cargo::where('nombre', $personaConCargo['cargo'])->first()->id;
                    unset($personaConCargo['cargo']);

                    if($personaConCargo['proyecto']!=NULL){
                        $personaConCargo['proyecto_id']=Proyecto::where('nombre', $personaConCargo['proyecto'])->first()->id;
                    }else{
                        $personaConCargo['proyecto_id']=NULL;
                    }
                    unset($personaConCargo['proyecto']);
                    AreaPersonaCargo::create($personaConCargo);
                } else {
                    echo "ERROR: No se encontró registro de area_persona para Area: ".$personaConCargo['area']." - Persona: ".$personaConCargo['correo_persona']."\n";
                }
            } else {
                echo "ERROR: No se encontró Area o Persona para Area: ".$personaConCargo['area']." - Persona: ".$personaConCargo['correo_persona']."\n";
            }
        }
    }
}
