<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="card card-outline card-primary shadow">
        <div class="card-header text-center">
            <h2 class="text-primary font-weight-bold" data-toggle="tooltip" title="Sistema de Información para la Gestion y Control de Materiales de Formación">
                SIGMAF
            </h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-body login-card-body">
                <p class="login-box-msg">Hola Bienvenid@</p>
        
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        
            <div class="card-footer bg-transparent mb-2">
                <button type="submit" class="btn btn-outline-primary btn-block font-weight-bold">{{ __('Iniciar Sesión') }}</button>
            </div>
        </form>
    </div>
</x-guest-layout>