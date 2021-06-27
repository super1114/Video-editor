<?php

namespace App\Http\Controllers\Api;

use App\Models\Tanker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TankerResource;
use App\Http\Resources\TankerCollection;
use App\Http\Requests\TankerStoreRequest;
use App\Http\Requests\TankerUpdateRequest;

class TankerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Tanker::class);

        $search = $request->get('search', '');

        $tankers = Tanker::search($search)
            ->latest()
            ->paginate();

        return new TankerCollection($tankers);
    }

    /**
     * @param \App\Http\Requests\TankerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TankerStoreRequest $request)
    {
        $this->authorize('create', Tanker::class);

        $validated = $request->validated();

        $tanker = Tanker::create($validated);

        return new TankerResource($tanker);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tanker $tanker)
    {
        $this->authorize('view', $tanker);

        return new TankerResource($tanker);
    }

    /**
     * @param \App\Http\Requests\TankerUpdateRequest $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function update(TankerUpdateRequest $request, Tanker $tanker)
    {
        $this->authorize('update', $tanker);

        $validated = $request->validated();

        $tanker->update($validated);

        return new TankerResource($tanker);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tanker $tanker)
    {
        $this->authorize('delete', $tanker);

        $tanker->delete();

        return response()->noContent();
    }
}
