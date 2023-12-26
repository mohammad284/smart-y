<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::namespace("Admin")->prefix('admin')->group(function(){  
    Route::namespace('Auth')->group(function(){
        Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
        Route::post('/login',[LoginController::class,'login']);
        Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/home',[HomeController::class,'index'])->name('admin.home');

    });

});