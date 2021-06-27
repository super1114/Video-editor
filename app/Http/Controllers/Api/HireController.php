<?php

namespace App\Http\Controllers\Api;

use App\Models\Hire;
use Illuminate\Http\Request;
use App\Http\Resources\HireResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\HireCollection;
use App\Http\Requests\HireStoreRequest;
use App\Http\Requests\HireUpdateRequest;

class HireController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Hire::class);

        $search = $request->get('search', '');

        $hires = Hire::search($search)
            ->latest()
            ->paginate();

        return new HireCollection($hires);
    }

    /**
     * @param \App\Http\Requests\HireStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HireStoreRequest $request)
    {
        $this->authorize('create', Hire::class);

        $validated = $request->validated();

        $hire = Hire::create($validated);

        return new HireResource($hire);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hire $hire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Hire $hire)
    {
        $this->authorize('view', $hire);

        return new HireResource($hire);
    }

    /**
     * @param \App\Http\Requests\HireUpdateRequest $request
     * @param \App\Models\Hire $hire
     * @return \Illuminate\Http\Response
     */
    public function update(HireUpdateRequest $request, Hire $hire)
    {
        $this->authorize('update', $hire);

        $validated = $request->validated();

        $hire->update($validated);

        return new HireResource($hire);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hire $hire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Hire $hire)
    {
        $this->authorize('delete', $hire);

        $hire->delete();

        return response()->noContent();
    }
}
