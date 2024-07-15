<?php

use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\DesbravadorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('clubes', ClubeController::class);

Route::resource('unidades', UnidadeController::class);

Route::resource('cargos', CargoController::class);

Route::resource('desbravadores', DesbravadorController::class);

Route::resource('avaliadores', AvaliadorController::class);

Route::resource('atividades', AtividadeController::class);
