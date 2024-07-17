<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RankingClubeRequest;
use App\Models\RankingUnidade;
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
    public function index()
    {
        $rankingUnidades = RankingUnidade::all();
        return view('ranking_unidades.index', compact('rankingUnidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ranking_unidades.create');
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
    public function show(RankingUnidade $rankingUnidade)
    {
        return view('ranking_unidades.show', compact('rankingUnidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RankingUnidade $rankingUnidade)
    {
        return view('ranking_unidades.edit', compact('rankingUnidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RankingUnidade $request, RankingUnidade $rankingUnidade)
    {
        $rankingUnidade->update($request->validated());
        return redirect()->route('ranking_unidades.index')->with('success', 'Ranking Clube atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RankingUnidade $rankingUnidade)
    {
        $rankingUnidade->delete();
        return redirect()->route('ranking_unidades.index')->with('success', 'Ranking Clube deletado com sucesso.');
    }
}
