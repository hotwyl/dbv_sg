<?php

namespace App\Http\Controllers;

use App\Models\Avaliador;
use App\Http\Requests\AvaliadorRequest;
use App\Http\Controllers\Controller;
use App\Models\Cargo;
use Illuminate\Http\Request;

class AvaliadorController extends Controller
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
        $query = Avaliador::query();
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

        $avaliadores = $query->orderBy($orderby, 'asc')->paginate($paginate);

        return view('avaliadores.index', compact('avaliadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avaliadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvaliadorRequest $request)
    {
        Avaliador::create($request->validated());
        return redirect()->route('avaliadores.index')->with('success', 'Avaliador criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($avaliador)
    {
        $avaliador = Avaliador::find($avaliador);
        return view('avaliadores.show', compact('avaliador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($avaliador)
    {
        $avaliador = Avaliador::find($avaliador);
        return view('avaliadores.edit', compact('avaliador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AvaliadorRequest $request, $avaliador)
    {
        $avaliador = Avaliador::find($avaliador);
        $avaliador->update($request->validated());
        return redirect()->route('avaliadores.index')->with('success', 'Avaliador atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($avaliador)
    {
        $avaliador = Avaliador::find($avaliador);
        $avaliador->delete();
        return redirect()->route('avaliadores.index')->with('success', 'Avaliador deletado com sucesso.');
    }
}
