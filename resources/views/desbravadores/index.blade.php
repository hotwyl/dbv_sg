@extends('adminlte::page')

@section('title', 'Desbravadores')

@section('content_header')
    <h1>Desbravadores</h1>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Desbravador</li>
        </ol>
    </nav>

    <form action="{{ route('desbravadores.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('desbravadores.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Desbravador</a>
            </div>
            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome do Desbravador" value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                    <a href="{{ route('desbravadores.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
                </div>
            </div>
        </div>
    </form>

    <x-mensagem />

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Clube</th>
                <th>Unidade</th>
                <th>Cargo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($desbravadores as $desbravador)
                <tr>
                    <td>{{ $desbravador->nome }}</td>
                    <td>{{ $desbravador->unidade->clube->nome }}</td>
                    <td>{{ $desbravador->unidade->nome }}</td>
                    <td>{{ $desbravador->cargo->nome }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ route('desbravadores.show', $desbravador->id_desbravador) }}" class="btn btn-info btn-sm">Mostrar</a>
                        <a href="{{ route('desbravadores.edit', $desbravador->id_desbravador) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('desbravadores.destroy', $desbravador->id_desbravador) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir o Desbravador {{$desbravador->nome}} ?')">
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

    @if($desbravadores->total() > $desbravadores->perPage())
        <div class="mt-1 py-2">
            {{ $desbravadores->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif

@endsection
