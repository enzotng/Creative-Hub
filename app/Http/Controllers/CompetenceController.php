<?php

namespace App\Http\Controllers;

use App\Models\ApprentissageCritique;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function getApprentissagesCritiques($id)
    {
        $competence = Competence::findOrFail($id);
        $apprentissagesCritiques = ApprentissageCritique::where('competence_id', $id)->get();
    
        return response()->json($apprentissagesCritiques);
    }    
        
}