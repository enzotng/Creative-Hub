<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class EtudiantController extends BaseController
{
    public function etudiantProfil()
    {
        $user = Auth::user();
        $projets = DB::table('projet_table')->where('user_id', $user->id_user)->get();
        return view('etudiant', ['user' => $user, 'projets' => $projets]);
    }
}
