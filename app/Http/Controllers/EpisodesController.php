<?php

namespace App\Http\Controllers;

use App\Models\Season;


class EpisodesController {
    public function index(Season $season) {
        // $episodes = Episodes::all();
        return view( 'episodes.index', ['episodes' => $season->episodes]);
    }
}
