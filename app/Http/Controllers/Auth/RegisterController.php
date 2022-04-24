<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use View;
use Response;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','min:8', 'numeric', 'regex:/(?:\d{17}|\d{13}|\d{10})/'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'dob' => ['required', 'date', 'before:today'],
            'avatar' => ['required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (request()->has('avatar')) {            
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
        }
        
        return User::create([
            'name' => $request['firstname']. $request['lastname'],
            'address'      => $request['address1']. $request['thana']. $request['city']. $request['division'],
            'email' => $data['email'],
            'role'     =>  'student',
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'dob' => date('Y-m-d', strtotime($data['dob'])),
            'avatar' => "/images/" . $avatarName,
        ]);
    }


    // Student Registration Form
    public function ShowStudentForm(){
        return view('auth.register', ['url'=>'student']);
    }

    protected function RegisterStudent(Request $request){

        $this->validator($request->all())->validate();
 
         if (request()->has('avatar')) {            
             $avatar = request()->file('avatar');
             $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
             $avatarPath = public_path('/images/');
             $avatar->move($avatarPath, $avatarName);
         }
 
         $student = User::create([
             'name' => $request['firstname']. $request['lastname'],
             'address'      => $request['address1']. $request['thana']. $request['city']. $request['division'],
             'phone' => $request['phone'],
             'address' => $request['address'],
             'role'     =>  'student',
             'email' => $request['email'],
             'studentid'    =>  rand(1, 100000),
             'password' => Hash::make($request['password']),
             'dob' => date('Y-m-d', strtotime($request['dob'])),
             'avatar' => "/images/" . $avatarName,
 
         ]);
 
         $notification = array(
             'message' => 'রেজিস্ট্রেশন সম্পন্ন হয়েছে!',
             'alert-type' => 'success'
         );

         return redirect()->route('userlogin')->with($notification);
 
        // return view('auth.thankyou', ['user' => $teacher])->with($notification);
     }
}
