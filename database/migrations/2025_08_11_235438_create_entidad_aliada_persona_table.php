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
        Schema::create('entidad_aliada_persona', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entidad_aliada_id')
                ->constrained('entidades_aliadas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('persona_id')
                ->constrained('personas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->enum('rol',['Miembro','Representante'])->default('Miembro');
            $table->enum('estado',[
                'Activo',
                'Cambio de rol',
                'Retirado'
            ])->default('Activo');
            $table->unique(['persona_id', 'entidad_aliada_id', 'rol'],'entidad_aliada_persona_persona_id_entidad_aliada_id_rol_unique');//Índice para evitar duplicados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidad_aliada_persona');
    }
};
