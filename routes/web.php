<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProjetController;
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

Route::get('/home', [HelloController::class, 'index']);

Route::get('/etudiant', [EtudiantController::class, 'etudiantProfil']);

Route::get('/connexion', [ConnexionController::class, 'showLoginForm'])->name('connexion');
Route::post('/connexion', [ConnexionController::class, 'login']);

Route::get('/inscription', [InscriptionController::class, 'showRegistrationForm'])->name('inscription');
Route::post('/inscription', [InscriptionController::class, 'register']);

Route::get('/projets', [ProjetController::class, 'create'])->name('create');
Route::post('/projets', [ProjetController::class, 'store'])->name('store');

Route::get('/commentaire', [CommentaireController::class, 'created'])->name('created');
Route::post('/commentaire', [CommentaireController::class, 'stored'])->name('stored');