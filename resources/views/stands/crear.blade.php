<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Usuario') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Registrar Stand</h4>
                </div>
                <form method="POST" action={{ route('stand.store') }}>
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="stand"><span class="text-danger" data-toggle="tooltip"
                                title="Campo Obligatorio">*</span> Nombre</label>
                            <input type="text" class="form-control @error('stand') is-invalid @enderror" id="stand" name="stand" value="{{ old('stand') }}">
                            @error('stand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>

                        <div class="form-group">
                            <label for="ubicacion"><span class="text-danger" data-toggle="tooltip"
                                title="Campo Obligatorio">*</span> Ubicación</label>
                            <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}">
                            @error('ubicacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>
                    </div>

                    <div class="card-footer bg-transparent mb-2">
                        <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
