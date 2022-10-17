<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'path' => $this->path,
            'description' => $this->description,
            'company_id' => $this->company_id,
            'valid_to' => $this->valid_to,
            'approved_at' => $this->approved_at,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
