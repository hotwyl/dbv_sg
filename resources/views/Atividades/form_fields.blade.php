<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $atividade->nome ?? '') }}" required>
</div>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $atividade->descricao ?? '') }}">
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" class="form-control" id="valor" name="valor" value="{{ old('valor', $atividade->valor ?? '') }}" required>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="1" {{ (old('status', $atividade->status ?? 1) == 1) ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ (old('status', $atividade->status ?? 0) == 0) ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
