<?php

namespace App\Http\Controllers\Api;

use App\Models\CheckListNr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CheckListNrResource;
use App\Http\Resources\CheckListNrCollection;
use App\Http\Requests\CheckListNrStoreRequest;
use App\Http\Requests\CheckListNrUpdateRequest;

class CheckListNrController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CheckListNr::class);

        $search = $request->get('search', '');

        $checkListNRs = CheckListNr::search($search)
            ->latest()
            ->paginate();

        return new CheckListNrCollection($checkListNRs);
    }

    /**
     * @param \App\Http\Requests\CheckListNrStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckListNrStoreRequest $request)
    {
        $this->authorize('create', CheckListNr::class);

        $validated = $request->validated();

        $checkListNr = CheckListNr::create($validated);

        return new CheckListNrResource($checkListNr);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CheckListNr $checkListNr
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CheckListNr $checkListNr)
    {
        $this->authorize('view', $checkListNr);

        return new CheckListNrResource($checkListNr);
    }

    /**
     * @param \App\Http\Requests\CheckListNrUpdateRequest $request
     * @param \App\Models\CheckListNr $checkListNr
     * @return \Illuminate\Http\Response
     */
    public function update(
        CheckListNrUpdateRequest $request,
        CheckListNr $checkListNr
    ) {
        $this->authorize('update', $checkListNr);

        $validated = $request->validated();

        $checkListNr->update($validated);

        return new CheckListNrResource($checkListNr);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CheckListNr $checkListNr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CheckListNr $checkListNr)
    {
        $this->authorize('delete', $checkListNr);

        $checkListNr->delete();

        return response()->noContent();
    }
}
