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
        Schema::create('entidades_aliadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargo_representante_id')
                ->nullable()
                ->constrained('cargos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('nombre',255)->unique();
            $table->string('acronimo',15)->unique()->nullable();
            $table->timestamps();
            $table->index('nombre');
            $table->index('acronimo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades_aliadas');
    }
};
