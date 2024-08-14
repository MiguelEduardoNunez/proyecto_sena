<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Empleado') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form method="POST" action="{{ route('empleados.store') }}">
                @csrf
                <x-card>
                    <x-slot:header>
                        <x-text :value="__('Registrar Empleado')" class="text-center" />
                    </x-slot:header>

                    <x-slot:body>
                        <ul class="nav nav-tabs" id="empleadoTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="datos-personales-tab" data-toggle="tab"
                                    href="#datos-personales" role="tab" aria-controls="datos-personales"
                                    aria-selected="true">Información Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="informacion-contacto-tab" data-toggle="tab"
                                    href="#informacion-contacto" role="tab" aria-controls="informacion-contacto"
                                    aria-selected="false">Información Laboral</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="detalles-contrato-tab" data-toggle="tab"
                                    href="#detalles-contrato" role="tab" aria-controls="detalles-contrato"
                                    aria-selected="false">Información Adicional</a>
                            </li>
                        </ul>

                        {{-- Apartados del formulario --}}
                        <div class="tab-content">
                            {{-- Información personal del Empleado --}}
                            <div class="tab-pane fade show active" id="datos-personales" role="tabpanel"
                                aria-labelledby="datos-personales-tab">
                                <h6 class="text-blue"><strong>Información personal del Empleado</strong></h6>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Nombres Completos')" for="nombres_completos" />
                                        <x-input type="text" id="nombres_completos" name="nombres_completos"
                                            :value="old('nombres_completos')" />
                                        <x-input-error :messages="$errors->get('nombres_completos')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Apellidos Completos')" for="apellidos_completos" />
                                        <x-input type="text" id="apellidos_completos" name="apellidos_completos"
                                            :value="old('apellidos_completos')" />
                                        <x-input-error :messages="$errors->get('apellidos_completos')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Tipo de Documento')" for="tipo_documento" />
                                        <x-select :elements="$tipos_documentos" identifier="id_tipo_documento"
                                            label="tipo_documento" id="tipo_documento" name="tipo_documento">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('tipo_documento')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Número de Documento')" for="documento" />
                                        <x-input type="text" id="documento" name="documento" :value="old('documento')" />
                                        <x-input-error :messages="$errors->get('documento')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Departamento')" for="departamento" />
                                        <x-select :elements="$departamentos" identifier="id_departamento" label="departamento"
                                            id="departamento" name="departamento">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('departamento')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Lugar de expedicion')" for="municipio" />
                                        <x-select :elements="$municipios" identifier="id_municipio" label="municipio"
                                            id="municipio" name="municipio">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('municipio')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Fecha de Expedición')" for="fecha_expedicion" />
                                        <x-input type="date" id="fecha_expedicion" name="fecha_expedicion"
                                            :value="old('fecha_expedicion')" />
                                        <x-input-error :messages="$errors->get('fecha_expedicion')" />
                                    </div>
                                    {{-- departamento --}}
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Tipo de Sangre')" for="tipo_sangre" />
                                        <select id="tipo_sangre" name="tipo_sangre" class="form-control">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $tipo)
                                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('tipo_sangre')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Alergias')" for="alergias" />
                                        <x-input type="text" id="alergia" name="alergias" :value="old('alergias')" />
                                        <x-input-error :messages="$errors->get('alergias')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Enfermedades')" for="enfermedades" />
                                        <x-input type="text" id="enfermedad" name="enfermedades"
                                            :value="old('enfermedades')" />
                                        <x-input-error :messages="$errors->get('enfermedades')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Fecha de Nacimiento')" for="fecha_nacimiento" />
                                        <x-input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                            :value="old('fecha_nacimiento')" />
                                        <x-input-error :messages="$errors->get('fecha_nacimiento')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Edad')" for="edad" />
                                        <x-input type="number" id="edad" name="edad" :value="old('edad')" />
                                        <x-input-error :messages="$errors->get('edad')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Número de Celular')" for="celular" />
                                        <x-input type="number" id="celular" name="celular" :value="old('celular')" />
                                        <x-input-error :messages="$errors->get('celular')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Correo Electronico')" for="email" />
                                        <x-input type="email" id="email" name="email" :value="old('email')" />
                                        <x-input-error :messages="$errors->get('email')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Direccion')" for="direccion" />
                                        <x-input type="text" id="direccion" name="direccion" :value="old('direccion')" />
                                        <x-input-error :messages="$errors->get('direccion')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Estrato')" for="estrato" />
                                        <x-input type="number" id="estrato" name="estrato" :value="old('estrato')" />
                                        <x-input-error :messages="$errors->get('estrato')" />
                                    </div>
                                </div>
                            </div>
                            {{-- Información Larobal --}}
                            <div class="tab-pane fade" id="informacion-contacto" role="tabpanel"
                                aria-labelledby="informacion-contacto-tab">
                                <h6 class="text-blue"><strong>Información Larobal</strong></h6>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Cargo del Empleado')" for="cargo_empleado" />
                                        <x-select :elements="$cargos_empleados" identifier="id_cargo_empleado"
                                            label="cargo_empleado" id="cargo_empleado" name="cargo_empleado">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('cargo_empleado')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Fecha inicio del Contrato')" for="fecha_inicio" />
                                        <x-input type="date" id="fecha_inicio" name="fecha_inicio"
                                            :value="old('fecha_inicio')" />
                                        <x-input-error :messages="$errors->get('fecha_inicio')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Tipo de Contrato')" for="tipo_contrato" />
                                        <x-select :elements="$tipos_contratos" identifier="id_tipo_contrato"
                                            label="tipo_contrato" id="tipo_contrato" name="tipo_contrato">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('tipo_contrato')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Nivel Educativo')" for="nivel_educativo" />
                                        <x-select :elements="$niveles_educativos" identifier="id_nivel_educativo"
                                            label="nivel_educativo" id="nivel_educativo" name="nivel_educativo">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('nivel_educativo')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('ARL')" for="arl" />
                                        <x-select :elements="$arls" identifier="id_arl" label="nombre_arl"
                                            id="arl" name="arl">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('arl')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Nivel de Riesgo')" for="nivel_riesgo" />
                                        <x-input type="number" id="nivel_riesgo" name="nivel_riesgo"
                                            :value="old('nivel_riesgo')" />
                                        <x-input-error :messages="$errors->get('nivel_riesgo')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('EPS')" for="eps" />
                                        <x-input type="text" id="eps" name="eps" :value="old('eps')" />
                                        <x-input-error :messages="$errors->get('eps')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Fondo Pension')" for="fondo_pension" />
                                        <x-select :elements="$fondos_pensiones" identifier="id_fondo_pension"
                                            label="fondo_pension" id="fondo_pension" name="fondo_pension">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('fondo_pension')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Fondo Cesantia')" for="fondo_cesantia" />
                                        <x-select :elements="$fondos_cesantias" identifier="id_fondo_cesantia"
                                            label="fondo_cesantia" id="fondo_cesantia" name="fondo_cesantia">
                                            <option selected disabled>{{ __('Seleccionar') }}</option>
                                        </x-select>
                                        <x-input-error :messages="$errors->get('fondo_cesantia')" />
                                    </div>
                                </div>
                            </div>
                            {{-- Detalles del Contrato --}}
                            <div class="tab-pane fade" id="detalles-contrato" role="tabpanel"
                                aria-labelledby="detalles-contrato-tab">
                                <h6 class="text-blue"><strong>Información adicional</strong></h6>
                                <div class="form-row">
                                    {{-- Cursos Realizados --}}
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Cursos Realizados (separados por comas)')" for="cursos_realizados" />
                                        <x-input type="text" id="cursos_realizados" name="cursos_realizados"
                                            :value="old('cursos_realizados')" placeholder="Curso 1, Curso 2, Curso 3" />
                                        <x-input-error :messages="$errors->get('cursos_realizados')" />
                                    </div>
                                    {{-- Certificados --}}
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Certificados')" for="certificado_curso_pdf" />
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"
                                                    id="certificado_curso_pdf" name="certificado_curso_pdf[]"
                                                    multiple>
                                                <label class="custom-file-label"
                                                    for="certificado_curso">{{ __('Seleccionar archivos') }}</label>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('certificado_curso_pdf')" />
                                    </div>
                                    {{-- Información del Acudiente --}}
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Nombre del Acudiente')" for="nombre_acudiente" />
                                        <x-input type="text" id="nombre_acudiente" name="nombre_acudiente"
                                            :value="old('nombre_acudiente')" />
                                        <x-input-error :messages="$errors->get('nombre_acudiente')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Parentesco')" for="parentesco" />
                                        <x-input type="text" id="parentesco" name="parentesco"
                                            :value="old('parentesco')" />
                                        <x-input-error :messages="$errors->get('parentesco')" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <x-input-label :value="__('Número de Contacto')" for="numero" />
                                        <x-input type="text" id="numero" name="numero" :value="old('numero')" />
                                        <x-input-error :messages="$errors->get('numero')" />
                                    </div>
                                </div>
                            </div>
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
    $(function() {
        // Select dinamic
        var municipios = {{Js::from($municipios)}};
        $("#departamento").on("change", function() {
            $("#municipio").empty();
            $("#municipio").prepend("<option selected disabled>Seleccionar</option>");

            var departamento = $(this).val();
            const resultado = municipios.filter(function(municipio) {
                return municipio.departamento_id == departamento;
            });
            resultado.forEach(function(res) {
                $("#municipio").append("<option value='" + res.id_municipio + "'>" + res
                    .municipio + "</option>");
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('certificado_curso_pdf');
        const fileLabel = document.querySelector('label[for="certificado_curso"]');

        fileInput.addEventListener('change', function() {
            const files = fileInput.files;
            const fileNames = Array.from(files).map(file => file.name).join(', ');
            fileLabel.textContent = files.length > 0 ? fileNames : 'Seleccionar archivos';
        });
    });
</script>
