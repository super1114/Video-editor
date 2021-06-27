<?php

namespace App\Http\Controllers\Api;

use App\Models\Hire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CheckListNrResource;
use App\Http\Resources\CheckListNrCollection;

class HireCheckListNRsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hire $hire
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Hire $hire)
    {
        $this->authorize('view', $hire);

        $search = $request->get('search', '');

        $checkListNRs = $hire
            ->checkListsNRs()
            ->search($search)
            ->latest()
            ->paginate();

        return new CheckListNrCollection($checkListNRs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hire $hire
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hire $hire)
    {
        $this->authorize('create', CheckListNr::class);

        $validated = $request->validate([
            'checklist_type' => ['required', 'in:on,off'],
            'status' => ['required', 'max:255', 'string'],
            'cladding_panels' => ['required', 'boolean', 'boolean'],
            'handrail_ladder' => ['required', 'boolean', 'boolean'],
            'compartment_internal' => ['required', 'boolean', 'boolean'],
            'side_guards' => ['required', 'boolean', 'boolean'],
            'rear_bumper' => ['required', 'boolean', 'boolean'],
            'wings_stays' => ['required', 'boolean', 'boolean'],
            'lights' => ['required', 'boolean', 'boolean'],
            'engine' => ['required', 'boolean', 'boolean'],
            'vacuum_pump' => ['required', 'boolean', 'boolean'],
            'dipstrick' => ['required', 'boolean', 'boolean'],
            'valve_operation' => ['required', 'boolean', 'boolean'],
            'fire_extinguisher' => ['required', 'boolean', 'boolean'],
            'chassis' => ['required', 'boolean', 'boolean'],
            'note_1' => ['nullable', 'max:255', 'string'],
            'ns_1' => ['nullable', 'max:255'],
            'os_1' => ['nullable', 'max:255'],
            'note_2' => ['nullable', 'max:255', 'string'],
            'ns_2' => ['required', 'max:255'],
            'os_2' => ['nullable', 'max:255'],
            'note_3' => ['nullable', 'max:255', 'string'],
            'ns_3' => ['nullable', 'max:255'],
            'os_3' => ['nullable', 'max:255'],
            'ext_splat_right' => ['required', 'max:255', 'string'],
            'ext_splat_left' => ['required', 'max:255', 'string'],
            'ext_splat_rear' => ['required', 'max:255', 'string'],
            'ext_splat_front' => ['required', 'max:255', 'string'],
            'int_splat' => ['required', 'max:255', 'string'],
            'int_video' => ['required', 'max:255', 'string'],
            'ext_video' => ['required', 'max:255', 'string'],
            'hirer_name' => ['required', 'max:255', 'string'],
            'hirer_position' => ['required', 'max:255', 'string'],
            'hirer_signature' => ['required', 'max:255', 'string'],
            'hirer_sign_date' => ['required', 'date', 'date'],
            'tcl_name' => ['required', 'max:255', 'string'],
            'tcl_position' => ['required', 'max:255', 'string'],
            'tcl_signature' => ['required', 'max:255', 'string'],
            'tcl_sign_date' => ['required', 'date', 'date'],
        ]);

        $checkListNr = $hire->checkListsNRs()->create($validated);

        return new CheckListNrResource($checkListNr);
    }
}
