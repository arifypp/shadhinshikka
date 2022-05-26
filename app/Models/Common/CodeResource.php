<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
