<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Entrega de Elementos') }}
    </x-slot>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('proyectos.entregas-elementos.index', $proyecto->id_proyecto) }}">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-md-1 offset-lg-2">
            <form method="POST" action="{{ route('proyectos.entregas-elementos.store', $proyecto->id_proyecto) }}" id="formu">
                @csrf
                <x-card>
                    <x-slot:header>
                        <x-text :value="__('Registrar Entrega de Elementos')" class="text-center" />
                    </x-slot:header>    

                    <x-slot:body>
                        <div class="form-group">
                            <x-input-label :value="__('Proyecto')" :obligatorio="false" for="proyecto" />
                            <x-input type="text" id="proyecto" name="proyecto" :value="$proyecto->proyecto" disabled />
                        </div>

                        <div class="form-group" id="val_empleado">
                            <x-input-label :value="__('Empleado')" for="empleado" />
                            <x-select :elements="$empleados" identifier="id_empleado" label="empleado" id="empleado" name="empleado">
                                <option selected disabled>{{ __('Seleccionar') }}</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('empleado')" />
                        </div> 
                        
                        <div class="form-group" id="val_fecha_entrega">
                            <x-input-label :value="__('Fecha de Entrega')" for="fecha_entrega" />
                            <x-input-group id="fecha_entrega" data-target-input="nearest">
                                <x-input type="text" class="datetimepicker-input" id="fecha_entregas" name="fecha_entrega" :value="old('fecha_entrega')" data-target="#fecha_entrega" />
                                <x-slot:icon data-target="#fecha_entrega" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar text-primary"></i>
                                </x-slot:icon>
                            </x-input-group>
                            <x-input-error :messages="$errors->get('fecha_entrega')" />
                        </div>
                        
                        <div class="form-group" id="val_categoria">
                            <x-input-label :value="__('Categoria')" for="categoria" />
                            <x-select :elements="$categorias" identifier="id_categoria" label="categoria" id="categoria" name="categoria">
                                <option selected disabled>{{ __('Seleccionar') }}</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('categoria')" />
                        </div>
                        
                        <div class="form-group" id="val_subcategoria">
                            <x-input-label :value="__('Subcategoria')" for="subcategoria" />
                            <x-select :elements="[]" identifier="id_subcategoria" label="subcategoria" id="subcategoria" name="subcategoria" />
                            <x-input-error :messages="$errors->get('subcategoria')" />
                        </div>

                        <div class="form-group" id="val_elemento">
                            <x-input-label :value="__('Elemento')" for="elemento" />
                            <x-select :elements="[]" identifier="id_item" label="item" id="elemento" name="elemento" />
                            <x-input-error :messages="$errors->get('elemento')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Tipo de Cantidad')" :obligatorio="false" for="tipo_cantidad" />
                            <x-input type="text" id="tipo_cantidad" name="tipo_cantidad" disabled />
                        </div>
                        
                        <div class="form-group">
                            <x-input-label :value="__('Cantidad Disponible')" :obligatorio="false" for="cantidad_disponible" />
                            <x-input type="text" id="cantidad_disponible" name="cantidad_disponible" disabled />
                        </div>
                        
                        <div class="form-group" id="val_cantidad">
                            <x-input-label :value="__('Cantidad a Entregar')" for="cantidad" />
                            <x-input type="number" id="cantidad" name="cantidad" :value="old('cantidad')" />
                            <x-input-error :messages="$errors->get('cantidad')" />
                        </div>

                        <div class="form-group">
                            <x-button color="success" class="mt-4" id="btn-agregar">
                                {{ __('Agregar') }}
                            </x-button>
                        </div>

                        <div class="form-group">
                            <x-text size="h6" color="black" :value="__('Proyecto:')" class="d-inline" />
                            <x-text size="h6" style="font-weight-normal" color="black" :value="__('')" class="d-inline" id="proyecto_seleccionado" /><br>
                            <x-text size="h6" color="black" :value="__('Empleado:')" class="d-inline" />
                            <x-text size="h6" style="font-weight-normal" color="black" :value="__('')" class="d-inline" id="empleado_seleccionado" /><br>
                            <x-text size="h6" color="black" :value="__('Fecha de Entrega:')"  class="d-inline" />
                            <x-text size="h6" style="font-weight-normal" color="black" :value="__('')" class="d-inline" id="fecha_entrega_seleccionada" />
                        </div>

                        <div class="form-group">
                            <x-data-table :headers="['Elemento', 'Tipo de Cantidad', 'Cantidad']" id="tabla_entregas">
                                {{-- <tr>
                                    <td>1</td>
                                    <td>Elemento1</td>
                                    <td>4</td>
                                    <td class="text-center">
                                        <i class="far fa-trash-alt text-danger" data-toggle="tooltip" title="Eliminar Elemento"></i>
                                    </td>
                                </tr> --}}
                            </x-data-table>
                        </div>
                    </x-slot:body>

                    <x-slot:footer>
                        <x-button type="submit" id="btn-registrar" disabled>
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
        // Date picker
        $("#fecha_entrega").datetimepicker({
            format: 'YYYY/MM/DD',
            locale: 'es'
        });
        
        // Select dinamico subcategorias
        var subcategorias = {{ Js::from($subcategorias) }};
        $("#categoria").on("change", function() {
            $("#subcategoria, #elemento").empty()
            $("#tipo_cantidad, #cantidad_disponible, #cantidad").val("")
            $("#val_elemento p").remove()

            if ($(this).val().length == 0) {
                return false;
            }
            else {
                var categoria = $(this).val()
                const resultado = subcategorias.filter(function(subcategoria) {
                    return subcategoria.categoria_id == categoria
                })

                resultado.forEach(function(res) {
                    $("#subcategoria").append("<option value="+res.id_subcategoria+">"+res.subcategoria+"</option>")
                })

                $("#subcategoria").prepend("<option selected disabled>Seleccionar</option>")
            }
        });


        // Select dinamico elementos
        var elementos = {{ Js::from($elementos) }};
        $("#subcategoria").on("change", function() {
            $("#elemento").empty()
            $("#tipo_cantidad, #cantidad_disponible, #cantidad").val("")
            $("#val_elemento p").remove()

            if ($(this).val().length == 0) {
                return false;
            }
            else {
                var subcategoria = $(this).val()
                const resultado = elementos.filter(function(elemento) {
                    return elemento.item.subcategoria_id == subcategoria
                })

                resultado.forEach(function(res) {
                    $("#elemento").append("<option value="+res.id_elemento+">"+res.item.item+"</option>")
                })

                $("#elemento").prepend("<option selected disabled>Seleccionar</option>")
            }
        });


        // Input tipo de cantidad, cantidad disponible
        $("#elemento").on("change", function() {
            $("#tipo_cantidad, #cantidad_disponible, #cantidad").val("")
            $("#val_elemento p").remove()

            var element = $(this).val()
            const resultado = elementos.find(function(elemento) {
                return elemento.id_elemento == element
            })

            $("#tipo_cantidad").val(resultado.tipo_cantidad.tipo_cantidad)
            $("#cantidad_disponible").val(resultado.cantidad)
        });


        // Table elementos agregados
        const entregas = []
        let validacion_formulario = []
        $("#btn-agregar").on("click", function() {
            // Resetear validaciones del formulario
            validacion_formulario.forEach(function(validacion) {
                $(validacion+" p").remove()
            })

            $("#val_elemento p, #val_cantidad p").remove()

            validacion_formulario = []

            // Validacion campos del formulario
            const reglas_validacion = [
                { campo: "#empleado", campo_val: "#val_empleado", mensaje: "El campo empleado es obligatorio." },
                { campo: "#fecha_entregas", campo_val: "#val_fecha_entrega", mensaje: "El campo fecha de entrega es obligatorio." },
                { campo: "#categoria", campo_val: "#val_categoria", mensaje: "El campo categoria es obligatorio." },  
                { campo: "#subcategoria", campo_val: "#val_subcategoria", mensaje: "El campo subcategoria es obligatorio." },  
                { campo: "#elemento", campo_val: "#val_elemento", mensaje: "El campo elemento es obligatorio." },  
                { campo: "#cantidad", campo_val: "#val_cantidad", mensaje: "El campo cantidad a entregar es obligatorio." }  
            ]

            reglas_validacion.forEach(function(regla) {
                if ($(regla.campo).val() == null || $(regla.campo).val() == '') {
                    $(regla.campo_val).append("<p class='text-sm text-danger'>"+regla.mensaje+"</p>")
                    validacion_formulario.push(regla.campo_val)
                }
            })

            // Validacion del formulario
            if (validacion_formulario.length == 0) {
                // Validacion cantidad disponible del elemento
                if ($("#cantidad").val() > $("#cantidad_disponible").val() || $("#cantidad_disponible").val() == 0) {
                    $("#val_cantidad").append("<p class='text-sm text-danger'>La cantidad a entregar debe ser menor o igual a la cantidad disponible</p>")
                }
                else {
                    // Mostrar encabezado de la entrega
                    $("#proyecto_seleccionado").text($("#proyecto").val())
                    $("#empleado_seleccionado").text($("#empleado option:selected").text())
                    $("#fecha_entrega_seleccionada").text($("#fecha_entregas").val())

                    // Validacion elementos agregados
                    const elemento_agregado = entregas.find(function(entrega) {
                        return entrega.id_elemento == $("#elemento").val()
                    })

                    if (elemento_agregado == null) {
                        // Almacenar elementos en el array
                        entregas.push({ id_elemento: $("#elemento").val(), elemento: $("#elemento option:selected").text(), tipo_cantidad: $("#tipo_cantidad").val(), cantidad: $("#cantidad").val() })

                        // Mostrar elementos en la tabla
                        $("#tabla_entregas tr td").remove()

                        entregas.forEach(function(entrega) {
                            $("#tabla_entregas").append(
                                "<tr>"+
                                    "<td>"+entrega.elemento+"</td>"+
                                    "<td>"+entrega.tipo_cantidad+"</td>"+
                                    "<td>"+entrega.cantidad+"</td>"+
                                "</tr>"    
                            )
                        })

                        // Agregar elementos al formulario
                        $("#cantidad").after("<input type='hidden' class='form-control' id='elementos' name='elementos[]' value="+$("#elemento").val()+">")
                        $("#elementos").after("<input type='hidden' class='form-control' id='cantidades' name='cantidades[]' value="+$("#cantidad").val()+">")
                        
                        // Resetear campos del formulario
                        $("#categoria option:first").remove()
                        $("#categoria").prepend("<option selected disabled>Seleccionar</option>")
                        $("#subcategoria, #elemento").empty()
                        $("#tipo_cantidad, #cantidad_disponible, #cantidad").val("")
                    }
                    else {
                        $("#val_elemento").append("<p class='text-sm text-danger'>Este elemento ya esta agregado</p>")
                    } 
                }

                if (entregas.length > 0) {
                    $("#btn-registrar").attr("disabled", false)
                }
            }
        });
    })
</script>
