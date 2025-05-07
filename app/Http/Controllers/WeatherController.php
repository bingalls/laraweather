<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function index(): JsonResponse
    {
        // ToDo: make Raleigh lat & lon dynamic
        $svc = new WeatherService(35.7, -78.8);
        return response()->json($svc->getCurrent()->toArray());
    }

}
