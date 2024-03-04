<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Perfil') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Registrar Perfil</h4>
                </div>
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="perfil">Perfil</label>
                            <input type="text" class="form-control" id="perfil">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" rows="4"></textarea>
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
