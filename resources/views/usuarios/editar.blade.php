<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('usuarios.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Actualizar Usuario</h4>
                </div>
                <form method="POST" action="{{ route('usuarios.update', $usuario->id_usuario) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Perfil</label>
                            <select class="form-control" name="perfil_id">
                                <option value="{{ $usuario->perfil->id_perfil }}" selected>{{ $usuario->perfil->perfil }}</option>
                                @foreach ($perfiles as $perfil)
                                    @if ($perfil->id_perfil != $usuario->perfil_id)
                                        <option value="{{ $perfil->id_perfil }}">{{ $perfil->perfil }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="identificacion">Identificacion</label>
                            <input type="number" class="form-control" id="identificacion" name="identificacion" value="{{ $usuario->identificacion }}">
                        </div>

                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $usuario->nombres }}">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
                        </div>
                    </div>

                    <div class="card-footer bg-transparent mb-2">
                        <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
