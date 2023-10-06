<div>

    <div class="card">
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        @endif
    
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el nombre de un Medico">
        </div>
        <div class="card-body">
            @if ($horarios->count())            
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MEDICO</th>
                                <th>DIA</th>
                                <th>DESDE</th>
                                <th>HASTA</th>
                                <th>INTERVALO</th>
                                <th>ACCION</th>
                            </tr>    
                        </thead>
                        <tbody>
                                @foreach ($horarios as $item)
                                    
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->medico_apellido}}</td>
                                    <td>{{$item->dia}}</td>
                                    <td>{{$item->desde}}</td>
                                    <td>{{$item->hasta}}</td>
                                    <td>{{$item->intervalo}}</td>
                                    <td>
                                        <div class="d-inline-block">
                                            <a class="btn btn-primary btn-sm" style="display: inline-block" href="{{route('horario.edit', $item->id)}}">Editar</a>
                                        </div>    
                                        <div class="d-inline-block">
                                            <form action="{{route('horario.destroy', $item->id)}}" type="submit" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" style="display: inline-block">Borrar</button>
                                            </form>    
                                        </div>    
                                    </td>
                                </tr>    
                                @endforeach    
                        </tbody>                    
                    </table>               
                <div>{{ $horarios->links() }}</div>    
        </div>    
        @else
            <div class="card-body">
                <strong>No hay registros</strong>        
            </div>
        @endif    
    </div>
    
</div>
