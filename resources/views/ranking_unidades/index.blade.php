@extends('adminlte::page')

@section('title', 'Ranking Clubes')

@section('content_header')
    <h1>Ranking Clubes</h1>
@stop

@section('content')
    <a href="{{ route('ranking_clubes.create') }}" class="btn btn-primary mb-3">Adicionar Ranking Clube</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Atividade</th>
            <th>Avaliador</th>
            <th>Clube</th>
            <th>Pontuação</th>
            <th>Data/Hora</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rankingClubes as $rankingClube)
            <tr>
                <td>{{ $rankingClube->id_ranking_clube }}</td>
                <td>{{ $rankingClube->atividade->nome }}</td>
                <td>{{ $rankingClube->avaliador->nome }}</td>
                <td>{{ $rankingClube->clube->nome }}</td>
                <td>{{ $rankingClube->pontuacao }}</td>
                <td>{{ $rankingClube->data_hora }}</td>
                <td>
                    <a href="{{ route('ranking_clubes.show', $rankingClube->id_ranking_clube) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('ranking_clubes.edit', $rankingClube->id_ranking_clube) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ranking_clubes.destroy', $rankingClube->id_ranking_clube) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
