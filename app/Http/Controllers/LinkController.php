<?php

namespace App\Http\Controllers;

use App\Models\Tanker;
use App\Models\Hire;
use App\Models\Company;

class LinkController extends Controller
{

    public function showTanker($fleet_num)
    {   
        $tanker = Tanker::where('fleet_num', '=', $fleet_num)->firstOrFail();
        
        $tankerid = $tanker->id;
        $hire = Hire::where('tanker_id', '=', $tankerid)->firstOrFail();
        // $this->authorize('update', $hire);
        
        $companies = Company::pluck('company', 'id');
        $tankers = Tanker::all();        

        return view('app.hires.edit', compact('hire', 'companies', 'tankers'));
    }

}
