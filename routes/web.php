<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

Auth::routes();

// User Login
Route::get('login/student', 'App\Http\Controllers\Auth\LoginController@showUserloginform')->name('userlogin');
Route::post('/login/student', 'App\Http\Controllers\Auth\LoginController@Userlogin');


Auth::routes(['verify' => true]);
// User Dashboard Fuction
Route::middleware(['verified'])->group(function () {
    Route::group(['prefix' => 'student'], function(){
        Route::group(['middleware' => 'student'], function () {
            Route::get('/dashboard','App\Http\Controllers\Backend\Student\DashboardController@index')->name('user.dashboard');
        });
    });
});


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
