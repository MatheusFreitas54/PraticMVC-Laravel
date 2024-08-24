<form action="{{ $action }}" method="post">
    @csrf
    @if($update)
        @method('PUT')
    @endif

    <div class="d-flex flex-column justify-content-between mb-3">
        <label for="" class="form-label pr-5">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control ml-3" @isset($nome)value="{{ $nome }}"@endisset>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>
