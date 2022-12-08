<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $tmpDate = Carbon::parse($this->start_at)->format('Y-m-d H:m:s');

        $date = explode(' ', $tmpDate);

        $schedule = [
            'id' => $this->id,
            'user_id' => $this->tour_id,
            'tour_id' => $this->tour_id,
            'start_at' => $tmpDate,
            'start_day' => $date[0]??'',
            'start_time' => $date[1]??'',
            'tour'=>$this->whenLoaded("tour")
        ];

        return $schedule;
    }
}
