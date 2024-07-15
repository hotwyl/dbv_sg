<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesbravadorRequest;
use App\Http\Requests\UpdateDesbravadorRequest;
use App\Models\Cargo;
use App\Models\Desbravador;
use App\Models\Unidade;
use Illuminate\Http\Request;

class DesbravadorController extends Controller
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
        $query = Desbravador::query()->with(['unidade', 'cargo']);
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

        $desbravadores = $query->orderBy($orderby, 'asc')->paginate($paginate);

        return view('desbravadores.index', compact('desbravadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::orderBy('nome', 'asc')->get();
        $cargos = Cargo::orderBy('nome', 'asc')->get();
        return view('desbravadores.create', compact('unidades', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDesbravadorRequest $request)
    {
        Desbravador::create($request->validated());
        return redirect()->route('desbravadores.index')->with('success', 'Desbravador criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($desbravador)
    {
        $desbravador = Desbravador::with(['unidade', 'cargo'])->find($desbravador);
        return view('desbravadores.show', compact('desbravador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($desbravador)
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();
        $desbravador = Desbravador::with(['unidade', 'cargo'])->find($desbravador);
        return view('desbravadores.edit', compact('desbravador', 'unidades', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesbravadorRequest $request, $desbravador)
    {
        $desbravador = Desbravador::with(['unidade', 'cargo'])->find($desbravador);
        $desbravador->update($request->validated());
        return redirect()->route('desbravadores.index')->with('success', 'Desbravador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($desbravador)
    {
        $desbravador = Desbravador::with(['unidade', 'cargo'])->find($desbravador);
        $desbravador->delete();
        return redirect()->route('desbravadores.index')->with('success', 'Desbravador deletado com sucesso!');
    }
}
