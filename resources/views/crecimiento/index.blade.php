@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
<div class="row">
    <div class="col-md-6">                
        <h5>HISTORIA CLINICA</h5>
        <span class="badge badge-success">Dr.{{ Auth::user()->name }}</span>
        <h1>CRECIMIENTO - {{$padron->apellido . " " . $padron->nombres}} </h1>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-2">
    
        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fechanac" placeholder="Fecha de nacimiento" required>
            <span class="badge text-bg-danger" id="aviso"><p style="color: red"></p></span>
        </div>

        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Fecha de consulta</label>
            <input type="date" class="form-control" id="fechacon" placeholder="Fecha de consulta">
        </div>
        
        <div class="mb-2">
            <select class="form-control" id="sexo" aria-label="Default select example">
                <option selected>Sexo</option>
                <option value="M">Mujer</option>
                <option value="V">Varon</option>
            </select>                   
        </div>

        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Edad</label>
            <input type="text" class="form-control" id="decimal" readonly>
            <span class="badge text-bg-danger" id="aviso2"><p style="color: red"></p></span>
        </div>

        <div class="mb-2" id="estaturaDiv" style="display: none;">
            <input type="text" class="form-control" id="estatura" placeholder="Estatura">
        </div>
        <div class="mb-2" id="pesoDiv" style="display: none;">
            <input type="text" class="form-control" id="peso" placeholder="Peso">
        </div>
        <div class="mb-2" id="imcDiv" style="display: none;">
            <input type="text" class="form-control" id="imc" placeholder="IMC">
        </div>

    </div>    
</div>    
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

@stop

@section('js')
<script>
    document.getElementById('sexo').addEventListener('change', function() {
        var fechaNac = new Date(document.getElementById('fechanac').value);
        var fechaCon = new Date(document.getElementById('fechacon').value);
        if(isNaN(fechaNac)){
            document.getElementById('aviso').style.color = "red";
            document.getElementById('aviso').textContent="Fecha de nacimiento invalida"
        }else{
            console.log(fechaNac);
            var hoy = new Date();
            var edad = fechaCon.getFullYear() - fechaNac.getFullYear();
            //document.getElementById('edad').value = edad;
            var decimal = (fechaCon - fechaNac) / (1000 * 60 * 60 * 24 * 365); // Calcular la edad en decimal
            document.getElementById('decimal').value = decimal.toFixed(2);
            document.getElementById('aviso2').textContent="decimal"
            if(edad>19){
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Esta aplicacion esta destinada para personas de hasta 19 años de edad',        
                });
            }else{
                document.getElementById('estaturaDiv').style.display = 'block'; 
                document.getElementById('pesoDiv').style.display = 'block'; 
                document.getElementById('imcDiv').style.display = 'block'; 
            }
        }
    });
</script>
@stop