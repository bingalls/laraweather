<?php

namespace App\Services;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Weather API proxy.
 * @todo Manage through a repository
 */
class WeatherService
{
    /**
     * @var string $url requires suffix like '&latitude=52.52&longitude=13.41'
     */
    public static string $url = 'https://api.open-meteo.com/v1/forecast?hourly=temperature_2m&current=temperature_2m,relative_humidity_2m,wind_speed_10m,weather_code&timezone=America%2FNew_York&wind_speed_unit=mph&temperature_unit=fahrenheit';

    public function __construct(private readonly float $lat, private readonly float $lon)
    {
        static::$url .= '&latitude=' . $this->lat . '&longitude=' . $this->lon;
    }

    /**
     * @return Collection
     * @todo cache this API for every 15 minutes
     * @todo Validate input from weather api. Currently, does not touch DB & is stripped in View
     */
    public function getCurrent(): Collection
    {
        $current = collect();
        try {
            $res = Http::get(static::$url);
            $current = $res->collect();
            $current->put('conditions', static::decodeWeather($current->get('current', ['weather_code'])['weather_code']));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            $current->put('error', 'Weather service currently unavailable');
        } finally {
            return $current;
        }
    }

    private static function decodeWeather(int $code): string
    {
        return match ($code) {
            0 => 'Clear sky',
            1 => 'Mainly clear',
            2 => 'Partly cloudy',
            3 => 'Overcast',
            45 => 'Fog',
            48 => 'Depositing rime fog',
            51 => 'Light drizzle',
            53 => 'Moderate drizzle',
            55 => 'Dense drizzle',
            56 => 'Light freezing drizzle',
            57 => 'Dense freezing drizzle',
            61 => 'Slight rain',
            63 => 'Moderate rain',
            65 => 'Heavy rain',
            66 => 'Light freezing rain',
            67 => 'Heavy freezing rain',
            71 => 'Slight snowfall',
            73 => 'Moderate snowfall',
            75 => 'Heavy snowfall',
            77 => 'Snow grains',
            80 => 'Slight rain showers',
            81 => 'Moderate rain showers',
            82 => 'Violent rain showers',
            85 => 'Slight snow showers',
            86 => 'Heavy snow showers',
            // Following only available in Central Europe
            //95 => 'Slight or moderate thunderstorm',
            //96 => 'Thunderstorm with slight hail',
            //99 => 'Thunderstorm with heavy hail',

            default => 'Unexpected conditions',
        };
    }


}
