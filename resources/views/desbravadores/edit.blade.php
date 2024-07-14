@extends('adminlte::page')

@section('title', 'Editar Desbravador')

@section('content_header')
    <h1>Editar Desbravador</h1>
@stop

@section('content')
    <form action="{{ route('desbravadores.update', $desbravador->id_desbravador) }}" method="POST">
        @csrf
        @method('PUT')
        @include('desbravadores.form_fields')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop
