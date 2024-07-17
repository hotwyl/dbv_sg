@extends('adminlte::page')

@section('title', 'Ranking Unidades')

@section('content_header')
    <h1>Evento Avaliações Unidades</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Eventos Unidade</li>
        </ol>
    </nav>

    <form action="{{ route('eventos_unidades.index') }}" method="GET">
        <div class="row">

            <div class="col-md-3">
                <select name="avaliacao" class="form-control form-control-sm">
                    <option value="">Selecione a Avaliação</option>
                    @foreach ($eventoUnidades as $eventoUnidade)
                        <option value="{{ $eventoUnidade->avaliacao->id_avaliacao }}" {{ request()->avaliacao === $eventoUnidade->avaliacao->id_avaliacao ? 'selected' : '' }}>{{ $eventoUnidade->avaliacao->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="avaliador" class="form-control form-control-sm">
                    <option value="">Selecione o Avaliador</option>
                    @foreach ($eventoUnidades as $eventoUnidade)
                        <option value="{{ $eventoUnidade->avaliador->id_avaliador }}" {{ request()->avaliador === $eventoUnidade->avaliador->id_avaliador ? 'selected' : '' }}>{{ $eventoUnidade->avaliador->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="unidade" class="form-control form-control-sm">
                    <option value="">Selecione o Unidade</option>
                    @foreach ($eventoUnidades as $eventoUnidade)
                        <option value="{{ $eventoUnidade->unidade->id_unidade }}" {{ request()->unidade === $eventoUnidade->unidade->id_unidade ? 'selected' : '' }}>{{ $eventoUnidade->unidade->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex justify-content-around">
                <button type="submit" class="btn btn-secondary btn-sm">Filtrar</button>
                <a href="{{ route('eventos_unidades.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                <a href="{{ route('eventos_unidades.create') }}" class="btn btn-success btn-sm">Nova Avaliação</a>
            </div>
        </div>
    </form>

    <x-mensagem />

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>Avaliação</th>
                <th>Avaliador</th>
                <th>Unidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($eventoUnidades as $eventoUnidade)
            <tr>
                <td>{{ $eventoUnidade->avaliacao->nome }}</td>
                <td>{{ $eventoUnidade->avaliador->nome }}</td>
                <td>{{ $eventoUnidade->unidade->nome }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('eventos_unidades.show', $eventoUnidade->id_evento_unidade) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('eventos_unidades.edit', $eventoUnidade->id_evento_unidade) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('eventos_unidades.destroy', $eventoUnidade->id_evento_unidade) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir o intem Evento {{$eventoUnidade->avaliacao->nome }} ?')">
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

    @if($eventoUnidades->total() > $eventoUnidades->perPage())
        <div class="mt-1 py-2">
            {{ $eventoUnidades->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
