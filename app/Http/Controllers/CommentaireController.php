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

    public function stored(Request $request){

        $validatedData = $request->validate([
            'contenu_commentaire' => 'required',
        ]);

        $comm = new Commentaire;
        $comm->contenu_commentaire = $validatedData['contenu_commentaire'];
        $comm->save();

        return redirect('etudiant')->with('success', 'Le commentaire a été poster avec succès.');

    }
}
