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
    <label for="id_clube">Clube:</label>
    <select name="id_clube" class="form-control form-control-sm">
        @foreach(App\Models\Clube::all() as $clube)
            <option value="{{ $clube->id_clube }}" {{ (old('id_clube') ?? $unidade->id_clube ?? '') == $clube->id_clube ? 'selected' : '' }}>
                {{ $clube->nome }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control form-control-sm" value="{{ old('nome', $unidade->nome ?? '') }}">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select name="status" class="form-control form-control-sm">
        <option value="1" {{ old('status', $unidade->status ?? 1) == '1' ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ old('status', $unidade->status ?? 1) == '0' ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
