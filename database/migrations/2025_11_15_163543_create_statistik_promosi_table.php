<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistik_promosi', function (Blueprint $table) {
            $table->id();
            
            // ✅ PENTING: Harus unsignedBigInteger
            $table->unsignedBigInteger('event_id')->nullable();
            
            // Kolom lainnya
            $table->integer('jumlah_klik')->default(0);
            $table->integer('jumlah_view')->default(0);
            $table->timestamps();
            
            // Foreign key constraint (opsional, bisa dihapus kalau masih error)
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistik_promosi');
    }
};