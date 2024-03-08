<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Proyecto') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Crear Proyecto</h4>
                </div>
                <form method="POST" action={{route('proyectos.store')}} >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="proyecto"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Proyecto</label>
                            <input type="text" class="form-control @error('proyecto') is-invalid @enderror" id="proyecto" name="proyecto" value={{old('proyecto')}}>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"> {{old('descripcion')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="fecha_inicio"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span>Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value={{old('fecha_inicio')}}>
                        </div>

                        <div class="form-group">
                            <label for="fecha_fin"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span>Fecha de Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value={{old('fecha_fin')}}>
                        </div>

                        <div class="form-group">
                            <label for="responsable_proyecto"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span>Responsable del proyecto</label>
                            <input type="text" class="form-control" id="responsable_proyecto" name="responsable_proyecto" value={{old('responsable_proyecto')}}>
                        </div>

                        <div class="form-group">
                            <label for="correo_responsable"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span>Correo del responsable</label>
                            <input type="email" class="form-control" id="correo_responsable" name="correo_responsable" value={{old('correo_responsable')}}>
                        </div>

                        <div class="form-group">
                            <label for="telefono_responsable">Telefono del responsable</label>
                            <input type="text" class="form-control" id="telefono_responsable" name="telefono_responsable" value={{old('telefono_responsable')}}>
                        </div>

                        <div class="form-group">
                            <label for="direccion_cliente">Direccion del cliente</label>
                            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" value={{old('direccion_cliente')}}>
                        </div>

                    </div>
                    <div class="card-footer bg-transparent mb-2">
                        <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
