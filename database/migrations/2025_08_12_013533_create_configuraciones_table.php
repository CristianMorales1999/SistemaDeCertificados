<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();

            /**  Versión corta de definición de claves foráneas pero sin opción de personalizar nombres cortos para claves foráneas
            $table->foreignId('grupo_de_certificacion_id')
                ->constrained('grupos_de_certificacion')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('seccion_de_informacion_id')
                ->constrained('secciones_de_informacion')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('fuente_id')
                ->constrained('fuentes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            */

            //Alternativa para tabla pivote con clave primaria compuesta, nombres cortos para claves foráneas e índices
            // Definición de columnas
            $table->unsignedBigInteger('grupo_de_certificacion_id');
            $table->unsignedBigInteger('seccion_de_informacion_id');
            $table->unsignedBigInteger('fuente_id');

            // Foreign key con 'nombres cortos'
            $table->foreign('grupo_de_certificacion_id', 'configuraciones_grupo_de_certificacion_id_foreign')
                ->references('id')
                ->on('grupos_de_certificacion')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('seccion_de_informacion_id', 'configuraciones_seccion_de_informacion_id_foreign')
                ->references('id')
                ->on('secciones_de_informacion')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('fuente_id', 'configuraciones_fuente_id_foreign')
                ->references('id')
                ->on('fuentes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Resto de campos
            $table->unsignedInteger('tamanio_fuente')->default(16);
            $table->enum('estilo_fuente', [
                'Normal',
                'Negrita',
                'Cursiva',
                'Negrita Cursiva',
            ])->default('Normal');
            $table->enum('capitalizacion', [
                'Tipo oración',
                'Todo mayúscula',
                'Todo minúscula',
                'Mayúsculas primera letra de cada palabra', // Primera letra de cada palabra en mayúscula
                'Alternar mayúsculas y minúsculas',
            ])->default('Tipo oración');
            $table->string('color_inicial', 7)->default('#000000');
            $table->string('color_medio', 7)->nullable();
            $table->string('color_final', 7)->nullable();
            $table->timestamps();

            $table->unique(['grupo_de_certificacion_id', 'seccion_de_informacion_id'],'configuraciones_grupo_id_seccion_id_unique');//El nombre correcto según conveción debería ser 'configuraciones_grupo_de_certificacion_id_seccion_de_informacion_id_unique', pero como es muy largo, se acorta.

            $table->index('fuente_id','configuraciones_fuente_id_index');
            $table->index(['grupo_de_certificacion_id', 'seccion_de_informacion_id', 'fuente_id'],'configuraciones_grupo_id_seccion_id_fuente_id_index');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};
