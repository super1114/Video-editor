<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Requests\LogStoreRequest;
use App\Http\Requests\LogUpdateRequest;

class LogController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Log::class);

        $search = $request->get('search', '');

        $logs = Log::search($search)
            ->latest()
            ->paginate(20);

        return view('app.logs.index', compact('logs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Log::class);

        return view('app.logs.create');
    }

    /**
     * @param \App\Http\Requests\LogStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogStoreRequest $request)
    {
        $this->authorize('create', Log::class);

        $validated = $request->validated();

        $log = Log::create($validated);

        return redirect()
            ->route('logs.edit', $log)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Log $log
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Log $log)
    {
        $this->authorize('view', $log);

        return view('app.logs.show', compact('log'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Log $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Log $log)
    {
        $this->authorize('update', $log);

        return view('app.logs.edit', compact('log'));
    }

    /**
     * @param \App\Http\Requests\LogUpdateRequest $request
     * @param \App\Models\Log $log
     * @return \Illuminate\Http\Response
     */
    public function update(LogUpdateRequest $request, Log $log)
    {
        $this->authorize('update', $log);

        $validated = $request->validated();

        $log->update($validated);

        return redirect()
            ->route('logs.edit', $log)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Log $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Log $log)
    {
        $this->authorize('delete', $log);

        $log->delete();

        return redirect()
            ->route('logs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
