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
        Schema::create('mahasiswa', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('nama');
            $blueprint->string('tempat');
            $blueprint->string('tgl');
            $blueprint->string('bulan');
            $blueprint->string('tahun');
            $blueprint->string('jk');
            $blueprint->text('alamat');
            $blueprint->string('sekolah');
            $blueprint->decimal('mtk', 5, 2);
            $blueprint->decimal('inggris', 5, 2);
            $blueprint->decimal('indo', 5, 2);
            $blueprint->string('pil1');
            $blueprint->string('pil2');
            $blueprint->text('alasan');
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
