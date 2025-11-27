<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->string('kategori')->nullable();
            $table->date('tanggal_event');
            $table->string('waktu')->nullable();
            $table->string('lokasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('poster')->nullable();
            
            // ✅ PENTING: Harus unsignedBigInteger dan nullable
            $table->unsignedBigInteger('penyelenggara_id')->nullable();
            
            // Foreign key constraint
            $table->foreign('penyelenggara_id')
                  ->references('id')
                  ->on('penyelenggaras')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};