<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function pageAdmin()
    {
        if (Auth::user()->role_user !== 'Administrateur') {
            return redirect()->route('admin');
        }

        // Récupérer tous les utilisateurs
        $users = DB::table('users_table')->get();

        $userCount = DB::table('users_table')->count();

        $projetCount = DB::table('projet_table')->count();
        
        // Récupérer tous les projets
        $projets = DB::table('projet_table')->get();
    
        return view('admin', ['users' => $users, 'projets' => $projets, 'userCount' => $userCount, 'projetCount' => $projetCount]);
    }
    
    public function editUser(Request $request)
    {
        $userId = $request->input('user_id');
        $newRole = $request->input('role');
        DB::table('users_table')->where('id_user', $userId)->update([
            'role_user' => $newRole,
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Les informations de l\'utilisateur ont été mises à jour.');
    }    

    public function deleteUser(Request $request, $id)
    {
        DB::table('users_table')->where('id_user', $id)->delete();
        return redirect()->back()->with('success', 'L\'utilisateur a été supprimé.');
    }

    public function editProjet(Request $request)
    {
        $projetId = $request->input('projet_id');
        $newTitre = $request->input('titre');
        $newDescription = $request->input('description');
        $newDomaine = $request->input('domaine');
        $newNote = $request->input('note');
    
        DB::table('projet_table')->where('id_projet', $projetId)
            ->update([
                'titre_projet' => $newTitre ?: DB::raw('titre_projet'),
                'description_projet' => $newDescription ?: DB::raw('description_projet'),
                'domaine_projet' => $newDomaine ?: DB::raw('domaine_projet'),
                'note_projet' => $newNote ?: DB::raw('note_projet'),
                'updated_at' => now(),
            ]);
    
        return redirect()->back()->with('success', 'Les informations du projet ont été mises à jour.');
    }

    public function deleteProjet(Request $request, $id)
    {
        // Supprimer les enregistrements de la table ac_projet liés au projet
        DB::table('ac_projet')->where('projet_id', $id)->delete();
        
        // Supprimer le projet
        DB::table('projet_table')->where('id_projet', $id)->delete();
        
        return redirect()->back()->with('success', 'Le projet a été supprimé.');
    }    
}