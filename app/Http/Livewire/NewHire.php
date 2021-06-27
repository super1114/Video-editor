<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hire;

class NewHire extends Component
{
    public $count = 0;

    public function __construct()
    {
    }

    public function render()
    {
        $current=time();
        $today = date("Y-m-d",$current);
        $start_date = date('Y-m-01', strtotime($today));
        $end_date = date('Y-m-t', strtotime($today));

        $NumOnHireContracts = Hire::where('status', 'signed')->where('updated_at', '>=', $start_date)->where('updated_at', '<=', $end_date)->get();
        $this->count = count($NumOnHireContracts);
        return view('livewire.new-hire');
    }
}
