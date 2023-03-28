<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
use App\Models\Projet;

class CommentaireController extends Controller
{
    public function store(Request $request, $id)
    {
        
        $projet = Projet::findOrFail($id);

        $commentaire = new Commentaire;
        $commentaire->contenu_commentaire = $request->input('contenu_commentaire');
        $this->validate($request, [
            'contenu_commentaire' => 'required'
        ]);
        $commentaire->date_commentaire = now();
        $commentaire->projet()->associate($projet);
        $commentaire->save();

    return redirect()->route('commentaire.projet', $id)->with('success', 'Commentaire ajouté avec succès.');
    }
}
