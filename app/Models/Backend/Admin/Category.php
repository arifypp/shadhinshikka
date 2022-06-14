<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $fillable = ['name','parent_id', 'cat_desc'];



    public function childs() {
        return $this->hasMany('App\Models\Backend\Admin\Category','parent_id','id') ;
    }

    public static function getParentsTree($category, $name)
    {
        if ($category->parent_id == 0)
        {
            return $name;
        }

        $parent = Category::find($category->parent_id);
        $name = $parent->name . ' > ' . $name;

        return $name;
    }
    
    public static function Category()
    {
        $category = Category::where('status', 'Active')->get();
        return $category;
    }
}

