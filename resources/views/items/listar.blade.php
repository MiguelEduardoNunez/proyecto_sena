<x-app-layout>
    <x-slot:page>
        {{ __('Gestionar Items') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 col-lg-9">
                            <h4 class="text-primary font-weight-bold">Gestionar Items</h4>
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
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Descripcion</th>
                            

                            <th class="text-center">Acciones</th>
                        </tr>

                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->item }}</td>
                                <td>{{ $item->descripcion }}</td>
                              
    
    
                                <td class="text-center">
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <a href="" type="button">
                                                <i class="far fa-eye" data-toggle="tooltip" title="Detalles Item"></i>
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <a href="" type="button">
                                                <i class="far fa-edit" data-toggle="tooltip" title="Actualizar Item"></i>
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <form method="POST" action="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn p-0">
                                                    <i class="far fa-trash-alt" data-toggle="tooltip" title="Eliminar Item"></i>
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