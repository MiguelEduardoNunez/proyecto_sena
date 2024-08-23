<?php

namespace App\Http\Controllers;

use App\Models\Arl;
use App\Models\CargoEmpleado;
use App\Models\ContactoEmergencia;
use App\Models\CursoRealizado;
use App\Models\Departamento;
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
        $eps = Eps::all();
        $fondos_pensiones = FondoPension::all();
        $fondos_cesantias = FondoCesantia::all();
    
        return view('empleados.crear', ['tipos_documentos' => $tipos_documentos, 'niveles_educativos' => $niveles_educativos, 'tipos_contratos' => $tipos_contratos, 'departamentos' => $departamentos, 'municipios' => $municipios, 'tipos_sangre' => $tipos_sangre,
            'cargos_empleados' => $cargos_empleados, 'niveles_educativos' => $niveles_educativos, 'arls' => $arls, 'fondos_pensiones' => $fondos_pensiones, 'fondos_cesantias' => $fondos_cesantias, 'eps' => $eps]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaciones = $request->validate([
            'nombres_completos' => ['required', 'string', 'max:100'],
            'apellidos_completos' => ['required', 'string', 'max:100'],
            'tipo_documento' => ['required', 'exists:tipos_documentos,id_tipo_documento'],
            'documento' => ['required', 'string', 'max:20', 'unique:empleados,documento'],
            'departamento' => ['required', 'exists:departamentos,id_departamento'],
            'municipio' => ['required', 'exists:municipios,id_municipio'],
            'fecha_expedicion' => ['required', 'date'],
            'tipo_sangre' => ['required', 'string', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'alergias' => ['nullable', 'string', 'max:255'], // tabla historia_clinica
            'enfermedades' => ['nullable', 'string', 'max:255'], // tabla historia_clinica
            'fecha_nacimiento' => ['required', 'date'],
            'edad' => ['required', 'integer', 'min:0', 'max:100'],
            'telefono' => ['required', 'string', 'max:10'],
            'email' => ['required', 'email', 'max:255', 'unique:empleados,email'],
            'direccion' => ['required', 'string', 'max:255'],
            'estrato' => ['required', 'integer', 'min:1', 'max:6'],
            'cargo_empleado' => ['required', 'exists:cargos_empleados,id_cargo_empleado'], // tabla cargo_empleado
            'fecha_inicio_contrato' => ['required', 'date'],
            'tipo_contrato' => ['required', 'exists:tipos_contratos,id_tipo_contrato'], // tabla tipo_contrato
            'nivel_educativo' => ['required', 'exists:niveles_educativos,id_nivel_educativo'], // tabla nivel_educativo
            'arl' => ['required', 'exists:arl,id_arl'],
            'arl_pdf' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'nivel_riesgo' => ['required', 'integer', 'min:1', 'max:5'],
            'eps' => ['required', 'string', 'max:100'],
            'eps_pdf' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'fondo_cesatia_id' => ['required', 'exists:fondos_cesantias,id_fondo_cesantia'],
            'fondo_pension_id' => ['required', 'exists:fondos_pensiones,id_fondo_pension'],
            'nombre_acudiente' => ['nullable', 'string', 'max:100'], // tabla contacto_emergencia
            'parentesco_acudiente' => ['nullable', 'string', 'max:100'], // tabla contacto_emergencia
            'telefono_acudiente' => ['nullable', 'string', 'max:10'], // tabla contacto_emergencia
        ]);
        
        $empleado = new Empleado();
        $empleado->nombres_completos = $request->nombres_completos;
        $empleado->apellidos_completos = $request->apellidos_completos;
        $empleado->tipo_documento_id = $request->tipo_documento;
        $empleado->documento = $request->documento;
        $empleado->lugar_expedicion_id  = $request->municipio;
        $empleado->fecha_expedicion = $request->fecha_expedicion;
        $empleado->tipo_sangre = $request->tipo_sangre;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->edad = $request->edad;
        $empleado->telefono = $request->telefono;
        $empleado->email = $request->email;
        $empleado->direccion = $request->direccion;
        $empleado->estrato = $request->estrato;
        $empleado->cargo_empleado_id = $request->cargo_empleado;
        $empleado->fecha_inicio_contrato = $request->fecha_inicio_contrato;
        $empleado->fecha_periodo_prueba = $request->fecha_periodo_prueba;
        $empleado->fecha_fin_contrato = $request->fecha_fin_contrato;
        $empleado->tipo_contrato_id = $request->tipo_contrato;
        $empleado->nivel_educativo_id = $request->nivel_educativo;
        $empleado->arl_id = $request->arl;
        $empleado->arl_pdf = $request->arl_pdf;
        $empleado->nivel_riesgo = $request->nivel_riesgo;
        $empleado->eps_id = $request->eps;
        $empleado->eps_pdf = $request->eps_pdf;
        $empleado->estado = $request->estado;
        $empleado->fondo_pension_id = $request->fondo_pension;
        $empleado->fondo_cesantia_id = $request->fondo_cesantia;
        $empleado->save();
        

        if ($request->hasFile('arl_pdf')) {
            $empleado->arl_pdf = $request->file('arl_pdf')->store('public/arl');
            $empleado->save();
        }
        if ($request->hasFile('eps_pdf')) {
            $empleado->eps_pdf = $request->file('eps_pdf')->store('public/eps');
            $empleado->save();
        }
       

        $historia_clinica = new HistoriaClinica();
        $historia_clinica->empleado_id = $empleado->id_empleado;
        $historia_clinica->alergias = $request->alergias;
        $historia_clinica->enfermedades = $request->enfermedades;
        $historia_clinica->save();

        $contacto_emergencia = new ContactoEmergencia();
        $contacto_emergencia->empleado_id = $empleado->id_empleado;
        $contacto_emergencia->nombre_acudiente = $request->nombre_acudiente;
        $contacto_emergencia->parentesco_acudiente = $request->parentesco;
        $contacto_emergencia->telefono_acudiente = $request->numero;
        $contacto_emergencia->save();

        $curso_realizado = new CursoRealizado();
        $curso_realizado->empleado_id = $empleado->id_empleado;
        $curso_realizado->nombre_curso = $request->nombre_curso;
        $curso_realizado->certificado_estudio = $request->certificado_curso_pdf;
        $curso_realizado->save();
     

        Alert::success('Registrado', 'Empleado con éxito');
        return redirect(route('empleados.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_empleado)
    {
        $empleado = Empleado::find($id_empleado);
        $historia_clinica = HistoriaClinica::where('empleado_id', '=', $id_empleado)->first();
    
        return view('empleados.mostrar', ['empleado' => $empleado, 'historia_clinica' => $historia_clinica]);
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
