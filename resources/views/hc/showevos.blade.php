@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')

<div class="row">
    <div class="col-md-8">                
        <h5>HISTORIA CLINICA</h5>
        <h1>EVOLUCIONES DEL PACIENTE - {{$padron->apellido . " " . $padron->nombres}} </h1>
    </div>

</div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mt-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col-md-1">Nro</th>
                            <th scope="col-md-1">Fecha</th>
                            <th scope="col-md-2">Medico</th>
                            <th scope="col-md-4">Subjetivo</th>
                            <th scope="col-md-4">Objetivo</th>
                        </tr>
                    </thead>
                        <tbody id="lista">
                          @foreach ($evos as $evo)
                            <tr>
                              <td>{{$evo->id}}</td>
                              <td>{{$evo->fecha}}</td>
                              <td>{{$evo->nommedico->name}}</td>
                              <td>{{$evo->subjetivo}}</td>
                              <td>{{$evo->objetivo}}</td>
                            </tr>  
                          @endforeach
                      </tbody>
                </table>                  
              </div>    
        </div>    
    </div>    
    <div class="col-md-3 mb-2">
        <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-success" type="submit">PRINCIPAL</a>
      </div>

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
  width: 100px;
}
table td:nth-child(3){
  width: 300px;
}
table td:nth-child(4){
  width: 500px;
}
table td:last-child{
  width: 500px;
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
          var _problema=document.getElementById("problema2").value
          console.log(_problema);
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