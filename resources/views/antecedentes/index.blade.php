@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
<div class="row">
    <div class="col-md-6">                
        <h5>HISTORIA CLINICA</h5>
        <h1>ANTECEDENTES - {{$padron->apellido . " " . $padron->nombres}} </h1>
    </div>
</div>
<div class="row">
  <a href="{{route('antecedentes.checktabaco',$padron->id)}}" class="@if($focus=='tabaquismo') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif">TABAQUISMO</a>
  <a href="{{route('antecedentes.checkalcohol',$padron->id)}}" class="@if($focus=='alcoholismo') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif ml-2">ALCOHOLISMO</a>
  <a href="{{route('antecedentes.checkdroga',$padron->id)}}" class="@if($focus=='droga') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif ml-2">DROGAS/ACTIV.FISICA</a>
  <a href="{{route('antecedentes.checkpersonal',$padron->id)}}" class="@if($focus=='personal') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif ml-2">ANTECEDENTES PERSONALES</a>
  <a href="{{route('antecedentes.checkfamiliares',$padron->id)}}" class="@if($focus=='antefamiliares') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif ml-2">ANTECEDENTES FAMILIARES</a>
  <a href="{{route('antecedentes.checkgineco',$padron->id)}}" class="@if($focus=='anteginecologicos') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif ml-2">ANTECEDENTES GINECOLOGICOS</a>
</div>
@stop

@section('content')

@if($focus=='tabaquismo')
    @if(!$tabaco)
    {!! Form::open(['route' => 'tabaquismo.store']) !!}
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
                      <option value="S" @if(old('fuma')=='S'){{'selected'}} @endif>SI</option>
                      <option value="N" @if(old('fuma')=='N'){{'selected'}} @endif>NO</option>
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
                    <input type="date" class="form-control" name="input_desde" value="{{old('input_desde')}}">
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
                    <input type="text" class="form-control" name="input_canti" value="{{old('input_canti')}}">
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
                      <input type="checkbox" name="nuncafumo" value="1" @if(old('nuncafumo')) checked @endif>
                    </div>  
                    <div class="col-md-2">                  
                      <div class="form-check input-group">
                        <label class="form-check-label" for="flexCheckDefault">Dejo de Fumar ?:</label>
                      </div>
                    </div>  
                    <div class="col-md-1">                  
                    <input type="checkbox" name="dejofumar" value="1" @if(old('nuncafumo')) checked @endif>
                    </div>  
                    <div class="col-md-3">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Desde Cuando ?</label>
                        <input type="date" class="form-control" name="desdecuando">
                      </div>
                    </div>  
            </div>
              <div class="row">
                <div class="col-md-9">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">¿Cuántos minutos pasan desde que se levanta hasta que prende su primer cigarrillo ? </label>
                    <input type="text" class="form-control" name="input_minutos">
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
                      <option value="S">SI</option>
                      <option value="N">NO</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  @error('piensa')
                  <strong style="color:red">*{{$message}}</strong>
                  @enderror
                </div>    
              </div>      

            <div class="row">                            
              <div class="col-md-3 mb-2">
                <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
              </div>
              <div class="col-md-3 mb-2">
                <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
              </div>
            </div>  
          </div>  

      </div>
          
    </div>

    {!! form::close() !!}

    @else
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
                            <input type="checkbox" name="dejofumar">                           
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

              <div class="row">                            
                <div class="col-md-3 mb-2">
                  <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                </div>
                <div class="col-md-3 mb-2">
                  <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
                </div>
              </div>  
            </div>  

      </div>
          
    </div>

    {!! form::close() !!}

    @endif

@endif

