<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConnexionController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('connexion');
    }

    /**
     * Gère une demande de connexion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email_user' => 'required|string|email',
            'mdp_user' => 'required|string',
        ]);

        $credentials = $request->only('email_user', 'mdp_user');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Rediriger l'utilisateur vers la page étudiant
            return redirect()->route('etudiant')->with('success', 'Connexion réussie.');
        }

        throw ValidationException::withMessages([
            'email_user' => __('Adresse mail non existante !'),
            'mdp_user' => __('Mauvais mot de passe !')
        ]);
    }
}