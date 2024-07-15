@extends('adminlte::page')

@section('title', 'Clubes')

@section('content_header')
    <h1>Lista de Clubes</h1>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clubes</li>
        </ol>
    </nav>

    <form action="{{ route('clubes.index') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('clubes.create') }}" class="btn btn-success btn-sm mb-3">Adicionar Clube</a>
            </div>
            <div class="col-md-2">
                <input type="number" name="area" class="form-control form-control-sm" placeholder="Área" value="{{ request()->get('area') }}">
            </div>
            <div class="col-md-2">
                <input type="number" name="regiao" class="form-control form-control-sm" placeholder="Região" value="{{ request()->get('regiao') }}">
            </div>
            <div class="col-md">
                <input type="text" name="nome" class="form-control form-control-sm" placeholder="Nome do Clube, Igreja ou Distrito" value="{{ request()->get('nome') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                <a href="{{ route('clubes.index') }}" class="btn btn-secondary btn-sm">Limpar</a>
            </div>
        </div>
    </form>

    <x-mensagem />

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>Área</th>
                <th>Região</th>
                <th>Distrito</th>
                <th>Igreja</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clubes as $clube)
                <tr>
                    <td>{{ $clube->area }}</td>
                    <td>{{ $clube->regiao }}</td>
                    <td>{{ $clube->distrito }}</td>
                    <td>{{ $clube->igreja }}</td>
                    <td>{{ $clube->nome }}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-info btn-sm" href="{{ route('clubes.show',$clube->id_clube) }}">Mostrar</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('clubes.edit',$clube->id_clube) }}">Editar</a>
                        <form action="{{ route('clubes.destroy',$clube->id_clube) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir o clube {{$clube->nome}} ?')">
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

    @if($clubes->total() > $clubes->perPage())
        <div class="mt-1 py-2">
            {{ $clubes->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif

@endsection
