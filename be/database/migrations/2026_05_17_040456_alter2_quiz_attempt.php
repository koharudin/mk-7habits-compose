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
        //
        Schema::table('quiz_attempts', function (Blueprint $table) {
            $table->bigInteger('duration')->default(0);// dalam 
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
        });
        Schema::table('quizzes', function (Blueprint $table) {
            $table->integer('max_questions')->default(0);
            $table->boolean("is_generate_random")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
