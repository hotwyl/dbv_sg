<?php

namespace App\Http\Controllers;

use App\Models\Clube;
use App\Models\Desbravador;
use App\Models\Unidade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $qtd = new \stdClass();
        //quantidade de clubes
        $qtd->clubes = Clube::all()->count();
        //quantidade de unidades
        $qtd->unidades = Unidade::all()->count();
        //quantidade de desbravadores
        $qtd->desbravadores = Desbravador::all()->count();

        return view('home', compact('qtd'));
    }
}
