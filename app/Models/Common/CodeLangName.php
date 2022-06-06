<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Common\CodeResource;

class CodeLangName extends Model
{
    use HasFactory;

    protected $table = 'program_languegs';

    public function coderesourcetitle(){
        return $this->hasMany(CodeResource::class);
    }
}
