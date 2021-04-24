<x-layouts.app>
    @php
        if (array_key_exists('rating', $singleGame[0])) {
            $roundRating = ceil($singleGame[0]['rating']);
        } else {
            $roundRating = 0;
        }
        if (array_key_exists('aggregated_rating', $singleGame[0])) {
            $roundCritic = ceil($singleGame[0]['aggregated_rating']);
        } else {
            $roundCritic = 0;
        }
    @endphp

    <div class="single-game container px-4 mx-auto flex flex-col lg:flex-row">
        <div class="flex-none">
            <img class="mx-auto lg:mx-0 w-60 lg:w-full" src="{{ Str::replaceFirst('thumb', 'cover_big', $singleGame[0]['cover']['url']) }}" alt="game title" srcset="">
        </div>
        <div class="mt-12 lg:ml-20 lg:mt-0">
            <h1 class="text-5xl font-semibold leading-tight">{{$singleGame[0]['name']}}</h1>
            <div class="text-gray-400 mt-1">
                @foreach ($singleGame[0]['platforms'] as $platform)
                    {{$platform['abbreviation'] ?? ''}}
                @endforeach
            </div>
            <div class="flex flex-col sm:flex-row mt-12 space-y-12 sm:space-x-12 sm:space-y-0">
                <div class="flex items-center">
                    <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative">
                        @push('scripts')
                            <script>
                                const memberRating = document.querySelector('#memberRating');

                                var bar = new ProgressBar.Circle(memberRating, {
                                    color: '#fff',
                                    strokeWidth: 4,
                                    trailWidth: 1,
                                    easing: 'easeInOut',
                                    duration: 1800,
                                    text: {
                                    autoStyleContainer: false
                                    },
                                    from: { color: '#fb6107', width: 1 },
                                    to: { color: '#9ef01a', width: 4 },
                                    step: function(state, circle) {
                                    circle.path.setAttribute('stroke', state.color);
                                    circle.path.setAttribute('stroke-width', state.width);

                                    var value = {{$roundRating}};
                                    if (value === 0 ) {
                                        circle.setText('N/A');
                                    } else {
                                        circle.setText(`${value}%`);
                                    }

                                    }
                                });
                                bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                                bar.text.style.fontSize = '1rem';

                                bar.animate({{$roundRating}} / 100);
                            </script>
                        @endpush
                    </div>
                    <div class="ml-3 text-sm"> Member <br> Score </div>
                </div>
                <div class="flex items-center">
                    <div id="criticRating" class="w-16 h-16 bg-gray-800 rounded-full relative">
                        @push('scripts')
                            <script>
                                const criticRating = document.querySelector('#criticRating');

                                var bar = new ProgressBar.Circle(criticRating, {
                                    color: '#fff',
                                    strokeWidth: 4,
                                    trailWidth: 1,
                                    easing: 'easeInOut',
                                    duration: 2300,
                                    text: {
                                    autoStyleContainer: false
                                    },
                                    from: { color: '#fb6107', width: 1 },
                                    to: { color: '#9ef01a', width: 4 },
                                    step: function(state, circle) {
                                    circle.path.setAttribute('stroke', state.color);
                                    circle.path.setAttribute('stroke-width', state.width);

                                    var value = {{$roundCritic}};
                                    if (value === 0) {
                                        circle.setText('N/A');
                                    } else {
                                        circle.setText(`${value}%`);
                                    }

                                    }
                                });

                                bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                                bar.text.style.fontSize = '1rem';

                                bar.animate({{$roundCritic}} / 100);
                            </script>
                        @endpush
                    </div>
                    <div class="ml-3 text-sm"> Critic <br> Score </div>
                </div>
                <div class="socials flex items-center mt-3 sm:mt-0 space-x-3">
                    <a href="#">
                        <div class="bg-gray-800 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm1 16.057v-3.057h2.994c-.059 1.143-.212 2.24-.456 3.279-.823-.12-1.674-.188-2.538-.222zm1.957 2.162c-.499 1.33-1.159 2.497-1.957 3.456v-3.62c.666.028 1.319.081 1.957.164zm-1.957-7.219v-3.015c.868-.034 1.721-.103 2.548-.224.238 1.027.389 2.111.446 3.239h-2.994zm0-5.014v-3.661c.806.969 1.471 2.15 1.971 3.496-.642.084-1.3.137-1.971.165zm2.703-3.267c1.237.496 2.354 1.228 3.29 2.146-.642.234-1.311.442-2.019.607-.344-.992-.775-1.91-1.271-2.753zm-7.241 13.56c-.244-1.039-.398-2.136-.456-3.279h2.994v3.057c-.865.034-1.714.102-2.538.222zm2.538 1.776v3.62c-.798-.959-1.458-2.126-1.957-3.456.638-.083 1.291-.136 1.957-.164zm-2.994-7.055c.057-1.128.207-2.212.446-3.239.827.121 1.68.19 2.548.224v3.015h-2.994zm1.024-5.179c.5-1.346 1.165-2.527 1.97-3.496v3.661c-.671-.028-1.329-.081-1.97-.165zm-2.005-.35c-.708-.165-1.377-.373-2.018-.607.937-.918 2.053-1.65 3.29-2.146-.496.844-.927 1.762-1.272 2.753zm-.549 1.918c-.264 1.151-.434 2.36-.492 3.611h-3.933c.165-1.658.739-3.197 1.617-4.518.88.361 1.816.67 2.808.907zm.009 9.262c-.988.236-1.92.542-2.797.9-.89-1.328-1.471-2.879-1.637-4.551h3.934c.058 1.265.231 2.488.5 3.651zm.553 1.917c.342.976.768 1.881 1.257 2.712-1.223-.49-2.326-1.211-3.256-2.115.636-.229 1.299-.435 1.999-.597zm9.924 0c.7.163 1.362.367 1.999.597-.931.903-2.034 1.625-3.257 2.116.489-.832.915-1.737 1.258-2.713zm.553-1.917c.27-1.163.442-2.386.501-3.651h3.934c-.167 1.672-.748 3.223-1.638 4.551-.877-.358-1.81-.664-2.797-.9zm.501-5.651c-.058-1.251-.229-2.46-.492-3.611.992-.237 1.929-.546 2.809-.907.877 1.321 1.451 2.86 1.616 4.518h-3.933z"/>
                            </svg>
                        </div>
                    </a>
                    <a href="#">
                        <div class="bg-gray-800 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current"  viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </div>
                    </a>
                    <a href="#">
                        <div class="bg-gray-800 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current"  viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </div>
                    </a>
                    <a href="#">
                        <div class="bg-gray-800 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current"  viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
            <div x-data="{ showVideo: false }" class="mt-12 w-6/12">
                <p class="text-xs">
                    {{$singleGame[0]['summary']}}
                </p>
                <button @click="showVideo = true" class="mt-12 flex items-center text-sm font-semibold p-3 rounded-sm bg-blue-400 hover:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mr-2 fill-current" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-3 17v-10l9 5.146-9 4.854z"/></svg>
                    Play Trailer
                </button>

                <div x-show="showVideo" class="modal-container overflow-auto bg-gray-900 bg-opacity-50 w-screen h-screen fixed inset-0 z-10 flex justify-items-center items-center">
                    <div class="bg-gray-800 w-11/12 lg:w-4/12 mx-auto rounded shadow-lg py-4 px-6 flex flex-col items-center" @click.away="showVideo = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">

                        <!--Title-->
                        <div class="w-full">
                            <div class="cursor-pointer z-50" @click="showVideo = false">
                                <svg class="ml-auto fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- content -->
                        <iframe id="ytplayer" type="text/html" class="w-10/12 h-96 m-3 responsive-iframe"
                        src="http://www.youtube.com/embed/{{$singleGame[0]['videos'][1]['video_id'] ??  $singleGame[0]['videos'][0]['video_id']}}"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                        <!--Footer-->
                        <div>
                            <button class="modal-close px-4 text-white text-sm font-semibold p-3 rounded-sm bg-blue-400 hover:bg-blue-500" @click="showVideo = false">Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-12 container px-4 mx-auto">
        <hr class="border-gray-800">
    </div>
    <div class="container px-4 mx-auto">
        <h2 class="text-xl tracking-wide font-semibold text-blue-500">
            Images
        </h2>
        <div class="gallery grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-12">
            @foreach ($singleGame[0]['screenshots'] as $photo)
                <img class="w-10/12" src="{{ Str::replaceFirst('thumb', 'screenshot_med', $photo['url']) }}" alt="Image 1" srcset="">
            @endforeach
        </div>
    </div>
    <div class="my-12 container px-4 mx-auto">
        <hr class="border-gray-800">
    </div>
    <div class="container px-4 mx-auto">
        <h2 class="text-xl uppercase tracking-wide font-semibold text-blue-500">
            Popular Games
        </h2>
        <livewire:popular-games>
    </div>

</x-layouts.app>

