<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="d-flex flex-column justify-content-between mb-3 col-8">
                <label for="nome" class="form-label pr-5">Nome:</label>
                <input type="text" autofocus id="nome" name="nome" class="form-control ml-3" value="{{ old('nome') }}">
            </div>

            <div class="d-flex flex-column justify-content-between mb-3 col-2">
                <label for="seasonsQty" class="form-label pr-5">Nº Temporadas:</label>
                <input type="text" id="seasonsQty" name="seasonsQty" class="form-control ml-3" value="{{ old('seasonsQty') }}">
            </div>

            <div class="d-flex flex-column justify-content-between mb-3 col-2">
                <label for="episodesPerSeason" class="form-label pr-5">Eps / Temporada:</label>
                <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control ml-3" value="{{ old('episodesPerSeason') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

</x-layout>
