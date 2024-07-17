@extends('adminlte::page')

@section('title', 'Ranking Clubes')

@section('content_header')
    <h1>Evento Avaliações Clubes</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Eventos Clube</li>
        </ol>
    </nav>

    <form action="{{ route('eventos_clubes.index') }}" method="GET">
        <div class="row">

            <div class="col-md-3">
                <select name="avaliacao" class="form-control form-control-sm">
                    <option value="">Selecione a Avaliação</option>
                    @foreach ($eventoClubes as $eventoClube)
                        <option value="{{ $eventoClube->avaliacao->id_avaliacao }}" {{ request()->avaliacao === $eventoClube->avaliacao->id_avaliacao ? 'selected' : '' }}>{{ $eventoClube->avaliacao->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="avaliador" class="form-control form-control-sm">
                    <option value="">Selecione o Avaliador</option>
                    @foreach ($eventoClubes as $eventoClube)
                        <option value="{{ $eventoClube->avaliador->id_avaliador }}" {{ request()->avaliador === $eventoClube->avaliador->id_avaliador ? 'selected' : '' }}>{{ $eventoClube->avaliador->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="clube" class="form-control form-control-sm">
                    <option value="">Selecione o Clube</option>
                    @foreach ($eventoClubes as $eventoClube)
                        <option value="{{ $eventoClube->clube->id_clube }}" {{ request()->clube === $eventoClube->clube->id_clube ? 'selected' : '' }}>{{ $eventoClube->clube->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex justify-content-around">
                <button type="submit" class="btn btn-secondary btn-sm">Filtrar</button>
                <a href="{{ route('eventos_clubes.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                <a href="{{ route('eventos_clubes.create') }}" class="btn btn-success btn-sm">Nova Avaliação</a>
            </div>
        </div>
    </form>

    <x-mensagem />

    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>Avaliação</th>
                <th>Avaliador</th>
                <th>Clube</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($eventoClubes as $eventoClube)
            <tr>
                <td>{{ $eventoClube->avaliacao->nome }}</td>
                <td>{{ $eventoClube->avaliador->nome }}</td>
                <td>{{ $eventoClube->clube->nome }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('eventos_clubes.show', $eventoClube->id_evento_clube) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('eventos_clubes.edit', $eventoClube->id_evento_clube) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('eventos_clubes.destroy', $eventoClube->id_evento_clube) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir o intem Evento {{$eventoClube->avaliacao->nome }} ?')">
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

    @if($eventoClubes->total() > $eventoClubes->perPage())
        <div class="mt-1 py-2">
            {{ $eventoClubes->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
