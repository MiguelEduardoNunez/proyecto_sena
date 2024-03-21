<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Stand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stands = Stand::orderBy('stand', 'asc')->paginate(3);

        return view('stands.listar', ['stands' => $stands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stands.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'stand' => ['required', 'string', 'max:100', 'unique:stands,stand'],
            'ubicacion' => ['required', 'string', 'max:100']
        ]);

        $stand = new Stand();
        $stand->stand = $request->stand;
        $stand->ubicacion = $request->ubicacion;
        $stand->save();

        Alert::success('Registrado', 'Stand con éxito');

        return redirect(route('stands.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stand = Stand::find($id);

        return view('stands.mostrar', ['stand' => $stand]);
    }

    /**
     * show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stand = Stand::find($id);

        return view('stands.editar', ['stand' => $stand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validaciones = $request->validate([
            'stand' => ['required', 'string', 'max:100', Rule::unique('stands')->ignore($id, 'id_stand')],
            'ubicacion' => ['required', 'string', 'max:100']
        ]);

        $stand = Stand::find($id);
        $stand->stand = $request->stand;
        $stand->ubicacion = $request->ubicacion;
        $stand->save();
        
        Alert::success('Actualizado', 'Stand con éxito');

        return redirect(route('stands.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}  