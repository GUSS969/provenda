<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Cek dulu apakah kolom sudah ada atau belum
            if (!Schema::hasColumn('events', 'open_registration')) {
                $table->boolean('open_registration')->default(0)->after('deskripsi');
            }
            if (!Schema::hasColumn('events', 'max_participants')) {
                $table->integer('max_participants')->nullable()->after('deskripsi');
            }
            if (!Schema::hasColumn('events', 'registration_info')) {
                $table->text('registration_info')->nullable()->after('deskripsi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['open_registration', 'max_participants', 'registration_info']);
        });
    }
};