<x-mensagem />

<div class="form-group">
    <label for="id_avaliacao">Atividade</label>
    <select class="form-control" id="id_avaliacao" name="id_avaliacao" required>
        @foreach($avaliacoes as $avaliacao)
            <option value="{{ $avaliacao->id_avaliacao }}" {{ (old('id_avaliacao', $ranking->id_avaliacao ?? '') === $avaliacao->id_avaliacao) ? 'selected' : '' }}>
                {{ $avaliacao->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_avaliador">Avaliador</label>
    <select class="form-control" id="id_avaliador" name="id_avaliador" required>
        @foreach($avaliadores as $avaliador)
            <option value="{{ $avaliador->id_avaliador }}" {{ (old('id_avaliador', $ranking->id_avaliador ?? '') === $avaliador->id_avaliador) ? 'selected' : '' }}>
                {{ $avaliador->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_clube">Unidade</label>
    <select class="form-control" id="id_clube" name="id_clube" required>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id_clube }}" {{ (old('id_clube', $ranking->id_clube ?? '') === $unidade->id_clube) ? 'selected' : '' }}>
                {{ $unidade->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="pontuacao">Pontuação</label>
    <input type="number" class="form-control" id="pontuacao" name="pontuacao" value="{{ old('pontuacao', $ranking->pontuacao ?? '') }}" required>
</div>

<div class="form-group">
    <label for="data_hora">Data/Hora</label>
    <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" value="{{ old('data_hora', $ranking->data_hora ?? '') }}">
</div>
