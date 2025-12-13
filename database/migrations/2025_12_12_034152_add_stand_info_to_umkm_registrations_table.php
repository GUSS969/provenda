<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('umkm_registrations', function (Blueprint $table) {
            $table->string('stand_number', 20)->nullable()->after('event_id');
        });
    }

    public function down(): void
    {
        Schema::table('umkm_registrations', function (Blueprint $table) {
            $table->dropColumn('stand_number');
        });
    }
};