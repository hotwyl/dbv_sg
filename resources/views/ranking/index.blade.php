@extends('adminlte::page')

@section('title', 'ranking')

@section('content_header')
    <h1>Ranking</h1>
@stop

@section('content')
    <a href="{{ route('ranking.create') }}" class="btn btn-primary mb-3">Adicionar Ranking</a>
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
            <th>Descrição</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rankings as $ranking)
            <tr>
                <td>{{ $ranking->id_ranking }}</td>
                <td>{{ $ranking->nome }}</td>
                <td>{{ $ranking->descricao }}</td>
                <td>{{ $ranking->valor }}</td>
                <td>{{ $ranking->status ? 'Ativo' : 'Inativo' }}</td>
                <td>
                    <a href="{{ route('ranking.show', $ranking->id_ranking) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('ranking.edit', $ranking->id_ranking) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ranking.destroy', $ranking->id_ranking) }}" method="POST" style="display:inline;">
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
