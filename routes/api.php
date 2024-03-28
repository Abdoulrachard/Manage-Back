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
Route::get('/actuality',[App\Http\Controllers\Api\ActualityController::class, 'index']);
Route::get('/actuality/{actuality}',[App\Http\Controllers\Api\ActualityController::class, 'show']);
Route::get('/equipe',[App\Http\Controllers\Api\EquipeController::class, 'index']);
Route::get('/equipe/{equipe}',[App\Http\Controllers\Api\EquipeController::class, 'show']);
Route::get('/project',[App\Http\Controllers\Api\ProjectController::class, 'index']);
Route::get('/project/{project}',[App\Http\Controllers\Api\ProjectController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
