<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Debugbar;

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
            'email_user' => ['required', 'email'],
            'mdp_user' => 'required',
        ]);

        $credentials = $request->only('email_user', 'mdp_user');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Debugbar::info('Connexion réussie!'); // Ajoutez cet appel pour afficher un message de réussite dans Debugbar
            dd("Test");
            // Rediriger l'utilisateur vers la page étudiant
            return redirect()->route('etudiant')->with('success', 'Connexion réussie.');
        }
        
        Debugbar::startMeasure('myMeasure', 'Time for my query');
        $results = DB::select('SELECT * from users_table');
        Debugbar::stopMeasure('myMeasure');
        
        Debugbar::info("Bruh");
        throw ValidationException::withMessages([
            'email_user' => __('Adresse mail non existante !'),
            'mdp_user' => __('Mauvais mot de passe !')
        ]);
        dd("Bruh");
    }
}