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
            'user_id'=>$this->whenLoaded("user")->id ?? null,
            'law_address' => $this->law_address,
            'approve_at'=> $this->approve_at,
            'request_approve_at'=> $this->request_approve_at,
            'documents' => DocumentCollection::make($this->whenLoaded('documents')),
        ];
    }
}
