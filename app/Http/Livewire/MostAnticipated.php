<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $nextYear = Carbon::now()->add(1, 'years')->timestamp;

        $this->mostAnticipated = Http::withHeaders(config('services.igdb'))
        ->withBody(
            "fields name, cover.url, first_release_date, hypes, platforms.abbreviation, rating, slug;
            where platforms = (39,6,130,34,167,11)
            & first_release_date >= {$nextYear}
            & hypes > 5;
            sort hypes desc;
            limit 4;",
            "text/plain"
        )
        ->post('https://api.igdb.com/v4/games/')
        ->json();
    }


    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
