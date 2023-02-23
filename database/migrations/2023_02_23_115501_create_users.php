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
        Schema::create('creative_users', function(Blueprint $table) { // Nous demandons la création de la table 'blog_articles'
            $table->increments('id_users'); // Création d'un champ 'id' auto-incrémenté
            $table->string('nom_users', 50); // Création d'un champ texte 'titre' de 255 caractères
            $table->string('prenom_users', 50); // Création d'un champ texte long 'contenu'
            $table->string('email_users', 255); // Création d'un champ texte long 'contenu'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creative_users', 'users');
    }
};
