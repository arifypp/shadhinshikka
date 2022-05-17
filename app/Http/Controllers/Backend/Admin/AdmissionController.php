<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Course;
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

class AdmissionController extends Controller
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
        $admission = Admission::where('status', 'active')->get();
        return view('Backend.Admin.admission.manage', compact('admission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        //
        $admission = Admission::where('status', 'inactive')->get();
        return view('Backend.Admin.admission.pending', compact('admission'));
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
        $admission = Admission::find($id);
        $paidAmount = PaymentTransiction::where( 'adm_id', $admission->id )->first();
        
        if( !empty($admission) )
        {
            return view('Backend.Admin.admission.show', compact('admission', 'paidAmount'));
        }
        else{
            $notification = array(
                'message'       => 'ডাটা খুঁজে পাওয়া যায়নি!!!',
                'alert-type'    => 'error'
            );
            return back()->with($notification);
        }
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
        $admission = Admission::find($id);

        $admission->status = 'active';
        
        $admission->save();

        $admissionwallet = PaymentTransiction::where('adm_id', $admission->id)->first();

        $user = User::where('id', $admission->users_id)->first();

        $findwallelt = WalletType::where("name", "=", "SS ACCOUNT")->get();

        $walletidrequest = $findwallelt['0']->id;

        $agentBalance = $user->wallet('SS ACCOUNT');
        
        if( empty( $user->wallets()->wallet_type_id )  )
        {
            // Increase money             
            $user->wallets()->create(['wallet_type_id' => $walletidrequest]);

            $PayingAmount = $user->wallet('SS ACCOUNT');
            $PayingAmount->incrementBalance($admissionwallet->amount);
            $PayingAmount->balance;
        }
        else
        {
            $PayingAmount = $user->wallet('SS ACCOUNT');
            $PayingAmount->incrementBalance($admissionwallet->amount);
            $PayingAmount->balance;
        }


        $usernotify = User::where('id', $admission->users_id)->where('status', '1')->get();

        Notification::send($usernotify, new AcceptAdmissionNotification($admission));

        return response()->json(['success' =>true, 'message'=> 'অ্যাডমিশন এপ্রুভ সম্পন্ন হয়েছে!!!', "redirect_url"=>route('user.dashboard')]);
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
        $delete = Admission::where('id', $id)->delete();

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
