<?php /** @noinspection PhpUnused */

namespace App\Livewire;

use App\Repositories\CitiesRepo;
use App\Services\WeatherService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CitySearch extends Component
{
    public array $current = [];
    public string $conditions = '';
    public string $q = '';

    /**
     * @return Factory|View|Application
     */
    public function search(): Factory|View|Application
    {
        $geo = CitiesRepo::getGeo($this->q);
        $weatherService = new WeatherService($geo['lat'], $geo['lon']);

        $weather = $weatherService->getCurrent();
        if ($weather->isEmpty() || $weather->has('error')) {
            return $this->render();
        }
        $this->current = [
            'temperature_2m' => $weather->get('current')['temperature_2m'],
            'conditions' => $weather->get('conditions'),
            'relative_humidity_2m' => $weather->get('current')['relative_humidity_2m'],
            'wind_speed_10m' => $weather->get('current')['wind_speed_10m'],
        ];
        $this->conditions = $this->q;
        return $this->render();
    }

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        return view('livewire.city-search');
    }
}
