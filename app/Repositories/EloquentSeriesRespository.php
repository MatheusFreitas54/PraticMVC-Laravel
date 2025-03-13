<?php

namespace App\Repositories;

use App\Models\Series;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;
use App\Repositories\SeriesRepository;

class EloquentSeriesRespository implements SeriesRepository {
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function () use ($request) {
            $serie = Series::create($request->all());
            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            $seasons = Season::where('series_id', $serie->id)->get();
            foreach ($seasons as $season) {
                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j,
                    ];
                }
            }
            Episode::insert($episodes);

            return $serie;
        }, attempts: 2);
    }

    public function findBySeasonId($seasonId)
    {
        // Exemplo de como buscar uma série com base na seasonId
        return Series::whereHas('seasons', function ($query) use ($seasonId) {
            $query->where('id', $seasonId);
        })->first();
    }
}
