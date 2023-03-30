<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventEtudiantAccess
{
    /**
     * Empêche l'accès à la page "Etudiant" pour les professeurs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_user == 'Professeur') {
            return redirect()->route('erreur.etudiant');
        }
    
        return $next($request);
    }
    
}
