<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_sdgs', function (Blueprint $table) {
            $table->primary(['news_id', 'sdgs_id']);
            $table->foreignId('news_id')->constrained()->onDelete('cascade');
            $table->foreignId('sdgs_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_sdgs');
    }
};