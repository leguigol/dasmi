<div>
    <div class="card">

        <div class="card-header">
            <a href="{{route('padrones.create')}}" class="btn btn-primary ps-5 mb-3">NUEVO AFILIADO</a>
             <input wire:model="search" type="text" class="form-control" placeholder="Ingrese Apellido o DNI a buscar del padron">
        </div>
        @if ($padrones->count())            
            <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nº AFILIADO</th>
                                <th>APELLIDO</th>
                                <th>NOMBRES</th>
                                <th>DNI</th>
                                <th>CONVENIO</th>
                                <th>ACCION</th>
                        </thead>
                        <tbody>
                            @foreach ($padrones as $padron)
                                <tr>
                                    <td>{{$padron->id}}</td>
                                    <td>{{$padron->afiliado}}</td>
                                    <td>{{$padron->apellido}}</td>
                                    <td>{{$padron->nombres}}</td>
                                    <td>{{$padron->documento}}</td>
                                    <td>{{$padron->convenio->convenio_nombre}}</td>
                                    <td>
                                        <div class="d-inline-block">
                                            <a class="btn btn-primary" href="{{route('padrones.edit', $padron->id)}}">Editar</a>
                                        </div>
                                        <div class="d-inline-block">
                                            {!! Form::open(['route' => ['padrones.destroy', $padron->id], 'method'=> 'delete', 'class'=>'formu-eliminar']) !!}
                                                {!! Form::submit('BORRAR', ['class'=>'btn btn-danger']) !!}     
                                            {!! Form::close() !!}    
                                        </div>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>                
                </div>
            </div>
            <div class="card-footer">
                {{$padrones->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros</strong>        
            </div>
        @endif    
    </div>
</div>
