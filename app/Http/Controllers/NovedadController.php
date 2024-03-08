<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Models\Empleado;
use App\Models\Novedad;
use App\Models\TipoNovedad;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novedades = Novedad::all();

        return view('novedades.listar', ['novedades' => $novedades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_novedades = TipoNovedad::all();
        $elementos = Elemento::all();
        $empleados = Empleado::all();


        return view('novedades.crear', ['tipos_novedades'=>$tipos_novedades, 'elementos'=>$elementos, 'empleados'=>$empleados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'tipo_novedad_id' => ['required', 'numeric'],
            'elemento_id' => ['required', 'numeric'],
            'empleado_id' => ['required', 'numeric'],
            'novedad' => ['required', 'string'],
            'fecha_reporte' => ['required', 'date'],
            'fecha_cierre' => ['required', 'date'],
            
        ]);

        $novedad = new Novedad();
        $novedad->tipo_novedad_id = $request->tipo_novedad_id;
        $novedad->elemento_id = $request->elemento_id;
        $novedad->empleado_id = $request->empleado_id;
        $novedad->novedad = $request->novedad;
        $novedad->fecha_reporte = $request->fecha_reporte;
        $novedad->fecha_cierre = $request->fecha_cierre;
        $novedad->save();

        Alert::success('Registrado', 'Novedad con éxito');
        return redirect(route('novedades.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $novedad = Novedad::find($id);

        return view('novedades.mostrar', ['novedad' => $novedad]);

 
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $novedad = Novedad::find($id);
        $tipos_novedades = TipoNovedad::all();
        $elementos = Elemento::all();      
        $empleado = Empleado::all();
    
       
        return view('novedades.editar', ['novedad'=> $novedad, 'tipos_novedades'=>$tipos_novedades, 'elementos'=>$elementos, 'empleados'=>$empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $validaciones = $request->validate([
            'tipo_novedad_id' => ['required', 'numeric'],
            'elemento_id' => ['required', 'numeric'],
            'empleado_id' => ['required', 'numeric'],
            'novedad' => ['required', 'string'],
            'fecha_reporte' => ['required', 'date'],
            'fecha_cierre' => ['required', 'date'],
            
        ]);

        $novedad = Novedad::find($id);
        $novedad->tipo_novedad_id = $request->tipo_novedad_id;
        $novedad->elemento_id = $request->elemento_id;
        $novedad->empleado_id = $request->empleado_id;
        $novedad->novedad = $request->novedad;
        $novedad->fecha_reporte = $request->fecha_reporte;
        $novedad->fecha_cierre = $request->fecha_cierre;
        $novedad->save();

        Alert::success('Actualizado', 'Novedad con éxito');
        return redirect(route('novedades.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
