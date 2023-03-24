<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class ProjetController extends Controller
{
    // Page d'enregistrement du projet
    public function create()
    {
        return view('create');
    }

    // Enregitrement du projet dans la BDD
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre_projet' => 'required',
            'image_projet' => 'required',
            'description_projet' => 'required',
            'date_projet' => 'required',
        ]);

        $projet = new Projet;
        $projet->titre_projet = $validatedData['titre_projet'];
        $projet->image_projet = $validatedData['image_projet'];
        $projet->description_projet = $validatedData['description_projet'];
        $projet->date_projet = $validatedData['date_projet'];
        $projet->save();

        return redirect('etudiant')->with('success', 'Le projet a été enregistré avec succès.');
    }

    // Vue pour un projet spécifique
    public function showProjet($id) {
        $projet = Projet::find($id);
        return view('projet')->with('projet', $projet);
    }

    // Enregistrement d'un commentaire dans la BDD
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
