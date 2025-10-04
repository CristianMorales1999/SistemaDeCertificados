<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certificado;
use App\Models\GrupoDeCertificacion;
use App\Models\Persona;
use App\Models\AreaPersona;
use Illuminate\Support\Str;

class CertificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * ⚠️ SEEDER PROVISIONAL PARA PRUEBAS - REEMPLAZAR CON DATOS REALES
     * Este seeder crea certificados individuales para las personas asociadas
     * a los proyectos, vinculándolos con los grupos de certificación correspondientes.
     * IMPORTANTE: Los certificados se generan para las personas que participaron
     * en cada proyecto específico.
     */
    public function run(): void
    {
        /*
        // Verificar que existan grupos de certificación
        $grupos = GrupoDeCertificacion::with('proyecto.areaPersonas.persona')->get();

        if ($grupos->isEmpty()) {
            $this->command->warn('No hay grupos de certificación. Ejecuta el seeder de grupos primero.');
            return;
        }

        $totalCertificados = 0;

        foreach ($grupos as $grupo) {
            if (!$grupo->proyecto) {
                continue;
            }

            // Obtener las personas asociadas al proyecto de este grupo
            $personasDelProyecto = $grupo->proyecto->areaPersonas()
                ->with('persona')
                ->get();

            $this->command->info("📋 Procesando grupo: {$grupo->nombre}");
            $this->command->info("   Personas en el proyecto: {$personasDelProyecto->count()}");

            foreach ($personasDelProyecto as $areaPersona) {
                if (!$areaPersona->persona) {
                    continue;
                }

                $persona = $areaPersona->persona;

                // Verificar que no exista ya un certificado para esta persona y grupo
                $certificadoExistente = Certificado::where('persona_id', $persona->id)
                    ->where('grupo_de_certificacion_id', $grupo->id)
                    ->first();

                if ($certificadoExistente) {
                    continue; // Skip si ya existe
                }

                // Generar código único para el certificado
                $codigo = 'SEDIPRO-' . strtoupper(Str::random(3)) . '-' .
                         str_pad($grupo->id, 2, '0', STR_PAD_LEFT) . '-' .
                         str_pad($persona->id, 3, '0', STR_PAD_LEFT);

                // Crear el certificado
                Certificado::create([
                    'persona_id' => $persona->id,
                    'grupo_de_certificacion_id' => $grupo->id,
                    'codigo' => $codigo,
                    'ruta_codigo_qr' => null, // Se generará cuando se cree el PDF
                    'estado' => 'Generado' // Estados posibles: Pendiente, Generado, Enviado
                ]);

                $totalCertificados++;
            }

            $this->command->info("   ✅ Certificados creados para este grupo: " .
                               $grupo->certificados()->count());
        }

        $this->command->info("🎉 Total de certificados provisionales creados: {$totalCertificados}");
        $this->command->warn('⚠️  IMPORTANTE: Estos certificados están asociados a las personas que participaron en cada proyecto específico.');
        $this->command->warn('⚠️  RECUERDA: Este es un seeder provisional. Reemplaza con datos reales.');

        // Mostrar resumen por grupo
        $this->command->info("\n📊 RESUMEN POR GRUPO:");
        foreach ($grupos as $grupo) {
            $cantidadCertificados = $grupo->certificados()->count();
            $this->command->info("• {$grupo->nombre}: {$cantidadCertificados} certificados");
        }
        */
    }
}
