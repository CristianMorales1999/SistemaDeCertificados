<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('font_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('font_id')->nullable();
            $table->foreignId('font_style_id')->nullable();

            $table->foreign(['font_id','font_style_id'])
                    ->references(['font_id','font_style_id'])
                    ->on('font_font_style')
                    ->nullOnDelete()
                    ->cascadeOnUpdate();
                    
            $table->unsignedInteger('font_size');
            $table->string('initial_color_code', 7);
            $table->string('intermediate_color_code', 7)->nullable();
            $table->string('final_color_code', 7)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('font_configurations');
    }
};
