<div>
    <div class="card">

        <div class="card-header">
             <input wire:model="search" type="text" class="form-control" placeholder="Ingreso el nombre o correo de un usuario">
        </div>
        @if ($users->count())            
            <div class="card-body">
               {{-- <a href="{{route('admin.users.create')}}" class="btn btn-primary" type="submit>">NUEVO USUARIO</a> --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>EMAIL</th>
                                <th>CENTRO</th>
                                <th>ACCION</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if(isset($user->centro->centro_nombre))
                                       <td>{{$user->centro->centro_nombre}}</td>                                    
    
                                       @else
                                       <td></td>                                    
                                                                      
                                    @endif
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                                        <a class="btn btn-info" href="{{route('user.asignar', $user)}}">Asignar Centro</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>                
                </div>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros</strong>        
            </div>
        @endif    
    </div>
</div>
