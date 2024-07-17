<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $avaliacao->nome ?? '') }}" required>
</div>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $avaliacao->descricao ?? '') }}">
</div>

<div class="form-group">
    <label for="tipo">Tipo</label>
    <select class="form-control" id="tipo" name="tipo" required>
        <option value="ranking" {{ (old('tipo', $avaliacao->tipo ?? "ranking") === "ranking") ? 'selected' : '' }}>Ranking</option>
        <option value="evento" {{ (old('tipo', $avaliacao->tipo ?? "evento") === "evento") ? 'selected' : '' }}>Evento</option>
        <option value="desafio" {{ (old('tipo', $avaliacao->tipo ?? "desafio") === "desafio") ? 'selected' : '' }}>Desafio</option>
    </select>
</div>

<div class="form-group">
    <label for="categoria">Categoria</label>
    <select class="form-control" id="categoria" name="categoria" required>
        <option value="clube" {{ (old('categoria', $avaliacao->categoria ?? 'clube') === 'clube') ? 'selected' : '' }}>Clube</option>
        <option value="unidade" {{ (old('categoria', $avaliacao->categoria ?? 'unidade') === 'unidade') ? 'selected' : '' }}>Unidade</option>
        <option value="individual" {{ (old('categoria', $avaliacao->categoria ?? 'individual') === 'individual') ? 'selected' : '' }}>Individual</option>
    </select>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status" required>
        <option value="1" {{ (old('status', $avaliacao->status ?? 1) === 1) ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ (old('status', $avaliacao->status ?? 0) === 0) ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
