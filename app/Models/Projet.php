<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    // Nom de la table associée au modèle
    protected $table = 'projet_table';

    // Nom de la clé primaire de la table
    protected $primaryKey = 'id_projet';

    // Liste des colonnes de la table accessibles en écriture
    protected $fillable = ['titre_projet', 'description_projet', 'image_projet', 'date_projet'];

    // Récupère un enregistrement à partir de son ID
    public static function getById($id)
    {
        return self::find($id);
    }

    //Association projet/commentaire
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_commentaire');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competence_projet', 'projet_id', 'competence_id');
    }

    public function apprentissagesCritiques()
    {
        return $this->belongsToMany(ApprentissageCritique::class, 'ac_projet', 'projet_id', 'ac_id');
    }
}
    