<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourSearchRequest;
use App\Http\Requests\API\TourStoreRequest;
use App\Http\Requests\API\TourUpdateRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\TourCollection;
use App\Http\Resources\TourResource;
use App\Imports\TourImport;
use App\Imports\TourObjectImport;
use App\Models\Booking;
use App\Models\Dictionary;
use App\Models\Favorite;
use App\Models\Schedule;
use App\Models\Tour;
use App\Models\TourObject;
use App\Models\UserWatchTours;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class TourController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TourCollection
     */
    public function index(Request $request)
    {
        $size = $request->get("size") ?? config('app.results_per_page');

        $tours = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->where("is_active", true)
            ->where("is_draft", false)
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function getMaxTourPrice(Request $request)
    {
        $price = Tour::query()
            ->where('is_active', true)
            ->where('is_draft', false)
            ->whereNull("deleted_at")
            ->max("base_price");

        return response()->json($price);
    }

    public function loadToursByCoords(Request $request)
    {

        $request->validate([
            "latitude" => "required",
            "longitude" => "required",
        ]);

        $latitude = $request->latitude ?? 0;
        $longitude = $request->longitude ?? 0;

        $size = $request->get("size") ?? config('app.results_per_page');

        $tours = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->where("is_active", true)
            ->where("is_draft", false)
            ->where("start_latitude", $latitude)
            ->where("start_longitude", $longitude)
            ->orWhere(function ($query) use ($latitude, $longitude) {
                $query->whereHas("tourObjects", function ($q) use ($latitude, $longitude) {
                    $q->where("latitude", $latitude)
                        ->where("longitude", $longitude);
                });
            })
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function loadGuideToursByPage(Request $request)
    {

        $category = $request->get("category") ?? 0;
        $size = $request->get("size") ?? config('app.results_per_page');

        $tours = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->withCategoryFilters($category)
            ->where("creator_id", Auth::user()->id)
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function all(Request $request)
    {
        $size = $request->get("size") ?? config('app.results_per_page');
        $tours = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function hot(Request $request)
    {
        $size = $request->get("size") ?? config('app.results_per_page');

        $tours = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->where("is_hot", true)
            ->where("is_active", true)
            ->where("is_draft", false)
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function search(TourSearchRequest $request)
    {

        $filterObject = (object)[
            //'direction' => $request->direction ?? false,
            'location_from' => $request->location_from ?? null,
            'location_to' => $request->location_to ?? null,
            'date' => $request->date ?? null,
            'tour_type' => $request->tour_type ?? null,
            'payment_types' => $request->payment_types ?? [],
            'duration_types' => $request->duration_types ?? [],
            'is_hot' => $request->is_hot ?? null,
            'price_type' => $request->price_type ?? 0,
            'price_range_start' => $request->price_range_start ?? null,
            'price_range_end' => $request->price_range_end ?? null,
            'movement_types' => $request->movement_types ?? [],
            'tour_categories' => $request->tour_categories ?? [],
            'include_services' => $request->include_services ?? [],
            'exclude_services' => $request->exclude_services ?? [],
            'nearest_selected_dates' => $request->nearest_selected_dates ?? null,
        ];

        $sortObject = (object)[
            'sort_type' => $request->sort_type ?? null,
            'sort_direction' => $request->sort_direction ?? 'ASC'
        ];


        $size = $request->get("size") ?? config('app.results_per_page');

        $tours = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->withFilters($filterObject)
            ->withSort($sortObject)
            ->where("is_active", true)
            ->where("is_draft", false)
            ->paginate($size);

        return new TourCollection($tours);
    }

    /**
     * @param \App\Http\Requests\API\TourStoreRequest $request
     * @return \App\Http\Resources\TourResource
     */
    public function store(TourStoreRequest $request)
    {


        //todo: категория туров, расписание, объект тура

        $userId = Auth::user()->id;

        $path = '/user/' . $userId . "/tours";
        if (!Storage::exists('/public' . $path)) {
            Storage::makeDirectory('/public' . $path);
        }

        $photos = [];

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();

                $name = Str::uuid() . "." . $ext;

                $file->storeAs("/public", $path . '/' . $name);
                $url = Storage::url('user/' . $userId . "/tours/" . $name);
                array_push($photos, $url);
            }
        }

        $preview_photo = null;

        if ($request->hasFile('preview')) {
            $file = $request->file('preview');

            $ext = $file->getClientOriginalExtension();
            $name = Str::uuid() . "." . $ext;

            $file->storeAs("/public", $path . '/' . $name);
            $preview_photo = Storage::url('user/' . $userId . "/tours/" . $name);
        }

        $data = [
            'title' => $request->title ?? '',
            'description' => $request->description ?? '',
            'short_description' => $request->short_description ?? '',
            'base_price' => $request->base_price ?? 0,
            'discount_price' => $request->discount_price ?? 0,
            'comfort_loading' => (boolean)($request->comfort_loading ?? false),
            'country' => $request->country ?? null,
            'start_address' => $request->start_address ?? '',
            'start_city' => $request->start_city ?? '',
            'start_latitude' => (double)($request->start_latitude ?? 0),
            'start_longitude' => (double)($request->start_longitude ?? 0),
            'start_comment' => $request->start_comment ?? null,
            'preview_image' => $preview_photo,
            'max_group_size' => (int)($request->max_group_size ?? 0),
            'min_group_size' => (int)($request->min_group_size ?? 0),
            'is_hot' => false,
            'is_active' => false,
            'is_draft' => (boolean)($request->is_draft ?? false),
            'need_email_notification' => (boolean)($request->need_email_notification ?? false),
            'need_sms_notification' => (boolean)($request->need_sms_notification ?? false),

            'duration' => $request->duration ?? null,
            'images' => $photos,
            'prices' => json_decode($request->prices ?? '[]'),
            'include_services' => json_decode($request->include_services ?? '[]'),
            'exclude_services' => json_decode($request->exclude_services ?? '[]'),
            'duration_type_id' => (int)($request->duration_type_id),
            'movement_type_id' => (int)($request->movement_type_id),
            'tour_type_id' => (int)($request->tour_type_id),
            'payment_infos' => json_decode($request->payment_infos ?? '[]'),
            'payment_type_id' => (int)($request->payment_type_id),
            'creator_id' => $userId,
        ];

        $tour = Tour::query()->create($data);

        $is_regular = $request->is_regular ?? false;

        if (!$is_regular) {
            foreach (json_decode($request->dates) as $date)
                Schedule::query()->create([
                    'tour_id' => $tour->id,
                    'guide_id' => $userId,
                    'start_at' => Carbon::parse($date)->format("Y-m-d H:i")
                ]);
        } else {

            $tmp_dates = $this->prepareDatesForRegularity($request->regularity);

            foreach ($tmp_dates as $date)
                Schedule::query()->create([
                    'tour_id' => $tour->id,
                    'guide_id' => $userId,
                    'start_at' => Carbon::parse($date)->format("Y-m-d H:i")
                ]);
        }


        $tour->tourObjects()->attach(json_decode($request->tour_objects));
        $tour->tourCategories()->attach(json_decode($request->categories));

        $tour = $tour->load(["schedules", "tourObjects", "tourCategories", "tourType"]);

        return new TourResource($tour);
    }

    private function prepareDatesForRegularity(string $jsonStringObject){
        $regularity = json_decode($jsonStringObject);
        $days = is_null($regularity->day)||empty($regularity->day) ? null : [$regularity->day];
        $day_of_week = $regularity->day_of_week ?? null;
        $months = is_null($regularity->month)||empty($regularity->month) ? [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] : [$regularity->month];
        $years = is_null($regularity->year)||empty($regularity->year) ? [Carbon::now()->year, Carbon::now()->year + 1] : [$regularity->year];
        $time = $regularity->time ?? "09:00";

        $tmp_dates = [];

        foreach ($years as $year)
            foreach ($months as $month) {

                if (is_null($days)) {
                    $days = [];
                    for($i=1; $i<=Carbon::now()->setMonth($month)->daysInMonth;$i++)
                        array_push($days, $i);
                }


                foreach ($days as $day) {
                    $tmpHour = explode(':', $time)[0] ?? "10";
                    $tmpMinutes = explode(':', $time)[1] ?? "00";

                    $tmpDate = Carbon::create($year, $month, $day, $tmpHour, $tmpMinutes);

                    if (!is_null($day_of_week)) {
                        if ($tmpDate->dayOfWeek == $day_of_week)
                            array_push($tmp_dates, $tmpDate->format("Y-m-d H:i"));
                    } else
                        array_push($tmp_dates, $tmpDate->format("Y-m-d H:i"));
                }
            }

        return $tmp_dates ?? [];

    }
    public function getTourByGuide(Request $request, $guideId)
    {

        $size = $request->get("size") ?? config('app.results_per_page');

        $tours = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->where("creator_id", $guideId)
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function loadGuideTourById(Request $request, $id)
    {
        $tour = Tour::query()
            ->with(["tourObjects", "tourCategories", "schedules"])
            ->find($id);

        $tourObjectsIds = $tour->tourObjects->pluck("id");
        $tourCategoriesIds = $tour->tourCategories->pluck("id");
        $scheduleDates = $tour->schedules->pluck("start_at");


        $tmp = $tour->toArray();

        // $tmp["tour_objects"] = $tourObjectsIds;
        $tmp["categories"] = $tourCategoriesIds;
        $tmp["dates"] = [];

        //unset($tmp["schedules"]);
        //unset($tmp["tourCategories"]);
        //unset($tmp["tourObjects"]);

        //dd(  $tmp);

        return response()->json((object)$tmp);

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tour $tour
     * @return TourResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {

        $tour = Tour::query()
            ->with([
                'tourObjects',
                'tourCategories',
                'durationType',
                'tourType',
                'creator.profile',
                'schedules',
                'reviews'
            ])
            ->where("id", $id)
            ->first();

        if (is_null($tour))
            return view("errors.404");

        $userId = Auth::user()->id ?? null;

        if (($tour->is_draft || !$tour->is_active)/* && $tour->creator_id != $userId*/)
            return view("errors.404");

        return view('pages.tour', ["tour" => json_encode(new TourResource($tour))]);
    }

    /**
     * @param \App\Http\Requests\API\TourUpdateRequest $request
     * @param \App\Models\Tour $tour
     * @return \App\Http\Resources\TourResource
     */
    public function update(TourUpdateRequest $request, $id)
    {
        $tour = Tour::query()->find($id);

        $userId = Auth::user()->id;

        $path = '/user/' . $userId . "/tours";
        if (!Storage::exists('/public' . $path)) {
            Storage::makeDirectory('/public' . $path);
        }

        $photos = json_decode($request->images ?? '[]');

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();

                $name = Str::uuid() . "." . $ext;

                $file->storeAs("/public", $path . '/' . $name);
                $url = Storage::url('user/' . $userId . "/tours/" . $name);
                array_push($photos, $url);
            }
        }

        $preview_photo = $request->preview_image ?? null;

        if ($request->hasFile('preview')) {
            $file = $request->file('preview');

            $ext = $file->getClientOriginalExtension();
            $name = Str::uuid() . "." . $ext;

            $file->storeAs("/public", $path . '/' . $name);
            $preview_photo = Storage::url('user/' . $userId . "/tours/" . $name);
        }

        $data = [
            'title' => $request->title ?? '',
            'description' => $request->description ?? '',
            'short_description' => $request->short_description ?? '',
            'base_price' => $request->base_price ?? 0,
            'discount_price' => $request->discount_price ?? 0,
            'comfort_loading' => (boolean)($request->comfort_loading ?? false),
            'start_address' => $request->start_address ?? '',
            'start_city' => $request->start_city ?? '',
            'start_latitude' => (double)($request->start_latitude ?? 0),
            'start_longitude' => (double)($request->start_longitude ?? 0),
            'start_comment' => $request->start_comment ?? null,
            'preview_image' => $preview_photo,
            'max_group_size' => (int)($request->max_group_size ?? 0),
            'min_group_size' => (int)($request->min_group_size ?? 0),
            'is_active' => true,
            'is_draft' => (boolean)($request->is_draft ?? false),
            'duration' => $request->duration ?? null,
            'images' => $photos,
            'prices' => json_decode($request->prices ?? '[]'),
            'include_services' => json_decode($request->include_services ?? '[]'),
            'exclude_services' => json_decode($request->exclude_services ?? '[]'),
            'duration_type_id' => (int)($request->duration_type_id),
            'movement_type_id' => (int)($request->movement_type_id),
            'tour_type_id' => (int)($request->tour_type_id),
            'payment_infos' => json_decode($request->payment_infos ?? '[]'),
            'payment_type_id' => (int)($request->payment_type_id),
            'creator_id' => $userId,
            'verified_at' => null,
        ];


        $tour->update($data);

        $tourObjectsIds = Collection::make(json_decode($request->tour_objects))->pluck("id");
        $tourCategoriesIds = Collection::make(json_decode($request->tour_categories))->pluck("id");

        $tour->tourObjects()->sync($tourObjectsIds);
        $tour->tourCategories()->sync($tourCategoriesIds);

        if (isset($request->removed_dates))
            foreach (json_decode($request->removed_dates) as $dateId) {
                $schd = Schedule::query()->find($dateId);
                if (!is_null($schd))
                    $schd->delete();
            }

        $schedulesDates = Collection::make(json_decode($request->schedules))->pluck("start_at");


        $is_regular = $request->is_regular ?? false;


        if (!$is_regular) {
            if (isset($request->dates))
                foreach (json_decode($request->dates) as $date)
                    if (!in_array($date, $schedulesDates->toArray()))
                        Schedule::query()->create([
                            'tour_id' => $tour->id,
                            'guide_id' => $userId,
                            'start_at' => Carbon::parse($date)->format("Y-m-d H:i")
                        ]);
        } else {

            $tmp_dates = $this->prepareDatesForRegularity($request->regularity);

            foreach ($tmp_dates as $date)
                Schedule::query()->create([
                    'tour_id' => $tour->id,
                    'guide_id' => $userId,
                    'start_at' => Carbon::parse($date)->format("Y-m-d H:i")
                ]);
        }



        return new TourResource($tour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tour $tour)
    {
        $tour->delete();

        return response()->noContent();
    }

    public function removeAllTours(Request $request)
    {
        $userId = Auth::user()->id ?? null;

        if (is_null($userId))
            return response()->noContent(401);

        $tours = Tour::query()->where("creator_id", $userId)
            ->get();

        foreach ($tours as $tour)
            $tour->delete();

        return response()->noContent();
    }

    public function duplicate(Request $request, $id)
    {

        $tour = Tour::query()->find($id);

        $newTour = $tour->replicate();
        $newTour->save();

        return new TourResource($newTour);
    }


    public function watch(Request $request, $tourId)
    {
        $userId = Auth::user()->id ?? null;

        if (is_null($userId))
            return response()->noContent(401);

        $uwt = UserWatchTours::query()->where("tour_id", $tourId)
            ->where("user_id", $userId)
            ->first();

        $isWatched = !is_null($uwt);

        if (!$isWatched) {
            UserWatchTours::query()->create([
                "user_id" => $userId,
                "tour_id" => $tourId,
                "count" => 1,
                "watched_at" => Carbon::now()
            ]);
            return response()->noContent();
        }

        $uwt->watched_at = Carbon::now();
        $uwt->count++;
        $uwt->save();

        return response()->noContent();

    }

    public function addGuideTourToArchive(Request $request, $tourId)
    {
        $userId = Auth::user()->id;
        $tour = Tour::query()
            ->where("creator_id", $userId)
            ->where("id", $tourId)
            ->first();

        if (is_null($tour))
            return response()->json([
                "errors" => [
                    "message" => ["Тур не найден!"]
                ]
            ]);

        $tour->is_active = false;
        $tour->save();

        return response()->noContent();
    }

    public function removeGuideTourFromArchive(Request $request, $tourId)
    {
        $userId = Auth::user()->id;
        $tour = Tour::query()
            ->where("creator_id", $userId)
            ->where("id", $tourId)
            ->first();

        if (is_null($tour))
            return response()->json([
                "errors" => [
                    "message" => ["Тур не найден!"]
                ]
            ]);

        $tour->is_active = true;
        $tour->save();

        return response()->noContent();
    }

    public function loadActualGuideBookedTours(Request $request, $tourId)
    {
        $userId = Auth::user()->id;

        $size = $request->get("size") ?? config('app.results_per_page');

        $bookedTours = Booking::query()
            ->with(["tour", "user.profile", "transaction", "schedule"])
            ->where("tour_id", $tourId)
            ->orderBy("start_at", "ASC")
            ->whereHas("schedule", function ($q) use ($userId) {
                $q->whereBetween("start_at", [
                        Carbon::now()->format('Y-m-d H:i:s'),
                        Carbon::now()->addYear()->format('Y-m-d H:i:s')
                    ]
                );
            })
            ->paginate($size);

        return BookingResource::collection($bookedTours);
    }

    public function uploadToursExcel(Request $request)
    {
        $file = $request->file('file');

        if (is_null($file))
            return response()->noContent(400);

        $fileName = Str::uuid() . "." . $file->getClientOriginalExtension();
        $destinationPath = storage_path('app/public');
        $file->move($destinationPath, $fileName);

        try {
            Excel::import(new TourImport, storage_path('app/public/') . $fileName);
        } catch (\Exception $e) {
            return response()->json([
                "errors" => [
                    "message" => [$e->getMessage()]
                ]
            ], 400);
        }
        unlink(storage_path('app/public/') . $fileName);

        return response()->noContent();
    }
}
