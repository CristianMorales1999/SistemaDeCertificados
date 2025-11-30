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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',150);
            $table->string('apellidos',150);
            $table->string('codigo',20)->nullable();// Alternado de letra y número con la primera letra de cada nombre y apellido, donde las posiciones pares son letras y las impares son números, y donde el número corresponde a la posición del carácter en el alfabeto (A=1, B=2, ..., Ñ=15, ..., Y=26, Z=27).
            $table->string('correo_personal',150)->nullable()->unique();
            $table->string('correo_institucional',150)->nullable()->unique();
            $table->enum('sexo',[
                'Masculino',
                'Femenino'
            ]);
            $table->string('imagen_firma',300)->nullable();// Ruta de la imagen de la firma digitalizada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
