@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar INPER-HP</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('pulmonary-hypertension.update', $ph->id) }}" method="POST" id="formulario" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <!-- Información Responsable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Responsable y centro.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="responsable" class="form-label mb-0">Responsable <small class="requiredata">*</small></label>
                        <input type="text" name="responsable" class="form-control" id="responsable" value="@if(Auth::user()->trato != ''){{ Auth::user()->trato.' ' }}@endif{{ Auth::user()->name }} {{ Auth::user()->lastname }}" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="centro_atencion" class="form-label mb-0">Centro de atención <small class="requiredata">*</small></label>
                        <input type="text" name="centro_atencion" class="form-control" id="centro_atencion" required value="{{ $ph->centro_atencion }}">   
                    </div>
                </div>
            </div>
        </div>

        <!-- Datos Epidemiológicos -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Datos Epidemiológicos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="de_nombre" class="form-label mb-0">Nombre <small class="requiredata">*</small></label>
                        <input type="text" name="de_nombre" class="form-control" id="de_nombre" required value="{{ $ph->de_nombre }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_edad" class="form-label mb-0">Edad <small class="text-danger">(años)</small> <small class="requiredata">*</small></label>
                        <input type="number" name="de_edad" class="form-control" id="de_edad"  required value="{{ $ph->de_edad }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_procedencia" class="form-label mb-0">Procedencia <small class="text-danger">(Ciudad)</small> <small class="requiredata">*</small></label>
                        <input type="text" name="de_procedencia" class="form-control" id="de_procedencia" value="{{ $ph->de_procedencia }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_residencia" class="form-label mb-0">Residencia <small class="text-danger">(Ciudad)</small> <small class="requiredata">*</small></label>
                        <input type="text" name="de_residencia" class="form-control" id="de_residencia" value="{{ $ph->de_residencia }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_altura_ciudad" class="form-label mb-0">Altura de ciudad <small class="text-danger">(metros)</small> <small class="requiredata">*</small></label>
                        <input type="number" name="de_altura_ciudad" class="form-control" id="de_altura_ciudad" value="{{ $ph->de_altura_ciudad }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="de_estratificacion_altura" class="form-label mb-0">Estratificación de altura <small class="text-danger">(metros)</small><small class="requiredata">*</small></label>
                        <select name="de_estratificacion_altura" id="de_estratificacion_altura" class="form-control" required>
                            <option value="" @if($ph->de_estratificacion_altura == '') selected @endif>Seleccionar...</option>
                            <option value="< 2500 msnm" @if($ph->de_estratificacion_altura == '< 2500 msnm') selected @endif> < 2500 msnm </option>
                            <option value="2500-3999 msnm" @if($ph->de_estratificacion_altura == '2500-3999 msnm') selected @endif>2500-3999 msnm</option>
                            <option value=">= 4000 msnm" @if($ph->de_estratificacion_altura == '>= 4000 msnm') selected @endif> >= 4000 msnm</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_tiempo_residencia" class="form-label mb-0">Tiempo de residencia <small class="text-danger">(años)</small><small class="requiredata">*</small></label>
                        <input type="number" name="de_tiempo_residencia" class="form-control" id="de_tiempo_residencia" value="{{ $ph->de_tiempo_residencia }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_modalidad_ingreso" class="form-label mb-0">Modalidad de ingreso<small class="requiredata">*</small></label>
                        <select name="de_modalidad_ingreso" id="de_modalidad_ingreso" class="form-control" required>
                            <option value="" @if($ph->de_modalidad_ingreso == '') selected @endif>Seleccionar...</option>
                            <option value="Emergencia" @if($ph->de_modalidad_ingreso == 'Emergencia') selected @endif>Emergencia</option>
                            <option value="Ambulatorio" @if($ph->de_modalidad_ingreso == 'Ambulatorio') selected @endif>Ambulatorio</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="de_intervencion" class="form-label mb-0">Intervención realizada a >= 2500 msnm <small class="text-danger">(si es que se realizó)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_intervencion" id="de_intervencion1" value="Sí" @if($ph->de_intervencion == 'Sí') checked @endif>
                                <label class="form-check-label" for="de_intervencion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_intervencion" id="de_intervencion2" value="No" @if($ph->de_intervencion == 'No') checked @endif>
                                <label class="form-check-label" for="de_intervencion2">No</label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-6 mb-2">
                        <label for="de_gestante" class="form-label mb-0">Gestante</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_gestante" id="de_gestante1" value="Sí" @if($ph->de_gestante == 'Sí') checked @endif>
                                <label class="form-check-label" for="de_gestante1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_gestante" id="de_gestante2" value="No" @if($ph->de_gestante == 'No') checked @endif>
                                <label class="form-check-label" for="de_gestante2">No</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label for="de_estado_civil" class="form-label mb-0">Estado civil </label>
                        <select name="de_estado_civil" id="de_estado_civil" class="form-control" >
                            <option value="" @if($ph->de_estado_civil == '') selected @endif>Seleccionar...</option>
                            <option value="Soltero" @if($ph->de_estado_civil == 'Soltero') selected @endif>Soltero</option>
                            <option value="Casado" @if($ph->de_estado_civil == 'Casado') selected @endif>Casado</option>
                            <option value="Divorciado" @if($ph->de_estado_civil == 'Divorciado') selected @endif>Divorciado</option>
                            <option value="Viudo" @if($ph->de_estado_civil == 'Viudo') selected @endif>Viudo</option>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label for="de_grado_instruccion" class="form-label mb-0">Grado de instrucción </label>
                        <select name="de_grado_instruccion" id="de_grado_instruccion" class="form-control" >
                            <option value="" @if($ph->de_grado_instruccion == '') selected @endif>Seleccionar...</option>
                            <option value="Sin instrucción" @if($ph->de_grado_instruccion == 'Sin instrucción') selected @endif>Sin instrucción</option>
                            <option value="Primaria incompleta" @if($ph->de_grado_instruccion == 'Primaria incompleta') selected @endif>Primaria incompleta</option>
                            <option value="Primaria completa" @if($ph->de_grado_instruccion == 'Primaria completa') selected @endif>Primaria completa</option>
                            <option value="Secundaria incompleta" @if($ph->de_grado_instruccion == 'Secundaria incompleta') selected @endif>Secundaria incompleta</option>
                            <option value="Secundaria completa" @if($ph->de_grado_instruccion == 'Secundaria completa') selected @endif>Secundaria completa</option>
                            <option value="Superior técnico incompleta" @if($ph->de_grado_instruccion == 'Superior técnico incompleta') selected @endif>Superior técnico incompleta</option>
                            <option value="Superior técnico completa" @if($ph->de_grado_instruccion == 'Superior técnico completa') selected @endif>Superior técnico completa</option>
                            <option value="Superior universitario incompleta" @if($ph->de_grado_instruccion == 'Superior universitario incompleta') selected @endif>Superior universitario incompleta</option>
                            <option value="Superior universitario completa" @if($ph->de_grado_instruccion == 'Superior universitario completa') selected @endif>Superior universitario completa</option>
                            <option value="Postgrado incompleta" @if($ph->de_grado_instruccion == 'Postgrado incompleta') selected @endif>Postgrado incompleta</option>
                            <option value="Postgrado completa" @if($ph->de_grado_instruccion == 'Postgrado completa') selected @endif>Postgrado completa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Antecedentes -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Antecedentes</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="at_tipo_paciente_hp" class="form-label mb-0">Tipo de paciente con hipertensión pulmonar</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_tipo_paciente_hp" id="at_tipo_paciente_hp1" value="Prevalente" @if($ph->at_tipo_paciente_hp == 'Prevalente') checked @endif>
                                <label class="form-check-label" for="at_tipo_paciente_hp1">Prevalente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_tipo_paciente_hp" id="at_tipo_paciente_hp2" value="Incidente" @if($ph->at_tipo_paciente_hp == 'Incidente') checked @endif>
                                <label class="form-check-label" for="at_tipo_paciente_hp2">Incidente</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_tiempo_sint_diagnostico" class="form-label mb-0">Tiempo de síntomas al diagnóstico <small class="text-danger">(años)</small></label>
                        <input type="number" name="at_tiempo_sint_diagnostico" class="form-control" id="at_tiempo_sint_diagnostico" value="{{ $ph->at_tiempo_sint_diagnostico }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_hipertension_ap" class="form-label mb-0">Hipertensión arterial pulmonar</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_hipertension_ap" id="at_hipertension_ap1" value="Sí" @if($ph->at_hipertension_ap == 'Sí') checked @endif>
                                <label class="form-check-label" for="at_hipertension_ap1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_hipertension_ap" id="at_hipertension_ap2" value="No" @if($ph->at_hipertension_ap == 'No') checked @endif>
                                <label class="form-check-label" for="at_hipertension_ap2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_etiologia_hp" class="form-label mb-0">Etiología de hipertensión pulmonar</label>
                        <select name="at_etiologia_hp" id="at_etiologia_hp" class="form-control" >
                            <option value="" @if($ph->at_etiologia_hp == '') selected @endif>Seleccionar...</option>
                            <option value="Idiopática" @if($ph->at_etiologia_hp == 'Idiopática') selected @endif>Idiopática</option>
                            <option value="Farmacológica" @if($ph->at_etiologia_hp == 'Farmacológica') selected @endif>Farmacológica</option>
                            <option value="Hereditaria" @if($ph->at_etiologia_hp == 'Hereditaria') selected @endif>Hereditaria</option>
                            <option value="Enfermedad de tejido conectivo" @if($ph->at_etiologia_hp == 'Enfermedad de tejido conectivo') selected @endif>Enfermedad de tejido conectivo</option>
                            <option value="Congénita" @if($ph->at_etiologia_hp == 'Congénita') selected @endif>Congénita (incluye síndrome de Eisenmeger , shunt de izquierda a derecha, post cierre del defecto y shunt pequeño/coincidente)</option>
                            <option value="Relacionado a artritis" @if($ph->at_etiologia_hp == 'Relacionado a artritis') selected @endif>Relacionado a artritis</option>
                            <option value="Relacionado a esclerodrmia" @if($ph->at_etiologia_hp == 'Relacionado a esclerodrmia') selected @endif>Relacionado a esclerodrmia</option>
                            <option value="Relacionado a VIH" @if($ph->at_etiologia_hp == 'Relacionado a VIH') selected @endif>Relacionado a VIH</option>
                            <option value="Portopulmonar" @if($ph->at_etiologia_hp == 'Portopulmonar') selected @endif>Portopulmonar</option>
                            <option value="Postquirúrgico" @if($ph->at_etiologia_hp == 'Postquirúrgico') selected @endif>Postquirúrgico</option>
                            <option value="Grupo 3 (EPOC)" @if($ph->at_etiologia_hp == 'Grupo 3 (EPOC)') selected @endif>Grupo 3 (EPOC)</option>
                            <option value="Grupo 3 (EPID)" @if($ph->at_etiologia_hp == 'Grupo 3 (EPID)') selected @endif>Grupo 3 (EPID)</option>
                            <option value="Grupo 4" @if($ph->at_etiologia_hp == 'Grupo 4') selected @endif>Grupo 4</option>
                            <option value="Grupo 5" @if($ph->at_etiologia_hp == 'Grupo 5') selected @endif>Grupo 5 (incluye anemia hemolítica, síndrome mieloproliferativo y enfermedad renal crónica)</option>
                            <option value="Otros" @if($ph->at_etiologia_hp == 'Otros') selected @endif>Otros</option>
                        </select>
                        <input type="text" name="at_etiologia_hp_otra" class="form-control mt-1" id="at_etiologia_hp_otra" placeholder="Especificar otra etiología" value="{{ $ph->at_etiologia_hp_otra }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_diagnostico_gestacion" class="form-label mb-0">Diagnóstico durante la gestación</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_diagnostico_gestacion" id="at_diagnostico_gestacion1" value="Sí" @if($ph->at_diagnostico_gestacion == 'Sí') checked @endif>
                                <label class="form-check-label" for="at_diagnostico_gestacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_diagnostico_gestacion" id="at_diagnostico_gestacion2" value="No" @if($ph->at_diagnostico_gestacion == 'No') checked @endif>
                                <label class="form-check-label" for="at_diagnostico_gestacion2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_disnea" class="form-label mb-0">Disnea</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_disnea" id="at_disnea1" value="No" @if($ph->at_disnea == 'No') checked @endif>
                                <label class="form-check-label" for="at_disnea1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_disnea" id="at_disnea2" value="CF1" @if($ph->at_disnea == 'CF1') checked @endif>
                                <label class="form-check-label" for="at_disnea2">CF1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_disnea" id="at_disnea3" value="CF2"  @if($ph->at_disnea == 'CF2') checked @endif>
                                <label class="form-check-label" for="at_disnea3">CF2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_disnea" id="at_disnea4" value="CF3" @if($ph->at_disnea == 'CF3') checked @endif>
                                <label class="form-check-label" for="at_disnea4">CF3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_disnea" id="at_disnea5" value="CF4" @if($ph->at_disnea == 'CF4') checked @endif>
                                <label class="form-check-label" for="at_disnea5">CF4</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_sincope" class="form-label mb-0">Síncope</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_sincope" id="at_sincope1" value="Sí" @if($ph->at_sincope == 'Sí') checked @endif>
                                <label class="form-check-label" for="at_sincope1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_sincope" id="at_sincope2" value="No" @if($ph->at_sincope == 'No') checked @endif>
                                <label class="form-check-label" for="at_sincope2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_angina" class="form-label mb-0">Angina</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_angina" id="at_angina1" value="Sí" @if($ph->at_angina == 'Sí') checked @endif>
                                <label class="form-check-label" for="at_angina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_angina" id="at_angina2" value="No" @if($ph->at_angina == 'No') checked @endif>
                                <label class="form-check-label" for="at_angina2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="at_antecedentes1" class="form-label mb-0 d-block">Antecedentes </label>
                        <div class="form-control radioptions">

                            @php 
                                $antecedentesSeleccionados = explode(',', $ph->at_antecedentes);
                            @endphp

                            @foreach([
                                "Hipertensión arterial",
                                "Diabetes mellitus",
                                "Tabaquismo activo",
                                "Obesidad",
                                "Hipotiroidismo",
                                "Hipertirioidismo",
                                "Enfermedad renal crónica (TFG < 60)",
                                "Enfermedad cerebrovascular",
                                "Enfermedad cardiovascular",
                                "Fibrilacción auricular",
                                "Síndrome coronario crónico",
                                "Síndrome de apnea obstructiva del sueño",
                                "COVID-19",
                                "Otros"
                            ] as $index => $antecedente)
                                <div class="form-check form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="at_antecedentes[]" id="at_antecedentes{{ $index+1 }}" value="{{ $antecedente }}" {{ in_array($antecedente, $antecedentesSeleccionados) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="at_antecedentes{{ $index+1 }}">{{ $antecedente }}</label>
                                </div>
                            @endforeach
                        </div>
                        <input type="text" name="at_otro_antecedentes" class="form-control mt-1 mb-1" id="at_otro_antecedentes" placeholder="Especificar otro antecedente" value="{{ $ph->at_otro_antecedentes }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="at_vacunacion" class="form-label mb-0">Vacunación</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_vacunacion" id="at_vacunacion1" value="Sí" @if($ph->at_vacunacion == 'Sí') checked @endif>
                                <label class="form-check-label" for="at_vacunacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_vacunacion" id="at_vacunacion2" value="No" @if($ph->at_vacunacion == 'No') checked @endif>
                                <label class="form-check-label" for="at_vacunacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="at_anticoncepcion" class="form-label mb-0">Anticoncepción</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_anticoncepcion" id="at_anticoncepcion1" value="Sí" @if($ph->at_anticoncepcion == 'Sí') checked @endif>
                                <label class="form-check-label" for="at_anticoncepcion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="at_anticoncepcion" id="at_anticoncepcion2" value="No" @if($ph->at_anticoncepcion == 'No') checked @endif>
                                <label class="form-check-label" for="at_anticoncepcion2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Examen físico  -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Examen físico</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2">
                        <label for="ef_pas" class="form-label mb-0">Presión arterial sistólica <small class="text-danger">(mmHg)</small></label>
                        <input type="text" name="ef_pas" class="form-control solo-numpunt" id="ef_pas" maxlength="6" value="{{ $ph->ef_pas }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_pad" class="form-label mb-0">Presión arterial diastólica <small class="text-danger">(mmHg)</small></label>
                        <input type="text" name="ef_pad" class="form-control solo-numpunt" id="ef_pad" maxlength="6" value="{{ $ph->ef_pad }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_fc" class="form-label mb-0">Frecuencia cardiaca <small class="text-danger">(latidos/min)</small></label>
                        <input type="text" name="ef_fc" class="form-control solo-numpunt" id="ef_fc" maxlength="6" value="{{ $ph->ef_fc }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_peso" class="form-label mb-0">Peso <small class="text-danger">(Kg)</small></label>
                        <input type="text" name="ef_peso" class="form-control solo-numpunt" id="ef_peso" maxlength="6" value="{{ $ph->ef_peso }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_talla" class="form-label mb-0">Talla <small class="text-danger">(cm)</small></label>
                        <input type="text" name="ef_talla" class="form-control solo-numpunt" id="ef_talla" maxlength="6" value="{{ $ph->ef_talla }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_imc" class="form-label mb-0">Índice de masa corporal <small class="text-danger">(Kg/m2)</small></label>
                        <input type="text" name="ef_imc" class="form-control solo-numpunt" id="ef_imc" maxlength="6" value="{{ $ph->ef_imc }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_sato2" class="form-label mb-0">Saturación de O2 <small class="text-danger">(%)</small></label>
                        <input type="text" name="ef_sato2" class="form-control solo-numpunt" id="ef_sato2" maxlength="6" value="{{ $ph->ef_sato2 }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_ingurgitacion_yugular" class="form-label mb-0">Ingurgitación yugular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_ingurgitacion_yugular" id="ef_ingurgitacion_yugular1" value="Sí" @if($ph->ef_ingurgitacion_yugular == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_ingurgitacion_yugular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_ingurgitacion_yugular" id="ef_ingurgitacion_yugular2" value="No" @if($ph->ef_ingurgitacion_yugular == 'No') checked @endif>
                                <label class="form-check-label" for="ef_ingurgitacion_yugular2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_reflujo_hepatoyugular" class="form-label mb-0">Reflujo hepatoyugular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_reflujo_hepatoyugular" id="ef_reflujo_hepatoyugular1" value="Sí" @if($ph->ef_reflujo_hepatoyugular == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_reflujo_hepatoyugular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_reflujo_hepatoyugular" id="ef_reflujo_hepatoyugular2" value="No" @if($ph->ef_reflujo_hepatoyugular == 'No') checked @endif>
                                <label class="form-check-label" for="ef_reflujo_hepatoyugular2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_edema_miembros_inferiores" class="form-label mb-0">Edema en miembros inferiores</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_edema_miembros_inferiores" id="ef_edema_miembros_inferiores1" value="Sí" @if($ph->ef_edema_miembros_inferiores == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_edema_miembros_inferiores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_edema_miembros_inferiores" id="ef_edema_miembros_inferiores2" value="No" @if($ph->ef_edema_miembros_inferiores == 'No') checked @endif>
                                <label class="form-check-label" for="ef_edema_miembros_inferiores2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_hepatomegalia" class="form-label mb-0">Hepatomegalia</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_hepatomegalia" id="ef_hepatomegalia1" value="Sí" @if($ph->ef_hepatomegalia == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_hepatomegalia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_hepatomegalia" id="ef_hepatomegalia2" value="No" @if($ph->ef_hepatomegalia == 'No') checked @endif>
                                <label class="form-check-label" for="ef_hepatomegalia2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_ascitis" class="form-label mb-0">Ascitis</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_ascitis" id="ef_ascitis1" value="Sí" @if($ph->ef_ascitis == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_ascitis1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_ascitis" id="ef_ascitis2" value="No" @if($ph->ef_ascitis == 'No') checked @endif>
                                <label class="form-check-label" for="ef_ascitis2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <hr>
                        <h6 class="text-bold">Para enfermedades del tejido conectivo</h6>
                        <hr>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ef_fenomeno_raynaud" class="form-label mb-0">Fenómeno de Raynaud</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_fenomeno_raynaud" id="ef_fenomeno_raynaud1" value="Sí" @if($ph->ef_fenomeno_raynaud == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_fenomeno_raynaud1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_fenomeno_raynaud" id="ef_fenomeno_raynaud2" value="No" @if($ph->ef_fenomeno_raynaud == 'No') checked @endif>
                                <label class="form-check-label" for="ef_fenomeno_raynaud2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_ulceras_digitales" class="form-label mb-0">Úlceras digitales</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_ulceras_digitales" id="ef_ulceras_digitales1" value="Sí" @if($ph->ef_ulceras_digitales == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_ulceras_digitales1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_ulceras_digitales" id="ef_ulceras_digitales2" value="No" @if($ph->ef_ulceras_digitales == 'No') checked @endif>
                                <label class="form-check-label" for="ef_ulceras_digitales2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_esclerodactilia" class="form-label mb-0">Esclerodactilia</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_esclerodactilia" id="ef_esclerodactilia1" value="Sí" @if($ph->ef_esclerodactilia == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_esclerodactilia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_esclerodactilia" id="ef_esclerodactilia2" value="No" @if($ph->ef_esclerodactilia == 'No') checked @endif>
                                <label class="form-check-label" for="ef_esclerodactilia2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_calcinosis" class="form-label mb-0">Calcinosis</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_calcinosis" id="ef_calcinosis1" value="Sí" @if($ph->ef_calcinosis == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_calcinosis1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_calcinosis" id="ef_calcinosis2" value="No" @if($ph->ef_calcinosis == 'No') checked @endif>
                                <label class="form-check-label" for="ef_calcinosis2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_telangiectasias" class="form-label mb-0">Telangiectasias</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_telangiectasias" id="ef_telangiectasias1" value="Sí" @if($ph->ef_telangiectasias == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_telangiectasias1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_telangiectasias" id="ef_telangiectasias2" value="No" @if($ph->ef_telangiectasias == 'No') checked @endif>
                                <label class="form-check-label" for="ef_telangiectasias2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_artritis_artralgia" class="form-label mb-0">Artritis/artralgia</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_artritis_artralgia" id="ef_artritis_artralgia1" value="Sí" @if($ph->ef_artritis_artralgia == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_artritis_artralgia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_artritis_artralgia" id="ef_artritis_artralgia2" value="No" @if($ph->ef_artritis_artralgia == 'No') checked @endif>
                                <label class="form-check-label" for="ef_artritis_artralgia2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_miositis" class="form-label mb-0">Debilidad muscular proximal</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_miositis" id="ef_miositis1" value="Sí" @if($ph->ef_miositis == 'Sí') checked @endif>
                                <label class="form-check-label" for="ef_miositis1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ef_miositis" id="ef_miositis2" value="No" @if($ph->ef_miositis == 'No') checked @endif>
                                <label class="form-check-label" for="ef_miositis2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ef_iase" class="form-label mb-0">Índice de actividad para esclerosis sistémica</label>
                        <input type="text" name="ef_iase" class="form-control solo-numpunt" id="ef_iase" maxlength="6" value="{{ $ph->ef_iase }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Ecocardiograma -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Ecocardiograma</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="ec_fe" class="form-label mb-0">Fracción de eyección ventricular izquierda <small class="text-danger">(%)</small></label>
                        <input type="text" name="ec_fe" class="form-control solo-numpunt" id="ec_fe" maxlength="6" value="{{ $ph->ec_fe }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_area_ad" class="form-label mb-0">Área de aurícula derecha <small class="text-danger">(cm2)</small></label>
                        <input type="text" name="ec_area_ad" class="form-control solo-numpunt" id="ec_area_ad" maxlength="6" value="{{ $ph->ec_area_ad }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_diametro_vd" class="form-label mb-0">Diámetro basal del ventrículo derecho <small class="text-danger">(mm)</small></label>
                        <input type="text" name="ec_diametro_vd" class="form-control solo-numpunt" id="ec_diametro_vd" maxlength="6" value="{{ $ph->ec_diametro_vd }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_tapse" class="form-label mb-0">TAPSE (mm)</label>
                        <input type="text" name="ec_tapse" class="form-control solo-numpunt" id="ec_tapse" maxlength="6" value="{{ $ph->ec_tapse }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_fa_vd" class="form-label mb-0">Fracción de acortamiento del ventrículo derecho <small class="text-danger">(%)</small></label>
                        <input type="text" name="ec_fa_vd" class="form-control solo-numpunt" id="ec_fa_vd" maxlength="6" value="{{ $ph->ec_fa_vd }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_onda_s" class="form-label mb-0">Onda S</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_onda_s" id="ec_onda_s1" value="Sí" @if($ph->ec_onda_s == 'Sí') checked @endif>
                                <label class="form-check-label" for="ec_onda_s1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_onda_s" id="ec_onda_s2" value="No" @if($ph->ec_onda_s == 'No') checked @endif>
                                <label class="form-check-label" for="ec_onda_s2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_ie" class="form-label mb-0">Índice de excentricidad</label>
                        <input type="text" name="ec_ie" class="form-control solo-numpunt" id="ec_ie" maxlength="6" value="{{ $ph->ec_ie }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_vrt" class="form-label mb-0">Velocidad de regurgitación tricuspídea <small class="text-danger">(m/s)</small></label>
                        <input type="text" name="ec_vrt" class="form-control solo-numpunt" id="ec_vrt" maxlength="6" value="{{ $ph->ec_vrt }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_diametro_vci" class="form-label mb-0">Diámetro de vena cava inferior <small class="text-danger">(mm)</small></label>
                        <input type="text" name="ec_diametro_vci" class="form-control solo-numpunt" id="ec_diametro_vci" maxlength="6" value="{{ $ph->ec_diametro_vci }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_colapso_vci" class="form-label mb-0">Colapso de la vena cava inferior <small class="text-danger">(%)</small></label>
                        <input type="text" name="ec_colapso_vci" class="form-control solo-numpunt" id="ec_colapso_vci" maxlength="6" value="{{ $ph->ec_colapso_vci }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_diametro_vci_20" class="form-label mb-0">Diámetro de la vena cava inferior >20 mm</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_diametro_vci_20" id="ec_diametro_vci_201" value="Sí" @if($ph->ec_diametro_vci_20 == 'Sí') checked @endif>
                                <label class="form-check-label" for="ec_diametro_vci_201">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_diametro_vci_20" id="ec_diametro_vci_202" value="No" @if($ph->ec_diametro_vci_20 == 'No') checked @endif>
                                <label class="form-check-label" for="ec_diametro_vci_202">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_colapso_vci_50" class="form-label mb-0">Colapso de vena cava inferior < 50%</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_colapso_vci_50" id="ec_colapso_vci_501" value="Sí" @if($ph->ec_colapso_vci_50 == 'Sí') checked @endif>
                                <label class="form-check-label" for="ec_colapso_vci_501">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_colapso_vci_50" id="ec_colapso_vci_502" value="No" @if($ph->ec_colapso_vci_50 == 'No') checked @endif>
                                <label class="form-check-label" for="ec_colapso_vci_502">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_pad" class="form-label mb-0">Presión en aurícula derecha <small class="text-danger">(mmHg)</small></label>
                        <input type="text" name="ec_pad" class="form-control solo-numpunt" id="ec_pad" maxlength="6" value="{{ $ph->ec_pad }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_psap" class="form-label mb-0">PSAP <small class="text-danger">(mmHg)</small></label>
                        <input type="text" name="ec_psap" class="form-control solo-numpunt" id="ec_psap" maxlength="6" value="{{ $ph->ec_psap }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ec_derrame_pericardico" class="form-label mb-0">Derrame pericárdico</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_derrame_pericardico" id="ec_derrame_pericardico1" value="Sí" @if($ph->ec_derrame_pericardico == 'Sí') checked @endif>
                                <label class="form-check-label" for="ec_derrame_pericardico1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ec_derrame_pericardico" id="ec_derrame_pericardico2" value="No" @if($ph->ec_derrame_pericardico == 'No') checked @endif>
                                <label class="form-check-label" for="ec_derrame_pericardico2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laboratorio -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Laboratorio</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="lb_pro_bnp" class="form-label mb-0">Pro BNP <small class="text-danger">(pg/ml)</small></label>
                        <input type="text" name="lb_pro_bnp" class="form-control solo-numpunt" id="lb_pro_bnp" maxlength="6" value="{{ $ph->lb_pro_bnp }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_troponinas" class="form-label mb-0">Troponinas <small class="text-danger">(ng/ml)</small></label>
                        <input type="text" name="lb_troponinas" class="form-control solo-numpunt" id="lb_troponinas" maxlength="6" value="{{ $ph->lb_troponinas }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_hemoglobina" class="form-label mb-0">Hemoglobina <small class="text-danger">(g/dl)</small></label>
                        <input type="text" name="lb_hemoglobina" class="form-control solo-numpunt" id="lb_hemoglobina" maxlength="6" value="{{ $ph->lb_hemoglobina }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_leucocitos" class="form-label mb-0">Leucocitos <small class="text-danger">(x10^3/µl)</small></label>
                        <input type="text" name="lb_leucocitos" class="form-control solo-numpunt" id="lb_leucocitos" maxlength="6" value="{{ $ph->lb_leucocitos }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_plaquetas" class="form-label mb-0">Plaquetas <small class="text-danger">(x10^3/µl)</small></label>
                        <input type="text" name="lb_plaquetas" class="form-control solo-numpunt" id="lb_plaquetas" maxlength="6" value="{{ $ph->lb_plaquetas }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_creatinina" class="form-label mb-0">Creatinina <small class="text-danger">(mg/dl)</small></label>
                        <input type="text" name="lb_creatinina" class="form-control solo-numpunt" id="lb_creatinina" maxlength="6" value="{{ $ph->lb_creatinina }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_urea" class="form-label mb-0">Úrea <small class="text-danger">(mg/dl)</small></label>
                        <input type="text" name="lb_urea" class="form-control solo-numpunt" id="lb_urea" maxlength="6" value="{{ $ph->lb_urea }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_albunina" class="form-label mb-0">Albúmina <small class="text-danger">(g/dl)</small></label>
                        <input type="text" name="lb_albunina" class="form-control solo-numpunt" id="lb_albunina" maxlength="6" value="{{ $ph->lb_albunina }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_tgo" class="form-label mb-0">TGO <small class="text-danger">(U/l)</small></label>
                        <input type="text" name="lb_tgo" class="form-control solo-numpunt" id="lb_tgo" maxlength="6" value="{{ $ph->lb_tgo }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_tgp" class="form-label mb-0">TGP <small class="text-danger">(U/l)</small></label>
                        <input type="text" name="lb_tgp" class="form-control solo-numpunt" id="lb_tgp" maxlength="6" value="{{ $ph->lb_tgp }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_bilirrubinas_totales" class="form-label mb-0">Bilirrubinas totales <small class="text-danger">(mg/dl)</small></label>
                        <input type="text" name="lb_bilirrubinas_totales" class="form-control solo-numpunt" id="lb_bilirrubinas_totales" maxlength="6" value="{{ $ph->lb_bilirrubinas_totales }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_bilirrubina_directa" class="form-label mb-0">Bilirrubina directa <small class="text-danger">(mg/dl)</small></label>
                        <input type="text" name="lb_bilirrubina_directa" class="form-control solo-numpunt" id="lb_bilirrubina_directa" maxlength="6" value="{{ $ph->lb_bilirrubina_directa }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_fosfatasa_alcalina" class="form-label mb-0">Fosfatasa alcalina <small class="text-danger">(U/l)</small></label>
                        <input type="text" name="lb_fosfatasa_alcalina" class="form-control solo-numpunt" id="lb_fosfatasa_alcalina" maxlength="6" value="{{ $ph->lb_fosfatasa_alcalina }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_tsh" class="form-label mb-0">TSH <small class="text-danger">(mU/l)</small></label>
                        <input type="text" name="lb_tsh" class="form-control solo-numpunt" id="lb_tsh" maxlength="6" value="{{ $ph->lb_tsh }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_ferritina" class="form-label mb-0">Ferritina <small class="text-danger">(ng/ml)</small></label>
                        <input type="text" name="lb_ferritina" class="form-control solo-numpunt" id="lb_ferritina" maxlength="6" value="{{ $ph->lb_ferritina }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_saturacion_transferrina" class="form-label mb-0">Saturación de transferrina <small class="text-danger">(%)</small></label>
                        <input type="text" name="lb_saturacion_transferrina" class="form-control solo-numpunt" id="lb_saturacion_transferrina" maxlength="6" value="{{ $ph->lb_saturacion_transferrina }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_acido_urico" class="form-label mb-0">Ácido úrico <small class="text-danger">(mg/dl)</small></label>
                        <input type="text" name="lb_acido_urico" class="form-control solo-numpunt" id="lb_acido_urico" maxlength="6" value="{{ $ph->lb_acido_urico }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lb_sodio" class="form-label mb-0">Sodio <small class="text-danger">(mEq/l)</small></label>
                        <input type="text" name="lb_sodio" class="form-control solo-numpunt" id="lb_sodio" maxlength="6" value="{{ $ph->lb_sodio }}" >
                    </div>
                </div>
            </div>
        </div>

        <!--Laboratorio para HAP asociada a Tejido Conectivo-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Laboratorio para HAP asociada a Tejido Conectivo</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_ana" class="form-label mb-0">ANA</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lhtc_ana" id="lhtc_ana1" value="Sí" @if($ph->lhtc_ana == 'Sí') checked @endif>
                                <label class="form-check-label" for="lhtc_ana1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lhtc_ana" id="lhtc_ana2" value="No" @if($ph->lhtc_ana == 'No') checked @endif>
                                <label class="form-check-label" for="lhtc_ana2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_patron_ana" class="form-label mb-0">Patrón de ANA</label>
                        <input type="text" name="lhtc_patron_ana" class="form-control" id="lhtc_patron_ana" value="{{ $ph->lhtc_patron_ana }}" maxlength="6">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anticentromero" class="form-label mb-0">Anticentrómero</label>
                        <input type="text" name="lhtc_anticentromero" class="form-control solo-numpunt" id="lhtc_anticentromero" maxlength="6" value="{{ $ph->lhtc_anticentromero }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_scl70" class="form-label mb-0">Anti SCL70</label>
                        <input type="text" name="lhtc_anti_scl70" class="form-control solo-numpunt" id="lhtc_anti_scl70" maxlength="6" value="{{ $ph->lhtc_anti_scl70 }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_dna" class="form-label mb-0">Anti DNA</label>
                        <input type="text" name="lhtc_anti_dna" class="form-control solo-numpunt" id="lhtc_anti_dna" maxlength="6" value="{{ $ph->lhtc_anti_dna }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_rnp" class="form-label mb-0">Anti RNP</label>
                        <input type="text" name="lhtc_anti_rnp" class="form-control solo-numpunt" id="lhtc_anti_rnp" maxlength="6" value="{{ $ph->lhtc_anti_rnp }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_ro" class="form-label mb-0">Anti Ro</label>
                        <input type="text" name="lhtc_anti_ro" class="form-control solo-numpunt" id="lhtc_anti_ro" maxlength="6" value="{{ $ph->lhtc_anti_ro }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_la" class="form-label mb-0">Anti La</label>
                        <input type="text" name="lhtc_anti_la" class="form-control solo-numpunt" id="lhtc_anti_la" maxlength="6" value="{{ $ph->lhtc_anti_la }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_factor_reumatoideo" class="form-label mb-0">Factor reumatoideo</label>
                        <input type="text" name="lhtc_factor_reumatoideo" class="form-control solo-numpunt" id="lhtc_factor_reumatoideo" maxlength="6" value="{{ $ph->lhtc_factor_reumatoideo }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_ccp" class="form-label mb-0">Anti CCP</label>
                        <input type="text" name="lhtc_anti_ccp" class="form-control solo-numpunt" id="lhtc_anti_ccp" maxlength="6" value="{{ $ph->lhtc_anti_ccp }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_jo" class="form-label mb-0">Anti Jo</label>
                        <input type="text" name="lhtc_anti_jo" class="form-control solo-numpunt" id="lhtc_anti_jo" maxlength="6" value="{{ $ph->lhtc_anti_jo }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anticuerpo_lupico" class="form-label mb-0">Anticuerpo lúpico</label>
                        <input type="text" name="lhtc_anticuerpo_lupico" class="form-control solo-numpunt" id="lhtc_anticuerpo_lupico" maxlength="6" value="{{ $ph->lhtc_anticuerpo_lupico }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anticardiolipina_igg" class="form-label mb-0">Anticardiolipina IgG</label>
                        <input type="text" name="lhtc_anticardiolipina_igg" class="form-control solo-numpunt" id="lhtc_anticardiolipina_igg" maxlength="6" value="{{ $ph->lhtc_anticardiolipina_igg }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anticardiolipina_igm" class="form-label mb-0">Anticardiolipina IgM</label>
                        <input type="text" name="lhtc_anticardiolipina_igm" class="form-control solo-numpunt" id="lhtc_anticardiolipina_igm" maxlength="6" value="{{ $ph->lhtc_anticardiolipina_igm }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_beta_2_glicoproteina_igg" class="form-label mb-0">Anti beta 2 glicoproteina IgG</label>
                        <input type="text" name="lhtc_anti_beta_2_glicoproteina_igg" class="form-control solo-numpunt" id="lhtc_anti_beta_2_glicoproteina_igg" maxlength="6" value="{{ $ph->lhtc_anti_beta_2_glicoproteina_igg }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lhtc_anti_beta_2_glicoproteina_igm" class="form-label mb-0">Anti beta 2 glicoproteina IgM</label>
                        <input type="text" name="lhtc_anti_beta_2_glicoproteina_igm" class="form-control solo-numpunt" id="lhtc_anti_beta_2_glicoproteina_igm" maxlength="6" value="{{ $ph->lhtc_anti_beta_2_glicoproteina_igm }}" >
                    </div>
                </div>
            </div>
        </div>

        <!--Electrocardiograma-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Electrocardiograma</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="ecg_ritmo" class="form-label mb-0">Ritmo sinusal</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_ritmo" id="ecg_ritmo1" value="Sí" @if($ph->ecg_ritmo == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_ritmo1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_ritmo" id="ecg_ritmo2" value="No" @if($ph->ecg_ritmo == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_ritmo2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_fibrilacion_auricular" class="form-label mb-0">Fibrilación auricular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_fibrilacion_auricular" id="ecg_fibrilacion_auricular1" value="Sí" @if($ph->ecg_fibrilacion_auricular == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_fibrilacion_auricular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_fibrilacion_auricular" id="ecg_fibrilacion_auricular2" value="No" @if($ph->ecg_fibrilacion_auricular == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_fibrilacion_auricular2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_bloqueo_rama_izquierda" class="form-label mb-0">Bloqueo de rama izquierda</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_bloqueo_rama_izquierda" id="ecg_bloqueo_rama_izquierda1" value="Sí" @if($ph->ecg_bloqueo_rama_izquierda == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_bloqueo_rama_izquierda1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_bloqueo_rama_izquierda" id="ecg_bloqueo_rama_izquierda2" value="No" @if($ph->ecg_bloqueo_rama_izquierda == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_bloqueo_rama_izquierda2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_bloqueo_rama_derecha" class="form-label mb-0">Bloqueo de rama derecha</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_bloqueo_rama_derecha" id="ecg_bloqueo_rama_derecha1" value="Sí" @if($ph->ecg_bloqueo_rama_derecha == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_bloqueo_rama_derecha1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_bloqueo_rama_derecha" id="ecg_bloqueo_rama_derecha2" value="No" @if($ph->ecg_bloqueo_rama_derecha == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_bloqueo_rama_derecha2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_hipertrofia_ventricular_derecha" class="form-label mb-0">Hipertrofia ventricular derecha</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_hipertrofia_ventricular_derecha" id="ecg_hipertrofia_ventricular_derecha1" value="Sí" @if($ph->ecg_hipertrofia_ventricular_derecha == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_hipertrofia_ventricular_derecha1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_hipertrofia_ventricular_derecha" id="ecg_hipertrofia_ventricular_derecha2" value="No" @if($ph->ecg_hipertrofia_ventricular_derecha == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_hipertrofia_ventricular_derecha2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_frecuencia_cardiaca" class="form-label mb-0">Frecuencia cardiaca <small class="text-danger">(lpm)</small></label>
                        <input type="text" name="ecg_frecuencia_cardiaca" class="form-control solo-numpunt" id="ecg_frecuencia_cardiaca" maxlength="6" value="{{ $ph->ecg_frecuencia_cardiaca }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_tc6m" class="form-label mb-0">Test de caminata 6 minutos</label>
                        <input type="text" name="ecg_tc6m" class="form-control solo-numpunt" id="ecg_tc6m" maxlength="6" value="{{ $ph->ecg_tc6m }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_se_detuvo" class="form-label mb-0">Se detuvo en la caminata</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_se_detuvo" id="ecg_se_detuvo1" value="Sí" @if($ph->ecg_se_detuvo == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_se_detuvo1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_se_detuvo" id="ecg_se_detuvo2" value="No" @if($ph->ecg_se_detuvo == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_se_detuvo2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_requirio_oxigeno" class="form-label mb-0">Requirió oxígeno</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_requirio_oxigeno" id="ecg_requirio_oxigeno1" value="Sí" @if($ph->ecg_requirio_oxigeno == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_requirio_oxigeno1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_requirio_oxigeno" id="ecg_requirio_oxigeno2" value="No" @if($ph->ecg_requirio_oxigeno == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_requirio_oxigeno2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_distancia_recorrida" class="form-label mb-0">Distancia recorrida</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_distancia_recorrida" id="ecg_distancia_recorrida1" value="Sí" @if($ph->ecg_distancia_recorrida == 'Sí') checked @endif>
                                <label class="form-check-label" for="ecg_distancia_recorrida1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ecg_distancia_recorrida" id="ecg_distancia_recorrida2" value="No" @if($ph->ecg_distancia_recorrida == 'No') checked @endif>
                                <label class="form-check-label" for="ecg_distancia_recorrida2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_porcentaje_predicho" class="form-label mb-0">% del predicho</label>
                        <input type="text" name="ecg_porcentaje_predicho" class="form-control solo-numpunt" id="ecg_porcentaje_predicho" maxlength="6" value="{{ $ph->ecg_porcentaje_predicho }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_escala_borg_disnea" class="form-label mb-0">Escala Borg Disnea</label>
                        <input type="text" name="ecg_escala_borg_disnea" class="form-control solo-numpunt" id="ecg_escala_borg_disnea" maxlength="6" value="{{ $ph->ecg_escala_borg_disnea }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_escala_borg_fatiga" class="form-label mb-0">Escala Borg Fatiga</label>
                        <input type="text" name="ecg_escala_borg_fatiga" class="form-control solo-numpunt" id="ecg_escala_borg_fatiga" maxlength="6" value="{{ $ph->ecg_escala_borg_fatiga }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_saturacion_o2_inicial" class="form-label mb-0">Saturación O2 inicial</label>
                        <input type="text" name="ecg_saturacion_o2_inicial" class="form-control solo-numpunt" id="ecg_saturacion_o2_inicial" maxlength="6" value="{{ $ph->ecg_saturacion_o2_inicial }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_saturacion_o2_final" class="form-label mb-0">Saturación O2 final</label>
                        <input type="text" name="ecg_saturacion_o2_final" class="form-control solo-numpunt" id="ecg_saturacion_o2_final" maxlength="6" value="{{ $ph->ecg_saturacion_o2_final }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_frecuencia_cardiaca_inicial" class="form-label mb-0">Frecuencia cardiaca inicial</label>
                        <input type="text" name="ecg_frecuencia_cardiaca_inicial" class="form-control solo-numpunt" id="ecg_frecuencia_cardiaca_inicial" maxlength="6" value="{{ $ph->ecg_frecuencia_cardiaca_inicial }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_frecuencia_cardiaca_final" class="form-label mb-0">Frecuencia cardiaca final</label>
                        <input type="text" name="ecg_frecuencia_cardiaca_final" class="form-control solo-numpunt" id="ecg_frecuencia_cardiaca_final" maxlength="6" value="{{ $ph->ecg_frecuencia_cardiaca_final }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ecg_frecuencia_cardiaca_primer_minuto" class="form-label mb-0">Frecuencia cardiaca en el primer minuto de recuperación</label>
                        <input type="text" name="ecg_frecuencia_cardiaca_primer_minuto" class="form-control solo-numpunt" id="ecg_frecuencia_cardiaca_primer_minuto" maxlength="6" value="{{ $ph->ecg_frecuencia_cardiaca_primer_minuto }}" >
                    </div>
                </div>
            </div>
        </div>

        <!--Cateterismo cardiaco derecho-->
        <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-danger">
                        <h6 class="m-0 font-weight-bold text-white">Cateterismo cardiaco derecho</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-md-6 mb-2">
                                <label for="ccd_indice_cardiaco_fick" class="form-label mb-0">Índice cardiaco por método de Fick</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_indice_cardiaco_fick" id="ccd_indice_cardiaco_fick1" value="Sí" @if($ph->ccd_indice_cardiaco_fick == 'Sí') checked @endif>
                                        <label class="form-check-label" for="ccd_indice_cardiaco_fick1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_indice_cardiaco_fick" id="ccd_indice_cardiaco_fick2" value="No" @if($ph->ccd_indice_cardiaco_fick == 'No') checked @endif>
                                        <label class="form-check-label" for="ccd_indice_cardiaco_fick2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_indice_cardiaco_termodilucion" class="form-label mb-0">Índice cardiaco por método de termodilución</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_indice_cardiaco_termodilucion" id="ccd_indice_cardiaco_termodilucion1" value="Sí" @if($ph->ccd_indice_cardiaco_termodilucion == 'Sí') checked @endif>
                                        <label class="form-check-label" for="ccd_indice_cardiaco_termodilucion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_indice_cardiaco_termodilucion" id="ccd_indice_cardiaco_termodilucion2" value="No" @if($ph->ccd_indice_cardiaco_termodilucion == 'No') checked @endif>
                                        <label class="form-check-label" for="ccd_indice_cardiaco_termodilucion2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_frecuencia_cardiaca" class="form-label mb-0">Frecuencia cardiaca</label>
                                <input type="text" name="ccd_frecuencia_cardiaca" class="form-control solo-numpunt" id="ccd_frecuencia_cardiaca" maxlength="6" value="{{ $ph->ccd_frecuencia_cardiaca }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_presion_auricula_derecha" class="form-label mb-0">Presión en aurícula derecha</label>
                                <input type="text" name="ccd_presion_auricula_derecha" class="form-control solo-numpunt" id="ccd_presion_auricula_derecha" maxlength="6" value="{{ $ph->ccd_presion_auricula_derecha }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_presion_sistolica_arteria_pulmonar" class="form-label mb-0">Presión sistólica de arteria pulmonar</label>
                                <input type="text" name="ccd_presion_sistolica_arteria_pulmonar" class="form-control solo-numpunt" id="ccd_presion_sistolica_arteria_pulmonar" maxlength="6" value="{{ $ph->ccd_presion_sistolica_arteria_pulmonar }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_presion_diastolica_arteria_pulmonar" class="form-label mb-0">Presión diastólica de arteria pulmonar</label>
                                <input type="text" name="ccd_presion_diastolica_arteria_pulmonar" class="form-control solo-numpunt" id="ccd_presion_diastolica_arteria_pulmonar" maxlength="6" value="{{ $ph->ccd_presion_diastolica_arteria_pulmonar }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_presion_media_arterial_pulmonar" class="form-label mb-0">Presión media de arterial pulmonar</label>
                                <input type="text" name="ccd_presion_media_arterial_pulmonar" class="form-control solo-numpunt" id="ccd_presion_media_arterial_pulmonar" maxlength="6" value="{{ $ph->ccd_presion_media_arterial_pulmonar }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_presion_capilar" class="form-label mb-0">Presión capilar</label>
                                <input type="text" name="ccd_presion_capilar" class="form-control solo-numpunt" id="ccd_presion_capilar" maxlength="6" value="{{ $ph->ccd_presion_capilar }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_gradiente_transpulmonar" class="form-label mb-0">Gradiente transpulmonar</label>
                                <input type="text" name="ccd_gradiente_transpulmonar" class="form-control solo-numpunt" id="ccd_gradiente_transpulmonar" maxlength="6" value="{{ $ph->ccd_gradiente_transpulmonar }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_indice_cardiaco" class="form-label mb-0">Índice cardiaco</label>
                                <input type="text" name="ccd_indice_cardiaco" class="form-control solo-numpunt" id="ccd_indice_cardiaco" maxlength="6" value="{{ $ph->ccd_indice_cardiaco }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_saturacion_arteria_pulmonar" class="form-label mb-0">Saturación de arteria pulmonar</label>
                                <input type="text" name="ccd_saturacion_arteria_pulmonar" class="form-control solo-numpunt" id="ccd_saturacion_arteria_pulmonar" maxlength="6" value="{{ $ph->ccd_saturacion_arteria_pulmonar }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_resistencia_vascular_pulmonar" class="form-label mb-0">Resistencia vascular pulmonar</label>
                                <input type="text" name="ccd_resistencia_vascular_pulmonar" class="form-control solo-numpunt" id="ccd_resistencia_vascular_pulmonar" maxlength="6" value="{{ $ph->ccd_resistencia_vascular_pulmonar }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_resistencia_vascular_pulmonar_indexada" class="form-label mb-0">Resistencia vascular pulmonar <small class="text-danger">(indexada para pediatría)</small></label>
                                <input type="text" name="ccd_resistencia_vascular_pulmonar_indexada" class="form-control solo-numpunt" id="ccd_resistencia_vascular_pulmonar_indexada" maxlength="6" value="{{ $ph->ccd_resistencia_vascular_pulmonar_indexada }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_vasoreactividad" class="form-label mb-0">Vasoreactividad</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_vasoreactividad" id="ccd_vasoreactividad1" value="Positivo" @if($ph->ccd_vasoreactividad == 'Positivo') checked @endif>
                                        <label class="form-check-label" for="ccd_vasoreactividad1">Positivo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_vasoreactividad" id="ccd_vasoreactividad2" value="Negativo" @if($ph->ccd_vasoreactividad == 'Negativo') checked @endif>
                                        <label class="form-check-label" for="ccd_vasoreactividad2">Negativo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_droga_vasoreactividad" class="form-label mb-0">Droga usada para vasoreactividad</label>
                                <input type="text" name="ccd_droga_vasoreactividad" class="form-control" id="ccd_droga_vasoreactividad" value="{{ $ph->ccd_droga_vasoreactividad }}" >
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_complicaciones" class="form-label mb-0">Complicaciones</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_complicaciones" id="ccd_complicaciones1" value="Sí" @if($ph->ccd_complicaciones == 'Sí') checked @endif>
                                        <label class="form-check-label" for="ccd_complicaciones1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ccd_complicaciones" id="ccd_complicaciones2" value="No" @if($ph->ccd_complicaciones == 'No') checked @endif>
                                        <label class="form-check-label" for="ccd_complicaciones2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ccd_complicaciones_detalle" class="form-label mb-0">Detalle de complicaciones</label>
                                <input type="text" name="ccd_complicaciones_detalle" class="form-control" id="ccd_complicaciones_detalle" value="{{ $ph->ccd_complicaciones_detalle }}" >
                            </div>
                        </div>
                    </div>
        </div>

        <!--Resonancia magnética (opcional) - ventrículo derecho y aurícula derecha-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Resonancia magnética (opcional) - ventrículo derecho y aurícula derecha</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="rm_vd_masa" class="form-label mb-0">Masa del ventrículo derecho</label>
                        <input type="text" name="rm_vd_masa" class="form-control solo-numpunt" id="rm_vd_masa" maxlength="6" value="{{ $ph->rm_vd_masa }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="rm_vd_volumen_diastolico_final" class="form-label mb-0">Volumen diastólico final del ventrículo derecho</label>
                        <input type="text" name="rm_vd_volumen_diastolico_final" class="form-control solo-numpunt" id="rm_vd_volumen_diastolico_final" maxlength="6" value="{{ $ph->rm_vd_volumen_diastolico_final }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="rm_vd_volumen_sistolico_final" class="form-label mb-0">Volumen sistólico final del ventrículo derecho</label>
                        <input type="text" name="rm_vd_volumen_sistolico_final" class="form-control solo-numpunt" id="rm_vd_volumen_sistolico_final" maxlength="6" value="{{ $ph->rm_vd_volumen_sistolico_final }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="rm_vd_fraccion_eyeccion" class="form-label mb-0">Fracción de eyección del ventrículo derecho <small class="text-danger">(%)</small></label>
                        <input type="text" name="rm_vd_fraccion_eyeccion" class="form-control solo-numpunt" id="rm_vd_fraccion_eyeccion" maxlength="6" value="{{ $ph->rm_vd_fraccion_eyeccion }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="rm_ad_area" class="form-label mb-0">Área de la aurícula derecha</label>
                        <input type="text" name="rm_ad_area" class="form-control solo-numpunt" id="rm_ad_area" maxlength="6" value="{{ $ph->rm_ad_area }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="rm_vi_fraccion_eyeccion" class="form-label mb-0">Fracción de eyección del ventrículo izquierdo <small class="text-danger">(%)</small></label>
                        <input type="text" name="rm_vi_fraccion_eyeccion" class="form-control solo-numpunt" id="rm_vi_fraccion_eyeccion" maxlength="6" value="{{ $ph->rm_vi_fraccion_eyeccion }}" >
                    </div>
                </div>
            </div>
        </div>

        <!--Tomografía axial computarizada de tórax-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Tomografía axial computarizada de tórax</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="tac_diametro_arteria_pulmonar" class="form-label mb-0">Diámetro de arteria pulmonar <small class="text-danger">(mm)</small></label>
                        <input type="text" name="tac_diametro_arteria_pulmonar" class="form-control solo-numpunt" id="tac_diametro_arteria_pulmonar" maxlength="6" value="{{ $ph->tac_diametro_arteria_pulmonar }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tac_relacion_diametro" class="form-label mb-0">Relación diámetro AP/A0</label>
                        <input type="text" name="tac_relacion_diametro" class="form-control solo-numpunt" id="tac_relacion_diametro" maxlength="6" value="{{ $ph->tac_relacion_diametro }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tac_epid" class="form-label mb-0">EPID</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tac_epid" id="tac_epid1" value="No" @if($ph->tac_epid == 'No') checked @endif>
                                <label class="form-check-label" for="tac_epid1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tac_epid" id="tac_epid2" value="Extenso (>20%)" @if($ph->tac_epid == 'Extenso (>20%)') checked @endif>
                                <label class="form-check-label" for="tac_epid2">Extenso (>20%)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tac_epid" id="tac_epid3" value="Limitado (<20%)" @if($ph->tac_epid == 'Limitado (<20%)') checked @endif>
                                <label class="form-check-label" for="tac_epid3">Limitado (&lt;20%)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tac_epoc" class="form-label mb-0">EPOC</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tac_epoc" id="tac_epoc1" value="Sí" @if($ph->tac_epoc == 'Sí') checked @endif>
                                <label class="form-check-label" for="tac_epoc1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tac_epoc" id="tac_epoc2" value="No" @if($ph->tac_epoc == 'No') checked @endif>
                                <label class="form-check-label" for="tac_epoc2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tac_capilaroscopia" class="form-label mb-0">Capilaroscopía</label>
                        <input type="text" name="tac_capilaroscopia" class="form-control" id="tac_capilaroscopia" value="{{ $ph->tac_capilaroscopia }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tac_patron_esclerodermico" class="form-label mb-0">Patrón esclerodérmico</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tac_patron_esclerodermico" id="tac_patron_esclerodermico1" value="Sí" @if($ph->tac_patron_esclerodermico == 'Sí') checked @endif>
                                <label class="form-check-label" for="tac_patron_esclerodermico1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tac_patron_esclerodermico" id="tac_patron_esclerodermico2" value="No" @if($ph->tac_patron_esclerodermico == 'No') checked @endif>
                                <label class="form-check-label" for="tac_patron_esclerodermico2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tac_tipo" class="form-label mb-0">Tipo</label>
                        <select name="tac_tipo" class="form-control" id="tac_tipo">
                            <option value="" @if($ph->tac_tipo == '') selected @endif>Seleccione</option>
                            <option value="Activo" @if($ph->tac_tipo == 'Activo') selected @endif>Activo</option>
                            <option value="Tardio" @if($ph->tac_tipo == 'Tardio') selected @endif>Tardio</option>
                            <option value="Temprano" @if($ph->tac_tipo == 'Temprano') selected @endif>Temprano</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!--Ergoespirometría y otras pruebas (opcional)-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Ergoespirometría y otras pruebas (opcional)</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2"> 
                        <label for="ergo_tipo_prueba" class="form-label mb-0">Tipo de prueba</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ergo_tipo_prueba" id="ergo_tipo_prueba1" value="Prueba Máxima" @if($ph->ergo_tipo_prueba == 'Prueba Máxima') checked @endif>
                                <label class="form-check-label" for="ergo_tipo_prueba1">Prueba Máxima</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ergo_tipo_prueba" id="ergo_tipo_prueba2" value="Prueba Submáxima" @if($ph->ergo_tipo_prueba == 'Prueba Submáxima') checked @endif>
                                <label class="form-check-label" for="ergo_tipo_prueba2">Prueba Submáxima</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ergo_consumo_maximo_o2" class="form-label mb-0">Consumo máximo de O2 <small class="text-danger">(ml/k/min)</small></label>
                        <input type="text" name="ergo_consumo_maximo_o2" class="form-control solo-numpunt" id="ergo_consumo_maximo_o2" maxlength="6" value="{{ $ph->ergo_consumo_maximo_o2 }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ergo_vef1" class="form-label mb-0">VEF1 <small class="text-danger">(%)</small></label>
                        <input type="text" name="ergo_vef1" class="form-control solo-numpunt" id="ergo_vef1" maxlength="6" value="{{ $ph->ergo_vef1 }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ergo_cvf" class="form-label mb-0">CVF <small class="text-danger">(%)</small></label>
                        <input type="text" name="ergo_cvf" class="form-control solo-numpunt" id="ergo_cvf" maxlength="6" value="{{ $ph->ergo_cvf }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ergo_vef1_cvf" class="form-label mb-0">VEF1/CVF</label>
                        <input type="text" name="ergo_vef1_cvf" class="form-control solo-numpunt" id="ergo_vef1_cvf" maxlength="6" value="{{ $ph->ergo_vef1_cvf }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ergo_dlco_corregida" class="form-label mb-0">DLCo corregida para hemoglobina</label>
                        <input type="text" name="ergo_dlco_corregida" class="form-control solo-numpunt" id="ergo_dlco_corregida" maxlength="6" value="{{ $ph->ergo_dlco_corregida }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ergo_tlc" class="form-label mb-0">TLC <small class="text-danger">(Pletismografía)</small></label>
                        <input type="text" name="ergo_tlc" class="form-control solo-numpunt" id="ergo_tlc" maxlength="6" value="{{ $ph->ergo_tlc }}" >
                    </div>
                </div>
            </div>
        </div>

        <!--Tratamiento-->
        <div class="card shadow mb-4">
            <div class="card-header bg-danger py-3">
                <h6 class="m-0 font-weight-bold text-white">Tratamiento</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-12 mb-2">
                        <label for="trmto_farmacologico" class="form-label mb-0">Farmacológico</label>
                        <div class="form-control radioptions">

                            @php 
                                $trmto_farmacologicoSeleccionados = explode(',', $ph->trmto_farmacologico);
                            @endphp

                            @foreach([
                                "Calcio antagonistas: Amlodipino",
                                "Calcio antagonistas: Diltiazem",
                                "Vía óxido nítrico: Sidenafil",
                                "Vía óxido nítrico: Tadalafil",
                                "Riociguat",
                                "Antag endotelinas: Bosentan",
                                "Ambrisentan",
                                "Macitentan",
                                "Prostanoides: Iloprost",
                                "Treprostinil",
                                "Epoprostenol",
                                "Selexipag",
                                "Treprostinil INH",
                                "Otros: furosemida",
                                "Espironolactona",
                                "Digoxina",
                                "Warfarina",
                                "DOAC",
                                "Metrotexate",
                                "Micofenolato",
                                "Ciclofosfamida",
                                "Rituximab",
                                "Otros"
                            ] as $index => $trmto_farmacologico)
                                <div class="form-check form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="trmto_farmacologico[]" id="trmto_farmacologico{{ $index + 1 }}" value="{{ $trmto_farmacologico }}" @if(in_array($trmto_farmacologico, $trmto_farmacologicoSeleccionados)) checked @endif>
                                    <label class="form-check-label" for="trmto_farmacologico{{ $index + 1 }}">{{ $trmto_farmacologico }}</label>
                                </div>
                            @endforeach

                            <input type="text" name="trmto_farmacologico_otro" class="form-control mt-1 mb-1" id="trmto_farmacologico_otro" placeholder="Especifique otro" value="{{ $ph->trmto_farmacologico_otro }}" >
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="trmto_psicoterapia" class="form-label mb-0">Psicoterapia</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_psicoterapia" id="trmto_psicoterapia1" value="Sí" @if($ph->trmto_psicoterapia == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_psicoterapia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_psicoterapia" id="trmto_psicoterapia2" value="No" @if($ph->trmto_psicoterapia == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_psicoterapia2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_rehabilitacion" class="form-label mb-0">Rehabilitación</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_rehabilitacion" id="trmto_rehabilitacion1" value="Sí" @if($ph->trmto_rehabilitacion == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_rehabilitacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_rehabilitacion" id="trmto_rehabilitacion2" value="No" @if($ph->trmto_rehabilitacion == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_rehabilitacion2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_oxigenoterapia" class="form-label mb-0">Oxigenoterapia</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_oxigenoterapia" id="trmto_oxigenoterapia1" value="Sí" @if($ph->trmto_oxigenoterapia == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_oxigenoterapia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_oxigenoterapia" id="trmto_oxigenoterapia2" value="No" @if($ph->trmto_oxigenoterapia == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_oxigenoterapia2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estrategia_inicial" class="form-label mb-0">Estrategia inicial de tratamiento</label>
                        <select name="trmto_estrategia_inicial" class="form-control" id="trmto_estrategia_inicial">
                            <option value="" @if($ph->trmto_estrategia_inicial == '') selected @endif>Seleccione</option>
                            <option value="Monoterapia" @if($ph->trmto_estrategia_inicial == 'Monoterapia') selected @endif>Monoterapia</option>
                            <option value="Doble terapia" @if($ph->trmto_estrategia_inicial == 'Doble terapia') selected @endif>Dual</option>
                            <option value="Triple terapia" @if($ph->trmto_estrategia_inicial == 'Triple terapia') selected @endif>Triple</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_intervencionista" class="form-label mb-0">Terapia intervencionista</label>
                        <select name="trmto_intervencionista" class="form-control" id="trmto_intervencionista">
                            <option value="" @if($ph->trmto_intervencionista == '') selected @endif>Seleccione</option>
                            <option value="No" @if($ph->trmto_intervencionista == 'No') selected @endif>No</option>
                            <option value="Septostomia atrial" @if($ph->trmto_intervencionista == 'Septostomia atrial') selected @endif>Septostomia atrial</option>
                            <option value="Trasplante bipulmonar" @if($ph->trmto_intervencionista == 'Trasplante bipulmonar') selected @endif>Trasplante bipulmonar</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_muerte_perioperatoria" class="form-label mb-0">Muerte perioperatoria</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_perioperatoria" id="trmto_muerte_perioperatoria1" value="Sí" @if($ph->trmto_muerte_perioperatoria == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_perioperatoria1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_perioperatoria" id="trmto_muerte_perioperatoria2" value="No" @if($ph->trmto_muerte_perioperatoria == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_perioperatoria2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_muerte_dias_postrasplante" class="form-label mb-0">Muerte a cuantos días postrasplante <small class="text-danger">(terapia intervencionista)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_dias_postrasplante" id="trmto_muerte_dias_postrasplante1" value="Sí" @if($ph->trmto_muerte_dias_postrasplante == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_dias_postrasplante1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_dias_postrasplante" id="trmto_muerte_dias_postrasplante2" value="No" @if($ph->trmto_muerte_dias_postrasplante == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_dias_postrasplante2">No</label>
                            </div>
                        </div>
                        <input type="number" name="trmto_muerte_dias_postrasplante_dias" class="form-control mt-1 mb-1" id="trmto_muerte_dias_postrasplante_dias" placeholder="Días" value="{{ $ph->trmto_muerte_dias_postrasplante_dias }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_muerte_tardia" class="form-label mb-0">Muerte tardía</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_tardia" id="trmto_muerte_tardia1" value="Sí" @if($ph->trmto_muerte_tardia == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_tardia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_tardia" id="trmto_muerte_tardia2" value="No" @if($ph->trmto_muerte_tardia == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_tardia2">No</label>
                            </div>
                        </div>
                        <input type="number" name="trmto_muerte_tardia_dias" class="form-control mt-1 mb-1" id="trmto_muerte_tardia_dias" placeholder="Días" value="{{ $ph->trmto_muerte_tardia_dias }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_ecmo" class="form-label mb-0">ECMO</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_ecmo" id="trmto_ecmo1" value="Sí" @if($ph->trmto_ecmo == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_ecmo1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_ecmo" id="trmto_ecmo2" value="No" @if($ph->trmto_ecmo == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_ecmo2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_rechazo_agudo" class="form-label mb-0">Rechazo agudo</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_rechazo_agudo" id="trmto_rechazo_agudo1" value="Sí" @if($ph->trmto_rechazo_agudo == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_rechazo_agudo1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_rechazo_agudo" id="trmto_rechazo_agudo2" value="No" @if($ph->trmto_rechazo_agudo == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_rechazo_agudo2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_rechazo_cronico" class="form-label mb-0">Rechazo crónico</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_rechazo_cronico" id="trmto_rechazo_cronico1" value="Sí" @if($ph->trmto_rechazo_cronico == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_rechazo_cronico1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_rechazo_cronico" id="trmto_rechazo_cronico2" value="No" @if($ph->trmto_rechazo_cronico == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_rechazo_cronico2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_fecha_terapia_intervencionista" class="form-label mb-0">Fecha de terapia intervencionista <small class="text-danger">(para HP grupo 4)</small></label>
                        <input type="date" name="trmto_fecha_terapia_intervencionista" class="form-control" id="trmto_fecha_terapia_intervencionista" value="{{ $ph->trmto_fecha_terapia_intervencionista }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_angioplastia_pulmonar" class="form-label mb-0">Angioplastia pulmonar</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_angioplastia_pulmonar" id="trmto_angioplastia_pulmonar1" value="No" @if($ph->trmto_angioplastia_pulmonar == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_angioplastia_pulmonar1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_angioplastia_pulmonar" id="trmto_angioplastia_pulmonar2" value="Completa" @if($ph->trmto_angioplastia_pulmonar == 'Completa') checked @endif>
                                <label class="form-check-label" for="trmto_angioplastia_pulmonar2">Completa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_angioplastia_pulmonar" id="trmto_angioplastia_pulmonar3" value="Incompleta" @if($ph->trmto_angioplastia_pulmonar == 'Incompleta') checked @endif>
                                <label class="form-check-label" for="trmto_angioplastia_pulmonar3">Incompleta</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_fecha_angioplastia" class="form-label mb-0">Fecha de angioplastía <small class="text-danger">(para HP grupo 4)</small></label>
                        <input type="date" name="trmto_fecha_angioplastia" class="form-control" id="trmto_fecha_angioplastia" value="{{ $ph->trmto_fecha_angioplastia }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_cantidad_sesiones" class="form-label mb-0">Cantidad de sesiones <small class="text-danger">(angioplastía para hipertensión pulmonar del grupo 4)</small></label>
                        <input type="text" name="trmto_cantidad_sesiones" class="form-control solo-numpunt" id="trmto_cantidad_sesiones" maxlength="6" value="{{ $ph->trmto_cantidad_sesiones }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_cantidad_vasos" class="form-label mb-0">Cantidad de vasos <small class="text-danger">(angioplastía para hipertensión pulmonar del grupo 4)</small></label>
                        <input type="text" name="trmto_cantidad_vasos" class="form-control solo-numpunt" id="trmto_cantidad_vasos" maxlength="6" value="{{ $ph->trmto_cantidad_vasos }}" >
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="trmto_complicaciones" class="form-label mb-0">Complicaciones <small class="text-danger">(angioplastía para hipertensión pulmonar del grupo 4)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_complicaciones" id="trmto_complicaciones1" value="Sí" @if($ph->trmto_complicaciones == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_complicaciones1">Sí</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_complicaciones" id="trmto_complicaciones2" value="No" @if($ph->trmto_complicaciones == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_complicaciones2">No</label>
                            </div>
                        </div>
                        <textarea name="trmto_complicaciones_descripcion" class="form-control mt-1 mb-1" id="trmto_complicaciones_descripcion" placeholder="Describa las complicaciones" >{{ $ph->trmto_complicaciones_descripcion }}</textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_muerte_periprocedimiento" class="form-label mb-0">Muerte periprocedimiento <small class="text-danger">(angioplastía para hipertensión pulmonar del grupo 4)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_periprocedimiento" id="trmto_muerte_periprocedimiento1" value="Sí" @if($ph->trmto_muerte_periprocedimiento == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_periprocedimiento1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_muerte_periprocedimiento" id="trmto_muerte_periprocedimiento2" value="No" @if($ph->trmto_muerte_periprocedimiento == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_muerte_periprocedimiento2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_tromboendarterectomia" class="form-label mb-0">Tromboendarterectomía</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_tromboendarterectomia" id="trmto_tromboendarterectomia1" value="No" @if($ph->trmto_tromboendarterectomia == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_tromboendarterectomia1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_tromboendarterectomia" id="trmto_tromboendarterectomia2" value="Completa" @if($ph->trmto_tromboendarterectomia == 'Completa') checked @endif>
                                <label class="form-check-label" for="trmto_tromboendarterectomia2">Completa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_tromboendarterectomia" id="trmto_tromboendarterectomia3" value="Incompleta" @if($ph->trmto_tromboendarterectomia == 'Incompleta') checked @endif>
                                <label class="form-check-label" for="trmto_tromboendarterectomia3">Incompleta</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_fecha_endarterectomia" class="form-label mb-0">Fecha de endarterectomía <small class="text-danger">(para HP grupo 4)</small></label>
                        <input type="date" name="trmto_fecha_endarterectomia" class="form-control" id="trmto_fecha_endarterectomia" value="{{ $ph->trmto_fecha_endarterectomia }}" >
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="trmto_complicaciones_tromboendarterectomia" class="form-label mb-0">Complicaciones <small class="text-danger">(tromboendarterectomía)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_complicaciones_tromboendarterectomia" id="trmto_complicaciones_tromboendarterectomia1" value="Sí" @if($ph->trmto_complicaciones_tromboendarterectomia == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_complicaciones_tromboendarterectomia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_complicaciones_tromboendarterectomia" id="trmto_complicaciones_tromboendarterectomia2" value="No" @if($ph->trmto_complicaciones_tromboendarterectomia == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_complicaciones_tromboendarterectomia2">No</label>
                            </div>
                        </div>
                        <textarea name="trmto_complicaciones_tromboendarterectomia_describir" class="form-control mt-1 mb-1" id="trmto_complicaciones_tromboendarterectomia_describir" rows="2" placeholder="Describa las complicaciones" >{{ $ph->trmto_complicaciones_tromboendarterectomia_describir }}</textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_hipertension_pulmonar_residual" class="form-label mb-0">Hipertensión pulmonar residual</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_hipertension_pulmonar_residual" id="trmto_hipertension_pulmonar_residual1" value="Sí" @if($ph->trmto_hipertension_pulmonar_residual == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_hipertension_pulmonar_residual1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_hipertension_pulmonar_residual" id="trmto_hipertension_pulmonar_residual2" value="No" @if($ph->trmto_hipertension_pulmonar_residual == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_hipertension_pulmonar_residual2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_ecmo_perioperatorio" class="form-label mb-0">ECMO perioperatorio</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_ecmo_perioperatorio" id="trmto_ecmo_perioperatorio1" value="Sí" @if($ph->trmto_ecmo_perioperatorio == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_ecmo_perioperatorio1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_ecmo_perioperatorio" id="trmto_ecmo_perioperatorio2" value="No" @if($ph->trmto_ecmo_perioperatorio == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_ecmo_perioperatorio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_basal" class="form-label mb-0">Estratificación de riesgo basal</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_basal" id="trmto_estratificacion_riesgo_basal1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_basal == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_basal1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_basal" id="trmto_estratificacion_riesgo_basal2" value="Intermedio" @if($ph->trmto_estratificacion_riesgo_basal == 'Intermedio') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_basal2">Intermedio</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_basal" id="trmto_estratificacion_riesgo_basal3" value="Alto" @if($ph->trmto_estratificacion_riesgo_basal == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_basal3">Alto</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_guia_europea" class="form-label mb-0">Guía europea como puntaje utilizado <small class="text-danger">(instrumento de estratificación)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_guia_europea" id="trmto_guia_europea1" value="Sí" @if($ph->trmto_guia_europea == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_guia_europea1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_guia_europea" id="trmto_guia_europea2" value="No" @if($ph->trmto_guia_europea == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_guia_europea2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_reveal_lite" class="form-label mb-0">REVEAL 2.0 Lite</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_reveal_lite" id="trmto_reveal_lite1" value="Sí" @if($ph->trmto_reveal_lite == 'Sí') checked @endif>
                                <label class="form-check-label" for="trmto_reveal_lite1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_reveal_lite" id="trmto_reveal_lite2" value="No" @if($ph->trmto_reveal_lite == 'No') checked @endif>
                                <label class="form-check-label" for="trmto_reveal_lite2">No</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_3meses" class="form-label mb-0">Estratificación de riesgo a los 3 meses</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_3meses" id="trmto_estratificacion_riesgo_3meses1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_3meses == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_3meses1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_3meses" id="trmto_estratificacion_riesgo_3meses2" value="Intermedio bajo" @if($ph->trmto_estratificacion_riesgo_3meses == 'Intermedio bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_3meses2">Intermedio bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_3meses" id="trmto_estratificacion_riesgo_3meses3" value="Intermedio alto" @if($ph->trmto_estratificacion_riesgo_3meses == 'Intermedio alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_3meses3">Intermedio alto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_3meses" id="trmto_estratificacion_riesgo_3meses4" value="Alto" @if($ph->trmto_estratificacion_riesgo_3meses == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_3meses4">Alto</label>
                            </div>
                        </div>
                    </div>	
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_6meses" class="form-label mb-0">Estratificación de riesgo a los 6 meses</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_6meses" id="trmto_estratificacion_riesgo_6meses1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_6meses == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_6meses1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_6meses" id="trmto_estratificacion_riesgo_6meses2" value="Intermedio bajo" @if($ph->trmto_estratificacion_riesgo_6meses == 'Intermedio bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_6meses2">Intermedio bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_6meses" id="trmto_estratificacion_riesgo_6meses3" value="Intermedio alto" @if($ph->trmto_estratificacion_riesgo_6meses == 'Intermedio alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_6meses3">Intermedio alto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_6meses" id="trmto_estratificacion_riesgo_6meses4" value="Alto" @if($ph->trmto_estratificacion_riesgo_6meses == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_6meses4">Alto</label>
                            </div>
                        </div>
                    </div>	
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_12meses" class="form-label mb-0">Estratificación de riesgo a los 12 meses</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_12meses" id="trmto_estratificacion_riesgo_12meses1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_12meses == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_12meses1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_12meses" id="trmto_estratificacion_riesgo_12meses2" value="Intermedio bajo" @if($ph->trmto_estratificacion_riesgo_12meses == 'Intermedio bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_12meses2">Intermedio bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_12meses" id="trmto_estratificacion_riesgo_12meses3" value="Intermedio alto" @if($ph->trmto_estratificacion_riesgo_12meses == 'Intermedio alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_12meses3">Intermedio alto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_12meses" id="trmto_estratificacion_riesgo_12meses4" value="Alto" @if($ph->trmto_estratificacion_riesgo_12meses == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_12meses4">Alto</label>
                            </div>
                        </div>
                    </div>		
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_18meses" class="form-label mb-0">Estratificación de riesgo a los 18 meses</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_18meses" id="trmto_estratificacion_riesgo_18meses1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_18meses == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_18meses1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_18meses" id="trmto_estratificacion_riesgo_18meses2" value="Intermedio bajo" @if($ph->trmto_estratificacion_riesgo_18meses == 'Intermedio bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_18meses2">Intermedio bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_18meses" id="trmto_estratificacion_riesgo_18meses3" value="Intermedio alto" @if($ph->trmto_estratificacion_riesgo_18meses == 'Intermedio alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_18meses3">Intermedio alto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_18meses" id="trmto_estratificacion_riesgo_18meses4" value="Alto" @if($ph->trmto_estratificacion_riesgo_18meses == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_18meses4">Alto</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_24meses" class="form-label mb-0">Estratificación de riesgo a los 24 meses</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_24meses" id="trmto_estratificacion_riesgo_24meses1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_24meses == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_24meses1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_24meses" id="trmto_estratificacion_riesgo_24meses2" value="Intermedio bajo" @if($ph->trmto_estratificacion_riesgo_24meses == 'Intermedio bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_24meses2">Intermedio bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_24meses" id="trmto_estratificacion_riesgo_24meses3" value="Intermedio alto" @if($ph->trmto_estratificacion_riesgo_24meses == 'Intermedio alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_24meses3">Intermedio alto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_24meses" id="trmto_estratificacion_riesgo_24meses4" value="Alto" @if($ph->trmto_estratificacion_riesgo_24meses == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_24meses4">Alto</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_30meses" class="form-label mb-0">Estratificación de riesgo a los 30 meses</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_30meses" id="trmto_estratificacion_riesgo_30meses1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_30meses == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_30meses1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_30meses" id="trmto_estratificacion_riesgo_30meses2" value="Intermedio bajo" @if($ph->trmto_estratificacion_riesgo_30meses == 'Intermedio bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_30meses2">Intermedio bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_30meses" id="trmto_estratificacion_riesgo_30meses3" value="Intermedio alto" @if($ph->trmto_estratificacion_riesgo_30meses == 'Intermedio alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_30meses3">Intermedio alto</label>
                            </div>
                            <div class="form-check  form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_30meses" id="trmto_estratificacion_riesgo_30meses4" value="Alto" @if($ph->trmto_estratificacion_riesgo_30meses == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_30meses4">Alto</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trmto_estratificacion_riesgo_36meses" class="form-label mb-0">Estratificación de riesgo a los 36 meses</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_36meses" id="trmto_estratificacion_riesgo_36meses1" value="Bajo" @if($ph->trmto_estratificacion_riesgo_36meses == 'Bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_36meses1">Bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_36meses" id="trmto_estratificacion_riesgo_36meses2" value="Intermedio bajo" @if($ph->trmto_estratificacion_riesgo_36meses == 'Intermedio bajo') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_36meses2">Intermedio bajo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_36meses" id="trmto_estratificacion_riesgo_36meses3" value="Intermedio alto" @if($ph->trmto_estratificacion_riesgo_36meses == 'Intermedio alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_36meses3">Intermedio alto</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trmto_estratificacion_riesgo_36meses" id="trmto_estratificacion_riesgo_36meses4" value="Alto" @if($ph->trmto_estratificacion_riesgo_36meses == 'Alto') checked @endif>
                                <label class="form-check-label" for="trmto_estratificacion_riesgo_36meses4">Alto</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Eventos de interés-->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white">Eventos de interés</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-12 mb-2">
                        <label for="ei_morbilidad_hipertension_pulmonar" class="form-label mb-0">Morbilidad por hipertensión pulmonar (puede marcar más de una)</label>
                        <div class="form-control radioptions">

                            @php 
                                $ei_morbilidad_hipertension_pulmonarSeleccionados = explode(',', $ph->ei_morbilidad_hipertension_pulmonar);
                            @endphp

                            @foreach([
                                "Rehospitalización por falla cardiaca aguda",
                                "Requerimiento de diuréticos endovenosos por emergencia",
                                "Trasplante pulmonar o cardiopulmonar",
                                "Septotomía atrial",
                                "Empeoramiento del 15% del TC6M por hipertensión pulmonar",
                                "Progresión de CF",
                            ] as $index => $ei_morbilidad_hipertension_pulmonar)
                                <div class="form-check form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="ei_morbilidad_hipertension_pulmonar[]" id="ei_morbilidad_hipertension_pulmonar{{ $index + 1 }}" value="{{ $ei_morbilidad_hipertension_pulmonar }}" @if(in_array($ei_morbilidad_hipertension_pulmonar, $ei_morbilidad_hipertension_pulmonarSeleccionados)) checked @endif>
                                    <label class="form-check-label" for="ei_morbilidad_hipertension_pulmonar{{ $index + 1 }}">{{ $ei_morbilidad_hipertension_pulmonar }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ei_fecha_morbilidad" class="form-label mb-0">Fecha de evento de morbilidad</label>
                        <input type="date" name="ei_fecha_morbilidad" class="form-control" id="ei_fecha_morbilidad" value="{{ $ph->ei_fecha_morbilidad }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ei_mortalidad_global" class="form-label mb-0">Mortalidad global</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ei_mortalidad_global" id="ei_mortalidad_global1" value="Sí" @if($ph->ei_mortalidad_global == 'Sí') checked @endif>
                                <label class="form-check-label" for="ei_mortalidad_global1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ei_mortalidad_global" id="ei_mortalidad_global2" value="No" @if($ph->ei_mortalidad_global == 'No') checked @endif>
                                <label class="form-check-label" for="ei_mortalidad_global2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ei_fecha_mortalidad" class="form-label mb-0">Fecha de mortalidad</label>
                        <input type="date" name="ei_fecha_mortalidad" class="form-control" id="ei_fecha_mortalidad" value="{{ $ph->ei_fecha_mortalidad }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ei_remodelado_reverso_ventriculo_derecho" class="form-label mb-0">Remodelado reverso del ventrículo derecho <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disminución del diámetro del VD, área de AD y disminución del índice de excentricidad"></span></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ei_remodelado_reverso_ventriculo_derecho" id="ei_remodelado_reverso_ventriculo_derecho1" value="Sí" @if($ph->ei_remodelado_reverso_ventriculo_derecho == 'Sí') checked @endif>
                                <label class="form-check-label" for="ei_remodelado_reverso_ventriculo_derecho1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ei_remodelado_reverso_ventriculo_derecho" id="ei_remodelado_reverso_ventriculo_derecho2" value="No" @if($ph->ei_remodelado_reverso_ventriculo_derecho == 'No') checked @endif>
                                <label class="form-check-label" for="ei_remodelado_reverso_ventriculo_derecho2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ei_fecha_remodelado" class="form-label mb-0">Fecha de diagnóstico del remodelado</label>
                        <input type="date" name="ei_fecha_remodelado" class="form-control" id="ei_fecha_remodelado" value="{{ $ph->ei_fecha_remodelado }}" >
                    </div>
                </div>
            </div>
        </div>

        <!-- boton cancel y Submit -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2 mb-sm-0 text-right">
                        <a href="{{ route('pulmonary-hypertension.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
                        <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $(document).ready(function() {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        });

    });


    const solo_numpunt = document.querySelectorAll('.solo-numpunt');
    solo_numpunt.forEach(function(input) {
        input.addEventListener('keypress', function(e) {
            const charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46) {
                e.preventDefault();
            }
        });
    });

    
</script>
@endsection
