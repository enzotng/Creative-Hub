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

Route::get('/projets', [ProjetController::class, 'create'])->name('create');
Route::post('/projets', [ProjetController::class, 'store'])->name('store');

Route::get('/projets/{id}', [ProjetController::class, 'showProjet'])->name('show');
Route::get('/projets/{id}/comment', [CommentaireController::class, 'stored'])->name('stored');