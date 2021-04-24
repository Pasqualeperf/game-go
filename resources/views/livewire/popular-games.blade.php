<div wire:init="loadPopularGames" class="popular-games text-sm grid gid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-0 sm:gap-3 md:gap-6 lg:gap-9 xl:gap-12 border-b border-gray-800 pb-16">
    @forelse ($popularGames as $game)
            <x-popular-game title="{{$game['name']}}" :imageUrl="$game['cover']['url']" :rating="$game['rating']" :platforms="$game['platforms']" slug="{{$game['slug']}}">
            </x-popular-game>
        @empty
            <div class="flex items-center justify-center space-x-4 mt-4">
                <svg class="animate-spin h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Loading</span>
            </div>
    @endforelse
</div>
