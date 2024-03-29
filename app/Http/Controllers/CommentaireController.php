<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Projet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $commentaire = new Commentaire;
        $commentaire->contenu_commentaire = $request->input('contenu_commentaire');
        $this->validate($request, [
            'contenu_commentaire' => 'required'
        ]);
        $commentaire->date_commentaire = now();

        // On enregistre les informations de l'utilisateur dans le commentaire
        $commentaire->nom_commentaire = $user->prenom_user . ' ' . $user->nom_user;
        $commentaire->avatar_commentaire = $user->img_user;

        // On relie l'utilisateur au commentaire
        $commentaire->utilisateur_id = $user->id_user;

        $projet_id = $request->id_projet;
        $projet = Projet::findOrFail($projet_id);
        $commentaire->projet()->associate($projet);
        $commentaire->save();

        return redirect()->route('affichage.commentaire', $projet_id)->with('success', 'Commentaire ajouté avec succès.');
    }


    public function index()
    {
        $commentaires = Commentaire::all();
        return view('affichage', compact('commentaires'));
    }

    public function showComment($id_projet)
    {
        $projet = Projet::findOrFail($id_projet);
        $commentaires = Commentaire::whereHas('projet', function($query) use($id_projet) {
            $query->where('id_projet', $id_projet);
        })->get();

        return view('affichage', compact('commentaires', 'projet'));
    }
}
