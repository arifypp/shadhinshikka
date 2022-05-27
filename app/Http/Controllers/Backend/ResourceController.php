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
use App\Models\Common\CodeResource;
use CoreProc\WalletPlus\Models\WalletType;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Image;
use Carbon\Carbon;
use Session;
use Auth;
use DB;
class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $resources = CourseResource::orderBy('id', 'desc')->get();
        $items = ResourcesItem::where('resource_id', $resources['0']->id)->first() ?: app(ResourcesItem::class);
        return view('Backend.Admin.resource.manage', compact('resources', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $resources = CourseResource::orderBy('id', 'desc')->get();
        return view('Backend.Admin.resource.create', compact('resources'));

    }

    public function lecture(Request $request)
    {
        $request->validate([
            'name'          =>  ['required', 'string', 'max:250'],
            'course_id'     =>  ['required', 'not_in:0'],
            'status'        =>  ['required', 'not_in:0'],
        ],
        $message = [
            'name.required'             =>  'Enter Valid Information!!',
            'course_id.required'        =>  'Enter Valid Information!!',
            'course_id.not_in'        =>  'Enter Valid Information!!',
            'status.required'           =>  'Enter Valid Information!!',
            'status.not_in'           =>  'Enter Valid Information!!',
        ]);

        $resources = new CourseResource();

        $resources->name            =   $request->name;
        $resources->crcourse_id     =   $request->course_id;
        $resources->status          =   $request->status;

        $resources->save();

        return response()->json(['success' =>true, 'message'=> 'লেকচার তৈরি হয়েছে!!!']);

    }

    /**
     * Basic info
     */
    public function basicinfo(Request $request)
    {
        //
        $request->validate([
            'name'              =>  ['required', 'string', 'max:50'],
            'lecture_title'     =>  ['required', 'not_in:0'],
            'desc'              =>  ['required', 'string', 'min:50'],
        ], $message = [
            'name.required'    =>  'Enter Valid Information!',
            'name.string'    =>  'Enter Valid Information!',
            'name.max'    =>  'Enter under 50 character!',
            'lecture_title.required'    =>  'Enter Valid Information!',
            'lecture_title.not_in'    =>  'Enter Valid Information!',
            'desc.required'    =>  'Enter Valid Information!',
            'desc.string'    =>  'Enter Valid Information!',
            'desc.min'    =>  'Description should be in 50 characters!',
        ]);

        $resourece_item = new ResourcesItem();

        $resourece_item->name               =   $request->name;
        $resourece_item->resource_id        =   $request->lecture_title;
        $resourece_item->text_describe      =   $request->desc;
        $resourece_item->resourcetype       =   'paid';
        $resourece_item->type               =   'text';

        $resourece_item->save();

        $notification = array(
            'message'       => 'ডাটা অ্যাড করা সম্পন্ন হয়েছে !!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('resource.manage')->with($notification);
    }

    /**
     * video info
     */
    public function video(Request $request)
    {
        //
        $request->validate([
            'name'                  =>  ['required', 'string', 'max:250'],
            'section_title'         =>  ['required', 'not_in:0'],
            'video_url'             =>  ['required', 'url'],
            'duration'              =>  ['required', 'max:10'],
        ], $message = [
            'name.required'                 =>  'Enter Valid Information',
            'name.string'                 =>  'Enter Valid Information',
            'name.max'                 =>  'Enter under 250 character',
            'section_title.required'        =>  'Enter Valid Information',
            'section_title.not_in'        =>  'Select title first',
            'video_url.required'            =>  'Enter Valid Information',
            'video_url.url'            =>  'Enter Valid url',
            'duration.required'             =>  'Enter Valid Information',
            'duration.max'             =>  'Enter Valid number',
        ]);

        $resourece_item = new ResourcesItem();

        $resourece_item->name               =   $request->name;
        $resourece_item->resource_id        =   $request->section_title;
        $resourece_item->video_url          =   $request->video_url;
        $resourece_item->video_duration     =   $request->duration['0'].':'.$request->duration['1'].':'.$request->duration['2'];
        $resourece_item->resourcetype       =   'paid';
        $resourece_item->type               =   'video';

        $resourece_item->save();

        $notification = array(
            'message'       => 'ডাটা অ্যাড করা সম্পন্ন হয়েছে !!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('resource.manage')->with($notification);

    }

    /**
     * attachment info
     */
    public function attachment(Request $request)
    {
        //
        return "attachment working";
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

    /***
     Student resource
     ***/
    public function tools()
    {
        //
        $permission = Admission::where('users_id', Auth::user()->id)->where('status', 'active')->first();
        if( !is_null($permission) )
        {
            return view('Backend.Student.resource');
        }
        else
        {
            $notification = array(
                'message'       => 'নূন্যতম একটি কোর্স কিনুন !!!',
                'alert-type'    => 'error'
            );
    
            return back()->with($notification);
        }
    }

    // Admin and teachers resource
    public function toolscode()
    {
        $codeblock = CodeResource::orderBy('name', 'asc')->get();
        return view('Backend.Admin.resource.code', compact('codeblock'));
    }

    // Admin and teachers add resource
    public function createcode()
    {
        $langName = DB::table('program_languegs')->get();

        return view('Backend.Admin.resource.createcode', compact('langName'));
    }

    // Store code data
    public function codestore(Request $request)
    {
        $request->validate([
            'title'         =>  ['required', 'string', 'max:255', 'unique:code_resources,name'],
            'code_type'     =>  ['required', 'not_in:0'],
            'code'          =>  ['required'],
        ], $message = [
            'required'      =>  'This field is required',
            'string'        =>  'Support only text not number',
            'max'           =>  'Max character 255',
            'unique'        =>  'The name is already exit!',
        ]);

        $code = new CodeResource();

        $code->name             =   $request->title;
        $code->slug             =   Str::slug($request->title);
        $code->lang_id          =   $request->code_type;
        $code->description      =   $request->code;

        $code->save();

        $notification = array(
            'message'       => 'রিসোর্স পাবলিশ সম্পন্ন হয়েছে !!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('resource.toolscode')->with($notification);
    }

    // Store lang
    public function codelangstore(Request $request)
    {
        $request->validate([
            'name'      =>  ['required', 'string', 'max:255', 'unique:code_resources'],
        ], $message= [
            'required'     =>  'This field is required',
            'string'     =>  'Support only text not number',
            'max'     =>  'Max character 255',
            'unique'     =>  'The name is already exit!',
        ]);

        $data = $request->all();    
        $lang =  DB::table('program_languegs')->insertGetId(array(
            'name'          => $data['name'],
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ));

       

        return response()->json(['success' =>true, 'message'=> 'প্রোগ্রাম তৈরি হয়েছে!!!', 'data' => $data, 'dataid' => $lang]);

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
        $delete = CourseResource::where('id', $id)->delete();

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
