<x-app-layout>
    <x-slot:page>
        {{ __('Gestionar Empleados') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-slot:header>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 col-lg-9">
                            <x-text :value="__('Gestionar Empleados')" />
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <x-input-group>
                                <x-input type="text" id="searchertable" name="searcher" placeholder="Buscar" />
                                <x-slot:icon>
                                    <i class="fas fa-search text-primary"></i>
                                </x-slot:icon>
                            </x-input-group>
                        </div>
                    </div>
                </x-slot:header>

                <x-slot:body class="table-responsive p-0" style="height: 400px;">
                    <x-data-table :headers="['#', 'Empleado', 'otros', 'Acciones']">
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $empleado->nombres_completos }}</td>

                                {{--<td>
                                    @if ($empleado->contactoEmergencia->isEmpty())
                                        <span class="text-danger">No tiene contacto de emergencia</span>
                                    @else
                                        @foreach ($empleado->contactoEmergencia as $contacto)
                                            {{ $contacto->nombre_acudiente }}
                                        @endforeach
                                    @endif
                                </td>
                                 <td>
                                    @if ($empleado->cursoRealizado->isEmpty())
                                    <span class="text-danger">No tiene cursos realizados</span>
                                    @else
                                    @foreach ($empleado->cursoRealizado as $curso)
                                    {{ $curso->nombre_curso }} <br>
                                @endforeach
                                @endif
                                </td>
                                <td>
                                    @foreach ($empleado->historiaClinica as $historia)
                                    {{ $historia->enfermedades }}
                                    @if ($historia->enfermedades == null)
                                    <span class="text-danger">No tiene enfermedades</span>
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($empleado->historiaClinica as $historia)
                                    {{ $historia->alergias }}
                                    @if ($historia->alergias == null)
                                    <span class="text-danger">No tiene alergias</span>
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $empleado->fondoPension->fondo_pension }}</td>
                                <td>{{ $empleado->tipoContrato->tipo_contrato }}</td>
                                <td>{{ $empleado->arl->nombre_arl }}</td>
                                <td>{{ $empleado->nivelEducativo->nivel_educativo }}</td>
                                <td>{{ $empleado->fondoCesantia->fondo_cesantia }}</td>
                                <td>{{ $empleado->eps->nombre_eps }}</td>
                                <td>{{ $empleado->tipoDocumento->tipo_documento }}</td>
                                <td>{{ $empleado->municipio->municipio }}</td>
                                <td>{{ $empleado->municipio->departamento->departamento }}</td>
                                <td>{{ $empleado->cargoEmpleado->cargo_empleado }}</td> --}}
                                <td class="text-center">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-2">
                                            <a href="{{ route('empleados.show', $empleado->id_empleado) }}">
                                                <i class="far fa-eye" data-toggle="tooltip"
                                                    title="Detalles Empleado"></i>
                                            </a>
                                        </div>

                                        <div class="col-2">
                                            <a href="{{ route('empleados.edit', $empleado->id_empleado) }}"
                                                class="text-success">
                                                <i class="far fa-edit" data-toggle="tooltip"
                                                    title="Actualizar Empleado"></i>
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <form method="POST"
                                                action="{{ route('empleados.destroy', $empleado->id_empleado) }}">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn p-0">
                                                    <i class="far fa-trash-alt text-danger" data-toggle="tooltip"
                                                        title="Eliminar Perfil"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-data-table>
                </x-slot:body>

                <x-slot:footer>
                    {{-- <div class="float-right">
                            {{ $empleados->links() }}
            </div> --}}
                </x-slot:footer>
            </x-card>
        </div>
    </div>
</x-app-layout>
<x-message-confirm text="Desea eliminar el empleado" />
