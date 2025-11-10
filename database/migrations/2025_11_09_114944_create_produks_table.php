<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id'); // relasi ke tabel kategoris
            $table->string('nama_produk');
            $table->string('foto')->nullable(); // untuk menyimpan path foto
            $table->timestamps();

            // relasi ke tabel kategoris
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
