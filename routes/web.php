<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharacterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Mangas Routes
    Route::get('/mangas', [MangaController::class, 'index'])->name('manga.index');
    Route::get('/manga', [MangaController::class, 'create'])->name('manga.create');
    Route::post('/manga', [MangaController::class, 'store'])->name('manga.store');
    Route::get('/manga/{manga}', [MangaController::class, 'edit'])->name('manga.edit');
    Route::put('/manga/{manga}', [MangaController::class, 'update'])->name('manga.update');
    Route::delete('/manga/{manga}', [MangaController::class, 'destroy'])->name('manga.destroy');

    // Characters Routes
    Route::get('/characters', [CharacterController::class, 'index'])->name('character.index');
    Route::get('/character', [CharacterController::class, 'create'])->name('character.create');
    Route::post('/character', [CharacterController::class, 'store'])->name('character.store');
    Route::get('/character/{character}', [CharacterController::class, 'edit'])->name('character.edit');
    Route::put('/character/{character}', [CharacterController::class, 'update'])->name('character.update');
    Route::delete('/character/{character}', [CharacterController::class, 'destroy'])->name('character.destroy');
});

require __DIR__.'/auth.php';
