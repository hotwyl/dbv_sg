@extends('adminlte::page')

@section('title', 'Detalhes do Desbravador')

@section('content_header')
    <h1>Detalhes do Desbravador</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $desbravador->nome }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $desbravador->id_desbravador }}</p>
            <p><strong>Nome:</strong> {{ $desbravador->nome }}</p>
            <p><strong>Unidade:</strong> {{ $desbravador->unidade->nome }}</p>
            <p><strong>Cargo:</strong> {{ $desbravador->cargo->nome }}</p>
            <p><strong>Status:</strong> {{ $desbravador->status ? 'Ativo' : 'Inativo' }}</p>
        </div>
    </div>
@stop
