@extends('layouts.master')
@section('content')



<div class="row">
<div class="col-8">
    <div class="center">
        <div class="row">
    
    
            @foreach ($articulos as $articulo)
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-content product-box">
                        <div class="product-imitation" >
                            sku: {{ $articulo['sku'] }}
                        </div>
                        <div class="product-desc">
                            <span class="product-price">
                                $10
                            </span>
                            <small class="text-muted">id</small>
                            <a href="#" class="product-name">{{ $articulo['id'] }} </a>
        
                            <div class="small m-t-xs">
                                {{$articulo['descripcion']}}
                            </div>
                            <div class="m-t text-righ">
        
                                <a href="#" onclick="myFunction({{ $articulo['id'] }})"  id= "{{ $articulo['id'] }}" class="btn btn-xs btn-outline btn-primary">agregar <i class="fa fa-long-arrow-right"></i> </a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

    
        </div>
    </div>
</div>
<div class="col-4">
        <h5>Carro de compra</h5>
        <hr>

        <td><a href="#" onclick="myFunctionborrarSession()"  class="btn btn-xs btn-outline btn-warning">borrar session  </a>

        @if (Session::get('articulos'))
            


        <table class="table" id="tablaCarrodeCompra">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">SKU</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Acción</th>

            </tr>
            </thead>
            <tbody>
                @foreach(Session::get('articulos') as $index =>  $articulo)
            <tr>
                <th scope="row">{{ $articulo['id'] }}</th>
                <td>{{ $articulo['sku'] }}</td>
                <td>{{ $articulo['descripcion'] }}</td>
                <td>{{ $articulo['precio'] }}</td>
                
                <td><a href="#" onclick="myFunctionEliminar( {{$index}})"  id= "{{ $articulo['id'] }}" class="btn btn-xs btn-outline btn-danger">eliminar  </a>
                </td>


            </tr>
            @endforeach

            
            </tbody>
        </table>



        @endif
</div>
</div>



<script>
    function myFunction(val) {


        var url = '{{ asset('/carro/agregar/') }}';
                          

       
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:url,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                 id: val
            },
            success: function( data ){

                location.reload();

            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr + " b=" + b + " c=" + c);
            }
        });



             }
</script>

<script>
    function myFunctionEliminar(val) {

        var url = '{{ asset('/carro/eliminar/') }}';
                              
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:url,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                 id: val
            },
            success: function( data ){

                location.reload();
            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr + " b=" + b + " c=" + c);
            }
        });

             }
</script>

<script>
     function myFunctionborrarSession(val) {


        var url = '{{ asset('/eliminar/sessions') }}';
        var id = 1; //WIP
                  


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:url,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id
            },
            success: function( data ){

                location.reload();
            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr + " b=" + b + " c=" + c);
            }
        });

             }
</script>

@stop