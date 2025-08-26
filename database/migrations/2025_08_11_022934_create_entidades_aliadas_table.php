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
            $table->string('nombre',255)->unique();
            $table->enum('cargo_de_representante',[
                'Presidente',
                'Director',
                'Jefe',
                'Sponsor'
            ])->default('Presidente');//nombre de atributo cambiado
            $table->timestamps();
            $table->index('nombre');
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
