<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Admin\Course;
class Notice extends Model
{
    use HasFactory;


    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
