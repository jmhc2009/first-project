@extends('adminlte::page')
@section('content')   

<div class="container">
    <div class="row">
        <div class="col">            
            <table class="table   table-hover table-responsive-lg">
                <thead>
                    <tr class="">  
                        <th>ID</th>                          
                        <th>Nombre</th>                        
                        <th>Apellido</th>
                        <th>E-mail</th>
                        <th>Rol</th>            
                    </tr>
                </thead>
                @foreach ($users as $user)
                <tbody>
                    <tr>                       
                        <td>{{ $user->id }}</a></td>                        
                        <td>{{ $user->name }}</a></td>
                        <td>{{ $user->surname }}</a></td>
                        <td>{{ $user->email }}</a></td>
                        <td>{{ $user->role }}</td>                                               
                    </tr> 
                </tbody>    
                @endforeach
            </table>           
        </div>
    </div>

</div>



@endsection