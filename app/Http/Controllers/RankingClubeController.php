<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RankingClubeRequest;
use App\Models\Avaliacao;
use App\Models\Avaliador;
use App\Models\Clube;
use App\Models\Ranking;
use App\Models\RankingClube;
use Illuminate\Http\Request;

class RankingClubeController extends Controller
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
        $query = RankingClube::query();
        $paginate = 10;

        if ($request->filled('avaliacao')) {
            $query->where('id_avaliacao', $request->avaliacao);
        }

        if ($request->filled('avaliador')) {
            $query->where('id_avaliador', $request->avaliador);
        }

        if ($request->filled('clube')) {
            $query->where('id_clube', $request->clube);
        }

        $rankingClubes = $query->paginate($paginate);

        return view('ranking_clubes.index', compact('rankingClubes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $atividades = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $clubes = Clube::all();
        return view('ranking_clubes.create', compact('atividades', 'avaliadores', 'clubes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RankingClubeRequest $request)
    {
        RankingClube::create($request->validated());
        return redirect()->route('ranking_clubes.index')->with('success', 'Ranking Clube criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($ranking)
    {
        $ranking = RankingClube::find($ranking);
        return view('ranking_clubes.show', compact('ranking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($rankingClube)
    {
        $ranking = RankingClube::find($rankingClube);
        $atividades = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $clubes = Clube::all();
        return view('ranking_clubes.edit', compact('ranking', 'atividades', 'avaliadores', 'clubes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RankingClubeRequest $request, RankingClube $rankingClube)
    {
        $rankingClube->update($request->validated());
        return redirect()->route('ranking_clubes.index')->with('success', 'Ranking Clube atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RankingClube $rankingClube)
    {
        $rankingClube->delete();
        return redirect()->route('ranking_clubes.index')->with('success', 'Ranking Clube deletado com sucesso.');
    }
}
