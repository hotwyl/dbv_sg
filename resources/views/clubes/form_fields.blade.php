<x-mensagem />

<div class="row">

    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text">Área:</span>
            <input type="number" name="area" class="form-control" value="{{ old('area', $clube->area ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text">Região:</span>
            <input type="number" name="regiao" class="form-control" value="{{ old('regiao', $clube->regiao ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text">Distrito:</span>
            <input type="text" name="distrito" class="form-control" value="{{ old('distrito', $clube->distrito ?? '') }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text">Igreja:</span>
            <input type="text" name="igreja" class="form-control" value="{{ old('igreja', $clube->igreja ?? '') }}">
        </div>
    </div>

    <div class="col-md-12">
        <div class="input-group mb-3">
            <span class="input-group-text">Nome:</span>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $clube->nome ?? '') }}" required>
        </div>
    </div>
</div>
