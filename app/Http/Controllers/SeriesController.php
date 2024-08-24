<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');
        // $request->session()->forget('mensagem.sucesso');
        // dd($series);

        return view('series.index', compact('series'))->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $series = Serie::create($request->all());
        // Session::flash('mensagem.sucesso', "Serie '{$serie->nome}' adicionada com sucesso!");

        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' adicionada com sucesso!");
    }

    public function destroy(Serie $series)
    {
        // dd($request->route());
        // SELECT * FROM series WHERE id = $request->series -> info da serie vem como parametro

        // Serie::destroy($request->series);  // DELETE FROM serie WHERE id = $request->series
        $series->delete();

        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso!");
    }

    public function edit(Serie $series)
    {
        // dd($series->temporadas());
        // Retornar a view com os dados da série
        return view('series.edit', compact('series'));
    }

    public function update(SeriesFormRequest $request, Serie $series)
    {
        $series->update($request->all());

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
    }
}
