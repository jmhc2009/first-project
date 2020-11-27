@extends('adminlte::page')

@section('title', 'Categoria')

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
                <tbody>
                    <tr>             
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td><a class="btn btn-link btn-outline-primary fas fa-edit" href="{{ route('category.edit',$category) }}"</a></td> 
                            
                    <form method="POST" action="{{ route('category.destroy', $category) }}">
                            @csrf @method('DELETE')
                        <td><button class="btn btn-outline-primary fas fa-trash-alt "></button></td>                        
                    </form>            
                        
                                                                           
                    </tr> 
                </tbody>                   
            </table>           
        </div>
    </div>

</div>



@endsection