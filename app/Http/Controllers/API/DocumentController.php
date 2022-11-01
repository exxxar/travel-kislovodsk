<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\DocumentStoreRequest;
use App\Http\Requests\API\DocumentUpdateRequest;
use App\Http\Resources\DocumentCollection;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DocumentCollection
     */
    public function index(Request $request)
    {
        $documents = Document::paginate($request->count ?? config('app.results_per_page'));

        return new DocumentCollection($documents);
    }

    /**
     * @param \App\Http\Requests\API\DocumentStoreRequest $request
     * @return \App\Http\Resources\DocumentResource
     */
    public function store(DocumentStoreRequest $request)
    {
        $document = Document::create($request->validated());

        return new DocumentResource($document);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \App\Http\Resources\DocumentResource
     */
    public function show(Request $request, Document $document)
    {
        return new DocumentResource($document);
    }

    /**
     * @param \App\Http\Requests\API\DocumentUpdateRequest $request
     * @param \App\Models\Document $document
     * @return \App\Http\Resources\DocumentResource
     */
    public function update(DocumentUpdateRequest $request, Document $document)
    {
        $document->update($request->validated());

        return new DocumentResource($document);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Document $document)
    {
        $document->delete();

        return response()->noContent();
    }
}
