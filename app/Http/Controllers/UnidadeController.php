<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

        if ($request->filled('clube')) {
            $query->where('clube', 'like', '%' . $request->clube . '%');
        }

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $unidades = $query->paginate(10);

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
        dd($unidade);
        return view('unidades.show', compact('unidade'));
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
