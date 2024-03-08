<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('novedades.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Actualizar Novedad</h4>
                </div>
                <form method="POST" action="{{route('novedades.update', $novedad->id_novedad)}}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">


                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> tipo_novedad</label>

                            <select class="form-control @error('tipo_novedad_id') is-invalid @enderror" id="tipo_novedad_id"
                                name="tipo_novedad_id">
                                <option value="{{ $novedad->tipoNovedad->id_tipo_novedad }}" selected>{{
                                    $novedad->tipoNovedad->tipo_novedad }}</option>
                                @foreach($tipos_novedades as $tipo_novedad)
                                @if ($tipo_novedad->id_tipo_novedad != $novedad->tipo_novedad_id)
                                <option value="{{ $tipo_novedad->id_tipo_novedad }}">{{ $tipo_novedad->tipo_novedad }}</option>
                                @endif
                                @endforeach
                            </select>

                       

                            @error('tipo_novedad_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> 

                       
                        
                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Elemento</label>
                            <select class="form-control @error('elemento_id') is-invalid @enderror" id="elemento_id" name="elemento_id">
                                <option value="{{ $novedad->elemento->marca }}" selected>{{ $novedad->elemento->marca }}</option>
                                @foreach($elementos as $elemento)
                                    @if ($elemento->serial != $novedad->elemento->serial)
                                        <option value="{{ $elemento->serial }}">{{ $elemento->serial }}</option>
                                    @endif
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

                            <select class="form-control @error('empleado') is-invalid @enderror" id="empleado_id"
                                name="empleado_id">
                                <option value="{{ $novedad->empleado->id_empleado }}" selected>{{
                                    $novedad->empleado->empleado }}</option>
                                @foreach($empleados as $empleado)
                                @if ($empleado->id_empleado != $novedad->empleado_id)
                                <option value="{{ $empleado->id_empleado }}">{{ $empleado->empleado }}</option>
                                @endif
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
                            <input type="string" class="form-control @error('novedad') is-invalid @enderror" id="novedad"
                                name="novedad" value="{{$novedad->novedad}}">
                            @error('novedad')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_reporte"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Fecha reporte</label>
                            <input type="date" class="form-control @error('fecha_reporte') is-invalid @enderror" id="fecha_reporte"
                                name="fecha_reporte" value="{{$novedad->fecha_reporte}}">
                            @error('fecha_reporte')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="fecha_cierre"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Fecha cierre</label>
                            <input type="date" class="form-control @error('fecha_cierre') is-invalid @enderror" id="fecha_cierre"
                                name="fecha_cierre" value="{{$novedad->fecha_cierre}}">
                            @error('fecha_cierre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                    </div>

                    <div class="card-footer bg-transparent mb-2">
                        <button type="submit"
                            class="btn btn-outline-primary btn-block font-weight-bold">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>