<x-app-layout>
    <x-slot:page>
        {{ __('Detalles Perfil') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Detalles Perfil</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <h6>{{ $perfil->perfil }}</h6>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <h6>{{ $perfil->descripcion }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
