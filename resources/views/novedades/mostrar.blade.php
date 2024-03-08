<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('novedades.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Detalle novedad</h4>
                </div>
                <div class="card-body">
                    
                    <h6 class="font-weight-bold">Novedad</h6>
                    <p>{{ $novedad->novedad }}</p>
                    
                    <h6 class="font-weight-bold">Fecha reporte</h6>
                    <p>{{ $novedad->fecha_reporte }}</p>

                    <h6 class="font-weight-bold">Fecha cierre</h6>
                    <p>{{ $novedad->fecha_cierre }}</p>

                    <h6 class="font-weight-bold mt-4">Tipo novedad</h6>
                    <p>{{ $novedad->tipoNovedad->tipo_novedad}}</p>

                    <h6 class="font-weight-bold mt-4">Elemento</h6>
                    <p>{{ $novedad->elemento->marca}}</p>

                    <h6 class="font-weight-bold mt-4">Empleado</h6>
                    <p>{{ $novedad->empleado->empleado}}</p> 

                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 