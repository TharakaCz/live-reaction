<?php

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

Route::get('/', function () {
//    return view('welcome');
    return substr(exec('getmac'), 0, 17);
});

Route::controller(\App\Http\Controllers\UsersController::class)->prefix('user')->name('user.')->group(function (){
    Route::get('create', 'create')->name('create');
});
