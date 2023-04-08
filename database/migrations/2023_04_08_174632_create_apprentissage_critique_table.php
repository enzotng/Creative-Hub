<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprentissageCritiqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprentissage_critique', function (Blueprint $table) {
            $table->increments('id_ac');
            $table->string('nom_ac');
            $table->unsignedInteger('competence_id');
            $table->foreign('competence_id')->references('id_competence')->on('competence_table')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apprentissage_critique');
    }
}