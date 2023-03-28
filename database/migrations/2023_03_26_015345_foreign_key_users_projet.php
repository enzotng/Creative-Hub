<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projet_table', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->after('id_projet');
            $table->foreign('user_id')->references('id_user')->on('users_table')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('projet_table', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
