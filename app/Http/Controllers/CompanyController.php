<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;

class CompanyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Company::class);

        $search = $request->get('search', '');

        $companies = Company::search($search)
            ->latest()
            ->paginate(20);

        return view('app.companies.index', compact('companies', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Company::class);

        return view('app.companies.create');
    }

    /**
     * @param \App\Http\Requests\CompanyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        $this->authorize('create', Company::class);

        $validated = $request->validated();

        $company = Company::create($validated);

        return redirect()
            ->route('companies.edit', $company)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Company $company)
    {
        $this->authorize('view', $company);

        return view('app.companies.show', compact('company'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Company $company)
    {
        $this->authorize('update', $company);

        return view('app.companies.edit', compact('company'));
    }

    /**
     * @param \App\Http\Requests\CompanyUpdateRequest $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $this->authorize('update', $company);

        $validated = $request->validated();

        $company->update($validated);

        return redirect()
            ->route('companies.edit', $company)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Company $company)
    {
        $this->authorize('delete', $company);

        $company->delete();

        return redirect()
            ->route('companies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
