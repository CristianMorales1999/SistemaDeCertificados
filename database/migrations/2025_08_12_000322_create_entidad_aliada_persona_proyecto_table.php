<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entidad_aliada_persona_proyecto', function (Blueprint $table) {
            // Definimos columnas
            $table->unsignedBigInteger('entidad_aliada_persona_id');
            $table->unsignedBigInteger('proyecto_id');

            // Foreign key con nombre corto para evitar el límite de 64 caracteres
            $table->foreign('entidad_aliada_persona_id', 'fk_eap_proy_eap_id')
                ->references('id')
                ->on('entidad_aliada_persona')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('proyecto_id', 'fk_eap_proy_proy_id')
                ->references('id')
                ->on('proyectos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->enum('rol', [
                'Miembro externo',
                'Staff de apoyo externo'
            ])->default('Miembro externo');

            $table->timestamps();

            // Clave primaria compuesta
            $table->primary(['entidad_aliada_persona_id', 'proyecto_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entidad_aliada_persona_proyecto');
    }
};
