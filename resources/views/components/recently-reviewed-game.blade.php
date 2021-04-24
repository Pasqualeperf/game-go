@php
    $round = ceil($rating);
    $explode = explode(" ", $summary);
    $slice = array_slice($explode, 0, 35);
    $excerpt = implode(" ", $slice);
@endphp

<div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
    <div class="relative inline-block">
        <x-single-game-url slug="{{$slug}}">
            <img class="w-40 hover:opacity-75 transition ease-in-out duration-150" src="{{Str::replaceFirst('thumb', 'cover_big', $imageUrl)}}" alt="game title" srcset="">
        </x-single-game-url>
        <div class="absolute" style="bottom:-20px; right:-20px;">
            <div id="{{ $slug }}" class="relativek w-16 h-16 bg-gray-900 rounded-full">
                <script>
                    const popularGame = document.querySelector('#{{$slug}}');
                    var bar = new ProgressBar.Circle(popularGame, {
                        color: '#fff',
                        strokeWidth: 4,
                        trailWidth: 1,
                        easing: 'easeInOut',
                        duration: Math.floor(Math.random() * 1500) + 1000,
                        text: {
                        autoStyleContainer: false
                        },
                        from: { color: '#fb6107', width: 1 },
                        to: { color: '#9ef01a', width: 4 },
                        step: function(state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        circle.path.setAttribute('stroke-width', state.width);
                        var value = {{$round}};
                        if (value === 0 ) {
                            circle.setText('N/A');
                        } else {
                            circle.setText(`${value}%`);
                        }
                        }
                    });
                    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                    bar.text.style.fontSize = '1rem';
                    bar.animate({{$round}} / 100);
                </script>
            </div>
        </div>
    </div>
    <div class="ml-12 flex-1">
        <x-single-game-url slug="{{$slug}}" class="block text-base font-semibold leading-tight hover:text-gray-400">
            {{$title}}
        </x-single-game-url>
        <div class="flex flex-wrap">
            @foreach ($platforms as $platform)
                <span class="text-gray-400 mt-1 mr-2 text-sm">{{$platform["abbreviation"] ?? ''}}</span>
            @endforeach
        </div>
        <p class="mt-6 text-gray-400 hidden lg:block">
            {{$excerpt}}...
        </p>
    </div>
</div>
