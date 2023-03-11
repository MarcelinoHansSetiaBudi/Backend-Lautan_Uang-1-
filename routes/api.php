<?php

use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\AnimalTypeDetailController;
use App\Http\Controllers\AssetsDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FishermanController;
use App\Http\Controllers\FishermanTimController;
use App\Http\Controllers\FishermanCatchController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostalCodeController;
use App\Http\Controllers\InvestorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// Investor route login register
Route::group([
    'middleware' => 'api',
    'prefix' => 'investor'

], function ($router) {
    Route::post('register', [InvestorController::class, 'register']);
    Route::post('login', [InvestorController::class, 'login']);
    Route::post('logout', [InvestorController::class, 'logout']);
    Route::post('refresh', [InvestorController::class, 'refresh']);
    Route::post('me', [InvestorController::class, 'me']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
    Route::get('fisherman', [FishermanController::class, 'index']);
    Route::post('fisherman', [FishermanController::class, 'store']);
    Route::get('fisherman/{id}', [FishermanController::class, 'show']);
    Route::put('fisherman/{id}', [FishermanController::class, 'update']);
    Route::delete('fisherman/{id}', [FishermanController::class, 'destroy']);
});

// Fisherman Tim using jwt
Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
    Route::get('fisherman-tim', [FishermanTimController::class, 'index']);
    Route::post('fisherman-tim', [FishermanTimController::class, 'store']);
    Route::get('fisherman-tim/{id}', [FishermanTimController::class, 'show']);
    Route::put('fisherman-tim/{id}', [FishermanTimController::class, 'update']);
    Route::delete('fisherman-tim/{id}', [FishermanTimController::class, 'destroy']);
});

// Location api
Route::get('location', [LocationController::class, 'index']);
Route::post('location', [LocationController::class, 'store']);
Route::get('location/{id}', [LocationController::class, 'show']);
Route::put('location/{id}', [LocationController::class, 'update']);
Route::delete('location/{id}', [LocationController::class, 'destroy']);


// Postal Code 
Route::get('postal-code', [PostalCodeController::class, 'index']);
Route::post('postal-code', [PostalCodeController::class, 'store']);
Route::get('postal-code/{id}', [PostalCodeController::class, 'show']);
Route::put('postal-code/{id}', [PostalCodeController::class, 'update']);
Route::delete('postal-code/{id}', [PostalCodeController::class, 'destroy']);

// Animal Type
Route::get('animal-type', [AnimalTypeController::class, 'index']);
Route::post('animal-type',[AnimalTypeController::class, 'store']);
Route::get('animal-type/{id}', [AnimalTypeController::class, 'show']);
Route::put('animal-type/{id}', [AnimalTypeController::class, 'update']);
Route::delete('animal-type/{id}', [AnimalTypeController::class, 'destroy']);

// Animal Type Detail
Route::get('animal-type-detail', [AnimalTypeDetailController::class, 'index']);
Route::post('animal-type-detail', [AnimalTypeDetailController::class, 'store']);
Route::get('animal-type-detail/{id}', [AnimalTypeDetailController::class, 'show']);
Route::put('animal-type-detail/{id}', [AnimalTypeDetailController::class, 'update']);
Route::delete('animal-type-detail/{id}', [AnimalTypeDetailController::class, 'destroy']);

// Assets Detail
Route::get('assets-detail', [AssetsDetailController::class, 'index']);
Route::post('assets-detail', [AssetsDetailController::class, 'store']);
Route::get('assets-detail/{id}', [AssetsDetailController::class, 'show']);
Route::put('assets-detail/{id}', [AssetsDetailController::class, 'update']);
Route::delete('assets-detail/{id}', [AssetsDetailController::class, 'destroy']);

// Fisherman Catch
Route::get('fisherman-catch', [FishermanCatchController::class, 'index']);
Route::post('fisherman-catch', [FishermanCatchController::class, 'store']);
Route::get('fisherman-catch/{id}', [FishermanCatchController::class, 'show']);
Route::put('fisherman-catch/{id}', [FishermanCatchController::class, 'update']);
Route::delete('fisherman-catch/{id}', [FishermanCatchController::class, 'destroy']);


// handle route not found
Route::fallback(function(Request $request) {
    return response()->json([
        'message' => 'Resource not found.'
    ], 404);
});