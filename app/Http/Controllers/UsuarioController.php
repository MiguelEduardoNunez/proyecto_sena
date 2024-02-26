<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'perfil_id' => 'required|numeric',
            'identificacion' => 'required|max:15',
            'nombres' => 'required|string|max:100',
            'telefono' => 'nullable|max:10',
            'correo' => 'required|string|max:50',
            'password' => 'required',
            'estado' => 'required|boolean'
        ]);

        $usuario = new User();
        $usuario->perfil_id = $request->perfil_id;
        $usuario->identificacion = $request->identificacion;
        $usuario->nombres = $request->nombres;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->password = $request->password;
        $usuario->estado = $request->estado;
        $usuario->save();

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
