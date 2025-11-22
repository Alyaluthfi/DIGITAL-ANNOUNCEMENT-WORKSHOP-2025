<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); // Judul Pengumuman
            $table->string('slug')->unique(); // Slug (untuk URL Halaman Detail)
            $table->foreignId('category_id')->constrained('categories','id'); // Kategori
            $table->text('content'); // Isi Pengumuman (Teks Panjang)
            $table->date('date'); // Tanggal Pengumuman Dibuat/Diterbitkan
            $table->string('attachment')->nullable(); // Lampiran (Opsional)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};

