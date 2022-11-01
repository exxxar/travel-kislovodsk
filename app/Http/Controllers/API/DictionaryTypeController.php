<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\DictionaryTypeStoreRequest;
use App\Http\Requests\API\DictionaryTypeUpdateRequest;
use App\Http\Resources\DictionaryTypeCollection;
use App\Http\Resources\DictionaryTypeResource;
use App\Models\DictionaryType;
use Illuminate\Http\Request;

class DictionaryTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DictionaryTypeCollection
     */
    public function index(Request $request)
    {
        $dictionaryTypes = DictionaryType::paginate($request->count ?? config('app.results_per_page'));

        return new DictionaryTypeCollection($dictionaryTypes);
    }

    /**
     * @param \App\Http\Requests\API\DictionaryTypeStoreRequest $request
     * @return \App\Http\Resources\DictionaryTypeResource
     */
    public function store(DictionaryTypeStoreRequest $request)
    {
        $dictionaryType = DictionaryType::create($request->validated());

        return new DictionaryTypeResource($dictionaryType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DictionaryType $dictionaryType
     * @return \App\Http\Resources\DictionaryTypeResource
     */
    public function show(Request $request, DictionaryType $dictionaryType)
    {
        return new DictionaryTypeResource($dictionaryType);
    }

    /**
     * @param \App\Http\Requests\API\DictionaryTypeUpdateRequest $request
     * @param \App\Models\DictionaryType $dictionaryType
     * @return \App\Http\Resources\DictionaryTypeResource
     */
    public function update(DictionaryTypeUpdateRequest $request, DictionaryType $dictionaryType)
    {
        $dictionaryType->update($request->validated());

        return new DictionaryTypeResource($dictionaryType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DictionaryType $dictionaryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DictionaryType $dictionaryType)
    {
        $dictionaryType->delete();

        return response()->noContent();
    }
}
