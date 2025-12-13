<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Hapus kolom lama yang duplikat
            if (Schema::hasColumn('events', 'for_umkm')) {
                $table->dropColumn('for_umkm');
            }
            if (Schema::hasColumn('events', 'max_umkm_participants')) {
                $table->dropColumn('max_umkm_participants');
            }
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->boolean('for_umkm')->default(0);
            $table->integer('max_umkm_participants')->nullable();
        });
    }
};