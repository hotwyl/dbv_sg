@extends('adminlte::page')

@section('title', 'Adicionar Ranking')

@section('content_header')
    <h1>Adicionar Ranking</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ranking.index') }}">Avaliadores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
        </ol>
    </nav>

    <form action="{{ route('ranking.store') }}" method="POST" autocomplete="off">
        @csrf

        @include('ranking.form_fields')

        <div class="d-flex justify-content-center">
            <a href="{{ route('ranking.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-primary btn-sm ml-5">Salvar</button>
        </div>
    </form>
@stop
