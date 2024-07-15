@extends('adminlte::page')

@section('title', 'Avaliadores')

@section('content_header')
    <h1>Avaliadores</h1>
@stop

@section('content')
    <a href="{{ route('avaliadores.create') }}" class="btn btn-primary mb-3">Adicionar Avaliador</a>
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
            <th>Status</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($avaliadores as $avaliador)
            <tr>
                <td>{{ $avaliador->id_avaliador }}</td>
                <td>{{ $avaliador->nome }}</td>
                <td>{{ $avaliador->descricao }}</td>
                <td>{{ $avaliador->status ? 'Ativo' : 'Inativo' }}</td>
                <td>
                    <a href="{{ route('avaliadores.show', $avaliador->id_avaliador) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('avaliadores.edit', $avaliador->id_avaliador) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('avaliadores.destroy', $avaliador->id_avaliador) }}" method="POST" style="display:inline;">
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
