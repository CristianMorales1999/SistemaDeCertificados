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
        Schema::create('image_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);  // Crea el campo 'name' de tipo VARCHAR con un máximo de 100 caracteres
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_statuses');
    }
};
