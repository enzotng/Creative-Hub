<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeconnexionController extends Controller
{
    /**
     * Déconnecte l'utilisateur connecté.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deconnexion(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}