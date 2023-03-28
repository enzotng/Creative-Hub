<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        $user = DB::table('users_table')->where('email_user', $request->input('email_user'))->first();
        
        if (!$user || !Hash::check($request->input('mdp_user') . $user->salt_user, $user->mdp_user)) {
            Debugbar::error('Mauvaise combinaison email/mot de passe');
            throw ValidationException::withMessages([
                'email_user' => __('Adresse mail ou mot de passe incorrect !'),
            ]);
        }

        Auth::loginUsingId($user->id_user);
        $request->session()->regenerate();

        Debugbar::info('Connexion réussie!'); // Ajoutez cet appel pour afficher un message de réussite dans Debugbar
            
        // Rediriger l'utilisateur vers la page étudiant
        return redirect()->route('etudiant')->with('success', 'Connexion réussie.');
    }
}
