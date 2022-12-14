<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DictionaryResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'dictionary_type_id' => $this->dictionary_type_id??null,
            'slug' => $this->slug,
            'dictionary_type_slug'=>$this->dictionaryType->slug
        ];
    }
}
