@extends('adminlte::page')

@section('title', 'Detalhes do Avaliador')

@section('content_header')
    <h1>Detalhes do Avaliador</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('avaliadores.index') }}">Avaliadores</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $avaliador->nome }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Informações do Avaliador</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $avaliador->nome }}</p>
                    <p><strong>Descrição:</strong> {{ $avaliador->descricao }}</p>
                    <p><strong>Status:</strong> {{ $avaliador->status ? 'Ativo' : 'Inativo' }}</p>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-around">
                    <a href="{{ route('avaliadores.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                    <a href="{{ route('avaliadores.edit', $avaliador->id_avaliador) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('avaliadores.destroy', $avaliador->id_avaliador) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir a unidade {{$avaliador->nome}} ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
