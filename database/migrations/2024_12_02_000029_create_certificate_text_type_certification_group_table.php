<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cert_text_type_cert_group', function (Blueprint $table) {
            // Claves primarias compuestas
            $table->foreignId('certificate_text_type_id');
            $table->foreignId('certification_group_id');
            $table->foreignId('font_configuration_id');


            // Claves foráneas
            $table->foreign('certificate_text_type_id')
                  ->references('id')
                  ->on('certificate_text_types')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreign('certification_group_id')
                  ->references('id')
                  ->on('certification_groups')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();


            $table->foreign('font_configuration_id')
                  ->references('id')
                  ->on('font_configurations')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            // Clave primaria compuesta
            $table->primary(['certificate_text_type_id', 'certification_group_id']);

            $table->timestamps(); // created_at y updated_at

            // Índices adicionales
            $table->index('certificate_text_type_id');
            $table->index('certification_group_id');
            $table->index('font_configuration_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cert_text_type_cert_group');
    }
};
