<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourSearchRequest;
use App\Http\Requests\API\TourStoreRequest;
use App\Http\Requests\API\TourUpdateRequest;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\TourCollection;
use App\Http\Resources\TourResource;
use App\Models\Dictionary;
use App\Models\Favorite;
use App\Models\Tour;
use App\Models\TourObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function loadGuideToursByPage(Request $request)
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
            ->paginate($size);

        return new TourCollection($tours);
    }

    public function search(TourSearchRequest $request)
    {

        $filterObject = (object)[
            'direction' => $request->direction ?? false,
            'location' => $request->location ?? null,
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

        $tourObjects = $request->tour_objects ?? [];
        $tmpTourObjectsIds = [];

        if (!empty($tourObjects)) {
            foreach ($tourObjects as $tourObject) {
                $tourObject = (object)$tourObject;

                if (is_null($tourObject->id)) {
                    $tmpTourObject = TourObject::query()->find($tourObject->id);
                    $tmpTourObject->update($tmpTourObject->toArray());

                    array_push($tmpTourObjectsIds, $tourObject->id);
                } else {
                    $tourObject = TourObject::query()->create([
                        'title' => $tourObject->title ?? '',
                        'description' => $tourObject->description ?? '',
                        'address' => $tourObject->address ?? '',
                        'latitude' => $tourObject->latitude ?? 0,
                        'longitude' => $tourObject->longitude ?? 0,
                        'comment' => $tourObject->comment ?? '',
                        'tour_guide_id' => $tourObject->tour_guide_id ?? null,
                        'creator_id' => Auth::user()->id,
                        'photos' => $tourObject->photos ?? [],
                    ]);

                    array_push($tmpTourObjectsIds, $tourObject->id);
                }

            }
        }


        $tour = Tour::query()->create([
            'title' => $request->title ?? '',
            'description' => $request->description ?? '',
            'start_place' => $request->start_place ?? '',
            'start_latitude' => $request->start_latitude ?? 0,
            'start_longitude' => $request->start_longitude ?? 0,
            'start_comment' => $request->start_longitude ?? null,
            'tour_object_id' => $request->tour_object_id,
            'preview_image' => $request->preview_image ?? null,
            'is_hot' => $request->is_hot ?? false,
            'is_active' => $request->is_active ?? false,
            'is_draft' => $request->is_draft ?? false,
            'duration' => $request->duration ?? null,
            'rating' => $request->rating ?? null,
            'images' => $request->images ?? null,
            'prices' => $request->prices ?? null,
            'include_services' => $request->include_services ?? null,
            'exclude_services' => $request->exclude_services ?? null,
            'duration_type_id' => $request->duration_type_id,
            'movement_type_id' => $request->movement_type_id,
            'tour_type_id' => $request->tour_type_id,
            'payment_type_id' => $request->payment_type_id,
            'creator_id' => Auth::user()->id,
            'verified_at' => [''],
            'deleted_at' => [''],
        ]);

        $tour->tourObjects()->attach($tmpTourObjectsIds);
        return new TourResource($tour);
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

        return view('pages.tour', ["tour" => json_encode(new TourResource($tour))]);
    }

    /**
     * @param \App\Http\Requests\API\TourUpdateRequest $request
     * @param \App\Models\Tour $tour
     * @return \App\Http\Resources\TourResource
     */
    public function update(TourUpdateRequest $request, Tour $tour)
    {
        $tour->update($request->validated());

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
}
