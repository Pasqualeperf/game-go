<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {

        $this->popularGames = Cache::remember('popularGames', 10, function () {

            $beforeThisDate = Carbon::now()->sub(2, 'months')->timestamp;
            $afterThisDate = Carbon::now()->sub(2, 'years')->timestamp;

            return Http::withHeaders(config('services.igdb'))
            ->withBody(
                "fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;
                where platforms = (39,6,130,34,167,11)
                & first_release_date >= {$afterThisDate}
                & first_release_date < {$beforeThisDate}
                & total_rating_count > 5;
                sort total_rating_count desc;
                limit 12;",
                "text/plain"
            )
            ->post('https://api.igdb.com/v4/games/')
            ->json();
        });

    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
