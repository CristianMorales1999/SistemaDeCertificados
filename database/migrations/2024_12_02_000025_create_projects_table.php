<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id_dp');
            $table->unsignedBigInteger('person_id_dp');
            $table->unsignedBigInteger('area_id_codp')->nullable();
            $table->unsignedBigInteger('person_id_codp')->nullable();
            $table->string('name', 300);
            $table->timestamps();
        
            $table->foreign(['person_id_dp', 'area_id_dp'])
                  ->references(['person_id', 'area_id'])
                  ->on('area_person')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
        
            $table->foreign(['person_id_codp', 'area_id_codp'])
                  ->references(['person_id', 'area_id'])
                  ->on('area_person')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
