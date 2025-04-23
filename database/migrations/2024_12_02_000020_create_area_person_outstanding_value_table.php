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
        Schema::create('area_person_outstanding_value', function (Blueprint $table) {
            $table->foreignId('area_id');
            $table->foreignId('person_id');
            $table->foreign(['person_id', 'area_id'])
                  ->references(['person_id', 'area_id'])
                  ->on('area_person')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('outstanding_value_id')
                  ->constrained('outstanding_values')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->date('date');
            $table->timestamps();

            $table->primary(['area_id', 'person_id', 'outstanding_value_id']);
            $table->index(['person_id', 'area_id']);
            $table->index('outstanding_value_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_person_outstanding_value');
    }
};
