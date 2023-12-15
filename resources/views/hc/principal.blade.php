@extends('adminlte::page')

@section('title', 'DASMI')

@section('content_header')
<div class="row">
    <div class="col-md-2">                
        <h1>HISTORIA CLINICA</h1><span class="badge badge-success">Dr.{{ Auth::user()->name }}</span>
    </div>
    <div class="col-md-10 text-right">
        <a href="{{ asset('images/manual.pdf') }}" target="_blank" class="badge badge-warning" id="modal-link">Manual para el cuidado de personas con enfermedades crónicas no transmisibles</a>
    </div>
</div>
@stop

@section('content')
<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Consensos Pediatricos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/actualizacion-del-consenso-sobre-constancia-de-salud-del-nino-y-del-adolescente-para-la-realizacion-de-actividades-fisicas-yo-deportivas.pdf')}}" target="_blank">Actualizacion del consenso sobre constancia de salud del nino y del adolescente para la realizacion de actividades fisicas y/o deportivas</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/de-cuidados-respiratorios-en-enfermedades-neuromusculares.pdf')}}" target="_blank">De cuidados respiratorios en enfermedades neuromusculares</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_actualizacion-en-reanimacion-cardiopulmonar-neonatal.pdf')}}" target="_blank">Actualizacion en reanimacion cardiopulmonar neonatal</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consenso-nacional-de-dermatitis.pdf')}}" target="_blank">Consejo nacional de dermatitis</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_adaptacion-en-espanol-de-la-guia-de-enuresis-monosintomatica.pdf')}}" target="_blank">Adaptacion en español de la guia de enuresis monosintomatica</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_alergia-alimentaria-en-pediatria-recomendaciones-para-su-diagnostico-y-tratamiento.pdf')}}" target="_blank">Alergia alimentaria en pediatria recomendaciones para su diagnostico y tratamiento</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_alteraciones-tiroideas-en-la-infancia-y-en-la-adolescencia-parte-1-hipertiroidismo.pdf')}}" target="_blank">Alteraciones tiroideas en la infancia y en la adolescencia parte-1 hipertiroidismo</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_alteraciones-tiroideas-en-la-infancia-y-en-la-adolescencia-parte-2-hipotiroidismo.pdf')}}" target="_blank">Alteraciones tiroideas en la infancia y en la adolescencia parte-2 hipotiroidismo</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_colecho-en-el-hogar-lactancia-materna-y-muerte-subita-del-lactante-recomendaciones-para-los-profesionales-de-la-salud.pdf')}}" target="_blank">Colecho en el hogar lactancia materna y muerte subita del lactante recomendaciones para los profesionales de la salud</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_comunicacion-a-traves-de-medios-electronicos-en-pediatria-recomendaciones-de-uso.pdf')}}" target="_blank">Comunicacion a traves de medios electronicos en pediatria recomendaciones de uso</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consenso-de-hiperbilirrubinemia-del-primer-trimestre-de-la-vida.pdf')}}" target="_blank">Consenso de hiperbilirrubinemia del primer trimestre de la vida</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consenso-de-prevencion-cardiovascular-en-la-infancia-y-la-adolescencia-version-completa.pdf')}}" target="_blank">Consenso de prevencion cardiovascular en la infancia y la adolescencia version completa</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consenso-de-prevencion-cardiovascular-en-la-infancia-y-la-adolescencia-version-resumida-recomendaciones.pdf')}}" target="_blank">Consenso de prevencion cardiovascular en la infancia y la adolescencia version resumida recomendaciones</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consenso-manejo-infecciones-agudas-bajas-menores-de-2.pdf')}}" target="_blank">Manejo de infecciones agudas bajas menores de 2</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consenso-ninos-y-mascotas.pdf')}}" target="_blank">Niños y mascotas</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consenso-para-el-uso-adecuado-de-antibioticos-en-el-nino-menor-de-36-meses-con-fiebre-sin-foco-de-infeccion-evidente.pdf')}}" target="_blank">Consenso para el uso adecuado de antibioticos en el nino menor de 36 meses con fiebre sin foco de infeccion evidente</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consenso-sobre-la-constancia-de-salud-del-nino-y-del-adolescente-para-la-realizacion-de-actividades-fisicas-yo-deportivas-actualizacion.pdf')}}" target="_blank">Sobre la constancia de salud del nino y del adolescente para la realizacion de actividades fisicas y/o deportivas actualizacion</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_consideraciones-para-una-corticoterapia-segura.pdf')}}" target="_blank">Consideraciones para una corticoterapia segura</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_deficiencia-de-hierro-y-anemia-ferropenica-guia-para-su-prevencion-diagnostico-y-tratamiento.pdf')}}" target="_blank">Deficiencia de hierro y anemia ferropenica guia para su prevencion diagnostico y tratamiento</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_dietas-vegetarianas-en-la-infancia.pdf')}}" target="_blank">Dietas vegetarianas en la infancia</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_enfermedades-del-intersticio-pulmonar-en-ninos-menores-de-2-anos-clasificacion-diagnostico-y-tratamiento.pdf')}}" target="_blank">Enfermedades del intersticio pulmonar en ninos menores de 2 anos clasificacion diagnostico y tratamiento</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_entrenamiento-de-la-fuerza-en-ninos-y-adolescentes-beneficios-riesgos-y-recomendaciones.pdf')}}" target="_blank">Entrenamiento de la fuerza en ninos y adolescentes beneficios riesgos y recomendaciones</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_estrenimiento-funcional-en-pediatria-diagnostico-y-tratamiento.pdf')}}" target="_blank">Estrenimiento funcional en pediatria diagnostico y tratamiento</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_guia-de-diagnostico-y-tratamiento-asma-bronquial-en-ninos-menores-de-6-anos-actualizacion.pdf')}}" target="_blank">Guia de diagnostico y tratamiento asma bronquial en ninos menores de 6 anos actualizacion</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_guia-de-diagnostico-y-tratamiento-de-pacientes-con-fibrosis-quistica-actualizacion.pdf')}}" target="_blank">Guia de diagnostico y tratamiento de pacientes con fibrosis quistica actualizacion</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_guia-de-practica-clinica-alergia-a-picadura-de-himenopteros-en-pediatria-actualizacion.pdf')}}" target="_blank">Guia de practica clinica alergia a picadura de himenopteros en pediatria actualizacion</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_guia-para-el-seguimiento-del-desarrollo-infantil-en-la-practica-pediatrica.pdf')}}" target="_blank">Guia para el seguimiento del desarrollo infantil en la practica pediatrica</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_guia-para-el-seguimiento-de-pacientes-pediatricos-con-enfermedad-hepatica-cronica.pdf')}}" target="_blank">Guia para el seguimiento de pacientes pediatricos con enfermedad hepatica cronica</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_guia-para-la-elaboracion-de-consensos-guias-de-practica-clinica-o-actualizaciones-en-la-sociedad-argentina-de-pediatria.pdf')}}" target="_blank">Guia para la elaboracion de consensos guias de practica clinica o actualizaciones en la sociedad argentina de pediatria</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_guias-para-el-diagnostico-y-seguimiento-de-ninos-y-adolescentes-portadores-de-hipertension-portal.pdf')}}" target="_blank">Guias para-el diagnostico y seguimiento de ninos y adolescentes portadores de hipertension portal</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_hipertension-arterial-en-el-recien-nacido.pdf')}}" target="_blank">Hipertension arterial en el recien nacido</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_hipoglucemia-neonatal-revision-de-las-practicas-habituales.pdf')}}" target="_blank">Hipoglucemia neonatal revision de las practicas habituales</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_infecciones-de-piel-y-partes-blandas-en-pediatria-consenso-sobre-diagnostico-y-tratamiento-parte-2-celulitis-ectima-y-ectima-gangrenoso-celulitis-necrotizantes-consideraciones-finales.pdf')}}" target="_blank">Infecciones de piel y partes blandas en pediatria consenso sobre diagnostico y tratamiento parte-2 celulitis ectima y ectima gangrenoso celulitis necrotizantes consideraciones finales</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_manejo-del-dolor-en-neonatologia.pdf')}}" target="_blank">Manejo del dolor en neonatologia</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_propuesta-de-actualizacion-de-la-evaluacion-antropometrica-del-recien-nacido-comite-nacional-de-crecimiento-y-desarrollo-y-comite-de-estudios-fetoneonatales-cefen.pdf')}}" target="_blank">Propuesta de actualizacion de la evaluacion antropometrica del recien nacido comite nacional de crecimiento y desarrollo y comite de estudios fetoneonatales</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_reacciones-alergicas-a-betalactamicos-en-pediatria-recomendaciones-para-su-diagnostico-y-tratamiento.pdf')}}" target="_blank">Reacciones alergicas a betalactamicos en pediatria recomendaciones para su diagnostico y tratamiento</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_recomendaciones-para-el-diagnostico-y-tratamiento-de-la-urticaria-en-pediatria.pdf')}}" target="_blank">Recomendaciones para el diagnostico y tratamiento de la urticaria en pediatria</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_recomendaciones-para-la-evaluacion-del-tamano-al-nacer-y-del-crecimiento-posnatal-de-los-recien-nacidos-prematuros.pdf')}}" target="_blank">Recomendaciones para la evaluacion del tamano al nacer y del crecimiento posnatal de los recien nacidos prematuros</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_recomendaciones-para-la-vacunacion-segura-en-ninos-con-riesgo-de-padecer-reacciones-alergicas-a-componentes-vacunales.pdf')}}" target="_blank">Recomendaciones para la vacunacion segura en ninos con riesgo de padecer reacciones alergicas a componentes vacunales</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_recomendacion-para-disminuir-el-riesgo-de-colapso-subito-e-inesperado-posnatal.pdf')}}" target="_blank">Recomendacion para disminuir el riesgo de colapso subito e inesperado posnatal</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_recomendacion-para-el-proceso-del-alta-hospitalaria-en-pacientes-recien-nacidos-de-alto-riesgo.pdf')}}" target="_blank">Recomendacion para el proceso del alta hospitalaria en pacientes recien nacidos de alto riesgo</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_recomendacion-para-el-tratamiento-con-hipotermia-en-recien-nacidos-con-encefalopatia-hipoxico-isquemica.pdf')}}" target="_blank">Recomendacion para el tratamiento con hipotermia en recien nacidos con encefalopatia hipoxico isquemica</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_restriccion-del-crecimiento-intrauterino-perspectiva-endocrinologica.pdf')}}" target="_blank">Restriccion del crecimiento intrauterino perspectiva endocrinologica</a>                            
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consensos_tratamiento-con-analogos-de-la-hormona-liberadora-de-gonadotrofinas-agnrh-en-ninas-ninos-y-adolescentes.pdf')}}" target="_blank">Tratamiento con analogos de la hormona liberadora de gonadotrofinas agnrh en ninas ninos y adolescentes</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/consenso-sobre-enfermedades-infecciosas-regionales-en-la-argentina.pdf')}}" target="_blank">Enfermedades infecciosas regionales en la argentina</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/consenso-sobre-mobiliario-infantil-seguro-nbsp.pdf')}}" target="_blank">Sobre mobiliario infantil seguro</a>                            
                            </td>
                            <td>
                                    <a href="{{ asset('images/consensos/criterios-de-diagn-oacutestico-y-tratamiento-de-la-tuberculosis-infantil-nbsp.pdf')}}" target="_blank">Criterios de diagn oacutestico y tratamiento de la tuberculosis infantil</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/versi-oacuten-completa.pdf')}}" target="_blank">Recomendaciones para el manejo de infecciones respiratorias agudas bajas en menores de 2 años</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/e-actualizaci-oacuten.pdf')}}" target="_blank">Consenso de escoliosis idiopática del adolescente</a>                            
                            </td>
                            <td>
                                    <a href="{{ asset('images/consensos/enfermedad-de-kawasaki-consenso-interdisciplinario-e-intersociedades-gu-iacutea-pr-aacutectica-cl-iacutenica.pdf')}}" target="_blank">Enfermedad de kawasaki</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/gu-iacutea-de-diagn-oacutestico-y-tratamiento-asma-bronquial-en-ni-ntildeos-ge-6-a-ntildeos-actualizaci-oacuten-2016.pdf')}}" target="_blank">Guia de diagnostico y tratamiento asma bronquial en niños de 6</a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a href="{{ asset('images/consensos/nuevas-recomendaciones-frente-a-las-actuales-controversias-en-infecci-oacuten-urinaria-nbsp.pdf')}}" target="_blank">Nuevas recomendaciones frente a las actuales controversias en nfeccion urinaria</a>                            
                            </td>
                            <td>
                                    <a href="{{ asset('images/consensos/obesidad-gu-iacuteas-para-su-abordaje-cl-iacutenico-2015.pdf')}}" target="_blank">Obesidad guias para su abordaje clinico</a>
                            </td>
                            <td>
                                <a href="{{ asset('images/consensos/recomendaciones-sobre-el-uso-de-palivizumab-nbspactualizaci-oacuten-2015.pdf')}}" target="_blank">Recomendaciones sobre el uso de palivizumab</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">INFORMACION DEL PACIENTE</h5>
                <div class="card-body">
                    <div class="row mt-n2">
                        <p>DOCUMENTO: </p>
                        <p>{{$padron->documento}}</p>
                    </div>        
                    <div class="row mt-n3">
                        <p>NOMBRE: </p>
                        <p>{{$padron->apellido . " ". $padron->nombres}}</p>
                    </div>        
                    <div class="row mt-n3">
                        <p>AFILIADO: </p>
                        <p>{{$padron->afiliado}}</p>
                    </div>        
                    <div class="row mt-n3">
                        <p id="edad">EDAD: </p>
                        <div class="invisible">
                            <input id="fechanac" value="{{$padron->fechanac}}"> 
                        </div>    
                    </div>        
                    <div class="row mt-n3">
                        <p>OBRA SOCIAL: </p>
                        <p>{{$padron->convenio->convenio_nombre}}</p>
                    </div>        
                </div>
            </div>        
        </div>    
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">ANTECEDENTES
                    <a href="{{route('antecedentes.index', $padron->id)}}" class="btn btn-sm btn-success float-right">ENTRAR</a>
                </h5>
                    <div class="card-body">
                        @if (isset($tabaco))
                            @if ($tabaco->fuma=='S')
                                <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checktabaco',$padron->id)}}">TABAQUISMO</a>
                            @endif
                        @endif
                        @if (isset($alcohol))
                            @if ($alcohol->bebe==1)
                                <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkalcohol',$padron->id)}}">ALCOHOL</a>
                            @endif
                        @endif
                        @if (isset($droga))
                            @if ($droga->droga==1)
                                <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkdroga',$padron->id)}}">DROGAS</a>
                            @endif
                        @endif
                        @if (isset($personal))
                            <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkpersonal',$padron->id)}}">ANTECEDENTES PERSONALES</a>
                        @endif
                        @if (isset($familiares))
                            <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkfamiliares',$padron->id)}}">ANTECEDENTES FAMILIARES</a>
                        @endif
                        @if (isset($gineco))
                            <a class="btn btn-danger btn-sm mt-1" href="{{route('antecedentes.checkgineco',$padron->id)}}">ANTECEDENTES GINECOLOGICOS</a>
                        @endif
                    </div>
            </div>        
        </div>    
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">FACTORES DE RIESGO
                    <a href="{{route('factores.index', $padron->id)}}" class="btn btn-sm btn-success float-right">ENTRAR</a>
                </h5>
                <div class="card-body">
                    <h3>
                        @if (isset($factores))
                            
                            @if ($factores->hta==1)
                                <div class="btn btn-outline-danger">HTA</div>
                            @endif
                            @if ($factores->dbt==1)
                                <div class="btn btn-outline-danger">DBT</div>
                            @endif
                            @if ($factores->ob==1)
                                <div class="btn btn-outline-danger">OB</div>
                            @endif
                            @if ($factores->sbp==1)
                                <div class="btn btn-outline-danger">SBP</div>
                            @endif
                            @if ($factores->tbq==1)
                                <div class="btn btn-outline-danger">TBQ</div>
                            @endif
                            @if ($factores->emb==1)
                                <div class="btn btn-outline-danger">EMB</div>
                            @endif
                            @if ($factores->cns==1)
                                <div class="btn btn-outline-danger">CNS</div>
                            @endif
                            @if ($factores->dlp==1)
                                <div class="btn btn-outline-danger">DLP</div>
                            @endif
                            @if ($factores->pps==1)
                                <div class="btn btn-outline-danger">PPS</div>
                            @endif
                            @if ($factores->rcv1==1)
                                <div class="btn btn-outline-danger">RCV-10%</div>
                            @endif
                            @if ($factores->rcv2==1)
                                <div class="btn btn-outline-danger">RCV-10-20%</div>
                            @endif
                            @if ($factores->rcv3==1)
                                <div class="btn btn-outline-danger">RCV-20-30%</div>
                            @endif
                            @if ($factores->rcv4==1)
                                <div class="btn btn-outline-danger">RCV->30%</div>
                            @endif
                            @if ($factores->rcv5==1)
                                <div class="btn btn-outline-danger">RCV->40%</div>
                            @endif
                            @if ($factores->asma==1)
                                <div class="btn btn-outline-danger">ASMA</div>
                            @endif
                            @if ($factores->alergia==1)
                                <div class="btn btn-outline-danger">ALERGIA</div>
                            @endif
                            @if ($factores->anom==1)
                                <div class="btn btn-outline-danger">ANOMALIA CONGENITA</div>
                            @endif
                            @if ($factores->ear==1)
                                <div class="btn btn-outline-danger">EAR</div>
                            @endif
                            @if ($factores->pediatrico==1)
                                <div class="btn btn-outline-danger">PEDIATRICO</div>
                            @endif
                            @if ($factores->vih==1)
                                <div class="btn btn-outline-danger">VIH</div>
                            @endif
                            @if ($factores->hipert==1)
                                <div class="btn btn-outline-danger">HIPERT</div>
                            @endif
                            @if ($factores->hipot==1)
                                <div class="btn btn-outline-danger">HIPOT</div>
                            @endif
                        @endif
                    </h3>
                </div>
            </div>        
        </div>    

    </div>
    <div class="row">
        <div class="col-md-8">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">HISTORIA PERSONAL
                    <a href="{{route('hc.create', $padron->id)}}" class="btn btn-sm btn-danger float-right">NUEVA HC</a>
                    <a href="{{route('evolucion.showevos',$padron->id)}}" class="btn btn-sm btn-success float-right mx-1">VER EVOLUCIONES</a>
                </h5>
                <div class="card-body">
                    @foreach ($evoluciones as $evo)
                        @if (isset($evo->problema->first()->problema_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($evo->problema->first()->inicio)) .'-'.$evo->problema->first()->nomproblema->descripcion}} <br></a>    
                        @else
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($evo->fecha)).'-'.$evo->subjetivo}} <br></a> 
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
        <div class="col-md-4">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">PLANES PREVIOS</h5>
                <div class="card-body">
                    @foreach ($procesoshc as $pro)
                        @if (isset($pro->proceso_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($pro->evolucion->fecha)).'-'.$pro->nomproceso->proceso}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    

    </div>
    <div class="row">
        <div class="col-md-12">                
            <div class="card">
                <h5 class="card-title bg-red text-white p-2">PENDIENTE</h5>
                <div class="card-body">
                    @foreach ($pendiente as $pen)
                        @if (isset($pen->pendiente))
                            <a href="{{route('hc.show',$evo->id)}}">{{$pen->pendiente}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
    </div>    
    <div class="row">
        <div class="col-md-6">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">MEDICAMENTOS</h5>
                <div class="card-body">
                    @foreach ($drogashc as $dro)
                        @if (isset($dro->medicamento_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($dro->evolucion->fecha)).'-'.$dro->nommedicamento->monodroga}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
        <div class="col-md-6">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">ESTUDIOS</h5>
                <div class="card-body">
                    @foreach ($practicashc as $pra)
                        @if (isset($pra->estudio_id))
                            <a href="{{route('hc.show',$evo->id)}}">{{date('d-m-Y',strtotime($pra->evolucion->fecha)).'-'.$pra->nomestudio->descripcion}} <br></a>    
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
    </div>    
    <div class="row">
        <div class="col-md-6">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">ESQUEMA DE VACUNACION
                    <a href="{{route('vacunas.create', $padron->id)}}" class="btn btn-sm btn-danger float-right">ANOTAR</a>
                    <a href="{{ asset('images/calendario.pdf') }}" class="badge badge-success" target="_blank">Abrir Esquema</a>
                </h5>
                <div class="card-body">
                    @foreach ($vacunas as $vacu)
                        @if ($vacu->vacuna_value=='S')
                            <span class="badge badge-success">Edad:{{$vacu->nombreVacuna->edad}}-{{$vacu->nombreVacuna->vacuna}}</span>
                        @endif
                    @endforeach
                </div>
            </div>        
        </div>    
        <div class="col-md-6">                
            <div class="card">
                <h5 class="card-title bg-blue text-white p-2">CRECIMIENTO
                    <a href="{{route('crecimiento.index',$padron->id)}}" class="btn btn-sm btn-danger float-right">CALCULAR</a>
                </h5>
                <div class="card-body">
                </div>
            </div>        
        </div>    

    </div>    

    @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function(){
        $fecha=document.getElementById('fechanac').value;
        $valor=document.getElementById('edad').innerHTML;
        $edad=calcularEdad();
        document.getElementById('edad').innerHTML=$valor+($edad).toString();
    });
    function calcularEdad() {
        fecha = document.querySelector("#fechanac").value;
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            // $('#edad').val(edad);        
            return edad;
    }
    $(document).ready(function(){
        $('#modal-link').click(function(e){
            e.preventDefault();
            // Aquí deberías agregar el código para abrir tu modal con el índice
            // Puedes utilizar Bootstrap modal u otra biblioteca de modales
            // Aquí hay un ejemplo básico utilizando Bootstrap modal:
            $('#exampleModal').modal('show');
        });
    });

</script>    
@stop