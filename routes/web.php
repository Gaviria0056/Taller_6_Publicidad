<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::get('/publicaciones', [PostController::class, 'index'])->name('publicaciones.index');
    Route::get('/publicaciones/create', [PostController::class, 'create'])->name('publicaciones.create');
    Route::post('/publicaciones', [PostController::class, 'store'])->name('publicaciones.store');
    Route::get('/publicaciones/{id}', [PostController::class, 'show'])->name('publicaciones.show');
    Route::get('/publicaciones/{id}/edit', [PostController::class, 'edit'])->name('publicaciones.edit');
    Route::put('/publicaciones/{id}', [PostController::class, 'update'])->name('publicaciones.update');
    Route::delete('/publicaciones/{id}', [PostController::class, 'destroy'])->name('publicaciones.destroy');
});
