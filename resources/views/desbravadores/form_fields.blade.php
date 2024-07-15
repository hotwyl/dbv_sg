<div class="input-group my-5">
    <span class="input-group-text">Unidade:</span>
    <select class="form-control" id="id_unidade" name="id_unidade" required>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id_unidade }}" {{ (old('id_unidade', $desbravador->id_unidade ?? '') === $unidade->id_unidade) ? 'selected' : '' }}>{{ $unidade->nome }}</option>
        @endforeach
    </select>
    <a href="{{ route('unidades.create') }}" class="btn btn-secondary ml-3">Adicionar Unidade</a>
</div>

<div class="input-group mb-5">
    <span class="input-group-text">Nome:</span>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $desbravador->nome ?? '') }}" required>
</div>

<div class="input-group mb-5">
    <span class="input-group-text">Cargo:</span>
    <select class="form-control" name="id_cargo" required>
        @foreach($cargos as $cargo)
            <option value="{{ $cargo->id_cargo }}" {{ (old('id_cargo', $desbravador->id_cargo ?? '') === $cargo->id_cargo) ? 'selected' : '' }}>{{ $cargo->nome }}</option>
        @endforeach
    </select>
    <a href="{{ route('cargos.create') }}" class="btn btn-secondary ml-3">Adicionar Cargo</a>
</div>

<div class="input-group mb-5">
    <span class="input-group-text">Status:</span>
    <select class="form-control" name="status" required>
        <option value="1" {{ (old('status', $desbravador->status ?? 1) === 1) ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ (old('status', $desbravador->status ?? 0) === 0) ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
