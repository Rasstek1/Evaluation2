<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
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

Route::get('/', function () {//route pour afficher la page d'accueil
    return view('welcome');
});
Route::get('/contact', function () {//route pour afficher la page contact
    return view('contact');
});

Route::get('/profils', [ProfilController::class, 'index']);//route pour afficher la liste des profils
Route::get('/profils/create', [ProfilController::class, 'create']);//route pour afficher le formulaire de création
Route::post('/profils', [ProfilController::class, 'store']);//route pour enregistrer le profil
Route::get('/profils/{id}/edit', [ProfilController::class, 'edit']);//route pour afficher le formulaire d'édition
Route::put('/profils/{id}', [ProfilController::class, 'update']);//route pour enregistrer les modifications
Route::delete('/profils/{id}', [ProfilController::class, 'destroy']);//route pour supprimer un profil



