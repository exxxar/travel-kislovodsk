<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\DictionaryStoreRequest;
use App\Http\Requests\API\DictionaryUpdateRequest;
use App\Http\Resources\DictionaryCollection;
use App\Http\Resources\DictionaryResource;
use App\Http\Resources\DictionaryTypeCollection;
use App\Models\Dictionary;
use App\Models\DictionaryType;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DictionaryCollection
     */
    public function index(Request $request)
    {
        $dictionaries = Dictionary::query()
            ->with(["dictionaryType"])
            ->paginate($request->count ?? config('app.results_per_page'));

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

    public function getAllDictionaries()
    {
        return new DictionaryCollection(Dictionary::getAllDictionariesGroupedByType());
    }

    public function getTypeGroups(Request $request, $type)
    {
        $dt = DictionaryType::query()->where("slug", $type . "_type")->first();

        if (is_null($dt))
            return response()->json([], 404);

        return new DictionaryCollection(Dictionary::query()->where("dictionary_type_id", "$dt->id")->get());
    }

    public function getByTypeId($typeId)
    {
        return new DictionaryCollection(Dictionary::query()->where("dictionary_type_id", "$typeId")->get());
    }

    public function getById($id)
    {
        return new DictionaryResource(Dictionary::query()->where("id", $id)->first());
    }

    public function getAllTypes(Request $request)
    {
        return new DictionaryTypeCollection(DictionaryType::query()->get());
    }

    public function addDictionary(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'dictionary_type_id' => ['required', 'exists:dictionary_types,id']
        ]);

        $dictionary = Dictionary::query()->create($request->all());

        return new DictionaryResource($dictionary);
    }

    public function addType(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'slug' => [''],
        ]);

        $dt = DictionaryType::query()->create($request->all());

        return new DictionaryResource($dt);
    }

    public function removeDictionaryById(Request $request, $id){
        $dictionary = Dictionary::query()->find($id);

        if (is_null($dictionary))
            return response()->json([], 400);

        $dictionary->delete();

        return response()->noContent();
    }

    public function getLocations(Request $request){
        return response()->json(Dictionary::getLocations());
    }

    public function getTourDates(Request $request){
        return response()->json(Dictionary::getTourDates());
    }

    public function getSelfTourDates(Request $request){
        return response()->json(Dictionary::getTourDates(true));
    }
}
