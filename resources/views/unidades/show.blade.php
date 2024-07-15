@extends('adminlte::page')

@section('title', 'Detalhes da Unidade')

@section('content_header')
    <h1>Detalhes da Unidade</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('unidades.index') }}">Clubes</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $unidade->nome }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Informações da Unidade</h5>
                </div>
                <div class="card-body">
                    <p><strong>Clube:</strong> <a href="{{ route('unidades.show', $unidade->clube->id_clube) }}">{{ $unidade->clube->nome }}</a></p>
                    <p><strong>Unidade:</strong> {{ $unidade->nome }}</p>
                    <p><strong>Status:</strong> {{ $unidade->status ? 'Ativo' : 'Inativo' }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-around">
                        <a href="{{ route('unidades.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                        <a href="{{ route('unidades.edit', $unidade->id_unidade) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('unidades.destroy', $unidade->id_unidade) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir a unidade {{$unidade->nome}} ?')">
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
                <div class="card-header text-center">
                    <h5>Membros da Unidade</h5>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($unidade->desbravadores as $membro)
                            <li><a href="{{ route('desbravadores.show', $membro->id_desbravador) }}">{{ $membro->nome }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <p><strong>Total:</strong> {{ $unidade->desbravadores->count() }}</p>
                </div>
            </div>

        </div>
    </div>

@endsection
