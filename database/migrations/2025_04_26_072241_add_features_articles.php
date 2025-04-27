<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
            $table->text('image')->nullable()->after('content'); // Kolom untuk menyimpan gambar terenkripsi
            $table->unsignedInteger('views')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('image');
            $table->dropColumn('views');
        });
    }
};