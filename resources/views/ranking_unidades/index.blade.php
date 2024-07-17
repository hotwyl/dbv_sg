@extends('adminlte::page')

@section('title', 'Ranking Unidades')

@section('content_header')
    <h1>Ranking Avaliações Unidade</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ranking Unidade</li>
        </ol>
    </nav>

    <form action="{{ route('ranking_unidades.index') }}" method="GET">
        <div class="row">

            <div class="col-md-3">
                <select name="avaliacao" class="form-control form-control-sm">
                    <option value="">Selecione a Avaliação</option>
                    @foreach ($rankingUnidades as $rankingUnidade)
                        <option value="{{ $rankingUnidade->avaliacao->id_avaliacao }}" {{ request()->avaliacao === $rankingUnidade->avaliacao->id_avaliacao ? 'selected' : '' }}>{{ $rankingUnidade->avaliacao->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="avaliador" class="form-control form-control-sm">
                    <option value="">Selecione o Avaliador</option>
                    @foreach ($rankingUnidades as $rankingUnidade)
                        <option value="{{ $rankingUnidade->avaliador->id_avaliador }}" {{ request()->avaliador === $rankingUnidade->avaliador->id_avaliador ? 'selected' : '' }}>{{ $rankingUnidade->avaliador->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <select name="unidade" class="form-control form-control-sm">
                    <option value="">Selecione o Unidade</option>
                    @foreach ($rankingUnidades as $rankingUnidade)
                        <option value="{{ $rankingUnidade->unidade->id_unidade }}" {{ request()->unidade === $rankingUnidade->unidade->id_unidade ? 'selected' : '' }}>{{ $rankingUnidade->unidade->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex justify-content-around">
                <button type="submit" class="btn btn-secondary btn-sm">Filtrar</button>
                <a href="{{ route('ranking_unidades.index') }}" class="btn btn-warning btn-sm">Limpar</a>
                <a href="{{ route('ranking_unidades.create') }}" class="btn btn-success btn-sm">Nova Avaliação</a>
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
        @forelse ($rankingUnidades as $rankingUnidade)
            <tr>
                <td>{{ $rankingUnidade->avaliacao->nome }}</td>
                <td>{{ $rankingUnidade->avaliador->nome }}</td>
                <td>{{ $rankingUnidade->unidade->nome }}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{ route('ranking_unidades.show', $rankingUnidade->id_ranking_unidade) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <a href="{{ route('ranking_unidades.edit', $rankingUnidade->id_ranking_unidade) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('ranking_unidades.destroy', $rankingUnidade->id_ranking_unidade) }}" method="POST" style="display:inline;">
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

    @if($rankingUnidades->total() > $rankingUnidades->perPage())
        <div class="mt-1 py-2">
            {{ $rankingUnidades->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection
