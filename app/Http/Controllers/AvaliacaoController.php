<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
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
        $query = Avaliacao::query();
        $columns = ['nome'];
        $orderby = 'nome';
        $paginate = 10;

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('nome')) {
            $query->where(function ($query) use ($request, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $request->nome . '%');
                }
            });
        }

        $avaliacoes = $query->orderBy($orderby, 'asc')->paginate($paginate);

        return view('avaliacoes.index', compact('avaliacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avaliacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request)
    {
        Avaliacao::create($request->validated());
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliacao criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($avaliacao)
    {
        $avaliacao = Avaliacao::find($avaliacao);
        return view('avaliacoes.show', compact('avaliacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $avaliacao)
    {
        $avaliacao = Avaliacao::find($avaliacao);
        return view('avaliacoes.edit', compact('avaliacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, $avaliacao)
    {
        $avaliacao = Avaliacao::find($avaliacao);
        $avaliacao->update($request->validated());
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliacao atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($avaliacao)
    {
        $avaliacao = Avaliacao::find($avaliacao);
        $avaliacao->delete();
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliacao deletado com sucesso.');
    }
}
