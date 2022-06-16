<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CoreProc\WalletPlus\Models\Traits\HasWallets;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Backend\Admin\Course;
use App\Models\Common\Admission;
use App\Models\Common\PaymentTransiction;
use Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasWallets, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'studentid',
        'phone',
        'address',
        'email',
        'password',
        'dob', 
        'avatar',
        'role'
    ];


    public function sendPasswordResetNotification($user)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($user));
    }

    public static function purchaseCounter()
    {
      $counter = Admission::where('users_id', Auth::user()->id)->count();
      return $counter;
    }

    public static function paidCounter()
    {
      $sum = PaymentTransiction::where('users_id', Auth::user()->id)->sum('amount');
      $sumresult =  "৳". number_format( $sum , 0 , '.' , ',' ). " BDT";
      return $sumresult;
    }

    public static function admissioncount()
    {
        $count = Course::all()->count();
        return $count;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
