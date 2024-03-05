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
                <form method="POST" action="{{ route('usuarios.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Perfil</label>
                            <select class="form-control @error('identificacion') is-invalid @enderror" id="perfil_id" name="perfil_id">
                                <option selected disabled></option>
                                @foreach ($perfiles as $perfil)
                                    <option value="{{$perfil->id_perfil}}">{{$perfil->perfil}}</option>
                                @endforeach
                            </select>
                            @error('perfil_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="identificacion">Identificación</label>
                            <input type="number" class="form-control @error('identificacion') is-invalid @enderror" id="identificacion" name="identificacion" value="{{ old('identificacion') }}">
                            @error('identificacion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror  
                        </div>

                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{ old('nombres') }}">
                            @error('nombres')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>

                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror 
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
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
</x-app-layout>
