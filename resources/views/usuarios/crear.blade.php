<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Usuario') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf
                <x-card>
                    <x-slot:header>
                        <x-text :value="__('Registrar Usuario')" class="text-center" />
                    </x-slot:header>

                    <x-slot:body>
                        <div class="form-group">
                            <x-input-label :value="__('Perfil')" for="perfil" />
                            <x-select :elements="$perfiles" identifier="id_perfil" label="perfil" id="perfil" name="perfil">
                                <option selected disabled>{{ __('Seleccionar') }}</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('perfil')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Identificación')" for="identificacion" />
                            <x-input type="number" id="identificacion" name="identificacion" :value="old('identificacion')" />
                            <x-input-error :messages="$errors->get('identificacion')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Nombres')" for="nombres" />
                            <x-input type="text" id="nombres" name="nombres" :value="old('nombres')" />
                            <x-input-error :messages="$errors->get('nombres')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Telefono')" :obligatorio="false" for="telefono" />
                            <x-input type="number" id="telefono" name="telefono" :value="old('telefono')" />
                            <x-input-error :messages="$errors->get('telefono')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Correo Electronico')" for="correo" />
                            <x-input type="email" id="correo" name="correo" :value="old('correo')" />
                            <x-input-error :messages="$errors->get('correo')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Contraseña')" for="contrasena" />
                            <x-input type="password" id="contrasena" name="contrasena" />
                            <x-input-error :messages="$errors->get('contrasena')" />
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
