@extends('adminlte::page')

@section('title', 'Adicionar Ranking Clube')

@section('content_header')
    <h1>Adicionar Ranking Clube</h1>
@stop

@section('content')
    <form action="{{ route('ranking_clubes.store') }}" method="POST">
        @csrf
        @include('ranking_clubes.form_fields')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
