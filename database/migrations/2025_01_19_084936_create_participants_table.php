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
        Schema::create('participants', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama'); // Nama peserta
            $table->string('email')->unique(); // Email peserta, harus unik
            $table->string('telepon'); // Nomor telepon peserta
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Relasi ke tabel events
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
