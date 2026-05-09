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
        Schema::create('naskah', function (Blueprint $table) {
            $table->id();
            $table->text("title");
            $table->text("description");

            $table->text('slug')->unique();
            $table->uuid('uuid')->unique();
            
            $table->text('lembaga_penyimpanan')->nullable();
            $table->string('negara')->nullable();
            $table->varchar('kode_inventaris')->nullable();

            $table->varchar('riwayat_naskah')->nullable();
            $table->varchar('aksara')->nullable();
            $table->varchar('bahasa')->nullable();
            $table->varchar('alat_tulis')->nullable();

            $table->text('deskripsi_fisik')->nullable();

            $table->varchar('referensi_katalog')->nullable();
            $table->varchar('akses_digital')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naskah');
    }
};
