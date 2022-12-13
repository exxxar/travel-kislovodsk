<?php

namespace App\Http\Controllers\API;

use App\Exports\TourGroupExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookingStoreRequest;
use App\Http\Requests\API\BookingUpdateRequest;
use App\Http\Resources\BookingCollection;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Chat;
use App\Models\Dictionary;
use App\Models\Tour;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BookingCollection
     */
    public function index(Request $request)
    {
        $bookings = Booking::paginate($request->count ?? config('app.results_per_page'));

        return new BookingCollection($bookings);
    }

    /**
     * @param \App\Http\Requests\API\BookingStoreRequest $request
     * @return \App\Http\Resources\BookingResource
     */
    public function store(BookingStoreRequest $request)
    {
        $booking = Booking::create($request->validated());

        return new BookingResource($booking);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \App\Http\Resources\BookingResource
     */
    public function show(Request $request, Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * @param \App\Http\Requests\API\BookingUpdateRequest $request
     * @param \App\Models\Booking $booking
     * @return \App\Http\Resources\BookingResource
     */
    public function update(BookingUpdateRequest $request, Booking $booking)
    {
        $booking->update($request->validated());

        return new BookingResource($booking);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Booking $booking)
    {
        $booking->delete();

        return response()->noContent();
    }

    public function bookATour(Request $request)
    {
        $request->validate([
            "tour_id" => "required",
            "schedule_id" => "required",
            "date" => "required",
            "time" => "required",
            "counts" => "required",
            "persons.*" => "required",
            "persons.*.full_name" => "required",
            "persons.*.phone" => "required",
            "persons.*.email" => "required",
            'persons.*.age'=> "required",
            'persons.*.document_info'=> "required",
            'persons.*.document_type_title'=> "required"
        ]);


        $userId = Auth::user()->id ?? null;

        if (is_null($userId))
            return response()->json([
               "errors"=>[
                   "message"=>["Вы не авторизовались!"]
               ]
            ], 400);


        $tour = Tour::withTrashed()
            ->where("id", $request->tour_id)
            ->first();

       if (is_null($tour))
            return response()->json([
                "errors" => [
                    "message" => ["Тур не найден!"]
                ]
            ], 400);

        if (!$tour->is_active || $tour->is_draft || !is_null($tour->deleted_at))
            return response()->json([
                "errors" => [
                    "message" => ["Данный тур недоступен для бронирования"]
                ],
            ], 400);

        $prices = [];

        $services = [];
        foreach ($tour->prices as $price){
            $item = (object)$price;

            foreach ($request->counts as $selected){
                $selected = (object)$selected;
                if ($selected->slug===$item->slug)
                    $item->count = $selected->count;
            }
            array_push($prices, $item);
        }

        if (!is_null($request->services)) {
            foreach ($request->services as $id) {
                $service = Dictionary::where("id", $id)->first();
                array_push($services,($service->title ?? '-'));
            }
        }

        $transaction = Transaction::query()->create([
            'status_type_id'=>(Dictionary::query()->where("slug","transaction_in_progress_type")->first())->id,
            'amount'=>env("base_tax"),
            'user_id'=>$userId,
            'tour_id'=>$request->tour_id,
            'description'=>'Бронирование тура'
        ]);

        foreach ($request->persons  as $person) {
            $person = (object)$person;
            $name = explode(' ', $person->full_name);

            $ph_number = preg_replace("/[^0-9]/", "", $person->phone);

            Booking::query()->create([
                'tour_id' => $request->tour_id,
                'user_id' => $userId,
                'schedule_id' => $request->schedule_id,
                'transaction_id' => $transaction->id,
                'selected_prices' => $prices,
                'additional_services' => $services,
                'fname' => $name[2] ?? '',
                'sname' => $name[1] ?? '',
                'tname' => $name[0] ?? '',
                'phone' => $ph_number,
                'email' => $person->email,
                'start_at' => Carbon::parse("$request->data $request->time"),
                'payed_at' => null,
            ]);

        }


        $chat = Chat::startNewChat("Вы забронировали  <a class='btn btn-primary' href='/tour/$tour->id'>тур</a> $tour->title", Auth::user()->id, $tour->creator_id);

        return response()->noContent();
    }

    public function selfBookedTours(Request $request){
        $userId = Auth::user()->id;

        $bookings = Booking::query()
            ->with(["tour"])
            ->where("user_id", $userId)
            ->orderBy("id", "DESC")
            ->get();

        return new BookingCollection($bookings);
    }

    public function getBookedTourInfo(Request $request){

        $request->validate([
            "tour_id"=>"required",
            "schedule_id"=>"required"
        ]);

        $bookings = Booking::query()
            ->with(["tour","transaction.statusType","schedule"])
            ->where("tour_id", $request->tour_id)
            ->where("schedule_id", $request->schedule_id)
            ->orderBy("id", "DESC")
            ->get();

        return Excel::download(new TourGroupExport($bookings,"Туристическая группа"), "туристическая группа".Carbon::now()->format('-d-m-Y').'.xlsx');
    }
}
