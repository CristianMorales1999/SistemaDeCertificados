<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('font_font_style', function (Blueprint $table) {
            $table->foreignId('font_style_id')
                  ->constrained('font_styles')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('font_id')
                  ->constrained('fonts')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->primary(['font_style_id', 'font_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('font_font_style');
    }
};
