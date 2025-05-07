<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="flex flex-col h-screen justify-between">
@include('layouts.nav')
<main class="ml-48">
    @empty($current)
        <h1 class="text-3xl font-semibold text-gray-900">Weather Dashboard unavailable. Please try later</h1>
    @else
        @if($errors->any())
            {{-- ToDo this may need to be unescaped --}}
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @else
            @yield('content')
        @endif
    @endempty
</main>
@include('layouts.footer')
@livewireScripts
</body>
</html>
