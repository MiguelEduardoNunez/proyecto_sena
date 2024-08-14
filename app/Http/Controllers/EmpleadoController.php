<?php

namespace App\Http\Controllers;

use App\Models\Arl;
use App\Models\CargoEmpleado;
use App\Models\Departamento;
use App\Models\DocumentoIdentidad;
use App\Models\Empleado;
use App\Models\EntregaElemento;
use App\Models\Eps;
use App\Models\FondoCesantia;
use App\Models\FondoPension;
use App\Models\HistoriaClinica;
use App\Models\Municipio;
use App\Models\NivelEducativo;
use App\Models\Novedad;
use App\Models\TipoContrato;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar todos los empleados con sus historias clínicas
        $empleados = Empleado::with(['municipio', 'municipio.departamento', 'cargoEmpleado', 'nivelEducativo',
            'fondoCesantia', 'fondoPension', 'eps', 'arl', 'tipoContrato', 'tipoDocumento', 'historiaClinica',
            'cursoRealizado', 'contactoEmergencia'])->get();
           
        return view('empleados.listar', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_documentos = TipoDocumento::all();
        $niveles_educativos = NivelEducativo::all();
        $tipos_contratos = TipoContrato::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $tipos_sangre = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $cargos_empleados = CargoEmpleado::all();
        $niveles_educativos = NivelEducativo::all();
        $arls = Arl::all();
        $fondos_pensiones = FondoPension::all();
        $fondos_cesantias = FondoCesantia::all();
    
        return view('empleados.crear', ['tipos_documentos' => $tipos_documentos, 'niveles_educativos' => $niveles_educativos, 'tipos_contratos' => $tipos_contratos, 'departamentos' => $departamentos, 'municipios' => $municipios, 'tipos_sangre' => $tipos_sangre,
            'cargos_empleados' => $cargos_empleados, 'niveles_educativos' => $niveles_educativos, 'arls' => $arls, 'fondos_pensiones' => $fondos_pensiones, 'fondos_cesantias' => $fondos_cesantias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'nombres_completos' => ['required', 'string', 'max:100', 'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
            'apellidos_completos' => ['required', 'string', 'max:100', 'regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/'],
            'tipo_documento_id' => ['required', 'numeric'],
            'documento' => ['required', 'numeric', 'digits_between:6,10'],
        ]);

        $empleado = new Empleado();
        $empleado->empleado = $request->empleado;
        $empleado->save();

        Alert::success('Registrado', 'Empleado con éxito');
        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empleado = Empleado::find($id);

        return view('empleados.mostrar', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::find($id);

        return view('empleados.editar', ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validaciones = $request->validate([
            'empleado' => ['required', 'string', 'max:100']
        ]);

        $empleado = Empleado::find($id);
        $empleado->empleado = $request->empleado;
        $empleado->save();

        Alert::success('Actualizado', 'Empleado con éxito');
        return redirect(route('empleados.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $entrega_elemento = EntregaElemento::where('empleado_id', '=', $id)->first();
        $novedad = Novedad::where('empleado_id', '=', $id)->first();

        if ($entrega_elemento != null or $novedad != null) {
            Alert::error('Error', 'el empleado tiene registros asociados');
        } else {
        Empleado::find($id)->delete();
        Alert::success('Eliminado', 'Empleado con exito');
        }
        return redirect(route('empleados.index'));
    }
}
