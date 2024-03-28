<x-app-layout>
    <x-slot:page>
        {{ __('Registrar Item') }}
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <form method="POST" action="{{ route('items.store') }}">
                @csrf
                <x-card>
                    <x-slot:header>
                        <x-text :value="__('Registrar Item')" class="text-center" />
                    </x-slot:header>

                    <x-slot:body>
                        <div class="form-group">
                            <x-input-label :value="__('Categoria')" for="categoria" />
                            <x-select :elements="$categorias" identifier="id_categoria" label="categoria" id="categoria" name="categoria" />
                            <x-input-error :messages="$errors->get('categoria')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Subcategoria')" for="subcategoria" />
                            <x-select :elements="$subcategorias" identifier="id_subcategoria" label="subcategoria" id="subcategoria" name="subcategoria" />
                            <x-input-error :messages="$errors->get('subcategoria')" />
                        </div>

                        <div class="form-group">
                            <x-input-label :value="__('Item')" for="item" />
                            <x-input type="text" id="item" name="item" :value="old('item')" />
                            <x-input-error :messages="$errors->get('item')" />
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
