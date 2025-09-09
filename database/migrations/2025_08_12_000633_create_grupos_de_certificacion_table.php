<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupos_de_certificacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_de_certificacion_id')
                ->constrained('tipos_de_certificacion')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('imagen_plantilla_id')
                ->nullable()
                ->constrained('imagenes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('imagen_logo_sediprano_id')
                ->nullable()
                ->constrained('imagenes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('imagen_sello_id')
                ->nullable()
                ->constrained('imagenes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('proyecto_id')
                ->nullable()
                ->constrained('proyectos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('evento_id')
                ->nullable()
                ->constrained('eventos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('usuario_creador_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('usuario_generador_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('nombre',255)->unique();
            $table->text('descripcion')->nullable();
            $table->date('fecha_emision');
            $table->date('fecha_generacion')->nullable();
            $table->enum('estado',[
                'Pendiente',
                'Validado',
                'Rechazado',
                'Generado',
                'Anulado'
            ])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos_de_certificacion');
    }
};
