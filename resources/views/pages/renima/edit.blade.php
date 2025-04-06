@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Renima</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('renima.update', $renima->id) }}" method="POST" enctype="multipart/form-data" id="renimaForm">
        @csrf
        @method('PUT')
        <!-- Información Responsable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Responsable y centro.</h6>
            </div>
            <div class="card-body">
                @foreach($user_asociados as $user_asociado)
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <p class="form-control"> @if($user_asociado->trato != ''){{ $user_asociado->trato.' ' }}@endif{{ $user_asociado->name }} {{ $user_asociado->lastname }}</p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <p class="form-control"> @if($user_asociado->sede_name != ''){{ $user_asociado->sede_name }}@endif @if($user_asociado->sede_address != '') - {{ $user_asociado->sede_address }}@endif</p>
                        </div>
                    </div>
                @endforeach
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
                        <label for="de_documento_identidad" class="form-label mb-0">Documento de identidad (DNI)</label>
                        <input type="number" name="de_documento_identidad" class="form-control" id="de_documento_identidad" value="{{ $renima->de_documento_identidad }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_telefono" class="form-label mb-0">Teléfono de contacto</label>
                        <input type="number" name="de_telefono" class="form-control" id="de_telefono" value="{{ $renima->de_telefono }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_celular" class="form-label mb-0">Celular de contacto 1 <small>(Opcional)</small></label>
                        <input type="number" name="de_celular" class="form-control" id="de_celular" value="{{ $renima->de_celular }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_celular_2" class="form-label mb-0">Celular de contacto 2 <small>(Opcional)</small></label>
                        <input type="number" name="de_celular_2" class="form-control" id="de_celular_2" value="{{ $renima->de_celular_2 }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_correo" class="form-label mb-0">Correo electrónico del paciente <small>(Opcional)</small></label>
                        <input type="email" name="de_correo" class="form-control" id="de_correo" value="{{ $renima->de_correo }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_departamento" class="form-label mb-0">Departamento</label>
                        <input type="text" name="de_departamento" class="form-control" id="de_departamento" value="{{ $renima->de_departamento }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_provincia" class="form-label mb-0">Provincia</label>
                        <input type="text" name="de_provincia" class="form-control" id="de_provincia" value="{{ $renima->de_provincia }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_distrito" class="form-label mb-0">Distrito</label>
                        <input type="text" name="de_distrito" class="form-control" id="de_distrito" value="{{ $renima->de_distrito }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_edad" class="form-label mb-0">Edad (años) </label>
                        <input type="number" name="de_edad" class="form-control" id="de_edad" value="{{ $renima->de_edad }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_nacimiento" class="form-label mb-0">Fecha de nacimiento </label>
                        <input type="date" name="de_nacimiento" class="form-control" id="de_nacimiento" value="{{ $renima->de_nacimiento }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_sexo1" class="form-label mb-0">Sexo </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_sexo" id="de_sexo1" value="Masculino" @if($renima->de_sexo == 'Masculino') checked @endif>
                                <label class="form-check-label" for="de_sexo1">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_sexo" id="de_sexo2" value="Femenino" @if($renima->de_sexo == 'Femenino') checked @endif>
                                <label class="form-check-label" for="de_sexo2">Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_estado_civil" class="form-label mb-0">Estado civil </label>
                        <select name="de_estado_civil" id="de_estado_civil" class="form-control" >
                            <option value="" @if($renima->de_estado_civil == '') selected @endif>Seleccionar...</option>
                            <option value="Soltero" @if($renima->de_estado_civil == 'Soltero') selected @endif>Soltero</option>
                            <option value="Casado" @if($renima->de_estado_civil == 'Casado') selected @endif>Casado</option>
                            <option value="Divorciado" @if($renima->de_estado_civil == 'Divorciado') selected @endif>Divorciado</option>
                            <option value="Viudo" @if($renima->de_estado_civil == 'Viudo') selected @endif>Viudo</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_tipo_seguro" class="form-label mb-0">Tipo de seguro </label>
                        <select name="de_tipo_seguro" id="de_tipo_seguro" class="form-control" >
                            <option value="" @if($renima->de_tipo_seguro == '') selected @endif>Seleccionar...</option>
                            <option value="MINSA" @if($renima->de_tipo_seguro == 'MINSA') selected @endif>MINSA</option>
                            <option value="EsSalud" @if($renima->de_tipo_seguro == 'EsSalud') selected @endif>EsSalud</option>
                            <option value="FFAA y Policiales" @if($renima->de_tipo_seguro == 'FFAA y Policiales') selected @endif>FFAA y Policiales</option>
                            <option value="Privado" @if($renima->de_tipo_seguro == 'Privado') selected @endif>Privado</option>
                            <option value="Otro" @if($renima->de_tipo_seguro == 'Otro') selected @endif>Otro</option>
                        </select>
                        <input type="text" name="de_tipo_seguro_otro" class="form-control mt-1 @if($renima->de_tipo_seguro == 'Otro') @else d-none @endif" id="de_tipo_seguro_otro" placeholder="Especificar otro tipo de seguro" value="{{ $renima->de_tipo_seguro_otro }}">

                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_grado_instruccion" class="form-label mb-0">Grado de instrucción </label>
                        <select name="de_grado_instruccion" id="de_grado_instruccion" class="form-control" >
                            <option value="" @if($renima->de_grado_instruccion == '') selected @endif>Seleccionar...</option>
                            <option value="Sin escolaridad" @if($renima->de_grado_instruccion == 'Sin escolaridad') selected @endif>Sin escolaridad</option>
                            <option value="Primaria incompleta" @if($renima->de_grado_instruccion == 'Primaria incompleta') selected @endif>Primaria incompleta</option>
                            <option value="Primaria completa" @if($renima->de_grado_instruccion == 'Primaria completa') selected @endif>Primaria completa</option>
                            <option value="Secundaria incompleta" @if($renima->de_grado_instruccion == 'Secundaria incompleta') selected @endif>Secundaria incompleta</option>
                            <option value="Secundaria completa" @if($renima->de_grado_instruccion == 'Secundaria completa') selected @endif>Secundaria completa</option>
                            <option value="Superior universitario incompleta" @if($renima->de_grado_instruccion == 'Superior universitario incompleta') selected @endif>Superior universitario incompleta</option>
                            <option value="Superior universitario completa" @if($renima->de_grado_instruccion == 'Superior universitario completa') selected @endif>Superior universitario completa</option>
                            <option value="Superior técnico incompleta" @if($renima->de_grado_instruccion == 'Superior técnico incompleta') selected @endif>Superior técnico incompleta</option>
                            <option value="Superior técnico completa" @if($renima->de_grado_instruccion == 'Superior técnico completa') selected @endif>Superior técnico completa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Datos Clínicos -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Datos Clínicos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="dc_pas" class="form-label mb-0">Presión arterial sistólica <small class="text-danger">(mmHg)</small></label>
                        <input type="number" name="dc_pas" class="form-control" id="dc_pas" value="{{ $renima->dc_pas }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dc_pad" class="form-label mb-0">Presión arterial diastólica <small class="text-danger">(mmHg)</small></label>
                        <input type="number" name="dc_pad" class="form-control" id="dc_pad" value="{{ $renima->dc_pad }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_frecuencia_cardiaca" class="form-label mb-0">Frecuencia cardiaca</label>
                        <input type="number" name="dc_frecuencia_cardiaca" class="form-control" id="dc_frecuencia_cardiaca" value="{{ $renima->dc_frecuencia_cardiaca }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_frecuencia_respiratoria" class="form-label mb-0">Frecuencia respiratoria</label>
                        <input type="number" name="dc_frecuencia_respiratoria" class="form-control" id="dc_frecuencia_respiratoria" value="{{ $renima->dc_frecuencia_respiratoria }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_temperatura" class="form-label mb-0">Temperatura <small class="text-danger">(C°)</small></label>
                        <input type="number" name="dc_temperatura" class="form-control" id="dc_temperatura" value="{{ $renima->dc_temperatura }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_saturacion_oxigeno" class="form-label mb-0">Saturación de oxígeno <small class="text-danger">(%)</small></label>
                        <input type="number" name="dc_saturacion_oxigeno" class="form-control" id="dc_saturacion_oxigeno" value="{{ $renima->dc_saturacion_oxigeno }}">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="dc_peso" class="form-label mb-0">Peso actual <small class="text-danger">(Kg)</small></label>
                        <input type="number" name="dc_peso" class="form-control" id="dc_peso" step="0.01" value="{{ $renima->dc_peso }}">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="dc_talla" class="form-label mb-0">Talla actual <small class="text-danger">(m)</small></label>
                        <input type="number" name="dc_talla" class="form-control" id="dc_talla" step="0.01" value="{{ $renima->dc_talla }}">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="dc_imc" class="form-label mb-0">IMC</label>
                        <input type="number" name="dc_imc" class="form-control" id="dc_imc" step="0.01" placeholder="" value="{{ $renima->dc_imc }}" readonly>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="dc_antecedentes1" class="form-label mb-0 d-block">Antecedentes </label>
                        <div class="form-control radioptions">
                            @php
                                // Convertir la cadena de la base de datos en un array
                                $antecedentesSeleccionados = explode(',', $renima->dc_antecedentes); 
                            @endphp

                            @foreach([
                                "Hipertensión arterial",
                                "Diabetes mellitus",
                                "Falla cardiaca",
                                "Stroke",
                                "Dislipidemia",
                                "Enfermedad pulmonar obstructiva crónica",
                                "Infarto miocárdico antiguo",
                                "Cáncer",
                                "Enfermedad arterial periférica",
                                "Consumo de tabaco",
                                "Enfermedad coronaria obstructiva crónica",
                                "Ataque isquémico transitorio",
                                "Fibrilación auricular",
                                "ICP previo",
                                "CABG previo",
                                "Enfermedad renal crónica",
                                "hiperuricemia",
                                "Tabaquismo antiguo",
                                "Tabaquismo actual",
                                "Otro"
                            ] as $index => $antecedente)
                                <div class="form-check form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes{{ $index+1 }}" 
                                        value="{{ $antecedente }}" {{ in_array($antecedente, $antecedentesSeleccionados) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dc_antecedentes{{ $index+1 }}">{{ $antecedente }}</label>
                                </div>
                            @endforeach

                            <input type="text" name="dc_otro_antecedentes" class="form-control mt-0 mb-1 {{ in_array('Otro', $antecedentesSeleccionados) ? '' : 'd-none' }}" id="dc_otro_antecedentes" placeholder="Especificar otro antecedente" value="{{ $renima->dc_otro_antecedentes }}">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enfermedad actual  -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Enfermedad actual</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="ea_fecha_iniciosintomas" class="form-label mb-0">Fecha y hora de inicio de síntomas </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="ea_fecha_iniciosintomas" class="form-control rounded-left" id="ea_fecha_iniciosintomas" style="border-radius: 0px;" value="{{ $renima->ea_fecha_iniciosintomas }}">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_hora_iniciosintomas" class="form-control rounded-right" id="ea_hora_iniciosintomas" style="border-radius: 0px;" value="{{ $renima->ea_hora_iniciosintomas }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_cpcm" class="form-label mb-0">Centro del primer contacto médico </label>
                        <input type="text" name="ea_cpcm" class="form-control" id="ea_cpcm" value="{{ $renima->ea_cpcm }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_cpcm_fecha_ingreso" class="form-label mb-0">Fecha y hora de llegada al centro del primer contacto médico </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="ea_cpcm_fecha_ingreso" class="form-control rounded-left" id="ea_cpcm_fecha_ingreso" style="border-radius: 0px;" value="{{ $renima->ea_cpcm_fecha_ingreso }}">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_cpcm_hora_ingreso" class="form-control rounded-right" id="ea_cpcm_hora_ingreso" style="border-radius: 0px;" value="{{ $renima->ea_cpcm_hora_ingreso }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_fecha_pcm" class="form-label mb-0">Fecha y hora de primer contacto médico </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="ea_fecha_pcm" class="form-control rounded-left" id="ea_fecha_pcm" style="border-radius: 0px;" value="{{ $renima->ea_fecha_pcm }}">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_hora_pcm" class="form-control rounded-right" id="ea_hora_pcm" style="border-radius: 0px;" value="{{ $renima->ea_hora_pcm }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_tiempo_ispc" class="form-label mb-0">Tiempo desde el inicio de síntomas al primer contacto médico <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="ea_tiempo_ispc" class="form-control" id="ea_tiempo_ispc" placeholder="" readonly value="{{ $renima->ea_tiempo_ispc }}">
                        <small class="infotext">Fecha y hora de primer contacto médico - Fecha y hora de inicio de síntomas</small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_fecha_ecg" class="form-label mb-0">Fecha y hora de ECG </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="ea_fecha_ecg" class="form-control rounded-left" id="ea_fecha_ecg" style="border-radius: 0px;" value="{{ $renima->ea_fecha_ecg }}">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_hora_ecg" class="form-control rounded-right" id="ea_hora_ecg" style="border-radius: 0px;" value="{{ $renima->ea_hora_ecg }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_tpc_ecg" class="form-label mb-0">Tiempo desde el primer contacto médico hasta el ECG <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="ea_tpc_ecg" class="form-control" id="ea_tpc_ecg" placeholder="" readonly value="{{ $renima->ea_tpc_ecg }}">
                        <small class="infotext">Fecha y hora de ECG - Fecha y hora de primer contacto médico</small>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ea_manif_clinicas1" class="form-label mb-0 d-block">Manifestaciones clínicas </label>
                        <div class="form-control radioptions">
                            @php
                                // Convertir la cadena de la base de datos en un array
                                $manifClinicasSeleccionadas = explode(',', $renima->ea_manif_clinicas);
                            @endphp

                            @foreach([
                                "Dolor torácico (inespecifico)",
                                "Angina",
                                "Disnea",
                                "Palpitaciones",
                                "Síncope",
                                "Mareo",
                                "Fatiga",
                                "Irradiacion a MMSS",
                                "Dolor mandibular",
                                "Dolor de espalda",
                                "Dolor en nuca",
                                "Nauseas o vomitos",
                                "Sudoracion",
                                "Ortopnea",
                                "Soplo cardiaco",
                                "Ruido S3",
                                "Ruido S4",
                                "Ingurgitación yugular",
                                "Crepitantes",
                                "Cianosis",
                                "Llenado capilar > 2”",
                                "Edemas de mmii",
                                "Trastorno de conciencia"
                            ] as $index => $manifClinica)

                                <div class="form-check form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas{{ $index+1 }}" value="{{ $manifClinica }}" {{ in_array($manifClinica, $manifClinicasSeleccionadas) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ea_manif_clinicas{{ $index+1 }}">{{ $manifClinica }}</label>
                                </div>

                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_clasificacion_kk1" class="form-label mb-0">Clasificación Killip Kimball</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk1" value="1" @if($renima->ea_clasificacion_kk == '1') checked @endif>
                                <label class="form-check-label" for="ea_clasificacion_kk1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk2" value="2" @if($renima->ea_clasificacion_kk == '2') checked @endif>
                                <label class="form-check-label" for="ea_clasificacion_kk2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk3" value="3" @if($renima->ea_clasificacion_kk == '3') checked @endif>
                                <label class="form-check-label" for="ea_clasificacion_kk3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk4" value="4" @if($renima->ea_clasificacion_kk == '4') checked @endif>
                                <label class="form-check-label" for="ea_clasificacion_kk4">4</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_diagnostico" class="form-label mb-0">Diagnóstico</label>
                        <select class="form-control" name="ea_diagnostico" id="ea_diagnostico">
                            <option value="" @if($renima->ea_diagnostico == '') selected @endif>Seleccionar...</option>
                            <option value="IAM con elevacion del ST" @if($renima->ea_diagnostico == 'IAM con elevacion del ST') selected @endif>IAM con elevacion del ST</option>
                            <option value="Sindrome coronario agudo ST no elevado" @if($renima->ea_diagnostico == 'Sindrome coronario agudo ST no elevado') selected @endif>Sindrome coronario agudo ST no elevado</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2 @if($renima->ea_diagnostico == 'Sindrome coronario agudo ST no elevado') @else d-none @endif" id="dv_ea_diagnostico_st">
                        <label for="ea_diagnostico_st1" class="form-label mb-0">IAM con elevacion del ST</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_diagnostico_st" id="ea_diagnostico_st1" value="IAM ST no Elevado" @if($renima->ea_diagnostico_st == 'IAM ST no Elevado') checked @endif>
                                <label class="form-check-label" for="ea_diagnostico_st1">IAM ST no Elevado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_diagnostico_st" id="ea_diagnostico_st2" value="Angina Inestable" @if($renima->ea_diagnostico_st == 'Angina Inestable') checked @endif>
                                <label class="form-check-label" for="ea_diagnostico_st2">Angina Inestable</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 @if($renima->ea_diagnostico == 'Sindrome coronario agudo ST no elevado') @else d-none @endif" id="dv_ea_evaluacion_riesgo">
                        <label for="ea_evaluacion_riesgo1" class="form-label mb-0">Evaluacion del riesgo</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_evaluacion_riesgo" id="ea_evaluacion_riesgo1" value="No alto riesgo" @if($renima->ea_evaluacion_riesgo == 'No alto riesgo') checked @endif>
                                <label class="form-check-label" for="ea_evaluacion_riesgo1">No alto riesgo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_evaluacion_riesgo" id="ea_evaluacion_riesgo2" value="Alto riesgo" @if($renima->ea_evaluacion_riesgo == 'Alto riesgo') checked @endif>
                                <label class="form-check-label" for="ea_evaluacion_riesgo2">Alto riesgo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_evaluacion_riesgo" id="ea_evaluacion_riesgo3" value="Muy alto riesgo" @if($renima->ea_evaluacion_riesgo == 'Muy alto riesgo') checked @endif>
                                <label class="form-check-label" for="ea_evaluacion_riesgo3">Muy alto riesgo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 @if($renima->ea_diagnostico == 'Sindrome coronario agudo ST no elevado') @else d-none @endif" id="dv_ea_heart_score">
                        <label for="ea_heart_score" class="form-label mb-0">HEART score</label>
                        <select name="ea_heart_score" id="ea_heart_score" class="form-control" >
                            <option value="" @if($renima->ea_heart_score == '') selected @endif>Seleccionar...</option>
                            <option value="Bajo (0-3 puntos)" @if($renima->ea_heart_score == 'Bajo (0-3 puntos)') selected @endif>Bajo (0-3 puntos)</option>
                            <option value="Intermedio (4-6 puntos)" @if($renima->ea_heart_score == 'Intermedio (4-6 puntos)') selected @endif>Intermedio (4-6 puntos)</option>
                            <option value="Alto (>7 puntos)" @if($renima->ea_heart_score == 'Alto (>7 puntos)') selected @endif>Alto (>7 puntos)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Electrocardiograma -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Electrocardiograma</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="ecg_ritmo" class="form-label mb-0">Ritmo</label>
                        <select name="ecg_ritmo" id="ecg_ritmo" class="form-control" >
                            <option value="" @if($renima->ecg_ritmo == '') selected @endif>Seleccionar...</option>
                            <option value="Sinusal" @if($renima->ecg_ritmo == 'Sinusal') selected @endif>Sinusal</option>
                            <option value="Fibrilacion Auricular" @if($renima->ecg_ritmo == 'Fibrilacion Auricular') selected @endif>Fibrilacion Auricular</option>
                            <option value="BAV II O III grado" @if($renima->ecg_ritmo == 'BAV II O III grado') selected @endif>BAV II O III grado</option>
                            <option value="TV/FV" @if($renima->ecg_ritmo == 'TV/FV') selected @endif>TV/FV</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="ecg_iamcest_localizacion1" class="form-label mb-0">IAMCEST localizacion</label>
                        <div class="form-control radioptions">

                            @php 
                                // Convertir la cadena de la base de datos en un array
                                $localizacionSeleccionada = explode(',', $renima->ecg_iamcest_localizacion);
                            @endphp

                            @foreach([
                                "Septal (V1-V2)",
                                "Anterior (V3-V4)",
                                "Anteroseptal (V1-V4)",
                                "Lateral (I⸴ AVL+ V5- V6)",
                                "Antero-lateral (I-AVL⸴ V3-V6)",
                                "Anterior extensa (V1-V6⸴ I-AVL)",
                                "Inferior (II-III-AVF)",
                                "Posterior (V7-V9)",
                                "Infero-posterior (II-III-AVF⸴ V7-V9)",
                                "Infero-postero-lateral (II-III-AVF⸴ I-AVL⸴ V7-V9)",
                                "Infero-postero-lateral + VD (II-III-AVF+V3R-V4R)"
                            ] as $index => $localizacion)
                                <div class="form-check form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion{{ $index+1 }}" value="{{$localizacion}}" {{ in_array($localizacion, $localizacionSeleccionada) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ecg_iamcest_localizacion{{ $index+1 }}">{{$localizacion}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ecg_scasest1" class="form-label mb-0">SCASEST</label>
                        <div class="form-control radioptions">
                            @php
                                // Convertir la cadena de la base de datos en un array
                                $scasestSeleccionados = explode(',', $renima->ecg_scasest);
                            @endphp

                            @foreach([
                                "Depresion del ST T",
                                "Ondas T negativas",
                                "Wellens",
                                "Winter",
                                "ST elevado no persistente",
                                "Rectificacion del ST"
                            ] as $index => $scasest)
                                <div class="form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest{{ $index+1 }}" value="{{$scasest}}" {{ in_array($scasest, $scasestSeleccionados) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ecg_scasest{{ $index+1 }}">{{$scasest}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ecg_otros_hallazgos1" class="form-label mb-0">Otros Hallazgos</label>
                        <div class="form-control radioptions">
                            @php
                                // Convertir la cadena de la base de datos en un array
                                $otrosHallazgosSeleccionados = explode(',', $renima->ecg_otros_hallazgos);
                            @endphp

                            @foreach([
                                "BCRDHH",
                                "BCRIHH",
                                "BCRIHH Sgarbosa positivo",
                                "Bandera Sudafricana",
                                "Patrón de TCI o multivaso"
                            ] as $index => $hallazgo)
                                <div class="form-check-inline d-block">
                                    <input class="form-check-input" type="checkbox" name="ecg_otros_hallazgos[]" id="ecg_otros_hallazgos{{ $index+1 }}" value="{{$hallazgo}}" {{ in_array($hallazgo, $otrosHallazgosSeleccionados) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ecg_otros_hallazgos{{ $index+1 }}">{{$hallazgo}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ecg_otro" class="form-label mb-0">Otro</label>
                        <input type="text" name="ecg_otro" class="form-control" id="ecg_otro" value="{{ $renima->ecg_otro }}">
                    </div>

                </div>
            </div>
        </div>

        <!-- Datos del manejo de intervención en IAMCEST y SCASEST -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Datos del manejo de intervención en IAMCEST y SCASEST</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2">
                        <label for="dis_manejo" class="form-label mb-0">Manejo</label>
                        <select name="dis_manejo" id="dis_manejo" class="form-control" >
                            <option value="" @if($renima->dis_manejo == '') selected @endif>Seleccionar...</option>
                            <optgroup label="IAMCEST">
                                <option value="Solo lisis" @if($renima->dis_manejo == 'Solo lisis') selected @endif>Solo lisis</option>
                                <option value="Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)" @if($renima->dis_manejo == 'Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)') selected @endif>Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)</option>
                                <option value="Farmacoinvasiva + ICP sistemática (> 24 horas)" @if($renima->dis_manejo == 'Farmacoinvasiva + ICP sistemática (> 24 horas)') selected @endif>Farmacoinvasiva + ICP sistemática (> 24 horas)</option>
                                <option value="Lisis + ICP de Rescate" @if($renima->dis_manejo == 'Lisis + ICP de Rescate') selected @endif>Lisis + ICP de Rescate</option>
                                <option value="Intervención coronaria percutánea primaria (< 120 minutos)" @if($renima->dis_manejo == 'Intervención coronaria percutánea primaria (< 120 minutos)') selected @endif>Intervención coronaria percutánea primaria (< 120 minutos)</option>
                                <option value="Intervención coronaria percutánea primaria (121 minutos - 12 horas)" @if($renima->dis_manejo == 'Intervención coronaria percutánea primaria (121 minutos - 12 horas)') selected @endif>Intervención coronaria percutánea primaria (121 minutos - 12 horas)</option>
                                <option value="Intervención coronaria percutánea primaria (> 12 horas)" @if($renima->dis_manejo == 'Intervención coronaria percutánea primaria (> 12 horas)') selected @endif>Intervención coronaria percutánea primaria (> 12 horas)</option>
                            </optgroup>
                            <optgroup label="SCASEST">
                                <option value="Estrategia invasiva inmediata ( ICP < 2 horas )" @if($renima->dis_manejo == 'Estrategia invasiva inmediata ( ICP < 2 horas )') selected @endif>Estrategia invasiva inmediata ( ICP < 2 horas )</option>
                                <option value="Estrategia invasiva temprana ( ICP 2 – 24 horas)" @if($renima->dis_manejo == 'Estrategia invasiva temprana ( ICP 2 – 24 horas)') selected @endif>Estrategia invasiva temprana ( ICP 2 – 24 horas)</option>
                                <option value="Estrategia selectiva invasiva (ICP > 24 horas)" @if($renima->dis_manejo == 'Estrategia selectiva invasiva (ICP > 24 horas)') selected @endif>Estrategia selectiva invasiva (ICP > 24 horas)</option>
                            </optgroup>
                            <option value="Bypass coronario" @if($renima->dis_manejo == 'Bypass coronario') selected @endif>Bypass coronario</option>
                            <option value="Solo tratamiento médico" @if($renima->dis_manejo == 'Solo tratamiento médico') selected @endif>Solo tratamiento médico</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_dis_manejo_icpp_dosis">
                        <label for="dis_manejo_icpp_dosis" class="form-label mb-0">Dosis</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_manejo_icpp_dosis" id="dis_manejo_icpp_dosis1" value="Completa" >
                                <label class="form-check-label" for="dis_manejo_icpp_dosis1">Completa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_manejo_icpp_dosis" id="dis_manejo_icpp_dosis2" value="Ajustada a Peso" >
                                <label class="form-check-label" for="dis_manejo_icpp_dosis2">Ajustada a Peso</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_manejo_icpp_dosis" id="dis_manejo_icpp_dosis3" value="Media dosis" >
                                <label class="form-check-label" for="dis_manejo_icpp_dosis3">Media dosis</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_dis_tf">
                        <label for="dis_tf1" class="form-label mb-0">¿Tranferido para fibrinólisis?</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_tf" id="dis_tf1" value="Si" >
                                <label class="form-check-label" for="dis_tf1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_tf" id="dis_tf2" value="No" >
                                <label class="form-check-label" for="dis_tf2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_dis_lugar_tf">
                        <label for="dis_lugar_tf" class="form-label mb-0">Lugar de transferencia para fibrinólisis</label>
                        <select name="dis_lugar_tf" id="dis_lugar_tf" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Mismo centro">Mismo centro</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="dis_lugar_tf_otro" class="form-control mt-1 d-none" id="dis_lugar_tf_otro" placeholder="Especificar">
                    </div>
                    <div class="col-md-6 mb-2 d-none" id="dv_dis_fecha_fibrinolisis">
                        <label for="dis_fecha_fibrinolisis" class="form-label mb-0">Fecha y hora de fibrinólisis</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="dis_fecha_fibrinolisis" class="form-control rounded-left" id="dis_fecha_fibrinolisis" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="dis_hora_fibrinolisis" class="form-control rounded-right" id="dis_hora_fibrinolisis" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 d-none" id="dv_dis_tiempo_ecg_fibrinolisis">
                        <label for="dis_tiempo_ecg_fibrinolisis" class="form-label mb-0">Tiempo desde el ECG hasta fibrinólisis <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_tiempo_ecg_fibrinolisis" class="form-control" id="dis_tiempo_ecg_fibrinolisis" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de fibrinolisis - Fecha y hora de ECG</small>
                    </div>

                    <div class="col-md-12 mb-2 d-none" id="dv_dis_tipofibrinolisis">
                        <label for="dis_tipofibrinolisis1" class="form-label mb-0 d-block">Tipo de fibrinólisis </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_tipofibrinolisis[]" id="dis_tipofibrinolisis1" value="Alteplasa">
                                <label class="form-check-label" for="dis_tipofibrinolisis1">Alteplasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_tipofibrinolisis[]" id="dis_tipofibrinolisis2" value="Estreptoquinasa">
                                <label class="form-check-label" for="dis_tipofibrinolisis2">Estreptoquinasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_tipofibrinolisis[]" id="dis_tipofibrinolisis3" value="Tenecteplasa">
                                <label class="form-check-label" for="dis_tipofibrinolisis3">Tenecteplasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_tipofibrinolisis[]" id="dis_tipofibrinolisis4" value="Reteplasa">
                                <label class="form-check-label" for="dis_tipofibrinolisis4">Reteplasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_tipofibrinolisis[]" id="dis_tipofibrinolisis5" value="Otro">
                                <label class="form-check-label" for="dis_tipofibrinolisis5">Otro</label>
                                <input type="text" name="dis_tipofibrinolisis_otro" class="form-control mb-1 d-none" id="dis_tipofibrinolisis_otro" placeholder="Especificar">
                            </div>


                            <div class="mb-1 d-none" id="dv_dis_tipofibrinolisis_dosis">
                                <label for="dis_tipofibrinolisis_dosis1" class="form-label mb-0 d-block">Dosis </label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dis_tipofibrinolisis_dosis" id="dis_tipofibrinolisis_dosis1" value="Completa" >
                                        <label class="form-check-label" for="dis_tipofibrinolisis_dosis1">Completa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dis_tipofibrinolisis_dosis" id="dis_tipofibrinolisis_dosis2" value="Ajustada a Peso" >
                                        <label class="form-check-label" for="dis_tipofibrinolisis_dosis2">Ajustada a Peso</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dis_tipofibrinolisis_dosis" id="dis_tipofibrinolisis_dosis3" value="Media dosis" >
                                        <label class="form-check-label" for="dis_tipofibrinolisis_dosis3">Media dosis</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_dis_fibrinolisis_exitosa">
                        <label for="dis_fibrinolisis_exitosa1" class="form-label mb-0">Fibrinólisis exitosa <small class="text-danger">(Caida del ST más del 50%)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_fibrinolisis_exitosa" id="dis_fibrinolisis_exitosa1" value="Sí" >
                                <label class="form-check-label" for="dis_fibrinolisis_exitosa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_fibrinolisis_exitosa" id="dis_fibrinolisis_exitosa2" value="No" >
                                <label class="form-check-label" for="dis_fibrinolisis_exitosa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_dis_angioplastia_rescate">
                        <label for="dis_angioplastia_rescate1" class="form-label mb-0">Angioplastía de rescate</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_angioplastia_rescate" id="dis_angioplastia_rescate1" value="Sí" >
                                <label class="form-check-label" for="dis_angioplastia_rescate1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_angioplastia_rescate" id="dis_angioplastia_rescate2" value="No" >
                                <label class="form-check-label" for="dis_angioplastia_rescate2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_dis_fibrinolisis_suspendida">
                        <label for="dis_fibrinolisis_suspendida1" class="form-label mb-0">Fibrinólisis suspendida</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_fibrinolisis_suspendida" id="dis_fibrinolisis_suspendida1" value="Sí" >
                                <label class="form-check-label" for="dis_fibrinolisis_suspendida1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_fibrinolisis_suspendida" id="dis_fibrinolisis_suspendida2" value="No" >
                                <label class="form-check-label" for="dis_fibrinolisis_suspendida2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_dis_causa_suspension">
                        <label for="dis_causa_suspension" class="form-label mb-0">Causa de suspensión</label>
                        <input type="text" name="dis_causa_suspension" class="form-control" id="dis_causa_suspension">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_fuetransferido_icp1" class="form-label mb-0">¿Fue transferido para ICP? </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_fuetransferido_icp" id="dis_fuetransferido_icp1" value="Sí" >
                                <label class="form-check-label" for="dis_fuetransferido_icp1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_fuetransferido_icp" id="dis_fuetransferido_icp2" value="No" >
                                <label class="form-check-label" for="dis_fuetransferido_icp2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2" id="div_dis_lugar_transferencia_icp">
                        <label for="dis_lugar_transferencia_icp" class="form-label mb-0">Lugar de transferencia para ICP</label>
                        <select name="dis_lugar_transferencia_icp" class="form-control" id="dis_lugar_transferencia_icp">
                            <option value="">Seleccionar...</option>
                            <option value="INCOR - LIMA">INCOR - LIMA</option>
                            <option value="H. ALMENARA - LIMA">H. ALMENARA - LIMA</option>
                            <option value="H. REBAGLIATI - LIMA">H. REBAGLIATI - LIMA</option>
                            <option value="H. ALMANZOR - CHICLAYO">H. ALMANZOR - CHICLAYO</option>
                            <option value="H. SEGUIN – AREQUIPA">H. SEGUIN – AREQUIPA</option>
                            <option value="H. VIRGEN DE LA PUERTA - TRUJILLO">H. VIRGEN DE LA PUERTA - TRUJILLO</option>
                            <option value="H. HIPOLITO UNANUE">H. HIPOLITO UNANUE</option>
                            <option value="H. DOS DE MAYO">H. DOS DE MAYO</option>
                            <option value="H. LOAYZA">H. LOAYZA</option>
                            <option value="H. MARIA AUXILIADORA">H. MARIA AUXILIADORA</option>
                            <option value="H. CAYETANO HEREDIA">H. CAYETANO HEREDIA</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="dis_lugar_transferencia_icp_otro" class="form-control mt-1 d-none" id="dis_lugar_transferencia_icp_otro" placeholder="Especificar">
                    </div>

                    <div class="col-md-6 mb-2" id="div_dis_fecha_salida_antes_icp">
                        <label for="dis_fecha_salida_antes_icp" class="form-label mb-0">Fecha y hora de salida antes de la ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="dis_fecha_salida_antes_icp" class="form-control rounded-left" id="dis_fecha_salida_antes_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="dis_hora_salida_antes_icp" class="form-control rounded-right" id="dis_hora_salida_antes_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2" id="div_dis_tiempo_doorin_doorout">
                        <label for="dis_tiempo_doorin_doorout" class="form-label mb-0">Tiempo del door-in al door-out <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_tiempo_doorin_doorout" class="form-control" id="dis_tiempo_doorin_doorout" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de salida antes de la ICP - Fecha y hora de llegada al centro del primer contacto médico</small>
                    </div>

                    <div class="col-md-6 mb-2" id="div_dis_fecha_llegada_centro_icp">
                        <label for="dis_fecha_llegada_centro_icp" class="form-label mb-0">Fecha y hora de llegada al centro para ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="dis_fecha_llegada_centro_icp" class="form-control rounded-left" id="dis_fecha_llegada_centro_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="dis_hora_llegada_centro_icp" class="form-control rounded-right" id="dis_hora_llegada_centro_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2" id="div_dis_tiepo_transporte_icp">
                        <label for="dis_tiepo_transporte_icp" class="form-label mb-0">Tiempo promedio de transporte al lugar de la ICP <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_tiepo_transporte_icp" class="form-control" id="dis_tiepo_transporte_icp" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de llegada al centro para ICP - Fecha y hora de salida antes de la ICP</small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dis_fecha_inicio_icp" class="form-label mb-0">Fecha y hora de inicio de ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="dis_fecha_inicio_icp" class="form-control rounded-left" id="dis_fecha_inicio_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="dis_hora_inicio_icp" class="form-control rounded-right" id="dis_hora_inicio_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2" id="div_dis_modo_transporte_icp">
                        <label for="dis_modo_transporte_icp" class="form-label mb-0">Modo de Transporte a ICP</label>
                        <select name="dis_modo_transporte_icp" id="dis_modo_transporte_icp" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Terrestre">Terrestre</option>
                            <option value="Aereo">Aereo</option>
                            <option value="Fluvial">Fluvial</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_tipo_acceso" class="form-label mb-0">Tipo de acceso</label>
                        <select name="dis_tipo_acceso" id="dis_tipo_acceso" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Radial distal">Radial distal</option>
                            <option value="Radial convencional">Radial convencional</option>
                            <option value="Braquial">Braquial</option>
                            <option value="Femoral">Femoral</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_arteria_responsable_ima" class="form-label mb-0">Arteria responsable del IMA</label>
                        <select name="dis_arteria_responsable_ima" id="dis_arteria_responsable_ima" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Tronco coronario izquierdo">Tronco coronario izquierdo</option>
                            <option value="Descendente anterior">Descendente anterior</option>
                            <option value="Coronaria derecha">Coronaria derecha</option>
                            <option value="Circunfleja">Circunfleja</option>
                            <option value="IMA sin lesiones coronaria obstructivas">IMA sin lesiones coronaria obstructivas</option>
                            <option value="Dos o más arterias responsables">Dos o más arterias responsables</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dis_fecha_apertura" class="form-label mb-0">Fecha y hora de apertura</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="dis_fecha_apertura" class="form-control rounded-left" id="dis_fecha_apertura" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="dis_hora_apertura" class="form-control rounded-right" id="dis_hora_apertura" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_flujo_inicial_timi1" class="form-label mb-0">Flujo inicial según TIMI</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_inicial_timi" id="dis_flujo_inicial_timi1" value="0" >
                                <label class="form-check-label" for="dis_flujo_inicial_timi1">0</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_inicial_timi" id="dis_flujo_inicial_timi2" value="1" >
                                <label class="form-check-label" for="dis_flujo_inicial_timi2">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_inicial_timi" id="dis_flujo_inicial_timi3" value="2" >
                                <label class="form-check-label" for="dis_flujo_inicial_timi3">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_inicial_timi" id="dis_flujo_inicial_timi4" value="3" >
                                <label class="form-check-label" for="dis_flujo_inicial_timi4">3</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_flujo_final_timi1" class="form-label mb-0">Flujo final según TIMI</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_final_timi" id="dis_flujo_final_timi1" value="0" >
                                <label class="form-check-label" for="dis_flujo_final_timi1">0</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_final_timi" id="dis_flujo_final_timi2" value="1" >
                                <label class="form-check-label" for="dis_flujo_final_timi2">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_final_timi" id="dis_flujo_final_timi3" value="2" >
                                <label class="form-check-label" for="dis_flujo_final_timi3">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_flujo_final_timi" id="dis_flujo_final_timi4" value="3" >
                                <label class="form-check-label" for="dis_flujo_final_timi4">3</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_tipo_stent" class="form-label mb-0">Tipo de stent</label>
                        <select name="dis_tipo_stent" id="dis_tipo_stent" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Solo Angioplastia con balón">Solo Angioplastia con balón</option>
                            <option value="Stent no medicado">Stent no medicado</option>
                            <option value="Stent medicado">Stent medicado</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_numero_stent" class="form-label mb-0">Numero de stents</label>
                        <input type="number" name="dis_numero_stent" class="form-control" id="dis_numero_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_diametro_stent" class="form-label mb-0">Diámetro máximo del stent <small class="text-danger">(mm)</small></label>
                        <input type="number" name="dis_diametro_stent" class="form-control" id="dis_diametro_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_longitud_stent" class="form-label mb-0">Longitud total del stent <small class="text-danger">(mm)</small></label>
                        <input type="number" name="dis_longitud_stent" class="form-control" id="dis_longitud_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_predilatacion1" class="form-label mb-0">Predilatación</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_predilatacion" id="dis_predilatacion1" value="Sí" >
                                <label class="form-check-label" for="dis_predilatacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_predilatacion" id="dis_predilatacion2" value="No" >
                                <label class="form-check-label" for="dis_predilatacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_postdilatacion1" class="form-label mb-0">Postdilatación</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_postdilatacion" id="dis_postdilatacion1" value="Sí" >
                                <label class="form-check-label" for="dis_postdilatacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_postdilatacion" id="dis_postdilatacion2" value="No" >
                                <label class="form-check-label" for="dis_postdilatacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_otra_intervencion" class="form-label mb-0">Otra intervención</label>
                        <select name="dis_otra_intervencion" id="dis_otra_intervencion" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="No">No</option>
                            <option value="Aspirador de trombo">Aspirador de trombo</option>
                            <option value="Microcatéter">Microcatéter</option>
                            <option value="Lisis intracoronaria">Lisis intracoronaria</option>
                            <option value="Guideliner">Guideliner</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_exito_icp1" class="form-label mb-0">Éxito de ICP</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_exito_icp" id="dis_exito_icp1" value="Sí" >
                                <label class="form-check-label" for="dis_exito_icp1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_exito_icp" id="dis_exito_icp2" value="No" >
                                <label class="form-check-label" for="dis_exito_icp2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dis_fecha_fin_icp" class="form-label mb-0">Fecha y hora del fin de la ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="dis_fecha_fin_icp" class="form-control rounded-left" id="dis_fecha_fin_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="dis_hora_fin_icp" class="form-control rounded-right" id="dis_hora_fin_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-6">
                        <label for="dis_duracion_icp" class="form-label mb-0">Duración de la ICP <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_duracion_icp" class="form-control" id="dis_duracion_icp" readonly>
                        <small class="infotext">Fecha y hora del fin de la ICP - Fecha y hora de inicio de ICP</small>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="dis_complicaciones_dela_icp1" class="form-label mb-0 d-block">Complicaciones de la ICP </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp1" value="No">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp1">No</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp2" value="No reflow">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp2">No reflow</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp3" value="Disección coronaria">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp3">Disección coronaria</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp4" value="Trombosis">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp4">Trombosis</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp5" value="Cierre de otra arteria">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp5">Cierre de otra arteria</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp6" value="Infarto miocárdico peri-intervención coronaria percutánea">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp6">Infarto miocárdico peri-intervención coronaria percutánea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp7" value="PCR">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp7">PCR</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp8" value="Bradicardia con colocación de marcapasos">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp8">Bradicardia con colocación de marcapasos</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp9" value="Muerte">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp9">Muerte</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp10" value="Infraexpansión">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp10">Infraexpansión</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp11" value="Sobrexpansión">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp11">Sobrexpansión</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp12" value="ACV">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp12">ACV</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_complicaciones_dela_icp[]" id="dis_complicaciones_dela_icp13" value="Otro">
                                <label class="form-check-label" for="dis_complicaciones_dela_icp13">Otro</label>
                                <input type="text" name="dis_complicaciones_dela_icp_otro" class="form-control mb-1 d-none" id="dis_complicaciones_dela_icp_otro" placeholder="Especificar">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_tt_isquemia" class="form-label mb-0">Tiempo total de isquemia <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_tt_isquemia" class="form-control" id="dis_tt_isquemia" readonly>
                        <small class="infotext"><span id="txtfecha_rest_tieisquim">Fecha y hora de inicio de ICP</span> - Fecha y hora de inicio de síntomas</small>
                    </div>

                    <div class="col-md-6">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_otrastenosis_coronaria1" class="form-label mb-0">Otra estenosis coronaria</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_otrastenosis_coronaria" id="dis_otrastenosis_coronaria1" value="Sí" >
                                <label class="form-check-label" for="dis_otrastenosis_coronaria1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_otrastenosis_coronaria" id="dis_otrastenosis_coronaria2" value="No" >
                                <label class="form-check-label" for="dis_otrastenosis_coronaria2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="div_dis_otrastenosis_coronaria_lesiones">
                        <label for="dis_otrastenosis_coronaria_lesiones1" class="form-label mb-0">Señale que otras lesiones severas (> 70%)estan presentes</label>
                        <div class="form-control radioptions">
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones1" value="Tronco coronario izquierdo">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones1">Tronco coronario izquierdo</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones2" value="Descendente anterior">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones2">Descendente anterior</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones3" value="1 Diagonal">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones3">1 Diagonal</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones4" value="2 Diagonal">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones4">2 Diagonal</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones5" value="Circunfleja">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones5">Circunfleja</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones6" value="1 Obtusa Marginal">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones6">1 Obtusa Marginal</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones7" value="2 Obtusa Marginal">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones7">2 Obtusa Marginal</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones8" value="Coronaria Derecha">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones8">Coronaria Derecha</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones9" value="1 Aguda Marginal">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones9">1 Aguda Marginal</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones10" value="Tronco Postero Lateral">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones10">Tronco Postero Lateral</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones11" value="Descendente Posterior">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones11">Descendente Posterior</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_otrastenosis_coronaria_lesiones[]" id="dis_otrastenosis_coronaria_lesiones12" value="Ramo Intermedio">
                                <label class="form-check-label" for="dis_otrastenosis_coronaria_lesiones12">Ramo Intermedio</label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 mb-2">
                        <label for="dis_icp_otras_lesiones1" class="form-label mb-0">ICP de otras lesiones</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_icp_otras_lesiones" id="dis_icp_otras_lesiones1" value="Sí" >
                                <label class="form-check-label" for="dis_icp_otras_lesiones1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_icp_otras_lesiones" id="dis_icp_otras_lesiones2" value="No" >
                                <label class="form-check-label" for="dis_icp_otras_lesiones2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="div_dis_icp_otras_lesiones_lesiones">
                        <label for="dis_icp_otras_lesiones_lesiones1" class="form-label mb-0">Señale que otras lesiones se hizo ICP</label>
                        <div class="form-control radioptions">
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones1" value="Tronco coronario izquierdo">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones1">Tronco coronario izquierdo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones2" value="Descendente anterior">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones2">Descendente anterior</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones3" value="1 Diagonal">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones3">1 Diagonal</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones4" value="2 Diagonal">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones4">2 Diagonal</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones5" value="Circunfleja">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones5">Circunfleja</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones6" value="1 Obtusa Marginal">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones6">1 Obtusa Marginal</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones7" value="2 Obtusa Marginal">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones7">2 Obtusa Marginal</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones8" value="Coronaria Derecha">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones8">Coronaria Derecha</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones9" value="1 Aguda Marginal">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones9">1 Aguda Marginal</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones10" value="Tronco Postero Lateral">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones10">Tronco Postero Lateral</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones11" value="Descendente Posterior">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones11">Descendente Posterior</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dis_icp_otras_lesiones_lesiones[]" id="dis_icp_otras_lesiones_lesiones12" value="Ramo Intermedio">
                                <label class="form-check-label" for="dis_icp_otras_lesiones_lesiones12">Ramo Intermedio</label>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 mb-2">
                        <label for="dis_decisio_basada" class="form-label mb-0">Decisión basada por</label>
                        <select name="dis_decisio_basada" id="dis_decisio_basada" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Anatomia">Anatomia</option>
                            <option value="Guía de presión">Guía de presión</option>
                            <option value="IVUS">IVUS</option>
                            <option value="Prueba de isquemia">Prueba de isquemia</option>
                            <option value="PEG">PEG</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_momento_icp_otras_lesiones" class="form-label mb-0">Momento del ICP de Otras lesiones</label>
                        <select name="dis_momento_icp_otras_lesiones" id="dis_momento_icp_otras_lesiones" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Durante el procedimiento Indice">Durante el procedimiento Indice</option>
                            <option value="Antes del Alta">Antes del Alta</option>
                            <option value="Despues del Alta">Despues del Alta</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_cuan_dias_antes_despues_alta_icp" class="form-label mb-0">A los Cuantos dias antes o despues del Alta se realizo la ICP de las otras arterias</label>
                        <input type="number" name="dis_cuan_dias_antes_despues_alta_icp" class="form-control" id="dis_cuan_dias_antes_despues_alta_icp">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_revascularizacion_completa1" class="form-label mb-0">Revascularización Completa</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_revascularizacion_completa" id="dis_revascularizacion_completa1" value="Sí" >
                                <label class="form-check-label" for="dis_revascularizacion_completa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_revascularizacion_completa" id="dis_revascularizacion_completa2" value="No" >
                                <label class="form-check-label" for="dis_revascularizacion_completa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_reperfusion1" class="form-label mb-0">Reperfusion</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_reperfusion" id="dis_reperfusion1" value="Sí" >
                                <label class="form-check-label" for="dis_reperfusion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_reperfusion" id="dis_reperfusion2" value="No" >
                                <label class="form-check-label" for="dis_reperfusion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_motivo_deno_reperfusion" class="form-label mb-0">Motivo de no reperfusión</label>
                        <select name="dis_motivo_deno_reperfusion" id="dis_motivo_deno_reperfusion" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Contraindicacion para Lisis">Contraindicacion para Lisis</option>
                            <option value="Falta de fibrinolitico">Falta de fibrinolitico</option>
                            <option value="Rechazo del paciente">Rechazo del paciente</option>
                            <option value="No tiene Electrocardiograma">No tiene Electrocardiograma</option>
                            <option value="Problemas de ambulancia y/o transporte">Problemas de ambulancia y/o transporte</option>
                            <option value="Problemas de retraso en el Diagnostico">Problemas de retraso en el Diagnostico</option>
                            <option value="Presentacion Tardia 12 – 24 horas">Presentacion Tardia 12 – 24 horas</option>
                            <option value="Presentacion Tardia 24– 72 horas">Presentacion Tardia 24– 72 horas</option>
                            <option value="Presentacion Tardia > 72 horas">Presentacion Tardia > 72 horas</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="dis_motivo_deno_reperfusion_otro" class="form-control mt-1 d-none" id="dis_motivo_deno_reperfusion_otro" placeholder="Especificar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_cabg1" class="form-label mb-0">CABG</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_cabg" id="dis_cabg1" value="Sí" >
                                <label class="form-check-label" for="dis_cabg1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dis_cabg" id="dis_cabg2" value="No" >
                                <label class="form-check-label" for="dis_cabg2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="div_dis_motivo_cabg">
                        <label for="dis_motivo_cabg" class="form-label mb-0">Motivo de CABG</label>
                        <select name="dis_motivo_cabg" id="dis_motivo_cabg" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="ICP frustra">ICP frustra</option>
                            <option value="Complicacion de una ICP">Complicacion de una ICP</option>
                            <option value="Contraindicaciones tecnicas de una ICP por Anatomia">Contraindicaciones tecnicas de una ICP por Anatomia</option>
                            <option value="Complicacion Mecanica asociada">Complicacion Mecanica asociada</option>
                            <option value="Shock Cardiogenico refractario">Shock Cardiogenico refractario</option>
                            <option value="Otras">Otras</option>
                        </select>
                        <input type="text" name="dis_motivo_cabg_otro" class="form-control mt-1 d-none" id="dis_motivo_cabg_otro" placeholder="Especificar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_puntaje_grace" class="form-label mb-0">Puntaje GRACE</label>
                        <select name="dis_puntaje_grace" id="dis_puntaje_grace" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Bajo">Bajo</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Alto">Alto</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dis_puntaje_crussade" class="form-label mb-0">Puntaje Crussade</label>
                        <select name="dis_puntaje_crussade" id="dis_puntaje_crussade" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Muy Bajo">Muy Bajo</option>
                            <option value="Bajo">Bajo</option>
                            <option value="Moderado">Moderado</option>
                            <option value="Alto">Alto</option>
                            <option value="Muy Alto">Muy Alto</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!--Terapia Intrahospitalaria-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Terapia Intrahospitalaria</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="ti_aspirina1" class="form-label mb-0">Aspirina</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_aspirina" id="ti_aspirina1" value="Sí" @if($renima->ti_aspirina == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_aspirina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_aspirina" id="ti_aspirina2" value="No" @if($renima->ti_aspirina == 'No') checked @endif>
                                <label class="form-check-label" for="ti_aspirina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_ip2y121" class="form-label mb-0">IP2Y12</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ip2y12" id="ti_ip2y121" value="Clopidogrel" @if($renima->ti_ip2y12 == 'Clopidogrel') checked @endif>
                                <label class="form-check-label" for="ti_ip2y121">Clopidogrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ip2y12" id="ti_ip2y122" value="Prasugrel" @if($renima->ti_ip2y12 == 'Prasugrel') checked @endif>
                                <label class="form-check-label" for="ti_ip2y122">Prasugrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ip2y12" id="ti_ip2y123" value="Ticagrelor" @if($renima->ti_ip2y12 == 'Ticagrelor') checked @endif>
                                <label class="form-check-label" for="ti_ip2y123">Ticagrelor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ip2y12" id="ti_ip2y124" value="No" @if($renima->ti_ip2y12 == 'No') checked @endif>
                                <label class="form-check-label" for="ti_ip2y124">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_enoxaparina1" class="form-label mb-0">Enoxaparina</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_enoxaparina" id="ti_enoxaparina1" value="Sí" @if($renima->ti_enoxaparina == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_enoxaparina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_enoxaparina" id="ti_enoxaparina2" value="No" @if($renima->ti_enoxaparina == 'No') checked @endif>
                                <label class="form-check-label" for="ti_enoxaparina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_heparina_no_fraccionada1" class="form-label mb-0">Heparina no fraccionada</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_heparina_no_fraccionada" id="ti_heparina_no_fraccionada1" value="Sí" @if($renima->ti_heparina_no_fraccionada == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_heparina_no_fraccionada1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_heparina_no_fraccionada" id="ti_heparina_no_fraccionada2" value="No" @if($renima->ti_heparina_no_fraccionada == 'No') checked @endif>
                                <label class="form-check-label" for="ti_heparina_no_fraccionada2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_atorvastatina1" class="form-label mb-0">Atorvastatina</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_atorvastatina" id="ti_atorvastatina1" value="Sí" @if($renima->ti_atorvastatina == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_atorvastatina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_atorvastatina" id="ti_atorvastatina2" value="No" @if($renima->ti_atorvastatina == 'No') checked @endif>
                                <label class="form-check-label" for="ti_atorvastatina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_betabloqueadores1" class="form-label mb-0">Betabloqueadores</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_betabloqueadores" id="ti_betabloqueadores1" value="Sí" @if($renima->ti_betabloqueadores == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_betabloqueadores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_betabloqueadores" id="ti_betabloqueadores2" value="No" @if($renima->ti_betabloqueadores == 'No') checked @endif>
                                <label class="form-check-label" for="ti_betabloqueadores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_diureticos_asa1" class="form-label mb-0">Diuréticos de asa</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_diureticos_asa" id="ti_diureticos_asa1" value="Sí" @if($renima->ti_diureticos_asa == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_diureticos_asa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_diureticos_asa" id="ti_diureticos_asa2" value="No" @if($renima->ti_diureticos_asa == 'No') checked @endif>
                                <label class="form-check-label" for="ti_diureticos_asa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_vasodilatadores1" class="form-label mb-0">Vasodilatadores</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_vasodilatadores" id="ti_vasodilatadores1" value="Sí" @if($renima->ti_vasodilatadores == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_vasodilatadores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_vasodilatadores" id="ti_vasodilatadores2" value="No" @if($renima->ti_vasodilatadores == 'No') checked @endif>
                                <label class="form-check-label" for="ti_vasodilatadores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_vasopresores1" class="form-label mb-0">Vasopresores</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_vasopresores" id="ti_vasopresores1" value="Sí" @if($renima->ti_vasopresores == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_vasopresores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_vasopresores" id="ti_vasopresores2" value="No" @if($renima->ti_vasopresores == 'No') checked @endif>
                                <label class="form-check-label" for="ti_vasopresores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_inotropicos1" class="form-label mb-0">Inotrópicos</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_inotropicos" id="ti_inotropicos1" value="Sí" @if($renima->ti_inotropicos == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_inotropicos1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_inotropicos" id="ti_inotropicos2" value="No" @if($renima->ti_inotropicos == 'No') checked @endif>
                                <label class="form-check-label" for="ti_inotropicos2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_ieca_ara1" class="form-label mb-0">IECA/ARA</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ieca_ara" id="ti_ieca_ara1" value="Sí" @if($renima->ti_ieca_ara == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_ieca_ara1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ieca_ara" id="ti_ieca_ara2" value="No" @if($renima->ti_ieca_ara == 'No') checked @endif>
                                <label class="form-check-label" for="ti_ieca_ara2">No</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label for="ti_insulina1" class="form-label mb-0">Insulina</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_insulina" id="ti_insulina1" value="Sí" @if($renima->ti_insulina == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_insulina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_insulina" id="ti_insulina2" value="No" @if($renima->ti_insulina == 'No') checked @endif>
                                <label class="form-check-label" for="ti_insulina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_antagonistas_mineralocorticoide1" class="form-label mb-0">Antagonistas de los mineralos corticoides</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_antagonistas_mineralocorticoide" id="ti_antagonistas_mineralocorticoide1" value="Sí" @if($renima->ti_antagonistas_mineralocorticoide == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_antagonistas_mineralocorticoide1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_antagonistas_mineralocorticoide" id="ti_antagonistas_mineralocorticoide2" value="No" @if($renima->ti_antagonistas_mineralocorticoide == 'No') checked @endif>
                                <label class="form-check-label" for="ti_antagonistas_mineralocorticoide2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_ventilacion_mecanica1" class="form-label mb-0">Ventilación mecánica</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ventilacion_mecanica" id="ti_ventilacion_mecanica1" value="Sí" @if($renima->ti_ventilacion_mecanica == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_ventilacion_mecanica1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ventilacion_mecanica" id="ti_ventilacion_mecanica2" value="No" @if($renima->ti_ventilacion_mecanica == 'No') checked @endif>
                                <label class="form-check-label" for="ti_ventilacion_mecanica2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_dialisis1" class="form-label mb-0">Diálisis</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_dialisis" id="ti_dialisis1" value="Sí" @if($renima->ti_dialisis == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_dialisis1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_dialisis" id="ti_dialisis2" value="No" @if($renima->ti_dialisis == 'No') checked @endif>
                                <label class="form-check-label" for="ti_dialisis2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_rehabilitacion_cardiaca1" class="form-label mb-0">Rehabilitación cardiaca</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_rehabilitacion_cardiaca" id="ti_rehabilitacion_cardiaca1" value="Sí" @if($renima->ti_rehabilitacion_cardiaca == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_rehabilitacion_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_rehabilitacion_cardiaca" id="ti_rehabilitacion_cardiaca2" value="No" @if($renima->ti_rehabilitacion_cardiaca == 'No') checked @endif>
                                <label class="form-check-label" for="ti_rehabilitacion_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_ventilacion_no_invasiva1" class="form-label mb-0">Ventilación no invasiva</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ventilacion_no_invasiva" id="ti_ventilacion_no_invasiva1" value="Sí" @if($renima->ti_ventilacion_no_invasiva == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_ventilacion_no_invasiva1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ventilacion_no_invasiva" id="ti_ventilacion_no_invasiva2" value="No" @if($renima->ti_ventilacion_no_invasiva == 'No') checked @endif>
                                <label class="form-check-label" for="ti_ventilacion_no_invasiva2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_balon_contrapulsacion_ia1" class="form-label mb-0">Balón de contrapulsación intra aórtico</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_balon_contrapulsacion_ia" id="ti_balon_contrapulsacion_ia1" value="Sí" @if($renima->ti_balon_contrapulsacion_ia == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_balon_contrapulsacion_ia1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_balon_contrapulsacion_ia" id="ti_balon_contrapulsacion_ia2" value="No" @if($renima->ti_balon_contrapulsacion_ia == 'No') checked @endif>
                                <label class="form-check-label" for="ti_balon_contrapulsacion_ia2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_levosimendan1" class="form-label mb-0">Levosimendan</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_levosimendan" id="ti_levosimendan1" value="Sí" @if($renima->ti_levosimendan == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_levosimendan1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_levosimendan" id="ti_levosimendan2" value="No" @if($renima->ti_levosimendan == 'No') checked @endif>
                                <label class="form-check-label" for="ti_levosimendan2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_marcapaso1" class="form-label mb-0">Marcapasos</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_marcapaso" id="ti_marcapaso1" value="Transitorio" @if($renima->ti_marcapaso == 'Transitorio') checked @endif>
                                <label class="form-check-label" for="ti_marcapaso1">Transitorio</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_marcapaso" id="ti_marcapaso2" value="Definitivo" @if($renima->ti_marcapaso == 'Definitivo') checked @endif>
                                <label class="form-check-label" for="ti_marcapaso2">Definitivo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_marcapaso" id="ti_marcapaso3" value="No" @if($renima->ti_marcapaso == 'No') checked @endif>
                                <label class="form-check-label" for="ti_marcapaso3">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ti_ecmo1" class="form-label mb-0">ECMO</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ecmo" id="ti_ecmo1" value="Sí" @if($renima->ti_ecmo == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_ecmo1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_ecmo" id="ti_ecmo2" value="No" @if($renima->ti_ecmo == 'No') checked @endif>
                                <label class="form-check-label" for="ti_ecmo2">No</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label for="ti_dai_resincro1" class="form-label mb-0">DAI/Resincro</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_dai_resincro" id="ti_dai_resincro1" value="Sí" @if($renima->ti_dai_resincro == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_dai_resincro1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_dai_resincro" id="ti_dai_resincro2" value="No" @if($renima->ti_dai_resincro == 'No') checked @endif>
                                <label class="form-check-label" for="ti_dai_resincro2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ti_transplante_cardiaca1" class="form-label mb-0">Trasplante Cardiaca</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_transplante_cardiaca" id="ti_transplante_cardiaca1" value="Sí" @if($renima->ti_transplante_cardiaca == 'Sí') checked @endif>
                                <label class="form-check-label" for="ti_transplante_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ti_transplante_cardiaca" id="ti_transplante_cardiaca2" value="No" @if($renima->ti_transplante_cardiaca == 'No') checked @endif>
                                <label class="form-check-label" for="ti_transplante_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!--Analisis Auxiliares Intrahospitalarios-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Analisis Auxiliares Intrahospitalarios</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="aai_hemoglobina" class="form-label mb-0">Hemoglobina</label>
                        <input type="number" name="aai_hemoglobina" class="form-control" id="aai_hemoglobina" @if($renima->aai_hemoglobina) value="{{ $renima->aai_hemoglobina }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_leucocitos" class="form-label mb-0">Leucocitos</label>
                        <input type="number" name="aai_leucocitos" class="form-control" id="aai_leucocitos" @if($renima->aai_leucocitos) value="{{ $renima->aai_leucocitos }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_plaquetas" class="form-label mb-0">Plaquetas</label>
                        <input type="number" name="aai_plaquetas" class="form-control" id="aai_plaquetas" @if($renima->aai_plaquetas) value="{{ $renima->aai_plaquetas }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_creatinina" class="form-label mb-0">Creatinina</label>
                        <input type="number" name="aai_creatinina" class="form-control" id="aai_creatinina" @if($renima->aai_creatinina) value="{{ $renima->aai_creatinina }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_urea" class="form-label mb-0">Úrea</label>
                        <input type="number" name="aai_urea" class="form-control" id="aai_urea" @if($renima->aai_urea) value="{{ $renima->aai_urea }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_glucosa" class="form-label mb-0">Glucosa</label>
                        <input type="number" name="aai_glucosa" class="form-control" id="aai_glucosa" @if($renima->aai_glucosa) value="{{ $renima->aai_glucosa }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_troponina_iot_primer" class="form-label mb-0">Troponina I o T Primer control</label>
                        <input type="number" name="aai_troponina_iot_primer" class="form-control" id="aai_troponina_iot_primer" @if($renima->aai_troponina_iot_primer) value="{{ $renima->aai_troponina_iot_primer }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_troponina_iot_segundo" class="form-label mb-0">Troponina I o T Segundo control</label>
                        <input type="number" name="aai_troponina_iot_segundo" class="form-control" id="aai_troponina_iot_segundo" @if($renima->aai_troponina_iot_segundo) value="{{ $renima->aai_troponina_iot_segundo }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_horas_troponina" class="form-label mb-0">Nº de horas al 2º control de Troponina</label>
                        <input type="number" name="aai_horas_troponina" class="form-control" id="aai_horas_troponina" @if($renima->aai_horas_troponina) value="{{ $renima->aai_horas_troponina }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_cpk_total" class="form-label mb-0">CPK total</label>
                        <input type="number" name="aai_cpk_total" class="form-control" id="aai_cpk_total" @if($renima->aai_cpk_total) value="{{ $renima->aai_cpk_total }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_cpk_mb" class="form-label mb-0">CPK-MB</label>
                        <input type="number" name="aai_cpk_mb" class="form-control" id="aai_cpk_mb" @if($renima->aai_cpk_mb) value="{{ $renima->aai_cpk_mb }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_lactato" class="form-label mb-0">Lactato</label>
                        <input type="number" name="aai_lactato" class="form-control" id="aai_lactato" @if($renima->aai_lactato) value="{{ $renima->aai_lactato }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_fevi" class="form-label mb-0">Fracción de eyección ventricular izquierda</label>
                        <input type="number" name="aai_fevi" class="form-control" id="aai_fevi" @if($renima->aai_fevi) value="{{ $renima->aai_fevi }}" @endif>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_fecha_pm_fevi" class="form-label mb-0">Fecha de primera medición de fracción de eyección ventricular izquierda</label>
                        <input type="date" name="aai_fecha_pm_fevi" class="form-control" id="aai_fecha_pm_fevi" value="{{ $renima->aai_fecha_pm_fevi }}">
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label for="aai_hemoglobina_glicosilada" class="form-label mb-0">Hemoglobina Glicosilada</label>
                        <input type="number" name="aai_hemoglobina_glicosilada" class="form-control" id="aai_hemoglobina_glicosilada" @if($renima->aai_hemoglobina_glicosilada) value="{{ $renima->aai_hemoglobina_glicosilada }}" @endif>
                    </div>
                </div>
            </div>
        </div>

        <!--Datos Clinicos intrahospitalarios -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Datos Clinicos intrahospitalarios</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="dci_muerte_cardiovascular1" class="form-label mb-0">Muerte cardiovascular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_muerte_cardiovascular" id="dci_muerte_cardiovascular1" value="Sí" @if($renima->dci_muerte_cardiovascular == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_muerte_cardiovascular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_muerte_cardiovascular" id="dci_muerte_cardiovascular2" value="No" @if($renima->dci_muerte_cardiovascular == 'No') checked @endif>
                                <label class="form-check-label" for="dci_muerte_cardiovascular2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_muerte_cardiovascular_alta" class="form-label mb-0">Fecha de muerte cardiovascular</label>
                        <input type="date" name="dci_fecha_muerte_cardiovascular_alta" class="form-control" id="dci_fecha_muerte_cardiovascular_alta" value="{{ $renima->dci_fecha_muerte_cardiovascular_alta }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_muerte_no_cardiovascular1" class="form-label mb-0">Muerte no cardiovascular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_muerte_no_cardiovascular" id="dci_muerte_no_cardiovascular1" value="Sí" @if($renima->dci_muerte_no_cardiovascular == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_muerte_no_cardiovascular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_muerte_no_cardiovascular" id="dci_muerte_no_cardiovascular2" value="No" @if($renima->dci_muerte_no_cardiovascular == 'No') checked @endif>
                                <label class="form-check-label" for="dci_muerte_no_cardiovascular2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_muerte_no_cardiovascular_alta" class="form-label mb-0">Fecha de muerte no cardiovascular</label>
                        <input type="date" name="dci_fecha_muerte_no_cardiovascular_alta" class="form-control" id="dci_fecha_muerte_no_cardiovascular_alta" value="{{ $renima->dci_fecha_muerte_no_cardiovascular_alta }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_angina_postinfarto1" class="form-label mb-0">Angina postinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_angina_postinfarto" id="dci_angina_postinfarto1" value="Sí" @if($renima->dci_angina_postinfarto == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_angina_postinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_angina_postinfarto" id="dci_angina_postinfarto2" value="No" @if($renima->dci_angina_postinfarto == 'No') checked @endif>
                                <label class="form-check-label" for="dci_angina_postinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_angina_postinfarto" class="form-label mb-0">Fecha de angina postinfarto</label>
                        <input type="date" name="dci_fecha_angina_postinfarto" class="form-control" id="dci_fecha_angina_postinfarto" value="{{ $renima->dci_fecha_angina_postinfarto }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_reinfarto1" class="form-label mb-0">Reinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_reinfarto" id="dci_reinfarto1" value="Sí" @if($renima->dci_reinfarto == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_reinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_reinfarto" id="dci_reinfarto2" value="No" @if($renima->dci_reinfarto == 'No') checked @endif>
                                <label class="form-check-label" for="dci_reinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_reinfarto" class="form-label mb-0">Fecha de reinfarto</label>
                        <input type="date" name="dci_fecha_reinfarto" class="form-control" id="dci_fecha_reinfarto" value="{{ $renima->dci_fecha_reinfarto }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_acv1" class="form-label mb-0">ACV</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_acv" id="dci_acv1" value="TIA" @if($renima->dci_acv == 'TIA') checked @endif>
                                <label class="form-check-label" for="dci_acv1">TIA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_acv" id="dci_acv2" value="Isquemico" @if($renima->dci_acv == 'Isquemico') checked @endif>
                                <label class="form-check-label" for="dci_acv2">Isquemico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_acv" id="dci_acv3" value="Hemorragico" @if($renima->dci_acv == 'Hemorragico') checked @endif>
                                <label class="form-check-label" for="dci_acv3">Hemorragico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_acv" id="dci_acv4" value="No" @if($renima->dci_acv == 'No') checked @endif>
                                <label class="form-check-label" for="dci_acv4">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_acv_alta" class="form-label mb-0">Fecha de ACV</label>
                        <input type="date" name="dci_fecha_acv_alta" class="form-control" id="dci_fecha_acv_alta" value="{{ $renima->dci_fecha_acv_alta }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_sangrado1" class="form-label mb-0">Sangrado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado" id="dci_sangrado1" value="Sí" @if($renima->dci_sangrado == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_sangrado1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado" id="dci_sangrado2" value="No" @if($renima->dci_sangrado == 'No') checked @endif>
                                <label class="form-check-label" for="dci_sangrado2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_sangrado_segun_barc0" class="form-label mb-0">Sangrado según BARC:</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc" id="dci_sangrado_segun_barc0" value="0" @if($renima->dci_sangrado_segun_barc == '0') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc0">0</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc" id="dci_sangrado_segun_barc1" value="1" @if($renima->dci_sangrado_segun_barc == '1') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc" id="dci_sangrado_segun_barc2" value="2" @if($renima->dci_sangrado_segun_barc == '2') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc" id="dci_sangrado_segun_barc3" value="3" @if($renima->dci_sangrado_segun_barc == '3') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc" id="dci_sangrado_segun_barc4" value="4" @if($renima->dci_sangrado_segun_barc == '4') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc" id="dci_sangrado_segun_barc5" value="5" @if($renima->dci_sangrado_segun_barc == '5') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc5">5</label>
                            </div>
                        </div>

                        <div class="form-control radioptions mt-1 @if($renima->dci_sangrado_segun_barc == '3' || $renima->dci_sangrado_segun_barc == '5') @else d-none @endif" id="div_dci_sangrado_segun_barc_tipo">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc_tipo" id="dci_sangrado_segun_barc_tipo1" value="A" @if($renima->dci_sangrado_segun_barc_tipo == 'A') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc_tipo1">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc_tipo" id="dci_sangrado_segun_barc_tipo2" value="B" @if($renima->dci_sangrado_segun_barc_tipo == 'B') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc_tipo2">B</label>
                            </div>
                            <div class="form-check form-check-inline @if($renima->dci_sangrado_segun_barc == '5') d-none @endif" id="div_dci_sangrado_segun_barc_tipo3">
                                <input class="form-check-input" type="radio" name="dci_sangrado_segun_barc_tipo" id="dci_sangrado_segun_barc_tipo3" value="C" @if($renima->dci_sangrado_segun_barc_tipo == 'C') checked @endif>
                                <label class="form-check-label" for="dci_sangrado_segun_barc_tipo3">C</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_sangrado" class="form-label mb-0">Fecha de sangrado</label>
                        <input type="date" name="dci_fecha_sangrado" class="form-control" id="dci_fecha_sangrado" value="{{ $renima->dci_fecha_sangrado }}">
                    </div>

                    <div class="col-md-6"></div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_shock_cardiogenico1" class="form-label mb-0">Shock Cardiogenico <small class="text-danger">(tipo SCAI)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_shock_cardiogenico" id="dci_shock_cardiogenico1" value="A" @if($renima->dci_shock_cardiogenico == 'A') checked @endif>
                                <label class="form-check-label" for="dci_shock_cardiogenico1">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_shock_cardiogenico" id="dci_shock_cardiogenico2" value="B" @if($renima->dci_shock_cardiogenico == 'B') checked @endif>
                                <label class="form-check-label" for="dci_shock_cardiogenico2">B</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_shock_cardiogenico" id="dci_shock_cardiogenico3" value="C" @if($renima->dci_shock_cardiogenico == 'C') checked @endif>
                                <label class="form-check-label" for="dci_shock_cardiogenico3">C</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_shock_cardiogenico" id="dci_shock_cardiogenico4" value="D" @if($renima->dci_shock_cardiogenico == 'D') checked @endif>
                                <label class="form-check-label" for="dci_shock_cardiogenico4">D</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_shock_cardiogenico" id="dci_shock_cardiogenico5" value="E" @if($renima->dci_shock_cardiogenico == 'E') checked @endif>
                                <label class="form-check-label" for="dci_shock_cardiogenico5">E</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_shock_cardiogenico" id="dci_shock_cardiogenico6" value="No" @if($renima->dci_shock_cardiogenico == 'No') checked @endif>
                                <label class="form-check-label" for="dci_shock_cardiogenico6">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_shock_cardiogenico" class="form-label mb-0">Fecha de Dx. de Shock Cardiogenico</label>
                        <input type="date" name="dci_fecha_shock_cardiogenico" class="form-control" id="dci_fecha_shock_cardiogenico" value="{{ $renima->dci_fecha_shock_cardiogenico }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_paro_cardiorespiratorio_recuperado1" class="form-label mb-0">Paro Cardio Respiratorio Recuperado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_paro_cardiorespiratorio_recuperado" id="dci_paro_cardiorespiratorio_recuperado1" value="TV/FV" @if($renima->dci_paro_cardiorespiratorio_recuperado == 'TV/FV') checked @endif>
                                <label class="form-check-label" for="dci_paro_cardiorespiratorio_recuperado1">TV/FV</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_paro_cardiorespiratorio_recuperado" id="dci_paro_cardiorespiratorio_recuperado2" value="Asistolia" @if($renima->dci_paro_cardiorespiratorio_recuperado == 'Asistolia') checked @endif>
                                <label class="form-check-label" for="dci_paro_cardiorespiratorio_recuperado2">Asistolia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_paro_cardiorespiratorio_recuperado" id="dci_paro_cardiorespiratorio_recuperado3" value="AESP" @if($renima->dci_paro_cardiorespiratorio_recuperado == 'AESP') checked @endif>
                                <label class="form-check-label" for="dci_paro_cardiorespiratorio_recuperado3">AESP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_paro_cardiorespiratorio_recuperado" id="dci_paro_cardiorespiratorio_recuperado4" value="No" @if($renima->dci_paro_cardiorespiratorio_recuperado == 'No') checked @endif>
                                <label class="form-check-label" for="dci_paro_cardiorespiratorio_recuperado4">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_paro_cardiorespiratorio_recuperado" class="form-label mb-0">Fecha de Paro Cardio Respiratorio Recuperado</label>
                        <input type="date" name="dci_fecha_paro_cardiorespiratorio_recuperado" class="form-control" id="dci_fecha_paro_cardiorespiratorio_recuperado" value="{{ $renima->dci_fecha_paro_cardiorespiratorio_recuperado }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_ruptura_musculo_papilar1" class="form-label mb-0">Ruptura de Musculo Papilar</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_ruptura_musculo_papilar" id="dci_ruptura_musculo_papilar1" value="Sí" @if($renima->dci_ruptura_musculo_papilar == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_ruptura_musculo_papilar1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_ruptura_musculo_papilar" id="dci_ruptura_musculo_papilar2" value="No" @if($renima->dci_ruptura_musculo_papilar == 'No') checked @endif>
                                <label class="form-check-label" for="dci_ruptura_musculo_papilar2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_ruptura_musculo_papilar" class="form-label mb-0">Fecha de Dx. de Ruptura de Musculo Papilar</label>
                        <input type="date" name="dci_fecha_ruptura_musculo_papilar" class="form-control" id="dci_fecha_ruptura_musculo_papilar" value="{{ $renima->dci_fecha_ruptura_musculo_papilar }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_comunicacion_interventricular1" class="form-label mb-0">Comunicación ínterventricular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_comunicacion_interventricular" id="dci_comunicacion_interventricular1" value="Sí" @if($renima->dci_comunicacion_interventricular == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_comunicacion_interventricular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_comunicacion_interventricular" id="dci_comunicacion_interventricular2" value="No" @if($renima->dci_comunicacion_interventricular == 'No') checked @endif>
                                <label class="form-check-label" for="dci_comunicacion_interventricular2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_comunicacion_interventricular" class="form-label mb-0">Fecha de Dx. de Comunicación ínterventricular</label>
                        <input type="date" name="dci_fecha_comunicacion_interventricular" class="form-control" id="dci_fecha_comunicacion_interventricular" value="{{ $renima->dci_fecha_comunicacion_interventricular }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_ruptura_pared_libre1" class="form-label mb-0">Ruptura de Pared Libre</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_ruptura_pared_libre" id="dci_ruptura_pared_libre1" value="Sí" @if($renima->dci_ruptura_pared_libre == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_ruptura_pared_libre1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_ruptura_pared_libre" id="dci_ruptura_pared_libre2" value="No" @if($renima->dci_ruptura_pared_libre == 'No') checked @endif>
                                <label class="form-check-label" for="dci_ruptura_pared_libre2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_ruptura_pared_libre" class="form-label mb-0">Fecha de Dx. de Ruptura pared libre</label>
                        <input type="date" name="dci_fecha_ruptura_pared_libre" class="form-control" id="dci_fecha_ruptura_pared_libre" value="{{ $renima->dci_fecha_ruptura_pared_libre }}">
                    </div>

                    
                    <div class="col-md-6 mb-2">
                        <label for="dci_aneurisma_ventricular1" class="form-label mb-0">Aneurisma Ventricular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_aneurisma_ventricular" id="dci_aneurisma_ventricular1" value="Sí" @if($renima->dci_aneurisma_ventricular == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_aneurisma_ventricular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_aneurisma_ventricular" id="dci_aneurisma_ventricular2" value="No" @if($renima->dci_aneurisma_ventricular == 'No') checked @endif>
                                <label class="form-check-label" for="dci_aneurisma_ventricular2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_aneurisma_ventricular" class="form-label mb-0">Fecha de Aneurisma Ventricular</label>
                        <input type="date" name="dci_fecha_aneurisma_ventricular" class="form-control" id="dci_fecha_aneurisma_ventricular" value="{{ $renima->dci_fecha_aneurisma_ventricular }}">
                    </div>
                    

                    <div class="col-md-6 mb-2">
                        <label for="dci_trombosis_stent1" class="form-label mb-0">Trombosis de stent</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_trombosis_stent" id="dci_trombosis_stent1" value="Sí" @if($renima->dci_trombosis_stent == 'Sí') checked @endif>
                                <label class="form-check-label" for="dci_trombosis_stent1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dci_trombosis_stent" id="dci_trombosis_stent2" value="No" @if($renima->dci_trombosis_stent == 'No') checked @endif>
                                <label class="form-check-label" for="dci_trombosis_stent2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_trombosis_stent" class="form-label mb-0">Fecha de trombosis de stent</label>
                        <input type="date" name="dci_fecha_trombosis_stent" class="form-control" id="dci_fecha_trombosis_stent" value="{{ $renima->dci_fecha_trombosis_stent }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_fecha_de_alta" class="form-label mb-0">Fecha de Alta </label>
                        <input type="date" name="dci_fecha_de_alta" class="form-control" id="dci_fecha_de_alta" value="{{ $renima->dci_fecha_de_alta }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dci_dias_hospitalizacion" class="form-label mb-0">Dias de Hospitalización </label>
                        <input type="number" name="dci_dias_hospitalizacion" class="form-control" id="dci_dias_hospitalizacion" readonly value="{{ $renima->dci_dias_hospitalizacion }}">
                        <small class="infotext">Fecha de Alta - Fecha y hora de llegada al centro del primer contacto médico</small>
                    </div>

                </div>
            </div>
        </div>

        <!--Medicación al Alta-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Medicación al Alta</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="ma_aspirina1" class="form-label mb-0">Aspirina</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_aspirina" id="ma_aspirina1" value="Sí" @if($renima->ma_aspirina == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_aspirina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_aspirina" id="ma_aspirina2" value="No" @if($renima->ma_aspirina == 'No') checked @endif>
                                <label class="form-check-label" for="ma_aspirina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_ip2y121" class="form-label mb-0">IP2Y12</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ip2y12" id="ma_ip2y121" value="Clopidogrel" @if($renima->ma_ip2y12 == 'Clopidogrel') checked @endif>
                                <label class="form-check-label" for="ma_ip2y121">Clopidogrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ip2y12" id="ma_ip2y122" value="Prasugrel" @if($renima->ma_ip2y12 == 'Prasugrel') checked @endif>
                                <label class="form-check-label" for="ma_ip2y122">Prasugrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ip2y12" id="ma_ip2y123" value="Ticagrelor" @if($renima->ma_ip2y12 == 'Ticagrelor') checked @endif>
                                <label class="form-check-label" for="ma_ip2y123">Ticagrelor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ip2y12" id="ma_ip2y124" value="No" @if($renima->ma_ip2y12 == 'No') checked @endif>
                                <label class="form-check-label" for="ma_ip2y124">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_estatinas1" class="form-label mb-0">Estatinas</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_estatinas" id="ma_estatinas1" value="Sí" @if($renima->ma_estatinas == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_estatinas1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_estatinas" id="ma_estatinas2" value="No" @if($renima->ma_estatinas == 'No') checked @endif>
                                <label class="form-check-label" for="ma_estatinas2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_betabloqueadores1" class="form-label mb-0">Betabloqueadores </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_betabloqueadores" id="ma_betabloqueadores1" value="Sí" @if($renima->ma_betabloqueadores == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_betabloqueadores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_betabloqueadores" id="ma_betabloqueadores2" value="No" @if($renima->ma_betabloqueadores == 'No') checked @endif>
                                <label class="form-check-label" for="ma_betabloqueadores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_diureticos_asa1" class="form-label mb-0">Diuréticos de asa </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_diureticos_asa" id="ma_diureticos_asa1" value="Sí" @if($renima->ma_diureticos_asa == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_diureticos_asa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_diureticos_asa" id="ma_diureticos_asa2" value="No" @if($renima->ma_diureticos_asa == 'No') checked @endif>
                                <label class="form-check-label" for="ma_diureticos_asa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_antagonistas_mineralocorticoide1" class="form-label mb-0">Antagonistas de mineralocorticoides </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_antagonistas_mineralocorticoide" id="ma_antagonistas_mineralocorticoide1" value="Sí" @if($renima->ma_antagonistas_mineralocorticoide == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_antagonistas_mineralocorticoide1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_antagonistas_mineralocorticoide" id="ma_antagonistas_mineralocorticoide2" value="No" @if($renima->ma_antagonistas_mineralocorticoide == 'No') checked @endif>
                                <label class="form-check-label" for="ma_antagonistas_mineralocorticoide2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_ieca_ara1" class="form-label mb-0">IECA/ARA </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ieca_ara" id="ma_ieca_ara1" value="Sí" @if($renima->ma_ieca_ara == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_ieca_ara1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ieca_ara" id="ma_ieca_ara2" value="No" @if($renima->ma_ieca_ara == 'No') checked @endif>
                                <label class="form-check-label" for="ma_ieca_ara2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_inhibidores_p2y121" class="form-label mb-0">Inhibidores del receptor P2Y12 </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_inhibidores_p2y12" id="ma_inhibidores_p2y121" value="Sí" @if($renima->ma_inhibidores_p2y12 == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_inhibidores_p2y121">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_inhibidores_p2y12" id="ma_inhibidores_p2y122" value="No" @if($renima->ma_inhibidores_p2y12 == 'No') checked @endif>
                                <label class="form-check-label" for="ma_inhibidores_p2y122">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ma_nitratos1" class="form-label mb-0">Nitratos </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_nitratos" id="ma_nitratos1" value="Sí" @if($renima->ma_nitratos == 'Sí') checked @endif>
                                <label class="form-check-label" for="ma_nitratos1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_nitratos" id="ma_nitratos2" value="No" @if($renima->ma_nitratos == 'No') checked @endif>
                                <label class="form-check-label" for="ma_nitratos2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_anticoagulacion" class="form-label mb-0">Anticoagulación </label>
                        <select class="form-control" name="ma_anticoagulacion" id="ma_anticoagulacion">
                            <option value="" @if($renima->ma_anticoagulacion == '') selected @endif>Seleccione...</option>
                            <option value="Warfarina" @if($renima->ma_anticoagulacion == 'Warfarina') selected @endif>Warfarina</option>
                            <option value="Apixaban" @if($renima->ma_anticoagulacion == 'Apixaban') selected @endif>Apixaban</option>
                            <option value="Dabigatran" @if($renima->ma_anticoagulacion == 'Dabigatran') selected @endif>Dabigatran</option>
                            <option value="Rivaroxaban" @if($renima->ma_anticoagulacion == 'Rivaroxaban') selected @endif>Rivaroxaban</option>
                            <option value="Edoxaban" @if($renima->ma_anticoagulacion == 'Edoxaban') selected @endif>Edoxaban</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ma_otros" class="form-label mb-0">Otros </label>
                        <input type="text" name="ma_otros" class="form-control" id="ma_otros" placeholder="Especificar" value="{{ $renima->ma_otros }}">
                    </div>

                </div>
            </div>
        </div>

        <!--Seguimiento Clínico Luego del Alta-->
        <div class="card shadow mb-4">
            <div class="card-header bg-danger py-3">
                <h6 class="m-0 font-weight-bold text-white">Seguimiento Clínico Luego del Alta</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="sc_muerte_cardiovascular1" class="form-label mb-0">Muerte cardiovascular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_cardiovascular" id="sc_muerte_cardiovascular1" value="Sí" @if($renima->sc_muerte_cardiovascular == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_muerte_cardiovascular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_cardiovascular" id="sc_muerte_cardiovascular2" value="No"  @if($renima->sc_muerte_cardiovascular == 'No') checked @endif>
                                <label class="form-check-label" for="sc_muerte_cardiovascular2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_muerte_cardiovascular" class="form-label mb-0">Fecha de muerte cardiovascular</label>
                        <input type="date" name="sc_fecha_muerte_cardiovascular" class="form-control" id="sc_fecha_muerte_cardiovascular" value="{{ $renima->sc_fecha_muerte_cardiovascular }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_muerte_no_cardiovascular1" class="form-label mb-0">Muerte no cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_no_cardiovascular" id="sc_muerte_no_cardiovascular1" value="Sí" @if($renima->sc_muerte_no_cardiovascular == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_muerte_no_cardiovascular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_no_cardiovascular" id="sc_muerte_no_cardiovascular2" value="No" @if($renima->sc_muerte_no_cardiovascular == 'No') checked @endif>
                                <label class="form-check-label" for="sc_muerte_no_cardiovascular2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_muerte_no_cardiovascular" class="form-label mb-0">Fecha de muerte no cardiovascular</label>
                        <input type="date" name="sc_fecha_muerte_no_cardiovascular" class="form-control" id="sc_fecha_muerte_no_cardiovascular" value="{{ $renima->sc_fecha_muerte_no_cardiovascular }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_angina_postinfarto1" class="form-label mb-0">Angina postinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_angina_postinfarto" id="sc_angina_postinfarto1" value="Sí" @if($renima->sc_angina_postinfarto == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_angina_postinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_angina_postinfarto" id="sc_angina_postinfarto2" value="No" @if($renima->sc_angina_postinfarto == 'No') checked @endif>
                                <label class="form-check-label" for="sc_angina_postinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_angina_postinfarto" class="form-label mb-0">Fecha de angina postinfarto</label>
                        <input type="date" name="sc_fecha_angina_postinfarto" class="form-control" id="sc_fecha_angina_postinfarto" value="{{ $renima->sc_fecha_angina_postinfarto }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_reinfarto1" class="form-label mb-0">Reinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_reinfarto" id="sc_reinfarto1" value="Sí" @if($renima->sc_reinfarto == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_reinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_reinfarto" id="sc_reinfarto2" value="No" @if($renima->sc_reinfarto == 'No') checked @endif>
                                <label class="form-check-label" for="sc_reinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_reinfarto" class="form-label mb-0">Fecha de reinfarto</label>
                        <input type="date" name="sc_fecha_reinfarto" class="form-control" id="sc_fecha_reinfarto" value="{{ $renima->sc_fecha_reinfarto }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_acv1" class="form-label mb-0">ACV</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_acv" id="sc_acv1" value="TIA" @if($renima->sc_acv == 'TIA') checked @endif>
                                <label class="form-check-label" for="sc_acv1">TIA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_acv" id="sc_acv2" value="Isquemico" @if($renima->sc_acv == 'Isquemico') checked @endif>
                                <label class="form-check-label" for="sc_acv2">Isquemico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_acv" id="sc_acv3" value="Hemorragico" @if($renima->sc_acv == 'Hemorragico') checked @endif>
                                <label class="form-check-label" for="sc_acv3">Hemorragico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_acv" id="sc_acv4" value="No" @if($renima->sc_acv == 'No') checked @endif>
                                <label class="form-check-label" for="sc_acv4">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_acv" class="form-label mb-0">Fecha de ACV</label>
                        <input type="date" name="sc_fecha_acv" class="form-control" id="sc_fecha_acv" value="{{ $renima->sc_fecha_acv }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="sc_rehospitalizacion_falla_cardiaca1" class="form-label mb-0">Rehospitalización por falla cardiaca</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_rehospitalizacion_falla_cardiaca" id="sc_rehospitalizacion_falla_cardiaca1" value="Sí" @if($renima->sc_rehospitalizacion_falla_cardiaca == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_rehospitalizacion_falla_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_rehospitalizacion_falla_cardiaca" id="sc_rehospitalizacion_falla_cardiaca2" value="No" @if($renima->sc_rehospitalizacion_falla_cardiaca == 'No') checked @endif>
                                <label class="form-check-label" for="sc_rehospitalizacion_falla_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_rehospitalizacion_falla_cardiaca" class="form-label mb-0">Fecha de rehospitalización por falla cardiaca</label>
                        <input type="date" name="sc_fecha_rehospitalizacion_falla_cardiaca" class="form-control" id="sc_fecha_rehospitalizacion_falla_cardiaca" value="{{ $renima->sc_fecha_rehospitalizacion_falla_cardiaca }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_sangrado1" class="form-label mb-0">Sangrado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado" id="sc_sangrado1" value="Sí" @if($renima->sc_sangrado == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_sangrado1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado" id="sc_sangrado2" value="No" @if($renima->sc_sangrado == 'No') checked @endif>
                                <label class="form-check-label" for="sc_sangrado2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_sangrado_segun_barc1" class="form-label mb-0">Sangrado según BARC:</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc1" value="1" @if($renima->sc_sangrado_segun_barc == '1') checked @endif>
                                <label class="form-check-label" for="sc_sangrado_segun_barc1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc2" value="2" @if($renima->sc_sangrado_segun_barc == '2') checked @endif>
                                <label class="form-check-label" for="sc_sangrado_segun_barc2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc3" value="3" @if($renima->sc_sangrado_segun_barc == '3') checked @endif>
                                <label class="form-check-label" for="sc_sangrado_segun_barc3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc4" value="4" @if($renima->sc_sangrado_segun_barc == '4') checked @endif>
                                <label class="form-check-label" for="sc_sangrado_segun_barc4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc5" value="5" @if($renima->sc_sangrado_segun_barc == '5') checked @endif>
                                <label class="form-check-label" for="sc_sangrado_segun_barc5">5</label>
                            </div>
                        </div>

                        <div class="form-control radioptions mt-1 @if($renima->sc_sangrado_segun_barc == '3' || $renima->sc_sangrado_segun_barc == '5') @else checked @endif" id="dv_sc_sangrado_barc_tipo">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo1" value="A" @if($renima->sc_sangrado_barc_tipo == 'A') checked @endif>
                                <label class="form-check-label" for="sc_sangrado_barc_tipo1">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo2" value="B" @if($renima->sc_sangrado_barc_tipo == 'B') checked @endif>
                                <label class="form-check-label" for="sc_sangrado_barc_tipo2">B</label>
                            </div>
                            <div class="form-check form-check-inline @if($renima->sc_sangrado_segun_barc == '5') d-none @endif)" id="dv_sc_sangrado_barc_tipo3" @if($renima->sc_sangrado_barc_tipo == 'C') checked @endif>
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo3" value="C">
                                <label class="form-check-label" for="sc_sangrado_barc_tipo3">C</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_sangrado" class="form-label mb-0">Fecha de sangrado</label>
                        <input type="date" name="sc_fecha_sangrado" class="form-control" id="sc_fecha_sangrado" value="{{ $renima->sc_fecha_sangrado }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_prc" class="form-label mb-0">Programa de Rehabilitacion Cardiaca</label>
                        <select name="sc_prc" id="sc_prc" class="form-control">
                            <option value="No" @if($renima->sc_prc == 'No') selected @endif>No</option>
                            <option value="Completo programa" @if($renima->sc_prc == 'Completo programa') selected @endif>Completo programa</option>
                            <option value="No completo programa" @if($renima->sc_prc == 'No completo programa') selected @endif>No completo programa</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_segunda_medicion_fevi_alta" class="form-label mb-0">Segunda medición de fracción de eyección ventricular izquierda<small class="text-danger">(%)</small></label>
                        <input type="number" name="sc_segunda_medicion_fevi_alta" class="form-control" id="sc_segunda_medicion_fevi_alta" value="{{ $renima->sc_segunda_medicion_fevi_alta }}">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_segunda_fevi_alta" class="form-label mb-0">Fecha de segunda medición de fracción de eyección ventricular izquierda</label>
                        <input type="date" name="sc_fecha_segunda_fevi_alta" class="form-control" id="sc_fecha_segunda_fevi_alta" value="{{ $renima->sc_fecha_segunda_fevi_alta }}">
                    </div> 
                    <div class="col-md-6 mb-2">
                        <label for="sc_reestenosis_stent1" class="form-label mb-0">Re-estenosis de stent</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_reestenosis_stent" id="sc_reestenosis_stent1" value="Sí" @if($renima->sc_reestenosis_stent == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_reestenosis_stent1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_reestenosis_stent" id="sc_reestenosis_stent2" value="No" @if($renima->sc_reestenosis_stent == 'No') checked @endif>
                                <label class="form-check-label" for="sc_reestenosis_stent2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_reestenosis_stent" class="form-label mb-0">Fecha de re-estenosis de stent</label>
                        <input type="date" name="sc_fecha_reestenosis_stent" class="form-control" id="sc_fecha_reestenosis_stent" value="{{ $renima->sc_fecha_reestenosis_stent }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="sc_trombosis_stent1" class="form-label mb-0">Trombosis de stent</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_trombosis_stent" id="sc_trombosis_stent1" value="Sí" @if($renima->sc_trombosis_stent == 'Sí') checked @endif>
                                <label class="form-check-label" for="sc_trombosis_stent1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_trombosis_stent" id="sc_trombosis_stent2" value="No" @if($renima->sc_trombosis_stent == 'No') checked @endif>
                                <label class="form-check-label" for="sc_trombosis_stent2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_trombosis_stent" class="form-label mb-0">Fecha de trombosis de stent</label>
                        <input type="date" name="sc_fecha_trombosis_stent" class="form-control" id="sc_fecha_trombosis_stent" value="{{ $renima->sc_fecha_trombosis_stent }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- boton cancel y Submit -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    @if($renima->ru_is_completed == '1')
                        <div class="col-md-12 mb-2 mb-sm-0">
                            <p class="mb-0">
                                <strong>Ya no puede editar el formulario, marcaste que ya completaste los datos de tu paciente.</strong><br>
                                <strong>Fecha de creación:</strong> {{ $renima->created_at->format('d/m/Y H:i') }} <br>
                                <strong>Última modificación:</strong> {{ $renima->updated_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    @else
                        <div class="col-md-8 mb-2 mb-sm-0">
                            <div class="form-check">
                                <input type="hidden" name="is_completed" value="0">
                                <input class="form-check-input" type="checkbox" value="1" id="is_completed" name="is_completed" @if($renima->ru_is_completed) checked @endif>
                                <label class="form-check-label" for="is_completed" style="margin-top: 2px;">
                                    He completado los datos de mi paciente. <small class="text-danger">(Recuerde que no podrá editar el formulario) {{$renima->ru_is_completed}}</small>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2 mb-sm-0 text-right">
                            <a href="{{ route('renima.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
                            <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Guardar</button>
                        </div>
                    @endif

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

    //Tipo de seguro
    const it_tipoetiologia = document.getElementsByName('de_tipo_seguro');
    const de_tipo_seguro_otro = document.getElementById('de_tipo_seguro_otro');
    it_tipoetiologia.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const isOtro = this.value === 'Otro';
            de_tipo_seguro_otro.classList.toggle('d-none', !isOtro);
            if (!isOtro) de_tipo_seguro_otro.value = '';
        });
    });

    //Antecedentes
    const de_antecedentes21 = document.getElementById('dc_antecedentes20');
    const de_antecedentes_otro = document.getElementById('dc_otro_antecedentes');
    de_antecedentes21.addEventListener('change', function() {
        de_antecedentes_otro.classList.toggle('d-none', !this.checked);
    })

    //Tiempo desde el inicio de síntomas al primer contacto médico
    const ea_tiempo_ispc = document.getElementById('ea_tiempo_ispc');
    const ea_fecha_pcm = document.getElementById('ea_fecha_pcm');
    const ea_hora_pcm = document.getElementById('ea_hora_pcm');
    const ea_fecha_iniciosintomas = document.getElementById('ea_fecha_iniciosintomas');
    const ea_hora_iniciosintomas = document.getElementById('ea_hora_iniciosintomas');
    function calcularTiempoDesdeSintomas() {
        const fechaPrimerContacto = new Date(ea_fecha_pcm.value + 'T' + ea_hora_pcm.value);
        const fechaInicioSintomas = new Date(ea_fecha_iniciosintomas.value + 'T' + ea_hora_iniciosintomas.value);

        if (!isNaN(fechaPrimerContacto) && !isNaN(fechaInicioSintomas)) {
            const diff = fechaPrimerContacto - fechaInicioSintomas;
            const minutos = Math.floor(diff / 1000 / 60);
            ea_tiempo_ispc.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            ea_tiempo_ispc.value = ''; // Limpiar el campo si hay un error
        }
    }
    // Agregar eventos
    const inputs = [ea_fecha_pcm, ea_hora_pcm, ea_fecha_iniciosintomas, ea_hora_iniciosintomas];
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoDesdeSintomas);
    });


    //Tiempo desde el primer contacto médico hasta el ECG
    const ea_tpc_ecg = document.getElementById('ea_tpc_ecg');
    const ea_fecha_ecg = document.getElementById('ea_fecha_ecg');
    const ea_hora_ecg = document.getElementById('ea_hora_ecg');
    function calcularTiempoPrimerContactoECG() {
        const fechaECG = new Date(ea_fecha_ecg.value + 'T' + ea_hora_ecg.value);
        const fechaPrimerContacto = new Date(ea_fecha_pcm.value + 'T' + ea_hora_pcm.value);

        if (!isNaN(fechaECG) && !isNaN(fechaPrimerContacto)) {
            const diff = fechaECG - fechaPrimerContacto;
            const minutos = Math.floor(diff / 1000 / 60);
            ea_tpc_ecg.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            ea_tpc_ecg.value = ''; // Limpiar el campo si hay un error
        }
    }
    // Agregar eventos
    inputs.push(ea_fecha_ecg, ea_hora_ecg);
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoPrimerContactoECG);
    });

    //Al hacer change dis_manejo
    const dis_manejo = document.getElementById('dis_manejo');
    const dv_dis_manejo_icpp_dosis = document.getElementById('dv_dis_manejo_icpp_dosis');
    const dv_dis_tf = document.getElementById('dv_dis_tf');
    const dv_dis_lugar_tf = document.getElementById('dv_dis_lugar_tf');
    const dv_dis_fecha_fibrinolisis = document.getElementById('dv_dis_fecha_fibrinolisis');
    const dv_dis_tiempo_ecg_fibrinolisis = document.getElementById('dv_dis_tiempo_ecg_fibrinolisis');
    const dv_dis_tipofibrinolisis = document.getElementById('dv_dis_tipofibrinolisis');
    const dv_dis_fibrinolisis_exitosa = document.getElementById('dv_dis_fibrinolisis_exitosa');
    const dv_dis_angioplastia_rescate = document.getElementById('dv_dis_angioplastia_rescate');
    const dv_dis_fibrinolisis_suspendida = document.getElementById('dv_dis_fibrinolisis_suspendida');
    const dv_dis_causa_suspension = document.getElementById('dv_dis_causa_suspension');
    const textContent = document.getElementById('txtfecha_rest_tieisquim');

    dis_manejo.addEventListener('change', function() {
        //reset radio buttons dentro de los dv_
        const radios_dv_dis_manejo_icpp_dosis = document.querySelectorAll('#dv_dis_manejo_icpp_dosis input[type="radio"]');
        radios_dv_dis_manejo_icpp_dosis.forEach(radio => {
            radio.checked = false;
        });


        const radios_dv_dis_tf = document.querySelectorAll('#dv_dis_tf input[type="radio"]');
        radios_dv_dis_tf.forEach(radio => {
            radio.checked = false;
        });

        const selects_dv_dis_lugar_tf = document.querySelectorAll('#dv_dis_lugar_tf select');
        selects_dv_dis_lugar_tf.forEach(select => {
            select.value = '';
        });

        const inputs_dv_dis_fecha_fibrinolisis = document.querySelectorAll('#dv_dis_fecha_fibrinolisis input[type="date"], #dv_dis_fecha_fibrinolisis input[type="time"]');
        inputs_dv_dis_fecha_fibrinolisis.forEach(input => {
            input.value = '';
        });

        const inputs_dv_dis_tiempo_ecg_fibrinolisis = document.querySelectorAll('#dv_dis_tiempo_ecg_fibrinolisis input[type="number"]');
        inputs_dv_dis_tiempo_ecg_fibrinolisis.forEach(input => {
            input.value = '';
        });

        const checksbox_dv_dis_tipofibrinolisis = document.querySelectorAll('#dv_dis_tipofibrinolisis input[type="checkbox"]');
        checksbox_dv_dis_tipofibrinolisis.forEach(checkbox => {
            checkbox.checked = false;
        });

        const dis_tipofibrinolisis_otro = document.getElementById('dis_tipofibrinolisis_otro');
        //limpiar el campo de texto de otro tipo de fibrinolisis
        dis_tipofibrinolisis_otro.value = '';
        

        const radios_dv_dis_fibrinolisis_exitosa = document.querySelectorAll('#dv_dis_fibrinolisis_exitosa input[type="radio"]');
        radios_dv_dis_fibrinolisis_exitosa.forEach(radio => {
            radio.checked = false;
        });

        const radios_dv_dis_angioplastia_rescate = document.querySelectorAll('#dv_dis_angioplastia_rescate input[type="radio"]');
        radios_dv_dis_angioplastia_rescate.forEach(radio => {
            radio.checked = false;
        });

        const radios_dv_dis_fibrinolisis_suspendida = document.querySelectorAll('#dv_dis_fibrinolisis_suspendida input[type="radio"]');
        radios_dv_dis_fibrinolisis_suspendida.forEach(radio => {
            radio.checked = false;
        });

        const input_dv_dis_causa_suspension = document.querySelectorAll('#dv_dis_causa_suspension input[type="input"]');
        input_dv_dis_causa_suspension.forEach(input => {
            input.value = '';
        });

        if (this.value === 'Solo lisis' || this.value === 'Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)' || this.value === 'Farmacoinvasiva + ICP sistemática (> 24 horas)' || this.value === 'Lisis + ICP de Rescate') {
            dv_dis_tf.classList.remove('d-none');
            dv_dis_lugar_tf.classList.remove('d-none');
            dv_dis_fecha_fibrinolisis.classList.remove('d-none');
            dv_dis_tiempo_ecg_fibrinolisis.classList.remove('d-none');
            dv_dis_tipofibrinolisis.classList.remove('d-none');
            dv_dis_fibrinolisis_exitosa.classList.remove('d-none');
            dv_dis_angioplastia_rescate.classList.remove('d-none');
            dv_dis_fibrinolisis_suspendida.classList.remove('d-none');
            dv_dis_causa_suspension.classList.remove('d-none');
            txtfecha_rest_tieisquim.textContent = 'Fecha y hora de fibrinólisis';
        } else {
            dv_dis_tf.classList.add('d-none');
            dv_dis_lugar_tf.classList.add('d-none');
            dv_dis_fecha_fibrinolisis.classList.add('d-none');
            dv_dis_tiempo_ecg_fibrinolisis.classList.add('d-none');
            dv_dis_tipofibrinolisis.classList.add('d-none');
            dv_dis_fibrinolisis_exitosa.classList.add('d-none');
            dv_dis_angioplastia_rescate.classList.add('d-none');
            dv_dis_fibrinolisis_suspendida.classList.add('d-none');
            dv_dis_causa_suspension.classList.add('d-none');
            txtfecha_rest_tieisquim.textContent = 'Fecha y hora de inicio de ICP';

            if(this.value === 'Solo tratamiento médico') {
                const dis_puntaje_grace = document.getElementById('dis_puntaje_grace');
                //focus
                dis_puntaje_grace.focus();
            }
        }


        if(this.value == 'Solo lisis' || this.value == 'Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)' || this.value == 'Farmacoinvasiva + ICP sistemática (> 24 horas)' || this.value == 'Lisis + ICP de Rescate'){
            dv_dis_manejo_icpp_dosis.classList.remove('d-none');
        }else{
            dv_dis_manejo_icpp_dosis.classList.add('d-none');
        }

        calcularTiempoTotalIsquemia();
    });

    //Activar Dis Dosis check box name'dis_tipofibrinolisis[]'
    const dis_tipofibrinolisis = document.getElementsByName('dis_tipofibrinolisis[]');
    dv_dis_tipofibrinolisis_dosis = document.getElementById('dv_dis_tipofibrinolisis_dosis');
    dis_tipofibrinolisis.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            dv_dis_tipofibrinolisis_dosis.classList.toggle('d-none', !this.checked);
        });
    });



    //Al hacer change en ea_diagnostico
    const ea_diagnostico = document.getElementById('ea_diagnostico');
    const dv_ea_diagnostico_st = document.getElementById('dv_ea_diagnostico_st');
    const dv_ea_evaluacion_riesgo = document.getElementById('dv_ea_evaluacion_riesgo');
    const dv_ea_heart_score = document.getElementById('dv_ea_heart_score');

    ea_diagnostico.addEventListener('change', function() {
        //reset radio buttons dentro de los dv_
        const radios_dv_ea_diagnostico_st = document.querySelectorAll('#dv_ea_diagnostico_st input[type="radio"]');
        radios_dv_ea_diagnostico_st.forEach(radio => {
            radio.checked = false;
        });

        const radios_dv_ea_evaluacion_riesgo = document.querySelectorAll('#dv_ea_evaluacion_riesgo input[type="radio"]');
        radios_dv_ea_evaluacion_riesgo.forEach(radio => {
            radio.checked = false;
        });

        const selects_dv_ea_heart_score = document.querySelectorAll('#dv_ea_heart_score select');
        selects_dv_ea_heart_score.forEach(select => {
            select.value = '';
        });

        if (this.value === 'Sindrome coronario agudo ST no elevado') {
            dv_ea_diagnostico_st.classList.remove('d-none');
            dv_ea_evaluacion_riesgo.classList.remove('d-none');
            dv_ea_heart_score.classList.remove('d-none');
            
        }else{
            dv_ea_diagnostico_st.classList.add('d-none');
            dv_ea_evaluacion_riesgo.classList.add('d-none');
            dv_ea_heart_score.classList.add('d-none');
        }
    });

    //Calcular IMC
    const dc_peso = document.getElementById('dc_peso');
    const dc_talla = document.getElementById('dc_talla');
    const dc_imc = document.getElementById('dc_imc');
    function calcularIMC() {
        // Asegurarse de que la altura no sea cero para evitar división por cero
        if(dc_talla.value <= 0){
            dc_imc.value = '';
            return;
        }

        // Calcular el IMC
        const imc = dc_peso.value / (dc_talla.value ** 2);

        // Mostrar el resultado en el campo de texto
        dc_imc.value = imc.toFixed(2);

    }
    // Agregar eventos
    [dc_peso, dc_talla].forEach(input => {
        input.addEventListener('keyup', calcularIMC);
    });

    const dis_lugar_tf = document.getElementById('dis_lugar_tf');
    const dis_lugar_tf_otro = document.getElementById('dis_lugar_tf_otro');
    dis_lugar_tf.addEventListener('change', function() {
        const isOtro = this.value === 'Otro';
        dis_lugar_tf_otro.classList.toggle('d-none', !isOtro);
        if (!isOtro) dis_lugar_tf_otro.value = '';
    });


    //Tiempo desde el ECG hasta fibrinólisis
    const dis_tiempo_ecg_fibrinolisis = document.getElementById('dis_tiempo_ecg_fibrinolisis');
    const dis_fecha_fibrinolisis = document.getElementById('dis_fecha_fibrinolisis');
    const dis_hora_fibrinolisis = document.getElementById('dis_hora_fibrinolisis');

    function calcularTiempoECGFibrinolisis() {
        const fechaFibrinolisis = new Date(dis_fecha_fibrinolisis.value + 'T' + dis_hora_fibrinolisis.value);
        const fechaECG = new Date(ea_fecha_ecg.value + 'T' + ea_hora_ecg.value);

        if (!isNaN(fechaFibrinolisis) && !isNaN(fechaECG)) {
            const diff = fechaFibrinolisis - fechaECG;
            const minutos = Math.floor(diff / 1000 / 60);
            dis_tiempo_ecg_fibrinolisis.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            dis_tiempo_ecg_fibrinolisis.value = ''; // Limpiar el campo si hay un error
        }
    }
    // Agregar eventos
    inputs.push(dis_fecha_fibrinolisis, dis_hora_fibrinolisis);
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoECGFibrinolisis);
    });

    //Tipo de fibrinólisis Otro
    const dis_tipofibrinolisis5 = document.getElementById('dis_tipofibrinolisis5');
    const dis_tipofibrinolisis_otro = document.getElementById('dis_tipofibrinolisis_otro');
    dis_tipofibrinolisis5.addEventListener('change', function() {
        const isOtro = this.checked;
        dis_tipofibrinolisis_otro.classList.toggle('d-none', !isOtro);
        if (!isOtro) dis_tipofibrinolisis_otro.value = '';
    });

    // Lugar de transferencia para ICP Otro
    const dis_lugar_transferencia_icp = document.getElementById('dis_lugar_transferencia_icp');
    const dis_lugar_transferencia_icp_otro = document.getElementById('dis_lugar_transferencia_icp_otro');
    dis_lugar_transferencia_icp.addEventListener('change', function() {
        const isOtro = this.value === 'Otro';
        dis_lugar_transferencia_icp_otro.classList.toggle('d-none', !isOtro);
        if (!isOtro) dis_lugar_transferencia_icp_otro.value = '';
    });

    //Tiempo del door-in al door-out

    const ea_cpcm_fecha_ingreso = document.getElementById('ea_cpcm_fecha_ingreso');
    const ea_cpcm_hora_ingreso = document.getElementById('ea_cpcm_hora_ingreso');

    const dis_tiempo_doorin_doorout = document.getElementById('dis_tiempo_doorin_doorout');
    const dis_fecha_salida_antes_icp = document.getElementById('dis_fecha_salida_antes_icp');
    const dis_hora_salida_antes_icp = document.getElementById('dis_hora_salida_antes_icp');
    const dis_fecha_llegada_centro_icp = document.getElementById('dis_fecha_llegada_centro_icp');
    const dis_hora_llegada_centro_icp = document.getElementById('dis_hora_llegada_centro_icp');


    
    function calcularTiempoDoorInDoorOut() {

        //Fecha y hora de llegada al centro del primer contacto médico
        const fechaPrimerContacto = new Date(ea_cpcm_fecha_ingreso.value + 'T' + ea_cpcm_hora_ingreso.value);
        const fechaSalidaAntesICP = new Date(dis_fecha_salida_antes_icp.value + 'T' + dis_hora_salida_antes_icp.value);

        if (!isNaN(fechaSalidaAntesICP) && !isNaN(fechaPrimerContacto)) {
            const diff =  fechaSalidaAntesICP - fechaPrimerContacto;
            const minutos = Math.floor(diff / 1000 / 60);
            dis_tiempo_doorin_doorout.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            dis_tiempo_doorin_doorout.value = ''; // Limpiar el campo si hay un error
        }
    }
    // Agregar eventos
    inputs.push(ea_cpcm_fecha_ingreso, ea_cpcm_hora_ingreso, dis_fecha_salida_antes_icp, dis_hora_salida_antes_icp, dis_fecha_llegada_centro_icp, dis_hora_llegada_centro_icp);
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoDoorInDoorOut);
    });

    //¿Fue transferido para ICP?  radio NAME 'dis_fuetransferido_icp'
    const dis_fuetransferido_icp = document.getElementsByName('dis_fuetransferido_icp');
    //accion para obtener el valor de los radio buttons
    dis_fuetransferido_icp.forEach(function(radio) {
        radio.addEventListener('change', function() {

            const div_dis_lugar_transferencia_icp = document.getElementById('div_dis_lugar_transferencia_icp');
            const div_dis_fecha_salida_antes_icp = document.getElementById('div_dis_fecha_salida_antes_icp');
            const div_dis_tiempo_doorin_doorout = document.getElementById('div_dis_tiempo_doorin_doorout');
            const div_dis_fecha_llegada_centro_icp = document.getElementById('div_dis_fecha_llegada_centro_icp');
            const div_dis_tiepo_transporte_icp = document.getElementById('div_dis_tiepo_transporte_icp');
            const div_dis_modo_transporte_icp = document.getElementById('div_dis_modo_transporte_icp');


            const div_dis_containers = [
                '#div_dis_lugar_transferencia_icp',
                '#div_dis_fecha_salida_antes_icp',
                '#div_dis_tiempo_doorin_doorout',
                '#div_dis_fecha_llegada_centro_icp',
                '#div_dis_tiepo_transporte_icp',
                '#div_dis_modo_transporte_icp'
            ];

            div_dis_containers.forEach(selector => {
                document.querySelectorAll(`${selector} select, ${selector} input`).forEach(element => {
                    element.value = '';
                });
            });



            if(radio.value === 'No'){
                //Agregar la clase d-none
                div_dis_lugar_transferencia_icp.classList.add('d-none');
                div_dis_fecha_salida_antes_icp.classList.add('d-none');
                div_dis_tiempo_doorin_doorout.classList.add('d-none');
                div_dis_fecha_llegada_centro_icp.classList.add('d-none');
                div_dis_tiepo_transporte_icp.classList.add('d-none');
                div_dis_modo_transporte_icp.classList.add('d-none');
            }else{
                //Eliminar la clase d-none
                div_dis_lugar_transferencia_icp.classList.remove('d-none');
                div_dis_fecha_salida_antes_icp.classList.remove('d-none');
                div_dis_tiempo_doorin_doorout.classList.remove('d-none');
                div_dis_fecha_llegada_centro_icp.classList.remove('d-none');
                div_dis_tiepo_transporte_icp.classList.remove('d-none');
                div_dis_modo_transporte_icp.classList.remove('d-none');
            }
        });
    });


    //Tiempo promedio de transporte al lugar de la ICP
    const dis_tiepo_transporte_icp = document.getElementById('dis_tiepo_transporte_icp');
    function calcularTiempoPromedioTransporteICP() {
        const fechasalidaAntesICP = new Date(dis_fecha_salida_antes_icp.value + 'T' + dis_hora_salida_antes_icp.value);
        const fechaLlegadaCentroICP = new Date(dis_fecha_llegada_centro_icp.value + 'T' + dis_hora_llegada_centro_icp.value);

        if (!isNaN(fechasalidaAntesICP) && !isNaN(fechaLlegadaCentroICP)) {
            const diff =  fechaLlegadaCentroICP - fechasalidaAntesICP;
            const minutos = Math.floor(diff / 1000 / 60);
            dis_tiepo_transporte_icp.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            dis_tiepo_transporte_icp.value = ''; // Limpiar el campo si hay un error
        }
    }
    // Agregar eventos
    inputs.push(dis_fecha_salida_antes_icp, dis_hora_salida_antes_icp, dis_fecha_llegada_centro_icp, dis_hora_llegada_centro_icp);
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoPromedioTransporteICP);
    });

    // Tiempo Duración de la ICP
    const dis_duracion_icp = document.getElementById('dis_duracion_icp');
    const dis_fecha_inicio_icp = document.getElementById('dis_fecha_inicio_icp');
    const dis_hora_inicio_icp = document.getElementById('dis_hora_inicio_icp');
    const dis_fecha_fin_icp = document.getElementById('dis_fecha_fin_icp');
    const dis_hora_fin_icp = document.getElementById('dis_hora_fin_icp');

    function calcularDuracionICP() {
        const fechaInicioICP = new Date(dis_fecha_inicio_icp.value + 'T' + dis_hora_inicio_icp.value);
        const fechaFinICP = new Date(dis_fecha_fin_icp.value + 'T' + dis_hora_fin_icp.value);

        if (!isNaN(fechaInicioICP) && !isNaN(fechaFinICP)) {
            const diff =  fechaFinICP - fechaInicioICP;
            const minutos = Math.floor(diff / 1000 / 60);
            dis_duracion_icp.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            dis_duracion_icp.value = ''; // Limpiar el campo si hay un error
        }
    }

    // Agregar eventos
    inputs.push(dis_fecha_inicio_icp, dis_hora_inicio_icp, dis_fecha_fin_icp, dis_hora_fin_icp);
    inputs.forEach(input => {
        input.addEventListener('change', calcularDuracionICP);
    });


     //Tiempo total de isquemia
     const dis_tt_isquemia = document.getElementById('dis_tt_isquemia');
     function calcularTiempoTotalIsquemia() {
        const fechaIniciosintomas = new Date(ea_fecha_iniciosintomas.value + 'T' + ea_hora_iniciosintomas.value);
        const fechaFibrinolisis = new Date(dis_fecha_fibrinolisis.value + 'T' + dis_hora_fibrinolisis.value);
        const fechaInicioICP = new Date(dis_fecha_inicio_icp.value + 'T' + dis_hora_inicio_icp.value);
 
        const valDismanejo = dis_manejo.value;

        if(valDismanejo === 'Solo lisis' || valDismanejo === 'Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)' || valDismanejo === 'Farmacoinvasiva + ICP sistemática (> 24 horas)' || valDismanejo === 'Lisis + ICP de Rescate'){
            if (!isNaN(fechaIniciosintomas) && !isNaN(fechaFibrinolisis)) {
                const diff = fechaFibrinolisis - fechaIniciosintomas;
                const minutos = Math.floor(diff / 1000 / 60);
                dis_tt_isquemia.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
            } else {
                dis_tt_isquemia.value = ''; // Limpiar el campo si hay un error
            }
        }else{
            if(!isNaN(fechaIniciosintomas) && !isNaN(fechaInicioICP)){
                const diff = fechaInicioICP - fechaIniciosintomas;
                const minutos = Math.floor(diff / 1000 / 60);
                dis_tt_isquemia.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
            }else{
                dis_tt_isquemia.value = ''; // Limpiar el campo si hay un error
            }
        }
     }

    // Agregar eventos
    inputs.push(ea_fecha_iniciosintomas, ea_hora_iniciosintomas, dis_fecha_fibrinolisis, dis_hora_fibrinolisis, dis_fecha_inicio_icp, dis_hora_inicio_icp);
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoTotalIsquemia);
    });


    //Otra estenosis coronaria
    const dis_otrastenosis_coronaria = document.getElementsByName('dis_otrastenosis_coronaria');
    dis_otrastenosis_coronaria.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const div_dis_otrastenosis_coronaria_lesiones = document.getElementById('div_dis_otrastenosis_coronaria_lesiones');

            //Clean check box in div_dis_otrastenosis_coronaria_lesiones
            const checksbox_dis_otrastenosis_coronaria_lesiones = document.querySelectorAll('#div_dis_otrastenosis_coronaria_lesiones input[type="checkbox"]');
            checksbox_dis_otrastenosis_coronaria_lesiones.forEach(checkbox => {
                checkbox.checked = false;
            });

            if(this.value === 'Sí'){
                div_dis_otrastenosis_coronaria_lesiones.classList.remove('d-none');
            }else{
                div_dis_otrastenosis_coronaria_lesiones.classList.add('d-none');
            }
        });
    });

    //ICP de otras lesiones
    const dis_icp_otras_lesiones = document.getElementsByName('dis_icp_otras_lesiones');
    dis_icp_otras_lesiones.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const div_dis_icp_otras_lesiones_lesiones = document.getElementById('div_dis_icp_otras_lesiones_lesiones');

            //Clean check box in div_dis_icp_otras_lesiones_lesiones
            const checksbox_dis_icp_otras_lesiones_lesiones = document.querySelectorAll('#div_dis_icp_otras_lesiones_lesiones input[type="checkbox"]');
            checksbox_dis_icp_otras_lesiones_lesiones.forEach(checkbox => {
                checkbox.checked = false;
            });

            if(this.value === 'Sí'){
                div_dis_icp_otras_lesiones_lesiones.classList.remove('d-none');
            }else{
                div_dis_icp_otras_lesiones_lesiones.classList.add('d-none');
            }
        });
    });


    //CABG
    const dis_cabg = document.getElementsByName('dis_cabg');
    dis_cabg.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const div_dis_motivo_cabg = document.getElementById('div_dis_motivo_cabg');

            //Clean select and input in div_dis_motivo_cabg
            const select_dis_motivo_cabg = document.querySelectorAll('#div_dis_motivo_cabg select');
            select_dis_motivo_cabg.forEach(select => {
                select.value = '';
            });

            const input_dis_motivo_cabg_otro = document.querySelectorAll('#div_dis_motivo_cabg input[type="text"]');
            input_dis_motivo_cabg_otro.forEach(input => {
                input.value = '';
            });

            if(this.value === 'Sí'){
                div_dis_motivo_cabg.classList.remove('d-none');
            }else{
                div_dis_motivo_cabg.classList.add('d-none');
            }

        });
    });

    //dci_sangrado_segun_barc
    const dci_sangrado_segun_barc = document.getElementsByName('dci_sangrado_segun_barc');
    const div_dci_sangrado_segun_barc_tipo = document.getElementById('div_dci_sangrado_segun_barc_tipo');
    dci_sangrado_segun_barc.forEach(function(radio) {
        radio.addEventListener('change', function() {
            //reset radio buttons dentro de los div_
            const radios_div_dci_sangrado_segun_barc_tipo = document.querySelectorAll('#div_dci_sangrado_segun_barc_tipo input[type="radio"]');
            radios_div_dci_sangrado_segun_barc_tipo.forEach(radio => {
                radio.checked = false;
            });

            if (this.value === '3' || this.value === '5') {
                div_dci_sangrado_segun_barc_tipo.classList.remove('d-none');
            } else {
                div_dci_sangrado_segun_barc_tipo.classList.add('d-none');
            }

            //la div_dci_sangrado_segun_barc_tipo3 solo mostrar cuando marca 3
            const div_dci_sangrado_segun_barc_tipo3 = document.getElementById('div_dci_sangrado_segun_barc_tipo3');
            div_dci_sangrado_segun_barc_tipo3.classList.toggle('d-none', this.value !== '3');

        });
    });

    //Dias de Hospitalización
    const dci_dias_hospitalizacion = document.getElementById('dci_dias_hospitalizacion');
    const dci_fecha_de_alta = document.getElementById('dci_fecha_de_alta');

    function calcularDiasHospitalizacion() {
        //00 horas
        const fechaIngreso = new Date(ea_cpcm_fecha_ingreso.value + 'T00:00');
        //23:59 horas
        const fechaAlta = new Date(dci_fecha_de_alta.value + 'T23:59');

        if (!isNaN(fechaIngreso) && !isNaN(fechaAlta)) {
            const diff = fechaAlta - fechaIngreso;
            const dias = Math.floor(diff / 1000 / 60 / 60 / 24);
            dci_dias_hospitalizacion.value = dias >= 0 ? dias : 0; // Asegurarse de no mostrar días negativos
        } else {
            dci_dias_hospitalizacion.value = ''; // Limpiar el campo si hay un error
        }
    }

    // Agregar eventos
    inputs.push(dci_fecha_de_alta, ea_cpcm_fecha_ingreso);
    inputs.forEach(input => {
        input.addEventListener('change', calcularDiasHospitalizacion);
    });


    //Complicaciones de la ICP Otro
    const dis_complicaciones_dela_icp13 = document.getElementById('dis_complicaciones_dela_icp13');
    const dis_complicaciones_dela_icp_otro = document.getElementById('dis_complicaciones_dela_icp_otro');
    dis_complicaciones_dela_icp13.addEventListener('change', function() {
        const isOtro = this.checked;
        dis_complicaciones_dela_icp_otro.classList.toggle('d-none', !isOtro);
        if (!isOtro) dis_complicaciones_dela_icp_otro.value = '';
    });

    //Motivo de no reperfusión Otro
    const dis_motivo_deno_reperfusion = document.getElementById('dis_motivo_deno_reperfusion');
    const dis_motivo_deno_reperfusion_otro = document.getElementById('dis_motivo_deno_reperfusion_otro');
    dis_motivo_deno_reperfusion.addEventListener('change', function() {
        const isOtro = this.value === 'Otro';
        dis_motivo_deno_reperfusion_otro.classList.toggle('d-none', !isOtro);
        if (!isOtro) dis_motivo_deno_reperfusion_otro.value = '';
    });

    //Motivo de CABG Otras
    const dis_motivo_cabg = document.getElementById('dis_motivo_cabg');
    const dis_motivo_cabg_otro = document.getElementById('dis_motivo_cabg_otro');
    dis_motivo_cabg.addEventListener('change', function() {
        const isOtro = this.value === 'Otras';
        dis_motivo_cabg_otro.classList.toggle('d-none', !isOtro);
        if (!isOtro) dis_motivo_cabg_otro.value = '';
    });


    //Sangrado según BARC
    const sc_sangrado_segun_barc = document.getElementsByName('sc_sangrado_segun_barc');
    const dv_sc_sangrado_barc_tipo = document.getElementById('dv_sc_sangrado_barc_tipo');
    sc_sangrado_segun_barc.forEach(function(radio) {
        radio.addEventListener('change', function() {
            //reset radio buttons dentro de los dv_
            const radios_dv_sc_sangrado_barc_tipo = document.querySelectorAll('#dv_sc_sangrado_barc_tipo input[type="radio"]');
            radios_dv_sc_sangrado_barc_tipo.forEach(radio => {
                radio.checked = false;
            });

            if (this.value === '3' || this.value === '5') {
                dv_sc_sangrado_barc_tipo.classList.remove('d-none');
            } else {
                dv_sc_sangrado_barc_tipo.classList.add('d-none');
            }

            //la dv_sc_sangrado_barc_tipo3 solo mostrar cuando marca 3
            const dv_sc_sangrado_barc_tipo3 = document.getElementById('dv_sc_sangrado_barc_tipo3');
            dv_sc_sangrado_barc_tipo3.classList.toggle('d-none', this.value !== '3');

        });
    });


</script>
@endsection
