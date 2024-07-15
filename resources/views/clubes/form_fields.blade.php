<div class="input-group mb-3">
    <span class="input-group-text">Divisão:</span>
    <input type="text" name="divisao" class="form-control" value="{{ old('divisao', $clube->divisao ?? '') }}" required>
</div>
<div class="input-group mb-3">
    <span class="input-group-text">União:</span>
    <input type="text" name="uniao" class="form-control" value="{{ old('uniao', $clube->uniao ?? '') }}" required>
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Associação:</span>
    <input type="text" name="associacao" class="form-control" value="{{ old('associacao', $clube->associacao ?? '') }}" required>
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Área:</span>
    <input type="number" name="area" class="form-control" value="{{ old('area', $clube->area ?? '') }}" required>
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Região:</span>
    <input type="number" name="regiao" class="form-control" value="{{ old('regiao', $clube->regiao ?? '') }}" required>
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Distrito:</span>
    <input type="text" name="distrito" class="form-control" value="{{ old('distrito', $clube->distrito ?? '') }}">
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Igreja:</span>
    <input type="text" name="igreja" class="form-control" value="{{ old('igreja', $clube->igreja ?? '') }}">
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Tipo:</span>
    <select name="tipo" class="form-control">
        <option value="1" {{ old('tipo', $clube->tipo ?? 1) === '1' ? 'selected' : '' }}>Clube de Desbravadores</option>
        <option value="2" {{ old('tipo', $clube->tipo ?? 1) === '2' ? 'selected' : '' }}>Clube de Aventureiros</option>
    </select>
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Nome:</span>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $clube->nome ?? '') }}" required>
</div>
<div class="input-group mb-3">
    <span class="input-group-text">Status:</span>
    <select name="status" class="form-control">
        <option value="1" {{ old('status', $clube->status ?? 1) === '1' ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ old('status', $clube->status ?? 1) === '0' ? 'selected' : '' }}>Inativo</option>
    </select>
</div>


