<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('umkm_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('nama_umkm');
            $table->string('pemilik');
            $table->string('email')->nullable();
            $table->string('no_wa');
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umkm_registrations');
    }
}