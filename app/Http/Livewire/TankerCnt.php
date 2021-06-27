<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hire;
class TankerCnt extends Component
{
    public $count = 0;

    public function __construct()
    {
    }

    public function render()
    {
        $NumOnHireContracts = Hire::where('status', 'onHire')->get();
        $this->count = count($NumOnHireContracts);
        return view('livewire.tanker-cnt');
    }
}
