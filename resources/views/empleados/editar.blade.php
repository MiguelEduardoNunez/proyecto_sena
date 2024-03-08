<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('empleados.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Actualizar Empleado</h4>
                </div>
                <form method="POST" action="{{ route('empleados.update', $empleado->id_empleado) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="empleado"><span class="text-danger" data-toggle="tooltip"
                                    title="Campo Obligatorio">*</span> Empleado</label>
                            <input type="text" class="form-control" id="empleado" name="empleado"
                                value="{{ $empleado->empleado }}">
                        </div>
                    </div>

                    <div class="card-footer bg-transparent mb-2">
                        <button type="submit"
                            class="btn btn-outline-primary btn-block font-weight-bold">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
