<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interaksi_event', function (Blueprint $table) {
            $table->id();
            
            // ✅ PENTING: Harus unsignedBigInteger
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->string('jenis_interaksi')->nullable(); // like, share, comment, dll
            $table->text('komentar')->nullable();
            $table->timestamps();
            
            // Hapus foreign key constraint atau pastikan pakai onDelete cascade
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interaksi_event');
    }
};