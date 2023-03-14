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
        Schema::create('projet_table', function (Blueprint $table) {
            $table->increments('id_projet');
            $table->string('titre_projet');
            $table->string('image_projet');
            $table->text('description_projet');
            $table->datetime('date_projet')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projet_table');
    }
};
