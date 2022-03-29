<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseAssignedNotification;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Common\UserExperience;
use App\Models\Common\UserEducation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use App\Traits\UploadAble;
use Image;
use File;
use Session;
use Auth;

class TeachersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    use UploadAble;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( Auth::user()->role == 'admin' )
        {
            $teacher = User::where('role', 'teacher')->get();
            return view('Backend.Admin.teacher.manage', compact('teacher'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.Admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'name'          =>  ['required', 'string'],
            'lastname'      =>  ['required', 'string'],
            'email'         =>  ['required', 'email', 'email:rfc,dns', 'unique:users'],
            'phone'         =>  ['required', 'unique:users'],
            'dob'           =>  ['required'],
            'address'       =>  ['required', 'string'],
            'division'      =>  ['required'],
            'district'      =>  ['required'],
            'thana'         =>  ['required'],
        ],
        $message = [
            'name.required' =>  'ফাস্ট নাম লিখুন',
            'name.string' =>  'ফাস্ট নাম লিখুন',
            'lastname.required' =>  'ফাস্ট নাম লিখুন',
            'lastname.string' =>  'ফাস্ট নাম লিখুন',
            'email.required' =>  'ই-মেইল আইডি লিখুন',
            'email.email' =>  'সঠিক ই-মেইল আইডি লিখুন',
            'email.unique' =>  'ই-মেইলটি ইতি মধ্যে রয়েছে',
            'phone.unique' =>  'মোবাইল ইতি মধ্যে রয়েছে',
            'phone.required' =>  'মোবাইল লিখুন',
        ]);       


            if (request()->has('image')) {            
                $avatar = request()->file('image');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatarPath = public_path('/images/');
                $avatar->move($avatarPath, $avatarName);
            }

        
            $user = new User();

            $user->name         =   $request->name ." ". $request->lastname;
            $user->email        =   $request->email;
            $user->phone        =   $request->phone;
            $user->studentid    =   $request->teacherId;
            $user->address      =   $request->address ." ". $request->thana ." ". $request->district ." ". $request->division;
            $user->role         =   'teacher';
            $user->password     =   Hash::make(rand(1, 1000000));
            $user->dob          =   date('Y-m-d', strtotime($request['dob']));
            $user->avatar       =   "/images/" . $avatarName;
           
            // $user->save();

            foreach ($request->moreFields as $key => $value) {
                $feaitems = implode(" ",$value->name);
                dd($request->name [$feaitems]); exit();
                UserEducation::insert([
                    'user_id'       =>  $user->id,
                    'ExamName'      =>  $feaitems['name'],
                    'InstituteName' =>  $feaitems['institue'],
                    'PassingYear'   =>  $feaitems['passingyear'],
                ]);
            }

            $notification = array(
                'message'       => 'কোর্স সেভ সম্পন্ন হয়েছে!!!',
                'alert-type'    => 'success'
            );
    
            return redirect()->route('teacher.manage')->with($notification);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $delImage = User::find($id);
        unlink(public_path() .$delImage->avatar);

                
        $delete = User::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "ডিলেট সম্পন্ন হয়েছে!!!";            
        } else {
            $success = false;
            $message = "ডিলেটে ত্রুটি রয়েছে!!!";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
