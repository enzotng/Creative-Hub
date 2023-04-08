<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $table = 'competence_table';
    protected $primaryKey = 'id_competence';
    protected $fillable = ['nom_competence'];

    // Define the hasMany relationship to ApprentissageCritique
    public function apprentissageCritiques()
    {
        return $this->hasMany(ApprentissageCritique::class);
    }
}