<x-layout title="Temporadas de {!! $series->nome !!}">

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada: {{ $season->number }}

                <span class="badge bg-secodary">

                    @foreach ($season->episodes as $episode)
                        {{ $episode->count() }}
                    @endforeach
                </span>
            </li>
        @endforeach
    </ul>

</x-layout>
