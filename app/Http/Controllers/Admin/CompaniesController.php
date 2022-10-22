<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\BulkDestroyCompany;
use App\Http\Requests\Admin\Company\DestroyCompany;
use App\Http\Requests\Admin\Company\IndexCompany;
use App\Http\Requests\Admin\Company\StoreCompany;
use App\Http\Requests\Admin\Company\UpdateCompany;
use App\Models\Company;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCompany $request
     * @return array|Factory|View
     */
    public function index(IndexCompany $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Company::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'inn', 'law_address', 'ogrn', 'photo', 'title'],

            // set columns to searchIn
            ['description', 'id', 'inn', 'law_address', 'ogrn', 'photo', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.company.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.company.create');

        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompany $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCompany $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Company
        $company = Company::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/companies'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @throws AuthorizationException
     * @return void
     */
    public function show(Company $company)
    {
        $this->authorize('admin.company.show', $company);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Company $company)
    {
        $this->authorize('admin.company.edit', $company);


        return view('admin.company.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompany $request
     * @param Company $company
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCompany $request, Company $company)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Company
        $company->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/companies'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCompany $request
     * @param Company $company
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCompany $request, Company $company)
    {
        $company->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCompany $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCompany $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('companies')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
