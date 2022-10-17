<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'description' => $this->description,
            'photo' => $this->photo,
            'inn' => $this->inn,
            'ogrn' => $this->ogrn,
            'law_address' => $this->law_address,
            'softdeletes' => $this->softdeletes,
            'documents' => DocumentCollection::make($this->whenLoaded('documents')),
        ];
    }
}
