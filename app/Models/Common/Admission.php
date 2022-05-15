<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Backend\Admin\Course;
use App\Models\Common\PaymentTransiction;
use Auth;
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
                        <div class="admission-warning alert alert-danger">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo \Illuminate\Support\Str::limit($progressvalue, 2, ''); ?>%;" aria-valuenow="<?php echo \Illuminate\Support\Str::limit($progressvalue, 2, ''); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo \Illuminate\Support\Str::limit($progressvalue, 2, ''); ?> %</div>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            
        }
    }


}
