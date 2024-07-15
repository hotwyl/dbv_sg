@extends('adminlte::page')

@section('title', 'Adicionar Atividade')

@section('content_header')
    <h1>Adicionar Atividade</h1>
@stop

@section('content')
    <form action="{{ route('atividades.store') }}" method="POST">
        @csrf
        @include('atividades.form_fields')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
