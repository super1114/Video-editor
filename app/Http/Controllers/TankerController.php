<?php

namespace App\Http\Controllers;

use App\Models\Tanker;
use Illuminate\Http\Request;
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
        $archive = false;
        if($request->archive) {
            $archive = true;
        }
        $search = $request->get('search', '');

        $tankers = Tanker::search($search)
            ->where('archive', '=', $archive)
            ->latest()
            ->paginate(20);

        return view('app.tankers.index', compact('tankers', 'search', 'archive'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Tanker::class);

        return view('app.tankers.create');
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

        return redirect()
            ->route('tankers.edit', $tanker)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tanker $tanker)
    {
        $this->authorize('view', $tanker);

        return view('app.tankers.show', compact('tanker'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tanker $tanker)
    {
        $this->authorize('update', $tanker);

        return view('app.tankers.edit', compact('tanker'));
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

        return redirect()
            ->route('tankers.edit', $tanker)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('tankers.index')
            ->withSuccess(__('crud.common.removed'));
    }
    
    public function archive(Request $request) 
    {
        $archive_item = Tanker::find($request->tanker_id);        
        // dd($request->tanker_id);
        if($archive_item) {
            if($archive_item->archive == false) {
                $archive_item->archive = true;
            } else {
                $archive_item->archive = false;
            }            
            $archive_item->save();
            echo "success";
        } else {
            echo "fail";
        }        
    }
}
