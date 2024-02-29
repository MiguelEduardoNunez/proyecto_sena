<x-app-layout>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registrar Perfil</h3>
                </div>
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="perfil">Perfil</label>
                            <input type="text" class="form-control" id="perfil" placeholder="Digite el perfil">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" placeholder="Digite la descripcion">
                        </div>
                    </div>

                    <div class="card-footer">
                        <x-primary-button>
                            {{ __('Registrar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
