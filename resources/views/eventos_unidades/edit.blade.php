@extends('adminlte::page')

@section('title', 'Editar Ranking Unidade')

@section('content_header')
    <h1>Editar Avaliação Evento Unidade</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('eventos_unidades.index') }}">Eventos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $evento->id_evento_unidade }} - Editar</li>
        </ol>
    </nav>

    <form action="{{ route('eventos_unidades.update', $evento->id_evento_unidade) }}" method="POST">
        @csrf
        @method('PUT')
        @include('eventos_unidades.form_fields')

        <div class="d-flex justify-content-center pt-3 pb-5">
            <a href="{{ route('eventos_unidades.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-primary btn-sm ml-5">Atualizar</button>
        </div>
    </form>
@stop
