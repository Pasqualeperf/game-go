@php
    $convertedDate = Illuminate\Support\Carbon::parse($date)->format('M-d-Y');
@endphp

<div class="game flex">
    <x-single-game-url slug="{{$slug}}">
        <img class="w-16 hover:opacity-75 transition ease-in-out duration-150" src="{{Str::replaceFirst('thumb', 'cover_big', $imageUrl)}}" alt="game title" srcset="">
    </x-single-game-url>
    <div class="ml-4">
        <x-single-game-url slug="{{$slug}}">{{$title}}</x-single-game-url>
        <div class="text-gray-300 text-sm mt-1">{{$convertedDate}}</div>
    </div>
</div>
