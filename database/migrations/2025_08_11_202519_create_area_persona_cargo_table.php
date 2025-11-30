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
        Schema::create('area_persona_cargo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_persona_id')
                ->constrained('area_persona')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('cargo_id')
                ->constrained('cargos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('proyecto_id')
                ->nullable()
                ->constrained('proyectos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('estado',[
                'Cargo activo',
                'Cambio de cargo',
                'Retiro voluntario de cargo',
                'Retiro de cargo por bajo rendimiento',
                'Cargo finalizado'
            ])->default('Cargo activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_persona_cargo');
    }
};
