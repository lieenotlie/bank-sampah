<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatan')->onDelete('cascade');
            $table->string('kode_kelurahan', 10)->unique();
            $table->string('nama_kelurahan', 100);
            $table->enum('jenis', ['Kelurahan', 'Desa']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelurahan');
    }
};