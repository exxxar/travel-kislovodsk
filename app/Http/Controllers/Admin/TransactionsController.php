<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transaction\BulkDestroyTransaction;
use App\Http\Requests\Admin\Transaction\DestroyTransaction;
use App\Http\Requests\Admin\Transaction\IndexTransaction;
use App\Http\Requests\Admin\Transaction\StoreTransaction;
use App\Http\Requests\Admin\Transaction\UpdateTransaction;
use App\Models\Transaction;
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

class TransactionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTransaction $request
     * @return array|Factory|View
     */
    public function index(IndexTransaction $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Transaction::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['amount', 'booking_id', 'id', 'status_type_id', 'user_id'],

            // set columns to searchIn
            ['description', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.transaction.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.transaction.create');

        return view('admin.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTransaction $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTransaction $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Transaction
        $transaction = Transaction::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/transactions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/transactions');
    }

    /**
     * Display the specified resource.
     *
     * @param Transaction $transaction
     * @throws AuthorizationException
     * @return void
     */
    public function show(Transaction $transaction)
    {
        $this->authorize('admin.transaction.show', $transaction);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Transaction $transaction
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Transaction $transaction)
    {
        $this->authorize('admin.transaction.edit', $transaction);


        return view('admin.transaction.edit', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTransaction $request
     * @param Transaction $transaction
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTransaction $request, Transaction $transaction)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Transaction
        $transaction->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/transactions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTransaction $request
     * @param Transaction $transaction
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTransaction $request, Transaction $transaction)
    {
        $transaction->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTransaction $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTransaction $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('transactions')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
