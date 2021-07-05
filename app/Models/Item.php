<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'project_id',
        'resource_id',
        'i_start',
        'i_end'
    ];
    public function resource() {
        return $this->belongsTo(Resource::class, "resource_id");
    }
    public function getWidth() {
        $width = $this->i_end - $this->i_start;
        if($width>900) $width = 900;
        return "width:".($width*1.5)."px";
    }
}
