@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Renima V <small class="text-danger">(EN CONSTRUCCION)</small> </h1>
    </div>

    <!-- Form -->
    <form action="{{ route('renima.store') }}" method="POST">
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
                        <label for="centro_salud" class="form-label mb-0">Centro de salud <small class="requiredata">*</small></label>
                        <input type="text" name="centro_salud" class="form-control" id="centro_salud" required>
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
                        <label for="de_documento_identidad" class="form-label mb-0">Documento de identidad (DNI) <small class="requiredata">*</small></label>
                        <input type="number" name="de_documento_identidad" class="form-control" id="de_documento_identidad" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_telefono" class="form-label mb-0">Teléfono de contacto <small class="requiredata">*</small></label>
                        <input type="number" name="de_telefono" class="form-control" id="de_telefono" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_celular" class="form-label mb-0">Celular de contacto 1 <small class="requiredata">*</small></label>
                        <input type="number" name="de_celular" class="form-control" id="de_celular" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_celular_2" class="form-label mb-0">Celular de contacto 2 <small class="requiredata">*</small></label>
                        <input type="number" name="de_celular_2" class="form-control" id="de_celular_2" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_correo" class="form-label mb-0">Correo electrónico del paciente <small class="requiredata">*</small></label>
                        <input type="email" name="de_correo" class="form-control" id="de_correo" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_departamento" class="form-label mb-0">Departamento <small class="requiredata">*</small></label>
                        <input type="text" name="de_departamento" class="form-control" id="de_departamento">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_provincia" class="form-label mb-0">Provincia <small class="requiredata">*</small></label>
                        <input type="text" name="de_provincia" class="form-control" id="de_provincia">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_distrito" class="form-label mb-0">Distrito <small class="requiredata">*</small></label>
                        <input type="text" name="de_distrito" class="form-control" id="de_distrito">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_edad" class="form-label mb-0">Edad (años) </label>
                        <input type="number" name="de_edad" class="form-control" id="de_edad" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_nacimiento" class="form-label mb-0">Fecha de nacimiento </label>
                        <input type="date" name="de_nacimiento" class="form-control" id="de_nacimiento" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_sexo1" class="form-label mb-0">Sexo </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_sexo" id="de_sexo1" value="Masculino" >
                                <label class="form-check-label" for="de_sexo1">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="de_sexo" id="de_sexo2" value="Femenino" >
                                <label class="form-check-label" for="de_sexo2">Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_estado_civil" class="form-label mb-0">Estado civil </label>
                        <select name="de_estado_civil" id="de_estado_civil" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_tipo_seguro" class="form-label mb-0">Tipo de seguro </label>
                        <select name="de_tipo_seguro" id="de_tipo_seguro" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="MINSA">MINSA</option>
                            <option value="EsSalud">EsSalud</option>
                            <option value="FFAA y Policiales">FFAA y Policiales</option>
                            <option value="Privado">Privado</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="de_tipo_seguro_otro" class="form-control mt-1 d-none" id="de_tipo_seguro_otro" placeholder="Especificar otro tipo de seguro">

                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="de_grado_instruccion" class="form-label mb-0">Grado de instrucción </label>
                        <select name="de_grado_instruccion" id="de_grado_instruccion" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Sin escolaridad">Sin escolaridad</option>
                            <option value="Primaria incompleta">Primaria incompleta</option>
                            <option value="Primaria completa">Primaria completa</option>
                            <option value="Secundaria incompleta">Secundaria incompleta</option>
                            <option value="Secundaria completa">Secundaria completa</option>
                            <option value="Superior universitario incompleta">Superior universitario incompleta</option>
                            <option value="Superior universitario completa">Superior universitario completa</option>
                            <option value="Superior técnico incompleta">Superior técnico incompleta</option>
                            <option value="Superior técnico completa">Superior técnico completa</option>
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
                        <input type="number" name="dc_pas" class="form-control" id="dc_pas" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dc_pad" class="form-label mb-0">Presión arterial diastólica <small class="text-danger">(mmHg)</small></label>
                        <input type="number" name="dc_pad" class="form-control" id="dc_pad" >
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_frecuencia_cardiaca" class="form-label mb-0">Frecuencia cardiaca</label>
                        <input type="number" name="dc_frecuencia_cardiaca" class="form-control" id="dc_frecuencia_cardiaca">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_frecuencia_respiratoria" class="form-label mb-0">Frecuencia respiratoria</label>
                        <input type="number" name="dc_frecuencia_respiratoria" class="form-control" id="dc_frecuencia_respiratoria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_temperatura" class="form-label mb-0">Temperatura <small class="text-danger">(C°)</small></label>
                        <input type="number" name="dc_temperatura" class="form-control" id="dc_temperatura">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dc_saturacion_oxigeno" class="form-label mb-0">Saturación de oxígeno <small class="text-danger">(%)</small></label>
                        <input type="number" name="dc_saturacion_oxigeno" class="form-control" id="dc_saturacion_oxigeno">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="dc_antecedentes1" class="form-label mb-0 d-block">Antecedentes </label>
                        <div class="form-control radioptions">

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes1" value="Hipertensión arterial">
                                <label class="form-check-label" for="dc_antecedentes1">Hipertensión arterial</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes2" value="Diabetes mellitus">
                                <label class="form-check-label" for="dc_antecedentes2">Diabetes mellitus</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes3" value="Falla cardiaca">
                                <label class="form-check-label" for="dc_antecedentes3">Falla cardiaca</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes4" value="Stroke">
                                <label class="form-check-label" for="dc_antecedentes4">Stroke</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes5" value="Dislipidemia">
                                <label class="form-check-label" for="dc_antecedentes5">Dislipidemia</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes6" value="Enfermedad pulmonar obstructiva crónica">
                                <label class="form-check-label" for="dc_antecedentes6">Enfermedad pulmonar obstructiva crónica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes7" value="Infarto miocárdico antiguo">
                                <label class="form-check-label" for="dc_antecedentes7">Infarto miocárdico antiguo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes8" value="Cáncer">
                                <label class="form-check-label" for="dc_antecedentes8">Cáncer</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes9" value="Enfermedad arterial periférica">
                                <label class="form-check-label" for="dc_antecedentes9">Enfermedad arterial periférica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes10" value="Consumo de tabaco">
                                <label class="form-check-label" for="dc_antecedentes10">Consumo de tabaco</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes11" value="Enfermedad coronaria obstructiva crónica">
                                <label class="form-check-label" for="dc_antecedentes11">Enfermedad coronaria obstructiva crónica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes12" value="Ataque isquémico transitorio">
                                <label class="form-check-label" for="dc_antecedentes12">Ataque isquémico transitorio</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes13" value="Fibrilación auricular">
                                <label class="form-check-label" for="dc_antecedentes13">Fibrilación auricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes14" value="ICP previo">
                                <label class="form-check-label" for="dc_antecedentes14">ICP previo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes15" value="CABG previo">
                                <label class="form-check-label" for="dc_antecedentes15">CABG previo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes16" value="Enfermedad renal crónica">
                                <label class="form-check-label" for="dc_antecedentes16">Enfermedad renal crónica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes17" value="COVID-19">
                                <label class="form-check-label" for="dc_antecedentes17">COVID-19</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes18" value="Gestante">
                                <label class="form-check-label" for="dc_antecedentes18">Gestante</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes19" value="hiperuricemia">
                                <label class="form-check-label" for="dc_antecedentes19">Hiperuricemia</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes20" value="Tabaquismo antiguo">
                                <label class="form-check-label" for="dc_antecedentes20">Tabaquismo antiguo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes21" value="Tabaquismo actual">
                                <label class="form-check-label" for="dc_antecedentes21">Tabaquismo actual</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="dc_antecedentes[]" id="dc_antecedentes22" value="otro">
                                <label class="form-check-label" for="dc_antecedentes22">Otro</label>
                            </div>
                            <input type="text" name="dc_otro_antecedentes" class="form-control mt-0 mb-1 d-none" id="dc_otro_antecedentes" placeholder="Especificar otro antecedente">
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
                                <input type="date" name="ea_fecha_iniciosintomas" class="form-control rounded-left" id="ea_fecha_iniciosintomas" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_hora_iniciosintomas" class="form-control rounded-right" id="ea_hora_iniciosintomas" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_cpcm" class="form-label mb-0">Centro del primer contacto médico </label>
                        <input type="text" name="ea_cpcm" class="form-control" id="ea_cpcm">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_cpcm_fecha_ingreso" class="form-label mb-0">Fecha y hora al centro de primer contacto medico </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="ea_cpcm_fecha_ingreso" class="form-control rounded-left" id="ea_cpcm_fecha_ingreso" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_cpcm_hora_ingreso" class="form-control rounded-right" id="ea_cpcm_hora_ingreso" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_fecha_pcm" class="form-label mb-0">Fecha y hora de primer contacto médico </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="ea_fecha_pcm" class="form-control rounded-left" id="ea_fecha_pcm" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_hora_pcm" class="form-control rounded-right" id="ea_hora_pcm" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_tiempo_ispc" class="form-label mb-0">Tiempo desde el inicio de síntomas al primer contacto médico <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="ea_tiempo_ispc" class="form-control" id="ea_tiempo_ispc" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de primer contacto médico - Fecha y hora de inicio de síntomas</small>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_fecha_ecg" class="form-label mb-0">Fecha y hora de ECG </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="ea_fecha_ecg" class="form-control rounded-left" id="ea_fecha_ecg" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="ea_hora_ecg" class="form-control rounded-right" id="ea_hora_ecg" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_tpc_ecg" class="form-label mb-0">Tiempo desde el primer contacto médico hasta el ECG <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="ea_tpc_ecg" class="form-control" id="ea_tpc_ecg" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de ECG - Fecha y hora de primer contacto médico</small>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_tt_isquemia" class="form-label mb-0">Tiempo total de isquemia <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="ea_tt_isquemia" class="form-control" id="ea_tt_isquemia">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ea_manif_clinicas1" class="form-label mb-0 d-block">Manifestaciones clínicas </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas1" value="Dolor torácico (inespecifico)">
                                <label class="form-check-label" for="ea_manif_clinicas1">Dolor torácico (inespecifico)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas2" value="Angina">
                                <label class="form-check-label" for="ea_manif_clinicas2">Angina</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas3" value="Disnea">
                                <label class="form-check-label" for="ea_manif_clinicas3">Disnea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas4" value="Palpitaciones">
                                <label class="form-check-label" for="ea_manif_clinicas4">Palpitaciones</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas5" value="Síncope">
                                <label class="form-check-label" for="ea_manif_clinicas5">Síncope</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas6" value="Mareo">
                                <label class="form-check-label" for="ea_manif_clinicas6">Mareo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas7" value="Fatiga">
                                <label class="form-check-label" for="ea_manif_clinicas7">Fatiga</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas8" value="Irradiacion a MMSS">
                                <label class="form-check-label" for="ea_manif_clinicas8">Irradiacion a MMSS</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas9" value="Dolor mandibular">
                                <label class="form-check-label" for="ea_manif_clinicas9">Dolor mandibular </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas10" value="Dolor de espalda">
                                <label class="form-check-label" for="ea_manif_clinicas10">Dolor de espalda </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas11" value="Dolor en nuca">
                                <label class="form-check-label" for="ea_manif_clinicas11">Dolor en nuca </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas12" value="Nauseas o vomitos">
                                <label class="form-check-label" for="ea_manif_clinicas12">Nauseas o vomitos </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas13" value="Sudoracion">
                                <label class="form-check-label" for="ea_manif_clinicas13">Sudoracion </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas14" value="Ortopnea">
                                <label class="form-check-label" for="ea_manif_clinicas14">Ortopnea </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas15" value="Soplo cardiaco">
                                <label class="form-check-label" for="ea_manif_clinicas15">Soplo cardiaco</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas16" value="Ruido S3">
                                <label class="form-check-label" for="ea_manif_clinicas16">Ruido S3</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas17" value="Ruido S4">
                                <label class="form-check-label" for="ea_manif_clinicas17">Ruido S4</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas18" value="Ingurgitación yugular">
                                <label class="form-check-label" for="ea_manif_clinicas18">Ingurgitación yugular</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas19" value="Crepitantes">
                                <label class="form-check-label" for="ea_manif_clinicas19">Crepitantes</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas20" value="Cianosis">
                                <label class="form-check-label" for="ea_manif_clinicas20">Cianosis</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas21" value="Llenado capilar > 2”">
                                <label class="form-check-label" for="ea_manif_clinicas21">Llenado capilar > 2”</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas22" value="Edemas de mmii">
                                <label class="form-check-label" for="ea_manif_clinicas22">Edemas de mmii</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ea_manif_clinicas[]" id="ea_manif_clinicas23" value="Trastorno de conciencia">
                                <label class="form-check-label" for="ea_manif_clinicas23">Trastorno de conciencia</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_clasificacion_kk1" class="form-label mb-0">Clasificación Killip Kimball</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk1" value="1" >
                                <label class="form-check-label" for="ea_clasificacion_kk1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk2" value="2" >
                                <label class="form-check-label" for="ea_clasificacion_kk2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk3" value="3" >
                                <label class="form-check-label" for="ea_clasificacion_kk3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_clasificacion_kk" id="ea_clasificacion_kk4" value="4" >
                                <label class="form-check-label" for="ea_clasificacion_kk4">4</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ea_diagnostico" class="form-label mb-0">Diagnóstico</label>
                        <select class="form-control" name="ea_diagnostico" id="ea_diagnostico">
                            <option value="">Seleccionar...</option>
                            <option value="IAM con elevacion del ST">IAM con elevacion del ST</option>
                            <option value="Sindrome coronario agudo ST no elevado">Sindrome coronario agudo ST no elevado</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_ea_diagnostico_st">
                        <label for="ea_diagnostico_st1" class="form-label mb-0">IAM con elevacion del ST</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_diagnostico_st" id="ea_diagnostico_st1" value="IAM ST no Elevado" >
                                <label class="form-check-label" for="ea_diagnostico_st1">IAM ST no Elevado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_diagnostico_st" id="ea_diagnostico_st2" value="Angina Inestable" >
                                <label class="form-check-label" for="ea_diagnostico_st2">Angina Inestable</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2 d-none" id="dv_ea_diagnostico_st_elevado">
                        <label for="ea_diagnostico_st_elevado1" class="form-label mb-0">Sindrome coronario agudo ST no elevado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_diagnostico_st_elevado" id="ea_diagnostico_st_elevado1" value="No alto riesgo" >
                                <label class="form-check-label" for="ea_diagnostico_st_elevado1">No alto riesgo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_diagnostico_st_elevado" id="ea_diagnostico_st_elevado2" value="Alto riesgo" >
                                <label class="form-check-label" for="ea_diagnostico_st_elevado2">Alto riesgo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ea_diagnostico_st_elevado" id="ea_diagnostico_st_elevado3" value="Muy alto riesgo" >
                                <label class="form-check-label" for="ea_diagnostico_st_elevado3">Muy alto riesgo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ea_heart_score" class="form-label mb-0">HEART score</label>
                        <select name="ea_heart_score" id="ea_heart_score" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Bajo (0-3 puntos)">Bajo (0-3 puntos)</option>
                            <option value="Intermedio (4-6 puntos)">Intermedio (4-6 puntos)</option>
                            <option value="Alto (>7 puntos)">Alto (>7 puntos)</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="ea_peso" class="form-label mb-0">Peso actual <small class="text-danger">(Kg)</small></label>
                        <input type="number" name="ea_peso" class="form-control" id="ea_peso" step="0.01">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="ea_talla" class="form-label mb-0">Talla actual <small class="text-danger">(m)</small></label>
                        <input type="number" name="ea_talla" class="form-control" id="ea_talla" step="0.01">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="ea_imc" class="form-label mb-0">IMC</label>
                        <input type="number" name="ea_imc" class="form-control" id="ea_imc" step="0.01" placeholder="" readonly>
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
                            <option value="">Seleccionar...</option>
                            <option value="Sinusal">Sinusal</option>
                            <option value="Fibrilacion Auricular">Fibrilacion Auricular</option>
                            <option value="BAV II O III grado">BAV II O III grado</option>
                            <option value="TV/FV">TV/FV</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="ecg_iamcest_localizacion1" class="form-label mb-0">IAMCEST localizacion</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion1" value="Septal (V1-V2)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion1">Septal (V1-V2)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion2" value="Anterior (V3-V4)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion2">Anterior (V3-V4)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion3" value="Anteroseptal (V1-V4)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion3">Anteroseptal (V1-V4)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion4" value="Lateral (I, AVL+ V5- V6)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion4">Lateral (I, AVL+ V5- V6)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion5" value="Antero-lateral (I-AVL, V3-V6)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion5">Antero-lateral (I-AVL, V3-V6)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion6" value="Anterior extensa (V1-V6, I-AVL)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion6">Anterior extensa (V1-V6, I-AVL)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion7" value="Inferior (II-III-AVF)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion7">Inferior (II-III-AVF)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion8" value="Posterior (V7-V9)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion8">Posterior (V7-V9)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion9" value="Infero-posterior (II-III-AVF, V7-V9)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion9">Infero-posterior (II-III-AVF, V7-V9)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion10" value="Infero-postero-lateral (II-III-AVF, I-AVL, V7-V9)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion10">Infero-postero-lateral (II-III-AVF, I-AVL, V7-V9)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_iamcest_localizacion[]" id="ecg_iamcest_localizacion11" value="Infero-postero-lateral + VD (II-III-AVF+V3R-V4R)">
                                <label class="form-check-label" for="ecg_iamcest_localizacion11">Infero-postero-lateral + VD (II-III-AVF+V3R-V4R)</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ecg_scasest1" class="form-label mb-0">SCASEST</label>
                        <div class="form-control radioptions">
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest1" value="Depresion del ST T">
                                <label class="form-check-label" for="ecg_scasest1">Depresion del ST T</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest2" value="Ondas T negativas">
                                <label class="form-check-label" for="ecg_scasest2">Ondas T negativas</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest3" value="Wellens">
                                <label class="form-check-label" for="ecg_scasest3">Wellens</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest4" value="Winter">
                                <label class="form-check-label" for="ecg_scasest4">Winter</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest5" value="Bandera Sudafricana">
                                <label class="form-check-label" for="ecg_scasest5">Bandera Sudafricana</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest6" value="Tronco coronario/Multiarterial">
                                <label class="form-check-label" for="ecg_scasest6">Tronco coronario/Multiarterial</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest7" value="ST elevado no persistente">
                                <label class="form-check-label" for="ecg_scasest7">ST elevado no persistente</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest8" value="BCRIHH">
                                <label class="form-check-label" for="ecg_scasest8">BCRIHH</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest9" value="BCRIHH Brugada positivo">
                                <label class="form-check-label" for="ecg_scasest9">BCRIHH Brugada positivo</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="ecg_scasest[]" id="ecg_scasest10" value="Rectificacion del ST">
                                <label class="form-check-label" for="ecg_scasest10">Rectificacion del ST</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="ecg_otro" class="form-label mb-0">Otro</label>
                        <input type="text" name="ecg_otro" class="form-control" id="ecg_otro">
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
                            <option value="">Seleccionar...</option>

                            <optgroup label="IAMCEST">
                                <option value="Solo lisis">Solo lisis</option>
                                <option value="Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)">Farmacoinvasiva + ICP sistemática precoz (2 – 24 horas)</option>
                                <option value="Farmacoinvasiva + ICP sistemática (> 24 horas)">Farmacoinvasiva + ICP sistemática (> 24 horas)</option>
                                <option value="Farmacoinvasiva + ICP de Rescate">Farmacoinvasiva + ICP de Rescate</option>
                                <option value="Intervención coronaria percutánea primaria (antes de las 12 horas)">Intervención coronaria percutánea primaria (antes de las 12 horas)</option>
                                <option value="Intervención coronaria percutánea primaria (> 12 horas)">Intervención coronaria percutánea primaria (> 12 horas)</option>
                            </optgroup>
                            <optgroup label="SCASEST">
                                <option value="Estrategia invasiva inmediata ( ICP < 2 horas )">Estrategia invasiva inmediata ( ICP < 2 horas )</option>
                                <option value="Estrategia invasiva temprana ( ICP 2 – 24 horas)">Estrategia invasiva temprana ( ICP 2 – 24 horas)</option>
                                <option value="Estrategia selectiva invasiva (ICP > 24 horas)">Estrategia selectiva invasiva (ICP > 24 horas)</option>
                                <option value="Bypass coronario">Bypass coronario</option>
                                <option value="Solo tratamiento médico">Solo tratamiento médico</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
                        <label for="dis_lugar_tf" class="form-label mb-0">Lugar de transferencia para fibrinólisis</label>
                        <select name="dis_lugar_tf" id="dis_lugar_tf" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Mismo centro">Mismo centro</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="dis_lugar_tf_otro" class="form-control mt-1 d-none" id="dis_lugar_tf_otro" placeholder="Especificar">
                    </div>
                    <div class="col-md-6 mb-2">
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
                    <div class="col-md-6 mb-2">
                        <label for="dis_tiempo_ecg_fibrinolisis" class="form-label mb-0">Tiempo desde el ECG hasta fibrinólisis <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_tiempo_ecg_fibrinolisis" class="form-control" id="dis_tiempo_ecg_fibrinolisis" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de fibrinolisis - Fecha y hora de ECG</small>
                    </div>

                    <div class="col-md-12 mb-2">
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
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
                        <label for="dis_tiempo_doorin_doorout" class="form-label mb-0">Tiempo del door-in al door-out <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_tiempo_doorin_doorout" class="form-control" id="dis_tiempo_doorin_doorout" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de salida antes de la ICP - Fecha y hora de llegada al centro para ICP</small>
                    </div>

                    <div class="col-md-6 mb-2">
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

                    <div class="col-md-6 mb-2">
                        <label for="dis_tiepo_transporte_icp" class="form-label mb-0">Tiempo promedio de transporte al lugar de la ICP <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="dis_tiepo_transporte_icp" class="form-control" id="dis_tiepo_transporte_icp" placeholder="" readonly>
                        <small class="infotext">Fecha y hora de llegada al centro para ICP - Fecha y hora de inicio de ICP</small>
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

                    <div class="col-md-6 mb-2">
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
                        <label for="dis_diametro_stent" class="form-label mb-0">Diámetro del stent <small class="text-danger">(mm)</small></label>
                        <input type="number" name="dis_diametro_stent" class="form-control" id="dis_diametro_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dis_longitud_stent" class="form-label mb-0">Longitud del stent <small class="text-danger">(mm)</small></label>
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
                        <input type="number" name="dis_duracion_icp" class="form-control" id="dis_duracion_icp">
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
                        <input type="number" name="dis_puntaje_grace" class="form-control" id="dis_puntaje_grace">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dis_puntaje_crussade" class="form-label mb-0">Puntaje Crussade</label>
                        <input type="number" name="dis_puntaje_crussade" class="form-control" id="dis_puntaje_crussade">
                    </div>

                </div>
            </div>
        </div>

        <!--Datos de medicación farmacologíca-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-danger">
                <h6 class="m-0 font-weight-bold text-white">Datos de medicación farmacologíca</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="dmf_aspirina1" class="form-label mb-0">Aspirina <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_aspirina" id="dmf_aspirina1" value="Sí">
                                <label class="form-check-label" for="dmf_aspirina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_aspirina" id="dmf_aspirina2" value="No">
                                <label class="form-check-label" for="dmf_aspirina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_clopidogrel1" class="form-label mb-0">Clopidogrel <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_clopidogrel" id="dmf_clopidogrel1" value="Sí">
                                <label class="form-check-label" for="dmf_clopidogrel1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_clopidogrel" id="dmf_clopidogrel2" value="No">
                                <label class="form-check-label" for="dmf_clopidogrel2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_enoxaparina1" class="form-label mb-0">Enoxaparina <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_enoxaparina" id="dmf_enoxaparina1" value="Sí">
                                <label class="form-check-label" for="dmf_enoxaparina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_enoxaparina" id="dmf_enoxaparina2" value="No">
                                <label class="form-check-label" for="dmf_enoxaparina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_heparina_no_fraccionada1" class="form-label mb-0">Heparina no fraccionada <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_heparina_no_fraccionada" id="dmf_heparina_no_fraccionada1" value="Sí">
                                <label class="form-check-label" for="dmf_heparina_no_fraccionada1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_heparina_no_fraccionada" id="dmf_heparina_no_fraccionada2" value="No">
                                <label class="form-check-label" for="dmf_heparina_no_fraccionada2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_atorvastatina1" class="form-label mb-0">Atorvastatina <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_atorvastatina" id="dmf_atorvastatina1" value="Sí">
                                <label class="form-check-label" for="dmf_atorvastatina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_atorvastatina" id="dmf_atorvastatina2" value="No">
                                <label class="form-check-label" for="dmf_atorvastatina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_betabloqueadores1" class="form-label mb-0">Betabloqueadores <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_betabloqueadores" id="dmf_betabloqueadores1" value="Sí">
                                <label class="form-check-label" for="dmf_betabloqueadores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_betabloqueadores" id="dmf_betabloqueadores2" value="No">
                                <label class="form-check-label" for="dmf_betabloqueadores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_diureticos_asa1" class="form-label mb-0">Diuréticos de asa <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_diureticos_asa" id="dmf_diureticos_asa1" value="Sí">
                                <label class="form-check-label" for="dmf_diureticos_asa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_diureticos_asa" id="dmf_diureticos_asa2" value="No">
                                <label class="form-check-label" for="dmf_diureticos_asa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_vasodilatadores1" class="form-label mb-0">Vasodilatadores <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_vasodilatadores" id="dmf_vasodilatadores1" value="Sí">
                                <label class="form-check-label" for="dmf_vasodilatadores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_vasodilatadores" id="dmf_vasodilatadores2" value="No">
                                <label class="form-check-label" for="dmf_vasodilatadores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_vasopresores1" class="form-label mb-0">Vasopresores <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_vasopresores" id="dmf_vasopresores1" value="Sí">
                                <label class="form-check-label" for="dmf_vasopresores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_vasopresores" id="dmf_vasopresores2" value="No">
                                <label class="form-check-label" for="dmf_vasopresores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_inotropicos1" class="form-label mb-0">Inotrópicos <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_inotropicos" id="dmf_inotropicos1" value="Sí">
                                <label class="form-check-label" for="dmf_inotropicos1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_inotropicos" id="dmf_inotropicos2" value="No">
                                <label class="form-check-label" for="dmf_inotropicos2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_ieca_ara1" class="form-label mb-0">IECA/ARA <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_ieca_ara" id="dmf_ieca_ara1" value="Sí">
                                <label class="form-check-label" for="dmf_ieca_ara1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_ieca_ara" id="dmf_ieca_ara2" value="No">
                                <label class="form-check-label" for="dmf_ieca_ara2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_ventilacion_mecanica1" class="form-label mb-0">Ventilación mecánica <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_ventilacion_mecanica" id="dmf_ventilacion_mecanica1" value="Sí">
                                <label class="form-check-label" for="dmf_ventilacion_mecanica1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_ventilacion_mecanica" id="dmf_ventilacion_mecanica2" value="No">
                                <label class="form-check-label" for="dmf_ventilacion_mecanica2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_dialisis1" class="form-label mb-0">Diálisis <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_dialisis" id="dmf_dialisis1" value="Sí">
                                <label class="form-check-label" for="dmf_dialisis1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_dialisis" id="dmf_dialisis2" value="No">
                                <label class="form-check-label" for="dmf_dialisis2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_rehab_cardiaca1" class="form-label mb-0">Rehabilitación cardiaca <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_rehab_cardiaca" id="dmf_rehab_cardiaca1" value="Sí">
                                <label class="form-check-label" for="dmf_rehab_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_rehab_cardiaca" id="dmf_rehab_cardiaca2" value="No">
                                <label class="form-check-label" for="dmf_rehab_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_antagonistas_mineraloc1" class="form-label mb-0">Antagonistas de mineralocorticoides <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_antagonistas_mineraloc" id="dmf_antagonistas_mineraloc1" value="Sí">
                                <label class="form-check-label" for="dmf_antagonistas_mineraloc1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_antagonistas_mineraloc" id="dmf_antagonistas_mineraloc2" value="No">
                                <label class="form-check-label" for="dmf_antagonistas_mineraloc2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dmf_inhibidores_recep_p2y121" class="form-label mb-0">Inhibidores del receptor P2Y12 <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_inhibidores_recep_p2y12" id="dmf_inhibidores_recep_p2y121" value="Sí">
                                <label class="form-check-label" for="dmf_inhibidores_recep_p2y121">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dmf_inhibidores_recep_p2y12" id="dmf_inhibidores_recep_p2y122" value="No">
                                <label class="form-check-label" for="dmf_inhibidores_recep_p2y122">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Datos de laboratorio-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Datos de laboratorio</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="dl_hemoglobina" class="form-label mb-0">Hemoglobina <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_hemoglobina" class="form-control" id="dl_hemoglobina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_leucocitos" class="form-label mb-0">Leucocitos <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_leucocitos" class="form-control" id="dl_leucocitos">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_plaquetas" class="form-label mb-0">Plaquetas <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_plaquetas" class="form-control" id="dl_plaquetas">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_creatinina" class="form-label mb-0">Creatinina <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_creatinina" class="form-control" id="dl_creatinina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_urea" class="form-label mb-0">Úrea <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_urea" class="form-control" id="dl_urea">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_glucosa" class="form-label mb-0">Glucosa <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_glucosa" class="form-control" id="dl_glucosa">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_troponina_t" class="form-label mb-0">Troponina T <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_troponina_t" class="form-control" id="dl_troponina_t">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_troponina_i" class="form-label mb-0">Troponina I <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_troponina_i" class="form-control" id="dl_troponina_i">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_cpk_total" class="form-label mb-0">CPK total <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_cpk_total" class="form-control" id="dl_cpk_total">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_cpk_mb" class="form-label mb-0">CPK-MB <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_cpk_mb" class="form-control" id="dl_cpk_mb">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_lactato" class="form-label mb-0">Lactato <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="dl_lactato" class="form-control" id="dl_lactato">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dl_fevi_ingreso" class="form-label mb-0">Fracción de eyección ventricular izquierda <small class="text-danger">(%, al ingreso)</small></label>
                        <input type="number" name="dl_fevi_ingreso" class="form-control" id="dl_fevi_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dl_fevi_hospitalizacion" class="form-label mb-0">Fracción de eyección ventricular izquierda <small class="text-danger">(%, en hospitalización)</small></label>
                        <input type="number" name="dl_fevi_hospitalizacion" class="form-control" id="dl_fevi_hospitalizacion">
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
                                <label for="ti_aspirina1" class="form-label mb-0">Aspirina <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_aspirina" id="ti_aspirina1" value="Sí">
                                        <label class="form-check-label" for="ti_aspirina1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_aspirina" id="ti_aspirina2" value="No">
                                        <label class="form-check-label" for="ti_aspirina2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_ip2y121" class="form-label mb-0">IP2Y12</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ip2y12" id="ti_ip2y121" value="Clopidogrel">
                                        <label class="form-check-label" for="ti_ip2y121">Clopidogrel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ip2y12" id="ti_ip2y122" value="Prasugrel">
                                        <label class="form-check-label" for="ti_ip2y122">Prasugrel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ip2y12" id="ti_ip2y123" value="Ticagrelor">
                                        <label class="form-check-label" for="ti_ip2y123">Ticagrelor</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_enoxaparina1" class="form-label mb-0">Enoxaparina <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_enoxaparina" id="ti_enoxaparina1" value="Sí">
                                        <label class="form-check-label" for="ti_enoxaparina1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_enoxaparina" id="ti_enoxaparina2" value="No">
                                        <label class="form-check-label" for="ti_enoxaparina2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_heparina_no_fraccionada1" class="form-label mb-0">Heparina no fraccionada <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_heparina_no_fraccionada" id="ti_heparina_no_fraccionada1" value="Sí">
                                        <label class="form-check-label" for="ti_heparina_no_fraccionada1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_heparina_no_fraccionada" id="ti_heparina_no_fraccionada2" value="No">
                                        <label class="form-check-label" for="ti_heparina_no_fraccionada2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_atorvastatina1" class="form-label mb-0">Atorvastatina <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_atorvastatina" id="ti_atorvastatina1" value="Sí">
                                        <label class="form-check-label" for="ti_atorvastatina1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_atorvastatina" id="ti_atorvastatina2" value="No">
                                        <label class="form-check-label" for="ti_atorvastatina2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_betabloqueadores1" class="form-label mb-0">Betabloqueadores <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_betabloqueadores" id="ti_betabloqueadores1" value="Sí">
                                        <label class="form-check-label" for="ti_betabloqueadores1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_betabloqueadores" id="ti_betabloqueadores2" value="No">
                                        <label class="form-check-label" for="ti_betabloqueadores2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_diureticos_asa1" class="form-label mb-0">Diuréticos de asa <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_diureticos_asa" id="ti_diureticos_asa1" value="Sí">
                                        <label class="form-check-label" for="ti_diureticos_asa1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_diureticos_asa" id="ti_diureticos_asa2" value="No">
                                        <label class="form-check-label" for="ti_diureticos_asa2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_vasodilatadores1" class="form-label mb-0">Vasodilatadores <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_vasodilatadores" id="ti_vasodilatadores1" value="Sí">
                                        <label class="form-check-label" for="ti_vasodilatadores1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_vasodilatadores" id="ti_vasodilatadores2" value="No">
                                        <label class="form-check-label" for="ti_vasodilatadores2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_vasopresores1" class="form-label mb-0">Vasopresores <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_vasopresores" id="ti_vasopresores1" value="Sí">
                                        <label class="form-check-label" for="ti_vasopresores1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_vasopresores" id="ti_vasopresores2" value="No">
                                        <label class="form-check-label" for="ti_vasopresores2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_inotropicos1" class="form-label mb-0">Inotrópicos <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_inotropicos" id="ti_inotropicos1" value="Sí">
                                        <label class="form-check-label" for="ti_inotropicos1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_inotropicos" id="ti_inotropicos2" value="No">
                                        <label class="form-check-label" for="ti_inotropicos2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_ieca_ara1" class="form-label mb-0">IECA/ARA <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ieca_ara" id="ti_ieca_ara1" value="Sí">
                                        <label class="form-check-label" for="ti_ieca_ara1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ieca_ara" id="ti_ieca_ara2" value="No">
                                        <label class="form-check-label" for="ti_ieca_ara2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_ventilacion_mecanica1" class="form-label mb-0">Ventilación mecánica <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ventilacion_mecanica" id="ti_ventilacion_mecanica1" value="Sí">
                                        <label class="form-check-label" for="ti_ventilacion_mecanica1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ventilacion_mecanica" id="ti_ventilacion_mecanica2" value="No">
                                        <label class="form-check-label" for="ti_ventilacion_mecanica2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_dialisis1" class="form-label mb-0">Diálisis <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_dialisis" id="ti_dialisis1" value="Sí">
                                        <label class="form-check-label" for="ti_dialisis1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_dialisis" id="ti_dialisis2" value="No">
                                        <label class="form-check-label" for="ti_dialisis2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_rehabilitacion_cardiaca1" class="form-label mb-0">Rehabilitación cardiaca <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_rehabilitacion_cardiaca" id="ti_rehabilitacion_cardiaca1" value="Sí">
                                        <label class="form-check-label" for="ti_rehabilitacion_cardiaca1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_rehabilitacion_cardiaca" id="ti_rehabilitacion_cardiaca2" value="No">
                                        <label class="form-check-label" for="ti_rehabilitacion_cardiaca2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_ventilacion_no_invasiva1" class="form-label mb-0">Ventilación no invasiva</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ventilacion_no_invasiva" id="ti_ventilacion_no_invasiva1" value="Sí">
                                        <label class="form-check-label" for="ti_ventilacion_no_invasiva1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ventilacion_no_invasiva" id="ti_ventilacion_no_invasiva2" value="No">
                                        <label class="form-check-label" for="ti_ventilacion_no_invasiva2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_balon_contrapulsacion_ia1" class="form-label mb-0">Balón de contrapulsación intra aórtico</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_balon_contrapulsacion_ia" id="ti_balon_contrapulsacion_ia1" value="Sí">
                                        <label class="form-check-label" for="ti_balon_contrapulsacion_ia1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_balon_contrapulsacion_ia" id="ti_balon_contrapulsacion_ia2" value="No">
                                        <label class="form-check-label" for="ti_balon_contrapulsacion_ia2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_rehab_cardiaca_intrahosp1" class="form-label mb-0">Rehabilitación Cardiaca Intrahospitalaria</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_rehab_cardiaca_intrahosp" id="ti_rehab_cardiaca_intrahosp1" value="Sí">
                                        <label class="form-check-label" for="ti_rehab_cardiaca_intrahosp1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_rehab_cardiaca_intrahosp" id="ti_rehab_cardiaca_intrahosp2" value="No">
                                        <label class="form-check-label" for="ti_rehab_cardiaca_intrahosp2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_levosimendan1" class="form-label mb-0">Levosimendan</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_levosimendan" id="ti_levosimendan1" value="Sí">
                                        <label class="form-check-label" for="ti_levosimendan1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_levosimendan" id="ti_levosimendan2" value="No">
                                        <label class="form-check-label" for="ti_levosimendan2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ti_marcapaso1" class="form-label mb-0">Marcapasos</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_marcapaso" id="ti_marcapaso1" value="Transitorio">
                                        <label class="form-check-label" for="ti_marcapaso1">Transitorio</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_marcapaso" id="ti_marcapaso2" value="Definitivo">
                                        <label class="form-check-label" for="ti_marcapaso2">Definitivo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_marcapaso" id="ti_marcapaso3" value="No">
                                        <label class="form-check-label" for="ti_marcapaso3">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ti_ecmo1" class="form-label mb-0">ECMO</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ecmo" id="ti_ecmo1" value="Sí">
                                        <label class="form-check-label" for="ti_ecmo1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ti_ecmo" id="ti_ecmo2" value="No">
                                        <label class="form-check-label" for="ti_ecmo2">No</label>
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
                        <input type="number" name="aai_hemoglobina" class="form-control" id="aai_hemoglobina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_leucocitos" class="form-label mb-0">Leucocitos</label>
                        <input type="number" name="aai_leucocitos" class="form-control" id="aai_leucocitos">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_plaquetas" class="form-label mb-0">Plaquetas</label>
                        <input type="number" name="aai_plaquetas" class="form-control" id="aai_plaquetas">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_creatinina" class="form-label mb-0">Creatinina</label>
                        <input type="number" name="aai_creatinina" class="form-control" id="aai_creatinina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_urea" class="form-label mb-0">Úrea</label>
                        <input type="number" name="aai_urea" class="form-control" id="aai_urea">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_glucosa" class="form-label mb-0">Glucosa</label>
                        <input type="number" name="aai_glucosa" class="form-control" id="aai_glucosa">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_troponina_iot_primer" class="form-label mb-0">Troponina I o T Primer control</label>
                        <input type="number" name="aai_troponina_iot_primer" class="form-control" id="aai_troponina_iot_primer">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_troponina_iot_segundo" class="form-label mb-0">Troponina I o T Segundo control</label>
                        <input type="number" name="aai_troponina_iot_segundo" class="form-control" id="aai_troponina_iot_segundo">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_cpk_total" class="form-label mb-0">CPK total</label>
                        <input type="number" name="aai_cpk_total" class="form-control" id="aai_cpk_total">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_cpk_mb" class="form-label mb-0">CPK-MB</label>
                        <input type="number" name="aai_cpk_mb" class="form-control" id="aai_cpk_mb">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_lactato" class="form-label mb-0">Lactato</label>
                        <input type="number" name="aai_lactato" class="form-control" id="aai_lactato">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_fevi" class="form-label mb-0">Fracción de eyección ventricular izquierda</label>
                        <input type="number" name="aai_fevi" class="form-control" id="aai_fevi">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_fecha_pm_fevi" class="form-label mb-0">Fecha de primera medición de fracción de eyección ventricular izquierda</label>
                        <input type="date" name="aai_fecha_pm_fevi" class="form-control" id="aai_fecha_pm_fevi">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_horas_troponina" class="form-label mb-0">Nº de horas al 2º control de Troponina</label>
                        <input type="number" name="aai_horas_troponina" class="form-control" id="aai_horas_troponina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aai_hemoglobina_glicosilada" class="form-label mb-0">Hemoglobina Glicosilada</label>
                        <input type="number" name="aai_hemoglobina_glicosilada" class="form-control" id="aai_hemoglobina_glicosilada">
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
                        <label for="ma_aspirina1" class="form-label mb-0">Aspirina <small class="text-danger">(al alta)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_aspirina" id="ma_aspirina1" value="Sí">
                                <label class="form-check-label" for="ma_aspirina1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_aspirina" id="ma_aspirina2" value="No">
                                <label class="form-check-label" for="ma_aspirina2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_ip2y121" class="form-label mb-0">IP2Y12</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ip2y12" id="ma_ip2y121" value="Clopidogrel">
                                <label class="form-check-label" for="ma_ip2y121">Clopidogrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ip2y12" id="ma_ip2y122" value="Prasugrel">
                                <label class="form-check-label" for="ma_ip2y122">Prasugrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ip2y12" id="ma_ip2y123" value="Ticagrelor">
                                <label class="form-check-label" for="ma_ip2y123">Ticagrelor</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_estatinas1" class="form-label mb-0">Estatinas</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_estatinas" id="ma_estatinas1" value="Sí">
                                <label class="form-check-label" for="ma_estatinas1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_estatinas" id="ma_estatinas2" value="No">
                                <label class="form-check-label" for="ma_estatinas2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_betabloqueadores1" class="form-label mb-0">Betabloqueadores </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_betabloqueadores" id="ma_betabloqueadores1" value="Sí">
                                <label class="form-check-label" for="ma_betabloqueadores1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_betabloqueadores" id="ma_betabloqueadores2" value="No">
                                <label class="form-check-label" for="ma_betabloqueadores2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_diureticos_asa1" class="form-label mb-0">Diuréticos de asa </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_diureticos_asa" id="ma_diureticos_asa1" value="Sí">
                                <label class="form-check-label" for="ma_diureticos_asa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_diureticos_asa" id="ma_diureticos_asa2" value="No">
                                <label class="form-check-label" for="ma_diureticos_asa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_antagonistas_mineralocorticoide1" class="form-label mb-0">Antagonistas de mineralocorticoides </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_antagonistas_mineralocorticoide" id="ma_antagonistas_mineralocorticoide1" value="Sí">
                                <label class="form-check-label" for="ma_antagonistas_mineralocorticoide1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_antagonistas_mineralocorticoide" id="ma_antagonistas_mineralocorticoide2" value="No">
                                <label class="form-check-label" for="ma_antagonistas_mineralocorticoide2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_ieca_ara1" class="form-label mb-0">IECA/ARA </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ieca_ara" id="ma_ieca_ara1" value="Sí">
                                <label class="form-check-label" for="ma_ieca_ara1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_ieca_ara" id="ma_ieca_ara2" value="No">
                                <label class="form-check-label" for="ma_ieca_ara2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_inhibidores_p2y121" class="form-label mb-0">Inhibidores del receptor P2Y12 </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_inhibidores_p2y12" id="ma_inhibidores_p2y121" value="Sí">
                                <label class="form-check-label" for="ma_inhibidores_p2y121">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_inhibidores_p2y12" id="ma_inhibidores_p2y122" value="No">
                                <label class="form-check-label" for="ma_inhibidores_p2y122">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ma_nitratos1" class="form-label mb-0">Nitratos </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_nitratos" id="ma_nitratos1" value="Sí">
                                <label class="form-check-label" for="ma_nitratos1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ma_nitratos" id="ma_nitratos2" value="No">
                                <label class="form-check-label" for="ma_nitratos2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ma_anticoagulacion" class="form-label mb-0">Anticoagulación </label>
                        <select class="form-control" name="ma_anticoagulacion" id="ma_anticoagulacion">
                            <option value="">Seleccionar...</option>
                            <option value="Warfarina">Warfarina</option>
                            <option value="Apixaban">Apixaban</option>
                            <option value="Dabigatran">Dabigatran</option>
                            <option value="Rivaroxaban">Rivaroxaban</option>
                            <option value="Edoxaban">Edoxaban</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!--Datos de pronóstico-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Datos de pronóstico</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2">
                        <label for="dp_muerte_hospitalaria1" class="form-label mb-0">Muerte hospitalaria</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_muerte_hospitalaria" id="dp_muerte_hospitalaria1" value="Sí">
                                <label class="form-check-label" for="dp_muerte_hospitalaria1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_muerte_hospitalaria" id="dp_muerte_hospitalaria2" value="No">
                                <label class="form-check-label" for="dp_muerte_hospitalaria2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_muerte_hospitalaria" class="form-label mb-0">Fecha de muerte hospitalaria</label>
                        <input type="date" name="dp_fecha_muerte_hospitalaria" class="form-control" id="dp_fecha_muerte_hospitalaria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_muerte_cardiovascular_alta1" class="form-label mb-0">Muerte cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_muerte_cardiovascular_alta" id="dp_muerte_cardiovascular_alta1" value="Sí">
                                <label class="form-check-label" for="dp_muerte_cardiovascular_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_muerte_cardiovascular_alta" id="dp_muerte_cardiovascular_alta2" value="No">
                                <label class="form-check-label" for="dp_muerte_cardiovascular_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_muerte_cardiovascular_alta" class="form-label mb-0">Fecha de muerte cardiovascular</label>
                        <input type="date" name="dp_fecha_muerte_cardiovascular_alta" class="form-control" id="dp_fecha_muerte_cardiovascular_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_muerte_no_cardiovascular_alta1" class="form-label mb-0">Muerte no cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_muerte_no_cardiovascular_alta" id="dp_muerte_no_cardiovascular_alta1" value="Sí">
                                <label class="form-check-label" for="dp_muerte_no_cardiovascular_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_muerte_no_cardiovascular_alta" id="dp_muerte_no_cardiovascular_alta2" value="No">
                                <label class="form-check-label" for="dp_muerte_no_cardiovascular_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_muerte_no_cardiovascular_alta" class="form-label mb-0">Fecha de muerte no cardiovascular</label>
                        <input type="date" name="dp_fecha_muerte_no_cardiovascular_alta" class="form-control" id="dp_fecha_muerte_no_cardiovascular_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_angina_postinfarto1" class="form-label mb-0">Angina postinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_angina_postinfarto" id="dp_angina_postinfarto1" value="Sí">
                                <label class="form-check-label" for="dp_angina_postinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_angina_postinfarto" id="dp_angina_postinfarto2" value="No">
                                <label class="form-check-label" for="dp_angina_postinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_angina_postinfarto" class="form-label mb-0">Fecha de angina postinfarto</label>
                        <input type="date" name="dp_fecha_angina_postinfarto" class="form-control" id="dp_fecha_angina_postinfarto">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_reinfarto1" class="form-label mb-0">Reinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_reinfarto" id="dp_reinfarto1" value="Sí">
                                <label class="form-check-label" for="dp_reinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_reinfarto" id="dp_reinfarto2" value="No">
                                <label class="form-check-label" for="dp_reinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_reinfarto" class="form-label mb-0">Fecha de reinfarto</label>
                        <input type="date" name="dp_fecha_reinfarto" class="form-control" id="dp_fecha_reinfarto">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_acv_alta1" class="form-label mb-0">ACV al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_acv_alta" id="dp_acv_alta1" value="Sí">
                                <label class="form-check-label" for="dp_acv_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_acv_alta" id="dp_acv_alta2" value="No">
                                <label class="form-check-label" for="dp_acv_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_acv_alta" class="form-label mb-0">Fecha de ACV</label>
                        <input type="date" name="dp_fecha_acv_alta" class="form-control" id="dp_fecha_acv_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_trombosis_stent_alta1" class="form-label mb-0">Trombosis de stent al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_trombosis_stent_alta" id="dp_trombosis_stent_alta1" value="Sí">
                                <label class="form-check-label" for="dp_trombosis_stent_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_trombosis_stent_alta" id="dp_trombosis_stent_alta2" value="No">
                                <label class="form-check-label" for="dp_trombosis_stent_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_trombosis_stent_alta" class="form-label mb-0">Fecha de trombosis de stent</label>
                        <input type="date" name="dp_fecha_trombosis_stent_alta" class="form-control" id="dp_fecha_trombosis_stent_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_rehospitalizacion_falla_cardiaca1" class="form-label mb-0">Rehospitalización por falla cardiaca</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_rehospitalizacion_falla_cardiaca" id="dp_rehospitalizacion_falla_cardiaca1" value="Sí">
                                <label class="form-check-label" for="dp_rehospitalizacion_falla_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_rehospitalizacion_falla_cardiaca" id="dp_rehospitalizacion_falla_cardiaca2" value="No">
                                <label class="form-check-label" for="dp_rehospitalizacion_falla_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_rehospitalizacion_falla_cardiaca" class="form-label mb-0">Fecha de rehospitalización por falla cardiaca</label>
                        <input type="date" name="dp_fecha_rehospitalizacion_falla_cardiaca" class="form-control" id="dp_fecha_rehospitalizacion_falla_cardiaca">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_sangrado1" class="form-label mb-0">Sangrado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado" id="dp_sangrado1" value="Sí">
                                <label class="form-check-label" for="dp_sangrado1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado" id="dp_sangrado2" value="No">
                                <label class="form-check-label" for="dp_sangrado2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_sangrado_segun_barc0" class="form-label mb-0">Sangrado según BARC:</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado_segun_barc" id="dp_sangrado_segun_barc0" value="0">
                                <label class="form-check-label" for="dp_sangrado_segun_barc0">0</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado_segun_barc" id="dp_sangrado_segun_barc1" value="1">
                                <label class="form-check-label" for="dp_sangrado_segun_barc1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado_segun_barc" id="dp_sangrado_segun_barc2" value="2">
                                <label class="form-check-label" for="dp_sangrado_segun_barc2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado_segun_barc" id="dp_sangrado_segun_barc3" value="3">
                                <label class="form-check-label" for="dp_sangrado_segun_barc3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado_segun_barc" id="dp_sangrado_segun_barc4" value="4">
                                <label class="form-check-label" for="dp_sangrado_segun_barc4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_sangrado_segun_barc" id="dp_sangrado_segun_barc5" value="5">
                                <label class="form-check-label" for="dp_sangrado_segun_barc5">5</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_sangrado" class="form-label mb-0">Fecha de sangrado</label>
                        <input type="date" name="dp_fecha_sangrado" class="form-control" id="dp_fecha_sangrado">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_rehabilitacion_cardiaca_alta1" class="form-label mb-0">Rehabilitación cardiaca al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_rehabilitacion_cardiaca_alta" id="dp_rehabilitacion_cardiaca_alta1" value="Sí">
                                <label class="form-check-label" for="dp_rehabilitacion_cardiaca_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dp_rehabilitacion_cardiaca_alta" id="dp_rehabilitacion_cardiaca_alta2" value="No">
                                <label class="form-check-label" for="dp_rehabilitacion_cardiaca_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_segunda_medicion_fevi_alta" class="form-label mb-0">Segunda medición de fracción de eyección ventricular izquierda al alta <small class="text-danger">(%)</small></label>
                        <input type="number" name="dp_segunda_medicion_fevi_alta" class="form-control" id="dp_segunda_medicion_fevi_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_segunda_fevi_alta" class="form-label mb-0">Fecha de segunda medición de fracción de eyección ventricular izquierda al alta</label>
                        <input type="date" name="dp_fecha_segunda_fevi_alta" class="form-control" id="dp_fecha_segunda_fevi_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_fecha_de_alta" class="form-label mb-0">Fecha de Alta </label>
                        <input type="date" name="dp_fecha_de_alta" class="form-control" id="dp_fecha_de_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dp_dias_hospitalizacion" class="form-label mb-0">Dias de Hospitalización </label>
                        <input type="number" name="dp_dias_hospitalizacion" class="form-control" id="dp_dias_hospitalizacion">
                    </div>

                </div>
            </div>
        </div>

        <!--Seguimiento Clínico-->
        <div class="card shadow mb-4">
            <div class="card-header bg-danger py-3">
                <h6 class="m-0 font-weight-bold text-white">Seguimiento Clínico</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2">
                        <label for="sc_muerte_hospitalaria1" class="form-label mb-0">Muerte Intra-Hospitalaria</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_hospitalaria" id="sc_muerte_hospitalaria1" value="Sí">
                                <label class="form-check-label" for="sc_muerte_hospitalaria1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_hospitalaria" id="sc_muerte_hospitalaria2" value="No">
                                <label class="form-check-label" for="sc_muerte_hospitalaria2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_muerte_hospitalaria" class="form-label mb-0">Fecha de muerte Intra-Hospitalaria</label>
                        <input type="date" name="sc_fecha_muerte_hospitalaria" class="form-control" id="sc_fecha_muerte_hospitalaria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_muerte_cardiovascular_alta1" class="form-label mb-0">Muerte cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_cardiovascular_alta" id="sc_muerte_cardiovascular_alta1" value="Sí">
                                <label class="form-check-label" for="sc_muerte_cardiovascular_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_cardiovascular_alta" id="sc_muerte_cardiovascular_alta2" value="No">
                                <label class="form-check-label" for="sc_muerte_cardiovascular_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_muerte_cardiovascular_alta" class="form-label mb-0">Fecha de muerte cardiovascular</label>
                        <input type="date" name="sc_fecha_muerte_cardiovascular_alta" class="form-control" id="sc_fecha_muerte_cardiovascular_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_muerte_no_cardiovascular_alta1" class="form-label mb-0">Muerte no cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_no_cardiovascular_alta" id="sc_muerte_no_cardiovascular_alta1" value="Sí">
                                <label class="form-check-label" for="sc_muerte_no_cardiovascular_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_muerte_no_cardiovascular_alta" id="sc_muerte_no_cardiovascular_alta2" value="No">
                                <label class="form-check-label" for="sc_muerte_no_cardiovascular_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_muerte_no_cardiovascular_alta" class="form-label mb-0">Fecha de muerte no cardiovascular</label>
                        <input type="date" name="sc_fecha_muerte_no_cardiovascular_alta" class="form-control" id="sc_fecha_muerte_no_cardiovascular_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_angina_postinfarto1" class="form-label mb-0">Angina postinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_angina_postinfarto" id="sc_angina_postinfarto1" value="Sí">
                                <label class="form-check-label" for="sc_angina_postinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_angina_postinfarto" id="sc_angina_postinfarto2" value="No">
                                <label class="form-check-label" for="sc_angina_postinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_angina_postinfarto" class="form-label mb-0">Fecha de angina postinfarto</label>
                        <input type="date" name="sc_fecha_angina_postinfarto" class="form-control" id="sc_fecha_angina_postinfarto">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_reinfarto1" class="form-label mb-0">Reinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_reinfarto" id="sc_reinfarto1" value="Sí">
                                <label class="form-check-label" for="sc_reinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_reinfarto" id="sc_reinfarto2" value="No">
                                <label class="form-check-label" for="sc_reinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_reinfarto" class="form-label mb-0">Fecha de reinfarto</label>
                        <input type="date" name="sc_fecha_reinfarto" class="form-control" id="sc_fecha_reinfarto">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_acv1" class="form-label mb-0">ACV</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_acv" id="sc_acv1" value="TIA">
                                <label class="form-check-label" for="sc_acv1">TIA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_acv" id="sc_acv2" value="Isquemico">
                                <label class="form-check-label" for="sc_acv2">Isquemico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_acv" id="sc_acv3" value="Hemorragico">
                                <label class="form-check-label" for="sc_acv3">Hemorragico</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_acv" class="form-label mb-0">Fecha de ACV</label>
                        <input type="date" name="sc_fecha_acv" class="form-control" id="sc_fecha_acv">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_shock_cardiogenico1" class="form-label mb-0">Shock Cardiogenico <small class="text-danger">(tipo SCAI)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_shock_cardiogenico" id="sc_shock_cardiogenico1" value="No">
                                <label class="form-check-label" for="sc_shock_cardiogenico1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_shock_cardiogenico" id="sc_shock_cardiogenico2" value="A">
                                <label class="form-check-label" for="sc_shock_cardiogenico2">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_shock_cardiogenico" id="sc_shock_cardiogenico3" value="B">
                                <label class="form-check-label" for="sc_shock_cardiogenico3">B</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_shock_cardiogenico" id="sc_shock_cardiogenico4" value="C">
                                <label class="form-check-label" for="sc_shock_cardiogenico4">C</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_shock_cardiogenico" id="sc_shock_cardiogenico5" value="D">
                                <label class="form-check-label" for="sc_shock_cardiogenico5">D</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_shock_cardiogenico" id="sc_shock_cardiogenico6" value="E">
                                <label class="form-check-label" for="sc_shock_cardiogenico6">E</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_shock_cardiogenico" class="form-label mb-0">Fecha de Dx. de Shock Cardiogenico</label>
                        <input type="date" name="sc_fecha_shock_cardiogenico" class="form-control" id="sc_fecha_shock_cardiogenico">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_paro_cardiorespiratorio_recuperado1" class="form-label mb-0">Paro Cardio Respiratorio Recuperado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_paro_cardiorespiratorio_recuperado" id="sc_paro_cardiorespiratorio_recuperado1" value="Si">
                                <label class="form-check-label" for="sc_paro_cardiorespiratorio_recuperado1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_paro_cardiorespiratorio_recuperado" id="sc_paro_cardiorespiratorio_recuperado2" value="TV/FV">
                                <label class="form-check-label" for="sc_paro_cardiorespiratorio_recuperado2">TV/FV</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_paro_cardiorespiratorio_recuperado" id="sc_paro_cardiorespiratorio_recuperado3" value="Asistolia">
                                <label class="form-check-label" for="sc_paro_cardiorespiratorio_recuperado3">Asistolia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_paro_cardiorespiratorio_recuperado" id="sc_paro_cardiorespiratorio_recuperado4" value="AESP">
                                <label class="form-check-label" for="sc_paro_cardiorespiratorio_recuperado4">AESP</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_paro_cardiorespiratorio_recuperado" class="form-label mb-0">Fecha de Paro Cardio Respiratorio Recuperado</label>
                        <input type="date" name="sc_fecha_paro_cardiorespiratorio_recuperado" class="form-control" id="sc_fecha_paro_cardiorespiratorio_recuperado">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_ruptura_musculo_papilar1" class="form-label mb-0">Ruptura de Musculo Papilar</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_ruptura_musculo_papilar" id="sc_ruptura_musculo_papilar1" value="No">
                                <label class="form-check-label" for="sc_ruptura_musculo_papilar1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_ruptura_musculo_papilar" id="sc_ruptura_musculo_papilar2" value="Sí">
                                <label class="form-check-label" for="sc_ruptura_musculo_papilar2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_ruptura_musculo_papilar" class="form-label mb-0">Fecha de Dx. de Ruptura de Musculo Papilar</label>
                        <input type="date" name="sc_fecha_ruptura_musculo_papilar" class="form-control" id="sc_fecha_ruptura_musculo_papilar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_comunicacion_interventricular1" class="form-label mb-0">Comunicación ínterventricular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_comunicacion_interventricular" id="sc_comunicacion_interventricular1" value="No">
                                <label class="form-check-label" for="sc_comunicacion_interventricular1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_comunicacion_interventricular" id="sc_comunicacion_interventricular2" value="Sí">
                                <label class="form-check-label" for="sc_comunicacion_interventricular2">Sí</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_comunicacion_interventricular" class="form-label mb-0">Fecha de Dx. de Comunicación ínterventricular</label>
                        <input type="date" name="sc_fecha_comunicacion_interventricular" class="form-control" id="sc_fecha_comunicacion_interventricular">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_ruptura_pared_libre1" class="form-label mb-0">Ruptura de Pared Libre</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_ruptura_pared_libre" id="sc_ruptura_pared_libre1" value="No">
                                <label class="form-check-label" for="sc_ruptura_pared_libre1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_ruptura_pared_libre" id="sc_ruptura_pared_libre2" value="Sí">
                                <label class="form-check-label" for="sc_ruptura_pared_libre2">Sí</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_ruptura_pared_libre" class="form-label mb-0">Fecha de Dx. de Ruptura pared libre</label>
                        <input type="date" name="sc_fecha_ruptura_pared_libre" class="form-control" id="sc_fecha_ruptura_pared_libre">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_trombosis_stent1" class="form-label mb-0">Trombosis de stent</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_trombosis_stent" id="sc_trombosis_stent1" value="Sí">
                                <label class="form-check-label" for="sc_trombosis_stent1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_trombosis_stent" id="sc_trombosis_stent2" value="No">
                                <label class="form-check-label" for="sc_trombosis_stent2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_trombosis_stent" class="form-label mb-0">Fecha de trombosis de stent</label>
                        <input type="date" name="sc_fecha_trombosis_stent" class="form-control" id="sc_fecha_trombosis_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_rehospitalizacion_falla_cardiaca1" class="form-label mb-0">Rehospitalización por falla cardiaca</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_rehospitalizacion_falla_cardiaca" id="sc_rehospitalizacion_falla_cardiaca1" value="Sí">
                                <label class="form-check-label" for="sc_rehospitalizacion_falla_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_rehospitalizacion_falla_cardiaca" id="sc_rehospitalizacion_falla_cardiaca2" value="No">
                                <label class="form-check-label" for="sc_rehospitalizacion_falla_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_rehospitalizacion_falla_cardiaca" class="form-label mb-0">Fecha de rehospitalización por falla cardiaca</label>
                        <input type="date" name="sc_fecha_rehospitalizacion_falla_cardiaca" class="form-control" id="sc_fecha_rehospitalizacion_falla_cardiaca">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_sangrado1" class="form-label mb-0">Sangrado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado" id="sc_sangrado1" value="Sí">
                                <label class="form-check-label" for="sc_sangrado1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado" id="sc_sangrado2" value="No">
                                <label class="form-check-label" for="sc_sangrado2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="sc_complicaciones_mecanicas1" class="form-label mb-0 d-block">Complicación mecánicas puesto como variables de seguimiento</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sc_complicaciones_mecanicas[]" id="sc_complicaciones_mecanicas1" value="No">
                                <label class="form-check-label" for="sc_complicaciones_mecanicas1">No</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sc_complicaciones_mecanicas[]" id="sc_complicaciones_mecanicas2" value="Rotura de pared libre o pseudoaneurisma">
                                <label class="form-check-label" for="sc_complicaciones_mecanicas2">Rotura de pared libre o pseudoaneurisma</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sc_complicaciones_mecanicas[]" id="sc_complicaciones_mecanicas3" value="Comunicación interventricular">
                                <label class="form-check-label" for="sc_complicaciones_mecanicas3">Comunicación interventricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sc_complicaciones_mecanicas[]" id="sc_complicaciones_mecanicas4" value="Rotura de músculo papilar">
                                <label class="form-check-label" for="sc_complicaciones_mecanicas4">Rotura de músculo papilar</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sc_complicaciones_mecanicas[]" id="sc_complicaciones_mecanicas5" value="Aneurisma ventricular">
                                <label class="form-check-label" for="sc_complicaciones_mecanicas5">Aneurisma ventricular</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_sangrado_segun_barc1" class="form-label mb-0">Sangrado según BARC:</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc1" value="1">
                                <label class="form-check-label" for="sc_sangrado_segun_barc1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc2" value="2">
                                <label class="form-check-label" for="sc_sangrado_segun_barc2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc3" value="3">
                                <label class="form-check-label" for="sc_sangrado_segun_barc3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc4" value="4">
                                <label class="form-check-label" for="sc_sangrado_segun_barc4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_segun_barc" id="sc_sangrado_segun_barc5" value="5">
                                <label class="form-check-label" for="sc_sangrado_segun_barc5">5</label>
                            </div>
                        </div>

                        <div class="form-control radioptions mt-1 d-none" id="dv_sc_sangrado_barc_tipo">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo1" value="A">
                                <label class="form-check-label" for="sc_sangrado_barc_tipo1">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo2" value="B">
                                <label class="form-check-label" for="sc_sangrado_barc_tipo2">B</label>
                            </div>
                            <div class="form-check form-check-inline" id="dv_sc_sangrado_barc_tipo3">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo3" value="C">
                                <label class="form-check-label" for="sc_sangrado_barc_tipo3">C</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_sangrado" class="form-label mb-0">Fecha de sangrado</label>
                        <input type="date" name="sc_fecha_sangrado" class="form-control" id="sc_fecha_sangrado">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_prc" class="form-label mb-0">Programa de Rehabilitacion Cardiaca</label>
                        <select name="sc_prc" id="sc_prc" class="form-control">
                            <option value="No">No</option>
                            <option value="Completo programa">Completo programa</option>
                            <option value="No completo programa">No completo programa</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_segunda_medicion_fevi_alta" class="form-label mb-0">Segunda medición de fracción de eyección ventricular izquierda<small class="text-danger">(%)</small></label>
                        <input type="number" name="sc_segunda_medicion_fevi_alta" class="form-control" id="sc_segunda_medicion_fevi_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_fecha_segunda_fevi_alta" class="form-label mb-0">Fecha de segunda medición de fracción de eyección ventricular izquierda</label>
                        <input type="date" name="sc_fecha_segunda_fevi_alta" class="form-control" id="sc_fecha_segunda_fevi_alta">
                    </div>
                </div>
            </div>
        </div>

        <!-- boton cancel y Submit -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2 mb-sm-0 text-right">
                        <a href="{{ route('renima.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
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
    const de_antecedentes22 = document.getElementById('dc_antecedentes22');
    const de_antecedentes_otro = document.getElementById('dc_otro_antecedentes');
    de_antecedentes22.addEventListener('change', function() {
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

    //Al hacer change en ea_diagnostico
    const ea_diagnostico = document.getElementById('ea_diagnostico');
    const dv_ea_diagnostico_st = document.getElementById('dv_ea_diagnostico_st');
    const dv_ea_diagnostico_st_elevado = document.getElementById('dv_ea_diagnostico_st_elevado');

    ea_diagnostico.addEventListener('change', function() {
        //reset radio buttons dentro de los dv_
        const radios_dv_ea_diagnostico_st = document.querySelectorAll('#dv_ea_diagnostico_st input[type="radio"]');
        radios_dv_ea_diagnostico_st.forEach(radio => {
            radio.checked = false;
        });

        const radios_dv_ea_diagnostico_st_elevado = document.querySelectorAll('#dv_ea_diagnostico_st_elevado input[type="radio"]');
        radios_dv_ea_diagnostico_st_elevado.forEach(radio => {
            radio.checked = false;
        });

        if (this.value === 'IAM con elevacion del ST') {
            dv_ea_diagnostico_st.classList.add('d-none');
            dv_ea_diagnostico_st_elevado.classList.remove('d-none');
        } else if (this.value === 'Sindrome coronario agudo ST no elevado') {
            dv_ea_diagnostico_st.classList.remove('d-none');
            dv_ea_diagnostico_st_elevado.classList.add('d-none');
        }else{
            dv_ea_diagnostico_st.classList.add('d-none');
            dv_ea_diagnostico_st_elevado.classList.add('d-none');
        }
    });

    //Calcular IMC
    const ea_peso = document.getElementById('ea_peso');
    const ea_talla = document.getElementById('ea_talla');
    const ea_imc = document.getElementById('ea_imc');
    function calcularIMC() {
        // Asegurarse de que la altura no sea cero para evitar división por cero
        if(ea_talla.value <= 0){
            ea_imc.value = '';
            return;
        }

        // Calcular el IMC
        const imc = ea_peso.value / (ea_talla.value ** 2);

        // Mostrar el resultado en el campo de texto
        ea_imc.value = imc.toFixed(2);

    }
    // Agregar eventos
    [ea_peso, ea_talla].forEach(input => {
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
    const dis_tiempo_doorin_doorout = document.getElementById('dis_tiempo_doorin_doorout');
    const dis_fecha_salida_antes_icp = document.getElementById('dis_fecha_salida_antes_icp');
    const dis_hora_salida_antes_icp = document.getElementById('dis_hora_salida_antes_icp');
    const dis_fecha_llegada_centro_icp = document.getElementById('dis_fecha_llegada_centro_icp');
    const dis_hora_llegada_centro_icp = document.getElementById('dis_hora_llegada_centro_icp');
    function calcularTiempoDoorInDoorOut() {
        const fechaSalidaAntesICP = new Date(dis_fecha_salida_antes_icp.value + 'T' + dis_hora_salida_antes_icp.value);
        const fechaLlegadaCentroICP = new Date(dis_fecha_llegada_centro_icp.value + 'T' + dis_hora_llegada_centro_icp.value);

        if (!isNaN(fechaSalidaAntesICP) && !isNaN(fechaLlegadaCentroICP)) {
            const diff = fechaLlegadaCentroICP - fechaSalidaAntesICP;
            const minutos = Math.floor(diff / 1000 / 60);
            dis_tiempo_doorin_doorout.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            dis_tiempo_doorin_doorout.value = ''; // Limpiar el campo si hay un error
        }
    }
    // Agregar eventos
    inputs.push(dis_fecha_salida_antes_icp, dis_hora_salida_antes_icp, dis_fecha_llegada_centro_icp, dis_hora_llegada_centro_icp);
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoDoorInDoorOut);
    });

    //Tiempo promedio de transporte al lugar de la ICP
    const dis_tiepo_transporte_icp = document.getElementById('dis_tiepo_transporte_icp');
    const dis_fecha_inicio_icp = document.getElementById('dis_fecha_inicio_icp');
    const dis_hora_inicio_icp = document.getElementById('dis_hora_inicio_icp');
    function calcularTiempoPromedioTransporteICP() {
        const fechaInicioICP = new Date(dis_fecha_inicio_icp.value + 'T' + dis_hora_inicio_icp.value);
        const fechaLlegadaCentroICP = new Date(dis_fecha_llegada_centro_icp.value + 'T' + dis_hora_llegada_centro_icp.value);

        if (!isNaN(fechaInicioICP) && !isNaN(fechaLlegadaCentroICP)) {
            const diff =  fechaInicioICP - fechaLlegadaCentroICP;
            const minutos = Math.floor(diff / 1000 / 60);
            dis_tiepo_transporte_icp.value = minutos >= 0 ? minutos : 0; // Asegurarse de no mostrar minutos negativos
        } else {
            dis_tiepo_transporte_icp.value = ''; // Limpiar el campo si hay un error
        }
    }
    // Agregar eventos
    inputs.push(dis_fecha_inicio_icp, dis_hora_inicio_icp);
    inputs.forEach(input => {
        input.addEventListener('change', calcularTiempoPromedioTransporteICP);
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
    //radio name 'sc_sangrado_segun_barc'
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
