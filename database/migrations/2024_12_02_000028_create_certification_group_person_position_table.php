<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cert_group_person_position', function (Blueprint $table) {
            // Claves foráneas
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('position_id');
            $table->foreign(['person_id', 'position_id'])
                  ->references(['person_id', 'position_id'])
                  ->on('person_position')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            
            $table->foreignId('certification_group_id')
                  ->constrained('certification_groups')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            // Llave primaria compuesta
            $table->primary(['person_id', 'position_id', 'certification_group_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cert_group_person_position');
    }
};
