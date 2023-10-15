<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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




require __DIR__.'/auth.php';
