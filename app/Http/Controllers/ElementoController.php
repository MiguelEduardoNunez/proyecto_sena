<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Models\Item;
use App\Models\Proyecto;
use App\Models\Stand;
use App\Models\TipoNovedad;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elemento = Elemento::all();

        return view('elementos.listar', ['elementos' => $elemento]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyectos = Proyecto::all();
        $stands = Stand::all();
        $items = Item::all();

        return view('elementos.crear', ['proyectos' => $proyectos, 'stands'=>$stands, 'items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'proyecto_id' => ['required', 'numeric'],
            'stand_id' => ['required', 'numeric'],
            'item_id' => ['required', 'numeric'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'serial' => ['required','string', 'max:50'],
            'span' => ['required', 'string', 'max:50'],
            'codigo_barras' => ['required', 'string', 'max:100'],
            'grosor' => ['required', 'string', 'max:50'],
            'peso' => ['required', 'string', 'max:30'],
            'cantidad' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric'],
            
        ]);

        $elemento = new Elemento();
        $elemento -> proyecto_id = $request -> proyecto_id;
        $elemento -> stand_id = $request -> stand_id;
        $elemento -> item_id = $request -> item_id;
        $elemento -> marca = $request -> marca;
        $elemento -> modelo = $request -> modelo;
        $elemento -> serial = $request -> serial;
        $elemento -> span = $request -> span;
        $elemento -> codigo_barras = $request -> codigo_barras;
        $elemento -> grosor = $request -> grosor;
        $elemento -> peso = $request -> peso;
        $elemento -> cantidad = $request -> cantidad;
        $elemento -> cantidad_minima = $request -> cantidad_minima;
        $elemento -> save();

        Alert::success('Registrado', 'Elemento con éxito');

        return redirect(route('elementos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $elemento = Elemento::find($id);
        $tipo_novedad = TipoNovedad::find($id);
        $stand = Stand::find($id);

        return view('elementos.mostrar', ['elemento'=>$elemento, 'stand'=>$stand, 'tipo_novedad'=>$tipo_novedad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     $elemento = Elemento::find($id);
     $proyectos = Proyecto::all();
     $stands = Stand::all();
     $items = Item::all();

    
      return view('elementos.editar', ['elemento'=> $elemento, 'proyectos'=>$proyectos, 'stands'=>$stands, 'items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validaciones = $request->validate([
            'proyecto_id' => ['required', 'numeric'],
            'stand_id' => ['required', 'numeric'],
            'item_id' => ['required', 'numeric'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'serial' => ['required','string', 'max:50'],
            'span' => ['required', 'string', 'max:50'],
            'codigo_barras' => ['required', 'string', 'max:100'],
            'grosor' => ['required', 'string', 'max:50'],
            'peso' => ['required', 'string', 'max:30'],
            'cantidad' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric'],
            
        ]);

        $elemento = Elemento::find($id);
        $elemento->proyecto_id = $request->proyecto_id;
        $elemento->stand_id = $request->stand_id;
        $elemento->item_id = $request->item_id;
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

        return redirect(route('elementos.index'));
    }


    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
 
    }
}
