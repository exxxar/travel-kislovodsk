<?php

namespace App\Http\Controllers\API;

use App\Classes\PogodaKlimat\PogodaIKlimatAPI;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    public function findWeatherLocation(Request $request){
        $request->validate([
            "location"=>"required"
        ]);

        $pogoda = new PogodaIKlimatAPI();
        return response()->json($pogoda->findLocation($request->location));
    }

    public function getWeatherByRegionId(Request $request, $regionId){
        $pogoda = new PogodaIKlimatAPI();

        return response()->json($pogoda->getPogodaByRegionId($regionId));
    }

    public function getAllWeatherLocations(Request $request) {
        return [];
    }

}
