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
        Schema::create('area_persona_proyecto', function (Blueprint $table) {
            $table->foreignId('area_persona_id')
                ->constrained('area_persona')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('proyecto_id')
                ->constrained('proyectos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('rol',[
                'Miembro',
                'Staff de apoyo'
            ])->default('Miembro');
            $table->timestamps();
            $table->primary(['area_persona_id','proyecto_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_persona_proyecto');
    }
};
