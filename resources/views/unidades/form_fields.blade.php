<x-mensagem />

<div class="input-group my-5">
    <div class="input-group-prepend">
        <span class="input-group-text">Clube:</span>
    </div>
    <select name="id_clube" class="form-control">
        @foreach(App\Models\Clube::all() as $clube)
            <option value="{{ $clube->id_clube }}" {{ (old('id_clube') ?? $unidade->id_clube ?? '') === $clube->id_clube ? 'selected' : '' }}>
                {{ $clube->nome }}
            </option>
        @endforeach
    </select>
    <a href="{{ route('clubes.create') }}" class="btn btn-secondary ml-3">Adicionar Clube</a>
</div>

<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Nome:</span>
    </div>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $unidade->nome ?? '') }}">
</div>

<div class="input-group my-5">
    <div class="input-group-prepend">
        <span class="input-group-text">Status:</span>
    </div>
    <select name="status" class="form-control">
        <option value="1" {{ old('status', $unidade->status ?? 1) === '1' ? 'selected' : '' }}>Ativo</option>
        <option value="0" {{ old('status', $unidade->status ?? 1) === '0' ? 'selected' : '' }}>Inativo</option>
    </select>
</div>
