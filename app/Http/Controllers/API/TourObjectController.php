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
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
        $removed = (boolean)($request->removed ?? 0);
        if ($removed)
            $tourObjects = TourObject::withTrashed()

                ->whereNotNull("deleted_at")
                ->orderBy("created_at","DESC")
                ->paginate($request->size ?? config('app.results_per_page'));
        else
            $tourObjects = TourObject::query()
                ->orderBy("created_at","DESC")
                ->paginate($request->size ?? config('app.results_per_page'));

        return new TourObjectCollection($tourObjects);
    }

    public function loadGuideTourObjectsByPage(Request $request)
    {

        $removed = (boolean)($request->removed ?? 0);
        if ($removed)
            $tourObjects = TourObject::withTrashed()
                ->whereNotNull("deleted_at")
                ->where("creator_id", Auth::user()->id)
                ->orderBy("created_at","DESC")
                ->paginate($request->size ?? config('app.results_per_page'));
        else
            $tourObjects = TourObject::query()
                ->where("creator_id", Auth::user()->id)
                ->orderBy("created_at","DESC")
                ->paginate($request->size ?? config('app.results_per_page'));

        return new TourObjectCollection($tourObjects);
    }


    /**
     * @param \App\Http\Requests\API\TourObjectStoreRequest $request
     * @return TourObjectResource|\Illuminate\Http\JsonResponse
     */
    public function store(TourObjectStoreRequest $request)
    {
        $userId = Auth::user()->id;

        $user = User::query()
            ->with(["profile", "company"])
            ->where("id", $userId)
            ->first();

        $path = '/user/' . $userId."/tour-objects";
        if (!Storage::exists('/public' . $path)) {
            Storage::makeDirectory('/public' . $path);
        }

        $photos = [];
        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();

                $name = Str::uuid().".".$ext;


                $file->storeAs("/public", $path . '/' . $name );
                $url = Storage::url('user/' . $userId . "/tour-objects/" . $name );

                array_push($photos, $url);

            }

        }

        $tmp = (object)$request->validated();

        $tmp->creator_id = $user->id;
        $tmp->photos = $photos;
        $tmp->latitude = 0;//todo:load from yandex
        $tmp->longitude = 0;//todo:load from yandex

        $tourObject = TourObject::query()->with(["creator","creator.profile"])->create((array)$tmp);

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
    public function destroy(Request $request, $id)
    {

        $tourObject = TourObject::query()->where("id", $id)->first();

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


    public function restore(Request $request, $id)
    {

        $tourObject = TourObject::withTrashed()->where("id", $id)->first();

        if (is_null($tourObject))
            return response()->json([
                "errors"=>[
                    "message"=>"Объект не найден!"
                ]
            ]);


        $tourObject->deleted_at = null;
        $tourObject->save();

        return new TourObjectResource($tourObject);
    }

    public function downloadImage($request, $userId, $path){
        try {

            $file = Storage::disk('local')->get("public/user/".$userId."/tour-objects/" . $path);

            return (new Response($file, 200))
                ->header('Content-Type', 'image/jpeg');
        } catch (FileNotFoundException $e) {
            return null;
        }
    }
}


