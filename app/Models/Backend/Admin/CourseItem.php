<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
    use HasFactory;

    protected $table = 'courses_item';

    protected $fillable = [
        'course_id',
        'name',
    ];
}
