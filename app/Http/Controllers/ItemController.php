<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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
        $items = Item::orderBy('item', 'asc')->paginate();

        return view('items.listar', ['items' => $items]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();

        return view('items.crear', ['categorias' => $categorias, 'subcategorias' => $subcategorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'subcategoria' => ['required', 'numeric',],
            'item' => ['required', 'string', 'max:100', 'unique:items,item'],
            'descripcion' => ['nullable', 'string']
        ]);

        $item = new Item();
        $item->subcategoria_id = $request->subcategoria;
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
        $item = Item::find($id);

        return view('items.mostrar', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        return view('items.editar', ['item'=>$item, 'subcategorias'=>$subcategorias, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validaciones = $request->validate([
            'subcategoria' => ['required', 'numeric'],
            'item' => ['required', 'string', 'max:100', 'unique:items,item'],
            'descripcion' => ['nullable', 'string']
        ]);

        $item = Item::find($id);
        $item->subcategoria_id = $request->subcategoria;
        $item->item = $request->item;
        $item->descripcion = $request->descripcion;
        $item->save();

        Alert::success('Registrado', 'Item con éxito');
        return redirect(route('items.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
