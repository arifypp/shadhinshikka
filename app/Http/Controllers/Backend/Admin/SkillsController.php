<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Category;
use App\Models\Backend\Admin\Skill;
use App\Models\User;
use Illuminate\Support\Str;
use Session;
use Auth;

class SkillsController extends Controller
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
        $skills = Skill::where('parent_id', '=', 0)->get();
        $allSkills = Skill::pluck('name','id')->all();
        return view('Backend.Admin.skills.manage', compact('skills', 'allSkills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $skills = Skill::where('parent_id', '=', 0)->get();
        return view('Backend.Admin.skills.create', compact('skills'));
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
            'name'              =>  ['required', 'unique:skills'],
            'status'            =>  ['required', 'not_in:0'],
        ]);

        $skills = new Skill();

        $skills->name             =   $request->name;
        $skills->slug             =   Str::slug($skills->name);
        $skills->parent_id        =   empty($request->parent_id) ? 0 : $request->parent_id;
        $skills->status           =   $request->status;
        $skills->skill_desc       =   $request->skills_desc;

        $skills->save();

        $notification = array(
            'message'       => 'স্কিলস তৈরি সম্পন্ন হয়েছে !!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('skills.manage')->with($notification);
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
        $skills = Skill::where('parent_id', '=', 0)->get();
        $sk = Skill::find($id);

        if( !empty($sk) )
        {
            return view('Backend.Admin.skills.edit', compact('sk', 'skills'));
        }
        else
        {
            $notification = array(
                'message'       => 'স্কিলস পেইজ খুঁজে পায়নি !!!',
                'alert-type'    => 'error'
            );
    
            return redirect()->route('skills.manage')->with($notification);
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
            'name'              =>  ['required', 'unique:categories,name,'.$id],
            'status'            =>  ['required', 'not_in:0'],
        ]);

        $skills = Skill::find($id);

        $skills->name             =   $request->name;
        $skills->slug             =   Str::slug($skills->name);
        $skills->parent_id        =   empty($request->parent_id) ? 0 : $request->parent_id;
        $skills->status           =   $request->status;
        $skills->skill_desc       =   $request->skills_desc;

        $skills->save();

        $notification = array(
            'message'       => 'স্কিলস তৈরি সম্পন্ন হয়েছে !!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('skills.manage')->with($notification);
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
        $skills = Skill::findOrFail($id);
        $skillssub = Skill::where('parent_id', $id)->get();
        foreach ($skillssub as $key => $subskill) {
            $subskill->update(['parent_id' => 0]);
        }
       
        $delete = $skills->delete();


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
