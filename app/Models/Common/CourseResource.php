<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Backend\Admin\Course;
use App\Models\Common\ResourcesItem;
use Auth;
use DB;
class CourseResource extends Model
{
    use HasFactory;

    protected $table = 'course_resources';

    protected $fillable = [
        'name',
        'crcourse_id',
        'status',
    ];


    public static function Allcourseforoption() 
    {
        $course = Course::all();
        foreach($course as $key => $cdata)
        {
            $value = '<option value="'.$cdata->id.'">'. $cdata->name .'</option>';
            echo $value;
        }
    }

    public function resorceItem()
    {
        return $this->belongsTo(ResourcesItem::class, 'id');
    }


    public function course()
    {
        return $this->belongsTo(Course::class, 'crcourse_id');
    }

}
