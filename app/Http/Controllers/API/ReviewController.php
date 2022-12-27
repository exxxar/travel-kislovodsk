<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ReviewStoreRequest;
use App\Http\Requests\API\ReviewUpdateRequest;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Wkhooy\ObsceneCensorRus;

class ReviewController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ReviewCollection
     */
    public function index(Request $request)
    {
        $reviews = Review::paginate($request->count ?? config('app.results_per_page'));

        return new ReviewCollection($reviews);
    }

    public function selfReviews(Request $request)
    {
        $reviews = Review::query()
            ->where("user_id", Auth::user()->id)
            ->paginate($request->count ?? config('app.results_per_page'));

        return new ReviewCollection($reviews);
    }

    /**
     * @param \App\Http\Requests\API\ReviewStoreRequest $request
     * @return \App\Http\Resources\ReviewResource
     */
    public function store(Request $request)
    {
        $request->validate([
            "rating" => "required",
            "comment" => "required",
            "object_id" => "required",
            "object_type" => "required",
        ]);

        $userId = Auth::user()->id;

        $path = '/user/' . $userId . "/reviews";
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
                $url = Storage::url('user/' . $userId . "/reviews/" . $name);
                array_push($photos, $url);
            }
        }

        $text = $request->comment;
        ObsceneCensorRus::filterText($text);

        $review = Review::create([
            'user_id' => $userId,
            'tour_id' => $request->object_type == 'tour' ? $request->object_id : null,
            'tour_guide_id' => $request->object_type == 'guide' ? $request->object_id : null,
            'comment' => $text,
            'images' => $photos,
            'rating' => $request->rating
        ]);

        return new ReviewResource($review);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \App\Http\Resources\ReviewResource
     */
    public function show(Request $request, Review $review)
    {
        return new ReviewResource($review);
    }

    public function showByTour(Request $request, $tourId)
    {
        $size = $request->get("size") ?? config('app.results_per_page');

        $sort = $request->get("sort") ?? null;
        $direction = $request->get("direction") ?? 'ASC';

        $sortObject = (object)[
            "sort"=>$sort,
            "direction"=>$direction
        ];

        $reviews = Review::query()
            ->withSort($sortObject)
            ->where("tour_id", $tourId)
            ->paginate($size);

        return ReviewResource::collection($reviews ?? []);
    }


    /**
     * @param \App\Http\Requests\API\ReviewUpdateRequest $request
     * @param \App\Models\Review $review
     * @return \App\Http\Resources\ReviewResource
     */
    public function update(ReviewUpdateRequest $request, Review $review)
    {
        $review->update($request->validated());

        return new ReviewResource($review);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
         $review = Review::query()->where("id", $id)
             ->where("user_id", Auth::user()->id)
             ->first();

         if (is_null($review))
             return response()->json([
                 "errors" => [
                     "message" => ["Отзыв не найден!"]
                 ]
             ]);

        if (!is_null($review->deleted_at))
            return response()->json([
                "errors" => [
                    "message" => ["Отзыв уже удален!"]
                ]
            ]);

        $review->delete();

        return response()->noContent();
    }
}
