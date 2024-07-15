@extends('adminlte::page')

@section('title', 'Editar Desbravador')

@section('content_header')
    <h1>Editar Desbravador</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('desbravadores.index') }}">Desbravadores</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $desbravador->nome }} - Editar</li>
        </ol>
    </nav>

    <form action="{{ route('desbravadores.update', $desbravador->id_desbravador) }}" method="POST">
        @csrf
        @method('PUT')

        @include('desbravadores.form_fields')

        <div class="d-flex justify-content-center pt-3 pb-5">
            <a href="{{ route('desbravadores.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-success btn-sm ml-5">Atualizar</button>
        </div>
    </form>
@stop
