<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('stand.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Actualizar Stand</h4>
                </div>
                <form method="POST" action={{ route('stand.update', $stand->id_stand) }}>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="stand">Nombre</label>
                            <input type="text" class="form-control" id="stand" name="stand" value="{{ $stand->stand }}">
                        </div>

                        <div class="form-group">
                            <label for="ubicacion">Ubicacion</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $stand->ubicacion }}">
                        </div>
                    </div>
                        <div class="card-footer bg-transparent mb-2">
                            <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">Actualizar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
