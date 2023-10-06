@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
<div class="row">
    <div class="col-md-6">                
        <h5>HISTORIA CLINICA</h5>
        <h1>DROGAS / ACTIVIDAD FISICA - {{$padron->apellido . " " . $padron->nombres}} </h1>
    </div>
</div>
<div class="row">
  {{-- <a href="{{route('antecedentes.checktabaco',$padron->id)}}" class="@if($focus=='tabaquismo') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif">TABAQUISMO</a>
  <a href="{{route('antecedentes.checkalcohol',$padron->id)}}" class="@if($focus=='alcoholismo') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif ml-2">ALCOHOLISMO</a> 
  <a href="{{route('antecedentes.checkdroga',$padron->id)}}" class="@if($focus=='drogas') {{'btn btn-success'}} @else {{'btn btn-primary'}} @endif ml-2">DROGAS/ACTIV.FISICA</a> --}}
</div>
@stop

@section('content')

@if($focus=='drogas')
    @if(!$drogas)
    {!! Form::open(['route' => 'drogas.store']) !!}
    <input type="text hidden" class="form-control invisible" name="id" value="{{$padron->id}}"> 
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Consumio drogas alguna vez ?</label>
                    <select class="form-control" name="droga">
                      <option disabled selected>Elija...</option>
                      <option value="S" @if(old('droga')=='S'){{'selected'}} @endif>SI</option>
                      <option value="N" @if(old('droga')=='N'){{'selected'}} @endif>NO</option>
                    </select>
                  </div>
                </div>
                @error('droga')
                  <strong style="color:red">*{{$message}}</strong>
                @enderror
              
              </div>      
              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Se inyecto alguna vez ?</label>
                    <select class="form-control" name="inyecto">
                      <option disabled selected>Elija...</option>
                      <option value="S" @if(old('inyecto')=='S'){{'selected'}} @endif>SI</option>
                      <option value="N" @if(old('inyecto')=='N'){{'selected'}} @endif>NO</option>
                    </select>
                  </div>
                </div>
                @error('inyecto')
                  <strong style="color:red">*{{$message}}</strong>
                @enderror
              
              </div>      
              <div class="row">
                <div class="col-md-9">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Cuales (en caso afirmativo) ?</label>
                    <input type="date" class="form-control" name="input_cuales" value="{{old('input_cuales')}}">
                  </div>
                  @error('input_cuales')
                    <strong style="color:red">*{{$message}}</strong>
                  @enderror
                </div>  
              </div>
              <div class="row">
                <div class="col-md-6">                  
                  <div class="input-group mb-2">
                    <label class="input-group-text" for="inputGroupSelect01">Desarrolla Actividad Fisica ?</label>
                    <select class="form-control" name="fisica">
                      <option disabled selected>Elija...</option>
                      <option value="S" @if(old('fisica')=='S'){{'selected'}} @endif>SI</option>
                      <option value="N" @if(old('fisica')=='N'){{'selected'}} @endif>NO</option>
                    </select>
                  </div>
                </div>
                @error('fisica')
                  <strong style="color:red">*{{$message}}</strong>
                @enderror
              
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
                    <label class="input-group-text" for="inputGroupSelect01">Cual/es ?</label>
                    <input type="text" class="form-control" name="input_cuales" value="{{old('input_cuales')}}">
                  </div>
                </div>  
              </div>
              <div class="row">
                @error('input_cuales')
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
                    <input type="text" class="form-control" name="input_sueño" value="{{old('input_sueño')}}">
                  </div>
                </div>  
              </div>
              <div class="row">
                @error('input_sueño')
                  <strong style="color:red">*{{$message}}</strong>
                @enderror
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
                      <div class="col-md-6">                  
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
                      <div class="col-md-6">                  
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
                      <div class="col-md-6">                  
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
                      <div class="col-md-6">                  
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
                      <div class="col-md-6">                  
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
                      <div class="col-md-6">                  
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

        {{-- <div class="tab-pane" id="tabs-3" role="tabpanel">
          <p>third panel</p>
        </div> --}}
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