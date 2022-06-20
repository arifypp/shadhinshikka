<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Admin\Course;
use App\Models\Common\Admission;
use App\Models\User;
class ProgressPayment extends Model
{
    use HasFactory;
    protected $table = 'progress_payments';

    protected $fillable = [
        'amount',
        'phone',
        'traxid',
        'student_id',
        'course_id',
        'admission_id',
    ];
    
    // User relationship
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Admission relationship
    public function admission()
    {
        return $this->belongsTo(Admission::class, 'admission_id');
    }

    // Course relationship
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
