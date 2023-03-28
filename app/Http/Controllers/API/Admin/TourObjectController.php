<?php

namespace App\Http\Controllers\API\Admin;

use App\Exceptions\ExceptionAPI;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\TourObjectSearchRequest;
use App\Http\Requests\API\TourObjectStoreRequest;
use App\Http\Requests\API\TourObjectUpdateRequest;
use App\Http\Resources\TourObjectCollection;
use App\Http\Resources\TourObjectResource;
use App\Http\Resources\TourResource;
use App\Imports\TourImport;
use App\Imports\TourObjectImport;
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
use Maatwebsite\Excel\Facades\Excel;

class TourObjectController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TourObjectCollection
     */
    public function index(Request $request)
    {

        $tourObjects = TourObject::withTrashed()
            ->orderBy("created_at", "DESC")
            ->paginate($request->size ?? config('app.results_per_page'));

        return new TourObjectCollection($tourObjects);
    }

    public function search(Request $request)
    {
        $filterObject = (object)[
            "need_not_verified" => (bool)$request->need_not_verified ?? false,
            "need_verified" => (bool)$request->need_verified ?? false,
            "need_template" => (bool)$request->need_template ?? false,
            "need_all" => (bool)$request->need_all ?? false,
            "need_removed" => (bool)$request->need_removed ?? false,
            "need_active" => (bool)$request->need_active ?? false,
        ];
        $tourObjects = TourObject::withTrashed()
            ->withFilters($filterObject)
            ->orderBy("created_at", "DESC")
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

        $path = '/user/' . $userId . "/tour-objects";
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
                $url = Storage::url('user/' . $userId . "/tour-objects/" . $name);

                array_push($photos, $url);

            }

        }

        $tmp = (object)$request->validated();

        $tmp->creator_id = $userId;
        $tmp->photos = $photos;

        $tourObject = TourObject::query()->with(["creator", "creator.profile"])->create((array)$tmp);

        return new TourObjectResource($tourObject);
    }


    /**
     * @param \App\Http\Requests\API\TourObjectUpdateRequest $request
     * @param \App\Models\TourObject $tourObject
     * @return TourObjectResource|\Illuminate\Http\JsonResponse
     */
    public function update(TourObjectUpdateRequest $request, $id)
    {
        $userId = Auth::user()->id;


        $path = '/user/' . $userId . "/tour-objects";
        if (!Storage::exists('/public' . $path)) {
            Storage::makeDirectory('/public' . $path);
        }

        $photos = json_decode($request->photos ?? '[]');
        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();

                $name = Str::uuid() . "." . $ext;


                $file->storeAs("/public", $path . '/' . $name);
                $url = Storage::url('user/' . $userId . "/tour-objects/" . $name);

                array_push($photos, $url);

            }

        }

        $tmp = (object)$request->validated();
        $tmp->photos = $photos;

        $tourObject = TourObject::query()
            ->with(["creator", "creator.profile"])
            ->where("id", $id)
            ->first();


        $tourObject->update((array)$tmp);

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

        if (!is_null($tourObject)) {
            $tourObject->delete();
            return response()->noContent();
        }
        return response()->json([
            "errors" => [
                "message" => ["Данный туристический объект не найден!"]
            ]
        ], 404);
    }

    public function uploadTourObjectsExcel(Request $request)
    {
        $file = $request->file('file');

        if (is_null($file))
            return response()->noContent(400);

        $fileName = Str::uuid() . "." . $file->getClientOriginalExtension();
        $destinationPath = storage_path('app/public');
        $file->move($destinationPath, $fileName);


        try {
            Excel::import(new TourObjectImport, storage_path('app/public/') . $fileName);
        } catch (ValidationException $e) {
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


