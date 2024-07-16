@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
    <a href="{{ route('eventos.create') }}" class="btn btn-primary mb-3">Adicionar Evento</a>
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
        @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->id_evento }}</td>
                <td>{{ $evento->nome }}</td>
                <td>{{ $evento->descricao }}</td>
                <td>{{ $evento->valor }}</td>
                <td>{{ $evento->status ? 'Ativo' : 'Inativo' }}</td>
                <td>
                    <a href="{{ route('eventos.show', $evento->id_evento) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('eventos.edit', $evento->id_evento) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('eventos.destroy', $evento->id_evento) }}" method="POST" style="display:inline;">
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
