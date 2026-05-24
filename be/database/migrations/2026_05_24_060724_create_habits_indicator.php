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
        Schema::create('habits_indicators', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("habit_id");
            $table->string("name");
            $table->text("achievement_criteria");
            $table->text("assessment");
            $table->string("score");
            $table->integer("order")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habits_indicators');
    }
};
