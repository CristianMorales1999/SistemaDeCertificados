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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_persona_cargo_id_dp')
                ->constrained('area_persona_cargo')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('area_persona_cargo_id_codp')
                ->nullable()
                ->constrained('area_persona_cargo')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            //area_id en caso se realice un proyecto de un area en especifico
            $table->foreignId('area_id')
                ->nullable()
                ->constrained('areas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('nombre',150)->unique();
            $table->string('imagen_logo',300)->nullable(); // Ruta de la imagen del logo del proyecto
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
