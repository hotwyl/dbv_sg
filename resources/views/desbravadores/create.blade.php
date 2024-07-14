@extends('adminlte::page')

@section('title', 'Adicionar Desbravador')

@section('content_header')
    <h1>Adicionar Desbravador</h1>
@stop

@section('content')
    <form action="{{ route('desbravadores.store') }}" method="POST">
        @csrf
        @include('desbravadores.form_fields')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@stop
