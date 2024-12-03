<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('perfil', [\App\Http\Controllers\PerfilController::class, 'index'])->name('index.perfil');
Route::get('perfil/{id}', [\App\Http\Controllers\PerfilController::class, 'index'])->name('index.perfil');
Route::post('perfil', [\App\Http\Controllers\PerfilController::class, 'store'])->name('create.perfil');
//Route::post('perfil', [\App\Http\Controllers\PerfilController::class, 'destroy'])->name('delete.perfil');

Route::get('usuario', [\App\Http\Controllers\UsuarioController::class, 'index'])->name('list.usuario');
Route::get('usuario/{id}', [\App\Http\Controllers\UsuarioController::class, 'show'])->name('show.usuario');
Route::post('usuario', [\App\Http\Controllers\UsuarioController::class, 'store'])->name('create.usuario');
Route::put('usuario/{id}', [\App\Http\Controllers\UsuarioController::class, 'update'])->name('update.usuario');
Route::put('usuario-delete/{id}', [\App\Http\Controllers\UsuarioController::class, 'destroy'])->name('delete.usuario');
