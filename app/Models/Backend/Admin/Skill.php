<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public $fillable = ['name','parent_id', 'skill_desc'];

    public function childs() {
        return $this->hasMany('App\Models\Backend\Admin\Skill','parent_id','id') ;
    }
}
