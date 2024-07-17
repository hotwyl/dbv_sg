@extends('adminlte::page')

@section('title', 'Editar Ranking Clube')

@section('content_header')
    <h1>Editar Avaliação Evento Clube</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('eventos_clubes.index') }}">Eventos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $evento->id_evento_clube }} - Editar</li>
        </ol>
    </nav>

    <form action="{{ route('eventos_clubes.update', $evento->id_evento_clube) }}" method="POST">
        @csrf
        @method('PUT')
        @include('eventos_clubes.form_fields')

        <div class="d-flex justify-content-center pt-3 pb-5">
            <a href="{{ route('eventos_clubes.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-primary btn-sm ml-5">Atualizar</button>
        </div>
    </form>
@stop
