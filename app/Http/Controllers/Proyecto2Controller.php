<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Proyecto2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::all();

        return view('proyectos.listar', ['proyectos' => $proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyectos = Proyecto::all();

        return view('proyectos.crear', ['proyectos' => $proyectos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'proyecto' => 'required|string|max:200',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'responsable_proyecto' => 'required|string|max:100',
            'correo_responsable' => 'required|string|max:50'
        ]);

        $proyecto = new Proyecto();
        $proyecto->proyecto = $request->proyecto;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_fin = $request->fecha_fin;
        $proyecto->responsable_proyecto = $request->responsable_proyecto;
        $proyecto->correo_responsable = $request->correo_responsable;
        $proyecto->telefono_responsable = $request->telefono_responsable;
        $proyecto->direccion_cliente = $request->direccion_cliente;

        //generar log de proyecto en storage/logs/laravel.log de tipo info
        Log::info('Proyecto creado: ' . $proyecto->proyecto);
        $proyecto->save();
        Alert::success('Registrado', 'proyecto con éxito');

        $proyectos = Proyecto::all();
        return view('proyectos.listar', ['proyectos' => $proyectos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyecto = Proyecto::find($id);
        return view('proyectos.mostrar', ['proyecto' => $proyecto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyecto = Proyecto::find($id);
        return view('proyectos.editar', ['proyecto' => $proyecto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'proyecto' => 'required|string|max:200',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date'
        ]);

        $proyecto = Proyecto::find($id);
        $proyecto->proyecto = $request->proyecto;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_fin = $request->fecha_fin;

        $proyecto->save();

        Alert::success('Actualizado', 'proyecto con éxito');

        $proyectos = Proyecto::all();

        return view('proyectos.listar', ['proyectos' => $proyectos]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
