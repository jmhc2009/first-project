@extends('adminlte::page')

@section('content')
    

<div class="container">
    <div class="row">
        <div class="col">            
            <table class="table   table-hover table-responsive-lg">
                <thead>
                    <tr class="">  
                        <th>Id</th>
                        <th>Imagen</th>                          
                        <th>Nombre</th>                        
                        <th>Precio</th>
                        <th>Precio retail</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Detalle producto</th> 
                        
                    </tr>
                </thead>
                @foreach ($products as $product)
                <tbody>
                    <tr>  
                        <td>{{ $product->id }}</td> 
                        <td><a href="{{ route('product.show',$product) }}"><img  src="{{Storage::url($product->image) }}" width="100px" alt="Sin imagen"></a></td>                    
                        <td>{{ $product->name }}</td>                        
                        <td> $ {{ $product->price }}</td>
                        <td> $ {{ $product->priceRetail }}</td>
                        <td>{{ $product->stock }}</a></td>
                        <td>{{ $product->category->name }}</td> 
                        <td><a class="btn btn-link btn-outline-primary fas fa-edit" href="{{ route('product.show',$product) }}"</a></td> 
                                                   
                    </tr> 
                </tbody>    
                @endforeach
            </table>           
        </div>
    </div>

</div>



@endsection