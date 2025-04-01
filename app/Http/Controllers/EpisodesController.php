<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController
{
    private SeriesRepository $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'season' => $season,
            'series' => $season->series,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function showEpisodes($seasonId)
    {
        $serie = $this->repository->findBySeasonId($seasonId);
        return view('episodes.index', ['serie' => $serie->nome]);
    }

    public function update(Season $season, Request $request)
    {
        $watchedEpisodes = $request->episodes;

        DB::beginTransaction();

        try {
            $watchedEpisodesSet = array_flip($watchedEpisodes);

            $season->episodes->each(function (Episode $episode) use ($watchedEpisodesSet) {
                $episode->watched = isset($watchedEpisodesSet[$episode->id]);
            });

            $season->push();
            DB::commit();
            return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episódios marcados como assistidos.');
        } catch (\Exception $e) {

            DB::rollBack();
            \Log::error('Erro ao atualizar os episódios: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Houve um erro ao atualizar a temporada.']);
        }
    }
}
