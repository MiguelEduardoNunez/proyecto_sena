<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.listar', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perfiles = Perfil::all();

        return view('usuarios.crear', ['perfiles' => $perfiles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'perfil_id' => ['required', 'numeric'],
            'identificacion' => ['required', 'max:10'],
            'nombres' => ['required', 'string', 'max:100'],
            'telefono' => ['nullable', 'max:10'],
            'email' => ['required', 'email', 'max:50'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $usuario = new Usuario();
        $usuario->perfil_id = $request->perfil_id;
        $usuario->identificacion = $request->identificacion;
        $usuario->nombres = $request->nombres;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();

        Alert::success('Registrado', 'Usuario con éxito');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);

        return view('usuarios.mostrar', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::find($id);

        $perfiles = Perfil::all();

        return view('usuarios.editar', ['usuario' => $usuario, 'perfiles' => $perfiles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validaciones = $request->validate([
            'perfil_id' => ['required', 'numeric'],
            'identificacion' => ['required', 'max:10'],
            'nombres' => ['required', 'string', 'max:100'],
            'telefono' => ['nullable', 'max:10'],
            'email' => ['required', 'email', 'max:50'],
            // 'password' => ['required', 'string', 'max:255'],
        ]);

        $usuario = Usuario::find($id);
        $usuario->perfil_id = $request->perfil_id;
        $usuario->identificacion = $request->identificacion;
        $usuario->nombres = $request->nombres;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->save();

        Alert::success('Actualizado', 'Usuario con éxito');

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuario::find($id)->delete();
        
        return redirect(route('usuarios.index'));
    }
}
