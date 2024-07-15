@extends('adminlte::page')

@section('title', 'Editar Atividade')

@section('content_header')
    <h1>Editar Atividade</h1>
@stop

@section('content')
    <form action="{{ route('atividades.update', $atividade->id_atividade) }}" method="POST">
        @csrf
        @method('PUT')
        @include('atividades.form_fields')
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop
