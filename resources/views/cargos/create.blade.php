@extends('adminlte::page')

@section('title', 'Adicionar Cargo/Funcao')

@section('content_header')
    <h1>Adicionar Cargo/Funcao</h1>
@stop

@section('content')
    <form action="{{ route('cargos.store') }}" method="POST">
        @csrf
        @include('cargos.form_fields')
        <button type="submit" class="btn btn-success">Adicionar</button>
    </form>
@endsection
