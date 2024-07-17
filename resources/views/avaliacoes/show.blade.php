@extends('adminlte::page')

@section('title', 'Detalhes do Avaliacao')

@section('content_header')
    <h1>Detalhes do Avaliação</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('avaliacoes.index') }}">Avaliações</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $avaliacao->nome }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Informações do Item de Avaliação</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Nome:</strong> {{ $avaliacao->nome }}</p>
                        <p><strong>Descrição:</strong> {{ $avaliacao->descricao }}</p>
                        <p><strong>Tipo:</strong> {{ $avaliacao->tipo }}</p>
                        <p><strong>Categoria:</strong> {{ $avaliacao->categoria }}</p>
                        <p><strong>Status:</strong> {{ $avaliacao->status ? 'Ativo' : 'Inativo' }}</p>
                    </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                        <a href="{{ route('avaliacoes.edit', $avaliacao->id_avaliacao) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('avaliacoes.destroy', $avaliacao->id_avaliacao) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir o Avaliacao {{$avaliacao->nome}} ?')">
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
