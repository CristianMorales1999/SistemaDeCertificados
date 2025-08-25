<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('area_persona_cargo', function (Blueprint $table) {
            $table->foreign('proyecto_coordinado_id')
                ->references('id')
                ->on('proyectos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('area_persona_cargo', function (Blueprint $table) {
            $table->dropForeign(['proyecto_coordinado_id']);
        });
    }
};
