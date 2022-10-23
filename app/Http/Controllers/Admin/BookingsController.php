<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Booking\BulkDestroyBooking;
use App\Http\Requests\Admin\Booking\DestroyBooking;
use App\Http\Requests\Admin\Booking\IndexBooking;
use App\Http\Requests\Admin\Booking\StoreBooking;
use App\Http\Requests\Admin\Booking\UpdateBooking;
use App\Models\Booking;
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

class BookingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBooking $request
     * @return array|Factory|View
     */
    public function index(IndexBooking $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Booking::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['additional_services', 'email', 'fname', 'id', 'payed_at', 'phone', 'selected_prices', 'sname', 'start_at', 'tname', 'tour_id', 'user_id'],

            // set columns to searchIn
            ['additional_services', 'email', 'fname', 'id', 'phone', 'selected_prices', 'sname', 'tname']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.booking.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.booking.create');

        return view('admin.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBooking $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBooking $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Booking
        $booking = Booking::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/bookings'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param Booking $booking
     * @throws AuthorizationException
     * @return void
     */
    public function show(Booking $booking)
    {
        $this->authorize('admin.booking.show', $booking);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Booking $booking
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Booking $booking)
    {
        $this->authorize('admin.booking.edit', $booking);


        return view('admin.booking.edit', [
            'booking' => $booking,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBooking $request
     * @param Booking $booking
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBooking $request, Booking $booking)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Booking
        $booking->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/bookings'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/bookings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBooking $request
     * @param Booking $booking
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBooking $request, Booking $booking)
    {
        $booking->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBooking $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBooking $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('bookings')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
