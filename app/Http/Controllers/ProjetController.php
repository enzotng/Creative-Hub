<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Competence;
use App\Models\Commentaire;
use App\Models\Projet;
use App\Models\ApprentissageCritique;
use App\Http\Controllers\ApprentissageCritiqueController as ACController;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    // Page d'enregistrement du projet
    public function create()
    {
        $competences = Competence::all(); // récupérer toutes les compétences depuis la base de données
        return view('create', ['competences' => $competences]); // passer les compétences au template
    }
    

    // Enregitrement du projet dans la BDD
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre_projet' => 'required',
            'image_projet' => 'required|image',
            'description_projet' => 'required',
            'date_projet' => 'required',
            'domaine_projet' => 'required',
            'competence' => 'required',
            'ac' => 'required',
            'note_projet' => 'required',
        ]);

        $user = Auth::user();

        $projet = new Projet;
        $projet->user_id = $user->id_user;
        $projet->titre_projet = $validatedData['titre_projet'];
        $projet->description_projet = $validatedData['description_projet'];
        $projet->date_projet = $validatedData['date_projet'];
        $projet->domaine_projet = $validatedData['domaine_projet'];
        $projet->note_projet = $validatedData['note_projet'];
        $projet->save();

        // Enregistrement de l'image
        if ($request->hasFile('image_projet')) {
            $image = $request->file('image_projet');
            $filename = $image->getClientOriginalName();
            $path = public_path('assets/images/png/');
            $image->move($path, $filename);
            $projet->image_projet = $filename;
            $projet->save();
        }

        // Association des compétences et des apprentissages critiques avec le projet
        $competence = Competence::find($validatedData['competence']);
        $ac = ApprentissageCritique::findOrFail($validatedData['ac']);
        $projet->competences()->attach($competence);
        $projet->apprentissagesCritiques()->attach($ac);

        return redirect('etudiant')->with('success', 'Le projet a été enregistré avec succès.');
    }

    public function stored(Request $request){

        $validatedData = $request->validate([
            'contenu_commentaire' => 'required',
        ]);

        $comm = new Commentaire;
        $comm->contenu_commentaire = $validatedData['contenu_commentaire'];
        $comm->save();

        return redirect('etudiant')->with('success', 'Le commentaire a été posté avec succès.');

    }

    // Affichage du formulaire d'édition du projet

    public function edit($id)
    {
            $projet = Projet::findOrFail($id);
            $competences = Competence::all();
            $apprentissagesCritiques = ApprentissageCritique::all(); // récupérer tous les apprentissages critiques depuis la base de données
            return view('edit', ['projet' => $projet, 'competences' => $competences, 'apprentissagesCritiques' => $apprentissagesCritiques]);
    }
    
    public function update(Request $request, $id)

    {
    $validatedData = $request->validate([
        'titre_projet' => 'required',
        'description_projet' => 'required',
        'date_projet' => 'required',
    ]);

    $projet = Projet::findOrFail($id);
    $projet->titre_projet = $validatedData['titre_projet'];
    $projet->description_projet = $validatedData['description_projet'];
    $projet->date_projet = $validatedData['date_projet'];

    if ($request->hasFile('image_projet')) {
        $image = $request->file('image_projet');
        $filename = $image->getClientOriginalName();
        $path = public_path('assets/images/projets/');
        $image->move($path, $filename);
        if (!empty($projet->image_projet)) {
        // Supprimer l'ancienne image si elle existe
            unlink(public_path('assets/images/projets/') . $projet->image_projet);
        }
        $projet->image_projet = $filename;
    }

    $projet->save();

    return redirect()->back()->with('success', 'Le projet a été modifié avec succès.');
}

//get titre projetcts
// public function getProjet(Request $request) {
//     $q = $request->input('q');
//     $projetTitre = Projet::where('titre_projet', 'like', "%$q%")
//                          ->distinct('titre_projet', 'id_projet');
//     $projetDomaine = Projet::where('domaine_projet', 'like', "%$q%")
//                           ->distinct('domaine_projet', 'id_projet');
//     $projets = $projetTitre->union($projetDomaine)->get();
//     return response()->json($projets, 200);
// }
public function searchByTitreProjet(Request $request) {
    $q = $request->input('q');
    $projets = Projet::where('titre_projet', 'like', "%$q%")
                     ->get()
                     ->makeHidden(['domaine_projet']); 
    return response()->json($projets, 200);
}

public function searchByDomaineProjet(Request $request) {
    $q = $request->input('q');
    $projets = Projet::where('domaine_projet', 'like', "%$q%")
                     ->distinct('domaine_projet')
                     ->get()
                     ->makeHidden(['id_projet', 'titre_projet']);
    return response()->json($projets, 200);
}


public function projetsDomaine()
{
    $projetsDomaine = DB::table('projet_table')
        ->select(DB::raw('count(*) as total, domaine_projet'))
        ->groupBy('domaine_projet')
        ->get();

    return response()->json($projetsDomaine);
}
}