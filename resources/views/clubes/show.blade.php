@extends('adminlte::page')

@section('title', 'Detalhes do Clube')

@section('content_header')
    <h1>Detalhes do Clube</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clubes.index') }}">Clubes</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $clube->nome }}</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-center">
            <h5>Informações do Clube</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <p><strong>Divisão:</strong> {{ $clube->divisao }}</p>
                    <p><strong>União:</strong> {{ $clube->uniao }}</p>
                    <p><strong>Associação:</strong> {{ $clube->associacao }}</p>
                    <p><strong>Área:</strong> {{ $clube->area }}</p>
                    <p><strong>Região:</strong> {{ $clube->regiao }}</p>
                    <p><strong>Distrito:</strong> {{ $clube->distrito }}</p>
                    <p><strong>Igreja:</strong> {{ $clube->igreja }}</p>
                    <p><strong>Tipo:</strong> {{ $clube->tipo }}</p>
                    <p><strong>Nome:</strong> {{ $clube->nome }}</p>
                    <p><strong>Status:</strong> {{ $clube->status ? 'Ativo' : 'Inativo' }}</p>
                </div>
                <div class="col-md">
                    <h5>Membros da Unidades</h5>
                    <ul>
                        @foreach ($clube->unidades as $unidade)
                            <li><a href="{{ route('unidades.show', $unidade->id_unidade) }}">{{ $unidade->nome }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-around pb-3">
                <a href="{{ route('clubes.index') }}" class="btn btn-secondary btn-sm mt-3">Voltar</a>
                <a href="{{ route('clubes.edit', $clube->id_clube) }}" class="btn btn-primary btn-sm mt-3">Editar</a>
                <form action="{{ route('clubes.destroy', $clube->id_clube) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir o clube {{$clube->nome}} ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mt-3">Excluir</button>
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
                        @foreach ($rankingClube as $avaliacao)
                            <tr>
                                <td><a href="{{ route('ranking_clubes.show', $avaliacao->id_ranking_clube) }}">{{ $avaliacao->avaliacao->nome }}</a></td>
                                <td><a href="{{ route('ranking_clubes.show', $avaliacao->id_ranking_clube) }}">{{ $avaliacao->pontuacao }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><small class="text-muted">Totais</small></td>
                            <td><small class="text-muted">{{$rankingClube->sum('pontuacao')}}</small></td>
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
                        @foreach ($eventosClube as $avaliacao)
                            <tr>
                                <td><a href="{{ route('eventos_clubes.show', $avaliacao->id_evento_clube) }}">{{ $avaliacao->avaliacao->nome }}</a></td>
                                <td><a href="{{ route('eventos_clubes.show', $avaliacao->id_evento_clube) }}">{{ $avaliacao->pontuacao }}</a></td>
                                <td><a href="{{ route('eventos_clubes.show', $avaliacao->id_evento_clube) }}">{{ $avaliacao->acertos }}</a></td>
                                <td><a href="{{ route('eventos_clubes.show', $avaliacao->id_evento_clube) }}">{{ $avaliacao->erros }}</a></td>
                                <td><a href="{{ route('eventos_clubes.show', $avaliacao->id_evento_clube) }}">{{ $avaliacao->duracao }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><small class="text-muted">Totais</small></td>
                                <td><small class="text-muted">{{$eventosClube->sum('pontuacao')}}</small></td>
                                <td><small class="text-muted">{{$eventosClube->sum('acertos')}}</small></td>
                                <td><small class="text-muted">{{$eventosClube->sum('erros')}}</small></td>
                                <td><small class="text-muted"></small></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
