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
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')
                ->constrained('personas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('grupo_de_certificacion_id')
                ->constrained('grupos_de_certificacion')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('codigo',150);//Codigo que se vuelve unico al concatenar con el id del certificado
            $table->string('ruta_codigo_qr',255)->nullable();
            //$table->string('ruta_certificado',255)->nullable();//Este campo se ha eliminado porque no es necesario, ya que el certificado se genera dinámicamente.
            $table->enum('estado', [
                'Pendiente',
                'Validado',
                'Rechazado',
                'Generado',
                'Anulado',
            ])->default('Validado');
            $table->timestamps();
            $table->unique(['persona_id', 'grupo_de_certificacion_id'], 'certificados_persona_id_grupo_id_unique');
            $table->index('codigo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};
