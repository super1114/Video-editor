<?php

namespace App\Http\Controllers\Api;

use App\Models\Hire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CheckListRigidResource;
use App\Http\Resources\CheckListRigidCollection;

class HireCheckListRigidsController extends Controller
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

        $checkListRigids = $hire
            ->checkListRigids()
            ->search($search)
            ->latest()
            ->paginate();

        return new CheckListRigidCollection($checkListRigids);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hire $hire
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hire $hire)
    {
        $this->authorize('create', CheckListRigid::class);

        $validated = $request->validate([
            'checklist_type' => ['required', 'in:on,off'],
            'status_string' => ['required', 'max:255', 'string'],
            'hirer_name' => ['required', 'max:255', 'string'],
            'hirer_position' => ['required', 'max:255', 'string'],
            'hirer_signature' => ['required', 'max:255', 'string'],
            'hirer_sign_date' => ['required', 'date', 'date'],
            'tcl_name' => ['required', 'max:255', 'string'],
            'tcl_position' => ['required', 'max:255', 'string'],
            'tcl_signature' => ['required', 'max:255', 'string'],
            'tcl_sign_date' => ['required', 'date', 'date'],
        ]);

        $checkListRigid = $hire->checkListRigids()->create($validated);

        return new CheckListRigidResource($checkListRigid);
    }
}
