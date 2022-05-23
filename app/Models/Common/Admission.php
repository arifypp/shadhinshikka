<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Backend\Admin\Course;
use App\Models\Common\CourseResource;
use App\Models\Common\ResourcesItem;
use App\Models\Common\PaymentTransiction;
use Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
class Admission extends Model
{
    use HasFactory;

    protected $table = 'admissions';

    protected $fillable = [
        'admission_id',
        'courses_id',
        'users_id',	
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function transition()
    {
        return $this->belongsTo(PaymentTransiction::class, 'adm_id');
    }

    public static function duration()
    {
        // $duration = ResourcesItem::all('video_duration');
        // $ddd = Str::replace('"', ' ', $duration->video_duration);

        // $time = new Carbon($ddd->video_duration);
        // return $time->diffForHumans($time);


    }

    public static function payment_progress()
    {
        if ( Auth::user()->role == 'student' )
        {
            $courses = Course::orderby('id', 'desc')->get();
            $admission = Admission::where('users_id', Auth::user()->id)->first() ?: app(Admission::class);
            $paytransiction = PaymentTransiction::where('adm_id', $admission->id)->first() ?: app(PaymentTransiction::class);
            
            foreach( $courses as $key => $value )
            {
                
                if( !empty( $value->id == $admission->courses_id ) )
                {
                    $progressvalue =  $paytransiction->amount / $value->price * 100;

                    if( $value->price != $paytransiction->amount )
                    {
                        ?>
                       
                        <div class="alert alert-danger" role="alert">
                            <label for=""> 
                                <?php echo 'আপনার কোর্সে ফি ডিউ রয়েছে?'; ?> 
                            </label>

                            <div class="progress col-md-12">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo \Illuminate\Support\Str::limit($progressvalue, 2, ''); ?>%;" aria-valuenow="<?php echo \Illuminate\Support\Str::limit($progressvalue, 2, ''); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo \Illuminate\Support\Str::limit($progressvalue, 2, ''); ?> %
                                </div>

                            </div>

                            <div class="text-end text-right float-left">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#duepayment" class="btn btn-danger btn-sm mt-2 py-1 text-light text-right"> <?php echo 'পে ডিউ পেমেন্ট'; ?> </a>
                            </div>

                        <div class="modal fade" id="duepayment" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="duepaymentLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content bg-ss border-0">
                                        <div class="modal-header text-center align-self-center justify-content-center align-items-center bg-white">
                                            <!-- <h5 class="modal-title" id="duepaymentLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button> -->
                                                <img src="<?php echo asset('assets/images/payment-logo.png'); ?>" alt="Payment logo" class="img-fluid text-center" width="300">
                                        </div>
                                        <div class="modal-body align-items-center align-self-center justify-content-center text-center">
                                            <div class="alert__info-payment">
                                                <table class="table-responsive">
                                                    <tbody>
                                                        <tr>
                                                            <th>Personal Account</th>
                                                            <td>:&nbsp;</td>
                                                            <td>+880 1953 291938</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Personal references</th>
                                                            <td>:&nbsp;</td>
                                                            <td> [Admission ID]</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Admission ID</th>
                                                            <td>: &nbsp;</td>
                                                            <td><?php echo $admission->admission_id; ?> </span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Amount</th>
                                                            <td>: &nbsp;</td>
                                                            <td><?php echo ($paytransiction->amount - $value->price); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="payment-field">
                                                <input type="text" name="number" class="form-control my-2" placeholder="e.g 01xxxxxxxxx">
                                                <input type="text" name="traxID" class="form-control my-2" placeholder="e.g 9EA2W88S88">
                                            </div>
                                            <div class="term-condition my-2 text-center">
                                                <div class="form-check text-center">
                                                <input class="form-check-input" id="TrxID" type="checkbox" name="TrxID">
                                                <label class="form-check-label" for="TrxID">I agree to the <a href="#"> tearms & condition</a></label>
                                                    </div>
                                            </div>
                                            <div class="payment__footer text-center my-2">
                                                <button type="submit" id="submition" class="btn btn-light">Process</button>
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            <div class="payment__call_help mt-3 text-white">
                                                <a href="tel:+8801953291938" class="text-white"> <i class="fa fa-phone"></i> +880 1953 291938 </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            
        }
    }


}
