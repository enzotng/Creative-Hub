<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class ProjetController extends Controller
{
    
    public function create()
    {
        return view('create');
    }

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

        return redirect('/projets')->with('success', 'Le projet a été enregistré avec succès.');
    }

    public function liste()
    {
        $projets = Projet::all();

        return view('projets.liste', compact('projets'));
    }   

}
