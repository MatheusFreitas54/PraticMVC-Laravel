<x-layout title="Séries">

    <a href="{{ route('series.create') }}" class="btn btn-primary mb-2">Adicionar</a>
    <a class="btn btn-primary mb-2" id='modal-test-button'>Teste</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}

                <span class="d-flex flex-row justify-content-between">
                    <button class="btn btn-info btn-sm me-2 edit-button" data-id="{{ $serie->id }}" data-bs-toggle="modal" data-bs-target="#editModal{{ $serie->id }}">
                        ✏️
                    </button>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">🗑️</button>
                    </form>
                </span>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="editModal{{ $serie->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $serie->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered animate__animated">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $serie->id }}">Editar Série</h5>
                            <button type="button" class="btn-close modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <x-series.form :action="route('series.update', $serie->id)" :nome="$serie->nome" :update="true" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>

    <script>
        $(document).ready(function() {
            // Adiciona animações ao abrir o modal
            $('.edit-button').on('click', function() {
                var modalId = '#editModal' + $(this).data('id');
                var modalDialog = $(modalId).find('.modal-dialog');

                modalDialog.removeClass('animate__bounceOut').addClass('animate__bounceInUp');
            });

            // Adiciona animações ao fechar o modal
            $('.modal-close').on('click', function() {
                var modal = $(this).closest('.modal');
                var modalDialog = modal.find('.modal-dialog');

                modalDialog.removeClass('animate__bounceInUp').addClass('animate__bounceOut');

                setTimeout(function() {
                    modal.modal('hide');
                }, 1000); // Duração da animação de saída
            });

            // Remove a classe de animação ao fechar completamente o modal
            $('.modal').on('hidden.bs.modal', function () {
                var modalDialog = $(this).find('.modal-dialog');
                modalDialog.removeClass('animate__bounceOut');
            });
        });
    </script>

</x-layout>
