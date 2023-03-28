<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PortfolioMMIController;
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

Route::get('/etudiant', [EtudiantController::class, 'etudiantProfil'])->name('etudiant')->middleware('auth');

Route::get('/connexion', [ConnexionController::class, 'showLoginForm'])->name('connexion');
Route::post('/connexion', [ConnexionController::class, 'login'])->name('login');

Route::get('/deconnexion', [DeconnexionController::class, 'deconnexion'])->name('deconnexion');

Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription.create');
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

Route::get('/creationProjet', [ProjetController::class, 'create'])->name('create');
Route::post('/creationProjet', [ProjetController::class, 'store'])->name('store');

Route::get('/portfolio', [PortfolioMMIController::class, 'index'])->name('portfolio.index');

Route::get('/portfolio/{id_projet}', [App\Http\Controllers\AffichageProjetController::class, 'show'])->name('affichage.projet');
