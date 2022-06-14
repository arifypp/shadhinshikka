<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Session;
use Auth;

class CategoryController extends Controller
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
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('name','id')->all();
        return view('Backend.Admin.category.manage', compact('categories', 'allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('Backend.Admin.category.create', compact('categories'));
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
            'name'              =>  ['required', 'unique:categories'],
            'status'            =>  ['required', 'not_in:0'],
        ]);

        $category = new Category();

        $category->name             =   $request->name;
        $category->slug             =   Str::slug($category->name);
        $category->parent_id        =   empty($request->parent_category) ? 0 : $request->parent_category;
        $category->status           =   $request->status;
        $category->cat_desc         =   $request->cat_desc;

        $category->save();

        $notification = array(
            'message'       => 'ক্যাটাগড়ি তৈরি সম্পন্ন হয়েছে !!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('category.manage')->with($notification);



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
        $categories = Category::where('parent_id', '=', 0)->get();
        $cat = Category::find($id);

        if( !empty($cat) )
        {
            return view('Backend.Admin.category.edit', compact('cat', 'categories'));
        }
        else
        {
            $notification = array(
                'message'       => 'ক্যাটাগড়ি পেইজ খুঁজে পায়নি !!!',
                'alert-type'    => 'error'
            );
    
            return redirect()->route('category.manage')->with($notification);
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

        $category = new Category();

        $category->name             =   $request->name;
        $category->slug             =   Str::slug($category->name);
        $category->parent_id        =   empty($request->parent_category) ? 0 : $request->parent_category;
        $category->status           =   $request->status;
        $category->cat_desc         =   $request->cat_desc;

        $category->save();

        $notification = array(
            'message'       => 'ক্যাটাগড়ি আপডেটেড সম্পন্ন হয়েছে !!!',
            'alert-type'    => 'success'
        );

        return redirect()->route('category.manage')->with($notification);
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
        $category = Category::findOrFail($id);
        $categorysub = Category::where('parent_id', $id)->get();
        foreach ($categorysub as $key => $subcat) {
            $subcat->update(['parent_id' => 0]);
        }
       
        $delete = $category->delete();


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
