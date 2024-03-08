<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        return view('items.listar', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategorias = Subcategoria::all();
        return view('items.crear', ['subcategorias'=>$subcategorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'subcategoria_id' => ['required', 'numeric'],
            'item' => ['required', 'string', 'max:100'],
            'descripcion' => ['required', 'string'],
            
        ]);

        $item = new Item();
        $item->subcategoria_id = $request->subcategoria_id;
        $item->item = $request->item;
        $item->descripcion = $request->descripcion;
        $item->save();

        Alert::success('Registrado', 'Item con éxito');
        return redirect(route('items.index'));
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
