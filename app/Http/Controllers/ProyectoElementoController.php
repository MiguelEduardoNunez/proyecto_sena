<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use Illuminate\Http\Request;

class ProyectoElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $proyecto)
    {
        $elementos = Elemento::where('proyecto_id', '=', $proyecto)
            ->orderBy('marca', 'asc')
            ->paginate(10);

        return view('proyectos.elementos.listar', ['elementos' => $elementos, 'proyecto' => $proyecto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $proyecto)
    {
        return view('proyectos.elementos.crear', ['proyecto' => $proyecto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $proyecto)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $proyecto, string $elemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $proyecto, string $elemento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $proyecto, string $elemento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $proyecto, string $elemento)
    {
        //
    }
}
