<div>
    <div class="card">

        <div class="card-header">
             <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de la droga">
        </div>
        @if ($drogas->count())            
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('admin.vademecum.create')}}">NUEVA DROGA</a>           
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MONODROGA</th>
                                <th>PRODUCTO</th>
                                <th>PRESENTACION</th>
                                <th>LABORATORIO</th>
                                <th>ACCION TERAPEUTICA</th>
                                <th>ACCION</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($drogas as $droga)
                                <tr>
                                    <td>{{$droga->id}}</td>
                                    <td>{{$droga->monodroga}}</td>
                                    <td>{{$droga->producto}}</td>
                                    <td>{{$droga->presentacion}}</td>
                                    <td>{{$droga->laboratorio}}</td>
                                    <td>{{$droga->accion}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.vademecum.show',$droga->id)}}">Editar</a>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>                
            </div>
   
            <div class="card-footer">
                {{$drogas->links()}}
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
