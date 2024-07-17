<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RankingClubeRequest;
use App\Models\Avaliacao;
use App\Models\Avaliador;
use App\Models\Clube;
use App\Models\RankingUnidade;
use App\Models\Unidade;
use Illuminate\Http\Request;

class RankingUnidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RankingUnidade::query();
        $paginate = 10;

        if ($request->filled('avaliacao')) {
            $query->where('id_avaliacao', $request->avaliacao);
        }

        if ($request->filled('avaliador')) {
            $query->where('id_avaliador', $request->avaliador);
        }

        if ($request->filled('unidade')) {
            $query->where('id_unidade', $request->clube);
        }

        $rankingUnidades = $query->paginate($paginate);

        return view('ranking_unidades.index', compact('rankingUnidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avaliacoes = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $unidades = Unidade::all();
        return view('ranking_unidades.create', compact('avaliacoes', 'avaliadores', 'unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RankingUnidade $request)
    {
        RankingUnidade::create($request->validated());
        return redirect()->route('ranking_unidades.index')->with('success', 'Ranking Clube criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($rankingUnidade)
    {
        $ranking = RankingUnidade::find($rankingUnidade);
        return view('ranking_unidades.show', compact('ranking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($rankingUnidade)
    {
        $ranking = RankingUnidade::find($rankingUnidade);
        $avaliacoes = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $unidades = Unidade::all();
        return view('ranking_unidades.edit', compact('ranking', 'avaliacoes', 'avaliadores', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RankingUnidade $request, $rankingUnidade)
    {
        $ranking = RankingUnidade::find($rankingUnidade);
        $ranking->update($request->validated());
        return redirect()->route('ranking_unidades.index')->with('success', 'Ranking Clube atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $rankingUnidade)
    {
        $ranking = RankingUnidade::find($rankingUnidade);
        $rankingUnidade->delete();
        return redirect()->route('ranking_unidades.index')->with('success', 'Ranking Clube deletado com sucesso.');
    }
}
