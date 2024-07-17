<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoClubeRequest;
use App\Models\Avaliacao;
use App\Models\Avaliador;
use App\Models\Clube;
use App\Models\EventoClube;
use Illuminate\Http\Request;

class EventoClubeController extends Controller
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
        $query = EventoClube::query();
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

        $eventoClubes = $query->paginate($paginate);

//        dd($eventoClubes);

        return view('eventos_clubes.index', compact('eventoClubes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avaliacoes = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $clubes = Clube::all();
        return view('eventos_clubes.create', compact('avaliacoes', 'avaliadores', 'clubes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoClubeRequest $request)
    {
        EventoClube::create($request->validated());
        return redirect()->route('eventos_clubes.index')->with('success', 'Evento Clube criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($evento)
    {
        $evento = EventoClube::find($evento);
        return view('eventos_clubes.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eventoClube)
    {
        $evento = EventoClube::find($eventoClube);
        $avaliacoes = Avaliacao::all();
        $avaliadores = Avaliador::all();
        $clubes = Clube::all();
        return view('eventos_clubes.edit', compact('evento', 'avaliacoes', 'avaliadores', 'clubes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoClubeRequest $request, $eventoClube)
    {
        $evento = EventoClube::find($eventoClube);
        $evento->update($request->validated());
        return redirect()->route('eventos_clubes.index')->with('success', 'Evento Clube atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($eventoClube)
    {
        $evento = EventoClube::find($eventoClube);
        $evento->delete();
        return redirect()->route('eventos_clubes.index')->with('success', 'Evento Clube deletado com sucesso.');
    }

}
