<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 shadow-sm sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-indigo-500 p-3">
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                </svg>
            </div>
            <p class="ml-16 truncate text-sm font-medium text-gray-500">Current Temperature</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-3 sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900">{{Arr::get($current, 'temperature_2m', '')}} F</p>
        </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 shadow-sm sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-indigo-500 p-3">
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>
            </div>
            <p class="ml-16 truncate text-sm font-medium text-gray-500">Current Conditions</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-3 sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900">{{Arr::get($current, 'conditions', 'unknown')}}</p>
        </dd>
    </div>
</dl>

<h2 class="mt-5 text-base font-semibold text-gray-900">Additional Details</h2>
<dl class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 shadow-sm sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-indigo-500 p-3">
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25 1.5 1.5.75-.75V8.758l2.276-.61a3 3 0 1 0-3.675-3.675l-.61 2.277H12l-.75.75 1.5 1.5M15 11.25l-8.47 8.47c-.34.34-.8.53-1.28.53s-.94.19-1.28.53l-.97.97-.75-.75.97-.97c.34-.34.53-.8.53-1.28s.19-.94.53-1.28L12.75 9M15 11.25 12.75 9" />
                </svg>
            </div>
            <p class="ml-16 truncate text-sm font-medium text-gray-500">Humidity</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-3 sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900">{{Arr::get($current, 'relative_humidity_2m', '')}}%</p>
        </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-white px-4 py-5 shadow-sm sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-indigo-500 p-3">
                <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
            </div>
            <p class="ml-16 truncate text-sm font-medium text-gray-500">Wind Speed</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-3 sm:pb-7">
            {{-- TODO handle empty cases --}}
            <p class="text-2xl font-semibold text-gray-900">{{Arr::get($current, 'wind_speed_10m', '')}} mph</p>
        </dd>
    </div>
</dl>
