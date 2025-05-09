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
        Schema::create('area_person_project', function (Blueprint $table) {
            // Claves foráneas
            $table->foreignId('area_id');
            $table->foreignId('person_id');
            $table->foreign(['person_id', 'area_id'])
                  ->references(['person_id', 'area_id'])
                  ->on('area_person')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->foreignId('project_id')
                  ->constrained('projects')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            // Llave primaria compuesta
            $table->primary(['person_id', 'area_id', 'project_id']);

            $table->index(['person_id', 'area_id']);  // Agregar un índice en 'person_id' y 'area_id' para mejorar las búsquedas
            $table->index('project_id');    // Agregar un índice en 'project_id' para mejorar las búsquedas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_person_project');
    }
};
