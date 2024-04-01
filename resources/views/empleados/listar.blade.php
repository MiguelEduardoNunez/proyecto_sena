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
                    <x-data-table :headers="['#', 'Empleado','Acciones']">
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $empleado->empleado}}</td>
                                
                                <td class="text-center">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-2">
                                            <a href="{{ route('empleados.show', $empleado->id_empleado) }}">
                                                <i class="far fa-eye" data-toggle="tooltip" title="Detalles Empleado"></i>
                                            </a>
                                        </div>

                                        <div class="col-2">
                                            <a href="{{ route('empleados.edit', $empleado->id_empleado) }}">
                                                <i class="far fa-edit text-success" data-toggle="tooltip" title="Actualizar Empleado"></i>
                                            </a>
                                        </div>
                                        
                                        {{-- <div class="col-2">
                                            <form method="POST" action="#">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0">
                                                    <i class="far fa-trash-alt text-danger" data-toggle="tooltip" title="Eliminar Stand"></i>
                                                </button>
                                            </form>
                                        </div> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-data-table>
                </x-slot:body>

                <x-slot:footer>
                    <div class="float-right">
                        {{-- {{ $empleados->links() }} --}}
                    </div>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
</x-app-layout>
