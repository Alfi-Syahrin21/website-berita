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
        Schema::table('news', function (Blueprint $table) {
            // Tambahkan kolom baru setelah kolom 'thumbnail'
            $table->string('thumbnail_caption')->nullable()->after('thumbnail');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migrasi di-rollback
            $table->dropColumn('thumbnail_caption');
        });
    }
};
