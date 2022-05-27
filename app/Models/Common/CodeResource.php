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


    public static function codetype()
    {
        $lname = DB::table('program_languegs')->get();

        foreach ($lname as $key => $value) {

            $codereouse = CodeResource::where('lang_id', $value->id)->first();
            echo $codereouse->name;
            
        }

    }


}
