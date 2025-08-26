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
        Schema::create('area_persona', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')
                ->constrained('areas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('persona_id')
                ->constrained('personas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado_inicial',[
                'Miembro activo',
                'Cambio de área',
                'Cargo en Directiva',
                'Retiro voluntario',
                'Retiro por bajo rendimiento',
                'Egresado',
            ])->default('Miembro activo');
            $table->enum('estado_final', [
                'Miembro activo',
                'Cambio de área',
                'Cargo en Directiva',
                'Retiro voluntario',
                'Retiro por bajo rendimiento',
                'Egresado',
            ])->nullable()->default(null);
            $table->timestamps();
            // Índices para optimizar consultas
            $table->index('area_id');
            $table->index('persona_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_persona');
    }
};
