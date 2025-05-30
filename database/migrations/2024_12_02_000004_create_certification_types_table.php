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
        Schema::create('certification_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150); // Crea la columna 'name' de tipo VARCHAR(150)
            $table->string('abbreviation', 6)->nullable()->unique(); // Crea la columna 'abbreviation' de tipo VARCHAR(50)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certification_types');
    }
};
