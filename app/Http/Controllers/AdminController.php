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
        
        // Récupérer tous les projets
        $projets = DB::table('projet_table')->get();
    
        return view('admin', ['users' => $users, 'projets' => $projets]);
    }
    
    public function editUser(Request $request)
    {
        $userId = $request->input('user_id');
        $newRole = $request->input('role');
        DB::table('users_table')->where('id_user', $userId)->update(['role_user' => $newRole]);
        return redirect()->back()->with('success', 'Les informations de l\'utilisateur ont été mises à jour.');
    }

    public function deleteUser(Request $request, $id)
    {
        DB::table('users_table')->where('id_user', $id)->delete();
        return redirect()->back()->with('success', 'L\'utilisateur a été supprimé.');
    }
}