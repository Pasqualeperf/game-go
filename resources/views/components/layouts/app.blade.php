<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    {{-- Style --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- livewire --}}
    @livewireStyles
    {{-- Alpine js --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>
    <body class="bg-gray-900 text-white">
        <header class="border-b border-gray-800">
            <x-navigation></x-navigation>
        </header>
        <main class="relative py-8">
            {{$slot}}
        </main>
        <footer class="border-t border-gray-800">
            <x-footer></x-footer>
        </footer>
    {{-- livewire --}}
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    </body>
</html>
