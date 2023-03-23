<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('inscription');
    }

    /**
     * Enregistre un nouvel utilisateur dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom_user' => 'required|string|max:255',
            'prenom_user' => 'required|string|max:255',
            'email_user' => 'required|string|email|max:255|unique:users_table,email_user',
            'mdp_user' => 'required|string|min:8|confirmed',
            'role_user' => 'required|string|max:255',
        ]);

        // Insérer les données remplies dans le formulaire dans la base de données
        $user = User::create([
            'nom_user' => $request->input('nom_user'),
            'prenom_user' => $request->input('prenom_user'),
            'email_user' => $request->input('email_user'),
            'mdp_user' => bcrypt($request->input('mdp_user')),
            'role_user' => $request->input('role_user'),
        ]);

        // Connecter directement l'utilisateur
        Auth::login($user);

        // Rediriger l'utilisateur vers une page de succès
        return redirect()->route('etudiant')->with('success', 'Votre compte a été créé avec succès.');
    }
}