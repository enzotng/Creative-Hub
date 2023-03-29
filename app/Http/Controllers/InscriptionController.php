<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
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
            'nom_user' => ['required', 'string', 'max:255'],
            'prenom_user' => ['required', 'string', 'max:255'],
            'email_user' => ['required', 'string', 'email', 'max:255', 'unique:users_table'],
            'mdp_user' => ['required', 'string', 'min:8', 'confirmed'],
            'role_user' => ['required', Rule::in(['Etudiant', 'Professeur'])],
        ]);

                // Génère un salt aléatoire de 16 caractères
                $salt = Str::random(16);

                // Génère un hash du mot de passe de l'utilisateur en utilisant le salt
                $hashedPassword = hash('sha256', $salt . $request->input('mdp_user'));

        // Insérer les données remplies dans le formulaire dans la base de données
        $user = User::create([
            'nom_user' => $request->input('nom_user'),
            'prenom_user' => $request->input('prenom_user'),
            'email_user' => $request->input('email_user'),
            'mdp_user' => $hashedPassword,
            'salt_user' => $salt,
            'role_user' => $request->input('role_user'),
        ]);

                // Enregistre l'utilisateur dans la base de données
                $user->save();

        // Connecter directement l'utilisateur
        Auth::login($user);

    // Rediriger l'utilisateur vers une page en fonction de son rôle
    if ($request->input('role_user') == 'Professeur') {
        // Rediriger l'utilisateur vers la page du portfolio des professeurs
        return redirect()->route('portfolio.index')->with('success', 'Votre compte a été créé avec succès.');
    } else {
        // Rediriger l'utilisateur vers la page du portfolio des étudiants
        return redirect()->route('etudiant')->with('success', 'Votre compte a été créé avec succès.');
    }
    
    }
}