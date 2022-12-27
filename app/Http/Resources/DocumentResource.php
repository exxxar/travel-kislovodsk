<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'origin_title' => $this->origin_title ?? null,
            'path' => $this->path,
            'size' => $this->size,
            'user_id' => $this->user_id,
            'valid_to' => $this->valid_to,
            'approved_at' => $this->approved_at,
            'request_approve_at' => $this->request_approve_at,
        ];
    }
}
