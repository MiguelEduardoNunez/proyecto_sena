<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('usuarios.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Detalles Usuario</h4>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold">Identificación</h6>
                    <p>{{ $usuario->identificacion }}</p>

                    <h6 class="font-weight-bold mt-4">Nombres</h6>
                    <p>{{ $usuario->nombres }}</p>

                    <h6 class="font-weight-bold mt-4">Telefono</h6>
                    <p>{{ $usuario->telefono }}</p>

                    <h6 class="font-weight-bold mt-4">Email</h6>
                    <p>{{ $usuario->email }}</p>

                    <h6 class="font-weight-bold mt-4">Perfil</h6>
                    <p>{{ $usuario->perfil->perfil }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>