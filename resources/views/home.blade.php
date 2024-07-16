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

</div>
@endsection
