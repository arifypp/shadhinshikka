<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'লগআউট সম্পন্ন হয়েছে!',
            'alert-type' => 'error'
        );
        return redirect('/login/student')->with($notification);
    }

    // this is for admin 
    // public function showAdminloginform()
    // {
    //     return view('auth.login', ['url'=>'admin']);
    // }

    // this is for agent
    // public function showUserAgentloginform()
    // {
    //     return view('auth.login', ['url'=>'agent']);
    // }
    // This is for user login form
    public function showUserloginform(){
        return view('auth.login', ['url'=>'user']);
    }
}
