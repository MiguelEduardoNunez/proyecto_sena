<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('stands.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Detalles Stand</h4>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold mt-4">Nombres</h6>
                    <p>{{ $stand->stand }}</p>

                    <h6 class="font-weight-bold mt-4">Ubicacion</h6>
                    <p>{{ $stand->ubicacion }}</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
