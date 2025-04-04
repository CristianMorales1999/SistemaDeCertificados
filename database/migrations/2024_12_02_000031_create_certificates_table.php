<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id(); // Clave primaria (id auto-incremental)

            // Claves foráneas
            $table->foreignId('person_id')
                  ->constrained('people')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->foreignId('certification_group_id')
                  ->constrained('certification_groups')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->foreignId('certificate_status_id')
                  ->constrained('certificate_statuses')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            // Campos adicionales
            $table->string('code', 100)->unique();
            $table->timestamps();

            // Índices adicionales
            $table->unique(['person_id', 'certification_group_id']); // Restricción de unicidad
            $table->index('code'); // Índice en el código del certificado
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
