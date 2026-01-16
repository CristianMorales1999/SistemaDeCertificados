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
        Schema::create('area_persona_valor_destacado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_persona_id')
                ->constrained('area_persona')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('valor_destacado_id')
                ->constrained('valores_destacados')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->year('anio');
            $table->enum('periodo',['I','II']);
            $table->boolean('estado_certificacion')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_persona_valor_destacado');
    }
};
