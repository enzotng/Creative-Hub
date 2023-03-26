<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->nom_user = $request->input('nom_user');
        $user->prenom_user = $request->input('prenom_user');
        $user->email_user = $request->input('email_user');
        $user->mdp_user = bcrypt($request->input('mdp_user'));
        $user->save();

        // Vérifier si une nouvelle image a été envoyée
    if ($request->hasFile('img_user')) {
        $image = $request->file('img_user');
        $filename = 'Avatar_'.$user->nom_user.'_'.$user->prenom_user.'.'.$image->getClientOriginalExtension();
        $path = public_path('assets/images/png/');
        $image->move($path, $filename);
        $user->img_user = $filename;
        $user->save();
    }

        return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès !');
    }
}