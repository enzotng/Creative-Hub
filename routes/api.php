<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CompetenceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get all projects
Route:: get('projet', [ProjetController::class, 'searchByTitreProjet']);
//get all projects
Route:: get('domaine', [ProjetController::class, 'searchByDomaineProjet']);

//get all users
Route:: get('user', [ProfilController::class, 'getProfil']);

Route::get('/ac/{id}', [CompetenceController::class, 'getApprentissagesCritiques'])->name('ac.byId');


