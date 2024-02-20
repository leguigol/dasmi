<div>

    <div class="card">

        <div class="card-header">
            <a href="{{route('internaciones.preview')}}" class="btn btn-primary ps-5 mb-3">NUEVA INTERNACION</a>
             <input wire:model="search" type="text" class="form-control" placeholder="Ingrese Apellido o DNI a buscar del padron">
        </div>
        @if ($internaciones->count())            
            <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nº AFILIADO</th>
                                <th>APELLIDO</th>
                                <th>NOMBRES</th>
                                <th>FECHA INGRESO</th>
                                <th>PRESTADOR</th>
                                <th>ESTADO</th>
                                <th>ACCION</th>
                        </thead>
                        <tbody>
                            @foreach ($internaciones as $internacion)
                                <tr>
                                    <td>{{$internacion->id}}</td>
                                    <td>{{$internacion->padron->afiliado}}</td>
                                    <td>{{$internacion->padron->apellido}}</td>
                                    <td>{{$internacion->padron->nombres}}</td>
                                    <td>{{ date('d-m-Y', strtotime($internacion->fecha_ingreso))}}</td>
                                    <td>{{$internacion->prestador->prestador_nombre}}</td>
                                    @if ($internacion->estados->last()->estado==='P')
                                        <td>
                                            <span class="badge bg-primary">Pendiente</span>                                        
                                        </td>    
                                    @endif
                                    @if ($internacion->estados->last()->estado==='A')
                                        <td>
                                            <span class="badge bg-success">Autorizado</span>                                        
                                        </td>    
                                    @endif
                                    @if ($internacion->estados->last()->estado==='R')
                                        <td>
                                            <span class="badge bg-danger">Rechazado</span>                                        
                                        </td>    
                                    @endif
                                    <td>
                                        <div class="d-inline-block">
                                            <a class="btn btn-primary" href="{{route('internaciones.show', $internacion->id)}}">Ver</a>
                                        </div>
                                       <div class="d-inline-block">
                                            <a class="btn btn-info" href="{{route('internaciones.edit', $internacion->id)}}">Editar</a>
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="d-inline-block">
                                                {!! Form::open(['route' => ['internaciones.destroy', $internacion->id], 'method'=> 'delete', 'class'=>'formu-eliminar']) !!}
                                                {!! Form::submit('X', ['class'=>'btn btn-danger']) !!}     
                                                {!! Form::close() !!}    
                                            </div>
                                        </div>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>                
                </div>
            </div>
            <div class="card-footer">
                {{$internaciones->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros</strong>        
            </div>
        @endif    
    </div>



</div>
