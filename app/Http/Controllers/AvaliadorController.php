<?php

namespace App\Http\Controllers;

use App\Models\Avaliador;
use App\Http\Requests\AvaliadorRequest;
use App\Http\Controllers\Controller;
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
        $avaliadores = Avaliador::all();
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
    public function show(Avaliador $avaliador)
    {
        return view('avaliadores.show', compact('avaliador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avaliador $avaliador)
    {
        return view('avaliadores.edit', compact('avaliador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AvaliadorRequest $request, Avaliador $avaliador)
    {
        $avaliador->update($request->validated());
        return redirect()->route('avaliadores.index')->with('success', 'Avaliador atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avaliador $avaliador)
    {
        $avaliador->delete();
        return redirect()->route('avaliadores.index')->with('success', 'Avaliador deletado com sucesso.');
    }
}
