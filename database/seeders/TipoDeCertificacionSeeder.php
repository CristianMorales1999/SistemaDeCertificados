<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoDeCertificacion;

class TipoDeCertificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposDeCertificacion = [
            [
                'nombre' => 'Certificado de Egresado',
                'descripcion' => 'Certificado otorgado a los egresados de la institución.',
                'codigo' => 'EGR'
            ],
            [
                'nombre' => 'Certificado de Retiro Voluntario',
                'descripcion' => 'Certificado otorgado a los estudiantes que han decidido retirarse voluntariamente de la institución.',
                'codigo' => 'RV'
            ],
            [
                'nombre' => 'Certificado de Directiva',
                'descripcion' => 'Certificado otorgado a los miembros de la directiva de la sección estudiantil.',
                'codigo' => 'DIR'
            ],
            [
                'nombre' => 'Certificado de Director de Proyecto',
                'descripcion' => 'Certificado otorgado al director de un proyecto específico.',
                'codigo' => 'DP'
            ],
            [
                'nombre' => 'Certificado de Co-Director de Proyecto',
                'descripcion' => 'Certificado otorgado al co-director de un proyecto específico.',
                'codigo' => 'CODP'
            ],
            [
                'nombre' => 'Certificado de Coordinador de Proyecto',
                'descripcion' => 'Certificado otorgado a los coordinadores de un proyecto específico.',
                'codigo' => 'CORDP'
            ],
            [
                'nombre' => 'Certificado de Miembros Internos del Proyecto',
                'descripcion' => 'Certificado otorgado a los miembros internos de un proyecto específico.',
                'codigo' => 'MIP'
            ],
            [
                'nombre' => 'Certificado de Miembros Externos del Proyecto',
                'descripcion' => 'Certificado otorgado a los miembros externos de un proyecto específico.',
                'codigo' => 'MEP'
            ],
            [
                'nombre' => 'Certificado de Staff Interno de Apoyo de Proyecto',
                'descripcion' => 'Certificado otorgado al staff de apoyo interno de un proyecto específico.',
                'codigo' => 'SIAP'
            ],
            [
                'nombre' => 'Certificado de Staff Externo de Apoyo de Proyecto',
                'descripcion' => 'Certificado otorgado al staff de apoyo externo de un proyecto específico.',
                'codigo' => 'SEAP'
            ],
            [
                'nombre' => 'Certificado de Participación como Ponente de Eventos Generales de SEDIPRO UNT',
                'descripcion' => 'Certificado otorgado a los ponentes que participan en eventos generales organizados por SEDIPRO UNT.',
                'codigo' => 'PONEG'

            ],
            [
                'nombre' => 'Certificado de Participación como Ponente para Proyecto',
                'descripcion' => 'Certificado otorgado a los ponentes que participan en eventos específicos de un proyecto.',
                'codigo' => 'PONP'
            ],
            [
                //Eventos generales se refiere a 'Talleres', 'Capacitaciones', 'Conferencias', 'Webinars', etc.
                'nombre' => 'Certificado de Participación en Evento General de SEDIPRO UNT',
                'descripcion' => 'Certificado otorgado a los participantes que asisten a eventos generales organizados por SEDIPRO UNT.',
                'codigo' => 'PAREVG'
            ],
            [
                //Eventos de proyecto se refiere a los mismo eventos generales pero organizados para un proyecto específico.
                'nombre' => 'Certificado de Participación en Evento de Proyecto',
                'descripcion' => 'Certificado otorgado a los participantes que asisten a eventos específicos de un proyecto.',
                'codigo' => 'PAREVP'
            ],
            [
                //Colaboradores son aquellos que ayudan en la ejecución del proyecto, pero no son miembros formales del mismo.
                'nombre' => 'Certificado de Participación en Ejecución de Proyecto',
                'descripcion' => 'Certificado otorgado a los participantes que colaboran en la ejecución de un proyecto específico.',
                'codigo' => 'PAREJP'
            ],
            [
                'nombre' => 'Certificado de Valores Destacados',
                'descripcion' => 'Certificado otorgado a los estudiantes que han demostrado valores destacados durante un determinado periodo de tiempo en la sección estudiantil.',
                'codigo' => 'VD'
            ]
        
        ];
        
        
        foreach ($tiposDeCertificacion as $tipoDeCertificacion) {
            TipoDeCertificacion::create($tipoDeCertificacion);
        }
    }
}
