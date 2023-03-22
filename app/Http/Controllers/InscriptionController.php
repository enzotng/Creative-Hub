<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{
    public function showRegistrationForm()
    {
        return view('inscription');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'email_user' => 'required|string|email|max:255|unique:users',
            'mdp_user' => 'required|string|min:8|confirmed',
        ]);

        // Ajouter un nouvel utilisateur dans la base de données
        DB::table('users_table')->insert([
            'nom_user' => $request->nom,
            'email_user' => $request->email,
            'mdp_user' => bcrypt($request->mdp),
        ]);

        return redirect('/connexion')->with('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');
    }
}