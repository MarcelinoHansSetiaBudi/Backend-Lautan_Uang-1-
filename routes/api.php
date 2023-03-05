<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FishermanController;
use App\Http\Controllers\FishermanTimController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostalCodeController;

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
Route::delete('location/{id}', [LocationController::class, 'destroy']);


// Postal Code 
Route::get('postal-code', [PostalCodeController::class, 'index']);
Route::post('postal-code', [PostalCodeController::class, 'store']);
Route::get('postal-code/{id}', [PostalCodeController::class, 'show']);
Route::delete('postal-code/{id}', [PostalCodeController::class, 'destroy']);




// handle route not found
Route::fallback(function(Request $request) {
    return response()->json([
        'message' => 'Resource not found.'
    ], 404);
});