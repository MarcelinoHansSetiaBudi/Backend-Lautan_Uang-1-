<?php

use App\Http\Controllers\AnimalTypeController;
// use App\Http\Controllers\AnimalTypeDetailController;
use App\Http\Controllers\AssetsDetailController;
use App\Http\Controllers\OperationalCostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\FishermanController;
use App\Http\Controllers\FishermanTimController;
use App\Http\Controllers\FishermanCatchController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostalCodeController;
use App\Http\Controllers\InvestorsController;
use App\Http\Controllers\TypeAssetController;
use App\Http\Controllers\CategoryOperationalCostController;
use App\Http\Controllers\FishermanCatchDetailController;
use App\Http\Controllers\OperationalCostDetailController;
use App\Http\Controllers\PaymentMethodController;
use App\Models\FishermanTim;

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
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: *");

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
    Route::post('register', [InvestorsController::class, 'register']);
    Route::post('login', [InvestorsController::class, 'login']);
    Route::post('logout', [InvestorsController::class, 'logout']);
    Route::post('refresh', [InvestorsController::class, 'refresh']);
    Route::post('me', [InvestorsController::class, 'me']);
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
    Route::get('fisherman-tim-province',[FishermanTimController::class, 'getFishermanTimByProvince']);
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

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Animal Type
    Route::get('animal-type', [AnimalTypeController::class, 'index']);
    Route::post('animal-type',[AnimalTypeController::class, 'store']);
    Route::get('animal-type/{id}', [AnimalTypeController::class, 'show']);
    Route::put('animal-type/{id}', [AnimalTypeController::class, 'update']);
    Route::delete('animal-type/{id}', [AnimalTypeController::class, 'destroy']);
});

// Route::group([
//     'middleware' => ['api', 'jwt.auth'],

// ], function ($router) {
// // Animal Type Detail
//     Route::get('animal-type-detail', [AnimalTypeDetailController::class, 'index']);
//     Route::post('animal-type-detail', [AnimalTypeDetailController::class, 'store']);
//     Route::get('animal-type-detail/{id}', [AnimalTypeDetailController::class, 'show']);
//     Route::put('animal-type-detail/{id}', [AnimalTypeDetailController::class, 'update']);
//     Route::delete('animal-type-detail/{id}', [AnimalTypeDetailController::class, 'destroy']);
// });

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Assets Detail
    Route::get('assets-detail', [AssetsDetailController::class, 'index']);
    Route::post('assets-detail', [AssetsDetailController::class, 'store']);
    Route::get('assets-detail/{id}', [AssetsDetailController::class, 'show']);
    Route::put('assets-detail/{id}', [AssetsDetailController::class, 'update']);
    Route::delete('assets-detail/{id}', [AssetsDetailController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Type Asset
    Route::get('type-asset', [TypeAssetController::class, 'index']);
    Route::post('type-asset', [TypeAssetController::class, 'store']);
    Route::get('type-asset/{id}', [TypeAssetController::class, 'show']);
    Route::put('type-asset/{id}', [TypeAssetController::class, 'update']);
    Route::delete('type-asset/{id}', [TypeAssetController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Fisherman Catch
    Route::get('fisherman-catch', [FishermanCatchController::class, 'index']);
    Route::post('fisherman-catch', [FishermanCatchController::class, 'store']);
    Route::get('fisherman-catch/{id}', [FishermanCatchController::class, 'show']);
    Route::put('fisherman-catch/{id}', [FishermanCatchController::class, 'update']);
    Route::delete('fisherman-catch/{id}', [FishermanCatchController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Fisherman Catch Detail
    Route::get('fisherman-catch-detail', [FishermanCatchDetailController::class, 'index']);
    Route::post('fisherman-catch-detail', [FishermanCatchDetailController::class, 'store']);
    Route::get('fisherman-catch-detail/{id}', [FishermanCatchDetailController::class, 'show']);
    Route::put('fisherman-catch-detail/{id}', [FishermanCatchDetailController::class, 'update']);
    Route::delete('fisherman-catch-detail/{id}', [FishermanCatchDetailController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Category Operational Cost
    Route::get('category-operational-cost', [CategoryOperationalCostController::class, 'index']);
    Route::post('category-operational-cost', [CategoryOperationalCostController::class, 'store']);
    Route::get('category-operational-cost/{id}', [CategoryOperationalCostController::class, 'show']);
    Route::put('category-operational-cost/{id}', [CategoryOperationalCostController::class, 'update']);
    Route::delete('category-operational-cost/{id}', [CategoryOperationalCostController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Operational Cost
    Route::get('operational-cost', [OperationalCostController::class, 'index']);
    Route::post('operational-cost', [OperationalCostController::class, 'store']);
    Route::get('operational-cost/{id}', [OperationalCostController::class, 'show']);
    Route::put('operational-cost/{id}', [OperationalCostController::class, 'update']);
    Route::delete('operational-cost/{id}', [OperationalCostController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Operational Cost Detail
    Route::get('operational-cost-detail', [OperationalCostDetailController::class, 'index']);
    Route::post('operational-cost-detail', [OperationalCostDetailController::class, 'store']);
    Route::get('operational-cost-detail/{id}', [OperationalCostDetailController::class, 'show']);
    Route::put('operational-cost-detail/{id}', [OperationalCostDetailController::class, 'update']);
    Route::delete('operational-cost-detail/{id}', [OperationalCostDetailController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Payment Method
    Route::get('payment-method', [PaymentMethodController::class, 'index']);
    Route::post('payment-method', [PaymentMethodController::class, 'store']);
    Route::get('payment-method/{id}', [PaymentMethodController::class, 'show']);
    Route::put('payment-method/{id}', [PaymentMethodController::class, 'update']);
    Route::delete('payment-method/{id}', [PaymentMethodController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Bank
    Route::get('bank', [BankController::class, 'index']);
    Route::post('bank', [BankController::class, 'store']);
    Route::get('bank/{id}', [BankController::class, 'show']);
    Route::put('bank/{id}', [BankController::class, 'update']);
    Route::delete('bank/{id}', [BankController::class, 'destroy']);
});

Route::group([
    'middleware' => ['api', 'jwt.auth'],

], function ($router) {
// Bank Account
    Route::get('bank-account', [BankAccountController::class, 'index']);
    Route::post('bank-account', [BankAccountController::class, 'store']);
    Route::get('bank-account/{id}', [BankAccountController::class, 'show']);
    Route::put('bank-account/{id}', [BankAccountController::class, 'update']);
    Route::delete('bank-account/{id}', [BankAccountController::class, 'destroy']);
});


// handle route not found
Route::fallback(function(Request $request) {
    return response()->json([
        'message' => 'Resource not found.'
    ], 404);
});