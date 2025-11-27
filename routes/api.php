<?php

use App\Http\Controllers\Api\v1\CreditController;
use App\Http\Controllers\Api\v1\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::resource('credits', CreditController::class);
    Route::resource('users', UserController::class);

    Route::post('/login', [UserController::class, 'apiLogin']);
    Route::post('/logout', [UserController::class, 'apiLogout'])->middleware('jwt.auth');
});