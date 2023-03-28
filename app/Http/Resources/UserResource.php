<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=> $this->name,
            'email'=> $this->email,
            'role'=> $this->whenLoaded("role"),
            'phone'=> $this->phone,
            'company'=> $this->whenLoaded("company") ?? null,
            'user_law_status_id'=> $this->user_law_status_id,
            'user_law_status'=> $this->whenLoaded("userLawStatus") ?? null,
            'documents'=> $this->whenLoaded("documents") ?? [],
            'email_verified_at'=> $this->email_verified_at,
            'phone_verified_at'=> $this->phone_verified_at,
            'profile'=> $this->whenLoaded("profile") ?? null,
            'sms_notification'=> $this->sms_notification,
            'email_notification'=> $this->email_notification,
            'verified_at'=> $this->verified_at,
            'blocked_at'=> $this->blocked_at,
        ];
    }
}
