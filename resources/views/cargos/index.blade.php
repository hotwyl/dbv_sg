@extends('adminlte::page')

@section('title', 'Cargos/Funções')

@section('content_header')
    <h1>Cargos</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cargos</li>
        </ol>
    </nav>

    <form action="{{ route('cargos.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('cargos.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Cargo</a>
            </div>
            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome do Cargo" value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                    <a href="{{ route('cargos.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
                </div>
            </div>
        </div>
    </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cargos as $cargo)
            <tr>
                <td>{{ $cargo->nome }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('cargos.show', $cargo->id_cargo) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('cargos.edit', $cargo->id_cargo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cargos.destroy', $cargo->id_cargo) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar este Cargo/Funcao?')">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
