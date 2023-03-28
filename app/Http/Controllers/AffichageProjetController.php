<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class AffichageProjetController extends Controller
{
    public function show($id_projet)
    {
        $projet = Projet::findOrFail($id_projet);
        $commentaires = $projet->commentaires;
        return view('affichage', compact('projet', 'commentaires'));
    }
}