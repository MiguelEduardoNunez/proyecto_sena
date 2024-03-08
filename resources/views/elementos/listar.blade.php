<x-app-layout>
    <x-slot:page>
        {{ __('Gestionar Elementos') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 col-lg-9">
                            <h4 class="text-primary font-weight-bold">Gestionar Elementos</h4>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <div class="card-tools">
                                <div class="input-group input-group">
                                    <input type="text" name="table_search" class="form-control" placeholder="Buscar">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body table-responsive p-0" style="height: 400px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                {{-- <th>Proyecto</th>
                                <th>Stand</th>
                                <th>Item</th> --}}
                                <th>Marca</th>
                                <th>Modelo</th>
                                {{-- <th>Serial</th>
                                <th>Span</th>--}}
                                <th>Codigo barras</th>
                                {{--<th>Grosor</th>
                                <th>Peso</th>--}}
                                <th>Cantidad</th>
                                {{--<<th>Cantidad minima</th> --}}

                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($elementos as $elemento)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $elemento->marca }}</td>
                                <td>{{ $elemento->modelo }}</td>
                                <td>{{ $elemento->codigo_barras }}</td>
                                <td>{{ $elemento->cantidad }}</td>


                                <td class="text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <a href="{{ route('elementos.show', $elemento->id_elemento) }}" type="button">
                                                <i class="far fa-eye" data-toggle="tooltip" title="Detalles Elemento"></i>
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{ route('elementos.edit', $elemento->id_elemento) }}" type="button">
                                                <i class="far fa-edit" data-toggle="tooltip" title="Actualizar Elemento"></i>
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <form method="POST" action="{{ route('elementos.update', $elemento->id_elemento) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0">
                                                    <i class="far fa-trash-alt" data-toggle="tooltip" title="Eliminar Elemento"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
