@extends('adminlte::page')

@section('title', 'Detalhes do Ranking Clube')

@section('content_header')
    <h1>Detalhes do Ranking Clube</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $rankingClube->nome }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $rankingClube->id_ranking_clube }}</p>
            <p><strong>Atividade:</strong> {{ $rankingClube->atividade->nome }}</p>
            <p><strong>Avaliador:</strong> {{ $rankingClube->avaliador->nome }}</p>
            <p><strong>Clube:</strong> {{ $rankingClube->clube->nome }}</p>
            <p><strong>Pontuação:</strong> {{ $rankingClube->pontuacao }}</p>
            <p><strong>Data/Hora:</strong> {{ $rankingClube->data_hora }}</p>
            <p><strong>Status:</strong> {{ $rankingClube->status ? 'Ativo' : 'Inativo' }}</p>
        </div>
    </div>
    <a href="{{ route('ranking_clubes.index') }}" class="btn btn-secondary">Voltar</a>
@stop
