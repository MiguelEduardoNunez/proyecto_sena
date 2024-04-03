<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Elemento;
use App\Models\Item;
use App\Models\Stand;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProyectoElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $proyecto)
    {
        $elementos = Elemento::orderBy('marca', 'asc')->paginate(100);

        return view('elementos.listar', ['elementos' => $elementos, 'proyecto' => $proyecto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $proyecto)
    {
        $stands = Stand::orderBy('stand', 'asc')->get();

        $categorias = Categoria::orderBy('categoria', 'asc')->get();

        $subcategorias = Subcategoria::orderBy('subcategoria', 'asc')->get();

        $items = Item::orderBy('item', 'asc')->get();

        return view('elementos.crear', [
            'stands' => $stands, 'categorias' => $categorias, 'subcategorias' => $subcategorias, 
            'items' => $items, 'proyecto' => $proyecto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $proyecto)
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
        $elemento->proyecto_id = $proyecto;
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
        return redirect(route('proyectos.elementos.index', $proyecto));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $proyecto, string $elemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $proyecto, string $elemento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $proyecto, string $elemento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $proyecto, string $elemento)
    {
        //
    }
}
