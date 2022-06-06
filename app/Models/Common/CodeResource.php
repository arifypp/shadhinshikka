<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Common\CodeLangName;

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

    public function programname()
    {
        return $this->belongsTo(CodeLangName::class, 'lang_id');
    }

}
