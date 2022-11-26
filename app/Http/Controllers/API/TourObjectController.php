<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ExceptionAPI;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourObjectSearchRequest;
use App\Http\Requests\API\TourObjectStoreRequest;
use App\Http\Requests\API\TourObjectUpdateRequest;
use App\Http\Resources\TourObjectCollection;
use App\Http\Resources\TourObjectResource;
use App\Http\Resources\TourResource;
use App\Models\Tour;
use App\Models\TourObject;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;

class TourObjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TourObjectCollection
     */
    public function index(Request $request)
    {
        $removed = (boolean)($request->removed??0);
        if ($removed)
            $tourObjects = TourObject::query()
                ->whereNotNull("deleted_at")
                ->paginate($request->size ?? config('app.results_per_page'));
            else
                $tourObjects = TourObject::query()
                    ->paginate($request->size ?? config('app.results_per_page'));

        return new TourObjectCollection($tourObjects);
    }

    public function loadGuideTourObjectsByPage(Request $request)
    {

        $removed = (boolean)($request->removed??0);
        if ($removed)
            $tourObjects = TourObject::query()
                ->whereNotNull("deleted_at")
                ->where("creator_id", Auth::user()->id)
                ->paginate($request->size ?? config('app.results_per_page'));
        else
            $tourObjects = TourObject::query()
                ->where("creator_id", Auth::user()->id)
                ->paginate($request->size ?? config('app.results_per_page'));

        return new TourObjectCollection($tourObjects);
    }

    /**
     * @param \App\Http\Requests\API\TourObjectStoreRequest $request
     * @return TourObjectResource|\Illuminate\Http\JsonResponse
     */
    public function store(TourObjectStoreRequest $request)
    {
        $tmp = (object)$request->validated();

        $tmp->creator_id = Auth::user()->id ?? config("app.default_guide_id");

        $tourObject = TourObject::query()->create((array)$tmp);

        return new TourObjectResource($tourObject);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourObject $tourObject
     * @return \App\Http\Resources\TourObjectResource
     */
    public function show(Request $request, $id)
    {

        $tourObject = TourObject::query()
            ->with(["creator", "creator.profile"])
            ->where("id", $id)
            ->first();

        return view('pages.tour-object', ["object" => json_encode(new TourObjectResource($tourObject))]);
    }

    /**
     * @param \App\Http\Requests\API\TourObjectUpdateRequest $request
     * @param \App\Models\TourObject $tourObject
     * @return TourObjectResource|\Illuminate\Http\JsonResponse
     */
    public function update(TourObjectUpdateRequest $request, TourObject $tourObject)
    {
        $tourObject->update($request->validated());

        return new TourObjectResource($tourObject);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TourObject $tourObject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TourObject $tourObject)
    {
        if (!is_null($tourObject))
            $tourObject->delete();

        return response()->noContent();
    }

    public function search(TourObjectSearchRequest $request)
    {
        $tourObjects = TourObject::withTrashed();

        $tourObjects = $tourObjects->where("description", 'like', '%' . $request->search . '%')
            ->orWhere('title', 'like', '%' . $request->search . '%')
            ->orWhere('comment', 'like', '%' . $request->search . '%')
            ->orWhere('address', 'like', '%' . $request->search . '%');

        $tourObjects = $tourObjects
            ->paginate($request->count ??
                config('app.results_per_page'));

        return new TourObjectCollection($tourObjects);
    }

    public function clearActive(Request $request)
    {
        $userId = Auth::user()->id;

        $tourObjects = TourObject::query()
            ->where('creator_id', $userId)
            ->get();

        foreach ($tourObjects as $tourObject)
            $tourObject->delete();

        return response()->noContent();

    }

    public function clearRemoved(Request $request)
    {
        $userId = Auth::user()->id;

        $tourObjects = TourObject::withTrashed()
            ->where('creator_id', $userId)
            ->whereNotNull('deleted_at')
            ->get();

        foreach ($tourObjects as $tourObject)
            $tourObject->forceDelete();

        return response()->noContent();
    }

    public function clear(Request $request)
    {
        $userId = Auth::user()->id;

        $tourObjects = TourObject::withTrashed()
            ->where('creator_id', $userId)
            ->get();

        foreach ($tourObjects as $tourObject)
            $tourObject->forceDelete();

        return response()->noContent();
    }

    public function restoreAll(Request $request)
    {
        $userId = Auth::user()->id;

        $tourObjects = TourObject::withTrashed()
            ->where('creator_id', $userId)
            ->whereNotNull('deleted_at')
            ->get();

        foreach ($tourObjects as $tourObject) {
            $tourObject->deleted_at = null;
            $tourObject->save();
        }


        $tourObjects = $tourObjects->fresh();

        return new TourObjectCollection($tourObjects);
    }


    public function restore(Request $request, TourObject $tourObject)
    {
        $tourObject->deleted_at = null;
        $tourObject->save();

        return new TourObjectResource($tourObject);
    }
}


