<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [HelloController::class, 'index'])->name('home');

Route::get('/etudiant', [EtudiantController::class, 'etudiantProfil'])->name('etudiant');

Route::get('/connexion', [ConnexionController::class, 'showLoginForm'])->name('connexion');
Route::post('/connexion', [ConnexionController::class, 'login'])->name('login');

Route::post('/deconnexion', [DeconnexionController::class, 'deconnexion'])->name('deconnexion');

Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription.create');
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil')->middleware('auth');

Route::get('/projets/create', [App\Http\Controllers\ProjetController::class, 'create'])->name('projets.create');
Route::post('/projets', [App\Http\Controllers\ProjetController::class, 'store'])->name('projets.store');
Route::get('/projets/liste', [App\Http\Controllers\ProjetController::class, 'liste'])->name('projets.liste');