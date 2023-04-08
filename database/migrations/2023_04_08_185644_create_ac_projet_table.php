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
        Schema::create('ac_projet', function (Blueprint $table) {
            $table->unsignedInteger('ac_id');
            $table->unsignedInteger('projet_id');
            $table->foreign('ac_id')->references('id_ac')->on('apprentissage_critique');
            $table->foreign('projet_id')->references('id_projet')->on('projet_table');
            $table->primary(['ac_id', 'projet_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_projet');
    }
};