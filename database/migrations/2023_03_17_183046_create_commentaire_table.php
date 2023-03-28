<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire_table', function (Blueprint $table) {
            $table->increments('id_commentaire');
            $table->string('avatar_commentaire')->default('');
            $table->string('nom_commentaire');
            $table->text('contenu_commentaire');
            $table->dateTime('date_commentaire');
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
        Schema::dropIfExists('commentaire_table');
    }
}