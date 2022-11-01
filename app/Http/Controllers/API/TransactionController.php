<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TransactionStoreRequest;
use App\Http\Requests\API\TransactionUpdateRequest;
use App\Http\Resources\TransactionCollection;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TransactionCollection
     */
    public function index(Request $request)
    {
        $transactions = Transaction::paginate($request->count ?? config('app.results_per_page'));

        return new TransactionCollection($transactions);
    }

    /**
     * @param \App\Http\Requests\API\TransactionStoreRequest $request
     * @return \App\Http\Resources\TransactionResource
     */
    public function store(TransactionStoreRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        return new TransactionResource($transaction);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction $transaction
     * @return \App\Http\Resources\TransactionResource
     */
    public function show(Request $request, Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * @param \App\Http\Requests\API\TransactionUpdateRequest $request
     * @param \App\Models\Transaction $transaction
     * @return \App\Http\Resources\TransactionResource
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        return new TransactionResource($transaction);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Transaction $transaction)
    {
        $transaction->delete();

        return response()->noContent();
    }
}
