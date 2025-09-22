<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GrupoDeCertificacion;
use App\Models\TipoDeCertificacion;

class GrupoCertificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Solo crear grupos de certificación usando tipos existentes
        $tiposDeCertificacion = TipoDeCertificacion::take(4)->get();

        if ($tiposDeCertificacion->count() == 0) {
            $this->command->error('No hay tipos de certificación disponibles. Ejecute primero los seeders base.');
            return;
        }

        // Obtener un usuario para asignar como creador
        $usuarioCreador = \App\Models\User::first();
        if (!$usuarioCreador) {
            $this->command->error('No hay usuarios disponibles. Cree al menos un usuario primero.');
            return;
        }

        $gruposData = [
            [
                'nombre' => 'Certificados Conferencia Anual 2024',
                'descripcion' => 'Certificados para participantes de la conferencia anual SEDIPRANO 2024',
                'fecha_emision' => '2024-11-15',
                'tipo_de_certificacion_id' => $tiposDeCertificacion->first()->id,
                'usuario_creador_id' => $usuarioCreador->id,
            ],
            [
                'nombre' => 'Reconocimiento Líderes Comunitarios',
                'descripcion' => 'Certificados de reconocimiento para líderes destacados en la comunidad',
                'fecha_emision' => '2024-10-20',
                'tipo_de_certificacion_id' => $tiposDeCertificacion->skip(1)->first()->id,
            ],
            [
                'nombre' => 'Capacitación en Liderazgo Juvenil',
                'descripcion' => 'Certificados para jóvenes que completaron el programa de liderazgo',
                'fecha_emision' => '2024-09-15',
                'tipo_de_certificacion_id' => $tiposDeCertificacion->skip(2)->first()->id,
            ],
            [
                'nombre' => 'Voluntariado Social 2024',
                'descripcion' => 'Certificados para voluntarios destacados en proyectos sociales',
                'fecha_emision' => '2024-12-01',
                'tipo_de_certificacion_id' => $tiposDeCertificacion->skip(3)->first()->id,
            ],
            [
                'nombre' => 'Participación Taller Innovación',
                'descripcion' => 'Para participantes del taller de innovación tecnológica',
                'fecha_emision' => '2024-08-30',
                'tipo_de_certificacion_id' => $tiposDeCertificacion->first()->id,
            ]
        ];

        foreach ($gruposData as $grupoData) {
            $grupoData['usuario_creador_id'] = $usuarioCreador->id;
            GrupoDeCertificacion::create($grupoData);
        }

        $this->command->info('✅ Se crearon ' . count($gruposData) . ' grupos de certificación de ejemplo exitosamente!');
        $this->command->info('📊 Total de grupos ahora: ' . GrupoDeCertificacion::count());
    }
}
