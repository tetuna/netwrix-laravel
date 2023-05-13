<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\PartnerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function (Request $request) {
    return "Hello Netwrix!";
});

Route::get('countries', [CountryController::class, 'index']);
Route::get('states', [StateController::class, 'index']);
Route::get('states/search-by-country', [StateController::class, 'searchByCountry']);
Route::get('partners', [PartnerController::class, 'index']);
Route::get('partners/search', [PartnerController::class, 'search']);