<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/',[UserController::class,'index']);
    Route::get('register',[UserController::class,'create']);
    Route::post('user-register',[UserController::class,'store'])->name('user-register');
    Route::post('user-login',[UserController::class,'user_login'])->name('user-login');
    Route::post('email-exists', [UserController::class, 'email_exists']);
    Route::post('get-states', [UserController::class, 'getState']);
    Route::post('get-cities', [UserController::class, 'getCity']);    
});

Route::group(['middleware' => ['activeUser']], function () {
    Route::get('dashboard',[UserController::class,'user_dashboard']);
    Route::get('logout', [UserController::class, 'logout']);
});