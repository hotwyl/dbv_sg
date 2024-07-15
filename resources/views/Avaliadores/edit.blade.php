@extends('adminlte::page')

@section('title', 'Editar Avaliador')

@section('content_header')
    <h1>Editar Avaliador</h1>
@stop

@section('content')
    <form action="{{ route('avaliadores.update', $avaliador->id_avaliador) }}" method="POST">
        @csrf
        @method('PUT')
        @include('avaliadores.form_fields')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop
