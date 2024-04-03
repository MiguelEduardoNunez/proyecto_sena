<x-app-layout>
    <x-slot:page>
        {{ __('Detalles Categoria') }}
    </x-slot>

    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('categorias.index') }}">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-md-1 offset-lg-2">
            <x-card>
                <x-slot:header>
                    <x-text :value="__('Detalles Categoria')" class="text-center" />
                </x-slot:header>

                <x-slot:body>
                    <x-text size="h6" color="black" :value="__('Categoria')" />
                    <x-text size="h6" style="font-weight-normal" color="black" :value="$categoria->categoria" />

                    <x-text size="h6" color="black" :value="__('Descripcion')" class="mt-4" />
                        @if ($categoria->descripcion != null)
                        <x-text size="h6" style="font-weight-normal" color="black" :value="$categoria->descripcion" />
                    @else
                        {{ __('No registrada') }}
                    @endif
                </x-slot:body>

                <x-slot:footer>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
</x-app-layout>