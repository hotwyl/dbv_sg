@extends('adminlte::page')

@section('title', 'Editar Unidade')

@section('content_header')
    <h1>Editar Unidade</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('unidades.index') }}">Unidades</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $unidade->nome }} - Editar</li>
        </ol>
    </nav>

    <form action="{{ route('unidades.update', $unidade->id_unidade) }}" method="POST">
        @csrf
        @method('PUT')

        @include('unidades.form_fields')

        <div class="d-flex justify-content-center pt-3 pb-5">
            <a href="{{ route('unidades.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        </div>
    </form>
@endsection
