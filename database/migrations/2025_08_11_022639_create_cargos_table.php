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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150)->unique();
            $table->string('nombre_femenino',150)->nullable()->unique();
            $table->boolean('cargo_interno')->default(true);
            $table->timestamps();
            $table->index('nombre');
            $table->index('nombre_femenino');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
