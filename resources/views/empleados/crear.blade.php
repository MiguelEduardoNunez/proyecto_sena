<x-app-layout>

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Registrar Empleado</h4>
                </div>
                <form method="POST" action="{{ route('empleados.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="empleado"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Empleado</label>
                            <input type="text" class="form-control @error('empleado') is-invalid @enderror"
                                id="empleado" name="empleado" value="{{ old('empleado') }}">
                            @error('empleado')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer bg-transparent mb-2">
                        <button type="submit"
                            class="btn btn-outline-primary btn-block font-weight-bold">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
