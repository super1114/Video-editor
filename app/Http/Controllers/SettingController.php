<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\SettingUpdateRequest;

class SettingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Setting::class);

        $search = $request->get('search', '');

        $settings = Setting::search($search)
            ->latest()
            ->paginate(20);

        return view('app.settings.index', compact('settings', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Setting::class);

        return view('app.settings.create');
    }

    /**
     * @param \App\Http\Requests\SettingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingStoreRequest $request)
    {
        $this->authorize('create', Setting::class);

        $validated = $request->validated();

        $setting = Setting::create($validated);

        return redirect()
            ->route('settings.edit', $setting)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Setting $setting)
    {
        $this->authorize('view', $setting);

        return view('app.settings.show', compact('setting'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Setting $setting)
    {
        $this->authorize('update', $setting);

        return view('app.settings.edit', compact('setting'));
    }

    /**
     * @param \App\Http\Requests\SettingUpdateRequest $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $this->authorize('update', $setting);

        $validated = $request->validated();

        $setting->update($validated);

        return redirect()
            ->route('settings.edit', $setting)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Setting $setting)
    {
        $this->authorize('delete', $setting);

        $setting->delete();

        return redirect()
            ->route('settings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
