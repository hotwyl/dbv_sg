@extends('adminlte::page')

@section('title', 'Adicionar Evento')

@section('content_header')
    <h1>Adicionar Evento</h1>
@stop

@section('content')
    <form action="{{ route('eventos.store') }}" method="POST">
        @csrf
        @include('eventos.form_fields')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
