@extends('adminlte::page')

@section('title', 'Editar Cargo/Funcao')

@section('content_header')
    <h1>Editar Cargo/Funcao</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cargos.index') }}">Cargos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>

    <form action="{{ route('cargos.update', $cargo->id_cargo) }}" method="POST">
        @csrf
        @method('PUT')
        @include('cargos.form_fields')

        <div class="d-flex justify-content-center pt-3 pb-5">
            <a href="{{ route('cargos.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-success btn-sm ml-5">Atualizar</button>
        </div>
    </form>
@endsection
