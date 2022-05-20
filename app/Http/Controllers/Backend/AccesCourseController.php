<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Course;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdmissionNotification;
use App\Models\User;
use App\Models\Common\Admission;
use App\Models\Common\CourseResource;
use App\Models\Common\ResourcesItem; 
use CoreProc\WalletPlus\Models\WalletType;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Image;
use File;
use Session;
use Auth;

class AccesCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $slug )
    {
        //
        $course = Course::where('slug', $slug)->first();
        $admission = Admission::where('status', 'active')->where('users_id', Auth::user()->id)->first();
        $sectionTitle = CourseResource::where('crcourse_id', $course->id)->where('status', 'Active')->get();

        if ( !empty($admission) ) {
            return view('Backend.Student.coursepage', compact('admission', 'course', 'sectionTitle',));
        }
        else
        {
            $notification = array(
                'message'       => 'কোর্স অ্যাপ্রুভ হয়নি!!!',
                'alert-type'    => 'error'
            );
    
            return back()->with($notification);
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
