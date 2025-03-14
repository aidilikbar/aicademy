<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Existing routes...
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [SearchController::class, 'index'])->name('home');
    Route::get('/search/results', [SearchController::class, 'search'])->name('search.results');
    
    // Add this new route
    Route::get('/search/history', [SearchController::class, 'history'])->name('search.history');
});

Route::get('/', [SearchController::class, 'index'])->name('home');
Route::post('/toggle-dark-mode', [SearchController::class, 'toggleDarkMode'])->name('toggle.dark.mode');

require __DIR__.'/auth.php';
