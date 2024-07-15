@extends('adminlte::page')

@section('title', 'Adicionar Avaliador')

@section('content_header')
    <h1>Adicionar Avaliador</h1>
@stop

@section('content')
    <form action="{{ route('avaliadores.store') }}" method="POST">
        @csrf
        @include('avaliadores.form_fields')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
