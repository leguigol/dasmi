<div>
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <select class="form-control col-mb-4" wire:model="selectedConvenio">
                        @foreach ($convenios as $convenio)
                            <option value="{{$convenio->id}}">{{$convenio->convenio_nombre}}</option>
                        @endforeach    
                    </select>    
                </div>    
                <div class="col-md-3">
                    <input wire:model="search" type="text" class="form-control" placeholder="practica">
               </div>           
            </div>    
        </div>
        
        @if ($convenios->count())            
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('admin.coseguros.create')}}">NUEVO COSEGURO</a>           
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>PRACTICA DESDE</th>
                                <th>PRACTICA HASTA</th>
                                <th>CANTIDAD</th>
                                <th>COSEGURO</th>
                                <th>VIGENCIA (Vto)</th>
                                <th>ACCION</th>
                            </tr>    
                        </thead>
                        <tbody>
                        @foreach ($coseguros as $coseguro)
                        <tr>
                            <td>{{$coseguro->id}}</td>
                            <td>{{$coseguro->pca_desde}}</td>
                            <td>{{$coseguro->pca_hasta}}</td>
                            <td>{{$coseguro->cantidad}}</td>
                            <td>{{$coseguro->coseguro}}</td>
                            <td>{{$coseguro->vigencia}}</td>
                            <th>
                                <div>
                                    <a class="btn btn-danger" wire:click.prevent="deleteConfirmation({{$coseguro->id}})">X</a> 
                                </div>
                            </th>
                        </tr>                            
                        @endforeach
                        </tbody>
                    </table>                
            </div>
   
            <div class="card-footer">
                {{-- {{$especia->links()}} --}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros</strong>        
            </div>
        @endif    
        <div class="card-footer">
       </div>
    </div>
    
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('delete-confirmation', event => {
                Swal.fire({
                title: 'Estas seguro?',
                text: "No vas a poder revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrarlo!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
                })            
            });

            window.addEventListener('coseguroDeleted', event => {
                    Swal.fire(
                    'Borrado!',
                    'El coseguro ha sido borrado.',
                    'success'
                    )
            });

        </script>

    @endpush
</div>
