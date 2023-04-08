<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprentissageCritique extends Model
{
    use HasFactory;

    protected $table = 'apprentissage_critique';

    protected $primaryKey = 'id_ac';

    protected $fillable = [
        'nom_ac',
        'competence_id'
    ];

    public function competence()
    {
        return $this->belongsTo(Competence::class, 'competence_id');
    }
}