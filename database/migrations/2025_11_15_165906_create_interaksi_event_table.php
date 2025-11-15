<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('interaksi_event', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('event_id')
                ->constrained('events')
                ->onDelete('cascade');

            $table->enum('jenis_interaksi', ['like', 'view']);
            $table->string('ip_address')->nullable();
            $table->dateTime('waktu_interaksi')->useCurrent();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interaksi_event');
    }
};
