<x-app-layout>

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Registrar Novedad</h4>
                </div>

                <form method="POST" action="{{ route('novedades.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Tipo novedad</label>
                            <select class="form-control @error('tipo_novedad') is-invalid @enderror" id="tipo_novedad_id" name="tipo_novedad_id">
                                <option selected disabled></option>
                                @foreach ($tipos_novedades as $tipo_novedad)
                                <option value="{{$tipo_novedad->id_tipo_novedad}}">{{$tipo_novedad->tipo_novedad}}</option>
                                @endforeach
                            </select>
                            @error('perfil_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Elemento</label>
                            <select class="form-control @error('elemento') is-invalid @enderror" id="elemento_id" name="elemento_id">
                                <option selected disabled></option>
                                @foreach ($elementos as $elemento)
                                <option value="{{$elemento->id_elemento}}">{{$elemento->marca}}</option>
                                @endforeach
                            </select>
                            @error('elemento_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Empleado</label>
                            <select class="form-control @error('empleado') is-invalid @enderror" id="empleado_id" name="empleado_id">
                                <option selected disabled></option>
                                @foreach ($empleados as $empleado)
                                <option value="{{$empleado->id_empleado}}">{{$empleado->empleado}}</option>
                                @endforeach
                            </select>
                            @error('empleado_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

               

                        <div class="form-group">
                            <label for="novedad"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Novedad</label>
                            <input type="text" class="form-control @error('novedad') is-invalid @enderror" id="novedad" name="novedad" value="{{ old('novedad') }}">
                            @error('novedad')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_reporte"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Fecha reporte</label>
                            <input type="date" class="form-control @error('fecha_reporte') is-invalid @enderror" id="fecha_reporte" name="fecha_reporte" value="{{ old('fecha_reporte') }}">
                            @error('fecha_reporte')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_cierre"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Fecha cierre</label>
                            <input type="date" class="form-control @error('fecha_cierre') is-invalid @enderror" id="fecha_cierre" name="fecha_cierre" value="{{ old('fecha_cierre') }}">
                            @error('fecha_cierre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        

                        <div class="card-footer bg-transparent mb-2">
                            <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">Registrar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>



    </div>





</x-app-layout>

