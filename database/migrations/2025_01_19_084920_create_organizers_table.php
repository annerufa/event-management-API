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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama'); // Nama penyelenggara
            $table->string('email')->unique(); // Email penyelenggara, harus unik
            $table->string('telepon'); // Nomor telepon penyelenggara
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
