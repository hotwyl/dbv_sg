@extends('adminlte::page')

@section('title', 'Detalhes da Ranking')

@section('content_header')
    <h1>Detalhes do Evento</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('eventos_clubes.index') }}">Evento Clube</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $evento->avaliacao->nome }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Informações do Item do Ranking</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $evento->avaliacao->nome }}</p>
                    <p><strong>Descrição:</strong> {{ $evento->avaliacao->descricao }}</p>
                    <p><strong>Avaliador:</strong> <a href="{{ route('avaliadores.show', $evento->avaliador->id_avaliador) }}">{{ $evento->avaliador->nome }}</a></p>
                    <p><strong>Clube:</strong> <a href="{{ route('clubes.show', $evento->clube->id_clube) }}">{{ $evento->clube->nome }}</a></p>
                    <p><strong>Acertos:</strong> {{ $evento->acertos }}</p>
                    <p><strong>Erros:</strong> {{ $evento->erros }}</p>
                    <p><strong>Duração:</strong> {{ $evento->duracao }}</p>
                    <p><strong>Pontuação:</strong> {{ $evento->pontuacao }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('eventos_clubes.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                        <a href="{{ route('eventos_clubes.edit', $evento->id_evento_clube) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('eventos_clubes.destroy', $evento->id_evento_clube) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir o item Evento {{$evento->avaliacao->nome}} ?')">
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
