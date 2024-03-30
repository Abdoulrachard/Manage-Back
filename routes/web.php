<?php

use App\Http\Controllers\ActualityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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
Route::middleware('auth')->group(function () {
Route::get('/', function () {
    return view('welcome');
});
});

Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('actuality', ActualityController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('equipe', EquipeController::class);
})->name('dashboard.');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
