<?php

namespace App\Http\Controllers\API;

use App\Facades\PaymentServiceFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\TransactionStoreRequest;
use App\Http\Requests\API\TransactionUpdateRequest;
use App\Http\Resources\TransactionCollection;
use App\Http\Resources\TransactionResource;
use App\Models\Dictionary;
use App\Models\Tour;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TransactionCollection
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;

        $user = User::query()->with(["role"])->find($userId);

        $transactions = [];

        if ($user->role->name=='user') {
            $transactions = Transaction::query()
                ->where("user_id", $userId)
                ->paginate($request->count ?? config('app.results_per_page'));
        }

        if ($user->role->name=='guide') {
            $tourIds = Tour::query()->where("creator_id", Auth::user()->id)
                ->get()->pluck("id");

            $transactions = Transaction::query()
                ->whereIntegerInRaw("tour_id", $tourIds)
                ->paginate($request->count ?? config('app.results_per_page'));
        }

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

    public function getFilteredTransactions(Request $request)
    {

        $request->validate([
            "transaction_type" => "required"
        ]);

        $transactions = Transaction::query()
            ->withFilters($request->transaction_type)
            ->where("user_id", Auth::user()->id)
            ->paginate($request->count ?? config('app.results_per_page'));

        return new TransactionCollection($transactions);
    }

    public function requestPaymentByTransactionId(Request $request, $transactionId){

        $transaction = Transaction::query()->find($transactionId);

        if (is_null($transaction)){
            return response()->json([
                "errors" => [
                    "message" => ["Транзакция не найдена"]
                ],
            ], 400);
        }

        return PaymentServiceFacade::payment()
            ->createInvoiceLink($transaction->amount, $transaction->description );
    }
}
