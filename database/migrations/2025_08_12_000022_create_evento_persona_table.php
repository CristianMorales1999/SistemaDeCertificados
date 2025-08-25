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
        Schema::create('evento_persona', function (Blueprint $table) {
            $table->foreignId('persona_id')
                ->constrained('personas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('evento_id')
                ->constrained('eventos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('rol',[
                'Ponente',
                'Participante'
            ])->default('Participante');
            $table->timestamps();
            $table->primary(['persona_id', 'evento_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_persona');
    }
};
