<?php

namespace App\Http\Controllers;

use App\Models\Clube;
use App\Models\EventoClube;
use App\Models\RankingClube;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClubeRequest;
use App\Http\Requests\UpdateClubeRequest;

class ClubeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Clube::query();
        $columns = ['nome', 'distrito', 'igreja'];
        $orderby = 'nome';
        $paginate = 10;

        if ($request->filled('area')) {
            $query->where('area', $request->area );
        }

        if ($request->filled('regiao')) {
            $query->where('regiao', $request->regiao);
        }

        if ($request->filled('nome')) {
            $query->where(function ($query) use ($request, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $request->nome . '%');
                }
            });
        }

        $clubes = $query->orderBy($orderby, 'asc')->paginate($paginate);

        return view('clubes.index', compact('clubes'));
    }

    public function create()
    {
        return view('clubes.create');
    }

    public function store(StoreClubeRequest $request)
    {
        Clube::create($request->validated());

        return redirect()->route('clubes.index')
            ->with('success', 'Clube criado com sucesso.');
    }

    public function show(Clube $clube)
    {
        //total pontuacao ranking_clube (somando pontuacao) quando avaliação for do tipo ranking
        $rankingClube = RankingClube::where('id_clube', $clube->id_clube)->whereHas('avaliacao', function ($query) {
            $query->where('tipo', 'ranking');
        })->orderBy('pontuacao', 'desc')->get();

        //total de eventos realizados clubes (somando todos acertos, somando todos erros crescente somando duração)
        $eventosClube = EventoClube::where('id_clube', $clube->id_clube)->whereHas('avaliacao', function ($query) {
            $query->where('tipo', 'evento');
        })->orderBy('duracao', 'asc')->orderBy('pontuacao', 'desc')->orderBy('acertos', 'desc')->orderBy('erros', 'asc')->get();

        return view('clubes.show', compact('clube', 'rankingClube', 'eventosClube'));
    }

    public function edit(Clube $clube)
    {
        return view('clubes.edit', compact('clube'));
    }

    public function update(UpdateClubeRequest $request, Clube $clube)
    {
        $clube->update($request->validated());

        return redirect()->route('clubes.index')
            ->with('success', 'Clube atualizado com sucesso.');
    }

    public function destroy(Clube $clube)
    {
        $clube->delete();

        return redirect()->route('clubes.index')
            ->with('success', 'Clube deletado com sucesso.');
    }
}
