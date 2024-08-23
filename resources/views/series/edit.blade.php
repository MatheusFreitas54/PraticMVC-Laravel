<x-layout title="Editar Série">

    <form action="{{ route('series.update', $series->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="d-flex flex-column justify-content-between mb-3">
            <label for="" class="form-label pr-5">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control ml-3" value="{{ old('nome', $series->nome) }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

</x-layout>
