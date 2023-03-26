<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class PortfolioMMIController extends Controller
{
    public function index()
    {
        $projets = Projet::latest()->get();
        return view('portfoliommi', compact('projets'));
    }
}