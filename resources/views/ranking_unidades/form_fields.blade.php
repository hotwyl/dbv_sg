<div class="form-group">
    <label for="id_atividade">Atividade</label>
    <select class="form-control" id="id_atividade" name="id_atividade" required>
        @foreach($atividades as $atividade)
            <option value="{{ $atividade->id_atividade }}" {{ (old('id_atividade', $rankingClube->id_atividade ?? '') == $atividade->id_atividade) ? 'selected' : '' }}>
                {{ $atividade->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_avaliador">Avaliador</label>
    <select class="form-control" id="id_avaliador" name="id_avaliador" required>
        @foreach($avaliadores as $avaliador)
            <option value="{{ $avaliador->id_avaliador }}" {{ (old('id_avaliador', $rankingClube->id_avaliador ?? '') == $avaliador->id_avaliador) ? 'selected' : '' }}>
                {{ $avaliador->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_clube">Clube</label>
    <select class="form-control" id="id_clube" name="id_clube" required>
        @foreach($clubes as $clube)
            <option value="{{ $clube->id_clube }}" {{ (old('id_clube', $rankingClube->id_clube ?? '') == $clube->id_clube) ? 'selected' : '' }}>
                {{ $clube->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="pontuacao">Pontuação</label>
    <input type="number" class="form-control" id="pontuacao" name="pontuacao" value="{{ old('pontuacao', $rankingClube->pontuacao ?? '') }}" required>
</div>

<div class="form-group">
    <label for="data_hora">Data/Hora</label>
    <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" value="{{ old('data_hora', $rankingClube->data_hora ?? '') }}">
</div>
