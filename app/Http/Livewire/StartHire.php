<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hire;

class StartHire extends Component
{
    public $count = 0;

    public function __construct()
    {
    }

    public function render()
    {
        $current=time();
        $today = date("Y-m-d",$current);
        $ts = strtotime($today);
        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
        $start_date = date('Y-m-d', $start);        

        $NumOnHireContracts = Hire::where('start_date', '>=', $start_date)->get();
        $this->count = count($NumOnHireContracts);
        return view('livewire.start-hire');
    }
}
