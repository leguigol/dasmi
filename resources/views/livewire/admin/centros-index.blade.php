<div>
    <div class="card">
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif
    
    <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingreso el nombre de un Centro">
    </div>
    @if ($centros->count())            
        <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>RESPONSABLE</th>
                            <th>ACCION</th>
                    </thead>
                    <tbody>
                        @foreach ($centros as $centro)
                            <tr>
                                <td>{{$centro->id}}</td>
                                <td>{{$centro->centro_nombre}}</td>
                                <td>{{$centro->centro_responsable}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('admin.centros.edit', $centro)}}">Editar</a>

                                </td>
                        @endforeach
                    </tbody>
                </table>                
            </div>
        </div>
        <div class="card-footer">
             <a class="btn btn-primary" href="{{route('admin.centros.create')}}">NUEVO CENTRO</a>           
        </div>
        
    @else
        <div class="card-body">
            <strong>No hay registros</strong>        
        </div>
    @endif    
    </div>

</div>
