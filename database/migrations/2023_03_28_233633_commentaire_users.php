<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('commentaire_table', function (Blueprint $table) {
            $table->unsignedInteger('utilisateur_id')->after('id_commentaire');
            $table->foreign('utilisateur_id')->references('id_user')->on('users_table')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('commentaire_table', function (Blueprint $table) {
            $table->dropForeign(['utilisateur_id']);
            $table->dropColumn('utilisateur_id');
        });
    }
};
