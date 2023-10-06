<div>

    <div class="card">

        <div class="card-header">
             <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de un medico">
        </div>
        @if ($medicos->count())            
            <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>MATRICULA</th>
                                <th>ESPECIALIDAD</th>
                                <th>CENTRO</th>
                                <th>ESTADO</th>
                                <th>ACCION</th>
                        </thead>
                        <tbody>
                            @foreach ($medicos as $medico)
                                <tr>
                                    <td>{{$medico->id}}</td>
                                    <td>{{$medico->medico_nombres}}</td>
                                    <td>{{$medico->medico_apellido}}</td>
                                    <td>{{$medico->medico_matricula}}</td>
                                    <td>{{$medico->medico_especialidad}}</td>
                                    @if(isset($medico->centro->centro_nombre))
                                       <td>{{$medico->centro->centro_nombre}}</td>                                    
    
                                       @else
                                       <td></td>                                    
                                                                      
                                    @endif
                                    <td>{{$medico->medico_estado=='A' ? 'ACTIVO' : 'INACTIVO'}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.medicos.edit', $medico)}}">Editar</a>
                                        <a class="btn btn-info" href="{{route('medico.asignar', $medico)}}">Asignar Centro</a>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>                
            </div>
   
            <div class="card-footer">
                {{$medicos->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros</strong>        
            </div>
        @endif    
        <div class="card-footer">
            <a class="btn btn-primary" href="{{route('admin.medicos.create')}}">NUEVO MEDICO</a>           
       </div>

    </div>
</div>
