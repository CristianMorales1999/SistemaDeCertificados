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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->string('ruta',255)->unique();
            $table->enum('tipo',[
                'Firma',
                'Logo',
                'Perfil',
                'Plantilla',
                'Sello'
            ]);
            $table->string('extension',10)->nullable();
            $table->enum('estado',[
                'Pendiente',
                'Validada',
                'Rechazada',
                'Lista',
                'Archivada',
                'Eliminada'
            ])->default('Lista');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
