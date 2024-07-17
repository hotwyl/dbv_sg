@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container pt-5">

    <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <h3>{{ $qtd->clubes }}</h3>
                        <p><b>CLUBES</b></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ route('clubes.index') }}" class="small-box-footer">
                        Acessar Clubes <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $qtd->unidades }}</h3>
                        <p><b>UNIDADES</b></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ route('unidades.index') }}" class="small-box-footer">
                        Acessar Unidades <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="small-box bg-gradient-secondary">
                    <div class="inner">
                        <h3>{{ $qtd->desbravadores }}</h3>
                        <p><b>DESBRAVADORES</b></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ route('desbravadores.index') }}" class="small-box-footer">
                        Acessar Desbravadores <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

    </div>

    <div class="row d-flex justify-content-center">

        <div class="col-md-6">
            <h3>Top 10 Pontuação Ranking Clube</h3>
            <small class="text-muted">Ranking dos clubes com maior pontuação</small>
            <ol>
                @foreach($qtd->ranking_clube as $clube)
                    <a href="{{ route('clubes.show', $clube->clube->id_clube) }}"> <li>
                        <small class="text-muted">Clube</small>: {{ $clube->clube->nome }} |
                        <small class="text-muted">Pontiuação Geral</small>:{{ $clube->pontuacao }}
                    </li> </a>
                @endforeach
            </ol>
        </div>

        <div class="col-md-6">
            <h3>Top 10 Pontuação Ranking Unidade</h3>
            <small class="text-muted">Ranking das unidades com maior pontuação</small>
            <ol>
                @foreach($qtd->ranking_unidade as $unidade)
                    <a href="{{ route('unidades.show', $unidade->unidade->id_unidade) }}"> <li>
                        <small class="text-muted">Unidade</small>: {{ $unidade->unidade->nome }} |
                        <small class="text-muted">Pontiuação Total</small>: {{ $unidade->pontuacao }}
                    </li> </a>
                @endforeach
            </ol>
        </div>

        <div class="col-md-6">
            <h3>Top 10 Eventos Clube</h3>
            <small class="text-muted"> Ranking dos clubes com maior pontuação nos eventos</small>
            <ol>
                @foreach($qtd->evento_clube as $clube)
                    <a href="{{ route('clubes.show', $clube->clube->id_clube) }}"> <li>
                        <small class="text-muted">Clube</small>: {{ $clube->clube->nome }} |
                        <small class="text-muted">Acertos</small>: {{ $clube->acertos }} |
                        <small class="text-muted">Duração</small>: {{ date("H:i:s", $clube->duracao) }} |
                        <small class="text-muted">Erros</small>: {{ $clube->erros }}
                    </li> </a>
                @endforeach
            </ol>
        </div>

        <div class="col-md-6">
            <h3>Top 10 Eventos Unidade</h3>
            <small class="text-muted">Ranking das unidades com maior pontuação</small>
            <ol>
                @foreach($qtd->evento_unidade as $unidade)
                    <a href="{{ route('unidades.show', $unidade->unidade->id_unidade) }}"> <li>
                        <small class="text-muted">Unidade</small>: {{ $unidade->unidade->nome }} |
                        <small class="text-muted">Acertos</small>: {{ $unidade->acertos }} |
                        <small class="text-muted">Duração</small>: {{ date("H:i:s", $unidade->duracao) }}
                            |
                        <small class="text-muted">Erros</small>: {{ $unidade->erros }}
                    </li> </a>
                @endforeach
            </ol>
        </div>

    </div>

</div>
@endsection
