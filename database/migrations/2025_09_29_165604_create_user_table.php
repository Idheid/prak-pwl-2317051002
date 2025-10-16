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
        Schema::create('user', function (Blueprint $table) {
            // Ganti id() menjadi uuid()
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('nim')->unique();

            // Foreign UUID ke tabel kelas
            $table->foreignUuid('kelas_id')->constrained('kelas')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
