<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   
        $proyectos = Proyecto::all();
        return view('proyectos.listar',['proyectos'=>$proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //controlador crear proyecto

        $proyectos = Proyecto::all();
        return view('proyectos.crear',['proyectos'=>$proyectos]);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        //
        $validated=$request->validate([
            'proyecto'=> 'required|string|max:200',
            'descripcion'=> 'string',
            'fecha_inicio'=> 'required|date',
            'fecha_fin'=> 'required|date',
            'responsable_proyecto'=> 'required|string|max:100',
            'correo_responsable'=> 'required|string|max:50',
            'telefono_responsable'=> 'string|max:20',
            'direccion_cliente'=> 'string|max:100',
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
        Log::info('Proyecto creado: '.$proyecto->proyecto);
        $proyecto->save();
        Alert::success('Registrado', 'proyecto con éxito');
        return view ('proyectos.crear',['proyectos'=>$proyecto]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
