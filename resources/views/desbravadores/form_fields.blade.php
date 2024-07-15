<div class="form-group">
    <label for="id_unidade">Unidade</label>
    <select class="form-control" id="id_unidade" name="id_unidade" required>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id_unidade }}" {{ (old('id_unidade', $desbravador->id_unidade ?? '') === $unidade->id_unidade) ? 'selected' : '' }}>{{ $unidade->nome }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $desbravador->nome ?? '') }}" required>
</div>

<div class="form-group">
    <label for="id_cargo">Cargo</label>
    <select class="form-control" id="id_cargo" name="id_cargo" required>
        @foreach($cargos as $cargo)
            <option value="{{ $cargo->id_cargo }}" {{ (old('id_cargo', $desbravador->id_cargo ?? '') === $cargo->id_cargo) ? 'selected' : '' }}>{{ $cargo->nome }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="1" {{ (old('status', $desbravador->status ?? 1) === 1) ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ (old('status', $desbravador->status ?? 0) === 0) ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
