<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificado;
use App\Models\GrupoDeCertificacion;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CertificadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener grupos de certificación y personas
        $grupos = GrupoDeCertificacion::all();
        $personas = Persona::all();

        if ($grupos->isEmpty()) {
            $this->command->error('No hay grupos de certificación. Crea primero algunos grupos.');
            return;
        }

        if ($personas->isEmpty()) {
            $this->command->error('No hay personas en la base de datos.');
            return;
        }

        $certificados = [];
        $codigosGenerados = [];

        foreach ($grupos as $grupo) {
            // Cada grupo tendrá certificados para algunas personas (50-80% de las personas)
            $cantidadPersonas = intval($personas->count() * (rand(50, 80) / 100));
            $personasSeleccionadas = $personas->random($cantidadPersonas);

            foreach ($personasSeleccionadas as $persona) {
                // Generar un código único para el certificado
                do {
                    $codigo = strtoupper(Str::random(8));
                } while (in_array($codigo, $codigosGenerados));

                $codigosGenerados[] = $codigo;

                $certificados[] = [
                    'persona_id' => $persona->id,
                    'grupo_de_certificacion_id' => $grupo->id,
                    'codigo_de_verificacion' => $codigo,
                    'fecha_emision' => now()->subDays(rand(0, 90)), // Certificados emitidos en los últimos 90 días
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insertar todos los certificados
        if (!empty($certificados)) {
            // Insertar en lotes para evitar problemas de memoria
            $chunks = array_chunk($certificados, 100);

            foreach ($chunks as $chunk) {
                Certificado::insert($chunk);
            }

            $this->command->info('Se han creado ' . count($certificados) . ' certificados.');

            // Mostrar estadísticas por grupo
            foreach ($grupos as $grupo) {
                $count = Certificado::where('grupo_de_certificacion_id', $grupo->id)->count();
                $this->command->info("Grupo '{$grupo->nombre}': {$count} certificados generados");
            }
        }
    }
}
