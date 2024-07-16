@extends('adminlte::page')

@section('title', 'Editar Ranking')

@section('content_header')
    <h1>Editar Ranking</h1>
@stop

@section('content')
    <form action="{{ route('ranking.update', $atividade->id_atividade) }}" method="POST">
        @csrf
        @method('PUT')
        @include('ranking.form_fields')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop
