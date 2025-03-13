<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\SeriesRepository;


class EpisodesController {

    private SeriesRepository $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index(Season $season) {
        // $episodes = Episodes::all();
        return view( 'episodes.index', ['episodes' => $season->episodes]);
    }

    public function showEpisodes($seasonId)
    {
        $serie = $this->repository->findBySeasonId($seasonId); // Crie um método no repositório para encontrar pela seasonId
        return view('episodes.index', ['serie' => $serie->nome]);
    }

}
