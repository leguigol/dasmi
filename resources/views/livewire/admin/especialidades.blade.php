<div>
    <div class="card">

        <div class="card-header">
             <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de la especialidad">
        </div>
        @if ($especia->count())            
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('admin.especialidades.create')}}">NUEVA ESPECIALIDAD</a>           
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ESPECIALIDAD</th>
                                <th>ACCION</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($especia as $espe)
                                <tr>
                                    <td>{{$espe->id}}</td>
                                    <td>{{$espe->especialidad_nombre}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.especialidades.edit', $espe->id)}}">Editar</a>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>                
            </div>
   
            <div class="card-footer">
                {{$especia->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros</strong>        
            </div>
        @endif    
        <div class="card-footer">
       </div>

    </div>

</div>
