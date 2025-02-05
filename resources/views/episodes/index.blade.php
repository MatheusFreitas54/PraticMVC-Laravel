<x-layout title="Episódios">

    <ul class="list-group">
        @foreach ($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{ $episode->number }}

                <input type="checkbox"></input>
            </li>
        @endforeach
    </ul>

    <button class="btn btn-primary">Salvar</button>

</x-layout>
