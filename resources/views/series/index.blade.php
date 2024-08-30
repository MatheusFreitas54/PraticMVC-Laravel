<x-layout title="Séries">

    <a href="{{ route('series.create') }}" class="btn btn-primary mb-2">Adicionar</a>
    <a class="btn btn-primary mb-2" id='modal-test-button' style="display:none">Em Desenvolvimente Editar 2.0</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">{{ $serie->nome }}</a>


                <span class="d-flex flex-row justify-content-between">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-info btn-sm me-2">✏️</a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </span>

            </li>
        @endforeach
    </ul>

    {{-- Futuramente implementar edições atravez do modals --}}
    <div class="modal modal-test animate__animated animate__backInUp" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Série</h5>
                    <button type="button" class="btn-close modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        var modalButton = $('.modal-test');

        $('#modal-test-button').on('click', function(){
            modalButton.removeClass('animate__bounceOut').addClass('animate__bounceInUp');
            modalButton.show();
        });

        $('.modal-close').on('click', function() {
            modalButton.removeClass('animate__bounceInUp').addClass('animate__bounceOut')

            setTimeout(function() {
                modalButton.hide();
            }, 1000);
        })
    </script>

</x-layout>
