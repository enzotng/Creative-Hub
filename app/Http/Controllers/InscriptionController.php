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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Ajouter un nouvel utilisateur dans la base de données
        DB::table('creative_users')->insert([
            'id' => $request->name,
            'nom_users' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/connexion')->with('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');
    }
}