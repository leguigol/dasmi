<div>
    <div class="card">
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif
    
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingreso el nombre de un prestador">
    </div>

    <div class="card-footer">
        <a class="btn btn-primary" href="{{route('admin.prestadores.create')}}">NUEVO PRESTADOR</a>           
   </div>

    @if ($presta->count())            
        <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PRESTADOR</th>
                            <th>DOMICILIO</th>
                            <th>LOCALIDAD</th>
                            <th>ESPECIALIDAD</th>
                            <th>FECHA BAJA</th>
                            <th>ACCION</th>
                    </thead>
                    <tbody>
                        @foreach ($presta as $pres)
                            <tr>
                                <td>{{$pres->id}}</td>
                                <td>{{$pres->prestador_nombre}}</td>
                                <td>{{$pres->domicilio}}</td>
                                <td>{{$pres->localidad}}</td>
                                <td>{{$pres->especialidad->especialidad_nombre}}</td>
                                @if (isset($pres->fecha_baja))
                                    <td></td>                                    
                                @else
                                    <td>{{$pres->fecha_baja}}</td>                                    
                                @endif
                                <td>
                                    <div class="d-inline-block">
                                        <a class="btn btn-primary" href="{{route('admin.prestadores.show',$pres->id)}}">Editar</a>
                                    </div>
                                    <div class="d-inline-block">
                                        {{-- {!! Form::open(['route' => ['admin.planes.destroy', $plan->id], 'method'=> 'delete', 'class'=>'formu-eliminar']) !!}
                                            {!! Form::submit('BORRAR', ['class'=>'btn btn-danger']) !!}     
                                        {!! Form::close() !!}     --}}
                                    </div>

                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>                
            </div>
        </div>
        
    @else
        <div class="card-body">
            <strong>No hay registros</strong>        
        </div>
    @endif    

</div>

</div>
