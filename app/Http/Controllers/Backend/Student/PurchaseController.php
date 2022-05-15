<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Course;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdmissionNotification;
use App\Models\User;
use App\Models\Common\Admission;
use App\Models\Common\PaymentTransiction;
use CoreProc\WalletPlus\Models\WalletType;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Image;
use File;
use Session;
use Auth;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        //
        $coursePurchase = Course::where('slug', $slug)->first();

        if ( !empty($coursePurchase) ) {
            return view('Backend.Student.Purchaseform', compact('coursePurchase'));
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
            'user_id'  =>  ['unique:admissions,users_id'],
            'number'    => ['required' , 'numeric', 'digits:11'],
            'traxID'    => ['required'],
            'TrxID'     => ['accepted']
        ],
    
        $message = [
            'number.required'   =>   'সঠিকভাবে নাম্বার লিখুন!',
            'number.numeric'   =>   'সঠিকভাবে নাম্বার লিখুন!',
            'number.digits'   =>   '১১ ডিজিটের নাম্বার লিখুন!',
            'traxID.required'   =>   'ট্রান্সিকশন আইডি দিন!',
            'TrxID.accepted'   =>   'টিওএস একসেপট করুন!',
            'user_id.unique'   =>   'আপনি ইতিমধ্যে অ্যাডমিশন নিয়েছেন!',
        ]);

        $admission = new Admission();
        $admission->admission_id    =   $request->admissonID;
        $admission->courses_id      =   $request->course_id;
        $admission->users_id        =   $request->user_id;
        $admission->status          =   'inactive';
        
        $admission->save();

        $transaction = new PaymentTransiction();
        $transaction->amount            = $request->amount;
        $transaction->courses_id        = $request->course_id;
        $transaction->users_id          = $admission->users_id;
        $transaction->adm_id            = $admission->id;
        $transaction->traxid            = $request->traxID;
        $transaction->phone             = $request->number;

        
        $transaction->save();
        
        $user = User::where('id', $transaction->users_id)->first();

        $findwallelt = WalletType::where("name", "=", "SS ACCOUNT")->get();

        $walletidrequest = $findwallelt['0']->id;

        $agentBalance = $user->wallet('SS ACCOUNT');
        
        if( empty( $user->wallets()->wallet_type_id )  )
        {
            // Increase money             
            $user->wallets()->create(['wallet_type_id' => $walletidrequest]);

            $PayingAmount = $user->wallet('SS ACCOUNT');
            $PayingAmount->incrementBalance($request->amount);
            $PayingAmount->balance;
        }
        else
        {
            $PayingAmount = $user->wallet('SS ACCOUNT');
            $PayingAmount->incrementBalance($request->amount);
            $PayingAmount->balance;
        }

        $adminnotify = User::where('role', 'admin')->where('status', '1')->get();

        Notification::send($adminnotify, new AdmissionNotification($admission));

        return response()->json(['success' =>true, 'message'=> 'অ্যাডমিশন সম্পন্ন হয়েছে!!!', "redirect_url"=>route('user.dashboard')]);

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
