<x-app-layout>
    <x-slot:page>
        {{ __('Gestionar Stands') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            <x-card>
                <x-slot:header>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 col-lg-9">
                            <x-text :value="__('Gestionar Stands')" />
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <x-input-group>
                                <x-input type="text" id="searchertable" name="searcher" placeholder="Buscar" />
                                <x-slot:icon>
                                    <i class="fas fa-search text-primary"></i>
                                </x-slot:icon>
                            </x-input-group>
                        </div>
                    </div>
                </x-slot:header>

                <x-slot:body class="table-responsive p-0" style="height: 400px;">
                    <x-data-table 
                        :headers="['#', 'Stand', 'Ubicación', 'Acciones']" 
                        :elements="$stands" 
                        :columns="['stand', 'ubicacion']" 
                        :actions="[ 
                            ['route' => 'stands.show', 'icono' => 'far fa-eye', 'title' => 'Detalles Stand', 'responsive' => 'col-4 col-md-3 col-lg-2'],
                            ['route' => 'stands.edit', 'icono' => 'far fa-edit', 'title' => 'Actualizar Stand', 'responsive' => 'col-4 col-md-3 col-lg-2'],
                        ]" 
                        param="id_stand"
                    />
                </x-slot:body>

                <x-slot:footer>
                    <div class="float-right">
                        {{ $stands->links() }}
                    </div>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
</x-app-layout>
