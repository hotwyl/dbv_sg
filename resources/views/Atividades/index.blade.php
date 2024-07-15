@extends('adminlte::page')

@section('title', 'Atividades')

@section('content_header')
    <h1>Atividades</h1>
@stop

@section('content')
    <a href="{{ route('atividades.create') }}" class="btn btn-primary mb-3">Adicionar Atividade</a>
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
        @foreach ($atividades as $atividade)
            <tr>
                <td>{{ $atividade->id_atividade }}</td>
                <td>{{ $atividade->nome }}</td>
                <td>{{ $atividade->descricao }}</td>
                <td>{{ $atividade->valor }}</td>
                <td>{{ $atividade->status ? 'Ativo' : 'Inativo' }}</td>
                <td>
                    <a href="{{ route('atividades.show', $atividade->id_atividade) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('atividades.edit', $atividade->id_atividade) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('atividades.destroy', $atividade->id_atividade) }}" method="POST" style="display:inline;">
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
