<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Elemento;
use App\Models\Item;
use App\Models\Proyecto;
use App\Models\Stand;
use App\Models\Subcategoria;
use App\Models\TipoCantidad;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Dompdf;
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

        $elementos = Elemento::with(['item', 'tipoCantidad'])
            ->where('proyecto_id', '=', $id_proyecto)
            ->orderBy('modelo', 'asc')
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

        $tipos_cantidad = TipoCantidad::orderBy('tipo_cantidad', 'asc')->get();

        return view('elementos.crear', [
            'proyecto' => $proyecto, 'stands' => $stands, 'categorias' => $categorias, 'subcategorias' => $subcategorias, 
            'items' => $items, 'tipos_cantidad' => $tipos_cantidad
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id_proyecto)
    {
        $validaciones = $request->validate([
            'stand' => ['required', 'numeric'],
            'elemento' => ['required', 'numeric'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'serial' => ['required', 'string', 'max:50'],
            'span' => ['required', 'string', 'max:50'],
            'codigo_barras' => ['required', 'string', 'max:100'],
            'grosor' => ['required', 'string', 'max:50'],
            'peso' => ['required', 'string', 'max:30'],
            'tipo_cantidad' => ['required', 'numeric'],
            'cantidad' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric']
        ]);

        $elemento_registrado = Elemento::where('item_id', '=', $request->elemento)
            ->where('marca', '=', $request->marca)
            ->where('modelo', '=', $request->modelo)
            ->first();
        
        if ($elemento_registrado == null) 
        {
            $elemento = new Elemento();
            $elemento->proyecto_id = $id_proyecto;
            $elemento->stand_id = $request->stand;
            $elemento->item_id = $request->elemento;
            $elemento->marca = $request->marca;
            $elemento->modelo = $request->modelo;
            $elemento->serial = $request->serial;
            $elemento->span = $request->span;
            $elemento->codigo_barras = $request->codigo_barras;
            $elemento->grosor = $request->grosor;
            $elemento->peso = $request->peso;
            $elemento->tipo_cantidad_id = $request->tipo_cantidad;
            $elemento->cantidad = $request->cantidad;
            $elemento->cantidad_minima = $request->cantidad_minima;
            $elemento->save();

            Alert::success('Registrado', 'Elemento con éxito');
            return redirect()->route('proyectos.elementos.index', $id_proyecto);
        }
        else 
        {
            Alert::error('Error', 'El elemento ya esta registrado, actualice su cantidad');
            return back()->withInput();
        }
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

        $items = Item::where('id_item', '!=', $elemento->item_id)
            ->orderBy('item', 'asc')
            ->get();

        $tipos_cantidad = TipoCantidad::where('id_tipo_cantidad', '!=', $elemento->tipo_cantidad_id)
            ->orderBy('tipo_cantidad', 'asc')
            ->get();

        return view('elementos.editar', [
            'proyecto' => $proyecto, 'elemento' => $elemento, 'stands' => $stands, 'categorias' => $categorias, 
            'subcategorias' => $subcategorias, 'items' => $items, 'tipos_cantidad' => $tipos_cantidad
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_proyecto, string $id_elemento)
    {
        $validaciones = $request->validate([
            'stand' => ['required', 'numeric'],
            'elemento' => ['required', 'numeric'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'serial' => ['required', 'string', 'max:50'],
            'span' => ['required', 'string', 'max:50'],
            'codigo_barras' => ['required', 'string', 'max:100'],
            'grosor' => ['required', 'string', 'max:50'],
            'peso' => ['required', 'string', 'max:30'],
            'tipo_cantidad' => ['required', 'numeric'],
            'cantidad' => ['required', 'numeric'],
            'cantidad_minima' => ['required', 'numeric']
        ]);

        $elemento_registrado = Elemento::where('id_elemento', '!=', $id_elemento)
            ->where('item_id', '=', $request->elemento)
            ->where('marca', '=', $request->marca)
            ->where('modelo', '=', $request->modelo)
            ->first();
        
        if ($elemento_registrado == null) 
        {
            $elemento = Elemento::find($id_elemento);
            $elemento->proyecto_id = $id_proyecto;
            $elemento->stand_id = $request->stand;
            $elemento->item_id = $request->elemento;
            $elemento->marca = $request->marca;
            $elemento->modelo = $request->modelo;
            $elemento->serial = $request->serial;
            $elemento->span = $request->span;
            $elemento->codigo_barras = $request->codigo_barras;
            $elemento->grosor = $request->grosor;
            $elemento->peso = $request->peso;
            $elemento->tipo_cantidad_id = $request->tipo_cantidad;
            $elemento->cantidad = $request->cantidad;
            $elemento->cantidad_minima = $request->cantidad_minima;
            $elemento->save();

            Alert::success('Actualizado', 'Elemento con éxito');
            return redirect()->route('proyectos.elementos.index', $id_proyecto);
        }
        else 
        {
            Alert::error('Error', 'El elemento ya esta registrado, actualice su cantidad');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_proyecto, string $id_elemento)
    {
        //
    }


    public function pdfElementos(string $id)
    {
        $proyecto = Proyecto::find($id);
        $elementos = Elemento::where('proyecto_id', $id)->get();
       
        

        $pdf = PDF::loadView('elementos.pdf', ['proyecto' => $proyecto, 'elementos' => $elementos]);
        return $pdf->download('elementos-'.$proyecto->proyecto.'.pdf');
    }

}
