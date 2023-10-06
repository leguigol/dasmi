<div>
    <div class="card">
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif
    
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingreso el nombre de un plan">
    </div>
    @if ($planes->count())            
        <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PLAN</th>
                            <th>CONVENIO</th>
                            <th>ACCION</th>
                    </thead>
                    <tbody>
                        @foreach ($planes as $plan)
                            <tr>
                                <td>{{$plan->id}}</td>
                                <td>{{$plan->plan_nombre}}</td>
                                <td>{{$plan->convenio->convenio_nombre}}</td>
                                <td>
                                    <div class="d-inline-block">
                                        <a class="btn btn-primary" href="{{route('admin.planes.edit', $plan)}}">Editar</a>
                                    </div>
                                    <div class="d-inline-block">
                                        {!! Form::open(['route' => ['admin.planes.destroy', $plan->id], 'method'=> 'delete', 'class'=>'formu-eliminar']) !!}
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
        
    @else
        <div class="card-body">
            <strong>No hay registros</strong>        
        </div>
    @endif    
    <div class="card-footer">
        <a class="btn btn-primary" href="{{route('admin.planes.create')}}">NUEVO PLAN</a>           
   </div>

</div>

</div>
