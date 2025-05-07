<?php

use App\Services\WeatherService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', static function () {
    // TODO replace WeatherService with livewire loading
    return view('welcome', new WeatherService(35.7, -78.8)->getCurrent());
});

// ToDo put this in API routes
Route::get('/weather', [WeatherController::class, 'index'])->name('weather');
