<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Course;
use App\Models\Backend\Admin\CourseItem;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseAssignedNotification;
use App\Models\User;
use App\Models\Common\Admission;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Image;
use File;
use Session;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( Auth::user()->role == 'student' )
        {
            $courses = Course::orderby('id', 'desc')->get();
            $admission = Admission::where('users_id', Auth::user()->id)->first() ?: app(Admission::class);;
            
            return view('Backend.Student.dashboard', compact('courses', 'admission'));
            
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($studentid)
    {
        //
        $student = User::where('studentid', $studentid)->first();

        if ( !empty($student) ) {
            return view('Backend.Student.profile', compact('student'));
        }
        else
        {
            $notification = array(
                'message'       => 'ডাটা পাওয়া যায়নি!!!',
                'alert-type'    => 'error'
            );
    
            return back()->with($notification);
        }
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
    }
}
