<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'item_id',
        't_start',
        'v_start',
        'duration'
    ];
    public function getWidth(){
        $width = $this->duration;
        if($width>900) $width = 900;
        return "width:".($width*1.5)."px;";
    }
    public function getLeftStyle()
    {
        return "left:".($this->t_start*1.5)."px;";
    }
}
