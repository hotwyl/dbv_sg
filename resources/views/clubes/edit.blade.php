@extends('adminlte::page')

@section('title', 'Editar Clube')

@section('content_header')
    <h1>Editar Clube</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clubes.index') }}">Clubes</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $clube->nome }} - Editar</li>
        </ol>
    </nav>

    <form action="{{ route('clubes.update', $clube->id_clube) }}" method="POST">
        @csrf
        @method('PUT')

        @include('clubes.form_fields')

        <div class="d-flex justify-content-center pt-3 pb-5">
            <a href="{{ route('clubes.index') }}" class="btn btn-danger btn-sm mr-5">Cancelar</a>
            <button type="submit" class="btn btn-success btn-sm ml-5">Atualizar</button>
        </div>
    </form>
@endsection
