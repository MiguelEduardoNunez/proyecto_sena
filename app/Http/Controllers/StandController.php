<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Stand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StandController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stands=Stand::all();
        return view('stands.listar',['stands'=>$stands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stands = Stand::all();

        return view('stands.crear', ['stands' => $stands]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'stand' => ['required', 'string', 'max:60'],
            'ubicacion' => ['required', 'string', 'max:80']
        ]);
        $stand = new Stand();
        $stand->stand = $request->stand;
        $stand->ubicacion = $request->ubicacion;
        $stand->save();
        
        Alert::success('Registrado', 'Stand con éxito');
        return redirect(route('stand.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stand= Stand::find($id);
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
            $validated = $request->validate([
                'stand' => ['required', 'string', 'max:60'],
                'ubicacion' =>['required', 'string', 'max:80']
            ]);
            $stand = Stand::find($id);
            $stand->stand = $request->stand;
            $stand->ubicacion = $request->ubicacion;
            $stand->save();

            Alert::success('Actualizado', 'Stand con éxito');

            $stands=Stand::all();
            return view('stands.listar',['stands'=>$stands]);

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}  