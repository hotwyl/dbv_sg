@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Avaliações</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Avaliações</li>
        </ol>
    </nav>

    <form action="{{ route('avaliacoes.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('avaliacoes.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Avaliação</a>
            </div>

            <div class="col-md-2">
                <select name="tipo" class="form-control form-control-sm">
                    <option value="">Selecione o Tipo</option>
                    <option value="ranking" {{ request()->get('tipo') === "ranking" ? 'selected' : '' }}>Ranking</option>
                    <option value="evento" {{ request()->get('tipo') === "evento" ? 'selected' : '' }}>Evento</option>
                    <option value="desafio" {{ request()->get('tipo') === "desafio" ? 'selected' : '' }}>Desafio</option>
                </select>
            </div>

            <div class="col-md-2">
                <select name="categoria" class="form-control form-control-sm">
                    <option value="">Selecione a Categoria</option>
                    <option value="clube" {{ request()->get('categoria') === "clube" ? 'selected' : '' }}>Clube</option>
                    <option value="unidade" {{ request()->get('categoria') === "unidade" ? 'selected' : '' }}>Unidade</option>
                    <option value="individual" {{ request()->get('categoria') === "individual" ? 'selected' : '' }}>Individual</option>
                </select>
            </div>

            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Digite um nome pra pesquisar..." value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
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
        @forelse ($avaliacoes as $avaliacao)
            <tr>
                <td>{{ $avaliacao->nome }}</td>
                <td>{{ $avaliacao->descricao }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('avaliacoes.show', $avaliacao->id_avaliacao) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('avaliacoes.edit', $avaliacao->id_avaliacao) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('avaliacoes.destroy', $avaliacao->id_avaliacao) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir o Avaliacao {{$avaliacao->nome}} ?')">
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

    @if($avaliacoes->total() > $avaliacoes->perPage())
        <div class="mt-1 py-2">
            {{ $avaliacoes->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
