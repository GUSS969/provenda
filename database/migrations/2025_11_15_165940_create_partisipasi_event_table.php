<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partisipasi_event', function (Blueprint $table) {
            $table->id();
            
            // ✅ PENTING: Harus unsignedBigInteger
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            
            $table->string('status')->nullable(); // hadir, tidak_hadir, dll
            $table->timestamps();
            
            // Hapus foreign key constraint
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partisipasi_event');
    }
};