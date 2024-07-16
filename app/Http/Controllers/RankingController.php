<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Http\Requests\RankingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankingController extends Controller
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
        $query = Ranking::query();
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

        $rankings = $query->orderBy($orderby, 'asc')->paginate($paginate);

        return view('ranking.index', compact('rankings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ranking.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RankingRequest $request)
    {
        Ranking::create($request->validated());
        return redirect()->route('ranking.index')->with('success', 'Ranking criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranking $ranking)
    {
        return view('ranking.show', compact('ranking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranking $ranking)
    {
        return view('ranking.edit', compact('ranking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RankingRequest $request, Ranking $ranking)
    {
        $ranking->update($request->validated());
        return redirect()->route('ranking.index')->with('success', 'Ranking atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranking $ranking)
    {
        $ranking->delete();
        return redirect()->route('ranking.index')->with('success', 'Ranking deletada com sucesso.');
    }
}
