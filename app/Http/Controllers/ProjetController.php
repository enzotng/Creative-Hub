<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function show($id)
    {
        // Récupère le projet avec l'ID spécifié
        $project = Project::findOrFail($id);
    
        // Passe le projet à la vue pour l'affichage
        return view('projet', ['project' => $project]);
    }

    public function addProjet(Request $request)
    {
        $projet = new Projet;
        $projet->titre_projet = $request->titre_projet;

        if ($request->hasFile('image_projet')) {
            $image = $request->file('image_projet');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $projet->image_projet = $filename;
        }
        
        $projet->description = $request->description;
        $projet->save();

    return redirect()->route('etudiant');
    }

}
