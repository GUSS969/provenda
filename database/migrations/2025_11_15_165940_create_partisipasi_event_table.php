<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('partisipasi_event', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('umkm_id')
                ->constrained('umkms')
                ->onDelete('cascade');

            $table->foreignUuid('event_id')
                ->constrained('events')
                ->onDelete('cascade');

            $table->date('tanggal_bergabung')->nullable();

            $table->enum('status_partisipasi', ['menunggu', 'disetujui', 'ditolak'])
                ->default('menunggu');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partisipasi_event');
    }
};
