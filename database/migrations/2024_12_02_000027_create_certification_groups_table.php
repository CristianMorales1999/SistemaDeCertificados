<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certification_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certification_type_id')
                  ->constrained('certification_types')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->foreignId('created_by_user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('certified_by_user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('project_id')
                  ->nullable()
                  ->constrained('projects')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('workshop_id')
                  ->nullable()
                  ->constrained('workshops')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId('training_id')
                  ->nullable()
                  ->constrained('trainings')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
            $table->string('name', 300);
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('issue_date');
            $table->boolean('is_validated')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certification_groups');
    }
};
