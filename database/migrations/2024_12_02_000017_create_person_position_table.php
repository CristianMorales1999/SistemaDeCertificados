<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('person_position', function (Blueprint $table) {
            $table->foreignId('person_id')
                  ->constrained('people')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('position_id')
                  ->constrained('positions')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->primary(['person_id', 'position_id']);
            $table->index('person_id');
            $table->index('position_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('person_position');
    }
};
