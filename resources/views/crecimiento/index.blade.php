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
    const percentil50M =[
    { mes: 0, p50: 50,de: 1.8 },
    { mes: 1, p50: 53,de: 1.86 },
    { mes: 2, p50: 56,de: 1.93 },
    { mes: 3, p50: 59.1,de: 2 },
    { mes: 4, p50: 61.2,de: 2.06 },
    { mes: 5, p50: 63.3,de: 2.13 },
    { mes: 6, p50: 65.5,de: 2.2 },
    { mes: 7, p50: 67.2,de: 2.25 },
    { mes: 8, p50: 68.5,de: 2.3 },
    { mes: 9, p50: 70,de: 2.35 },
    { mes: 10, p50: 71.3,de: 2.41 },
    { mes: 11, p50: 72.7,de: 2.47 },
    { mes: 12, p50: 74.1,de: 2.54 },
    { mes: 13, p50: 75.1,de: 2.58 },
    { mes: 14, p50: 76.1,de: 2.62 },
    { mes: 15, p50: 77.1,de: 2.67 },
    { mes: 16, p50: 78.1,de: 2.71 },
    { mes: 17, p50: 79.1,de: 2.75 },
    { mes: 18, p50: 80.2,de: 2.8 },
    { mes: 19, p50: 81,de: 2.85 },
    { mes: 20, p50: 81.9,de: 2.9 },
    { mes: 21, p50: 82.8,de: 2.96 },
    { mes: 22, p50: 83.7,de: 3.01 },
    { mes: 23, p50: 84.6,de: 3.06 },
    { mes: 24, p50: 85.5,de: 3.12 },
    { mes: 25, p50: 86.1,de: 3.17 },
    { mes: 26, p50: 87,de: 3.22 },
    { mes: 27, p50: 87.5,de: 3.29 },
    { mes: 28, p50: 88.2,de: 3.34 },
    { mes: 29, p50: 88.9,de: 3.39 },
    { mes: 30, p50: 89.6,de: 3.46 },
    { mes: 31, p50: 90.3,de: 3.51 },
    { mes: 32, p50: 90.9,de: 3.56 },
    { mes: 33, p50: 91.7,de: 3.63 },
    { mes: 34, p50: 92.3,de: 3.68 },
    { mes: 35, p50: 93,de: 3.73 },
    { mes: 36, p50: 93.8,de: 3.8 },
    { mes: 37, p50: 94.3,de: 3.84 },
    { mes: 38, p50: 94.7,de: 3.92 },
    { mes: 39, p50: 95.2,de: 3.99 },
    { mes: 40, p50: 95.8,de: 4.05 },
    { mes: 41, p50: 96.2,de: 4.11 },
    { mes: 42, p50: 96.7,de: 4.18 },
    { mes: 43, p50: 97.2,de: 4.24 },
    { mes: 44, p50: 97.7,de: 4.3 },
    { mes: 45, p50: 98.2,de: 4.37 },
    { mes: 46, p50: 98.6,de: 4.43 },
    { mes: 47, p50: 99.1,de: 4.49 },
    { mes: 48, p50: 99.7,de: 4.56 },
    { mes: 49, p50: 100.2,de: 4.57},
    { mes: 50, p50: 100.8,de: 4.59 },
    { mes: 51, p50: 101.4,de: 4.62 },
    { mes: 52, p50: 102,de: 4.63 },
    { mes: 53, p50: 102.5,de: 4.65 },
    { mes: 54, p50: 103.2,de: 4.68 },
    { mes: 55, p50: 103.7,de: 4.69 },
    { mes: 56, p50: 104.3,de: 4.71 },
    { mes: 57, p50: 104.9,de: 4.74 },
    { mes: 58, p50: 105.5,de: 4.75 },
    { mes: 59, p50: 106,de: 4.77 },
    { mes: 60, p50: 106.7,de: 4.8 },
    { mes: 61, p50: 107.2,de: 4.82 },
    { mes: 62, p50: 107.7,de: 4.84 },
    { mes: 63, p50: 108.3,de: 4.87 },
    { mes: 64, p50: 108.8,de: 4.9 },
    { mes: 65, p50: 109.3,de: 4.92 },
    { mes: 66, p50: 109.9,de: 4.95 },
    { mes: 67, p50: 110.4,de: 4.97 },
    { mes: 68, p50: 110.9,de: 5 },
    { mes: 69, p50: 111.5,de: 5.03 },
    { mes: 70, p50: 112,de: 5.05 },
    { mes: 71, p50: 112.6,de: 5.08 },
    { mes: 72, p50: 113.2,de: 5.11 },
    { mes: 73, p50: 113.6,de: 5.13 },
    { mes: 74, p50: 114,de: 5.15 },
    { mes: 75, p50: 114.8,de: 5.17 },
    { mes: 76, p50: 115,de: 5.19 },
    { mes: 77, p50: 115.4,de: 5.21 },
    { mes: 78, p50: 116,de: 5.24 },
    { mes: 79, p50: 116.4,de: 5.26 },
    { mes: 80, p50: 118.8,de: 5.28 },
    { mes: 81, p50: 117.4,de: 5.3 },
    { mes: 82, p50: 117.8,de: 5.32 },
    { mes: 83, p50: 118.2,de: 5.34 },
    { mes: 84, p50: 118.8,de: 5.37 },
    { mes: 85, p50: 119.2,de: 5.39 },
    { mes: 86, p50: 119.6,de: 5.41 },
    { mes: 87, p50: 120.1,de: 5.44 },
    { mes: 88, p50: 120.5,de: 5.47 },
    { mes: 89, p50: 120.9,de: 5.49 },
    { mes: 90, p50: 121.4,de: 5.52 },
    { mes: 91, p50: 121.8,de: 5.54 },
    { mes: 92, p50: 122.2,de: 5.57 },
    { mes: 93, p50: 122.7,de: 5.6 },
    { mes: 94, p50: 123.1,de: 5.62 },
    { mes: 95, p50: 123.6,de: 5.65 },
    { mes: 96, p50: 124.1,de: 5.68 },
    { mes: 97, p50: 124.5,de: 5.72 },
    { mes: 98, p50: 124.9,de: 5.77 },
    { mes: 99, p50: 125.4,de: 5.82 },
    { mes: 100, p50: 125.8,de: 5.87 },
    { mes: 101, p50: 126.2,de: 5.92 },
    { mes: 102, p50: 126.7,de: 5.97 },
    { mes: 103, p50: 127.1,de: 6.02 },
    { mes: 104, p50: 127.5,de: 6.06 },
    { mes: 105, p50: 128,de: 6.12 },
    { mes: 106, p50: 128.4,de: 6.16 },
    { mes: 107, p50: 128.8,de: 6.21 },
    { mes: 108, p50: 129.3,de: 6.27 },
    { mes: 109, p50: 129.7,de: 6.31 },
    { mes: 110, p50: 130.1,de: 6.35 },
    { mes: 111, p50: 130.5,de: 6.4 },
    { mes: 112, p50: 130.9,de: 6.44 },
    { mes: 113, p50: 131.3,de: 6.48 },
    { mes: 114, p50: 131.8,de: 6.53 },
    { mes: 115, p50: 132.2,de: 6.57 },
    { mes: 116, p50: 132.6,de: 6.61 },
    { mes: 117, p50: 133.1,de: 6.66 },
    { mes: 118, p50: 133.5,de: 6.7 },
    { mes: 119, p50: 133.9,de: 6.75 },
    { mes: 120, p50: 134.4,de: 6.8 },
    { mes: 121, p50: 134.8,de: 6.88 },
    { mes: 122, p50: 135.3,de: 6.96 },
    { mes: 123, p50: 135.9,de: 7.05 },
    { mes: 124, p50: 136.3,de: 7.13 },
    { mes: 125, p50: 136.8,de: 7.21 },
    { mes: 126, p50: 137.4,de: 7.3 },
    { mes: 127, p50: 137.8,de: 7.38 },
    { mes: 128, p50: 138.3,de: 7.46 },
    { mes: 129, p50: 138.9,de: 7.55 },
    { mes: 130, p50: 139.3,de: 7.63 },
    { mes: 131, p50: 139.8,de: 7.71 },
    { mes: 132, p50: 140.4,de: 7.81 },
    { mes: 133, p50: 140.9,de: 7.86 },
    { mes: 134, p50: 141.4,de: 7.92 },
    { mes: 135, p50: 142,de: 7.99 },
    { mes: 136, p50: 142.6,de: 8.05 },
    { mes: 137, p50: 143.1,de: 8.11 },
    { mes: 138, p50: 143.7,de: 8.18 },
    { mes: 139, p50: 144.2,de: 8.23 },
    { mes: 140, p50: 144.8,de: 8.29 },
    { mes: 141, p50: 145.4,de: 8.36 },
    { mes: 142, p50: 145.9,de: 8.42 },
    { mes: 143, p50: 146.4,de: 8.48 },
    { mes: 144, p50: 147.1,de: 8.55 },
    { mes: 145, p50: 147.5,de: 8.46 },
    { mes: 146, p50: 148,de: 8.39 },
    { mes: 147, p50: 148.6,de: 8.28 },
    { mes: 148, p50: 149,de: 8.21 },
    { mes: 149, p50: 149.5,de: 8.12 },
    { mes: 150, p50: 150.1,de: 8.02 },
    { mes: 151, p50: 150.5,de: 7.89 },
    { mes: 152, p50: 151,de: 7.85 },
    { mes: 153, p50: 151.6,de: 7.77 },
    { mes: 154, p50: 152,de: 7.67 },
    { mes: 155, p50: 152.5,de: 7.6 },
    { mes: 156, p50: 153.1,de: 7.5 },
    { mes: 157, p50: 153.4,de: 7.41 },
    { mes: 158, p50: 153.8,de: 7.33 },
    { mes: 159, p50: 154.1,de: 7.25 },
    { mes: 160, p50: 154.5,de: 7.16 },
    { mes: 161, p50: 154.8,de: 7.08 },
    { mes: 162, p50: 155.2,de: 7 },
    { mes: 163, p50: 155.5,de: 6.91 },
    { mes: 164, p50: 155.9,de: 6.83 },
    { mes: 165, p50: 156.2,de: 6.75 },
    { mes: 166, p50: 156.5,de: 6.67 },
    { mes: 167, p50: 156.9,de: 6.55 },
    { mes: 168, p50: 157.3,de: 6.5 },
    { mes: 169, p50: 157.4,de: 6.48 },
    { mes: 170, p50: 157.7,de: 6.47 },
    { mes: 171, p50: 157.8,de: 6.45 },
    { mes: 172, p50: 158.6,de: 6.44 },
    { mes: 173, p50: 158.2,de: 6.43 },
    { mes: 174, p50: 158.4,de: 6.41 },
    { mes: 175, p50: 158.6,de: 6.4 },
    { mes: 176, p50: 158.8,de: 6.38 },
    { mes: 177, p50: 159,de: 6.36 },
    { mes: 178, p50: 159.2,de: 6.35 },
    { mes: 179, p50: 159.3,de: 6.33 },
    { mes: 180, p50: 159.6,de: 6.32 },
    { mes: 181, p50: 159.6,de: 6.3 },
    { mes: 182, p50: 159.7,de: 6.29 },
    { mes: 183, p50: 159.8,de: 6.27 },
    { mes: 184, p50: 159.8,de: 6.26 },
    { mes: 185, p50: 159.9,de: 6.25 },
    { mes: 186, p50: 160,de: 6.23 },
    { mes: 187, p50: 160,de: 6.22 },
    { mes: 188, p50: 160.1,de: 6.2 },
    { mes: 189, p50: 160.2,de: 6.19 },
    { mes: 190, p50: 160.3,de: 6.18 },
    { mes: 191, p50: 160.3,de: 6.16 },
    { mes: 192, p50: 160.4,de: 6.15 },
    { mes: 193, p50: 160.5,de: 6.15 },
    { mes: 194, p50: 160.5,de: 6.14 },
    { mes: 195, p50: 160.5,de: 6.14 },
    { mes: 196, p50: 160.5,de: 6.13 },
    { mes: 197, p50: 160.5,de: 6.12 },
    { mes: 198, p50: 160.6,de: 6.12 },
    { mes: 199, p50: 160.6,de: 6.12 },
    { mes: 200, p50: 160.6,de: 6.11 },
    { mes: 201, p50: 160.6,de: 6.1 },
    { mes: 202, p50: 160.6,de: 6.1 },
    { mes: 203, p50: 160.6,de: 6.1 },
    { mes: 204, p50: 160.6,de: 6.1 },
    { mes: 205, p50: 160.6,de: 6.1 },
    { mes: 206, p50: 160.6,de: 6.1 },
    { mes: 207, p50: 160.6,de: 6.1 },
    { mes: 208, p50: 160.6,de: 6.1 },
    { mes: 209, p50: 160.7,de: 6.1 },
    { mes: 210, p50: 160.7,de: 6.1 },
    { mes: 211, p50: 160.7,de: 6.1 },
    { mes: 212, p50: 160.7,de: 6.1 },
    { mes: 213, p50: 160.7,de: 6.1 },
    { mes: 214, p50: 160.7,de: 6.1 },
    { mes: 215, p50: 160.7,de: 6.1 },
    { mes: 216, p50: 160.7,de: 6.1 },
    ] 

    console.log(percentil50.find(el=>el.mes=4))
    
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
            var meses=edad*12
            console.log(meses)
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