<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Http\Requests\AtividadeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AtividadeController extends Controller
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
        $atividades = Atividade::all();
        return view('atividades.index', compact('atividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('atividades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AtividadeRequest $request)
    {
        Atividade::create($request->validated());
        return redirect()->route('atividades.index')->with('success', 'Atividade criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Atividade $atividade)
    {
        return view('atividades.show', compact('atividade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atividade $atividade)
    {
        return view('atividades.edit', compact('atividade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AtividadeRequest $request, Atividade $atividade)
    {
        $atividade->update($request->validated());
        return redirect()->route('atividades.index')->with('success', 'Atividade atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atividade $atividade)
    {
        $atividade->delete();
        return redirect()->route('atividades.index')->with('success', 'Atividade deletada com sucesso.');
    }
}
