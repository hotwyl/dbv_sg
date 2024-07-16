@extends('adminlte::page')

@section('title', 'Detalhes da Ranking')

@section('content_header')
    <h1>Detalhes da Ranking</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $ranking->nome }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $ranking->id_atividade }}</p>
            <p><strong>Nome:</strong> {{ $ranking->nome }}</p>
            <p><strong>Descrição:</strong> {{ $ranking->descricao }}</p>
            <p><strong>Valor:</strong> {{ $ranking->valor }}</p>
            <p><strong>Status:</strong> {{ $ranking->status ? 'Ativo' : 'Inativo' }}</p>
        </div>
    </div>
    <a href="{{ route('ranking.index') }}" class="btn btn-secondary">Voltar</a>
@stop
