<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'name',
        'type',
        'path',
        'project_id',
        'thumbnail',
        'duration'
    ];
}
