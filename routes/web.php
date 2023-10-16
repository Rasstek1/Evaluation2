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
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::middleware('auth')->group(function () {
    //route breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //route pour le profil
    Route::get('/profils/edit', [ProfilController::class, 'editSelf'])->name('profils.editSelf');
    Route::patch('/profils', [ProfilController::class, 'update'])->name('profils.update');
    Route::delete('/profils/{profil}', [ProfilController::class, 'destroy'])->name('profils.destroy');



});




Route::get('/contact', function () {//route pour afficher la page contact
    return view('contact');
});

Route::get('/profils', [ProfilController::class, 'index']);//route pour afficher la liste des profils
Route::get('/profils/create', [ProfilController::class, 'create']);//route pour afficher le formulaire de création
Route::post('/profils', [ProfilController::class, 'store']);//route pour enregistrer le profil





require __DIR__.'/auth.php';
