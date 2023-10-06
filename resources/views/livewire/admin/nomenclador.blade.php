<div>
    <div class="card">

        <div class="card-header">
             <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de la practica">
        </div>
        @if ($practicas->count())            
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('admin.nomenclador.create')}}">NUEVA PRACTICA</a>           
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CODIGO</th>
                                <th>DESCRIPCION</th>
                                <th>TIPO</th>
                                <th>AUTORIZ.</th>
                                <th>ACCION</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($practicas as $practica)
                                <tr>
                                    <td>{{$practica->id}}</td>
                                    <td>{{$practica->codigo}}</td>
                                    <td>{{$practica->descripcion}}</td>
                                    <td>{{$practica->tipo}}</td>
                                    <td>{{$practica->auto}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.nomenclador.show', $practica->id)}}">Editar</a>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>                
            </div>
   
            <div class="card-footer">
                {{$practicas->links()}}
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
