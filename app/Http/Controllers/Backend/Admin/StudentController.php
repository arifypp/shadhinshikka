<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Common\UserExperience;
use App\Models\Common\UserEducation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use App\Traits\UploadAble;
use Illuminate\Support\Facades\Storage;
use Image;
use File;
use Session;
use Auth;
use DB;

class StudentController extends Controller
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
            $student = User::where('role', 'student')->get();
            return view('Backend.Admin.student.manage', compact('student'));
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
        return view('Backend.Admin.student.create');

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
            'name.required' =>  '??????????????? ????????? ???????????????',
            'name.string' =>  '??????????????? ????????? ???????????????',
            'lastname.required' =>  '??????????????? ????????? ???????????????',
            'lastname.string' =>  '??????????????? ????????? ???????????????',
            'email.required' =>  '???-???????????? ???????????? ???????????????',
            'email.email' =>  '???????????? ???-???????????? ???????????? ???????????????',
            'email.unique' =>  '???-?????????????????? ????????? ??????????????? ???????????????',
            'phone.unique' =>  '?????????????????? ????????? ??????????????? ???????????????',
            'phone.required' =>  '?????????????????? ???????????????',
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
            $user->role         =   'student';
            $user->password     =   Hash::make(rand(1, 1000000));
            $user->dob          =   date('Y-m-d', strtotime($request['dob']));
            $user->avatar       =   "/images/" . $avatarName;
           
            $user->save();

            // Add all education experience
            foreach ($request->moreFields as $key => $value) {
                UserEducation::insert([
                    'user_id'       => $user->id,
                    'ExamName'      => $value['ExamName'],
                    'InstituteName' => $value['InstituteName'],
                    'PassingYear'   => $value['PassingYear'],
                ]);
            }

            // add all working experience            
            foreach ($request->experience as $key => $value) {
                UserExperience::insert([
                    'user_id'       => $user->id,
                    'InstituteName' => $value['companyname'],
                    'from_date'     => $value['fromdate'],
                    'end_date'      =>$value['todate'],
                ]);
            }

            $token = Str::random(64);

            DB::table(config('auth.passwords.users.table'))->insert([
                'email' => $user->email, 
                'token' => bcrypt($token),
            ]);

            $UserPassReset = User::where('id', $user->id)->get();
            Notification::send($UserPassReset, new ResetPassword($token));
            

            $notification = array(
                'message'       => '?????????????????????????????? ???????????? ????????????????????? ???????????????!!!',
                'alert-type'    => 'success'
            );
    
            return redirect()->route('student.manage')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($studentid)
    {
        //
        $user = User::find($studentid);
        $Education = UserEducation::where('user_id', $user->id)->get();
        $Experiece = UserExperience::where('user_id', $user->id)->get();
        if( $user )
        {
            return view('Backend.Admin.student.show', compact('user', 'Education', 'Experiece'));
        }
        else
        {
            $notification = array(
                'message'       => '?????????????????? ??????????????? ???????????????!!!',
                'alert-type'    => 'error'
            );
    
            return back()->with($notification);
        }
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
        $user = User::find($id);

        $Education = UserEducation::where('user_id', $user->id)->get();
        $Experiece = UserExperience::where('user_id', $user->id)->get();


        if( !empty( $user ) )
        {
            return view('Backend.Admin.student.edit', compact('user', 'Education', 'Experiece'));
        }
        else{

            $notification = array(
                'message'       => '???????????? ?????????????????????????????? ??????????????? ??????????????? ???????????????!!!',
                'alert-type'    => 'info'
            ); 
            
            return back()->with($notification);
        }
    }

    // update student status
    public function status(Request $request, $id)
    {
        $userdata = User::find($id);

        if( $userdata->status == 1 )
        {
            $userdata->status = 0; //0 meant suspend user or deactive user
        }
        else if($userdata->status == 0)
        {
            $userdata->status = 1; //1 meant suspend user or active user
        }


        $userdata->save();

        $notification = array(
            'message'       => $userdata->name.' ???????????????????????? ????????????????????? ???????????????!!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('student.manage')->with($notification);
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
        $user = User::find($id);

        $user->name         =   $request->name;
        $user->email        =   $request->email;
        $user->phone        =   $request->phone;
        $user->studentid    =   $request->teacherId;
        $user->address      =   $request->address ." ". $request->thana ." ". $request->district ." ". $request->division;
        $user->role         =   'student';
        $user->dob          =   date('Y-m-d', strtotime($request['dob']));

        if( !is_null($request->image) )
        {
            // Delete Existing Image
            if( File::exists('images/' . $user->avatar) ) {
                File::delete('images/' . $user->avatar);
            }

            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' ."/images/".$img);

            Image::make($image)->save($location);
            $user->avatar = $img;

        }
       
        $user->save();
       

        $notification = array(
            'message'       => '?????????????????????????????? ?????????????????? ????????????????????? ???????????????!!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('student.manage')->with($notification);
    }

    // Reset password
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->get('password'));
        $user->update();
        if ($user) {

            $notification = array(
                'message'       => 'Password updated successfully!',
                'alert-type'    => 'success'
            );
            return back()->with($notification);
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
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
        //delete education
        $UserEducation = UserEducation::where('user_id', $id)->get();        
        foreach ($UserEducation as $education) {
            $education->delete();
        }

        $UserExperience = UserExperience::where('user_id', $id)->get();        
        foreach ($UserExperience as $experiece) {
            $experiece->delete();
        }

        $delImage = User::find($id);
        unlink(public_path() .$delImage->avatar);

                
        $delete = User::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "??????????????? ????????????????????? ???????????????!!!";            
        } else {
            $success = false;
            $message = "?????????????????? ?????????????????? ???????????????!!!";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
