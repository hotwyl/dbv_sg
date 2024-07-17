<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clube;
use App\Models\RankingClube;
use App\Models\RankingUnidade;
use App\Models\Unidade;
use App\Http\Requests\StoreUnidadeRequest;
use App\Http\Requests\UpdateUnidadeRequest;
use Illuminate\Http\Request;

class UnidadeController extends Controller
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
        $query = Unidade::query();
        $columns = ['nome'];
        $orderby = 'nome';
        $paginate = 10;

        if ($request->filled('nome')) {
            $query->where(function ($query) use ($request, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $request->nome . '%');
                }
            });
        }

        $unidades = $query->orderBy($orderby, 'asc')->paginate($paginate);

        return view('unidades.index', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unidades.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnidadeRequest $request)
    {
        Unidade::create($request->validated());

        return redirect()->route('unidades.index')->with('success', 'Unidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unidade $unidade)
    {
        //total pontuacao ranking_clube
        $rankingUnidade = RankingUnidade::where('id_unidade', $unidade->id_unidade)->sum('pontuacao');

        return view('unidades.show', compact('unidade', 'rankingUnidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unidade $unidade)
    {
        return view('unidades.edit', compact('unidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnidadeRequest $request, Unidade $unidade)
    {
        $unidade->update($request->validated());

        return redirect()->route('unidades.index')->with('success', 'Unidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();

        return redirect()->route('unidades.index')->with('success', 'Unidade deletada com sucesso!');
    }
}
