<?php

namespace App\Http\Controllers;

use App\Models\Clube;
use App\Models\Desbravador;
use App\Models\EventoClube;
use App\Models\EventoUnidade;
use App\Models\RankingClube;
use App\Models\RankingUnidade;
use App\Models\Unidade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $qtd = new \stdClass();

        //quantidade de clubes
        $qtd->clubes = Clube::all()->count();

        //quantidade de unidades
        $qtd->unidades = Unidade::all()->count();

        //quantidade de desbravadores
        $qtd->desbravadores = Desbravador::all()->count();

        //classificação top 10 ranking clube (somando a pontuação de todos ranking de cada clube e ordenando por pontuação decrescente)
        $qtd->ranking_clube = RankingClube::groupBy('id_clube')->selectRaw('sum(pontuacao) as pontuacao, id_clube')->orderBy('pontuacao', 'desc')->limit(10)->get();

        //classificação top 10 ranking unidade (somando a pontuação de todos ranking de cada unidade e ordenando por pontuação decrescente)
        $qtd->ranking_unidade = RankingUnidade::groupBy('id_unidade')->selectRaw('sum(pontuacao) as pontuacao, id_unidade')->orderBy('pontuacao', 'desc')->limit(10)->get();

        //classificação top 10 eventos clubes (somando a pontuação de todos eventos de cada clube e ordenando por acertos decrescente, erros crescente e duração crescente)
        $qtd->evento_clube = EventoClube::groupBy('id_clube')->selectRaw('sum(acertos) as acertos, sum(erros) as erros, sum(duracao) as duracao, id_clube')->orderBy('acertos', 'desc')->orderBy('duracao', 'asc')->orderBy('erros', 'asc')->limit(10)->get();

        //classificação top 10 eventos unidades (somando a pontuação de todos eventos de cada unidade e ordenando por acertos decrescente, erros crescente e duração crescente)
        $qtd->evento_unidade = EventoUnidade::groupBy('id_unidade')->selectRaw('sum(acertos) as acertos, sum(erros) as erros, sum(duracao) as duracao, id_unidade')->orderBy('acertos', 'desc')->orderBy('duracao', 'asc')->orderBy('erros', 'asc')->limit(10)->get();

        return view('home', compact('qtd'));
    }

    public function dashboard()
    {
        return redirect()->route('home');
//        return view('dashboard');
    }
}
