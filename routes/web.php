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

Route::get('/login', function () {
    return redirect(route('userlogin'));
});

// Student Login
Route::get('login/student', 'App\Http\Controllers\Auth\LoginController@showUserloginform')->name('userlogin');
Route::post('/login/student', 'App\Http\Controllers\Auth\LoginController@Userlogin');

// Register Student
Route::get('register/student', 'App\Http\Controllers\Auth\RegisterController@ShowStudentForm')->name('Student.Registerform');
Route::post('/register/student', 'App\Http\Controllers\Auth\RegisterController@RegisterStudent');

// Teacher Login
Route::get('login/teacher', 'App\Http\Controllers\Auth\LoginController@TeacherLoginForm')->name('TeacherLoginForm');
Route::post('/login/teacher', 'App\Http\Controllers\Auth\LoginController@TeacherRquest');

// Admin Login
Route::get('login/admin', 'App\Http\Controllers\Auth\LoginController@AdminLoginForm')->name('AdminLogin');
Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@AdminRequest');

// district handle
Route::post('/district-by-division', 'App\Http\Controllers\Frontend\HomeController@getDistrictsByDivision' );

Route::post('/thana-by-district', 'App\Http\Controllers\Frontend\HomeController@getThanaByDistrict');


Auth::routes(['verify' => true]);
// User Dashboard Fuction
Route::middleware(['verified'])->group(function () {

    Route::get('/notifyseen/{id}', 'App\Http\Controllers\Backend\NotificationController@notify')->name('notify.seend');

    // Student Route Settings
    Route::group(['prefix' => 'student'], function(){
        Route::group(['middleware' => 'student'], function () {
            Route::get('/dashboard','App\Http\Controllers\Backend\Student\DashboardController@index')->name('user.dashboard');
        });
    });
    // Teacher Login Settings 
    Route::group(['prefix' => 'teacher'], function(){
        Route::group(['middleware' => 'teacher'], function () {
            Route::get('/dashboard','App\Http\Controllers\Backend\Teacher\DashboardController@index')->name('teacher.dashboard');
        });
    });
    // Admin Login Settings
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/dashboard','App\Http\Controllers\Backend\Admin\DashboardController@index')->name('admin.dashboard');

            // Course 
            Route::group(['prefix' => 'courses'], function() {
                Route::get('/manage', 'App\Http\Controllers\Backend\Admin\CourseController@index')->name('course.manage');

                Route::get('/create', 'App\Http\Controllers\Backend\Admin\CourseController@create')->name('course.create');

                Route::post('/store', 'App\Http\Controllers\Backend\Admin\CourseController@store')->name('course.store');

                Route::get('/edit/{slug}', 'App\Http\Controllers\Backend\Admin\CourseController@edit')->name('course.edit');

                Route::post('/update/{id}', 'App\Http\Controllers\Backend\Admin\CourseController@update')->name('course.update');

                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\Admin\CourseController@destroy')->name('course.delete');
            });

            // Teacher Setting
            Route::group(['prefix' => 'teacher'], function () {
                Route::get('/manage', 'App\Http\Controllers\Backend\Admin\TeachersController@index')->name('teacher.manage');

                Route::get('/create', 'App\Http\Controllers\Backend\Admin\TeachersController@create')->name('teacher.create');

                Route::post('/store', 'App\Http\Controllers\Backend\Admin\TeachersController@store')->name('teacher.store');

                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Admin\TeachersController@edit')->name('teacher.edit');

                Route::post('/update/{id}', 'App\Http\Controllers\Backend\Admin\TeachersController@update')->name('teacher.update');

                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\Admin\TeachersController@destroy')->name('teacher.delete');
                
            });

            // setting
            Route::group(['prefix' => 'setting'], function(){
                
                Route::get('/manage','App\Http\Controllers\Backend\Admin\SettingController@index')->name('manage.settings');

                Route::post('/general-setting','App\Http\Controllers\Backend\Admin\SettingController@generelsetting')->name('general.settings');

                Route::post('/mail-setting','App\Http\Controllers\Backend\Admin\SettingController@mailsetting')->name('mail.settings');
            });

            
        });
    });
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
