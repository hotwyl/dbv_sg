@extends('adminlte::page')

@section('title', 'Detalhes do Desbravador')

@section('content_header')
    <h1>Detalhes do Desbravador</h1>
@stop

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('desbravadores.index') }}">Desbravadores</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $desbravador->nome }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informações do Desbravador</h3>
                </div>
                <div class="card-body">
                    <p><strong>Nome do Clube:</strong> <a href="{{ route('clubes.show', $desbravador->unidade->clube->id_clube) }}">{{ $desbravador->unidade->clube->nome }}</a></p>
                    <p><strong>Nome da Unidade:</strong> <a href="{{ route('unidades.show', $desbravador->unidade->id_unidade) }}"> {{ $desbravador->unidade->nome }}</a></p>
                    <p><strong>Nome do Desbravador:</strong> {{ $desbravador->nome }}</p>
                    <p><strong>Cargo do Desbravador:</strong> {{ $desbravador->cargo->nome }}</p>
                    <p><strong>Status:</strong> {{ $desbravador->status ? 'Ativo' : 'Inativo' }}</p>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('desbravadores.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                        <a href="{{ route('desbravadores.edit', $desbravador->id_desbravador) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('desbravadores.destroy', $desbravador->id_desbravador) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir a unidade {{ $desbravador->nome }} ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informações Adicionais</h3>
                </div>
                <div class="card-body">
                    <p><strong>União:</strong> {{ $desbravador->unidade->clube->uniao }}</p>
                    <p><strong>Associação:</strong> {{ $desbravador->unidade->clube->associacao }}</p>
                    <p><strong>Área:</strong> {{ $desbravador->unidade->clube->area }}</p>
                    <p><strong>Região:</strong> {{ $desbravador->unidade->clube->regiao }}</p>
                    <p><strong>Distrito:</strong> {{ $desbravador->unidade->clube->distrito }}</p>
                    <p><strong>Igreja:</strong> {{ $desbravador->unidade->clube->igreja }}</p>
                </div>

                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@stop
