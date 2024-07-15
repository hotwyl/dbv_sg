<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $avaliador->nome ?? '') }}" required>
</div>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $avaliador->descricao ?? '') }}">
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="1" {{ (old('status', $avaliador->status ?? 1) == 1) ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ (old('status', $avaliador->status ?? 0) == 0) ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
