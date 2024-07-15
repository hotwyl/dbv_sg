@extends('adminlte::page')

@section('title', 'Lista de Unidades')

@section('content_header')
    <h1>Lista de Unidades</h1>
@stop

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Unidades</li>
        </ol>
    </nav>

    <form action="{{ route('unidades.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('unidades.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Unidade</a>
            </div>
            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome da Unidade" value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                <a href="{{ route('unidades.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
            </div>
        </div>
    </form>

    <x-mensagem />

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>Clube</th>
                <th>Unidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($unidades as $unidade)
                <tr>
                    <td>{{ $unidade->clube->nome }}</td>
                    <td>{{ $unidade->nome }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('unidades.show', $unidade->id_unidade) }}" class="btn btn-info btn-sm">Mostrar</a>
                        <a href="{{ route('unidades.edit', $unidade->id_unidade) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('unidades.destroy', $unidade->id_unidade) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir a unidade {{$unidade->nome}} ?')">
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

    @if($unidades->total() > $unidades->perPage())
        <div class="mt-1 py-2">
            {{ $unidades->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif

@endsection
