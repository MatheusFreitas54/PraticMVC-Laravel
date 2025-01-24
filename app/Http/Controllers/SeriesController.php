<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\SeriesRespository;

class SeriesController extends Controller
{

    public function __construct(private SeriesRespository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $series = Series::all();

        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index', compact('series'))->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);

        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$serie->nome}' adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->update($request->all());

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
    }
}
