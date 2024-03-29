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
        Schema::table('commentaire_table', function (Blueprint $table) {
            $table->unsignedInteger('id_projet');
            $table->foreign('id_projet')->references('id_projet')->on('projet_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaire_table', function (Blueprint $table) {
            //
        });
    }
};
