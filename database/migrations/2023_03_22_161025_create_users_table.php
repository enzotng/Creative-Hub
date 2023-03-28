<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_table', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nom_user');
            $table->string('prenom_user');
            $table->string('email_user')->unique();
            $table->string('mdp_user');
            $table->string('salt_user')->default('');
            $table->string('role_user')->default('Utilisateur');
            $table->string('img_user')->default('default_user.png');
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
        Schema::dropIfExists('users_table');
    }
}