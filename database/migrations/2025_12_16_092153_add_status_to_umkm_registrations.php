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
        Schema::table('umkm_registrations', function (Blueprint $table) {
            // STATUS PENDAFTARAN UMKM
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('event_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm_registrations', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
