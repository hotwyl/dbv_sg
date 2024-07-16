@extends('adminlte::page')

@section('title', 'Detalhes do Evento')

@section('content_header')
    <h1>Detalhes do Evento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $evento->nome }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $evento->id_evento }}</p>
            <p><strong>Nome:</strong> {{ $evento->nome }}</p>
            <p><strong>Descrição:</strong> {{ $evento->descricao }}</p>
            <p><strong>Valor:</strong> {{ $evento->valor }}</p>
            <p><strong>Status:</strong> {{ $evento->status ? 'Ativo' : 'Inativo' }}</p>
        </div>
    </div>
    <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Voltar</a>
@stop
