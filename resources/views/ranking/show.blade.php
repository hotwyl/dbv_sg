@extends('adminlte::page')

@section('title', 'Detalhes da Ranking')

@section('content_header')
    <h1>Detalhes da Ranking</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ranking_clubes.index') }}">Ranking Clube</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $ranking->avaliacao->nome }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Informações do Item do Ranking</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $ranking->avaliacao->nome }}</p>
                    <p><strong>Descrição:</strong> {{ $ranking->avaliacao->descricao }}</p>
                    <p><strong>Avaliador:</strong> {{ $ranking->avaliador->nome }}</p>
                    <p><strong>Clube:</strong> {{ $ranking->clube->nome }}</p>
                    <p><strong>Pontuação:</strong> {{ $ranking->pontuacao ? 'Ativo' : 'Inativo' }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('ranking.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                        <a href="{{ route('ranking.edit', $ranking->avaliacao->id_avaliacao) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('ranking.destroy', $ranking->avaliacao->id_avaliacao) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir o item Ranking {{$ranking->avaliacao->nome}} ?')">
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
