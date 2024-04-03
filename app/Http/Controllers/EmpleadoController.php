<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::orderBy('empleado', 'asc')->paginate(100);

        return view('empleados.listar', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'empleado' => ['required', 'string', 'max:100']
        ]);

        $empleado = new Empleado();
        $empleado->empleado = $request->empleado;
        $empleado->save();

        Alert::success('Registrado', 'Empleado con éxito');
        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado = Empleado::find($id);

        return view('empleados.mostrar', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::find($id);

        return view('empleados.editar', ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validaciones = $request->validate([
            'empleado' => ['required', 'string', 'max:100']
        ]);

        $empleado = Empleado::find($id);
        $empleado->empleado = $request->empleado;
        $empleado->save();

        Alert::success('Actualizado', 'Empleado con éxito');
        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
