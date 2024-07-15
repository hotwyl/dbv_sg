@extends('adminlte::page')

@section('title', 'Detalhes do Avaliador')

@section('content_header')
    <h1>Detalhes do Avaliador</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $avaliador->nome }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $avaliador->id_avaliador }}</p>
            <p><strong>Nome:</strong> {{ $avaliador->nome }}</p>
            <p><strong>Descrição:</strong> {{ $avaliador->descricao }}</p>
            <p><strong>Status:</strong> {{ $avaliador->status ? 'Ativo' : 'Inativo' }}</p>
        </div>
    </div>
    <a href="{{ route('avaliadores.index') }}" class="btn btn-secondary">Voltar</a>
@stop
