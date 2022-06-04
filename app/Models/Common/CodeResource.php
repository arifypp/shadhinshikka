<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CodeResource extends Model
{
    use HasFactory;

    protected $table = 'code_resources';
    protected $fillable = [
        'name',
        'slug',
        'lang_id',
        'status',
        'description'
    ];


    public static function codetype($lang_id)
    {
        $resoucestools = CodeResource::all();

        foreach ($resoucestools as $key => $value) {
            
            $codereouse = DB::table('program_languegs')->where('id', $value->lang_id)->first();
            return $codereouse->name;
            
        }

    }


}
