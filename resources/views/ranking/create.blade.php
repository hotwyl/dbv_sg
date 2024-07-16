@extends('adminlte::page')

@section('title', 'Adicionar Ranking')

@section('content_header')
    <h1>Adicionar Ranking</h1>
@stop

@section('content')
    <form action="{{ route('ranking.store') }}" method="POST">
        @csrf
        @include('ranking.form_fields')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
