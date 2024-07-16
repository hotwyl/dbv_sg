@extends('adminlte::page')

@section('title', 'Avaliadores')

@section('content_header')
    <h1>Avaliadores</h1>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Avaliadores</li>
        </ol>
    </nav>

    <form action="{{ route('avaliadores.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('avaliadores.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Avaliador(a)</a>
            </div>
            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome do Avaliador(a)" value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                <a href="{{ route('avaliadores.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
            </div>
        </div>
    </form>

    <x-mensagem />

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($avaliadores as $avaliador)
            <tr>
                <td>{{ $avaliador->nome }}</td>
                <td>{{ $avaliador->descricao }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('avaliadores.show', $avaliador->id_avaliador) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('avaliadores.edit', $avaliador->id_avaliador) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('avaliadores.destroy', $avaliador->id_avaliador) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir a avaliador(a) {{$avaliador->nome}} ?')">
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

    @if($avaliadores->total() > $avaliadores->perPage())
        <div class="mt-1 py-2">
            {{ $avaliadores->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
