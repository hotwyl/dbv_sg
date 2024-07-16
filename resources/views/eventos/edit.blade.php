@extends('adminlte::page')

@section('title', 'Editar Evento')

@section('content_header')
    <h1>Editar Evento</h1>
@stop

@section('content')
    <form action="{{ route('eventos.update', $evento->id_evento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('eventos.form_fields')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop
