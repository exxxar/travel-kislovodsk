<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\DictionaryStoreRequest;
use App\Http\Requests\API\DictionaryUpdateRequest;
use App\Http\Resources\DictionaryCollection;
use App\Http\Resources\DictionaryResource;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DictionaryCollection
     */
    public function index(Request $request)
    {
        $dictionaries = Dictionary::paginate($request->count ?? config('app.results_per_page'));

        return new DictionaryCollection($dictionaries);
    }

    /**
     * @param \App\Http\Requests\API\DictionaryStoreRequest $request
     * @return \App\Http\Resources\DictionaryResource
     */
    public function store(DictionaryStoreRequest $request)
    {
        $dictionary = Dictionary::create($request->validated());

        return new DictionaryResource($dictionary);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dictionary $dictionary
     * @return \App\Http\Resources\DictionaryResource
     */
    public function show(Request $request, Dictionary $dictionary)
    {
        return new DictionaryResource($dictionary);
    }

    /**
     * @param \App\Http\Requests\API\DictionaryUpdateRequest $request
     * @param \App\Models\Dictionary $dictionary
     * @return \App\Http\Resources\DictionaryResource
     */
    public function update(DictionaryUpdateRequest $request, Dictionary $dictionary)
    {
        $dictionary->update($request->validated());

        return new DictionaryResource($dictionary);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Dictionary $dictionary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Dictionary $dictionary)
    {
        $dictionary->delete();

        return response()->noContent();
    }
}
