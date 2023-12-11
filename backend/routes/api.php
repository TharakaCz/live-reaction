<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsersController;

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


Route::prefix('v1')->group(function (){

    Route::controller(AuthController::class)->prefix('auth')->group(function (){
        Route::post('sign-in', 'signIn');
        Route::post('sign-up', 'signUp');
        Route::middleware('auth:api')->post('sign-out', 'signOut');
    });

    Route::controller(UsersController::class)->prefix('user')->group(function (){
        Route::middleware([
            'auth:api'])->post('create', 'create');
    });
});

