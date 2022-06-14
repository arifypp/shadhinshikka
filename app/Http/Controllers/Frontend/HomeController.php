<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Course;
use App\Models\Backend\Admin\Category;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AcceptAdmissionNotification;
use App\Models\User;
use CoreProc\WalletPlus\Models\WalletType;
use App\Models\Common\Admission;
use App\Models\Common\PaymentTransiction;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Image;
use File;
use Session;
use Auth;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::where('status', 'Active')->get();
        $courses = Course::orderBy('id', 'DESC')->get();
        return view('Frontend.pages.home', compact('courses', 'categories'));
    }

    public function getDistrictsByDivision(Request $request)
    {
        $data=$request->all();

        $districts=DB::table('districts')
        ->where('districts.division_id','=',$data['division'])
        ->select('id','bn_name')
        ->get();

        return Response::json($districts);
    }
    
    // Get Thana
    public function getThanaByDistrict(Request $request)
    {

        $data=$request->all();

        $thana=DB::table('thanas')
        ->where('thanas.district_id','=',$data['districts'])
        ->select('id','bn_name')
        ->get();

        return Response::json($thana);

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
