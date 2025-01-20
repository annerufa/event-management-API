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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade'); // Relasi ke tabel events
            $table->enum('tipe', ['free', 'ots', 'pre-sale', 'regular', 'VIP']); // Jenis tiket
            $table->decimal('harga', 10, 3); // Harga tiket (contoh: 100.00)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
