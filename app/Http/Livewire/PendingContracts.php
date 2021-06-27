<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hire;

class PendingContracts extends Component
{
    public $fleets = null;

    
    public function __construct()
    {
    }


    public function render()
    {
        $this->fleets = Hire::where('status', 'pending')->orderBy("start_date",'desc')->get();
        return view('livewire.pending-contracts');
    }
}
