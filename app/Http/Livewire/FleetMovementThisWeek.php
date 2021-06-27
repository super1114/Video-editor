<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hire;

class FleetMovementThisWeek extends Component
{
    public $fleets = null;
    public $start_date = null;
    public $end_date = null;

    
    public function __construct()
    {
    }

    public function current_week_range() {
        $current=time();
        $today = date("Y-m-d",$current);

        $ts = strtotime($today);

        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);

        $this->start_date = date('Y-m-d', $start);
        $this->end_date = date('Y-m-d', strtotime('next saturday', $start));
    }

    public function render()
    {
        $this->current_week_range();

        $s_date = $this->start_date;
        $e_date = $this->end_date;

        $this->fleets = Hire::where(function($query) use($s_date, $e_date){
            $query->where("start_date", '>=', $s_date)->where('start_date', '<=', $e_date);
        })->orWhere(function ($query) use ($s_date, $e_date) {
            $query->where("end_date", '>=', $s_date)->where('end_date', '<=', $e_date);
        })->get();
        

        return view('livewire.fleet-movement-this-week');
    }
}
