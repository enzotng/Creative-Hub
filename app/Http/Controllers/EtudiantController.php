<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class EtudiantController extends BaseController
{
    public function etudiantProfil(Request $request)
    {
        $user = Auth::user();
        $domaine = $request->input('domaine', 'default');

        if ($domaine == 'default') {
            $projets = DB::table('projet_table')->where('user_id', $user->id_user)->get();
        } else {
            $projets = DB::table('projet_table')->where([
                ['user_id', '=', $user->id_user],
                ['domaine_projet', '=', $domaine]
            ])->get();
        }

        return view('etudiant', ['user' => $user, 'projets' => $projets, 'domaine' => $domaine]);
    }

    public function supprimerProjet($id)
    {
        $projet = DB::table('projet_table')->where('id_projet', $id)->first();
        if (!$projet) {
            return redirect()->back()->with('error', 'Projet non trouvé.');
        }
        
        // Supprimer l'image du projet si elle existe
        if ($projet->image_projet) {
            $image_path = public_path('/assets/images/png/' . $projet->image_projet);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        
        DB::table('projet_table')->where('id_projet', $id)->delete();
        return redirect()->back()->with('success', 'Projet supprimé avec succès.');
    }

    public function unauthorizedAccess()
    {
        return view('errors.unauthorized-access');
    }
}