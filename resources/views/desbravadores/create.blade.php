@extends('adminlte::page')

@section('title', 'Adicionar Desbravador')

@section('content_header')
    <h1>Adicionar Desbravador</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('desbravadores.index') }}">Desbravadores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
        </ol>
    </nav>

    <form action="{{ route('desbravadores.store') }}" method="POST" autocomplete="off">
        @csrf

        @include('desbravadores.form_fields')

        <div class="d-flex justify-content-center">
            <a href="{{ route('desbravadores.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-success btn-sm ml-5">Adicionar</button>
        </div>

    </form>
@stop
