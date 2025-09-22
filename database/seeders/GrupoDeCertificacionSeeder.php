<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GrupoDeCertificacion;
use App\Models\Proyecto;
use App\Models\TipoDeCertificacion;
use App\Models\Imagen;
use App\Models\User;
use Carbon\Carbon;

class GrupoDeCertificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * ⚠️ SEEDER PROVISIONAL PARA PRUEBAS - REEMPLAZAR CON DATOS REALES
     * Este seeder genera grupos de certificación asociados a los proyectos
     * de prueba para poder probar la funcionalidad completa del sistema.
     */
    public function run(): void
    {
        // Verificar que existan los datos necesarios
        $proyectos = Proyecto::all();
        $tiposCertificacion = TipoDeCertificacion::all();
        $plantillas = Imagen::where('tipo', 'Plantilla')->get();
        $primerUsuario = User::first();

        if ($proyectos->isEmpty() || $tiposCertificacion->isEmpty() || !$primerUsuario) {
            $this->command->warn('No hay datos base suficientes. Ejecuta los seeders de proyectos y tipos de certificación primero.');
            return;
        }

        // GRUPO 1: Certificado de Participación en Taller de Gestión de Proyectos
        $grupo1 = GrupoDeCertificacion::create([
            'tipo_de_certificacion_id' => $tiposCertificacion->first()->id,
            'imagen_plantilla_id' => $plantillas->isNotEmpty() ? $plantillas->first()->id : null,
            'proyecto_id' => $proyectos->first()->id,
            'usuario_creador_id' => $primerUsuario->id,
            'nombre' => 'Certificados - ' . $proyectos->first()->nombre,
            'descripcion' => 'Certificados de participación para el taller de gestión de proyectos con metodologías ágiles',
            'fecha_emision' => Carbon::now()->subDays(25),
            'estado' => 'Validado'
        ]);

        // GRUPO 2: Certificado de Liderazgo
        if ($proyectos->count() > 1 && $tiposCertificacion->count() > 1) {
            $grupo2 = GrupoDeCertificacion::create([
                'tipo_de_certificacion_id' => $tiposCertificacion->skip(1)->first()->id,
                'imagen_plantilla_id' => $plantillas->isNotEmpty() && $plantillas->count() > 1 ?
                                       $plantillas->skip(1)->first()->id :
                                       ($plantillas->isNotEmpty() ? $plantillas->first()->id : null),
                'proyecto_id' => $proyectos->skip(1)->first()->id,
                'usuario_creador_id' => $primerUsuario->id,
                'nombre' => 'Certificados - ' . $proyectos->skip(1)->first()->nombre,
                'descripcion' => 'Certificados de participación en capacitación de liderazgo y trabajo en equipo',
                'fecha_emision' => Carbon::now()->subDays(10),
                'estado' => 'Validado'
            ]);
        }

        // GRUPO 3: Certificado de Seminario de Innovación
        if ($proyectos->count() > 2) {
            $tipoCertificacion = $tiposCertificacion->count() > 2 ?
                               $tiposCertificacion->skip(2)->first() : $tiposCertificacion->first();

            $grupo3 = GrupoDeCertificacion::create([
                'tipo_de_certificacion_id' => $tipoCertificacion->id,
                'imagen_plantilla_id' => $plantillas->isNotEmpty() && $plantillas->count() > 2 ?
                                       $plantillas->skip(2)->first()->id :
                                       ($plantillas->isNotEmpty() ? $plantillas->first()->id : null),
                'proyecto_id' => $proyectos->skip(2)->first()->id,
                'usuario_creador_id' => $primerUsuario->id,
                'nombre' => 'Certificados - ' . $proyectos->skip(2)->first()->nombre,
                'descripcion' => 'Certificados de participación en seminario de innovación tecnológica',
                'fecha_emision' => Carbon::now()->subDays(2),
                'estado' => 'Pendiente'
            ]);
        }

        $this->command->info('✅ Se crearon grupos de certificación asociados a los proyectos de prueba');
        $this->command->warn('⚠️  RECUERDA: Este es un seeder provisional. Reemplaza con datos reales.');
    }
}
