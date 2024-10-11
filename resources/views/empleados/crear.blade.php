<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Empleado') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <form method="POST" action="{{ route('empleados.store') }}">
                @csrf
                <x-card>
                    <x-slot:header>
                        <x-text :value="__('Registrar Empleado')" class="text-center" />
                    </x-slot:header>
                    
                    <x-slot:body>
                        <div class="form-group">
                            <x-input-label :value="__('Empleado')" for="empleado" />
                            <x-input type="text" id="empleado" name="empleado" :value="old('empleado')" />
                            <x-input-error :messages="$errors->get('empleado')" />
                        </div>
                    </x-slot:body>

                    <x-slot:footer>
                        <x-button type="submit">
                            {{ __('Registrar') }}
                        </x-button>
                    </x-slot:footer>
                </x-card>
            </form>
        </div>
    </div>
</x-app-layout>
