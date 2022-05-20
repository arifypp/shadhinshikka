<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcesItem extends Model
{
    use HasFactory;

    protected $table = 'course_resources_items';

    protected $fillable = [
        'name',
        'video_url',
        'document_url',
        'text_describe',
        'video_duration',
        'resourcetype',
        'resource_id',
        'type',
    ];
}
