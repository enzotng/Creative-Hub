<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function created()
    {
        return view('commentaire');
    }

    public function store(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);

        $commentaire = new Commentaire;
        $commentaire->contenu_commentaire = $request->input('contenu_commentaire');
        $commentaire->date_commentaire = now();
        $commentaire->projet()->associate($projet);
        $commentaire->save();

    return redirect()->route('show', $id)->with('success', 'Commentaire ajouté avec succès.');
    }
}
