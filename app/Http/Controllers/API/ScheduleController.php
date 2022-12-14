<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ScheduleStoreRequest;
use App\Http\Requests\API\ScheduleUpdateRequest;
use App\Http\Resources\ScheduleCollection;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $schedules = Schedule::query()
            ->with(["tour"])
            ->where("guide_id", Auth::user()->id)
            ->where("start_at", ">", Carbon::now()->format('Y-m-d H:m'))
            ->orderBy("start_at", "ASC")
            ->paginate($request->count ?? config('app.results_per_page'));

        return ScheduleResource::collection($schedules);
    }

    /**
     * @param \App\Http\Requests\API\ScheduleStoreRequest $request
     * @return \App\Http\Resources\ScheduleResource
     */
    public function store(ScheduleStoreRequest $request)
    {
        $schedule = Schedule::create($request->validated());

        return new ScheduleResource($schedule);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Schedule $schedule
     * @return \App\Http\Resources\ScheduleResource
     */
    public function show(Request $request, Schedule $schedule)
    {
        return new ScheduleResource($schedule);
    }

    /**
     * @param \App\Http\Requests\API\ScheduleUpdateRequest $request
     * @param \App\Models\Schedule $schedule
     * @return \App\Http\Resources\ScheduleResource
     */
    public function update(ScheduleUpdateRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());

        return new ScheduleResource($schedule);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Schedule $schedule)
    {
        $schedule->delete();

        return response()->noContent();
    }

    public function search(Request $request)
    {
        $request->validate([
            "filter_type" => "required"
        ]);

        $schedules = Schedule::query()
            ->with(["tour"])
            ->withFilters((object)[
                "filter_type" => $request->filter_type ?? 1,
                "date" => $request->date ?? null,
            ])
            ->where("guide_id", Auth::user()->id)
            ->where("start_at", ">", Carbon::now()->format('Y-m-d H:m'))
            ->orderBy("start_at", "ASC")
            ->paginate($request->count ?? config('app.results_per_page'));

        return ScheduleResource::collection($schedules);
    }
}
