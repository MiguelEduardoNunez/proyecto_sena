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
                        <x-text size="h4" :value="__('Registrar Item')" class="text-center" />
                    </x-slot:header>
                    
                    <x-slot:body>  
                        <div class="form-group">
                            <x-input-label for="categoria" :value="__('Categoria')" :obligatorio="true" />
                            <x-select :elements="$categorias" identifier="id_categoria" label="categoria" id="categoria" name="categoria" />
                            <x-input-error :messages="$errors->get('categoria')" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="subcategoria" :value="__('Subcategoria')" :obligatorio="true" />
                            <x-select :elements="$subcategorias" identifier="id_subcategoria" label="subcategoria" id="subcategoria" name="subcategoria" />
                            <x-input-error :messages="$errors->get('subcategoria')" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="item" :value="__('Item')" :obligatorio="true" />
                            <x-input type="text" id="item" name="item" :value="old('item')" />
                            <x-input-error :messages="$errors->get('item')" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="descripcion" :value="__('Descripción')" :obligatorio="false" />
                            <x-text-area id="descripcion" name="descripcion">{{ old('descripcion') }}</x-text-area>
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
