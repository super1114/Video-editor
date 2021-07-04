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
    public function twoIntVal($num) {
        if($num>9) return $num;
        return "0".$num;
    }
    public function getTime() {
        $hours = floor($this->duration/3600);
        $mins = 0;
        $secs = 0;
        if($hours<1) {
            $hours = "00";
            $mins = floor($this->duration/60);
            if($mins<1) {
                $mins = "00";
                $secs = $this->twoIntVal($this->duration);
            } else {
                $mins = $this->twoIntVal($mins);
                $secs = $this->twoIntVal($this->duration%60);
            }
        }else {
            $hours = $this->twoIntVal($hours);
            $mins = floor(($this->duration%3600)/60);
            if($mins<1) {
                $mins = "00";
                $secs = $this->twoIntVal($this->duration%3600);
            }else {
                $mins = $this->twoIntVal($mins);
                $secs = $this->twoIntVal($this->duration%3600%60);
            }
        }
        return $hours.":".$mins.":".$secs;
    }
}
