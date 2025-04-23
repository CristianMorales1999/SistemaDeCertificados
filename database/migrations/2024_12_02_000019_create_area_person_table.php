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
        Schema::create('area_person', function (Blueprint $table) {

            $table->foreignId('person_id')
                  ->constrained('people')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('area_id')
                  ->constrained('areas')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->primary(['person_id', 'area_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_person');
    }
};
