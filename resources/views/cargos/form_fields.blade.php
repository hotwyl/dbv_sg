@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control form-control-sm" id="nome" name="nome" value="{{ old('nome', $cargo->nome ?? '') }}" required>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control form-control-sm" id="status" name="status" required>
        <option value="1" {{ (old('status', $cargo->status ?? 1) == 1) ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ (old('status', $cargo->status ?? 0) == 0) ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
