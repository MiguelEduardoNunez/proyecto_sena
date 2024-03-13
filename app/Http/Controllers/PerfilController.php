<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfiles = Perfil::all();

        return view('perfiles.listar', ['perfiles' => $perfiles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perfiles.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perfil = Perfil::find($id);

        return view('perfiles.mostrar', ['perfil' => $perfil]);
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


    /**
     * Show the form for creating a new resource.
     */
    public function createPermiso()
    {
        $modulos = Modulo::orderBy('orden', 'asc')->get();

        $modulosAgrupados = array();

        foreach ($modulos as $moduloPadre) {
            foreach ($moduloPadre->moduloHijo as $item) {
                $item->moduloHijo;
            }
            
            if ($moduloPadre->modulo_id == null) {
                $modulosAgrupados[] = $moduloPadre;
            }
        }

        return view('perfiles.permiso', ['modulos' => $modulosAgrupados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePermiso(Request $request)
    {
        //
    }
}
