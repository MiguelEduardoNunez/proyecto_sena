<x-app-layout>
    <div class="row">
        <div class="col-1 d-none d-lg-flex">
            <a href="{{ route('elementos.index') }}" type="button">
                <i class="far fa-arrow-alt-circle-left fa-2x" data-toggle="tooltip" title="Regresar"></i>
            </a>
        </div>
        <div class="col-12 col-md-10 col-lg-6 offset-2">
            <div class="card card-outline card-primary shadow">
                <div class="card-header">
                    <h4 class="text-primary text-center font-weight-bold">Detalles Elementos</h4>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold">Marca</h6>
                    <p>{{ $elemento->marca }}</p>

                    <h6 class="font-weight-bold mt-4">Modelo</h6>
                    <p>{{ $elemento->modelo }}</p>

                    <h6 class="font-weight-bold mt-4">Serial</h6>
                    <p>{{ $elemento->serial }}</p>

                    <h6 class="font-weight-bold mt-4">Span</h6>
                    <p>{{ $elemento->span }}</p>

                    <h6 class="font-weight-bold mt-4">Codigo de barras</h6>
                    <p>{{ $elemento->codigo_barras }}</p>

                    <h6 class="font-weight-bold mt-4">Grosor</h6>
                    <p>{{ $elemento->grosor }}</p>

                    <h6 class="font-weight-bold mt-4">Peso</h6>
                    <p>{{ $elemento->peso }}</p>

                    <h6 class="font-weight-bold mt-4">Cantidad</h6>
                    <p>{{ $elemento->cantidad }}</p>

                    <h6 class="font-weight-bold mt-4">Cantidad minima</h6>
                    <p>{{ $elemento->cantidad_minima }}</p>

                    <h6 class="font-weight-bold mt-4">Proyecto</h6>
                    <p>{{ $elemento->proyecto->proyecto}}</p>

                    
                    <h6 class="font-weight-bold mt-4">Stand</h6>
                    <p>{{ $elemento->stand->stand}}</p> 

                    <h6 class="font-weight-bold mt-4">Item</h6>
                    <p>{{ $elemento->item->item}}</p> 



                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 