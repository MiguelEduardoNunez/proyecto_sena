<x-app-layout>
    <x-slot:page>
        {{ __('Gestionar Elementos') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-slot:header>
                    <div class="row align-items-center">
                        <div class="col-auto d-none d-lg-flex">
                            <a href="{{ route('proyectos.index') }}">
                                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
                            </a>
                        </div>
                        
                        <div class="col-10 col-md-7 col-lg-8">
                            <x-text :value="__('Gestionar Elementos')" />
                        </div>

                        <div class="col-10 col-md-4 col-lg-3">
                            <x-input-group>
                                <x-input type="text" id="searchertable" name="searcher" placeholder="Buscar" />
                                <x-slot:icon>
                                    <i class="fas fa-search text-primary"></i>
                                </x-slot:icon>
                            </x-input-group>
                        </div>

                        <div class="col-auto">
                            <a href="{{ route('proyectos.elementos.create', $proyecto) }}">
                                <i class="fas fa-plus-circle fa-2x" data-toggle="tooltip" title="Registrar Elemento"></i>
                            </a>
                        </div>
                    </div>
                </x-slot:header>

                <x-slot:body class="table-responsive p-0" style="height: 400px;">
                    <x-data-table :headers="['#', 'Item', 'Marca', 'Modelo', 'Serial', 'Acciones']">
                        @foreach ($elementos as $elemento)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $elemento->item->item }}</td>
                                <td>{{ $elemento->marca }}</td>
                                <td>{{ $elemento->modelo }}</td>
                                <td>{{ $elemento->serial }}</td>
                                <td class="text-center">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-2">
                                            <a href="#">
                                                <i class="far fa-eye" data-toggle="tooltip" title="Detalles Elemento"></i>
                                            </a>
                                        </div>

                                        <div class="col-2">
                                            <a href="#" class="text-success">
                                                <i class="far fa-edit" data-toggle="tooltip" title="Actualizar Elemento"></i>
                                            </a>
                                        </div>
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
