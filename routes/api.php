<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

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

Route::as('api.')->prefix('v1')->group(function () {
    # AUTH MODULES
    Route::post('auth/login', [AuthController::class, 'login'])->name('login');
    Route::post('auth/register', [AuthController::class, 'register'])->name('register');
    Route::post('auth/verify', [AuthController::class, 'verify'])->name('verify');
    Route::post('auth/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('auth/check-code', [AuthController::class, 'checkCode'])->name('check-code');
    Route::post('auth/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');

    Route::middleware('auth:api')->group(function () {
        # PROFILES
        Route::get('profiles', [AuthController::class, 'profile'])->name('profiles');        
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
