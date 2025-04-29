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
        Schema::create('certification_group_image', function (Blueprint $table) {
            // Definir la columna 'certification_group_id' como clave foránea
            $table->foreignId('certification_group_id')
                  ->constrained('certification_groups')  // Relación con la tabla 'certification_groups'
                  ->onDelete('cascade')   // Eliminar en cascada
                  ->onUpdate('cascade');  // Actualizar en cascada

            // Definir la columna 'image_id' como clave foránea
            $table->foreignId('image_id')
                  ->constrained('images')  // Relación con la tabla 'images'
                  ->onDelete('cascade')   // Eliminar en cascada
                  ->onUpdate('cascade');  // Actualizar en cascada

            // Definir la clave primaria compuesta para 'image_id' y 'certification_group_id'
            $table->primary(['image_id', 'certification_group_id']);
            $table->index('image_id');  // Agregar un índice en 'image_id' para mejorar las búsquedas
            $table->index('certification_group_id');  // Agregar un índice en 'certification_group_id' para mejorar las búsquedas
            
            $table->timestamps(); // 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certification_group_image');
    }
};
