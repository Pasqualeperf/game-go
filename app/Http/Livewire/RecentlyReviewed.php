<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $beforeThisDate = Carbon::now()->sub(2, 'months')->timestamp;
        $afterThisDate = Carbon::now()->sub(2, 'years')->timestamp;

        $this->recentlyReviewed = Http::withHeaders(config('services.igdb'))
        ->withBody(
            "fields name, cover.url, summary, updated_at, total_rating_count, platforms.abbreviation, rating, slug;
            where platforms = (39,6,130,34,167,11)
            & updated_at >= {$beforeThisDate}
            & total_rating_count > 5;
            sort updated_at desc;
            limit 3;",
            "text/plain"
        )
        ->post('https://api.igdb.com/v4/games/')
        ->json();

    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
