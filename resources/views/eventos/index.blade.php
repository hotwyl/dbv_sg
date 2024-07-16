@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Evento</li>
        </ol>
    </nav>

    <form action="{{ route('eventos.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('eventos.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Eevento</a>
            </div>
            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome do Evento" value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                <a href="{{ route('eventos.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
            </div>
        </div>
    </form>

    <x-mensagem />

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($eventos as $evento)
            <tr>
                <td>{{ $evento->nome }}</td>
                <td>{{ $evento->descricao }}</td>
                <td>{{ $evento->valor }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('eventos.show', $evento->id_evento) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('eventos.edit', $evento->id_evento) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('eventos.destroy', $evento->id_evento) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir o Evento {{$evento->nome}} ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @if($eventos->total() > $eventos->perPage())
        <div class="mt-1 py-2">
            {{ $eventos->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
