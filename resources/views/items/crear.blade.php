<x-app-layout>

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
                            <label><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> subcategoria</label>
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
                            <label for="item"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> item</label>
                            <input type="text" class="form-control @error('item') is-invalid @enderror" id="item" name="item" value="{{ old('item') }}">
                            @error('item')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        
                        <div class="form-group">
                            <label for="descripcion"><span class="text-danger" data-toggle="tooltip" title="Campo Obligatorio">*</span> descripcion</label>
                            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                            @error('descripcion')
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

