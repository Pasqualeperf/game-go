<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {

        $nextYear = Carbon::now()->add(1, 'years')->timestamp;
        $now = Carbon::now()->timestamp;

        $this->comingSoon = Http::withHeaders(config('services.igdb'))
        ->withBody(
            "fields name, cover.url, first_release_date, hypes, platforms.abbreviation, rating, slug;
            where platforms = (39,6,130,34,167,11)
            & first_release_date < {$nextYear}
            & first_release_date > {$now}
            & hypes > 5;
            sort hypes desc;
            limit 3;",
            "text/plain"
        )
        ->post('https://api.igdb.com/v4/games/')
        ->json();
    }
    
    public function render()
    {
        return view('livewire.coming-soon');
    }
}
