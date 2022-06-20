<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendDuePayment;
use App\Models\Backend\Admin\Course;
use App\Models\User;
use App\Models\Backend\Admin\ProgressPayment;
use App\Models\Common\Admission;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Image;
use File;
use Session;
use Auth;

class CourseController extends Controller
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
            $admissions = Admission::where('users_id', Auth::id())->get() ?: app(Admission::class);
            
            
            return view('Backend.Student.courses', compact('courses', 'admissions'));
            
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
        $request->validate([
            'number'    => ['required' , 'numeric', 'digits:11'],
            'traxID'    => ['required', 'unique:progress_payments,traxid'],
            'TrxID'     => ['accepted']
        ],
        $message = [
            'number.required'   =>   'সঠিকভাবে নাম্বার লিখুন!',
            'number.numeric'   =>   'সঠিকভাবে নাম্বার লিখুন!',
            'number.digits'   =>   '১১ ডিজিটের নাম্বার লিখুন!',
            'traxID.required'   =>   'ট্রান্সিকশন আইডি দিন!',
            'traxID.unique'   =>   'ভুল ট্রান্সিকশন আইডি!',
            'TrxID.accepted'   =>   'টিওএস একসেপট করুন!',
        ]);

        $payment = new ProgressPayment();
        $payment->traxid            = $request->traxID;
        $payment->phone             = $request->number;
        $payment->status            = 'Inactive';
        $payment->course_id         = $request->course_ids;
        $payment->student_id        = $request->user_id;
        $payment->admission_id      = $request->admission_id;
        
        $payment->save();

        
        $studentNotify = User::where('id', $payment->student_id)->get();
        Notification::send($studentNotify, new SendDuePayment($payment));

        $adminID = User::where('role', 'admin')->get();
        Notification::send($adminID, new SendDuePayment($payment));

        return response()->json(['success' =>true, 'message'=> 'পেমেন্ট সম্পন্ন হয়েছে!!!', "redirect_url"=>route('user.dashboard')]);
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
