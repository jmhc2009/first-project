@extends('adminlte::page')

@section('title', 'Categorias')

@section('content')   

<div class="container">
    <div class="row">
        <div class="col">            
            <table class="table   table-hover table-responsive-lg">
                <thead>
                    <tr class="">                                                  
                        <th>Nombre</th>
                        <th>Fecha creación</th>
                        <th>Fecha actualización</th>  
                        <th>Editar</th> 
                        <th>Eliminar</th>                      
                    </tr>
                </thead>
                @foreach ($categories as $category)
                <tbody>
                    <tr>             
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td><a href="{{ route('category.show',$category) }}" <i class="fas fa-edit"></i></a></td> 
                        <td><a href="#" <i class="fas fa-trash-alt color-red"></i></a></td>                                                   
                    </tr> 
                </tbody>    
                @endforeach
            </table>           
        </div>
    </div>

</div>



@endsection