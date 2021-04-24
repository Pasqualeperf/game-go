<x-layouts.app>
    <div class="container mx-auto px-4">
        <h2 class="text-xl uppercase tracking-wide font-semibold text-blue-500">
            Popular Games
        </h2>
        <livewire:popular-games>
        {{-- End popular games --}}

        <div class="flex flex-col lg:flex-row my-10">
            <div class="recent-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-xl uppercase tracking-wide font-semibold text-blue-500">
                    Recently Reviewed
                </h2>
                <livewire:recently-reviewed>
            </div>
            {{-- End Recently Reviewed --}}
            <div class="w-full lg:w-1/4 mt-8 lg:mt-0">
                <div class="most-anticipated">
                    <h2 class="text-lg uppercase tracking-wide font-semibold text-blue-300">
                        Most Anticipated
                    </h2>
                    <livewire:most-anticipated>
                </div>
                {{-- End Most Anticipated --}}
                <div class="coming-soon mt-8">
                    <h2 class="text-lg uppercase tracking-wide font-semibold text-blue-300">
                        Coming Soon
                    </h2>
                    <livewire:coming-soon>
                </div>
                {{-- End Coming Soon --}}
            </div>
        </div>
    </div>
    {{-- End container --}}
</x-layouts.app>
