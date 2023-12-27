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
{!! Form::open(['route' => 'crecimiento.store']) !!}

<div class="row">
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 

    <div class="col-md-3">
    
        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fechanac" name="fechanac" placeholder="Fecha de nacimiento" required value="{{ old('fechanac')}}">
            <span class="badge text-bg-danger" id="aviso"><p style="color: red"></p></span>
            @error('fechanac')
                <strong style="color:red">*{{$message}}</strong>
            @enderror  
        </div>

        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Fecha de consulta</label>
            <input type="date" class="form-control" id="fechacon" name="fechacon" placeholder="Fecha de consulta" value="{{ old('fechacon')}}">
            @error('fechacon')
                <strong style="color:red">*{{$message}}</strong>
            @enderror  
        </div>
        
        <div class="mb-2">
            <select class="form-control" id="sexo" name="sexo" aria-label="Default select example">
                <option selected>Sexo</option>
                <option value="M" {{old('sexo')=='M' ? 'selected' : ''}}>Mujer</option>
                <option value="V" {{old('sexo')=='V' ? 'selected' : ''}}>Varon</option>
            </select>       
            @error('sexo')
                <strong style="color:red">*{{$message}}</strong>
            @enderror  
        
        </div>

        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Edad</label>
            <input type="text" class="form-control" id="decimal" readonly>
            <span class="badge text-bg-danger" id="aviso2"><p style="color: red"></p></span>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="estatura" class="form-label" id="lblEstatura" style="display: none">Estatura</label>
            </div>
            <div class="col-md-6">
                <label for="valorestatura" class="form-label" id="lblvale" style="display: none">Z</label>
            </div>
        </div>    
        <div class="mb-1 d-flex" id="estaturaDiv" style="display: none;">
            <input type="text" class="form-control" name="estatura" id="estatura" placeholder="Estatura" style="display: none" onblur="calcularZestatura()" value="{{old('estatura')}}">
            @error('estatura')
                <strong style="color:red">*{{$message}}</strong>
            @enderror  
            <input type="text" class="form-control mx-2" name="valorestatura" id="valorestatura" style="display: none">
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="peso" class="form-label" id="lblPeso" style="display: none">Peso</label>
            </div>
            <div class="col-md-6">
                <label for="valorpeso" class="form-label" id="lblvalp" style="display: none">Z</label>
            </div>
        </div>    

        <div class="mb-1 d-flex" id="pesoDiv" style="display: none;">
            <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso" style="display: none" onchange="calcularZpeso()" value="{{old('peso')}}">
            @error('peso')
                <strong style="color:red">*{{$message}}</strong>
            @enderror  
            <input type="text" class="form-control mx-2" name="valorpeso" id="valorpeso" style="display: none">
        </div>
        <label for="imc" class="form-label" id="lblImc" style="display: none">IMC</label>
        <div class="mb-2" id="imcDiv" style="display: none;">
            <input type="text" class="form-control" name="imc" id="imc" placeholder="IMC" value="{{old('imc')}}">
            @error('imc')
                <strong style="color:red">*{{$message}}</strong>
            @enderror  
        </div>

        <div class="row">                            
            <div class="col-md-12 mb-2">
              <button class="form-control btn btn-primary" type="submit">GRABAR CRECIMIENTO</button>
            </div>
        </div>
        <div class="row">                            
            <div class="col-md-6 mb-2">
              <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
            </div>
        </div>    

    </div>    

