<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $ranking->nome ?? '') }}" required>
</div>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $ranking->descricao ?? '') }}">
</div>

<div class="form-group">
    <label for="tipo_item">Categoria</label>
    <select class="form-control" id="tipo_item" name="tipo_item" required>
        <option value="clube" {{ (old('tipo_item', $ranking->tipo_item ?? "clube") === "clube") ? 'selected' : '' }}>Clube</option>
        <option value="unidade" {{ (old('tipo_item', $ranking->tipo_item ?? "unidade") === "unidade") ? 'selected' : '' }}>Unidade</option>
        <option value="individual" {{ (old('tipo_item', $ranking->tipo_item ?? "individual") === "individual") ? 'selected' : '' }}>Individual</option>
    </select>
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" class="form-control" id="valor" name="valor" value="{{ old('valor', $ranking->valor ?? '') }}" required>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="1" {{ (old('status', $ranking->status ?? 1) === 1) ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ (old('status', $ranking->status ?? 0) === 0) ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
