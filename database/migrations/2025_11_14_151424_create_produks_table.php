<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('umkm_id')
                  ->constrained('umkms')
                  ->onDelete('cascade');

            $table->string('nama_produk', 100);
            $table->text('deskripsi_produk')->nullable();
            $table->decimal('harga', 12, 2);
            $table->integer('stok');
            $table->string('gambar_produk', 255)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
