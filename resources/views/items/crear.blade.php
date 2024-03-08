<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Item') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Registrar Item</h4>
                </div>
                <form method="POST" action="{{ route('items.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Categoria</label>
                            <select class="form-control @error('categoria') is-invalid @enderror" id="categoria_id" name="categoria_id">
                                <option selected disabled></option>
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id_categoria}}">{{$categoria->categoria}}</option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Subcategoria</label>
                            <select class="form-control @error('subcategoria') is-invalid @enderror" id="subcategoria_id" name="subcategoria_id">
                                <option selected disabled></option>
                                @foreach ($subcategorias as $subcategoria)
                                <option value="{{$subcategoria->id_subcategoria}}">{{$subcategoria->subcategoria}}</option>
                                @endforeach
                            </select>
                            @error('subcategoria_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="item"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Item</label>
                            <input type="text" class="form-control @error('item') is-invalid @enderror" id="item" name="item" value="{{ old('item') }}">
                            @error('item')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label for="descripcion"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
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

