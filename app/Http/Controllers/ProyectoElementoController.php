<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Elemento;
use App\Models\Item;
use App\Models\Proyecto;
use App\Models\Stand;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProyectoElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id_proyecto)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $elementos = Elemento::with('item')
            ->orderBy('marca', 'asc')
            ->paginate(100);

        return view('elementos.listar', ['proyecto' => $proyecto, 'elementos' => $elementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_proyecto)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $stands = Stand::orderBy('stand', 'asc')->get();

        $categorias = Categoria::orderBy('categoria', 'asc')->get();

        $subcategorias = Subcategoria::orderBy('subcategoria', 'asc')->get();

        $items = Item::orderBy('item', 'asc')->get();

        return view('elementos.crear', [
            'proyecto' => $proyecto, 'stands' => $stands, 'categorias' => $categorias, 
            'subcategorias' => $subcategorias, 'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id_proyecto)
    {
        $validaciones = $request->validate([
            'stand' => ['required', 'numeric'],
            'item' => ['required', 'numeric'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'serial' => ['required', 'string', 'max:50'],
            'span' => ['required', 'string', 'max:50'],
            'codigo_barras' => ['required', 'string', 'max:100'],
            'grosor' => ['required', 'string', 'max:50'],
            'peso' => ['required', 'string', 'max:30'],
            'cantidad' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric']
        ]);

        $elemento = new Elemento();
        $elemento->proyecto_id = $id_proyecto;
        $elemento->stand_id = $request->stand;
        $elemento->item_id = $request->item;
        $elemento->marca = $request->marca;
        $elemento->modelo = $request->modelo;
        $elemento->serial = $request->serial;
        $elemento->span = $request->span;
        $elemento->codigo_barras = $request->codigo_barras;
        $elemento->grosor = $request->grosor;
        $elemento->peso = $request->peso;
        $elemento->cantidad = $request->cantidad;
        $elemento->cantidad_minima = $request->cantidad_minima;
        $elemento->save();

        Alert::success('Registrado', 'Elemento con éxito');
        return redirect(route('proyectos.elementos.index', $id_proyecto));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_proyecto, string $id_elemento)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $elemento = Elemento::find($id_elemento);

        return view('elementos.mostrar', ['proyecto' => $proyecto, 'elemento' => $elemento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_proyecto, string $id_elemento)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $elemento = Elemento::find($id_elemento);

        $stands = Stand::where('id_stand', '!=', $elemento->stand_id)
            ->orderBy('stand', 'asc')
            ->get();

        $categorias = Categoria::where('id_categoria', '!=', $elemento->item->subcategoria->categoria->id_categoria)
            ->orderBy('categoria', 'asc')
            ->get();

        $subcategorias = Subcategoria::where('id_subcategoria', '!=', $elemento->item->subcategoria->id_subcategoria)
            ->orderBy('subcategoria', 'asc')
            ->get();

        $items = Item::where('id_item', '!=', $elemento->item->id_item)
            ->orderBy('item', 'asc')
            ->get();

        return view('elementos.editar', [
            'proyecto' => $proyecto, 'elemento' => $elemento, 'stands' => $stands, 'categorias' => $categorias, 
            'subcategorias' => $subcategorias, 'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_proyecto, string $id_elemento)
    {
        $validaciones = $request->validate([
            'stand' => ['required', 'numeric'],
            'item' => ['required', 'numeric'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'serial' => ['required', 'string', 'max:50'],
            'span' => ['required', 'string', 'max:50'],
            'codigo_barras' => ['required', 'string', 'max:100'],
            'grosor' => ['required', 'string', 'max:50'],
            'peso' => ['required', 'string', 'max:30'],
            'cantidad' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric']
        ]);

        $elemento = Elemento::find($id_elemento);
        $elemento->proyecto_id = $id_proyecto;
        $elemento->stand_id = $request->stand;
        $elemento->item_id = $request->item;
        $elemento->marca = $request->marca;
        $elemento->modelo = $request->modelo;
        $elemento->serial = $request->serial;
        $elemento->span = $request->span;
        $elemento->codigo_barras = $request->codigo_barras;
        $elemento->grosor = $request->grosor;
        $elemento->peso = $request->peso;
        $elemento->cantidad = $request->cantidad;
        $elemento->cantidad_minima = $request->cantidad_minima;
        $elemento->save();

        Alert::success('Actualizado', 'Elemento con éxito');
        return redirect(route('proyectos.elementos.index', $id_proyecto));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_proyecto, string $id_elemento)
    {
        //
    }
}
