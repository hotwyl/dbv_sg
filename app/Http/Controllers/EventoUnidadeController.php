<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoUnidadeRequest;
use App\Models\Avaliacao;
use App\Models\Avaliador;
use App\Models\Unidade;
use App\Models\EventoUnidade;
use Illuminate\Http\Request;

class EventoUnidadeController extends Controller
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
        $query = EventoUnidade::query();
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

        $eventoUnidades = $query->paginate($paginate);

//        dd($eventoUnidades);

        return view('eventos_unidades.index', compact('eventoUnidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avaliacoes = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $clubes = Unidade::all();
        return view('eventos_unidades.create', compact('avaliacoes', 'avaliadores', 'clubes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoUnidadeRequest $request)
    {
        EventoUnidade::create($request->validated());
        return redirect()->route('eventos_unidades.index')->with('success', 'Evento Unidade criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($evento)
    {
        $evento = EventoUnidade::find($evento);
        return view('eventos_unidades.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eventoUnidade)
    {
        $evento = EventoUnidade::find($eventoUnidade);
        $avaliacoes = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $clubes = Unidade::all();
        return view('eventos_unidades.edit', compact('evento', 'avaliacoes', 'avaliadores', 'clubes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoUnidadeRequest $request, $eventoUnidade)
    {
        $evento = EventoUnidade::find($eventoUnidade);
        $evento->update($request->validated());
        return redirect()->route('eventos_unidades.index')->with('success', 'Evento Unidade atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($eventoUnidade)
    {
        $evento = EventoUnidade::find($eventoUnidade);
        $evento->delete();
        return redirect()->route('eventos_unidades.index')->with('success', 'Evento Unidade deletado com sucesso.');
    }
}