</div>  
{!! form::close() !!}

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
    { mes: 197, p50: 160.5,de: 6.13 },
    { mes: 198, p50: 160.5,de: 6.12 },
    { mes: 199, p50: 160.6,de: 6.12 },
    { mes: 200, p50: 160.6,de: 6.12 },
    { mes: 201, p50: 160.6,de: 6.11 },
    { mes: 202, p50: 160.6,de: 6.1 },
    { mes: 203, p50: 160.6,de: 6.1 },
    { mes: 204, p50: 160.6,de: 6.1 },
    { mes: 205, p50: 160.6,de: 6.1 },
    { mes: 206, p50: 160.6,de: 6.1 },
    { mes: 207, p50: 160.6,de: 6.1 },
    { mes: 208, p50: 160.6,de: 6.1 },
    { mes: 209, p50: 160.6,de: 6.1 },
    { mes: 210, p50: 160.7,de: 6.1 },
    { mes: 211, p50: 160.7,de: 6.1 },
    { mes: 212, p50: 160.7,de: 6.1 },
    { mes: 213, p50: 160.7,de: 6.1 },
    { mes: 214, p50: 160.7,de: 6.1 },
    { mes: 215, p50: 160.7,de: 6.1 },
    { mes: 216, p50: 160.7,de: 6.1 },
    ] 

    const percentil50H =[
    { mes: 0, p50: 50.6,de: 1.8 },
    { mes: 1, p50: 54.5,de: 1.99 },
    { mes: 2, p50: 58.4,de: 2.19 },
    { mes: 3, p50: 62.3,de: 2.39 },
    { mes: 4, p50: 63.9,de: 2.45 },
    { mes: 5, p50: 65.6,de: 2.51 },
    { mes: 6, p50: 67.3,de: 2.57 },
    { mes: 7, p50: 68.7,de: 2.63 },
    { mes: 8, p50: 70.1,de: 2.7 },
    { mes: 9, p50: 71.6,de: 2.77 },
    { mes: 10, p50: 72.9,de: 2.83 },
    { mes: 11, p50: 74.2,de: 2.9 },
    { mes: 12, p50: 75.5,de: 2.97 },
    { mes: 13, p50: 76.4,de: 3.01 },
    { mes: 14, p50: 77.2,de: 3.05 },
    { mes: 15, p50: 78.2,de: 3.09 },
    { mes: 16, p50: 79.1,de: 3.13 },
    { mes: 17, p50: 80,de: 3.17 },
    { mes: 18, p50: 81,de: 3.22 },
    { mes: 19, p50: 81.8,de: 3.26 },
    { mes: 20, p50: 82.7,de: 3.3 },
    { mes: 21, p50: 83.7,de: 3.34 },
    { mes: 22, p50: 84.6,de: 3.38 },
    { mes: 23, p50: 85.5,de: 3.42 },
    { mes: 24, p50: 86.5,de: 3.47 },
    { mes: 25, p50: 87.2,de: 3.51 },
    { mes: 26, p50: 87.9,de: 3.56 },
    { mes: 27, p50: 88.7,de: 3.61 },
    { mes: 28, p50: 89.4,de: 3.66 },
    { mes: 29, p50: 90.1,de: 3.7 },
    { mes: 30, p50: 90.9,de: 3.76 },
    { mes: 31, p50: 91.6,de: 3.8 },
    { mes: 32, p50: 92.3,de: 3.85 },
    { mes: 33, p50: 93.1,de: 3.9 },
    { mes: 34, p50: 93.8,de: 3.95 },
    { mes: 35, p50: 94.5,de: 3.99 },
    { mes: 36, p50: 95.3,de: 4.05 },
    { mes: 37, p50: 95.7,de: 4.06 },
    { mes: 38, p50: 96.2,de: 4.07 },
    { mes: 39, p50: 96.7,de: 4.08 },
    { mes: 40, p50: 97.2,de: 4.09 },
    { mes: 41, p50: 97.7,de: 4.11 },
    { mes: 42, p50: 98.2,de: 4.12 },
    { mes: 43, p50: 98.7,de: 4.13 },
    { mes: 44, p50: 99.1,de: 4.14 },
    { mes: 45, p50: 99.7,de: 4.16 },
    { mes: 46, p50: 100.1,de: 4.17 },
    { mes: 47, p50: 100.6,de: 4.18 },
    { mes: 48, p50: 101.2,de: 4.2 },
    { mes: 49, p50: 101.7,de: 4.21},
    { mes: 50, p50: 102.2,de: 4.23 },
    { mes: 51, p50: 102.9,de: 4.25 },
    { mes: 52, p50: 103.4,de: 4.26 },
    { mes: 53, p50: 103.9,de: 4.28 },
    { mes: 54, p50: 104.6,de: 4.3 },
    { mes: 55, p50: 105.1,de: 4.31 },
    { mes: 56, p50: 105.6,de: 4.33 },
    { mes: 57, p50: 106.3,de: 4.35 },
    { mes: 58, p50: 106.8,de: 4.36 },
    { mes: 59, p50: 107.3,de: 4.38 },
    { mes: 60, p50: 108,de: 4.4 },
    { mes: 61, p50: 108.5,de: 4.42 },
    { mes: 62, p50: 109,de: 4.44 },
    { mes: 63, p50: 109.5,de: 4.47 },
    { mes: 64, p50: 110,de: 4.49 },
    { mes: 65, p50: 110.5,de: 4.52 },
    { mes: 66, p50: 111.1,de: 4.55 },
    { mes: 67, p50: 111.5,de: 4.57 },
    { mes: 68, p50: 112,de: 4.59 },
    { mes: 69, p50: 112.6,de: 4.62 },
    { mes: 70, p50: 113.1,de: 4.64 },
    { mes: 71, p50: 113.6,de: 4.67 },
    { mes: 72, p50: 114.2,de: 4.7 },
    { mes: 73, p50: 114.9,de: 4.72 },
    { mes: 74, p50: 115.1,de: 4.75 },
    { mes: 75, p50: 115.7,de: 4.78 },
    { mes: 76, p50: 116.2,de: 4.81 },
    { mes: 77, p50: 116.7,de: 4.84 },
    { mes: 78, p50: 117.2,de: 4.87 },
    { mes: 79, p50: 117.7,de: 4.9 },
    { mes: 80, p50: 118.2,de: 4.93 },
    { mes: 81, p50: 118.7,de: 4.96 },
    { mes: 82, p50: 119.2,de: 4.99 },
    { mes: 83, p50: 119.7,de: 5.01 },
    { mes: 84, p50: 120.3,de: 5.05 },
    { mes: 85, p50: 120.7,de: 5.07 },
    { mes: 86, p50: 121.1,de: 5.1 },
    { mes: 87, p50: 121.7,de: 5.13 },
    { mes: 88, p50: 122.1,de: 5.16 },
    { mes: 89, p50: 122.5,de: 5.19 },
    { mes: 90, p50: 123.1,de: 5.22 },
    { mes: 91, p50: 123.5,de: 5.25 },
    { mes: 92, p50: 123.9,de: 5.28 },
    { mes: 93, p50: 124.5,de: 5.31 },
    { mes: 94, p50: 124.9,de: 5.34 },
    { mes: 95, p50: 125.3,de: 5.36 },
    { mes: 96, p50: 125.9,de: 5.4 },
    { mes: 97, p50: 126.3,de: 5.42 },
    { mes: 98, p50: 126.7,de: 5.45 },
    { mes: 99, p50: 127.2,de: 5.48 },
    { mes: 100, p50: 127.6,de: 5.51 },
    { mes: 101, p50: 128,de: 5.54 },
    { mes: 102, p50: 128.5,de: 5.57 },
    { mes: 103, p50: 128.9,de: 5.6 },
    { mes: 104, p50: 129.3,de: 5.63 },
    { mes: 105, p50: 129.8,de: 5.66 },
    { mes: 106, p50: 130.2,de: 5.69 },
    { mes: 107, p50: 130.6,de: 5.71 },
    { mes: 108, p50: 131.1,de: 5.75 },
    { mes: 109, p50: 131.4,de: 5.79 },
    { mes: 110, p50: 131.8,de: 5.83 },
    { mes: 111, p50: 132.3,de: 5.85 },
    { mes: 112, p50: 132.6,de: 5.93 },
    { mes: 113, p50: 133,de: 5.97 },
    { mes: 114, p50: 133.5,de: 6.02 },
    { mes: 115, p50: 133.8,de: 6.06 },
    { mes: 116, p50: 134.2,de: 6.11 },
    { mes: 117, p50: 134.7,de: 6.16 },
    { mes: 118, p50: 135,de: 6.2 },
    { mes: 119, p50: 135.4,de: 6.25 },
    { mes: 120, p50: 135.9,de: 6.3 },
    { mes: 121, p50: 136.2,de: 6.32 },
    { mes: 122, p50: 136.5,de: 6.34 },
    { mes: 123, p50: 136.9,de: 6.37 },
    { mes: 124, p50: 137.3,de: 6.39 },
    { mes: 125, p50: 137.6,de: 6.42 },
    { mes: 126, p50: 138,de: 6.45 },
    { mes: 127, p50: 138.3,de: 6.47 },
    { mes: 128, p50: 138.7,de: 6.49 },
    { mes: 129, p50: 139.1,de: 6.52 },
    { mes: 130, p50: 139.4,de: 6.54 },
    { mes: 131, p50: 139.8,de: 6.57 },
    { mes: 132, p50: 140.2,de: 6.6 },
    { mes: 133, p50: 140.6,de: 6.64 },
    { mes: 134, p50: 141,de: 6.69 },
    { mes: 135, p50: 141.4,de: 6.75 },
    { mes: 136, p50: 141.8,de: 6.79 },
    { mes: 137, p50: 142.2,de: 6.84 },
    { mes: 138, p50: 142.7,de: 6.9 },
    { mes: 139, p50: 143.1,de: 6.94 },
    { mes: 140, p50: 143.5,de: 6.99 },
    { mes: 141, p50: 143.9,de: 7.05 },
    { mes: 142, p50: 144.3,de: 7.09 },
    { mes: 143, p50: 144.7,de: 7.14 },
    { mes: 144, p50: 145.2,de: 7.2 },
    { mes: 145, p50: 145.7,de: 7.33 },
    { mes: 146, p50: 146.2,de: 7.47 },
    { mes: 147, p50: 146.7,de: 7.61 },
    { mes: 148, p50: 147.2,de: 7.75 },
    { mes: 149, p50: 147.7,de: 7.88 },
    { mes: 150, p50: 148.2,de: 8.02 },
    { mes: 151, p50: 148.7,de: 8.16 },
    { mes: 152, p50: 149.2,de: 8.3 },
    { mes: 153, p50: 149.7,de: 8.43 },
    { mes: 154, p50: 150.3,de: 8.57 },
    { mes: 155, p50: 150.8,de: 8.71 },
    { mes: 156, p50: 151.3,de: 8.85 },
    { mes: 157, p50: 151.9,de: 8.82 },
    { mes: 158, p50: 152.5,de: 8.79 },
    { mes: 159, p50: 153.1,de: 8.76 },
    { mes: 160, p50: 153.7,de: 8.73 },
    { mes: 161, p50: 154.3,de: 8.7 },
    { mes: 162, p50: 154.9,de: 8.67 },
    { mes: 163, p50: 155.5,de: 8.64 },
    { mes: 164, p50: 156.1,de: 8.61 },
    { mes: 165, p50: 156.7,de: 8.58 },
    { mes: 166, p50: 157.4,de: 8.55 },
    { mes: 167, p50: 158.1,de: 8.52 },
    { mes: 168, p50: 158.6,de: 8.5 },
    { mes: 169, p50: 159.1,de: 8.47 },
    { mes: 170, p50: 159.6,de: 8.45 },
    { mes: 171, p50: 160.1,de: 8.42 },
    { mes: 172, p50: 160.6,de: 8.4 },
    { mes: 173, p50: 161.1,de: 8.37 },
    { mes: 174, p50: 161.6,de: 8.35 },
    { mes: 175, p50: 162.1,de: 8.32 },
    { mes: 176, p50: 162.6,de: 8.3 },
    { mes: 177, p50: 163.1,de: 8.27 },
    { mes: 178, p50: 163.7,de: 8.25 },
    { mes: 179, p50: 164.2,de: 8.22 },
    { mes: 180, p50: 164.7,de: 8.2 },
    { mes: 181, p50: 165,de: 8.14 },
    { mes: 182, p50: 165.4,de: 8.09 },
    { mes: 183, p50: 165.8,de: 8.03 },
    { mes: 184, p50: 166.2,de: 7.98 },
    { mes: 185, p50: 166.6,de: 7.92 },
    { mes: 186, p50: 166.9,de: 7.87 },
    { mes: 187, p50: 167.3,de: 7.82 },
    { mes: 188, p50: 167.7,de: 7.76 },
    { mes: 189, p50: 168.1,de: 7.71 },
    { mes: 190, p50: 168.5,de: 7.65 },
    { mes: 191, p50: 168.8,de: 7.6 },
    { mes: 192, p50: 169.2,de: 7.55 },
    { mes: 193, p50: 169.4,de: 7.51 },
    { mes: 194, p50: 169.6,de: 7.48 },
    { mes: 195, p50: 169.8,de: 7.45 },
    { mes: 196, p50: 170,de: 7.41 },
    { mes: 197, p50: 170.3,de: 7.38 },
    { mes: 198, p50: 170.5,de: 7.35 },
    { mes: 199, p50: 170.7,de: 7.31 },
    { mes: 200, p50: 170.9,de: 7.28 },
    { mes: 201, p50: 171.1,de: 7.25 },
    { mes: 202, p50: 171.4,de: 7.21 },
    { mes: 203, p50: 171.6,de: 7.18 },
    { mes: 204, p50: 171.8,de: 7.15 },
    { mes: 205, p50: 171.8,de: 7.12 },
    { mes: 206, p50: 171.9,de: 7.1 },
    { mes: 207, p50: 172,de: 7.07 },
    { mes: 208, p50: 172,de: 7.05 },
    { mes: 209, p50: 172.1,de: 7.02 },
    { mes: 210, p50: 172.2,de: 7 },
    { mes: 211, p50: 172.2,de: 6.97 },
    { mes: 212, p50: 172.3,de: 6.95 },
    { mes: 213, p50: 172.4,de: 6.92 },
    { mes: 214, p50: 172.5,de: 6.9 },
    { mes: 215, p50: 172.5,de: 6.87 },
    { mes: 216, p50: 172.6,de: 6.85 },
    { mes: 217, p50: 172.6,de: 6.84 },
    { mes: 218, p50: 172.6,de: 6.84 },
    { mes: 219, p50: 172.6,de: 6.83 },
    { mes: 220, p50: 172.6,de: 6.83 },
    { mes: 221, p50: 172.7,de: 6.82 },
    { mes: 222, p50: 172.7,de: 6.82 },
    { mes: 223, p50: 172.7,de: 6.82 },
    { mes: 224, p50: 172.7,de: 6.81 },
    { mes: 225, p50: 172.7,de: 6.81 },
    { mes: 226, p50: 172.8,de: 6.8 },
    { mes: 227, p50: 172.8,de: 6.8 },
    { mes: 228, p50: 172.8,de: 6.8 },
    ] 

    const pesoM =[
        { mes: 0, peso: 3.34,deinf: 0.48 },
        { mes: 1, peso: 4,deinf: 0.53 },
        { mes: 2, peso: 4.65,deinf: 0.61 },
        { mes: 3, peso: 5.3,deinf: 0.64 },
        { mes: 4, peso: 5.75,deinf: 0.66 },
        { mes: 5, peso: 6.38,deinf: 0.7 },
        { mes: 6, peso: 6.95,deinf: 0.75 },
        { mes: 7, peso: 7.31,deinf: 0.78 },
        { mes: 8, peso: 7.88,deinf: 0.83 },
        { mes: 9, peso: 8.35,deinf: 0.9 },
        { mes: 10, peso: 8.71,deinf: 0.96 },
        { mes: 11, peso: 9.03,deinf: 0.97 },
        { mes: 12, peso: 9.25,deinf: 0.98 },
        { mes: 13, peso: 9.49,deinf: 1.01 },
        { mes: 14, peso: 9.74,deinf: 1.04 },
        { mes: 15, peso: 9.98,deinf: 1.06 },
        { mes: 16, peso: 10.22,deinf: 1.01 },
        { mes: 17, peso: 10.46,deinf: 1.12 },
        { mes: 18, peso: 10.70,deinf: 1.14 },
        { mes: 19, peso: 10.91,deinf: 1.17 },
        { mes: 20, peso: 11.13,deinf: 1.21 },
        { mes: 21, peso: 11.34,deinf: 1.24 },
        { mes: 22, peso: 11.55,deinf: 1.27 },
        { mes: 23, peso: 11.77,deinf: 1.30 },
        { mes: 24, peso: 12,deinf: 1.33 },
        { mes: 25, peso: 12.19,deinf: 1.35 },
        { mes: 26, peso: 12.38,deinf: 1.37 },
        { mes: 27, peso: 12.58,deinf: 1.39 },
        { mes: 28, peso: 12.77,deinf: 1.41 },
        { mes: 29, peso: 12.96,deinf: 1.43 },
        { mes: 30, peso: 13.15,deinf: 1.45 },
        { mes: 31, peso: 13.34,deinf: 1.47 },
        { mes: 32, peso: 13.53,deinf: 1.49 },
        { mes: 33, peso: 13.72,deinf: 1.51 },
        { mes: 34, peso: 13.92,deinf: 1.53 },
        { mes: 35, peso: 14.11,deinf: 1.55 },
        { mes: 36, peso: 14.30,deinf: 1.57 },
        { mes: 37, peso: 14.46,deinf: 1.58 },
        { mes: 38, peso: 14.62,deinf: 1.60 },
        { mes: 39, peso: 14.79,deinf: 1.61 },
        { mes: 40, peso: 14.95,deinf: 1.63 },
        { mes: 41, peso: 15.11,deinf: 1.64 },
        { mes: 42, peso: 15.27,deinf: 1.66 },
        { mes: 43, peso: 15.44,deinf: 1.67 },
        { mes: 44, peso: 15.60,deinf: 1.69 },
        { mes: 45, peso: 15.76,deinf: 1.70 },
        { mes: 46, peso: 15.92,deinf: 1.72 },
        { mes: 47, peso: 16.09,deinf: 1.73 },
        { mes: 48, peso: 16.25,deinf: 1.75 },
        { mes: 49, peso: 16.39,deinf: 1.76 },
        { mes: 50, peso: 16.52,deinf: 1.78 },
        { mes: 51, peso: 16.66,deinf: 1.80 },
        { mes: 52, peso: 16.80,deinf: 1.82 },
        { mes: 53, peso: 16.94,deinf: 1.84 },
        { mes: 54, peso: 17.07,deinf: 1.86 },
        { mes: 55, peso: 17.21,deinf: 1.87 },
        { mes: 56, peso: 17.35,deinf: 1.89 },
        { mes: 57, peso: 17.49,deinf: 1.91 },
        { mes: 58, peso: 17.62,deinf: 1.93 },
        { mes: 59, peso: 17.76,deinf: 1.95 },
        { mes: 60, peso: 17.9,deinf: 1.97 },
        { mes: 61, peso: 18.09,deinf: 1.99 },
        { mes: 62, peso: 18.29,deinf: 2.02 },
        { mes: 63, peso: 18.49,deinf: 2.04 },
        { mes: 64, peso: 18.68,deinf: 2.06 },
        { mes: 65, peso: 18.88,deinf: 2.09 },
        { mes: 66, peso: 19.07,deinf: 2.11 },
        { mes: 67, peso: 19.27,deinf: 2.14 },
        { mes: 68, peso: 19.47,deinf: 2.16 },
        { mes: 69, peso: 19.66,deinf: 2.19 },
        { mes: 70, peso: 19.86,deinf: 2.21 },
        { mes: 71, peso: 20.05,deinf: 2.23 },
        { mes: 72, peso: 20.25,deinf: 2.26 },
        { mes: 73, peso: 20.45,deinf: 2.30 },
        { mes: 74, peso: 20.64,deinf: 2.34 },
        { mes: 75, peso: 20.84,deinf: 2.38 },
        { mes: 76, peso: 21.03,deinf: 2.43 },
        { mes: 77, peso: 21.23,deinf: 2.47 },
        { mes: 78, peso: 21.42,deinf: 2.51 },
        { mes: 79, peso: 21.62,deinf: 2.55 },
        { mes: 80, peso: 21.82,deinf: 2.6 },
        { mes: 81, peso: 22.01,deinf: 2.64 },
        { mes: 82, peso: 22.21,deinf: 2.68 },
        { mes: 83, peso: 22.4,deinf: 2.72 },
        { mes: 84, peso: 22.6,deinf: 2.76 },
        { mes: 85, peso: 22.84,deinf: 2.82 },
        { mes: 86, peso: 23.08,deinf: 2.87 },
        { mes: 87, peso: 23.32,deinf: 2.92 },
        { mes: 88, peso: 23.57,deinf: 2.98 },
        { mes: 89, peso: 23.81,deinf: 3.03 },
        { mes: 90, peso: 24.05,deinf: 3.08 },
        { mes: 91, peso: 24.29,deinf: 3.14 },
        { mes: 92, peso: 24.53,deinf: 3.19 },
        { mes: 93, peso: 24.77,deinf: 3.24 },
        { mes: 94, peso: 25.02,deinf: 3.30 },
        { mes: 95, peso: 25.26,deinf: 3.35 },
        { mes: 96, peso: 25.50,deinf: 3.40 },
        { mes: 97, peso: 25.75,deinf: 3.44 },
        { mes: 98, peso: 26,deinf: 3.49 },
        { mes: 99, peso: 26.25,deinf: 3.53 },
        { mes: 100, peso: 26.50,deinf: 3.58 },
        { mes: 101, peso: 26.75,deinf: 3.62 },
        { mes: 102, peso: 27,deinf: 3.67 },
        { mes: 103, peso: 27.25,deinf: 3.71 },
        { mes: 104, peso: 27.50,deinf: 3.76 },
        { mes: 105, peso: 27.75,deinf: 3.80 },
        { mes: 106, peso: 28,deinf: 3.84 },
        { mes: 107, peso: 28.25,deinf: 3.89 },
        { mes: 108, peso: 28.50,deinf: 3.93 },
        { mes: 109, peso: 28.79,deinf: 3.99 },
        { mes: 110, peso: 29.08,deinf: 4.06 },
        { mes: 111, peso: 29.37,deinf: 4.12 },
        { mes: 112, peso: 29.67,deinf: 4.18 },
        { mes: 113, peso: 29.96,deinf: 4.24 },
        { mes: 114, peso: 30.25,deinf: 4.3 },
        { mes: 115, peso: 30.54,deinf: 4.37 },
        { mes: 116, peso: 30.83,deinf: 4.43 },
        { mes: 117, peso: 31.12,deinf: 4.49 },
        { mes: 118, peso: 31.42,deinf: 4.55 },
        { mes: 119, peso: 31.71,deinf: 4.61 },
        { mes: 120, peso: 32,deinf: 4.68 },
        { mes: 121, peso: 32.33,deinf: 4.74 },
        { mes: 122, peso: 32.67,deinf: 4.81 },
        { mes: 123, peso: 32.99,deinf: 4.87 },
        { mes: 124, peso: 33.33,deinf: 4.94 },
        { mes: 125, peso: 33.66,deinf: 5.01 },
        { mes: 126, peso: 33.99,deinf: 5.07 },
        { mes: 127, peso: 34.33,deinf: 5.14 },
        { mes: 128, peso: 34.66,deinf: 5.21 },
        { mes: 129, peso: 34.99,deinf: 5.27 },
        { mes: 130, peso: 35.33,deinf: 5.34 },
        { mes: 131, peso: 35.66,deinf: 5.41 },
        { mes: 132, peso: 36,deinf: 5.47 },
        { mes: 133, peso: 36.48,deinf: 5.58 },
        { mes: 134, peso: 36.95,deinf: 5.69 },
        { mes: 135, peso: 37.42,deinf: 5.79 },
        { mes: 136, peso: 37.90,deinf: 5.9 },
        { mes: 137, peso: 38.38,deinf: 6 },
        { mes: 138, peso: 38.85,deinf: 6.11 },
        { mes: 139, peso: 39.32,deinf: 6.22 },
        { mes: 140, peso: 39.80,deinf: 6.32 },
        { mes: 141, peso: 40.27,deinf: 6.43 },
        { mes: 142, peso: 40.75,deinf: 6.53 },
        { mes: 143, peso: 41.22,deinf: 6.64 },
        { mes: 144, peso: 41.7,deinf: 6.75 },
        { mes: 145, peso: 42.03,deinf: 6.75 },
        { mes: 146, peso: 42.37,deinf: 6.76 },
        { mes: 147, peso: 42.7,deinf: 6.76 },
        { mes: 148, peso: 43.03,deinf: 6.77 },
        { mes: 149, peso: 43.36,deinf: 6.77 },
        { mes: 150, peso: 43.7,deinf: 6.77 },
        { mes: 151, peso: 44.03,deinf: 6.78 },
        { mes: 152, peso: 44.36,deinf: 6.78 },
        { mes: 153, peso: 44.70,deinf: 6.79 },
        { mes: 154, peso: 45.03,deinf: 6.79 },
        { mes: 155, peso: 45.36,deinf: 6.80 },
        { mes: 156, peso: 45.70,deinf: 6.80 },
        { mes: 157, peso: 45.98,deinf: 6.76 },
        { mes: 158, peso: 46.27,deinf: 6.71 },
        { mes: 159, peso: 46.55,deinf: 6.67 },
        { mes: 160, peso: 46.83,deinf: 6.63 },
        { mes: 161, peso: 47.11,deinf: 6.58 },
        { mes: 162, peso: 47.4,deinf: 6.54 },
        { mes: 163, peso: 47.68,deinf: 6.50 },
        { mes: 164, peso: 47.96,deinf: 6.45 },
        { mes: 165, peso: 48.25,deinf: 6.41 },
        { mes: 166, peso: 48.53,deinf: 6.37 },
        { mes: 167, peso: 48.81,deinf: 6.32 },
        { mes: 168, peso: 49.1,deinf: 6.28 },
        { mes: 169, peso: 49.27,deinf: 6.24 },
        { mes: 170, peso: 49.43,deinf: 6.20 },
        { mes: 171, peso: 49.60,deinf: 6.16 },
        { mes: 172, peso: 49.77,deinf: 6.12 },
        { mes: 173, peso: 49.94,deinf: 6.08 },
        { mes: 174, peso: 50.10,deinf: 6.04 },
        { mes: 175, peso: 50.27,deinf: 5.60 },
        { mes: 176, peso: 50.43,deinf: 5.96 },
        { mes: 177, peso: 50.60,deinf: 5.91 },
        { mes: 178, peso: 50.77,deinf: 5.87 },
        { mes: 179, peso: 50.94,deinf: 5.83 },
        { mes: 180, peso: 51.10,deinf: 5.79 },
        { mes: 181, peso: 51.21,deinf: 5.78 },
        { mes: 182, peso: 51.32,deinf: 5.77 },
        { mes: 183, peso: 51.42,deinf: 5.77 },
        { mes: 184, peso: 51.53,deinf: 5.76 },
        { mes: 185, peso: 51.64,deinf: 5.75 },
        { mes: 186, peso: 51.75,deinf: 5.74 },
        { mes: 187, peso: 51.86,deinf: 5.73 },
        { mes: 188, peso: 51.97,deinf: 5.72 },
        { mes: 189, peso: 52.07,deinf: 5.71 },
        { mes: 190, peso: 52.18,deinf: 5.70 },
        { mes: 191, peso: 52.29,deinf: 5.69 },
        { mes: 192, peso: 52.40,deinf: 5.69 },
        { mes: 193, peso: 52.47,deinf: 5.69 },
        { mes: 194, peso: 52.53,deinf: 5.69 },
        { mes: 195, peso: 52.60,deinf: 5.70 },
        { mes: 196, peso: 52.67,deinf: 5.70 },
        { mes: 197, peso: 52.73,deinf: 5.71 },
        { mes: 198, peso: 52.80,deinf: 5.71 },
        { mes: 199, peso: 52.87,deinf: 5.72 },
        { mes: 200, peso: 52.93,deinf: 5.72 },
        { mes: 201, peso: 52.99,deinf: 5.73 },
        { mes: 202, peso: 53.06,deinf: 5.73 },
        { mes: 203, peso: 53.13,deinf: 5.73 },
        { mes: 204, peso: 53.20,deinf: 5.74 },
        { mes: 205, peso: 53.24,deinf: 5.75 },
        { mes: 206, peso: 53.28,deinf: 5.75 },
        { mes: 207, peso: 53.32,deinf: 5.77 },
        { mes: 208, peso: 53.36,deinf: 5.77 },
        { mes: 209, peso: 53.41,deinf: 5.78 },
        { mes: 210, peso: 53.45,deinf: 5.79 },
        { mes: 211, peso: 53.49,deinf: 5.80 },
        { mes: 212, peso: 53.53,deinf: 5.81 },
        { mes: 213, peso: 53.57,deinf: 5.82 },
        { mes: 214, peso: 53.62,deinf: 5.83 },
        { mes: 215, peso: 53.65,deinf: 5.84 },
        { mes: 216, peso: 53.70,deinf: 5.85 },
        { mes: 228, peso: 53.80,deinf: 5.99 },
    ]    

    const pesoH =[
        { mes: 0, peso: 3.42,deinf: 0.51 },
        { mes: 1, peso: 4.05,deinf: 0.45 },
        { mes: 2, peso: 4.9,deinf: 0.53 },
        { mes: 3, peso: 6,deinf: 0.65 },
        { mes: 4, peso: 6.6,deinf: 0.74 },
        { mes: 5, peso: 7.2,deinf: 0.81 },
        { mes: 6, peso: 7.8,deinf: 0.88 },
        { mes: 7, peso: 8.3,deinf: 0.96 },
        { mes: 8, peso: 8.8,deinf: 1.06 },
        { mes: 9, peso: 9.3,deinf: 0.9 },
        { mes: 10, peso: 9.6,deinf: 0.96 },
        { mes: 11, peso: 9.9,deinf: 0.97 },
        { mes: 12, peso: 10.2,deinf: 0.98 },
        { mes: 13, peso: 10.43,deinf: 1.01 },
        { mes: 14, peso: 10.65,deinf: 1.04 },
        { mes: 15, peso: 10.88,deinf: 1.06 },
        { mes: 16, peso: 11.1,deinf: 1.09 },
        { mes: 17, peso: 11.33,deinf: 1.12 },
        { mes: 18, peso: 11.55,deinf: 1.14 },
        { mes: 19, peso: 11.76,deinf: 1.17 },
        { mes: 20, peso: 11.97,deinf: 1.20 },
        { mes: 21, peso: 12.17,deinf: 1.24 },
        { mes: 22, peso: 12.38,deinf: 1.27 },
        { mes: 23, peso: 12.59,deinf: 1.30 },
        { mes: 24, peso: 12.80,deinf: 1.33 },
        { mes: 25, peso: 12.96,deinf: 1.35 },
        { mes: 26, peso: 13.12,deinf: 1.37 },
        { mes: 27, peso: 13.29,deinf: 1.39 },
        { mes: 28, peso: 13.45,deinf: 1.41 },
        { mes: 29, peso: 13.61,deinf: 1.43 },
        { mes: 30, peso: 13.77,deinf: 1.45 },
        { mes: 31, peso: 13.94,deinf: 1.47 },
        { mes: 32, peso: 14.10,deinf: 1.49 },
        { mes: 33, peso: 14.26,deinf: 1.51 },
        { mes: 34, peso: 14.42,deinf: 1.53 },
        { mes: 35, peso: 14.59,deinf: 1.55 },
        { mes: 36, peso: 14.75,deinf: 1.57 },
        { mes: 37, peso: 14.89,deinf: 1.59 },
        { mes: 38, peso: 15.02,deinf: 1.61 },
        { mes: 39, peso: 15.16,deinf: 1.63 },
        { mes: 40, peso: 15.29,deinf: 1.66 },
        { mes: 41, peso: 15.43,deinf: 1.68 },
        { mes: 42, peso: 15.57,deinf: 1.70 },
        { mes: 43, peso: 15.71,deinf: 1.72 },
        { mes: 44, peso: 15.84,deinf: 1.75 },
        { mes: 45, peso: 15.98,deinf: 1.77 },
        { mes: 46, peso: 16.12,deinf: 1.79 },
        { mes: 47, peso: 16.26,deinf: 1.81 },
        { mes: 48, peso: 16.40,deinf: 1.83 },
        { mes: 49, peso: 16.58,deinf: 1.86 },
        { mes: 50, peso: 16.77,deinf: 1.88 },
        { mes: 51, peso: 16.95,deinf: 1.90 },
        { mes: 52, peso: 17.13,deinf: 1.92 },
        { mes: 53, peso: 17.32,deinf: 1.94 },
        { mes: 54, peso: 17.50,deinf: 1.97 },
        { mes: 55, peso: 17.68,deinf: 1.99 },
        { mes: 56, peso: 17.87,deinf: 2.01 },
        { mes: 57, peso: 18.05,deinf: 2.03 },
        { mes: 58, peso: 18.23,deinf: 2.06 },
        { mes: 59, peso: 18.42,deinf: 2.08 },
        { mes: 60, peso: 18.60,deinf: 2.10 },
        { mes: 61, peso: 18.79,deinf: 2.14 },
        { mes: 62, peso: 18.98,deinf: 2.18 },
        { mes: 63, peso: 19.17,deinf: 2.23 },
        { mes: 64, peso: 19.37,deinf: 2.27 },
        { mes: 65, peso: 19.56,deinf: 2.31 },
        { mes: 66, peso: 19.75,deinf: 2.35 },
        { mes: 67, peso: 19.94,deinf: 2.39 },
        { mes: 68, peso: 20.13,deinf: 2.44 },
        { mes: 69, peso: 20.32,deinf: 2.48 },
        { mes: 70, peso: 20.52,deinf: 2.52 },
        { mes: 71, peso: 20.71,deinf: 2.56 },
        { mes: 72, peso: 20.90,deinf: 2.60 },
        { mes: 73, peso: 21.07,deinf: 2.62 },
        { mes: 74, peso: 21.25,deinf: 2.64 },
        { mes: 75, peso: 21.42,deinf: 2.66 },
        { mes: 76, peso: 21.60,deinf: 2.68 },
        { mes: 77, peso: 21.78,deinf: 2.69 },
        { mes: 78, peso: 21.95,deinf: 2.71 },
        { mes: 79, peso: 22.12,deinf: 2.73 },
        { mes: 80, peso: 22.3,deinf: 2.75 },
        { mes: 81, peso: 22.47,deinf: 2.76 },
        { mes: 82, peso: 22.65,deinf: 2.78 },
        { mes: 83, peso: 22.82,deinf: 2.80 },
        { mes: 84, peso: 23,deinf: 2.82 },
        { mes: 85, peso: 23.22,deinf: 2.84 },
        { mes: 86, peso: 23.43,deinf: 2.86 },
        { mes: 87, peso: 23.65,deinf: 2.89 },
        { mes: 88, peso: 23.87,deinf: 2.91 },
        { mes: 89, peso: 24.08,deinf: 2.93 },
        { mes: 90, peso: 24.30,deinf: 2.96 },
        { mes: 91, peso: 24.52,deinf: 2.98 },
        { mes: 92, peso: 24.73,deinf: 3 },
        { mes: 93, peso: 24.95,deinf: 3.03 },
        { mes: 94, peso: 25.17,deinf: 3.05 },
        { mes: 95, peso: 25.38,deinf: 3.08 },
        { mes: 96, peso: 25.60,deinf: 3.10 },
        { mes: 97, peso: 25.84,deinf: 3.13 },
        { mes: 98, peso: 26.08,deinf: 3.17 },
        { mes: 99, peso: 26.32,deinf: 3.20 },
        { mes: 100, peso: 26.57,deinf: 3.23 },
        { mes: 101, peso: 26.81,deinf: 3.27 },
        { mes: 102, peso: 27.05,deinf: 3.30 },
        { mes: 103, peso: 27.29,deinf: 3.34 },
        { mes: 104, peso: 27.53,deinf: 3.37 },
        { mes: 105, peso: 27.78,deinf: 3.40 },
        { mes: 106, peso: 28.02,deinf: 3.44 },
        { mes: 107, peso: 28.26,deinf: 3.47 },
        { mes: 108, peso: 28.50,deinf: 3.51 },
        { mes: 109, peso: 28.75,deinf: 3.55 },
        { mes: 110, peso: 29.00,deinf: 3.59 },
        { mes: 111, peso: 29.25,deinf: 3.63 },
        { mes: 112, peso: 29.50,deinf: 3.67 },
        { mes: 113, peso: 29.75,deinf: 3.71 },
        { mes: 114, peso: 30.00,deinf: 3.75 },
        { mes: 115, peso: 30.25,deinf: 3.79 },
        { mes: 116, peso: 30.50,deinf: 3.83 },
        { mes: 117, peso: 30.75,deinf: 3.87 },
        { mes: 118, peso: 31.00,deinf: 3.91 },
        { mes: 119, peso: 31.25,deinf: 3.95 },
        { mes: 120, peso: 31.50,deinf: 3.99 },
        { mes: 121, peso: 31.76,deinf: 4.03 },
        { mes: 122, peso: 32.02,deinf: 4.08 },
        { mes: 123, peso: 32.28,deinf: 4.13 },
        { mes: 124, peso: 32.53,deinf: 4.18 },
        { mes: 125, peso: 32.79,deinf: 4.23 },
        { mes: 126, peso: 33.05,deinf: 4.28 },
        { mes: 127, peso: 33.31,deinf: 4.33 },
        { mes: 128, peso: 33.57,deinf: 4.38 },
        { mes: 129, peso: 33.83,deinf: 4.42 },
        { mes: 130, peso: 34.08,deinf: 4.47 },
        { mes: 131, peso: 34.34,deinf: 4.52 },
        { mes: 132, peso: 34.60,deinf: 4.57 },
        { mes: 133, peso: 34.92,deinf: 4.64 },
        { mes: 134, peso: 35.23,deinf: 4.71 },
        { mes: 135, peso: 35.55,deinf: 4.78 },
        { mes: 136, peso: 35.87,deinf: 4.85 },
        { mes: 137, peso: 36.18,deinf: 4.92 },
        { mes: 138, peso: 36.50,deinf: 4.98 },
        { mes: 139, peso: 36.82,deinf: 5.05 },
        { mes: 140, peso: 37.13,deinf: 5.12 },
        { mes: 141, peso: 37.45,deinf: 5.19 },
        { mes: 142, peso: 37.77,deinf: 5.26 },
        { mes: 143, peso: 38.08,deinf: 5.33 },
        { mes: 144, peso: 38.40,deinf: 5.40 },
        { mes: 145, peso: 38.84,deinf: 5.51 },
        { mes: 146, peso: 39.28,deinf: 5.62 },
        { mes: 147, peso: 39.73,deinf: 5.74 },
        { mes: 148, peso: 40.17,deinf: 5.85 },
        { mes: 149, peso: 40.61,deinf: 5.96 },
        { mes: 150, peso: 41.05,deinf: 6.07 },
        { mes: 151, peso: 41.49,deinf: 6.19 },
        { mes: 152, peso: 41.93,deinf: 6.30 },
        { mes: 153, peso: 42.38,deinf: 6.41 },
        { mes: 154, peso: 42.82,deinf: 6.52 },
        { mes: 155, peso: 43.26,deinf: 6.64 },
        { mes: 156, peso: 43.70,deinf: 6.75 },
        { mes: 157, peso: 44.23,deinf: 6.89 },
        { mes: 158, peso: 44.75,deinf: 7.04 },
        { mes: 159, peso: 45.28,deinf: 7.19 },
        { mes: 160, peso: 45.80,deinf: 7.33 },
        { mes: 161, peso: 46.33,deinf: 7.48 },
        { mes: 162, peso: 46.85,deinf: 7.63 },
        { mes: 163, peso: 47.37,deinf: 7.77 },
        { mes: 164, peso: 47.90,deinf: 7.92 },
        { mes: 165, peso: 48.43,deinf: 8.06 },
        { mes: 166, peso: 48.95,deinf: 8.21 },
        { mes: 167, peso: 49.48,deinf: 8.36 },
        { mes: 168, peso: 50,deinf: 8.50 },
        { mes: 169, peso: 50.57,deinf: 8.59 },
        { mes: 170, peso: 51.13,deinf: 8.68 },
        { mes: 171, peso: 51.70,deinf: 8.77 },
        { mes: 172, peso: 52.27,deinf: 8.86 },
        { mes: 173, peso: 52.83,deinf: 8.94 },
        { mes: 174, peso: 53.40,deinf: 9.03 },
        { mes: 175, peso: 53.97,deinf: 9.12 },
        { mes: 176, peso: 54.53,deinf: 9.21 },
        { mes: 177, peso: 55.10,deinf: 9.30 },
        { mes: 178, peso: 55.67,deinf: 9.39 },
        { mes: 179, peso: 56.23,deinf: 9.48 },
        { mes: 180, peso: 56.80,deinf: 9.56 },
        { mes: 181, peso: 57.16,deinf: 9.53 },
        { mes: 182, peso: 57.52,deinf: 9.50 },
        { mes: 183, peso: 57.88,deinf: 9.47 },
        { mes: 184, peso: 58.23,deinf: 9.44 },
        { mes: 185, peso: 58.59,deinf: 9.41 },
        { mes: 186, peso: 58.95,deinf: 9.38 },
        { mes: 187, peso: 59.31,deinf: 9.35 },
        { mes: 188, peso: 59.67,deinf: 9.32 },
        { mes: 189, peso: 60.03,deinf: 9.29 },
        { mes: 190, peso: 60.38,deinf: 9.25 },
        { mes: 191, peso: 60.74,deinf: 9.22 },
        { mes: 192, peso: 61.10,deinf: 9.19 },
        { mes: 193, peso: 61.30,deinf: 9.13 },
        { mes: 194, peso: 61.50,deinf: 9.07 },
        { mes: 195, peso: 61.70,deinf: 9.01 },
        { mes: 196, peso: 61.90,deinf: 8.94 },
        { mes: 197, peso: 62.10,deinf: 8.88 },
        { mes: 198, peso: 62.30,deinf: 8.82 },
        { mes: 199, peso: 62.50,deinf: 8.76 },
        { mes: 200, peso: 62.70,deinf: 8.70 },
        { mes: 201, peso: 62.90,deinf: 8.63 },
        { mes: 202, peso: 63.10,deinf: 8.57 },
        { mes: 203, peso: 63.30,deinf: 8.51 },
        { mes: 204, peso: 63.50,deinf: 8.45 },
        { mes: 205, peso: 63.61,deinf: 8.45 },
        { mes: 206, peso: 63.72,deinf: 8.45 },
        { mes: 207, peso: 63.83,deinf: 8.45 },
        { mes: 208, peso: 63.93,deinf: 8.45 },
        { mes: 209, peso: 64.04,deinf: 8.44 },
        { mes: 210, peso: 64.15,deinf: 8.44 },
        { mes: 211, peso: 64.26,deinf: 8.44 },
        { mes: 212, peso: 64.37,deinf: 8.44 },
        { mes: 213, peso: 64.48,deinf: 8.44 },
        { mes: 214, peso: 64.58,deinf: 8.44 },
        { mes: 215, peso: 64.69,deinf: 8.44 },
        { mes: 216, peso: 64.80,deinf: 8.44 },
        { mes: 228, peso: 65.70,deinf: 8.61 },
    ]    

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
                document.getElementById('lblEstatura').style.display='block';
                document.getElementById('estatura').style.display='block';
                document.getElementById('lblvale').style.display='block';
                document.getElementById('valorestatura').style.display='block';
                document.getElementById('lblPeso').style.display='block';
                document.getElementById('peso').style.display = 'block'; 
                document.getElementById('lblvalp').style.display='block';
                document.getElementById('valorpeso').style.display='block';
                document.getElementById('imcDiv').style.display = 'block'; 
            }
        }
    });
    function calcularZpeso(){
        var peso=document.getElementById('peso').value;
        var fechaNac = new Date(document.getElementById('fechanac').value);
        var fechaCon = new Date(document.getElementById('fechacon').value);
        var edad = fechaCon.getFullYear() - fechaNac.getFullYear();
        var meses=diferenciaEnMeses(fechaNac,fechaCon);

        if(document.getElementById('sexo').value==='M'){
            var p=pesoM.find(el=>el.mes===meses)
        }else{
            var p=pesoH.find(el=>el.mes===meses)
        }    
    
        var p50m=p.peso
        var dem=p.deinf
        var peso=document.getElementById('peso').value
        console.log('p50:'+p50m)
        console.log('dem'+dem)
        var zm=(peso-p50m)/dem
        document.getElementById('valorpeso').value=zm.toFixed(2)

        calcularIMC();
    }

    function calcularZestatura(){
        var fechaNac = new Date(document.getElementById('fechanac').value);
        var fechaCon = new Date(document.getElementById('fechacon').value);
        var edad = fechaCon.getFullYear() - fechaNac.getFullYear();
        var meses=diferenciaEnMeses(fechaNac,fechaCon);
        console.log('meses:'+meses)
        if(document.getElementById('sexo').value==='M'){
            var p=percentil50M.find(el=>el.mes===meses)
        }else{
            var p=percentil50H.find(el=>el.mes===meses)
        }    
        console.log('pM:'+p)
    
        var p50m=p.p50
        var dem=p.de
        var estatura=document.getElementById('estatura').value
        console.log('p50:'+p50m)
        console.log('dem'+dem)
        var zm=(estatura-p50m)/dem
        document.getElementById('valorestatura').value=zm.toFixed(2)
    }    

    function diferenciaEnMeses(fechaInicio,fechaFin){
        var difAnios=fechaFin.getFullYear()-fechaInicio.getFullYear();
        var difMeses=fechaFin.getMonth()-fechaInicio.getMonth();
        var mesesTot=difAnios*12+difMeses

        if(fechaFin.getDate()<fechaInicio.getDate()){
            mesesTot--;
        }

        return mesesTot;
    }

    function calcularIMC(){
        var estatura=parseInt(document.getElementById('estatura').value)
        var peso=parseInt(document.getElementById('peso').value)

        var imc=(peso/(estatura*estatura))*10000;

        document.getElementById('imc').value=imc.toFixed(2);
    }
</script>
@stop