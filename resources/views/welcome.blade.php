@extends('layouts.main')
@section('title', config('app.name'))
@section('content')

<div>
    <h1 class="text-3xl font-semibold text-gray-900">Weather Dashboard</h1>

    @livewire('city-search', [])

</div>
@endsection
