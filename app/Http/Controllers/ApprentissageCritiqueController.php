<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprentissageCritique;
use App\Models\Projet;

class ApprentissageCritiqueController extends Controller
{
    // Affichage du formulaire de création d'un apprentissage critique
    public function create($id_projet)
    {
        $projet = Projet::findOrFail($id_projet);
        $competences = $projet->competences;
        return view('apprentissage.create', ['projet' => $projet, 'competences' => $competences]);
    }

    // Enregistrement de l'apprentissage critique dans la BDD
    public function store(Request $request, $id_projet)
    {
        $validatedData = $request->validate([
            'competence_id' => 'required',
            'note_ac' => 'required',
            'commentaire_ac' => 'required'
        ]);

        $projet = Projet::findOrFail($id_projet);
        $ac = new ApprentissageCritique;
        $ac->note_ac = $validatedData['note_ac'];
        $ac->commentaire_ac = $validatedData['commentaire_ac'];
        $ac->projet_id = $projet->id_projet;
        $ac->competence_id = $validatedData['competence_id'];
        $ac->save();

        return redirect()->route('projet.show', $projet->id_projet)->with('success', 'L\'apprentissage critique a été enregistré avec succès.');
    }

    // Affichage du formulaire d'édition de l'apprentissage critique
    public function edit($id_ac)
    {
        $ac = ApprentissageCritique::findOrFail($id_ac);
        $projet = $ac->projet;
        $competences = $projet->competences;
        return view('apprentissage.edit', ['projet' => $projet, 'competences' => $competences, 'ac' => $ac]);
    }

    // Mise à jour de l'apprentissage critique dans la BDD
    public function update(Request $request, $id_ac)
    {
        $validatedData = $request->validate([
            'competence_id' => 'required',
            'note_ac' => 'required',
            'commentaire_ac' => 'required'
        ]);

        $ac = ApprentissageCritique::findOrFail($id_ac);
        $ac->note_ac = $validatedData['note_ac'];
        $ac->commentaire_ac = $validatedData['commentaire_ac'];
        $ac->competence_id = $validatedData['competence_id'];
        $ac->save();

        $projet = $ac->projet;
        return redirect()->route('projet.show', $projet->id_projet)->with('success', 'L\'apprentissage critique a été modifié avec succès.');
    }

    // Suppression de l'apprentissage critique de la BDD
    public function destroy($id_ac)
    {
        $ac = ApprentissageCritique::findOrFail($id_ac);
        $projet = $ac->projet;
        $ac->delete();

        return redirect()->route('projet.show', $projet->id_projet)->with('success', 'L\'apprentissage critique a été supprimé avec succès.');
    }
}