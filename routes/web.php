<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ConditionsController;
use App\Http\Controllers\DeconnexionController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PortfolioMMIController;
use App\Http\Controllers\AffichageProjetController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventEtudiantAccess;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [HelloController::class, 'index'])->name('home');

Route::get('/conditions', [ConditionsController::class, 'affichageController'])->name('conditions');

Route::middleware([PreventEtudiantAccess::class])->group(function () {
    Route::get('/etudiant', [EtudiantController::class, 'etudiantProfil'])->name('etudiant');
    Route::get('/admin', [AdminController::class, 'pageAdmin'])->name('admin');
    Route::get('/etudiant/erreur404', [EtudiantController::class, 'erreur404'])->name('erreur.etudiant');
});

Route::get('/admin', [AdminController::class, 'pageAdmin'])->name('admin');
Route::post('/admin/edit-user', [AdminController::class, 'editUser'])->name('admin.edit-user');
Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');

Route::post('/admin/edit-projet', [AdminController::class, 'editProjet'])->name('admin.edit-projet');
Route::delete('/admin/delete-projet/{id}', [AdminController::class, 'deleteProjet'])->name('admin.delete-projet');


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

Route::get('/portfolio/{id_projet}', [AffichageProjetController::class, 'show'])->name('affichage.projet');
Route::post('/portfolio/{id_projet}', [CommentaireController::class, 'store'])->name('commentaire.projet');
Route::get('/portfolio/{id_projet}/comment', [CommentaireController::class, 'showComment'])->name('affichage.commentaire');

Route::delete('/projets/{id}', [EtudiantController::class, 'supprimerProjet'])->name('projets.supprimer');
Route::put('/projets/{id}', [ProjetController::class, 'update'])->name('projets.modifier');
Route::get('/projets/domaine/{id_user}', [ProjetController::class, 'projetsDomaine'])->name('projets.domaine');

Route::get('/api/apprentissages-critiques/{id}', [CompetenceController::class, 'getApprentissagesCritiques']);