@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')

<div class="row">
    <div class="col-md-6">                
        <h5>HISTORIA CLINICA</h5>
        <h1>EVOLUCION DEL PACIENTE - {{$padron->apellido . " " . $padron->nombres}} </h1>
    </div>

</div>
@stop

@section('content')
{!! Form::open(['route' => 'evolucion.store']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
          <div class="card">
            <div class="card-header">EVOLUCION</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">    
                        <label class="input-group-text" for="inputGroupSelect01">Medico</label>
                    </div>              
                    <div class="col-md-10">    
                        <input type="text" class="form-control" name="medico" value="{{Auth::user()->name}}" disabled>
                    </div>              
                </div>  
                <div class="row mt-2">
                  <div class="col-md-2">    
                    <label class="input-group-text" for="inputGroupSelect01">Fecha</label>
                  </div>              
                  <div class="col-md-10">    
                    <input type="date" class="form-control" name="fecha" value="{{date('Y-m-d')}}" readonly>
                  </div>              
                </div>  
                <div class="row mt-2">
                  <div class="input-group mb-2">
                      <div class="col-md-2">    
                          <label class="input-group-text" for="inputGroupSelect01">Subjetivo</label>
                      </div>              
                        <div class="col-md-10">                  
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="subjetivo" rows="3">{{old('subjetivo')}}</textarea>
                            @error('subjetivo')
                              <strong style="color:red">*{{$message}}</strong>
                            @enderror   
                        </div>    
                  </div>  
                </div>
                <div class="row mt-2">
                  <div class="input-group mb-2">
                      <div class="col-md-2">    
                          <label class="input-group-text" for="inputGroupSelect01">Objetivo</label>
                      </div>              
                      <div class="col-md-10">                  
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="objetivo">{{old('objetivo')}}</textarea>
                          @error('objetivo')
                            <strong style="color:red">*{{$message}}</strong>
                        @enderror   
                  </div>    
                  </div>  
                </div>
            </div>    
          </div>    

          <div class="card">
            <div class="card-header">EVALUACION</div>
              <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-2">    
                        <label class="input-group-text" for="inputGroupSelect01">Problema</label>
                    </div>              
                    <div class="col-md-6">                                  
                       <select class="form-control select2" name="problema" id="problema" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>Seleccione una opcion </option>
                           @foreach ($problemas as $problema)
                               <option value="{{$problema->id .'-'.$problema->capitulo . "-". $problema->descripcion}} {{$problema->id==old('problema' ? 'selected' : '')}}">{{$problema->capitulo . "-". $problema->descripcion}}</option>
                           @endforeach
                      </select>    
                      @error('problema.id')
                      <strong style="color:red">*{{$message}}</strong>
                      @enderror   
                    </div>    
                    <div class="col-md-2">    
                      <input type="button" value="Agregar Problema" class="btn btn-primary" id="agregarbtn">
                    </div>  
                </div>    
                <div class="row mt-2">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th scope="col-md-2">Id</th>
                              <th scope="col-md-5">Descripcion</th>
                              <th scope="col-md-2">Inicio</th>
                              <th scope="col-md-2">Resolucion</th>
                              <th scope="col-md-1">Accion</th>
                          </tr>
                      </thead>
                          <tbody id="lista">
                          </tbody>
                  </table>                  
                </div>    
              </div>               
          </div>    

          <div class="card">
              <div class="card-header">PLAN</div>
              <div class="card-body">
                  <div class="row mt-2">
                    <div class="input-group mb-2">
                        <div class="col-md-2">    
                            <label class="input-group-text" for="inputGroupSelect01">Detalle del Plan</label>
                        </div>              
                        <div class="col-md-8">                  
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="detalle" rows="3"></textarea>
                        </div>    
                    </div>  
                  </div>  
                  <div class="row mt-1">
                    <div class="col-md-2">    
                        <label class="input-group-text" for="inputGroupSelect01">Proceso</label>
                    </div>              
                    <div class="col-md-6">                                  
                        <select class="form-control select2" name="proceso" id="proceso">
                            <option>Seleccione una opcion </option>
                            @foreach ($procesos as $proceso)
                                <option value="{{$proceso->id .'-'.$proceso->codigo . "-". $proceso->proceso}} {{$proceso->id==old('problema' ? 'selected' : '')}}">{{$proceso->codigo . "-". $proceso->proceso}}</option>
                            @endforeach
                        </select>    
                        @error('proceso.id')
                          <strong style="color:red">*{{$message}}</strong>
                        @enderror     
                    </div>    
                    <div class="col-md-2">    
                      <input type="button" value="Agregar Proceso" class="btn btn-primary" id="agregarbtn2">
                    </div>  
                  </div>    
                  <div class="row mt-2">
                    <div class="col-md-2">    
                        <label class="input-group-text" for="inputGroupSelect01">Problema Asociado</label>
                    </div>              
                    <div class="col-md-4">                                  
                       <select class="form-control" name="problema2" id="problema2">
                        {{-- style="width: 600px; height:200px;" --}}
                           <option>Seleccione una opcion </option>
                       </select>    
                    </div>    
                  </div>  

                  <div class="row mt-2">
                    <table class="table table-striped" id="plan">
                        <thead>
                            <tr>
                              <th scope="col-md-1">Id</th>
                                <th scope="col-md-4">Descripcion</th>
                                <th scope="col-md-1">Id</th>
                                <th scope="col-md-4">Problema</th>
                                <th scope="col-md-2">Accion</th>
                            </tr>
                        </thead>
                            <tbody id="lista2">
                            </tbody>
                    </table>                  
                  </div>      
              </div> 
          </div>    

          <div class="card">
            <div class="card-header">SOLICITACION DE ESTUDIOS</div>
              <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-2">    
                        <label class="input-group-text" for="inputGroupSelect01">Estudio:</label>
                    </div>              
                    <div class="col-md-6">                                  
                       <select class="form-control select2" name="estudio" id="estudio" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>Seleccione una opcion </option>
                           @foreach ($practicas as $estudio)
                               <option value="{{$estudio->id .'-'.$estudio->codigo . "-". $estudio->descripcion}} {{$estudio->id==old('estudio' ? 'selected' : '')}}">{{$estudio->codigo . "-". $estudio->descripcion}}</option>
                           @endforeach
                       </select>    
                       @error('estudio.id')
                        <strong style="color:red">*{{$message}}</strong>
                       @enderror     
                    </div>    
                    <div class="col-md-2">    
                      <input type="button" value="Agregar Estudio" class="btn btn-primary" id="agregarbtn3">
                    </div>  
                </div>    
                <div class="row mt-2">
                  <table class="table table-striped" id="estudios">
                      <thead>
                          <tr>
                              <th scope="col-md-2">Id</th>
                              <th scope="col-md-5">Descripcion</th>
                              <th scope="col-md-2">Fecha</th>
                              <th scope="col-md-2">Accion</th>
                          </tr>
                      </thead>
                          <tbody id="lista3">
                          </tbody>
                  </table>                  
                </div>    
              </div>               
          </div>    
          
          <div class="card">
            <div class="card-header">MEDICACION</div>
              <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-2">    
                        <label class="input-group-text" for="inputGroupSelect01">Monodroga:</label>
                    </div>              
                    <div class="col-md-6">                                  
                       <select class="form-control select2" name="monodroga" id="monodroga" style="width: 100%;" tabindex="-1" aria-hidden="true">
                           <option>Seleccione una opcion </option>
                           @foreach ($drogas as $droga)
                               <option value="{{$droga->id .'-'.$droga->monodroga}} {{$droga->id==old('monodroga' ? 'selected' : '')}}">{{$droga->monodroga . '-' .$droga->producto . '-' . $droga->presentacion}} </option>
                           @endforeach
                       </select>    
                    </div>    
                    <div class="col-md-2">    
                      <input type="button" value="Agregar Medicamento" class="btn btn-primary" id="agregarbtn4">
                    </div>  
                </div>    
                <div class="row mt-2">
                  <table class="table table-striped" id="medicamentos">
                      <thead>
                          <tr>
                              <th scope="col-md-2">Id</th>
                              <th scope="col-md-5">Monodroga</th>
                              <th scope="col-md-2">Indicacion</th>
                              <th scope="col-md-2">Fecha</th>
                              <th scope="col-md-2">Cronico</th>
                              <th scope="col-md-2">Accion</th>
                          </tr>
                      </thead>
                          <tbody id="lista4">
                          </tbody>
                  </table>                  
                </div>    
              </div>  
          </div>    

          <div class="card">
            <div class="card-header">PENDIENTE</div>
              <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-12">                                  
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="pendiente" rows="3">{{old('pendiente')}}</textarea>
                    </div>    
                </div>    
              </div>  
            </div>  
          </div>    

        <div class="row m-2">                            
            <div class="col-md-3 mb-2">
              <button class="form-control btn btn-primary" type="submit">GRABAR EVOLUCION</button>
            </div>
            <div class="col-md-3 mb-2">
              <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
            </div>
        </div>    
{!! form::close() !!}


@stop

@section('css')
<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

<style>
table td:first-child{
  width: 100px;
}
table td:nth-child(2){
  width: 800px;
}
table td:nth-child(3){
  width: 350px;
}
table td:nth-child(4){
  width: 350px;
}
table td:last-child{
  width: 100px;
}

table#plan td:first-child{
    width: 100px;
}
table#plan td:nth-child(2){
    width: 350px;
}
table#plan td:nth-child(3){
    width: 100px;
}
table#plan td:nth-child(4){
    width: 350px;
}
table#plan td:last-child{
    width: 100px;
}


