@extends('adminlte::page')

@section('title', 'Detalhes do Avaliacao')

@section('content_header')
    <h1>Detalhes do Evento</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('eventos.index') }}">Ranking</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $evento->nome }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Informações do Evento</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Nome:</strong> {{ $evento->nome }}</p>
                        <p><strong>Descrição:</strong> {{ $evento->descricao }}</p>
                        <p><strong>Categoria:</strong> {{ $evento->tipo_item }}</p>
                        <p><strong>Valor:</strong> {{ $evento->valor }}</p>
                        <p><strong>Status:</strong> {{ $evento->status ? 'Ativo' : 'Inativo' }}</p>
                    </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('eventos.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                        <a href="{{ route('eventos.edit', $evento->id_evento) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('eventos.destroy', $evento->id_evento) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir o Avaliacao {{$evento->nome}} ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
