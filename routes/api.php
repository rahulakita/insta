<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ImageUploadController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\SearchController;

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

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::middleware('auth:api')->group(function() {
    Route::get('/profile',[AuthController::class, 'profile']);
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::post('/upload',[ImageUploadController::class,'imageUpload']);
    Route::get('/view',[ImageController::class, 'view']);
    Route::get('/search',[SearchController::class, 'search']);
});