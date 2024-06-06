<x-app-layout>
    <x-slot name="page">
        {{ __('Registrar Entrada de Elementos') }}
    </x-slot>
    <div class="col-auto d-none d-lg-flex">
        <a href="{{ route('entrada_elementos.index', $proyecto->id_proyecto) }}">
            <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
        </a>
    </div>

    <div class="row justify-content-center">

        <div class="col-12 col-md-10 col-lg-6">

            <form method="POST" action="{{ route('entrada_elementos.store', $proyecto->id_proyecto) }}">
                @csrf
                <x-card>
                    <x-slot:header>
                        <x-text :value="__('Registrar Entrada de Elementos')" class="text-center" />
                    </x-slot:header>

                    <x-slot:body>
                        <div class="form-group">
                            <x-input-label :value="__('Categoria')" for="categoria" />
                            <x-select :elements="$categorias" identifier="id_categoria" label="categoria" id="categoria" name="categoria">
                                <option selected disabled>{{ __('Seleccionar') }}</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('categoria')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Subcategoria')" for="subcategoria" />
                            <x-select :elements="$subcategorias" identifier="id_subcategoria" label="subcategoria" id="subcategoria" name="subcategoria">
                                <option selected disabled>{{ __('Seleccionar') }}</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('subcategoria')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Elemento')" for="elemento" />
                            <x-select :elements="$items" identifier="id_item" label="item" id="elemento" name="elemento">
                                <option selected disabled>{{ __('Seleccionar') }}</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('elemento')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Cantidad')" for="cantidad" />
                            <x-input type="number" id="cantidad" name="cantidad" :value="old('cantidad')" />
                            <x-input-error :messages="$errors->get('cantidad')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Fecha Entrada')" for="fecha_entrada" />
                            <x-input-group id="fecha_entrada" data-target-input="nearest">
                                <x-input type="text" class="datetimepicker-input" name="fecha_entrada" :value="old('fecha_entrada')" data-target="#fecha_entrada" />
                                <x-slot:icon data-target="#fecha_entrada" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar text-primary"></i>
                                </x-slot:icon>
                            </x-input-group>
                            <x-input-error :messages="$errors->get('fecha_entrada')" />
                        </div>


                        <div class="form-group">
                            <x-input-label :value="__('Descripción')" :obligatorio="false" for="descripcion" />
                            <x-text-area id="descripcion" name="descripcion" :value="old('descripcion')" />
                            <x-input-error :messages="$errors->get('descripcion')" />
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
<script>
    $(function () {
        // Select dinamic
        var subcategorias = {{ Js::from($subcategorias) }};
        $("#categoria").on("change", function() {
            $("#subcategoria").empty()
            $("#subcategoria").prepend("<option selected disabled>Seleccionar</option>")

            $("#elemento").empty()
            $("#elemento").prepend("<option selected disabled>Seleccionar</option>")
            
            var categoria = $(this).val()
            const resultado = subcategorias.filter(function(subcategoria) {
                return subcategoria.categoria_id == categoria
            })

            resultado.forEach(function(res) {
                $("#subcategoria").append("<option value="+res.id_subcategoria+">"+res.subcategoria+"</option>")
            })
        });

        var items = {{ Js::from($items) }};
        $("#subcategoria").on("change", function() {
            $("#elemento").empty()
            $("#elemento").prepend("<option selected disabled>Seleccionar</option>")
            
            var subcategoria = $(this).val()
            const resultado = items.filter(function(item) {
                return item.subcategoria_id == subcategoria
            })

            resultado.forEach(function(res) {
                $("#elemento").append("<option value="+res.id_item+">"+res.item+"</option>")
            })
        });
    })
</script>

