<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Usuario') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Registrar Usuario</h4>
                </div>
                <form class="needs-validation" method="POST" action="{{ route('usuarios.store') }}" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Perfil</label>
                            <select class="form-control" name="perfil_id">
                                @foreach ($perfiles as $perfil)
                                    <option value="{{$perfil->id_perfil}}">{{$perfil->perfil}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="identificacion">Identificación</label>
                            <input type="number" class="form-control" id="identificacion" name="identificacion">
                            @error('identificacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror  
                        </div>

                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required>
                            @error('nombres')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror  
                        </div>

                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono">
                            @error('telefono')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
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
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>
</x-app-layout>
