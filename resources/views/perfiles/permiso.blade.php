<x-app-layout>
    <x-slot:page>
        {{ __('Gestionar Permisos') }}
    </x-slot>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('perfiles.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Gestionar Permisos</h4>
                </div>
                <div class="card-body">
                    @foreach ($modulos as $modulo)
                        <div class="icheck-primary mt-4">
                            <input type="checkbox" id="{{ $modulo->modulo }}">
                            <label for="{{ $modulo->modulo }}">
                                {{ $modulo->modulo }}
                            </label>
                        </div>
                        @if($modulo->moduloHijo != null)
                            @foreach($modulo->moduloHijo as $hijo)
                                <div class="icheck-primary ml-4">
                                    <input type="checkbox" id="{{ $hijo->modulo }}">
                                    <label for="{{ $hijo->modulo }}">
                                        {{ $hijo->modulo }}
                                    </label>
                                </div> 
                            @endforeach
                        @endif 
                    @endforeach
                </div>

                <div class="card-footer bg-transparent mb-2">
                    <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