@if($focus=='alcoholismo')
  @if(!$alcohol)
        <div class="tab-pane" id="tabs-2" role="tabpanel">
          {!! Form::open(['route' => 'alcoholismo.store','onsubmit'=>'return validate(this)']) !!}
          <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="card">
                  <div class="card-body">

                    <div class="row">
                      <div class="col-md-8">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">Bebe ?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekbs" value="S" onclick="check(this);" name="inpbs">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekbn" value="N" onclick="check(this);" name="inpbn">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                      <div class="row">
                        <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                      </div>              
                    </div>

                    <div class="row">
                      <div class="col-md-8">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Lo criticó alguien porque tomaba mucho?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekcris" value="S" onclick="check2(this)" name="cris">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekcrin" value="N" onclick="check2(this)" name="crin">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                      <div class="row">
                        <div style="visibility: hidden; color:red" id="msg2">Debe indicar una opcion</div>
                      </div>              
                    </div>

                    <div class="row">
                      <div class="col-md-8">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿tomaba mucho?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chektomas" value="S" onclick="check3(this)" name="tomas">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chektoman" value="N" onclick="check3(this)" name="toman">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                      <div class="row">
                        <div style="visibility: hidden; color:red" id="msg3">Debe indicar una opcion</div>
                      </div>              
                    </div>

                    <div class="row">
                      <div class="col-md-8">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Sintió alguna vez ganas de disminuir la bebida?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cheksins" value="S" onclick="check4(this)" name="sins">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cheksinn" value="N" onclick="check4(this)" name="sinn">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                      <div class="row">
                        <div style="visibility: hidden; color:red" id="msg4">Debe indicar una opcion</div>
                      </div>              
                    </div>

                    <div class="row">
                      <div class="col-md-8">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Se sintió alguna vez culpable por tomar mucho?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekculs" value="S" onclick="check5(this)" name="culs">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekculn" value="N" onclick="check5(this)" name="culn">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                      <div class="row">
                        <div style="visibility: hidden; color:red" id="msg5">Debe indicar una opcion</div>
                      </div>              
                    </div>

                    <div class="row">
                      <div class="col-md-8">                  
                        <div class="input-group mb-2">
                          <label class="input-group-text" for="inputGroupSelect01">¿Toma algo a la mañana para sentirse mejor?</label>
                            <div class="form-control">  
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekts" value="S" onclick="check6(this)" name="mas">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chektn" value="N" onclick="check6(this)" name="man">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            </div>   
                        </div>
                      </div>
                      <div class="row">
                        <div style="visibility: hidden; color:red" id="msg6">Debe indicar una opcion</div>
                      </div>              
                    </div>
                    <div class="row">
                      <div class="col-md-3 mb-2">
                        <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                      </div>
                      <div class="col-md-3 mb-2">
                        <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
                      </div>
                    </div>  
                  </div>  
                </div>
    
            </div>
          </div>            
        </div>  
        {!! form::close() !!}
  @else

  <div class="tab-pane" id="tabs-2" role="tabpanel">
    {!! Form::open(['route' => ['alcoholismo.update',$padron->id],'method'=>'patch']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
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
                          @if ($alcohol->bebe=='1')
                            <input class="form-check-input" type="checkbox" id="chekbs" value="S" name="inpbs" onclick="check(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chekbn" value="S" name="inpbn" onclick="check(this);">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                            @else
                            <input class="form-check-input" type="checkbox" id="chekbs" value="S" name="inpbs" onclick="check(this);">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chekbn" value="N" name="inpbn" onclick="check(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          @endif  
                        </div>
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                </div>              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">¿Lo criticó alguien porque tomaba mucho?</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                          @if ($alcohol->critica=='1')
                            <input class="form-check-input" type="checkbox" id="chekcris" value="S" name="cris" onclick="check2(this);"checked>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chekcrin" value="N" name="crin" onclick="check2(this);">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                            @else
                            <input class="form-check-input" type="checkbox" id="chekcris" value="S" name="cris" onclick="check2(this);">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chekcrin" value="N" name="crin" onclick="check2(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>                          
                          @endif
                        </div>
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg2">Debe indicar una opcion</div>
                </div>              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">¿tomaba mucho?</label>
                      <div class="form-control">  
                        @if ($alcohol->tomaba=='1')
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chektomas" value="S" name="tomas" onclick="check3(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chektoman" value="N" name="toman" onclick="check3(this);">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        @else
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chektomas" value="S" name="tomas" onclick="check3(this);">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chektoman" value="N" name="toman" onclick="check3(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        @endif
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg3">Debe indicar una opcion</div>
                </div>              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">¿Sintió alguna vez ganas de disminuir la bebida?</label>
                      <div class="form-control">  
                        @if ($alcohol->ganas=='1')
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cheksins" value="S" name="sins" onclick="check4(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="cheksinn" value="N" name="sinn" onclick="check4(this);">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        @else
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cheksins" value="S" name="sins" onclick="check4(this);">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="cheksinn" value="N" name="sinn" onclick="check4(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        @endif  
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg4">Debe indicar una opcion</div>
                </div>              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">¿Se sintió alguna vez culpable por tomar mucho?</label>
                      <div class="form-control">  
                        @if ($alcohol->culpable=='1')
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekculs" value="S" name="culs" onclick="check5(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chekculn" value="N" name="culn" onclick="check5(this);">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        @else
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekculs" value="S" name="culs" onclick="check5(this);">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chekculn" value="N" name="culn" onclick="check5(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        @endif  
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg5">Debe indicar una opcion</div>
                </div>              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">¿Toma algo a la mañana para sentirse mejor?</label>
                      <div class="form-control">  
                        @if ($alcohol->mañana=='1')
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekts" value="S" name="mas" onclick="check6(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chektn" value="N" name="man" onclick="check6(this);">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        @else
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekts" value="S" name="mas" onclick="check6(this);">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            <input class="form-check-input" type="checkbox" id="chektn" value="N" name="man" onclick="check6(this);" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                            </div>
                        @endif    
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg6">Debe indicar una opcion</div>
                </div>              
              </div>
              <div class="row">
                <div class="col-md-3 mb-2">
                  <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                </div>
                <div class="col-md-3 mb-2">
                  <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
                </div>
              </div>  
            </div>  
          </div>

        </div>
    </div>            
  </div>  
  {!! form::close() !!}
  @endif
@endif

@if($focus=='droga')
    @if(!$droga)
    {!! Form::open(['route' => 'droga.store']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Consumio drogas alguna vez ?</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="chekds" value="S" @if(old('inpds')) checked @endif onclick="checkd(this);" name="inpds">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="chekdn" value="N" @if(old('inpdn')) checked @endif onclick="checkd(this);" name="inpdn">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                    @error('inpds')
                    <strong style="color:red">*{{$message}}</strong>
                    @enderror                    
                </div>              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Se inyecto alguna vez ?</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="chekins" value="S" @if(old('inpins')) checked @endif onclick="checkd2(this);" name="inpins">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="chekinn" value="N" @if(old('inpinn')) checked @endif onclick="checkd2(this);" name="inpinn">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                </div>              
              </div>

              <div class="row">
                <div class="col-md-9">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Cuales (en caso afirmativo) ?</label>
                    <input type="text" class="form-control" name="input_cuales" value="{{old('input_cuales')}}">
                  </div>
                  @error('input_cuales')
                    <strong style="color:red">*{{$message}}</strong>
                  @enderror
                </div>  
              </div>
      
              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Desarrolla actividad fisica ?</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="chekfis" value="S" @if(old('inpfis')) checked @endif onclick="checkd3(this);" name="inpfis">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="chekfin" value="N" @if(old('inpfin')) checked @endif onclick="checkd3(this);" name="inpfin">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                      </div>   
                  </div>
                </div>
                <div class="row">
                  <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                </div>              
              </div>

              <div class="row">
                    <div class="col-md-9">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Veces por semana ?</label>
                        <input type="text" class="form-control" name="input_veces" value="{{old('input_veces')}}">
                      </div>
                    </div>  
              </div>
              <div class="row">
                @error('input_veces')
                <strong style="color:red">*{{$message}}</strong>
                @enderror
              </div>  
              
              <div class="row">
                <div class="col-md-9">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Diuresis ?</label>
                    <input type="text" class="form-control" name="input_diuresis" value="{{old('input_diuresis')}}">
                  </div>
                </div>  
              </div>
              <div class="row">
                @error('input_diuresis')
                  <strong style="color:red">*{{$message}}</strong>
                @enderror
              </div>  
              
              <div class="row">
                    <div class="col-md-9">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Catarsis ?</label>
                        <input type="text" class="form-control" name="input_catarsis" value="{{old('input_catarsis')}}">
                      </div>
                    </div>  
              </div>
              <div class="row">
                    @error('input_catarsis')
                      <strong style="color:red">*{{$message}}</strong>
                    @enderror
              </div>  
              <div class="row">
                    <div class="col-md-9">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Sueño ?</label>
                        <input type="text" class="form-control" name="input_sue" value="{{old('input_sue')}}">
                      </div>
                    </div>  
              </div>
              <div class="row">
                    @error('input_sue')
                      <strong style="color:red">*{{$message}}</strong>
                    @enderror
              </div>  
            </div>

            <div class="row">                            
                <div class="col-md-3 mb-2">
                  <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                </div>
                <div class="col-md-3 mb-2">
                  <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
                </div>
            </div>

          </div>  

      </div>  

    </div>
    {!! form::close() !!}
    
    @else

        {!! Form::open(['route' => ['droga.update', $padron->id],'method'=>'patch']) !!}
        <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
        <div class="tab-content">
          <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="card">
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Consumio drogas alguna vez ?</label>
                          <div class="form-control">  
                            @if($droga->droga==1)
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekds" value="S" @if(old('inpds')) checked @endif onclick="checkd(this);" name="inpds" checked>
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekdn" value="N" @if(old('inpdn')) checked @endif onclick="checkd(this);" name="inpdn">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            @else
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekds" value="S" @if(old('inpds')) checked @endif onclick="checkd(this);" name="inpds">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekdn" value="N" @if(old('inpdn')) checked @endif onclick="checkd(this);" name="inpdn" checked>
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            @endif    
                          </div>   
                      </div>
                    </div>
                    <div class="row">
                      <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                        @error('inpds')
                        <strong style="color:red">*{{$message}}</strong>
                        @enderror                    
                    </div>              
                  </div>

                  <div class="row">
                    <div class="col-md-6">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Se inyecto alguna vez ?</label>
                          <div class="form-control">  
                            @if($droga->inyecta==1)
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekins" value="S" onclick="checkd2(this);" name="inpins" checked>
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekinn" value="N" onclick="checkd2(this);" name="inpinn">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            @else
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekins" value="S" onclick="checkd2(this);" name="inpins">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekinn" value="N" onclick="checkd2(this);" name="inpinn" checked>
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            @endif  
                          </div>   
                      </div>
                    </div>
                    <div class="row">
                      <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                    </div>              
                  </div>

                  <div class="row">
                    <div class="col-md-9">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Cuales (en caso afirmativo) ?</label>
                        <input type="text" class="form-control" name="input_cuales" value="{{$droga->cuales}}">
                      </div>
                      @error('input_cuales')
                        <strong style="color:red">*{{$message}}</strong>
                      @enderror
                    </div>  
                  </div>
          
                  <div class="row">
                    <div class="col-md-6">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Desarrolla actividad fisica ?</label>
                          <div class="form-control">  
                            @if($droga->fisica==1)
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekfis" value="S" onclick="checkd3(this);" name="inpfis" checked>
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekfin" value="N" onclick="checkd3(this);" name="inpfin">
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            @else
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekfis" value="S" onclick="checkd3(this);" name="inpfis">
                                <label class="form-check-label" for="inlineCheckbox1">Si</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="chekfin" value="N" onclick="checkd3(this);" name="inpfin" checked>
                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                              </div>
                            @endif  
                          </div>   
                      </div>
                    </div>
                    <div class="row">
                      <div style="visibility: hidden; color:red" id="msg1">Debe indicar una opcion</div>
                    </div>              
                  </div>

                  <div class="row">
                        <div class="col-md-9">                  
                          <div class="input-group mb-2">
                            <label class="input-group-text" for="inputGroupSelect01">Veces por semana ?</label>
                            <input type="text" class="form-control" name="input_veces" value="{{$droga->veces}}">
                          </div>
                        </div>  
                  </div>
                  <div class="row">
                    @error('input_veces')
                    <strong style="color:red">*{{$message}}</strong>
                    @enderror
                  </div>  
                  
                  <div class="row">
                    <div class="col-md-9">                  
                      <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Diuresis ?</label>
                        <input type="text" class="form-control" name="input_diuresis" value="{{$droga->diuresis}}">
                      </div>
                    </div>  
                  </div>
                  <div class="row">
                    @error('input_diuresis')
                      <strong style="color:red">*{{$message}}</strong>
                    @enderror
                  </div>  
                  
                  <div class="row">
                        <div class="col-md-9">                  
                          <div class="input-group mb-2">
                            <label class="input-group-text" for="inputGroupSelect01">Catarsis ?</label>
                            <input type="text" class="form-control" name="input_catarsis" value="{{$droga->catarsis}}">
                          </div>
                        </div>  
                  </div>
                  <div class="row">
                        @error('input_catarsis')
                          <strong style="color:red">*{{$message}}</strong>
                        @enderror
                  </div>  
                  <div class="row">
                        <div class="col-md-9">                  
                          <div class="input-group mb-2">
                            <label class="input-group-text" for="inputGroupSelect01">Sueño ?</label>
                            <input type="text" class="form-control" name="input_sue" value="{{$droga->sueño}}">
                          </div>
                        </div>  
                  </div>
                  <div class="row">
                        @error('input_sue')
                          <strong style="color:red">*{{$message}}</strong>
                        @enderror
                  </div>  
                </div>

                <div class="row">                            
                    <div class="col-md-3 mb-2">
                      <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                    </div>
                    <div class="col-md-3 mb-2">
                      <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
                    </div>
                </div>

              </div>  

          </div>  

        </div>
        {!! form::close() !!}

    @endif
@endif

@if($focus=='personal')
    @if(!$personal)
    {!! Form::open(['route' => 'antecedente.store']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">HTA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hta">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ACV</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="acv">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DBT</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="dbt">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">IAM</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="iam">
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">TBC</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tbc">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">HIV</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hiv">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ASMA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="asma">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CHAGAS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="chagas">
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>
            
              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">EPOC</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="epoc">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">TUMORES</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tumores">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ALERGIA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="alergia">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">PSIQUIATRICO</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="psiqui">
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ENF.REUMATICA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="reuma">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">NEUROLOGICO</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="neuro">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ETS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="ets">
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">OTROS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="otros">
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">INTERNACIONES/OPERACIONES/ACCIDENTES</label>
                    <input type="text" class="form-control" name="inte1" value="{{old('inte1')}}">
                  </div>
                </div>

                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MANTIENE RELACIONES SEXUALES ?</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="chekss" value="S" onclick="checks(this);" name="chekss">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="cheksn" value="N" onclick="checks(this);" name="cheksn">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                      </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="inte2" value="{{old('inte2')}}">
                  </div>
                </div>

                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ALERGIA A MEDICAMENTOS ?</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekms" value="S" onclick="checkm(this);" name="chekms">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekmn" value="N" onclick="checkm(this);" name="chekmn">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>
                        </div>   
                    </div>
                </div>            
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="inte3" value="{{old('inte3')}}">
                  </div>
                </div>

                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CUALES ?</label>
                    <input type="text" class="form-control" name="cuales" value="{{old('cuales')}}">
                  </div>   
                </div>            
              </div>
            
        </div>      

          
        </div>      

            <div class="row">                            
              <div class="col-md-3 mb-2">
                <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
              </div>
              <div class="col-md-3 mb-2">
                <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
              </div>
          </div>

          </div>  
      </div>  

    </div>
    {!! form::close() !!}
    
    @else

    {!! Form::open(['route' => ['antecedente.update',$padron->id],'method'=>'patch']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">HTA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hta" @if($personal->hta) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ACV</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="acv" @if($personal->acv) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DBT</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="dbt" @if($personal->dbt) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">IAM</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="iam" @if($personal->am) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">TBC</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tbc" @if($personal->tbc) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">HIV</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hiv" @if($personal->hiv) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ASMA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="asma" @if($personal->asma) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CHAGAS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="chagas" @if($personal->chagas) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>
            
              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">EPOC</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="epoc" @if($personal->epoc) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">TUMORES</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tumores" @if($personal->tumores) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ALERGIA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="alergia" @if($personal->alergia) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">PSIQUIATRICO</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="psiqui" @if($personal->psiquiatrico) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ENFERMEDAD REUMATICA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="reuma" @if($personal->reuma) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">NEUROLOGICO</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="neuro" @if($personal->neurologico) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ETS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="ets" @if($personal->ets) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">OTROS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="otros" @if($personal->otros) checked @endif>
                        </div>
                    </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">INTERNACIONES/OPERACIONES/ACCIDENTES</label>
                    <input type="text" class="form-control" name="inte1" value="{{$personal->interna1}}">
                  </div>
                </div>

                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MANTIENE RELACIONES SEXUALES ?</label>
                      <div class="form-control">  
                          @if ($personal->relaciones)
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekss" value="S" onclick="checks(this);" name="chekss" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cheksn" value="N" onclick="checks(this);" name="cheksn">
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>                            
                        @else
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="chekss" value="S" onclick="checks(this);" name="chekss">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cheksn" value="N" onclick="checks(this);" name="cheksn" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                          </div>                                                    
                        @endif
                      </div>   
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="inte2" value="{{$personal->interna2}}">
                  </div>
                </div>

                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ALERGIA A MEDICAMENTOS ?</label>
                        <div class="form-control">  
                          @if ($personal->alergiamedica)
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="chekms" value="S" onclick="checkm(this);" name="chekms" checked>
                              <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="chekmn" value="N" onclick="checkm(this);" name="chekmn">
                              <label class="form-check-label" for="inlineCheckbox2">No</label>
                            </div>                              
                          @else
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="chekms" value="S" onclick="checkm(this);" name="chekms">
                              <label class="form-check-label" for="inlineCheckbox1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="chekmn" value="N" onclick="checkm(this);" name="chekmn" checked>
                              <label class="form-check-label" for="inlineCheckbox2">No</label>
                            </div>                                                          
                          @endif
                        </div>   
                    </div>
                </div>            
              </div>

              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" name="inte3" value="{{$personal->interna3}}">
                  </div>
                </div>

                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CUALES ?</label>
                    <input type="text" class="form-control" name="cuales" value="{{$personal->cuales}}">
                  </div>   
                </div>            
              </div>

              <div class="row">                            
                <div class="col-md-3 mb-2">
                  <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
                </div>
                <div class="col-md-3 mb-2">
                  <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
                </div>
              </div>  
          </div>

          </div>  
      </div>  

    </div>
    {!! form::close() !!}

    @endif
@endif

@if($focus=='antefamiliares')
    @if(!$antefamiliares)
    {!! Form::open(['route' => 'antefamiliares.store']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">HTA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="htam">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="htap">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="htah">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CARDIOPATIAS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="cardiom">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="cardiop">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cardioh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DBT</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="dbtm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="dbtp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="dbth">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ACV/AIT</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="acvm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="acvp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="acvh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CA DE COLON</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="cacm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="cacp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cach">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CA DE RECTO</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="carm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="carp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="carh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CA DE MAMA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="camm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="camp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="camh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">OTROS CA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="caom">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="caop">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="caoh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">AB. DE DROGAS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="abudm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="abudp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="abudh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>
              </div>
              <div class="row">  
                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">AB/DE ALCOHOL</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="abuhm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="abuhp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="abuhh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DEPRESION</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="deprem">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="deprep">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="depreh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DISCAPACIDAD</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="discam">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="discap">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="discah">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>
              </div>

              <div class="row">  
                <div class="col-md-4">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MUERTE SUBITA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="msubm">
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="msubp">
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="msubh">
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

              </div>

            </div>      

            <div class="row">                            
              <div class="col-md-3 mb-2">
                <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
              </div>
              <div class="col-md-3 mb-2">
                <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
              </div>
          </div>

          </div>  
      </div>  

    </div>
    {!! form::close() !!}
    
    @else

    {!! Form::open(['route' => ['antefamiliares.update',$padron->id],'method'=>'patch']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">HTA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="htam" @if($antefamiliares->htam) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="htap" @if($antefamiliares->htap) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="htah" @if($antefamiliares->htah) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CARDIOPATIAS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="cardiom" @if($antefamiliares->cardiom) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="cardiop" @if($antefamiliares->cardiop) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cardioh" @if($antefamiliares->cardioh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DBT</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="dbtm" @if($antefamiliares->dbtm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="dbtp" @if($antefamiliares->dbtp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="dbth" @if($antefamiliares->dbth) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ACV/AIT</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="acvm" @if($antefamiliares->acvm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="acvp" @if($antefamiliares->acvp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="acvh" @if($antefamiliares->acvh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CA DE COLON</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="cacm" @if($antefamiliares->cacm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="cacp" @if($antefamiliares->cacp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="cach" @if($antefamiliares->cach) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CA DE RECTO</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="carm" @if($antefamiliares->carm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="carp" @if($antefamiliares->carp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="carh" @if($antefamiliares->carh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">CA DE MAMA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="camm" @if($antefamiliares->camm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="camp" @if($antefamiliares->camp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="camh" @if($antefamiliares->camh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">OTROS CA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="caom" @if($antefamiliares->caom) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="caop" @if($antefamiliares->caop) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="caoh" @if($antefamiliares->caoh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ABUSO DE DROGAS</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="abudm" @if($antefamiliares->abudm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="abudp" @if($antefamiliares->abudp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="abudh" @if($antefamiliares->abudh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">ABUSO DE ALCOHOL</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="abuhm" @if($antefamiliares->abuhm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="abuhp" @if($antefamiliares->abuhp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="abuhh" @if($antefamiliares->abuhh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DEPRESION</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="deprem" @if($antefamiliares->deprem) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="deprep" @if($antefamiliares->deprep) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="depreh" @if($antefamiliares->depreh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">DISCAPACIDAD</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="discam" @if($antefamiliares->discam) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="discap" @if($antefamiliares->discap) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="discah" @if($antefamiliares->discah) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MUERTE SUBITA</label>
                      <div class="form-control">  
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="msubm" @if($antefamiliares->msubm) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox1">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="msubp" @if($antefamiliares->msubp) checked @endif>
                            <label class="form-check-label" for="inlineCheckbox2">P</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="msubh" @if($antefamiliares->msubh) checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">H</label>
                      </div>
                    </div>   
                  </div>
                </div>
  

              </div>

            </div>      

            <div class="row">                            
              <div class="col-md-3 mb-2">
                <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
              </div>
              <div class="col-md-3 mb-2">
                <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
              </div>
          </div>

          </div>  
      </div>  

    </div>
    {!! form::close() !!}

    @endif
@endif

@if($focus=='anteginecologicos')
    @if(!$anteginecologicos)
    {!! Form::open(['route' => 'anteginecologicos.store']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MENARCA</label>
                    <input type="text" class="form-control" name="menarca">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">IRS</label>
                    <input type="text" class="form-control" name="irs">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">RITMO MENSTRUAL</label>
                    <input type="text" class="form-control" name="ritmo">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">FUM</label>
                    <input type="text" class="form-control" name="fum">
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">PAP</label>
                    <input type="text" class="form-control" name="pap">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MX</label>
                    <input type="text" class="form-control" name="mx">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MAC</label>
                    <input type="text" class="form-control" name="mac">
                  </div>
                </div>
              
              </div>
            
              <div class="row">

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">G</label>
                    <input type="text" class="form-control" name="g">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">A</label>
                    <input type="text" class="form-control" name="a">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">P</label>
                    <input type="text" class="form-control" name="p">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">C</label>  
                    <input type="text" class="form-control" name="c">
                  </div>
                </div>
                    
          </div>  
          <div class="row">                            
            <div class="col-md-3 mb-2">
              <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
            </div>
            <div class="col-md-3 mb-2">
              <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
            </div>
          </div>  


        </div>  

    </div>
    {!! form::close() !!}
    
    @else

    {!! Form::open(['route' => ['anteginecologicos.update',$padron->id],'method'=>'patch']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">
              
              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MENARCA</label>
                    <input type="text" class="form-control" name="menarca" value="{{$anteginecologicos->menarca}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">IRS</label>
                    <input type="text" class="form-control" name="irs" value="{{$anteginecologicos->irs}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">RITMO MENSTRUAL</label>
                    <input type="text" class="form-control" name="ritmo" value="{{$anteginecologicos->ritmo}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">FUM</label>
                    <input type="text" class="form-control" name="fum" value="{{$anteginecologicos->fum}}">
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">PAP</label>
                    <input type="text" class="form-control" name="pap" value="{{$anteginecologicos->pap}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MX</label>
                    <input type="text" class="form-control" name="mx" value="{{$anteginecologicos->mx}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">MAC</label>
                    <input type="text" class="form-control" name="mac" value="{{$anteginecologicos->mac}}">
                  </div>
                </div>
              
              </div>
            
              <div class="row">

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">G</label>
                    <input type="text" class="form-control" name="g" value="{{$anteginecologicos->g}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">A</label>
                    <input type="text" class="form-control" name="a" value="{{$anteginecologicos->a}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">P</label>
                    <input type="text" class="form-control" name="p" value="{{$anteginecologicos->p}}">
                  </div>
                </div>

                <div class="col-md-3">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">C</label>  
                    <input type="text" class="form-control" name="c" value="{{$anteginecologicos->c}}">
                  </div>
                </div>

            </div>  
            <div class="row">                            
              <div class="col-md-3 mb-2">
                <button class="form-control btn btn-primary" type="submit">ENVIAR</button>
              </div>
              <div class="col-md-3 mb-2">
                <a href="{{route('hc.principal',$padron->id)}}" class="form-control btn btn-secondary" type="submit">PRINCIPAL</a>
              </div>
            </div>  

          </div>

          </div>  
      </div>  

    </div>
    {!! form::close() !!}

    @endif
@endif


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
function checkd(obj){

document.getElementById("chekds").checked = false;
document.getElementById("chekdn").checked = false;
obj.checked=true;
}
function checkd2(obj){

document.getElementById("chekins").checked = false;
document.getElementById("chekinn").checked = false;
obj.checked=true;
}
function checkd3(obj){

document.getElementById("chekfis").checked = false;
document.getElementById("chekfin").checked = false;
obj.checked=true;
}
function checks(obj){

document.getElementById("chekss").checked = false;
document.getElementById("cheksn").checked = false;
obj.checked=true;
}
function checksf(obj){

document.getElementById("cheksfs").checked = false;
document.getElementById("cheksfn").checked = false;
obj.checked=true;
}
function checkm(obj){

document.getElementById("chekms").checked = false;
document.getElementById("chekmn").checked = false;
obj.checked=true;
}

function validate(form){

  condi=false;
  if(!form.inpbs.checked && !form.inpbn.checked){
    document.getElementById('msg1').style.visibility='visible';
    return false;
  }else{
    document.getElementById('msg1').style.visibility='hidden';
    condi=true;
  }
  if(!form.cris.checked && !form.crin.checked){
    document.getElementById('msg2').style.visibility='visible';
    return false;
  }else{
    document.getElementById('msg2').style.visibility='hidden';
    condi=true;
  }
  if(!form.tomas.checked && !form.toman.checked){
    document.getElementById('msg3').style.visibility='visible';
    return false;
  }else{
    document.getElementById('msg3').style.visibility='hidden';
    condi=true;
  }
  if(!form.sins.checked && !form.sinn.checked){
    document.getElementById('msg4').style.visibility='visible';
    return false;
  }else{
    document.getElementById('msg4').style.visibility='hidden';
    condi=true;
  }
  if(!form.culs.checked && !form.culn.checked){
    document.getElementById('msg5').style.visibility='visible';
    return false;
  }else{
    document.getElementById('msg5').style.visibility='hidden';
    condi=true;
  }
  if(!form.mas.checked && !form.man.checked){
    document.getElementById('msg6').style.visibility='visible';
    return false;
  }else{
    document.getElementById('msg6').style.visibility='hidden';
    condi=true;
  }
  return condi;
}
</script>

@stop