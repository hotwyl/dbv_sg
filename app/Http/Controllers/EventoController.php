<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Models\Avaliacao;
use Illuminate\Http\Request;

class EventoController extends Controller
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

        if ($request->filled('nome')) {
            $query->where(function ($query) use ($request, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $request->nome . '%');
                }
            });
        }

        $eventos = $query->orderBy($orderby, 'asc')->paginate($paginate);

        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request)
    {
        Avaliacao::create($request->validated());
        return redirect()->route('eventos.index')->with('success', 'Avaliacao criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Avaliacao $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avaliacao $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, Avaliacao $evento)
    {
        $evento->update($request->validated());
        return redirect()->route('eventos.index')->with('success', 'Avaliacao atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avaliacao $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Avaliacao deletado com sucesso.');
    }
}
