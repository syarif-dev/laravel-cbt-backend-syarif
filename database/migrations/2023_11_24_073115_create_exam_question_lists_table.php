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
        Schema::create('exam_question_lists', function (Blueprint $table) {
            $table->id();
            // exam_id
            $table->foreignId('exam_id')->constrained('exams')->cascadeOnDelete();
            // question_id
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            // correct
            $table->boolean('correct')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_question_lists');
    }
};
