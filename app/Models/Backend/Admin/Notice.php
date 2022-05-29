<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Admin\Course;
use App\Models\Common\Admission;

class Notice extends Model
{
    use HasFactory;


    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function admission()
    {
        return $this->belongsTo(Admission::class, 'course_id');
    }
}
