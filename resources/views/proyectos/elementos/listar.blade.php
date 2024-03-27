<x-app-layout>
    <x-slot:page>
        {{ __('Gestionar Elementos') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-slot:header>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 col-lg-8">
                            <x-text :value="__('Gestionar Elementos')" />
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <x-input-group>
                                <x-input type="text" id="searchertable" name="searcher" placeholder="Buscar" />
                                <x-slot:icon>
                                    <i class="fas fa-search text-primary"></i>
                                </x-slot:icon>
                            </x-input-group>                            
                        </div>

                        <div class="col-1">
                            <a href="{{ route('proyectos.elementos.create', $proyecto) }}">
                                <i class="fas fa-plus-circle fa-2x" data-toggle="tooltip" title="Registrar Elemento"></i>
                            </a>
                        </div>
                    </div>
                </x-slot:header>

                <x-slot:body class="table-responsive p-0" style="height: 400px;">
                    <x-data-table :headers="['#', 'Marca', 'Modelo', 'Acciones']">
                        @foreach ($elementos as $elemento)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $elemento->marca }}</td>
                                <td>{{ $elemento->modelo }}</td>
                                <td class="text-center">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-2">
                                            <a href="{{ route('proyectos.elementos.show', $proyecto) }}">
                                                <i class="far fa-eye" data-toggle="tooltip" title="Detalles Elemento"></i>
                                            </a>
                                        </div>

                                        <div class="col-2">
                                            <a href="{{ route('proyectos.elementos.edit', $proyecto) }}">
                                                <i class="far fa-edit text-success" data-toggle="tooltip" title="Actualizar Elemento"></i>
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
                        {{ $elementos->links() }}
                    </div>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
</x-app-layout>
