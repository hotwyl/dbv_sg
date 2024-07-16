@extends('adminlte::page')

@section('title', 'ranking')

@section('content_header')
    <h1>Ranking</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ranking</li>
        </ol>
    </nav>

    <form action="{{ route('ranking.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('ranking.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Ranking</a>
            </div>
            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome do Item Ranking" value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                <a href="{{ route('ranking.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
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
        @forelse ($rankings as $ranking)
            <tr>
                <td>{{ $ranking->nome }}</td>
                <td>{{ $ranking->descricao }}</td>
                <td>{{ $ranking->valor }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('ranking.show', $ranking->id_ranking) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('ranking.edit', $ranking->id_ranking) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('ranking.destroy', $ranking->id_ranking) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir o intem Ranking {{$ranking->nome}} ?')">
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

    @if($rankings->total() > $rankings->perPage())
        <div class="mt-1 py-2">
            {{ $rankings->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
