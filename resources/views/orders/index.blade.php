@extends('adminlte::page')

@section('content') 
<div class="container">
    <div class="row">
        <div class="col">            
            <table class="table   table-hover table-responsive-lg">
                <h1>Pedidos</h1>
                <thead>                    
                    <tr class="">  
                        <th>Id</th> 
                        <th>Código</th>                                            
                        <th>Nombre</th>                        
                        <th>Teléfono</th>
                        <th>Ciudad</th>
                        <th>Región</th>
                        <th>Mensaje</th>
                        <th>Total</th> 
                        <th>Ver detalle</th>                        
                    </tr>
                </thead>
                @foreach ($orders as $order)
                <tbody>
                    <tr>  
                        <td>{{ $order->id }}</td>                       
                        <td>{{ $order->cod }}</td>                        
                        <td>{{ $order->user->name }} {{ $order->user->surname }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->city }}</td>
                        <td>{{ $order->region }}</td> 
                        <td>{{ $order->message }}</td>
                        <td>{{ $order->total }}</td>
                        <td><a class="btn btn-link btn-outline-primary" href="{{ route('order.show', $order) }}"><i class="fas fa-eye"></i></a></td>                                                    
                    </tr> 
                </tbody>    
                @endforeach
            </table>           
        </div>
    </div>
</div>
@endsection