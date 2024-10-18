<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\DetalleEntregaElemento;
use App\Models\DevolucionElemento;
use App\Models\Elemento;
use App\Models\Empleado;
use App\Models\EntregaElemento;
use App\Models\Proyecto;
use App\Models\Subcategoria;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProyectoEntregaElementoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id_proyecto)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $entregas_elementos = EntregaElemento::with('empleado')
            ->where('proyecto_id', '=', $id_proyecto)
            ->orderBy('fecha_entrega', 'desc')
            ->paginate(100);

        return view('entregas_elementos.listar', ['proyecto' => $proyecto, 'entregas_elementos' => $entregas_elementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_proyecto)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $empleados = Empleado::orderBy('empleado', 'asc')->get();

        $categorias = Categoria::orderBy('categoria', 'asc')->get();

        $subcategorias = Subcategoria::orderBy('subcategoria', 'asc')->get();

        $elementos = Elemento::with(['item', 'tipoCantidad'])
            ->where('proyecto_id', '=', $id_proyecto)
            ->orderBy('marca', 'asc')
            ->get();
        
        return view('entregas_elementos.crear', ['proyecto' => $proyecto, 'empleados' => $empleados, 'categorias' => $categorias,
            'subcategorias' => $subcategorias, 'elementos' => $elementos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id_proyecto)
    {
        $validaciones = $request->validate([
            'empleado' => ['required', 'numeric'],
            'fecha_entrega' => ['required', 'date'],
            // , 'after_or_equal:today'
        ], [
            'fecha_entrega.after_or_equal' => 'La fecha de entrega debe ser una fecha posterior o igual a la fecha actual.',
        ]);

        $entrega_elemento = new EntregaElemento();
        $entrega_elemento->proyecto_id = $id_proyecto;
        $entrega_elemento->empleado_id = $request->empleado;
        $entrega_elemento->fecha_entrega = $request->fecha_entrega;
        $entrega_elemento->save();

        $entrega_elemento_registrada = EntregaElemento::get()->last();

        $elementos = $request->elementos;
        $cantidades = $request->cantidades;

        $elementos_entrega = array_map(function(int $elemento, int $cantidad): array {
            return ["elemento" => $elemento, "cantidad" => $cantidad];
        }, $elementos, $cantidades);

        foreach ($elementos_entrega as $elemento_entrega) {
            $detalle_entrega_elemento = new DetalleEntregaElemento();
            $detalle_entrega_elemento->entrega_elemento_id = $entrega_elemento_registrada->id_entrega_elemento;
            $detalle_entrega_elemento->elemento_id = $elemento_entrega['elemento'];
            $detalle_entrega_elemento->cantidad = $elemento_entrega['cantidad'];
            $detalle_entrega_elemento->save();

            $elemento = Elemento::find($elemento_entrega['elemento']);
            $elemento->cantidad = $elemento->cantidad-$elemento_entrega['cantidad'];
            $elemento->save();
        }

        Alert::success('Registrada', 'Entrega de elementos con éxito');
        return redirect()->route('proyectos.entregas-elementos.index', $id_proyecto);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_proyecto, string $id_entrega_elemento)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $entrega_elemento = EntregaElemento::find($id_entrega_elemento);

        $detalle_entrega_elementos = DetalleEntregaElemento::with(['elemento' => ['stand', 'item', 'tipoCantidad']])
            ->where('entrega_elemento_id', '=', $id_entrega_elemento)
            ->get();

        return view('entregas_elementos.mostrar', ['proyecto' => $proyecto, 'entrega_elemento' => $entrega_elemento, 'detalle_entrega_elementos' => $detalle_entrega_elementos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_proyecto,string $id_entrega_elemento)
    {
        //

        $entrega_elemento = EntregaElemento::find($id_entrega_elemento);

        $proyecto = Proyecto::find($id_proyecto);

        $detalle_entrega_elementos = DetalleEntregaElemento::with(['elemento' => ['item', 'tipoCantidad']])
            ->where('entrega_elemento_id', '=', $id_entrega_elemento)
            ->get();

        return view('entregas_elementos.editar', ['proyecto' => $proyecto, 'entrega_elemento' => $entrega_elemento, 'detalle_entrega_elementos' => $detalle_entrega_elementos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_proyecto, string $id_entrega_elemento)
    {
        $proyecto = Proyecto::find($id_proyecto);

        if (!$proyecto) {
            Alert::error('Error', 'Proyecto no encontrado');
            return back()->withInput();
        }

        $empleado = $request->input('empleado');
        $fechaEntrega = $request->input('fecha_entrega');
        $elementosSeleccionados = $request->input('elementos_seleccionados');
        $cantidades = $request->input('cantidades');
        $cantidadesEntregadas = $request->input('cantidad_entregada');
        
        $entrega_elemento = EntregaElemento::where('id_entrega_elemento', $id_entrega_elemento)->where('proyecto_id', $id_proyecto)->first();

        if (!$entrega_elemento) {
            Alert::error('Error', 'Entrega de elemento no encontrada o no pertenece al proyecto especificado');
            return back()->withInput();
        }

        $detalle_entrega_elementos = DetalleEntregaElemento::where('entrega_elemento_id', $id_entrega_elemento)->get();
        foreach ($detalle_entrega_elementos as $detalle) {
            // Verifica si el usuario ha modificado la cantidad entregada para este detalle específico
            if (isset($cantidadesEntregadas[$detalle->id_detalle_entrega_elemento])) {
                $nuevaCantidadEntregada = $cantidadesEntregadas[$detalle->id_detalle_entrega_elemento];
                $cantidadAnterior = $detalle->cantidad;
    
                if ($nuevaCantidadEntregada != $cantidadAnterior) {
                    
                    if ($nuevaCantidadEntregada < $detalle->cantidad_devolucionada) {
                        Alert::error('Error', 'La cantidad entregada no puede ser menor que la cantidad devuelta');
                        return back()->withInput();
                    }
    
                    $diferencia = $nuevaCantidadEntregada - $cantidadAnterior;
    
                    $detalle->update([
                        'cantidad' => $nuevaCantidadEntregada,
                        'actualizado_en' => now(),
                    ]);
    
                    $elemento = Elemento::where('id_elemento', $detalle->elemento_id)
                        ->where('proyecto_id', $id_proyecto)
                        ->first();
    
                    if ($elemento) {
                        $elemento->cantidad -= $diferencia;
                        $elemento->save();
                    }
                }
            }
        }
        
        if ($elementosSeleccionados === null) {
            $elementosSeleccionados = $detalle_entrega_elementos->pluck('elemento_id')->toArray();
        }
        foreach ($elementosSeleccionados as $key => $elementoSeleccionado) {
            if (!isset($cantidades[$key])) {
                $cantidades[$key] = $detalle_entrega_elementos->where('elemento_id', $elementoSeleccionado)->first()->cantidad_devolucionada;
            }
            $cantidadDevolver = $cantidades[$key];

            $detalle = $detalle_entrega_elementos->firstWhere(function ($detalle) use ($elementoSeleccionado) {
                return $detalle->elemento_id == $elementoSeleccionado;
            });

            if (!$detalle) {
                Alert::error('Error', 'Detalle de entrega de elemento no encontrado');
                return back()->withInput();
            }

            if ($cantidadDevolver > $detalle->cantidad) {
                Alert::error('Error', 'La cantidad a devolver es mayor a la cantidad entregada');
                return back()->withInput();
            }

            $detalle->update([
                'cantidad_devolucionada' => $cantidadDevolver,
                'actualizado_en' => now(),
            ]);

            $elemento = Elemento::where('id_elemento', $elementoSeleccionado)->where('proyecto_id', $id_proyecto)->first();

            if ($elemento) {
                $elemento->cantidad += $cantidadDevolver;
                $elemento->save();
            }
        }

        Alert::success('Actualizada', 'Entrega de elementos actualizada con éxito');
        return redirect()->route('proyectos.entregas-elementos.index', $id_proyecto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_proyecto, string $id_entrega_elemento)
    {
        $detalle_entrega_elementos = DetalleEntregaElemento::where('entrega_elemento_id', '=', $id_entrega_elemento)->get();

        foreach ($detalle_entrega_elementos as $detalle_entrega_elemento) {
            $elemento = Elemento::find($detalle_entrega_elemento->elemento_id);
            $elemento->cantidad = $elemento->cantidad+$detalle_entrega_elemento->cantidad;
            $elemento->save();
        }

        $detalle_entrega_elemento->delete();
        EntregaElemento::find($id_entrega_elemento)->delete();

        Alert::success('Eliminada', 'Entrega de elementos con éxito');
        return redirect()->route('proyectos.entregas-elementos.index', $id_proyecto);
    }

    /**
     * Download the specified resource from storage.
     */
    public function reporte(string $id_proyecto, string $id_entrega_elemento)
    {
        $proyecto = Proyecto::find($id_proyecto);

        $entrega_elemento = EntregaElemento::find($id_entrega_elemento);

        $detalle_entrega_elementos = DetalleEntregaElemento::with(['elemento' => ['item', 'tipoCantidad']])
            ->where('entrega_elemento_id', '=', $id_entrega_elemento)
            ->get();

        $reporte = Pdf::loadView('entregas_elementos.reporte', [
            'proyecto' => $proyecto, 'entrega_elemento' => $entrega_elemento, 'detalle_entrega_elementos' => $detalle_entrega_elementos
        ]);

        return $reporte->stream('Entrega-Elementos-'.$proyecto->proyecto.'.pdf');
    }


    public function reporteDevolucion(string $id_proyecto, string $id_entrega_elemento)
    {
        $proyecto = Proyecto::find($id_proyecto);
        $entrega_elemento = EntregaElemento::find($id_entrega_elemento);

        $detalle_entrega_elementos = DetalleEntregaElemento::with('elemento')->where('entrega_elemento_id', $id_entrega_elemento)->get();

        foreach ($detalle_entrega_elementos as $detalle_entrega_elemento) {
            $elemento = $detalle_entrega_elemento->elemento;

            // Cantidad devuelta
            $cantidadDevuelta = $detalle_entrega_elemento->cantidad_devolucionada;

            if ($cantidadDevuelta > 0) {
                $elemento->cantidad += $cantidadDevuelta;
                $elemento->save();
            }
        }

        //dd($proyecto, $entrega_elemento, $detalle_entrega_elementos);
        // Generar el reporte PDF
        $reporte = Pdf::loadView('entregas_elementos.reporte_devolucion', [
            'proyecto' => $proyecto,
            'entrega_elemento' => $entrega_elemento,
            'detalle_entrega_elementos' => $detalle_entrega_elementos,
        ]);

        return $reporte->stream('Devolucion-Elementos-' . $proyecto->proyecto . '.pdf');
    }
}
