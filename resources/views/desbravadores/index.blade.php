@extends('adminlte::page')

@section('title', 'Desbravadores')

@section('content_header')
    <h1>Desbravadores</h1>
    <a href="{{ route('desbravadores.create') }}" class="btn btn-primary">Adicionar Desbravador</a>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Unidade</th>
            <th>Cargo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($desbravadores as $desbravador)
            <tr>
                <td>{{ $desbravador->id_desbravador }}</td>
                <td>{{ $desbravador->nome }}</td>
                <td>{{ $desbravador->unidade->nome }}</td>
                <td>{{ $desbravador->cargo->nome }}</td>
                <td>{{ $desbravador->status ? 'Ativo' : 'Inativo' }}</td>
                <td>
                    <a href="{{ route('desbravadores.show', $desbravador->id_desbravador) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('desbravadores.edit', $desbravador->id_desbravador) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('desbravadores.destroy', $desbravador->id_desbravador) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
