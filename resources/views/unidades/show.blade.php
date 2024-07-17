@extends('adminlte::page')

@section('title', 'Detalhes da Unidade')

@section('content_header')
    <h1>Detalhes da Unidade</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('unidades.index') }}">Unidades</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $unidade->nome }}</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header text-center">
            <h5>Informações da Unidade</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <p><strong>Distrito:</strong> {{ $unidade->clube->distrito }}</p>
                    <p><strong>Igreja:</strong> {{ $unidade->clube->igreja }}</p>
                    <p><strong>Clube:</strong> <a href="{{ route('unidades.show', $unidade->clube->id_clube) }}">{{ $unidade->clube->nome }}</a></p>
                    <p><strong>Unidade:</strong> {{ $unidade->nome }}</p>
                    <p><strong>Status:</strong> {{ $unidade->status ? 'Ativo' : 'Inativo' }}</p>
                </div>

                <div class="col-md">
                    <h5>Membros da Unidade</h5>
                    <ul>
                        @foreach ($unidade->desbravadores as $membro)
                            <li><a href="{{ route('desbravadores.show', $membro->id_desbravador) }}">{{ $membro->nome }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-around my-3">
                <a href="{{ route('unidades.index') }}" class="btn btn-secondary btn-sm">Voltar</a>
                <a href="{{ route('unidades.edit', $unidade->id_unidade) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('unidades.destroy', $unidade->id_unidade) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir a unidade {{$unidade->nome}} ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </div>
        </div>
    </div>


    <div class="row pb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Avaliacoes Ranking</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Item Avaliado</th>
                            <th>Pontuação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rankingUnidade as $avaliacao)
                            <tr>
                                <td><a href="{{ route('ranking_unidades.show', $avaliacao->id_ranking_unidade) }}">{{ $avaliacao->avaliacao->nome }}</a></td>
                                <td><a href="{{ route('ranking_unidades.show', $avaliacao->id_ranking_unidade) }}">{{ $avaliacao->pontuacao }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><small class="text-muted">Totais</small></td>
                            <td><small class="text-muted">{{$rankingUnidade->sum('pontuacao')}}</small></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Avaliacoes Eventos</h5>
                </div>

                <div class="card-header text-center">

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Pontuação</th>
                            <th>Acertos</th>
                            <th>Erros</th>
                            <th>Duração</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($eventosUnidade as $avaliacao)
                            <tr>
                                <td><a href="{{ route('eventos_unidades.show', $avaliacao->id_evento_unidade) }}">{{ $avaliacao->avaliacao->nome }}</a></td>
                                <td><a href="{{ route('eventos_unidades.show', $avaliacao->id_evento_unidade) }}">{{ $avaliacao->pontuacao }}</a></td>
                                <td><a href="{{ route('eventos_unidades.show', $avaliacao->id_evento_unidade) }}">{{ $avaliacao->acertos }}</a></td>
                                <td><a href="{{ route('eventos_unidades.show', $avaliacao->id_evento_unidade) }}">{{ $avaliacao->erros }}</a></td>
                                <td><a href="{{ route('eventos_unidades.show', $avaliacao->id_evento_unidade) }}">{{ $avaliacao->duracao }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><small class="text-muted">Totais</small></td>
                            <td><small class="text-muted">{{$eventosUnidade->sum('pontuacao')}}</small></td>
                            <td><small class="text-muted">{{$eventosUnidade->sum('acertos')}}</small></td>
                            <td><small class="text-muted">{{$eventosUnidade->sum('erros')}}</small></td>
                            <td><small class="text-muted"></small></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
