<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourSearchRequest;
use App\Http\Requests\API\TourStoreRequest;
use App\Http\Requests\API\TourUpdateRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\TourCollection;
use App\Http\Resources\TourResource;
use App\Imports\TourImport;
use App\Imports\TourObjectImport;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Dictionary;
use App\Models\Favorite;
use App\Models\Schedule;
use App\Models\Tour;
use App\Models\TourObject;
use App\Models\User;
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
        $category = $request->get("category") ?? -1;
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
            ->paginate($size);

        return new TourCollection($tours);
    }

    /**
     * @param \App\Http\Requests\API\TourStoreRequest $request
     * @return \App\Http\Resources\TourResource
     */
    public function store(TourStoreRequest $request)
    {

        $creator = json_decode($request->creator ?? null);

        if (!is_null($creator))
            $userId = $creator->is_self ? Auth::user()->id : $creator->user_id;
        else
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
            'is_hot' => (boolean)($request->is_hot ?? false),
            'is_active' => (boolean)($request->is_active ?? false),
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


        // dd(json_decode($request->dates));

        $tour = Tour::query()->create($data);

        foreach (json_decode($request->dates) as $date)
            Schedule::query()->create([
                'tour_id' => $tour->id,
                'guide_id' => $userId,
                'start_at' => Carbon::parse($date)->format("Y-m-d H:m")
            ]);

        $tour->tourObjects()->attach(json_decode($request->tour_objects));
        $tour->tourCategories()->attach(json_decode($request->categories));

        $tour = $tour->load(["schedules", "tourObjects", "tourCategories", "tourType"]);

        return new TourResource($tour);
    }

    /**
     * @param \App\Http\Requests\API\TourUpdateRequest $request
     * @param \App\Models\Tour $tour
     * @return \App\Http\Resources\TourResource
     */
    public function update(TourUpdateRequest $request, $id)
    {
        $tour = Tour::query()->find($id);

        $creator = json_decode($request->creator ?? null);

        if (!is_null($creator))
            $userId = $creator->is_self ? Auth::user()->id : $creator->user_id;
        else
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
            'is_hot' => (boolean)($request->is_hot ?? false),
            'is_active' => (boolean)($request->is_active ?? false),
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
        if (isset($request->dates))
            foreach (json_decode($request->dates) as $date)
                if (!in_array($date, $schedulesDates->toArray()))
                    Schedule::query()->create([
                        'tour_id' => $tour->id,
                        'guide_id' => $userId,
                        'start_at' => Carbon::parse($date)->format("Y-m-d H:m")
                    ]);

        return new TourResource($tour);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tour $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $tour = Tour::query()->find($id);

        if (is_null($tour))
            return response()->noContent(404);

        $tour->delete();

        return response()->noContent();
    }

    public function restoreTour(Request $request, $id)
    {
        $tour = Tour::withTrashed()
            ->find($id);

        if (is_null($tour))
            return response()->noContent(404);

        $tour->deleted_at = null;
        $tour->save();

        return response()->noContent();
    }

    public function addTourToArchive(Request $request, $tourId)
    {
        $tour = Tour::query()
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

    public function removeTourFromArchive(Request $request, $tourId)
    {
        $tour = Tour::query()
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

    public function loadBookedTours(Request $request, $tourId)
    {

        $size = $request->get("size") ?? config('app.results_per_page');

        $bookedTours = Booking::query()
            ->with(["tour", "user.profile", "transaction", "schedule"])
            ->where("tour_id", $tourId)
            ->orderBy("start_at", "ASC")
            ->whereHas("schedule", function ($q) {
                $q->whereBetween("start_at", [
                        Carbon::now()->format('Y-m-d H:m:s'),
                        Carbon::now()->addYear()->format('Y-m-d H:m:s')
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

    public function getTourGuides(Request $request)
    {

        $search = $request->search ?? null;

        $guides = Company::query()
            ->with(["user"])
            ->withSearchFilter($search)
            ->get();

        return new CompanyCollection($guides);
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
}
