<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('proyectos.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Actualizar Proyecto</h4>
                </div>
                <form method="POST" action={{ route('proyectos.update', $proyecto->id_proyecto) }}>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="proyecto">proyecto</label>
                            <input type="text" class="form-control" id="proyecto"
                                name="proyecto"value="{{ $proyecto->proyecto }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion"
                                name="descripcion"value="{{ $proyecto->descripcion }}">
                        </div>
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio"
                                name="fecha_inicio"value="{{ $proyecto->fecha_inicio }}">
                        </div>
                        <div class="form-group">
                            <label for="fecha_fin">Fecha Fin</label>
                            <input type="date" class="form-control" id="fecha_fin"
                                name="fecha_fin"value="{{ $proyecto->fecha_fin }}">
                        </div>
                        <div class="form-group">
                            <label for="responsable_proyecto">Responsable del proyecto</label>
                            <input type="text" class="form-control" id="responsable_proyecto"
                                name="responsable_proyecto"value="{{ $proyecto->responsable_proyecto }}">
                        </div>
                        <div class="form-group">
                            <label for="correo_responsable">Correo del responsable</label>
                            <input type="email" class="form-control" id="correo_responsable"
                                name="correo_responsable"value="{{ $proyecto->correo_responsable }}">
                        </div>
                        <div class="form-group">
                            <label for="telefono_responsable">Telefono del responsable</label>
                            <input type="text" class="form-control" id="telefono_responsable"
                                name="telefono_responsable"value="{{ $proyecto->telefono_responsable }}">
                        </div>
                        <div class="form-group">
                            <label for="direccion_cliente">Direccion del cliente</label>
                            <input type="text" class="form-control" id="direccion_cliente"
                                name="direccion_cliente"value="{{ $proyecto->direccion_cliente }}">
                        </div>

                    </div>
                    <div class="card-footer bg-transparent mb-2 ">
                        <button type="submit"
                            class="btn btn-outline-primary btn-block font-weight-bold ">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
