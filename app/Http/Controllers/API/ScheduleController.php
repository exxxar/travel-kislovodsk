<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ScheduleStoreRequest;
use App\Http\Requests\API\ScheduleUpdateRequest;
use App\Http\Resources\ScheduleCollection;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ScheduleCollection
     */
    public function index(Request $request)
    {
        $schedules = Schedule::paginate($request->count ?? config('app.results_per_page'));

        return new ScheduleCollection($schedules);
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
}
