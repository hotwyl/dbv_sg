@extends('adminlte::page')

@section('title', 'Detalhes da Atividade')

@section('content_header')
    <h1>Detalhes da Atividade</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $atividade->nome }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $atividade->id_atividade }}</p>
            <p><strong>Nome:</strong> {{ $atividade->nome }}</p>
            <p><strong>Descrição:</strong> {{ $atividade->descricao }}</p>
            <p><strong>Valor:</strong> {{ $atividade->valor }}</p>
            <p><strong>Status:</strong> {{ $atividade->status ? 'Ativo' : 'Inativo' }}</p>
        </div>
    </div>
    <a href="{{ route('atividades.index') }}" class="btn btn-secondary">Voltar</a>
@stop
