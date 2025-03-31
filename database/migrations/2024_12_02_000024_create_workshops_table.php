<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id_dp');
            $table->foreignId('person_id_dp');
            $table->foreignId('area_id_codp')->nullable();
            $table->foreignId('person_id_codp')->nullable();
            $table->string('name', 300)->nullable();
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
        Schema::dropIfExists('workshops');
    }
};
