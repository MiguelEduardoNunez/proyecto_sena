<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('elementos.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Actualizar Elemento</h4>
                </div>
                <form method="POST" action="{{route('elementos.update', $elemento->id_elemento)}}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Proyecto</label>

                            <select class="form-control @error('proyecto') is-invalid @enderror" id="proyecto_id"
                                name="proyecto_id">
                                <option value="{{ $elemento->proyecto->id_proyecto }}" selected>{{
                                    $elemento->proyecto->proyecto }}</option>
                                @foreach($proyectos as $proyecto)
                                @if ($proyecto->id_proyecto != $elemento->proyecto_id)
                                <option value="{{ $proyecto->id_proyecto }}">{{ $proyecto->proyecto }}</option>
                                @endif
                                @endforeach
                            </select>

                            @error('proyecto_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Stand</label>
                            <select class="form-control @error('stand') is-invalid @enderror" id="stand_id"
                                name="stand_id">
                                <option value="{{ $elemento->stand->id_stand }}" selected>{{ $elemento->stand->stand }}
                                </option>
                                @foreach($stands as $stand)
                                @if ($stand->id_stand != $elemento->stand_id)
                                <option value="{{ $stand->id_stand }}">{{ $stand->stand }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('perfil_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Item</label>
                            <select class="form-control @error('item') is-invalid @enderror" id="item_id"
                                name="item_id">
                                <option value="{{ $elemento->item->id_item }}" selected>{{ $elemento->item->item }}
                                </option>
                                @foreach($items as $item)
                                    @if ($item->id_item != $elemento->item_id)
                                    <option value="{{ $item->id_item }}">{{ $item->item }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('perfil_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="marca"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Marca</label>
                            <input type="string" class="form-control @error('marca') is-invalid @enderror" id="marca"
                                name="marca" value="{{$elemento->marca}}">
                            @error('marca')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="modelo"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Modelo</label>
                            <input type="string" class="form-control @error('modelo') is-invalid @enderror" id="modelo"
                                name="modelo" value="{{$elemento->modelo}}">
                            @error('modelo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="serial"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Serial</label>
                            <input type="string" class="form-control @error('serial') is-invalid @enderror" id="serial"
                                name="serial" value="{{$elemento->serial}}">
                            @error('serial')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="span"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Span</label>
                            <input type="string" class="form-control @error('span') is-invalid @enderror" id="span"
                                name="span" value="{{$elemento->span}}">
                            @error('span')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="codigo_barras"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Codigo de barras</label>
                            <input type="string" class="form-control @error('codigo_barras') is-invalid @enderror"
                                id="codigo_barras" name="codigo_barras" value="{{$elemento->codigo_barras}}">
                            @error('codigo_barras')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="grosor"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Grosor</label>
                            <input type="sgrosor" class="form-control @error('grosor') is-invalid @enderror" id="grosor"
                                name="grosor" value="{{$elemento->grosor}}">
                            @error('grosor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="peso"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Peso</label>
                            <input type="string" class="form-control @error('peso') is-invalid @enderror" id="peso"
                                name="peso" value="{{$elemento->peso}}">
                            @error('peso')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cantidad"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Cantidad</label>
                            <input type="string" class="form-control @error('cantidad') is-invalid @enderror"
                                id="cantidad" name="cantidad" value="{{$elemento->cantidad}}">
                            @error('cantidad')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cantidad_minima"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Cantidad minima</label>
                            <input type="string" class="form-control @error('cantidad_minima') is-invalid @enderror"
                                id="cantidad_minima" name="cantidad_minima" value="{{$elemento->cantidad_minima}}">
                            @error('cantidad_minima')
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