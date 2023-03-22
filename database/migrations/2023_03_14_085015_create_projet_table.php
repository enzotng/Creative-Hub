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
    Schema::create('projet_table', function (Blueprint $table) {
        $table->id();
        $table->string('titre_projet');
        $table->string('image_projet');
        $table->text('description_projet');
        $table->dateTime('date_projet');
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
