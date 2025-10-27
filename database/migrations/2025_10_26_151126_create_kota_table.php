<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provinsi_id')->constrained('provinsi')->onDelete('cascade');
            $table->string('kode_kota', 10)->unique();
            $table->string('nama_kota', 100);
            $table->enum('jenis', ['Kota', 'Kabupaten']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};