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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/profils', [ProfilController::class, 'index']);
Route::get('/profils/create', [ProfilController::class, 'create']);
Route::post('/profils', [ProfilController::class, 'store']);
Route::get('/profils/{id}/edit', [ProfilController::class, 'edit']);
Route::put('/profils/{id}', [ProfilController::class, 'update']);
Route::delete('/profils/{id}', [ProfilController::class, 'destroy']);

