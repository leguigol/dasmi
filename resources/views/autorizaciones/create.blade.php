@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
    <h1>ALTA DE AUTORIZACION</h1>
@stop

@section('content')
@if(session()->has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '{{ session('success') }}',        
    });
</script>
@endif

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" /> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<style>
    table td:first-child{
      width: 100px;
    }
    table td:nth-child(2){
      width: 400px;
    }
    table td:nth-child(3){
      width: 100px;
    }
    table td:nth-child(4){
      width: 100px;
    }
    table td:last-child{
      width: 50px;
    }
</style>    
@stop


{!! Form::open(['route' => 'autorizaciones.store']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">                
               {!! Form::label('Prestador Solicitante')!!}
                    <select name="prestador" id="prestador" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option>Seleccione una opcion </option>
                        @foreach ($prestadores as $prestador)
                            <option value="{{$prestador->id}}" @if(old('prestador')==$prestador->id) selected @endif>{{$prestador->prestador_nombre}}</option>
                        @endforeach
                    </select>    
                    @error('prestador')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror   
            </div>    
            <div class="col-md-3">                
                {!! Form::label('Afiliado')!!}
                    <select id="afiliado" name="afiliado" class="afiliado" style="width: 100%;">
                        @foreach ($afidata as $data)
                        <option disabled selected value>Seleccione una opción</option>
                        <option value="{{ $data->id }}" @if(old('afiliado')==$data->id) selected @endif>{{ $data->afiliado . '-'. $data->apellido.' '.$data->nombres }}</option>
                        @endforeach
                    </select>                       
                    @error('afiliado')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror   
             </div>    
            <div class="col-md-1">                
                {!! Form::label('Convenio')!!}
                <input type="text" name="convenio" id="convenio" class="form-control" value="{{old('convenio')}}" readonly/>
            </div>   
            <div class="col-md-2 mt-2">                
                {!! Form::label('')!!}
                <input type="text" name="nconvenio" id="nconvenio" class="form-control" value="{{old('nconvenio')}}" readonly/>
            </div>    
        </div>
        <div class="row mt-1">
            <div class="col-md-3">                
               {!! Form::label('Fecha Prescripcion')!!}
               <input type="date" name="fechaprescri" id="fechaprescri" class="form-control" value="{{old('fechaprescri')}}">
                @error('fechaprescri')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>    
            <div class="col-md-2">                
                {!! Form::label('Matricula Prescriptor')!!}
                <input type="text" name="matricula" id="matricula" class="form-control" value="{{old('matricula')}}" onblur="llamarFunmatri()"/>
                @error('matricula')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>    
            <div class="col-md-6">                
                {!! Form::label('Medico Prescriptor')!!}
                <input type="text" id="medico" name="medico" class="form-control" value="{{old('medico')}}" required/>
                {{-- {!! Form::text('medico','',['class'=>'form-control']) !!} --}}
                @error('medico')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>
            <div class="col-md-1">                
                {!! Form::label('Es Staff ?')!!}
                <input type="text" name="staff" id="staff" class="form-control" />
                {{-- {!! Form::text('staff','',['class'=>'form-control']) !!} --}}
                @error('staff')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>    
        </div>
        <div class="row mt-1">
            <div class="col-md-6">                
                {!! Form::label('Diagnostico')!!}
                <input type="text" name="diagnostico" id="diagnostico" class="form-control"/>
                @error('diagnostico')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>    
            <div class="col-md-6">                
                {!! Form::label('Observaciones')!!}
                <textarea name="observaciones" id="observaciones" class="form-control" rows="1" cols="50"></textarea>
                @error('diagnostico')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>    
        </div>
        <div class="row mt-2 mx-1">
            <div class="form-check-inline">
                @foreach ($etiquetas as $etiqueta)
                        <input class="form-check-input" type="radio" id="categorias" name="categorias" value="{{ $etiqueta->id}}">
                        <label class="form-check-label mr-3">{{$etiqueta->descripcion}}</label>
                @endforeach        
            </div>        
        <div class="row mt-2">
        </div>
</div>    
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">                
                {!! Form::label('Practica:')!!}
            </div>    
            <div class="col-md-2">                
                {!! Form::label('Cantidad:')!!}
            </div>    
            <div class="col-md-2">                
            </div>    
        </div>
        <div class="row">
            <div class="col-md-6">                
                <select id="practica" name="practica" class="practica" style="width: 100%;">
                    <option value="">Seleccione una opcion</option>
                     @error('practica')
                        <strong style="color:red">*{{$message}}</strong>
                    @enderror   
                </select>
            </div>    
            <div class="col-md-2">                
                <input type="text" name="cantidad" id="cantidad" class="form-control"/>
                @error('cantidad')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>    
            <div class="col-md-2">                
                <button type="button" class="btn btn-success" id="agregarbtn">AGREGAR</button>
                @error('cantidad')
                    <strong style="color:red">*{{$message}}</strong>
                @enderror   
            </div>    
        </div>
 
    </div>
</div>                
<div class="row mt-2">
    <table class="table table-striped" name="tablaPracticas" id="tablaPracticas">
        <thead>
            <tr>
                <th scope="col">PRACTICA</th>
                <th scope="col">DESCRIPCION</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">COSEGURO</th>
                <th scope="col">ACCION</th>
            </tr>
        </thead>
            <tbody id="lista">
            </tbody>
            @error('practica')
            <strong style="color:red">*{{$message}}</strong>
        @enderror   
    
    </table>        
    @error('tablaPracticas')
        <strong style="color:red">*{{$message}}</strong>
    @enderror   
</div>               

<div class="row">
    <div class="col-md-2 p-2">
        <label for="contador">TOTAL COSEGURO:</label>
        <input type="text" name="contador" id="contador" value="" class="form-control" readonly>
    </div>    
</div>

<div class="row">
    <div class="col md-4 p-2">
         {!! Form::submit('GRABAR AUTORIZACION', ['class'=>'btn btn-primary']) !!}
    </div>          
    <div class="col md-4 p-2">
        {{-- {!! Form::submit('RECALCULAR COSEGUROS', ['class'=>'btn btn-warning','id'=>'recalcularBtn','name'=>'recalcularBtn']) !!} --}}
        <button class="btn btn-warning" id="recalcularBtn" name="recalcularBtn" class="form-control">RECALCULAR COSEGUROS</button> 
    </div>          

</div>

{{! Form::close() }}
@stop


@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    
    $(document).ready(function() {
        $(document).on("select2:open", () => {
            document.querySelector(".select2-container--open .select2-search__field").focus()
        })
        $('#prestador').select2({
            theme: 'bootstrap-5'
        });
        
        var afiselected="{{old('afiliado')}}";
        var convselected="{{old('convenio')}}";
        var nconvselected="{{old('nconvenio')}}";
        var matriselected="{{old('matricula')}}";
        // var practiselected="{{old('practica')}}";

        // console.log('practica:'+practiselected);

        $('#afiliado').select2({
            theme: 'bootstrap-5',
            ajax: {
                url:"{{ route('traerAfiliados') }}",
                dataType: 'json',
                placeholder: 'Buscar afiliados',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.afiliado+'-'+item.apellido+' '+item.nombres,
                                id: item.id
                            }
                        })    
                    };  
                    if (afiselected && data.find(item => item.id == afiselected)) {
                        var selectedOption = {
                            id: afiselected,
                            text: item.afiliado+'-'+item.apellido+' '+item.nombres,
                        };
                        results.unshift(selectedOption);
                    }
                    return {
                        results: results
                    };
                },
                cache: true
            }

        });
        if (afiselected) {
           $('#afiliado').val(afiselected).trigger('change');
        }
        if (matriselected) {
            $('#matricula').val(matriselected).trigger('onblur');
        }  

        document.getElementById('recalcularBtn').addEventListener('click',function(event){
            event.preventDefault();
            var total=0;
            var tabla=document.getElementById('lista');

            for(var i=0;i<tabla.rows.length; i++){
                var fila=tabla.rows[i];
                var valorCelda = parseInt(fila.cells[3].querySelector("input").value);
                total+=isNaN(valorCelda) ? 0: valorCelda;
            }
            $('#contador').val(total);

            var radios = document.getElementsByName("categorias");
            var selectedValue;

            for (var i = 0; i < radios.length; i++) {
               if (radios[i].checked) {
                    selectedValue = radios[i].value;
                    break;
               }
            }

                    //console.log(selectedValue);
            if(selectedValue!=null){
                var cate=selectedValue;
                var url= "{{ route('traerCategoria') }}";
                $.ajax({
                    type: 'POST',
                    async: false,
                    data: {valor: cate, _token: '{{ csrf_token() }}'},
                    url: url,
                    success: function(data){
                        if(typeof data.coseguro !='undefined'){
                            if(data.coseguro!=null){
                                if(data.coseguro==0){
                                    $('#contador').val(data.coseguro);
                                }
                            }                           
   //                         console.log('valor de la cate:'+data.coseguro);
                        }    
                    }
                })
            }
        })
        $('#afiliado').on('change',function(event) {
            var selectedOption=$(this).select2('data');
            var selectedId=selectedOption[0].id;

            //console.log(selectedId);
            $.ajax({
                url:'{{ route('buscaConvenio')}}',
                method: 'GET',
                data: { id: selectedId },
                success: function(response) {
                    //console.log(response[0]);
                    $('#convenio').val(response[0].convenio_id);
                    $('#nconvenio').val(response[0].nombreConvenio);
                    $('#fechaprescri').focus();
                },
                error: function(xhr, status, error){
                    console.log('error:'+error);
                }
            });
            var convenioId=selectedOption.convenio_id;
        });

        $('#practica').select2({
            theme: 'bootstrap-5',
            ajax: {
                url:"{{ route('traerPracticas') }}",
                dataType: 'json',
                placeholder: 'Buscar practica',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.codigo+'-'+item.descripcion,
                                id: item.id
                            }
                        })    
                    };  
                },
                cache: true
            }

        });

        let sumacoseguro=0;

        $('#contador').val(sumacoseguro);

    });    
    

    $('#agregarbtn').click(function(e){
        e.preventDefault();
        var _p=document.getElementById("practica");
        var _p2=_p.selectedOptions[0].text;
        var index=_p2.indexOf("-");
        var _practica=_p2.substring(0,index);
        var _descripcion=_p2.substring(index+1);
        var _cantidad=document.getElementById("cantidad").value;
        var _coseguro=obtenerCoseguro(_practica,_cantidad);
        if(_cantidad=="" || _cantidad==0){
            Swal.fire('No puede dejar cantidad vacia')
        }else{

            var fila="<td><input type='text' name='practica[]' class='form-control' value='"+_practica+"'></td><td><input type='text' name='descrip[]' class='form-control' value='"+_descripcion+"'></td><td><input type='text' name='cantidad[]' class='form-control' value='"+_cantidad+"'></td><td><input type='text' name='coseguro[]' class='form-control' value='"+_coseguro+"'></td><td><button class='form-control btn btn-danger' onclick='deleteRow(this)'>X</button></td></tr>";
            var aux=document.createElement("TR");
            aux.innerHTML=fila;
            document.getElementById('lista').appendChild(aux);
        }    
    });

    function obtenerCoseguro(pp,cc){
        var valor=0;
        var convenio=$('#convenio').val();
        var vigencia=$('#fechaprescri').val();
        $.ajax({
            type: 'POST',
            async: false,
            data: {practica: pp, convenio: convenio, vigencia: vigencia, _token: '{{ csrf_token() }}'},
            url: "{{route('traerCoseguro')}}",
            success: function(data){
                if(typeof data.coseguro !='undefined'){
                    //console.log(data.coseguro);
                    valor=data.coseguro*cc;
                    let temp=parseInt($('#contador').val());
                    let temp2=temp+valor;
                    $('#contador').val(temp2);
                    var radios = document.getElementsByName("categorias");
                    var selectedValue;

                    for (var i = 0; i < radios.length; i++) {
                        if (radios[i].checked) {
                            selectedValue = radios[i].value;
                            break;
                        }
                    }

                    //console.log(selectedValue);
                    if(selectedValue!=null){
                        var cate=selectedValue;
                        var url= "{{ route('traerCategoria') }}";
                        $.ajax({
                            type: 'POST',
                            async: false,
                            data: {valor: cate, _token: '{{ csrf_token() }}'},
                            url: url,
                            success: function(data){
                                if(typeof data.coseguro !='undefined'){
                                    if(data.coseguro!=null){
                                        if(data.coseguro==0){
                                            $('#contador').val(data.coseguro);
                                        }
                                    }                           
                                    //console.log('valor de la cate:'+data.coseguro);
                                }    
                            }
                        })
                    }
                }else{
                    valor=0;
                }
            }
        });    
        return valor;
    }
    function llamarFunmatri(){
            var matricula=document.getElementById('matricula').value;
            var url = "{{ route('traerMedico') }}";
            $.ajax({
                    type:'post',
                    data: {valor: matricula, _token: '{{ csrf_token() }}'},
                    url: url,
                    success: function(data){
                        if(data.length>0){
                            $('#medico').val(data[0].medico_apellido+" "+data[0].medico_nombres);
                            $('#staff').val('S');
                            $('#medico').prop('readonly',true);
                            $('#staff').prop('readonly',true);
                        }else{
                            $('#medico').val('');
                            $('#staff').val('N');
                            $('#medico').prop('readonly',false);
                            $('#staff').prop('readonly',true);
                        }
                    },
                    error: function() {
                        // Manejar los errores aquí
                        alert("Ha ocurrido un error al obtener los resultados.");
                    }                
            }); 
        $('#diagnostico').focus();               
    }
    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        var valor=parseInt(row.cells[3].querySelector("input").value);
        row.parentNode.removeChild(row);
        let temp=parseInt($('#contador').val());
        let temp2=temp-valor;
        $('#contador').val(temp2);
    }

</script>

        
@stop