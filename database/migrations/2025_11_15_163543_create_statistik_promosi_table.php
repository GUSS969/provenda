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
        Schema::create('statistik_promosi', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('event_id')
                ->constrained('events')
                ->onDelete('cascade');

            $table->integer('total_view')->default(0);
            $table->integer('total_like')->default(0);

            $table->enum('periode', ['harian', 'mingguan', 'bulanan'])
                ->default('harian');

            $table->dateTime('tanggal_diperbarui')->useCurrent();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistik_promosi');
    }
};
