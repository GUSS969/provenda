<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_umkm');
            $table->string('nama_pemilik');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->foreignUuid('admin_id')
                  ->constrained('admins')
                  ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umkms');
    }
};
