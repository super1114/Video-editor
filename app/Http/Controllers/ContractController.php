<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Http\Requests\HireSigningRequest;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\Tanker;
use App\Models\Company;
use Brian2694\Toastr\Facades\Toastr;


use App\Models\CheckListNr;
use App\Models\CheckListRigid;

class ContractController extends Controller
{
    public function customerSign($uuid) {
        $hire = Hire::where('uuid', '=', $uuid)->firstOrFail();
        //$this->authorize('view', $hire);
        $companies = Company::pluck('company', 'id');
        $tankers = Tanker::pluck('fleet_num', 'id');

        return view('app.contracts.contract', compact('companies', 'tankers','hire'));
    }

    public function store(HireSigningRequest $request, Hire $hire) {
        $validated = $request->validated(); 
        if($request->hirer_signature == "/img/sign.png") {
            Toastr::error('Sorry. You did not sign. Please sign first','Error');
             return redirect()->back();
        }
        $hire->status = "signed";                
        $hire->update($validated);
        return redirect('home');
    }

    public function checklistNr($uuid) {
        

        $checkListNr = CheckListNr::where('uuid', $uuid)->get()->first();
        
        $this->authorize('update', $checkListNr);
        $hires = Hire::pluck('start_date', 'id');
                
        $check_type = $checkListNr->checklist_type;        
        $hire = $checkListNr->hire;
        
        $url_link = true;
        return view('app.check_list_n_rs.edit', compact('checkListNr', 'hire', 'check_type', 'url_link'));
    }

    public function checklistRigid($uuid) {
        $checkLigidRigid = CheckListNr::where('uuid', $uuid)->get()->first();

        $hires = Hire::pluck('start_date', 'id');

        $hire_id = session('hire_id');
        $check_type = session('check_type');
        $hire = Hire::find($hire_id);
        $url_link = true;
        return view('app.check_list_rigids.edit', compact('checkLigidRigid', 'hire', 'check_type', 'url_link'));
    }
}
