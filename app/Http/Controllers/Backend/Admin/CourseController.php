<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Course;
use App\Models\Backend\Admin\CourseItem;
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
        $this->middleware('admin');
    }

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
            $course = Course::orderby('id', 'desc')->get();
            return view('Backend.Admin.courses.manage', compact('course'));
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
        if ( Auth::user()->role == 'admin' )
        {
            return view('Backend.Admin.courses.create');
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
        $request->validate([
            'cname'             =>  ['required'],
            'cseat'             =>  ['required'],
            'cstartdate'        =>  ['required'],
            'clocation'         =>  ['required', 'not_in:0'],
            'cteacher'          =>  ['required', 'not_in:0'],
            'cenddate'          =>  ['required'],
            'cprise'            =>  ['required'],
            'moreFields.*.name' => ['required'],
        ],
        $message = [
            'cname.required'        =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cseat.required'        =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cstartdate.required'   =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cstartdate.date'   =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cstartdate.after'   =>  'তথ্যটি পূরণ করা আবশ্যক',
            'clocation.required'    =>  'তথ্যটি পূরণ করা আবশ্যক',
            'clocation.not_in'    =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cteacher.required'     =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cteacher.not_in'     =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cenddate.required'     =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cenddate.date'     =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cenddate.after'     =>  'তথ্যটি পূরণ করা আবশ্যক',
            'cprise.required'       =>  'তথ্যটি পূরণ করা আবশ্যক',
        ]);


        $course = new Course();

        $course->name                   =   $request->cname;
        $course->slug                   =   Str::slug($request->cname);
        $course->student_capacity       =   $request->cseat;
        $course->batch_no               =   $request->cbatch;
        $course->teacher                =   $request->cteacher;
        $course->start_on               =   $request->cstartdate;
        $course->end_on                 =   $request->cenddate;
        $course->class_location         =   $request->clocation;
        $course->price                  =   $request->cprise;

        if( $request->image )
        {
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('assets/images/course/' . $img);

            Image::make($image)->save($location);
            $course->image = $img;

        }

        $course->save();

        foreach ($request->moreFields as $key => $value) {
            $feaitems = implode(" ",$value);

            CourseItem::insert([
                'course_id' =>  $course->id,
                'name' => $feaitems,
            ]);
        }
        

        $notification = array(
            'message'       => 'কোর্স সেভ সম্পন্ন হয়েছে!!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('course.manage')->with($notification);


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
    public function edit($slug)
    {
        //
        $courses = Course::where('slug', $slug)->first();

        $coursefeatures = CourseItem::where('course_id', $courses->id)->get();

        if( !empty( $slug ) )
        {
            return view('Backend.Admin.courses.edit', compact('courses', 'coursefeatures'));
        }
        else{

            $notification = array(
                'message'       => 'কোনো কোর্স খুজেঁ পাওয়া যায়নি!!!',
                'alert-type'    => 'info'
            ); 
            
            return back()->with($notification);
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
