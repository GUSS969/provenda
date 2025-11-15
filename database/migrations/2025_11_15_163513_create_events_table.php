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
            $table->uuid('id')->primary();
            $table->string('nama_event');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->string('kategori_event');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            // FK ke penyelenggara
            $table->foreignUuid('penyelenggara_id')
                  ->constrained('penyelenggaras')
                  ->onDelete('cascade');

            // FK ke admin
            $table->foreignUuid('id_admin')
                  ->constrained('admins')
                  ->onDelete('cascade');

            $table->string('poster')->nullable();
            $table->softDeletes();
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
