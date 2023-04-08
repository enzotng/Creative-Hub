<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('competence_projet', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('competence_id');
            $table->unsignedInteger('projet_id');
            $table->timestamps();

            $table->foreign('competence_id')->references('id_competence')->on('competence_table')->onDelete('cascade');
            $table->foreign('projet_id')->references('id_projet')->on('projet_table')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('competence_projet');
    }
};