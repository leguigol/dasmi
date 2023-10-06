@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
<div class="row">
    <div class="col-md-6">                
        <h5>HISTORIA CLINICA</h5>
        <h1>ANTECEDENTES - {{$padron->apellido . " " . $padron->nombres}}</h1>
    </div>
</div>
@stop

@section('content')
      <ul class="nav nav-tabs" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">TABAQUISMO</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">ALCOHOLISMO</a>
       </li>
       <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">DROGAS/ACTIV.FISICA</a>
       </li>
       <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">ANTEC.PERSONALES</a>
       </li>
       <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">ANTEC.FAMILIARES</a>
       </li>
    </ul>
    {!! Form::open(['route' => ['tabaquismo.update', $padron->id],'method'=>'patch']) !!}
      <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
      <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">Fuma ?</label>
                      <select class="form-control" name="fuma">
                        <option disabled selected>Elija...</option>
                        <option value="S" @if($tabaco->fuma=='S') {{ 'selected' }} @endif>SI</option>
                        <option value="N" @if($tabaco->fuma=='N') {{ 'selected' }} @endif>NO</option>
                      </select>
                    </div>
                  </div>
                  @error('fuma')
                    <strong style="color:red">*{{$message}}</strong>
                  @enderror
                 
                </div>      
                <div class="row">
                  <div class="col-md-9">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">Desde ?</label>
                      <input type="date" class="form-control" name="input_desde" value="{{$tabaco->desdefuma}}">
                    </div>
                    @error('input_desde')
                      <strong style="color:red">*{{$message}}</strong>
                    @enderror
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-9">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">Cantidad ?</label>
                      <input type="text" class="form-control" name="input_canti" value="{{$tabaco->canti}}">
                    </div>
                  </div>  
                </div>
                <div class="row">
                  @error('input_canti')
                    <strong style="color:red">*{{$message}}</strong>
                  @enderror
                </div>  
              <div class="row">
                      <div class="col-md-2">    
                        <div class="form-check">
                          <label class="form-check-label" for="flexCheckDefault">Nunca Fumo:</label>
                        </div>
                      </div>  
                      <div class="col-md-1">                  
                        @if ($tabaco->nunca==1)
                            <input type="checkbox" name="nuncafumo" checked>                            
                        @else
                        <input type="checkbox" name="nuncafumo">                           
                        @endif
                      </div>  
                  <div class="col-md-2">                  
                    <div class="form-check input-group">
                      <label class="form-check-label" for="flexCheckDefault">Dejo de Fumar ?:</label>
                    </div>
                  </div>  
                  <div class="col-md-1">                  
                    @if ($tabaco->dejo==1)
                        <input type="checkbox" name="dejofumar" checked>
                    @else
                        <input type="checkbox" name="nuncafumo">                           
                    @endif                  
                  </div>  
                  <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">Desde Cuando ?</label>
                      <input type="date" class="form-control" name="desdecuando" value="{{$tabaco->desdedejo}}">
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-9">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">¿Cuántos minutos pasan desde que se levanta hasta que prende su primer cigarrillo ? </label>
                      <input type="text" class="form-control" name="input_minutos" value="{{$tabaco->minutos}}">
                    </div>
                  </div>  
                </div>
                <div class="row">
                  @error('input_minutos')
                  <strong style="color:red">*{{$message}}</strong>
                  @enderror
                </div>  
                <div class="row">
                  <div class="col-md-6">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">¿Piensa dejar de fumar en el próximo mes?</label>
                      <select class="form-control" name="piensa">
                        <option disabled selected>Elija...</option>
                        <option value="S" @if($tabaco->piensa=='S') {{ 'selected'}} @endif>SI</option>
                        <option value="N" @if($tabaco->piensa=='N') {{ 'selected'}} @endif>NO</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    @error('piensa')
                    <strong style="color:red">*{{$message}}</strong>
                    @enderror
                  </div>    
                </div>      

                              
                <div class="col-md-3 mb-2">
                  <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                </div>
            </div>  

        </div>
            
      </div>

    {!! form::close() !!}

        <div class="tab-pane" id="tabs-2" role="tabpanel">
          {!! Form::open(['route' => 'alcoholismo.store']) !!}
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="card">
                  <div class="card-body">

                    <div class="row">
                      <div class="col-md-6">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">Bebe ?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekbs" value="S" onclick="check(this);" name="inpb[]">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekbn" value="N" onclick="check(this);" name="inpb[]">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Lo criticó alguien porque tomaba mucho?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekcris" value="S" onclick="check2(this)" name="cri[]">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekcrin" value="N" onclick="check2(this)" name="cri[]">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿tomaba mucho?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chektomas" value="S" onclick="check3(this)" name="toma[]">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chektoman" value="N" onclick="check3(this)" name="toma[]">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Sintió alguna vez ganas de disminuir la bebida?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cheksins" value="S" onclick="check4(this)" name="sin[]">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cheksinn" value="N" onclick="check4(this)" name="sin[]">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Se sintió alguna vez culpable por tomar mucho?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekculs" value="S" onclick="check5(this)" name="cul[]">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekculn" value="N" onclick="check5(this)" name="cul[]">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Toma algo a la mañana para sentirse mejor?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekts" value="S" onclick="check6(this)" name="ma[]">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chektn" value="N" onclick="check6(this)" name="ma[]">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 mb-2">
                      <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                    </div>
    
                  </div>  
                </div>
    
            </div>
          </div>            
        </div>  
        {!! form::close() !!}

        <div class="tab-pane" id="tabs-3" role="tabpanel">
          <p>third panel</p>
        </div>
      </div>  
@stop

@section('css')
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
function check(obj){

  document.getElementById("chekbs").checked = false;
  document.getElementById("chekbn").checked = false;
  obj.checked=true;
}

function check2(obj){

  document.getElementById("chekcris").checked = false;
  document.getElementById("chekcrin").checked = false;
  obj.checked=true;
}
function check3(obj){

document.getElementById("chektomas").checked = false;
document.getElementById("chektoman").checked = false;
obj.checked=true;
}
function check4(obj){

document.getElementById("cheksins").checked = false;
document.getElementById("cheksinn").checked = false;
obj.checked=true;
}
function check5(obj){

document.getElementById("chekculs").checked = false;
document.getElementById("chekculn").checked = false;
obj.checked=true;
}
function check6(obj){

document.getElementById("chekts").checked = false;
document.getElementById("chektn").checked = false;
obj.checked=true;
}

</script>

@stop