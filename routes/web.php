<?php

use App\Http\Controllers\MangaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MangaController::class, 'index'])->name('manga-index');
// Mangas CRUD routes
// Route::get('/mangas/show/{manga}', [MangaController::class, 'show'])->name('manga-show');
// Route::get('/mangas/edit/{manga}', [MangaController::class, 'edit'])->name('manga-edit');
// Route::post('/mangas/update/{manga}', [MangaController::class, 'update'])->name('manga-update');
// Route::post('/mangas/create/{manga}', [MangaController::class, 'create'])->name('manga-create');
// Route::post('/mangas/store/{manga}', [MangaController::class, 'store'])->name('manga-store');

// //Characters CRUD routes

// Route::get('/characters/show/{character}', [CharacterController::class, 'show'])->name('character-show');
// Route::get('/characters/edit/{character}', [CharacterController::class, 'edit'])->name('character-edit');
// Route::post('/characters/update/{character}', [CharacterController::class, 'update'])->name('character-update');
// Route::post('/characters/create/{character}', [CharacterController::class, 'create'])->name('character-create');
// Route::post('/characters/store/{character}', [CharacterController::class, 'store'])->name('character-store');
