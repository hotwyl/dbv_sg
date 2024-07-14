@extends('adminlte::page')

@section('title', 'Detalhes do Cargo/Funcao')

@section('content_header')
    <h1>Detalhes do Cargo/Funcao</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cargos.index') }}">Cargos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $cargo->nome }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Detalhes do Cargo/Funcao</h3>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $cargo->nome }}</p>
                    <p><strong>Status:</strong> {{ $cargo->status ? 'Ativo' : 'Inativo' }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('cargos.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                        <a href="{{ route('cargos.edit', $cargo->id_cargo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cargos.destroy', $cargo->id_cargo) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este Cargo/Funcao?')">Deletar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
