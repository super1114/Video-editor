<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use App\Models\Tanker;
use Illuminate\Http\Request;
use App\Http\Requests\QrStoreRequest;
use App\Http\Requests\QrUpdateRequest;

class QrController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Qr::class);

        $search = $request->get('search', '');

        $qrs = Qr::search($search)
            ->latest()
            ->paginate(20);

        return view('app.qrs.index', compact('qrs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tankers = Tanker::all();
        $this->authorize('create', Qr::class);
        return view('app.qrs.create', compact('tankers'));
    }

    /**
     * @param \App\Http\Requests\QrStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QrStoreRequest $request)
    {
        $this->authorize('create', Qr::class);

        $validated = $request->validated();

        $qr = Qr::create($validated);

        return redirect()
            ->route('qrs.edit', $qr)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Qr $qr
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Qr $qr)
    {
        $this->authorize('view', $qr);

        return view('app.qrs.show', compact('qr'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Qr $qr
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Qr $qr)
    {
        $tankers = Tanker::all();
        $this->authorize('update', $qr);

        return view('app.qrs.edit', compact('qr', 'tankers'));
    }

    /**
     * @param \App\Http\Requests\QrUpdateRequest $request
     * @param \App\Models\Qr $qr
     * @return \Illuminate\Http\Response
     */
    public function update(QrUpdateRequest $request, Qr $qr)
    {
        $this->authorize('update', $qr);

        $validated = $request->validated();

        $qr->update($validated);

        return redirect()
            ->route('qrs.edit', $qr)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Qr $qr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Qr $qr)
    {
        $this->authorize('delete', $qr);

        $qr->delete();

        return redirect()
            ->route('qrs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
