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
        Schema::create('trx_activity', function (Blueprint $table) {
            $table->id();
            $table->timestamp("tgl");
            $table->bigInteger("student_id");
            $table->bigInteger("indicator_id");
            $table->integer("skor");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_activity');
    }
};
