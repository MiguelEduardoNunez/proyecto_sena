<x-app-layout>
    <x-slot:page>
        {{ __('Importar Elementos') }}
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('elementos.storeImport', $proyecto->id_proyecto) }}" enctype="multipart/form-data">
                @csrf
                <x-card>
                    <x-slot:header>
                        <div class="col-10 col-md-7 col-lg-7">
                            <x-text :value="__('Importar Elementos')" />
                        </div>
                    </x-slot:header>
                    <x-slot:body>
                        <div class="form-group">
                            <x-input-label :value="__('Archivo Excel')" for="archivo_excel" />
                            <x-input type="file" id="archivo_excel" name="archivo_excel" :value="old('archivo_excel')" />
                            <x-input-error :messages="$errors->get('archivo_excel')" />
                        </div>
                    </x-slot:body>
                    <x-slot:footer>
                        <x-button type="submit">
                            {{ __('Importar') }}
                        </x-button>
                    </x-slot:footer>
                </x-card>
            </form>
        </div>
    </div>
</x-app-layout>
