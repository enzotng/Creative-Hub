<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $table = 'commentaire_table';

    // Nom de la clé primaire de la table
    protected $primaryKey = 'id_commentaire';

    // Association commentaire/projet
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'id_projet');
    }

    // Association commentaire/utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
}
