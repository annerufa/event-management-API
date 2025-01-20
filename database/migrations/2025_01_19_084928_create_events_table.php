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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('namaAcara');
            $table->text('deskripsi')->nullable();
            $table->date('waktuMulai');
            $table->date('waktuSelesai');
            $table->enum('status', ['available', 'end', 'closed']); // Jenis tiket
            $table->foreignId('organizer_id')->constrained('organizers')->onDelete('cascade'); // Relasi ke tabel events
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
