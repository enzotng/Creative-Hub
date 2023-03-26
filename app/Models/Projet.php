<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $table = 'projet_table';
    protected $primaryKey = 'id_projet';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}