table#estudios td:first-child{
    width: 100px;
}
table#estudios td:nth-child(2){
    width: 600px;
}
table#estudios td:nth-child(3){
  width: 100px;
}
table#estudios td:last-child{
  width: 100px;
}

table#medicamentos td:first-child{
    width: 100px;
}
table#medicamentos td:nth-child(2){
    width: 600px;
}
table#medicamentos td:nth-child(3){
  width: 400px;
}
table#medicamentos td:nth-child(4){
  width: 100px;
}
table#medicamentos td:nth-child(5){
  text-align: center;
  width: 40px;
}

table#estudios td:last-child{
  width: 100px;
}

</style>
@stop

@section('js')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script>
  $(document).ready(function() {
      $('#problema').select2({
        theme: 'bootstrap-5'
      });
      $('#proceso').select2({
        theme: 'bootstrap-5'
    });
    $('#estudio').select2({
        theme: 'bootstrap-5'
    });
    $('#monodroga').select2({
        theme: 'bootstrap-5'
    });

  });    

  $('#agregarbtn').click(function(e){
        e.preventDefault();
        var _problema=document.getElementById("problema").value;
        // console.log(_problema);
        if(_problema!='Seleccione una opcion'){
          var ini1=_problema.indexOf('-'); 
          var _problema1=_problema.substring(0,ini1); 
          var largo=_problema.length;
          var _problema2=_problema.substring(ini1+1,largo); 
          
          var date = new Date();
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();

          if (month < 10) month = "0" + month;
          if (day < 10) day = "0" + day;

          var today = year + "-" + month + "-" + day;         

          var fila="<tr><td><input type='text' name='problemaid[]' class='form-control' value='"+_problema1+"'></td><td><input type='text' name='problema[]' class='form-control' value='"+_problema2+"'></td><td><input type='date' name='problemainicio[]' class='form-control' value='"+today+"'></td><td><input type='date' name='problemares[]' class='form-control' value=''></td><td><button class='form-control btn btn-danger' onclick='deleteRow(this)'>X</button></td></tr>";
          var aux=document.createElement("TR");
          aux.innerHTML=fila;
          document.getElementById('lista').appendChild(aux);  

          var pro2=document.getElementById("problema2");
          var option=document.createElement("option");
          option.text=_problema2;
          pro2.add(option);
        }
  });

  function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }

  $('#agregarbtn2').click(function(e){
        e.preventDefault();
        var _proceso=document.getElementById("proceso").value;
        if(_proceso!='Seleccione una opcion'){
          var ini2=_proceso.indexOf('-');
          var _proceso1=_proceso.substring(0,ini2); 
          var largo2=_proceso.length+50;
          var _proceso2=_proceso.substring(ini2+1,largo2); 
          var _problema=document.getElementById("problema").value
          var ini3=_problema.indexOf('-');
          var _largo3=_problema.lenght+50;
          var _problemaid=_problema.substring(0,ini3);
          var _problema4=_problema.substring(ini3+1,100);
          var fila="<tr><td><input type='text' name='procesoid[]' class='form-control' value='"+_proceso1+"'></td><td><input type='text' name='proceso[]' class='form-control' value='"+_proceso2+"'></td><td><input type='text' name='problemaid[]' class='form-control' value='"+_problemaid+"'></td><td><input type='text' name='problema2[]' class='form-control' value='"+_problema4+"'><td><button class='form-control btn btn-danger' onclick='deleteRow(this)'>X</button></td></tr>";
          var aux=document.createElement("TR");
          aux.innerHTML=fila;
          document.getElementById('lista2').appendChild(aux);  
        }
  });

  $('#agregarbtn3').click(function(e){
        e.preventDefault();
        var _estudio=document.getElementById("estudio").value;
        console.log(_estudio);
        if(_estudio!='Seleccione una opcion'){
          var ini2=_estudio.indexOf('-');
          var _estudio1=_estudio.substring(0,ini2); 
          var largo2=_estudio.length;
          var _estudio2=_estudio.substring(ini2+1,largo2); 

          var date = new Date();
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();

          if (month < 10) month = "0" + month;
          if (day < 10) day = "0" + day;

          var today = year + "-" + month + "-" + day;         

          var fila="<tr><td><input type='text' name='practicaid[]' class='form-control' value='"+_estudio1+"''></td><td><input type='text' name='practica[]' class='form-control' value='"+_estudio2+"''></td><td><input type='date' name='estudiofecha[]' class='form-control' value='"+today+"'></td><td><button class='form-control btn btn-danger' onclick='deleteRow(this)'>X</button></td></tr>";
          var aux=document.createElement("TR");
          aux.innerHTML=fila;
          document.getElementById('lista3').appendChild(aux);  
        }
  });

  $('#agregarbtn4').click(function(e){
        e.preventDefault();
        var _monodroga=document.getElementById("monodroga").value;
        console.log(_monodroga);
        if(_monodroga!='Seleccione una opcion'){
          var ini2=_monodroga.indexOf('-');
          var _mono1=_monodroga.substring(0,ini2); 
          var largo2=_monodroga.length;
          var _mono2=_monodroga.substring(ini2+1,largo2); 

          var date = new Date();
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();

          if (month < 10) month = "0" + month;
          if (day < 10) day = "0" + day;

          var today = year + "-" + month + "-" + day;         

          var fila="<tr><td><input type='text' name='drogaid[]' class='form-control' value='"+_mono1+"''></td><td><input type='text' name='mono[]' class='form-control' value='"+_mono2+"''></td><td><input type='text' name='drogaindica[]' class='form-control' value=''</td><td><input type='date' name='drogafecha[]' class='form-control' value='"+today+"'></td><td><input type='checkbox' type='radio' name='cronico[]' class='form-check-input'></td><td><button class='form-control btn btn-danger' onclick='deleteRow(this)'>X</button></td></tr>";
          var aux=document.createElement("TR");
          aux.innerHTML=fila;
          document.getElementById('lista4').appendChild(aux);  
        }
  });

</script>
@stop