@extends('adminlte::page')

@section('title', 'Editar Ranking Clube')

@section('content_header')
    <h1>Editar Ranking Clube</h1>
@stop

@section('content')
    <form action="{{ route('ranking_clubes.update', $rankingClube->id_ranking_clube) }}" method="POST">
        @csrf
        @method('PUT')
        @include('ranking_clubes.form_fields')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop
