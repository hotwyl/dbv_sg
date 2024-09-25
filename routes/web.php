<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\EventoClubeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EventoUnidadeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RankingClubeController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\DesbravadorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingUnidadeController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'dashboard']);

//Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});

require __DIR__.'/auth.php';

Route::resource('clubes', ClubeController::class);

Route::resource('unidades', UnidadeController::class);

Route::resource('cargos', CargoController::class);

Route::resource('desbravadores', DesbravadorController::class);

Route::resource('avaliadores', AvaliadorController::class);

Route::resource('avaliacoes', AvaliacaoController::class);

//Route::resource('ranking', RankingController::class);
//Route::resource('eventos', EventoController::class);

Route::resource('ranking_clubes', RankingClubeController::class);

Route::resource('ranking_unidades', RankingUnidadeController::class);

Route::resource('eventos_clubes', EventoClubeController::class);

Route::resource('eventos_unidades', EventoUnidadeController::class);
