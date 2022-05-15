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

    // Payment Routes for bKash
    Route::post('bkash/get-token', 'App\Http\Controllers\Backend\BkashController@getToken')->name('bkash-get-token');
    Route::post('bkash/create-payment', 'App\Http\Controllers\Backend\BkashController@createPayment')->name('bkash-create-payment');
    Route::post('bkash/execute-payment', 'App\Http\Controllers\Backend\BkashController@executePayment')->name('bkash-execute-payment');
    Route::get('bkash/query-payment', 'App\Http\Controllers\Backend\BkashController@queryPayment')->name('bkash-query-payment');
    Route::post('bkash/success', 'App\Http\Controllers\Backend\BkashController@bkashSuccess')->name('bkash-success');

    // Student Route Settings
    Route::group(['prefix' => 'student'], function(){
        Route::group(['middleware' => 'student'], function () {
            Route::get('/dashboard','App\Http\Controllers\Backend\Student\DashboardController@index')->name('user.dashboard');

            Route::get('/profile/{studentid}','App\Http\Controllers\Backend\Student\DashboardController@profile')->name('user.profile');

            Route::group(['prefix' => 'purchase'], function() {
                Route::get('/course/{slug}','App\Http\Controllers\Backend\Student\PurchaseController@index')->name('purchase.course');

                Route::post('/confirm','App\Http\Controllers\Backend\Student\PurchaseController@store')->name('purchase.confirm');
                
            });
                
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

                Route::get('/show/{studentid}', 'App\Http\Controllers\Backend\Admin\TeachersController@show')->name('teacher.show');

                Route::post('/store', 'App\Http\Controllers\Backend\Admin\TeachersController@store')->name('teacher.store');

                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Admin\TeachersController@edit')->name('teacher.edit');

                Route::post('/update/{id}', 'App\Http\Controllers\Backend\Admin\TeachersController@update')->name('teacher.update');

                Route::get('/status/{id}', 'App\Http\Controllers\Backend\Admin\TeachersController@status')->name('teacher.status');


                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\Admin\TeachersController@destroy')->name('teacher.delete');
                
            });

            // Student Setting
            Route::group(['prefix' => 'student'], function () {
                Route::get('/manage', 'App\Http\Controllers\Backend\Admin\StudentController@index')->name('student.manage');

                Route::get('/create', 'App\Http\Controllers\Backend\Admin\StudentController@create')->name('student.create');

                Route::get('/show/{studentid}', 'App\Http\Controllers\Backend\Admin\StudentController@show')->name('student.show');

                Route::post('/store', 'App\Http\Controllers\Backend\Admin\StudentController@store')->name('student.store');

                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Admin\StudentController@edit')->name('student.edit');

                Route::post('/update/{id}', 'App\Http\Controllers\Backend\Admin\StudentController@update')->name('student.update');

                Route::get('/status/{id}', 'App\Http\Controllers\Backend\Admin\StudentController@status')->name('student.status');


                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\Admin\StudentController@destroy')->name('student.delete');
            });
            // Notice controlling
            Route::group(['prefix' => 'notice'], function () {
                Route::get('/manage', 'App\Http\Controllers\Backend\Admin\NoticeController@index')->name('notice.manage');

                Route::get('/create', 'App\Http\Controllers\Backend\Admin\NoticeController@create')->name('notice.create');

                Route::get('/show/{studentid}', 'App\Http\Controllers\Backend\Admin\NoticeController@show')->name('notice.show');

                Route::post('/store', 'App\Http\Controllers\Backend\Admin\NoticeController@store')->name('notice.store');

                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Admin\NoticeController@edit')->name('notice.edit');

                Route::post('/update/{id}', 'App\Http\Controllers\Backend\Admin\NoticeController@update')->name('notice.update');

                Route::get('/status/{id}', 'App\Http\Controllers\Backend\Admin\NoticeController@status')->name('notice.status');


                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\Admin\NoticeController@destroy')->name('notice.delete');
            });

            // Admission list and details
            Route::group(['prefix' => 'admission'], function(){
                Route::get('/manage','App\Http\Controllers\Backend\Admin\AdmissionController@index')->name('manage.admission');
                Route::get('/pending','App\Http\Controllers\Backend\Admin\AdmissionController@pending')->name('pending.admission');
            });

            // setting
            Route::group(['prefix' => 'setting'], function(){
                
                Route::get('/manage','App\Http\Controllers\Backend\Admin\SettingController@index')->name('manage.settings');

                Route::post('/general-setting','App\Http\Controllers\Backend\Admin\SettingController@generelsetting')->name('general.settings');

                Route::post('/mail-setting','App\Http\Controllers\Backend\Admin\SettingController@mailsetting')->name('mail.settings');

                Route::get('/wallet/manage','App\Http\Controllers\Backend\Admin\SettingController@wallet')->name('manage.wallet');

                Route::post('/wallet/manage/request','App\Http\Controllers\Backend\Admin\SettingController@walletstore')->name('settings.walletstore');

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
