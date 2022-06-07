<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Response;
use Session;

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

    public function authenticated()
    {
        if (auth()->user()) {
            return redirect(route('user.dashboard'));
        }
        else {
            return redirect(route('userlogin'));
        }
    }

    // This is for user login form
    public function showUserloginform(){
        return view('auth.login', ['url'=>'student']);
    }

    // this is for user login access 
    public function Userlogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:8'
        ]);
    

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true) || Auth::attempt(['phone' => request('phone'), 'password' => request('password')], true)) {
            if(Auth::user()->role == 'student')
            {
                $notification = array(
                    'message' => 'স্বাগতম লগইন সম্পন্ন হয়েছে!',
                    'alert-type' => 'success'
                );
                return redirect()->route('user.dashboard')->with($notification);
            }
            
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(
            [
                'email' => 'Email or Password doesn\'t matched in our database!',
            ]
        );
    }

    // This is for teacher login form
    public function TeacherLoginForm()
    {
        return view('auth.login', ['url'=>'teacher']);
    }

    // Teacher login action form
    public function TeacherRquest(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:8'
        ]);
    

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true) || Auth::attempt(['phone' => request('phone'), 'password' => request('password')], true)) {
            if(Auth::user()->role == 'teacher')
            {
                $notification = array(
                    'message' => 'স্বাগতম লগইন সম্পন্ন হয়েছে!',
                    'alert-type' => 'success'
                );
                return redirect()->route('teacher.dashboard')->with($notification);
            }
            
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(
            [
                'email' => 'Email or Password doesn\'t matched in our database!',
            ]
        );
    }

    // This is admin login 
    public function AdminLoginForm()
    {
        if( Auth::check() )
        {
            $notification = array(
                'message' => 'আপনি লগডইন অবস্থায় রয়েছেন!',
                'alert-type' => 'warning'
            );

            return redirect()->route('admin.dashboard')->with($notification);

        } else {
            return view('auth.login', ['url'=>'admin']);
        }
    }

    // Admin Login Request 
    public function AdminRequest(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:8'
        ]);
    

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true) || Auth::attempt(['phone' => request('phone'), 'password' => request('password')], true)) {
            if(Auth::user()->role == 'admin')
            {
                $notification = array(
                    'message' => 'স্বাগতম লগইন সম্পন্ন হয়েছে!',
                    'alert-type' => 'success'
                );
                return redirect()->route('admin.dashboard')->with($notification);
            }
            
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(
            [
                'email' => 'You Dont have acceess in this page!',
            ]
        );
    }
}
