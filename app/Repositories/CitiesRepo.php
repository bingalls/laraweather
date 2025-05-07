<?php

namespace App\Repositories;

class CitiesRepo
{
    public static function getGeo(string $city): array
    {
        return match ($city) {
            'Chicago' => ['lat' => 41.84, 'lon' => -87.68],
            'Houston, TX' => ['lat' => 29.77, 'lon' => -95.39],
            'New York' => ['lat' => 40.71, 'lon' => -73.98],
            'San Diego' => ['lat' => 32.72, 'lon' => -117.15],
            'Seattle' => ['lat' => 47.60, 'lon' => -122.36],

            default => ['lat' => 35.87, 'lon' => -78.8],        // 'Raleigh, NC'
        };
    }
}
