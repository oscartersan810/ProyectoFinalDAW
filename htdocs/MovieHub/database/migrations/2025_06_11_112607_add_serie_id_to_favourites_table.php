<?php
// database/migrations/xxxx_xx_xx_add_serie_id_to_favorites_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->unsignedBigInteger('serie_id')->nullable()->after('movie_id');
            // Si tienes la tabla de series y quieres agregar la relación:
            // $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropColumn('serie_id');
        });
    }
};

