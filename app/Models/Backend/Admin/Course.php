<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'student_capacity',
        'batch_no',
        'teacher',
        'start_on',
        'end_on',
        'class_location',
        'price',
        'image',
    ];

    public static function teacherlist()
    {
        $teacher = User::where('role', 'teacher')->get();

        return $teacher;
    }

    public function teachername()
    {
        return $this->belongsTo(User::class, 'teacher');
    }
}
