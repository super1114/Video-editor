<?php

namespace App\Http\Controllers;


use App\Models\Hire;
use App\Models\Tanker;
use Illuminate\Http\Request;
use App\Models\CheckListRigid;
use App\Http\Requests\CheckListRigidStoreRequest;
use App\Http\Requests\CheckListRigidUpdateRequest;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Datetime;

class CheckListRigidController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CheckListRigid::class);

        $search = $request->get('search', '');

        $checkListRigids = CheckListRigid::search($search)
            ->latest()
            ->paginate(20);

        return view(
            'app.check_list_rigids.index',
            compact('checkListRigids', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CheckListRigid::class);

        $hire_id = $request->hire_id;
        $hire = Hire::find($hire_id);
        $check_type = $request->check_list_type;
        session(['hire_id' => $hire_id]);
        session(['check_type' => $check_type]);

        return view('app.check_list_rigids.create', compact('hire', 'check_type'));
    }


    
    public function sendMail($checkList) {
        $details = [
            'hirer_name' => $checkList->hirer_name,
            'link_url' => route('checklist_rigid_link', ['uuid' => $checkList->uuid])
        ];
        $email_address = $checkList->hire->company->email;
        // \Mail::to("italexx.ua@gmail.com")->send(new \App\Mail\SendCheckListRigidMail($details));
        \Mail::to($email_address)->send(new \App\Mail\SendCheckListRigidMail($details));
    }

    
    public function validateCheckboxes($request, $validated) {
        $validated['paintwork'] = isset($request->paintwork) ? $request->paintwork == 'on' ? true : false : false;
        $validated['cab_seat'] = isset($request->cab_seat) ? $request->cab_seat == 'on' ? true : false : false;
        $validated['glass_mirrors'] = isset($request->glass_mirrors) ? $request->glass_mirrors == 'on' ? true : false : false;
        $validated['valves_controls'] = isset($request->valves_controls) ? $request->valves_controls == 'on' ? true : false : false;
        $validated['rear_bumper'] = isset($request->rear_bumper) ? $request->rear_bumper == 'on' ? true : false : false;
        $validated['wings_stays'] = isset($request->wings_stays) ? $request->wings_stays == 'on' ? true : false : false;
        $validated['lights'] = isset($request->lights) ? $request->lights == 'on' ? true : false : false;
        $validated['vaccum_pump'] = isset($request->vaccum_pump) ? $request->vaccum_pump == 'on' ? true : false : false;
        $validated['levels'] = isset($request->levels) ? $request->levels == 'on' ? true : false : false;
        $validated['camera_operation'] = isset($request->camera_operation) ? $request->camera_operation == 'on' ? true : false : false;
        $validated['cab_inside_out'] = isset($request->cab_inside_out) ? $request->cab_inside_out == 'on' ? true : false : false;
        $validated['side_guards'] = isset($request->side_guards) ? $request->side_guards == 'on' ? true : false : false;
        $validated['book_pack'] = isset($request->book_pack) ? $request->book_pack == 'on' ? true : false : false;

        return $validated;
    }



    /**
     * @param \App\Http\Requests\CheckListRigidStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckListRigidStoreRequest $request)
    {
        $this->authorize('create', CheckListRigid::class);        
        $validated = $request->validated();
        $validated = $this->validateCheckboxes($request, $validated); 
        $validated['uuid'] = Str::uuid();
        if($request->hasFile('cleaning_status')) {            
            $image = $request->file('cleaning_status');            
            $date = new DateTime();
            $new_image_name = $date->getTimestamp();                                    
            $file_name = $new_image_name.'.'.$image->guessExtension();                        
            $path = $image->storeAs(
                'public/uploads/cleaning_status', $file_name
            );                
            $url = 'uploads/cleaning_status/'.$file_name;            
            $validated['cleaning_status'] = $url;
        }   
        $checkListRigid = CheckListRigid::create($validated);
        
        if($request->hirer_signature != "/img/sign.png" && $request->tcl_signature != "/img/sign.png" ) {
            $checkListRigid->status = "signed";
            $checkListRigid->update($validated);

            $hire = Hire::find($checkListRigid->hire_id);
            if($checkListRigid->checklist_type == "On") {
                $hire->status = "onHire";
            }
            if($checkListRigid->checklist_type == "Off") {
                $hire->status = "offHire";

                $tanker = Tanker::find($hire->tanker_id);
                $tanker->usage = false;
                $tanker->save();
            }
            $hire->save();
            $this->sendMail($checkListNr);

            return redirect()->route('hires.index')->withSuccess(__('crud.common.created'));
        }

        return redirect()
            ->route('check-list-rigids.edit', $checkListRigid)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CheckListRigid $checkListRigid
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CheckListRigid $checkListRigid)
    {
        $this->authorize('view', $checkListRigid);

        return view('app.check_list_rigids.show', compact('checkListRigid'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CheckListRigid $checkListRigid
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CheckListRigid $checkListRigid)
    {
        $this->authorize('update', $checkListRigid);
        
        $hires = Hire::pluck('start_date', 'id');

        $hire_id = session('hire_id');
        $check_type = session('check_type');
        $hire = Hire::find($hire_id);


        return view('app.check_list_rigids.edit', compact('checkListRigid', 'hire', 'check_type'));
    }

    /**
     * @param \App\Http\Requests\CheckListRigidUpdateRequest $request
     * @param \App\Models\CheckListRigid $checkListRigid
     * @return \Illuminate\Http\Response
     */
    public function update(
        CheckListRigidUpdateRequest $request,
        CheckListRigid $checkListRigid
    ) {
        $this->authorize('update', $checkListRigid);

        $validated = $request->validated();
        $validated = $this->validateCheckboxes($request, $validated);
        if($request->hasFile('cleaning_status')) {
            if($checkListRigid->cleaning_status != '') {
                $file = 'public/' . $checkListRigid->cleaning_status;
                if(Storage::exists($file)) {                    
                        Storage::delete($file);                    
                }
            }
            $image = $request->file('cleaning_status');            
            $date = new DateTime();
            $new_image_name = $date->getTimestamp();                                    
            $file_name = $new_image_name.'.'.$image->guessExtension();                        
            $path = $image->storeAs(
                'public/uploads/cleaning_status', $file_name
            );                
            $url = 'uploads/cleaning_status/'.$file_name;            
            $validated['cleaning_status'] = $url;
        } 
        $checkListRigid->update($validated);

        if($request->hirer_signature != "/img/sign.png" && $request->tcl_signature != "/img/sign.png" ) {
            $checkListRigid->status = "signed";
            $checkListRigid->update($validated);

            $hire = Hire::find($checkListRigid->hire_id);
            if($checkListRigid->checklist_type == "On" && $hire->status == 'signed') {
                $hire->status = "onHire";
            }
            if($checkListRigid->checklist_type == "Off") {
                $hire->status = "offHire";

                $tanker = Tanker::find($hire->tanker_id);
                $tanker->usage = false;
                $tanker->save();
            }
            $hire->save();
            $this->sendMail($checkListNr);

            return redirect()->route('hires.index')->withSuccess(__('crud.common.created'));
        }

        return redirect()
            ->route('check-list-rigids.edit', $checkListRigid)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CheckListRigid $checkListRigid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CheckListRigid $checkListRigid)
    {
        $this->authorize('delete', $checkListRigid);

        $checkListRigid->delete();

        return redirect()
            ->route('check-list-rigids.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
