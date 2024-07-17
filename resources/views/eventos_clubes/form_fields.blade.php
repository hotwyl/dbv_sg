<x-mensagem />

<div class="form-group">
    <label for="id_avaliacao">Avaliações</label>
    <select class="form-control" id="id_avaliacao" name="id_avaliacao" required>
        <option value="">Selecione uma Avaliação</option>
        @foreach($avaliacoes as $avaliacao)
            <option value="{{ $avaliacao->id_avaliacao }}" {{ (old('id_avaliacao', $evento->id_avaliacao ?? '') === $avaliacao->id_avaliacao) ? 'selected' : '' }}>
                {{ $avaliacao->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_avaliador">Avaliador</label>
    <select class="form-control" id="id_avaliador" name="id_avaliador" required>
        <option value="">Selecione um avaliador</option>
        @foreach($avaliadores as $avaliador)
            <option value="{{ $avaliador->id_avaliador }}" {{ (old('id_avaliador', $evento->id_avaliador ?? '') === $avaliador->id_avaliador) ? 'selected' : '' }}>
                {{ $avaliador->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_clube">Clube</label>
    <select class="form-control" id="id_clube" name="id_clube" required>
        <option value="">Selecione um clube</option>
        @foreach($clubes as $clube)
            <option value="{{ $clube->id_clube }}" {{ (old('id_clube', $evento->id_clube ?? '') === $clube->id_clube) ? 'selected' : '' }}>
                {{ $clube->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="acertos">Acertor</label>
    <input type="number" class="form-control" id="acertos" name="acertos" value="{{ old('acertos', $evento->acertos ?? '') }}" required>
</div>

<div class="form-group">
    <label for="erros">Erros</label>
    <input type="number" class="form-control" id="erros" name="erros" value="{{ old('erros', $evento->erros ?? '') }}" required>
</div>

<div class="form-group">
    <label for="duracao">Duração</label>
    <input type="time" class="form-control" id="duracao" name="duracao" value="{{ old('duracao', $evento->duracao ?? '') }}" required>
</div>

<div class="form-group">
    <label for="pontuacao">Pontuação</label>
    <input type="number" class="form-control" id="pontuacao" name="pontuacao" value="{{ old('pontuacao', $evento->pontuacao ?? '') }}" required>
</div>


<div class="form-group">
    <label for="data_hora">Data/Hora</label>
    <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" value="{{ old('data_hora', $evento->data_hora ?? '') }}">
</div>
