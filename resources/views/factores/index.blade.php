@extends('adminlte::page')

@section('title', 'SIA LALUSIDAL')

@section('content_header')
<div class="row">
    <div class="col-md-6">                
        <h5>HISTORIA CLINICA</h5>
        <h1>FACTORES DE RIESGO - {{$padron->apellido . " " . $padron->nombres}} </h1>
    </div>
</div>
@stop

@section('content')

    @if(!$factores)
 
    {!! Form::open(['route' => 'factores.store']) !!}
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
                      <label class="input-group-text" for="inputGroupSelect01">OB</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="ob">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">SBP</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="sbp">
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">TBQ</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tbq">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">EMB</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="emb">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">CNS</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="cns">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">DLP</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="dlp">
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">PPS</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="pps">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV-10%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv1">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV-10-20%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv2">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV-20-30%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv3">
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV->30%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv4">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV->40%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv5">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">ASMA-EPOC</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="asma">
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

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">ANOMALIA CONGENITA</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="anom">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">EAR</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="ear">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">PEDIATRICO</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="pediatrico">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">VIH</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="vih">
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">HIPERT</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hipert">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">HIPOT</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hipot">
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">PPS (PROBLEMA PSICOSOCIAL)</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="pps">
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

    {!! Form::open(['route' => ['factores.update',$padron->id],'method'=>'patch']) !!}
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
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hta" @if($factores->hta==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">DBT</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="dbt" @if($factores->dbt==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">OB</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="ob" @if($factores->ob==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">SBP</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="sbp" @if($factores->sbp==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">TBQ</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tbq" @if($factores->tbq==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">EMB</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="emb" @if($factores->emb==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">CNS</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="cns" @if($factores->cns==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">DLP</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="dlp" @if($factores->dlp==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">PPS (PROBLEMA PSICOSOCIAL)</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="pps" @if($factores->pps==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV-10%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv1" @if($factores->rcv1==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV-10-20%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv2" @if($factores->rcv2==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV-20-30%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv3" @if($factores->rcv3==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV->30%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv4" @if($factores->rcv4==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">RCV->40%</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="rcv5" @if($factores->rcv5==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">ASMA-EPOC</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="asma" @if($factores->asma==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">ALERGIA</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="alergia" @if($factores->alergia==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">ANOMALIA CONGENITA</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="anom" @if($factores->anom==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">EAR</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="ear" @if($factores->ear==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">PEDIATRICO</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="pediatrico" @if($factores->pediatrico==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">VIH</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="vih"  @if($factores->vih==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">HIPERT</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hipert" @if($factores->hipert==1) checked @endif>
                          </div>
                      </div>   
                    </div>
                </div>
                <div class="col-md-3">                  
                    <div class="input-group mb-2">
                      <label class="input-group-text" for="inputGroupSelect01">HIPOT</label>
                        <div class="form-control">  
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hipot" @if($factores->hipot==1) checked @endif>
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

@stop

@section('css')
@stop

@section('js')

@stop