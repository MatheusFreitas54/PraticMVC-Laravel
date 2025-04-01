<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">

    {{-- {{ dd($episodes) }}; --}}
    <a href="{{ route('seasons.index', $season->series_id) }}" class="btn btn-secondary mb-3">
        ← Voltar para Temporadas
    </a>

    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}

                    <input type="checkbox"
                            name="episodes[]"
                            value="{{ $episode->id }}"
                            @if ($episode->watched) checked @endif
                    />
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>

</x-layout>
