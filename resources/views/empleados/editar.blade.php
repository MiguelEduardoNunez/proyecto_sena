<x-app-layout>
    <x-slot:page>
        {{ __('Actualizar Empleado') }}
    </x-slot>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('empleados.index') }}">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-md-1 offset-lg-2">
            <form method="POST" action="{{ route('empleados.update', $empleado->id_empleado) }}">
                @csrf
                @method('PUT')
                <x-card>
                    <x-slot:header>
                        <x-text :value="__('Actualizar Empleado')" class="text-center" />
                    </x-slot:header>

                    <x-slot:body>
                        <div class="form-group">
                            <x-input-label :value="__('Empleado')" for="empleado" />
                            <x-input type="text" id="empleado" name="empleado" :value="$empleado->empleado" />
                            <x-input-error :messages="$errors->get('empleado')" />
                        </div>
                    </x-slot:body>

                    <x-slot:footer>
                        <x-button type="submit">
                            {{ __('Actualizar') }}
                        </x-button>
                    </x-slot:footer>
                </x-card>
            </form>
        </div>
    </div>
</x-app-layout>
