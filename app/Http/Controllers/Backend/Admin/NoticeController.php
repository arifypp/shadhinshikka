<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Course;
use App\Models\Backend\Admin\Notice;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NoticeNotification;
use App\Models\User;
use App\Models\Common\Admission;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use File;
use Session;
use Auth;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notice = Notice::all();
        return view('Backend.Admin.notice.manage', compact('notice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = Course::all();
        $users = User::all();
        return view('Backend.Admin.notice.create', compact('courses', 'users'));
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
            'course'    =>  ['required', 'not_in:0'],
            'reciever'  =>  ['required', 'not_in:0'],
            'title'     =>  ['required'],
            'message'   =>  ['required'],
        ],
        $message = [
            'course.required'       =>  'তথ্যটি পূরণ করা আবশ্যক!',
            'reciever.required'     =>  'তথ্যটি পূরণ করা আবশ্যক!',
            'title.required'        =>  'তথ্যটি পূরণ করা আবশ্যক!',
            'message.required'      =>  'তথ্যটি পূরণ করা আবশ্যক!',
        ]);

        $notice = new Notice;

        $notice->course_id      =   $request->course;
        $notice->reciever       =   $request->reciever; //1 for student 2 for teacher
        $notice->title          =   $request->title;
        $notice->description    =   $request->message;
        $notice->created_at     =   Carbon::now()->format('Y-m-d H:i:s');
        $notice->save();

        $adm = Admission::where('courses_id', $notice->course_id)->where('status', 'active')->get();      
        
        if ( $request->reciever == 1 ) {
            foreach ($adm as $key => $admissionuserid) {
                $user = User::where('id', $admissionuserid->users_id)->get();
                Notification::send($user, new NoticeNotification($notice));
            }
        }
        else if ( $request->reciever == 2 ) {
            $user = User::where('id', $notice->courses->teacher)->get();
            Notification::send($user, new NoticeNotification($notice));
        }
                

        $notification = array(
            'message'       => 'নোটিশ সেন্ড সম্পন্ন হয়েছে!!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('notice.manage')->with($notification);

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
        $notice = Notice::find($id);
        $courses = Course::all();

        if ( !is_null($notice) ) {
            return view('Backend.Admin.notice.edit', compact('notice', 'courses'));
        }
        else
        {
            $notification = array(
                'message'       => 'নোটিশ খুঁজে পাওয়া যায়নি!!!',
                'alert-type'    => 'error'
            );
    
            return redirect()->route('notice.manage')->with($notification);
        }

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
        $request->validate([
            'course'    =>  ['required', 'not_in:0'],
            'reciever'  =>  ['required', 'not_in:0'],
            'title'     =>  ['required'],
            'message'   =>  ['required'],
        ],
        $message = [
            'course.required'       =>  'তথ্যটি পূরণ করা আবশ্যক!',
            'reciever.required'     =>  'তথ্যটি পূরণ করা আবশ্যক!',
            'title.required'        =>  'তথ্যটি পূরণ করা আবশ্যক!',
            'message.required'      =>  'তথ্যটি পূরণ করা আবশ্যক!',
        ]);

        $notice = Notice::find($id);

        $notice->course_id      =   $request->course;
        $notice->reciever       =   $request->reciever;
        $notice->title          =   $request->title;
        $notice->description    =   $request->message;

        $notice->save();

        $notification = array(
            'message'       => 'নোটিশ সেন্ড সম্পন্ন হয়েছে!!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('notice.manage')->with($notification);
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
        $delete = Notice::where('id', $id)->delete();

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
