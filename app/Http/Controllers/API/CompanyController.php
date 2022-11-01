<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CompanyStoreRequest;
use App\Http\Requests\API\CompanyUpdateRequest;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\CompanyCollection
     */
    public function index(Request $request)
    {
        $companies = Company::paginate($request->count ?? config('app.results_per_page'));

        return new CompanyCollection($companies);
    }

    /**
     * @param \App\Http\Requests\API\CompanyStoreRequest $request
     * @return \App\Http\Resources\CompanyResource
     */
    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->validated());

        return new CompanyResource($company);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \App\Http\Resources\CompanyResource
     */
    public function show(Request $request, Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * @param \App\Http\Requests\API\CompanyUpdateRequest $request
     * @param \App\Models\Company $company
     * @return \App\Http\Resources\CompanyResource
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->validated());

        return new CompanyResource($company);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Company $company)
    {
        $company->delete();

        return response()->noContent();
    }
}
