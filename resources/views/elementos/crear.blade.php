<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Elemento') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Registrar Elemento</h4>
                </div>

                <form method="POST" action="{{ route('elementos.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Proyecto</label>
                            <select class="form-control @error('proyecto') is-invalid @enderror" id="proyecto_id" name="proyecto_id">
                                <option selected disabled></option>
                                @foreach ($proyectos as $proyecto)
                                <option value="{{$proyecto->id_proyecto}}">{{$proyecto->proyecto}}</option>
                                @endforeach
                            </select>
                            @error('perfil_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Stand</label>
                            <select class="form-control @error('stand') is-invalid @enderror" id="stand_id" name="stand_id">
                                <option selected disabled></option>
                                @foreach ($stands as $stand)
                                <option value="{{$stand->id_stand}}">{{$stand->stand}}</option>
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
                            <select class="form-control @error('item') is-invalid @enderror" id="item_id" name="item_id">
                                <option selected disabled></option>
                                @foreach ($items as $item)
                                <option value="{{$item->id_item}}">{{$item->item}}</option>
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
                            <input type="string" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="{{ old('marca') }}">
                            @error('marca')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="modelo"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Modelo</label>
                            <input type="string" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo') }}">
                            @error('modelo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="serial"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Serial</label>
                            <input type="string" class="form-control @error('serial') is-invalid @enderror" id="serial" name="serial" value="{{ old('serial') }}">
                            @error('serial')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="span"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Span</label>
                            <input type="string" class="form-control @error('span') is-invalid @enderror" id="span" name="span" value="{{ old('span') }}">
                            @error('span')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="codigo_barras"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Codigo de barras</label>
                            <input type="string" class="form-control @error('codigo_barras') is-invalid @enderror" id="codigo_barras" name="codigo_barras" value="{{ old('codigo_barras') }}">
                            @error('codigo_barras')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="grosor"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Grosor</label>
                            <input type="sgrosor" class="form-control @error('grosor') is-invalid @enderror" id="grosor" name="grosor" value="{{ old('grosor') }}">
                            @error('grosor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="peso"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Peso</label>
                            <input type="string" class="form-control @error('peso') is-invalid @enderror" id="peso" name="peso" value="{{ old('peso') }}">
                            @error('peso')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cantidad"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Cantidad</label>
                            <input type="string" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" value="{{ old('cantidad') }}">
                            @error('cantidad')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cantidad_minima"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Cantidad minima</label>
                            <input type="string" class="form-control @error('cantidad_minima') is-invalid @enderror" id="cantidad_minima" name="cantidad_minima" value="{{ old('cantidad_minima') }}">
                            @error('cantidad_minima')
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
