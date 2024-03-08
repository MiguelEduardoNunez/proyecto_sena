<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href={{ route('proyectos.index') }} type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Detalles Proyecto</h4>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold">Proyecto</h6>
                    <p>{{ $proyecto->proyecto }}</p>

                    <h6 class="font-weight-bold mt-4">Descripcion</h6>
                    <p>{{ $proyecto->descripcion }}</p>

                    <h6 class="font-weight-bold mt-4">Fecha Inicio</h6>
                    <p>{{ $proyecto->fecha_inicio }}</p>

                    <h6 class="font-weight-bold mt-4">Fecha Fin</h6>
                    <p>{{ $proyecto->fecha_fin }}</p>

                    <h6 class="font-weight-bold mt-4">Responsable del proyecto</h6>
                    <p>{{ $proyecto->responsable_proyecto }}</p>

                    <h6 class="font-weight-bold mt-4">Correo del responsable</h6>
                    <p>{{ $proyecto->correo_responsable }}</p>

                    <h6 class="font-weight-bold mt-4">Telefono del responsable</h6>
                    <p>{{ $proyecto->telefono_responsable }}</p>

                    <h6 class="font-weight-bold mt-4">Direccion del cliente</h6>
                    <p>{{ $proyecto->direccion_cliente }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
