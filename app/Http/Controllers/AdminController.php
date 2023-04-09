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
}