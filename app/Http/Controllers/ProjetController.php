<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    
        $user = Auth::user();
        $projet = new Projet;
        $projet->user_id = $user->id_user;
        $projet->titre_projet = $validatedData['titre_projet'];
        $projet->description_projet = $validatedData['description_projet'];
        $projet->date_projet = $validatedData['date_projet'];
        $projet->save();
    
        // Vérifier si une nouvelle image a été envoyée
        if ($request->hasFile('image_projet')) {
            $image = $request->file('image_projet');
            $filename = $image->getClientOriginalName();
            $path = public_path('assets/images/png/');
            $image->move($path, $filename);
            $projet->image_projet = $filename;
            $projet->save();
        }
        
        
        return redirect('etudiant')->with('success', 'Le projet a été enregistré avec succès.');
    }

    // Vue pour un projet spécifique
    public function showProjet($id) {
        $projet = Projet::find($id);
        return view('projet')->with('projet', $projet);
    }
    

    
}