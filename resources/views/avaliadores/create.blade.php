@extends('adminlte::page')

@section('title', 'Adicionar Avaliador')

@section('content_header')
    <h1>Adicionar Avaliador</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('avaliadores.index') }}">Avaliadores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
        </ol>
    </nav>

    <form action="{{ route('avaliadores.store') }}" method="POST" autocomplete="off">
        @csrf

        @include('avaliadores.form_fields')

        <div class="d-flex justify-content-center">
            <a href="{{ route('avaliadores.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-primary btn-sm ml-5">Salvar</button>
        </div>
    </form>
@stop
