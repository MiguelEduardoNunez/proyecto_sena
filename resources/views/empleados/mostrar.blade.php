<x-app-layout>
    <x-slot:page>
        {{ __('Detalles Empleado') }}
    </x-slot>

    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('empleados.index') }}">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-md-1 offset-lg-2">
            <x-card>
                <x-slot:header>
                    <x-text :value="__('Detalle Empleado')" class="text-center" />
                </x-slot:header>

                <x-slot:body>
                    <x-text size="h6" color="dark" :value="__('Empleado')" />
                    <x-text size="h6" style="font-weight-normal" color="dark" :value="$empleado->empleado" />
                </x-slot:body>

                <x-slot:footer>
                </x-slot:footer>
            </x-card>
        </div>
    </div>







</x-app-layout>