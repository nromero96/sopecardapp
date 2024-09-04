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
                        <label for="documento_identidad" class="form-label mb-0">Documento de identidad (DNI) <small class="requiredata">*</small></label>
                        <input type="number" name="documento_identidad" class="form-control" id="documento_identidad" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="telefono_contacto" class="form-label mb-0">Teléfono de contacto <small class="requiredata">*</small></label>
                        <input type="number" name="telefono_contacto" class="form-control" id="telefono_contacto" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="celular_contacto_1" class="form-label mb-0">Celular de contacto 1 <small class="requiredata">*</small></label>
                        <input type="number" name="celular_contacto_1" class="form-control" id="celular_contacto_1" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="celular_contacto_2" class="form-label mb-0">Celular de contacto 2 <small class="requiredata">*</small></label>
                        <input type="number" name="celular_contacto_2" class="form-control" id="celular_contacto_2" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="correo" class="form-label mb-0">Correo electrónico del paciente <small class="requiredata">*</small></label>
                        <input type="email" name="correo" class="form-control" id="correo" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="departamento" class="form-label mb-0">Departamento <small class="requiredata">*</small></label>
                        <input type="text" name="departamento" class="form-control" id="departamento">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="provincia" class="form-label mb-0">Provincia <small class="requiredata">*</small></label>
                        <input type="text" name="provincia" class="form-control" id="provincia">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="distrito" class="form-label mb-0">Distrito <small class="requiredata">*</small></label>
                        <input type="text" name="distrito" class="form-control" id="distrito">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="edad" class="form-label mb-0">Edad (años) </label>
                        <input type="number" name="edad" class="form-control" id="edad" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_nacimiento" class="form-label mb-0">Fecha de nacimiento </label>
                        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="sexo" class="form-label mb-0">Sexo </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="Masculino" >
                                <label class="form-check-label" for="sexo1">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="Femenino" >
                                <label class="form-check-label" for="sexo2">Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="estado_civil" class="form-label mb-0">Estado civil </label>
                        <select name="estado_civil" id="estado_civil" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Viudo">Viudo</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tipo_seguro" class="form-label mb-0">Tipo de seguro </label>
                        <select name="tipo_seguro" id="tipo_seguro" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="MINSA">MINSA</option>
                            <option value="EsSalud">EsSalud</option>
                            <option value="FFAA y Policiales">FFAA y Policiales</option>
                            <option value="Privado">Privado</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="otro_tipo_seguro" class="form-control mt-1" id="otro_tipo_seguro" placeholder="Especificar otro tipo de seguro">

                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="grado_instruccion" class="form-label mb-0">Grado de instrucción </label>
                        <select name="grado_instruccion" id="grado_instruccion" class="form-control" >
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
                        <label for="pas_diagnostico" class="form-label mb-0">Presión arterial sistólica <small class="text-danger">(mmHg)</small></label>
                        <input type="number" name="pas_diagnostico" class="form-control" id="pas_diagnostico" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="pad_diagnostico" class="form-label mb-0">Presión arterial diastólica <small class="text-danger">(mmHg)</small></label>
                        <input type="number" name="pad_diagnostico" class="form-control" id="pad_diagnostico" >
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="frecuencia_cardiaca" class="form-label mb-0">Frecuencia cardiaca</label>
                        <input type="number" name="frecuencia_cardiaca" class="form-control" id="frecuencia_cardiaca">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="frecuencia_respiratoria" class="form-label mb-0">Frecuencia respiratoria</label>
                        <input type="number" name="frecuencia_respiratoria" class="form-control" id="frecuencia_respiratoria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="temperatura" class="form-label mb-0">Temperatura <small class="text-danger">(C°)</small></label>
                        <input type="number" name="temperatura" class="form-control" id="temperatura">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="saturacion_oxigeno" class="form-label mb-0">Saturación de oxígeno <small class="text-danger">(%)</small></label>
                        <input type="number" name="saturacion_oxigeno" class="form-control" id="saturacion_oxigeno">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="antecedentes1" class="form-label mb-0 d-block">Antecedentes </label>
                        <div class="form-control radioptions">

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes2" value="Hipertensión arterial">
                                <label class="form-check-label" for="antecedentes2">Hipertensión arterial</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes3" value="Diabetes mellitus">
                                <label class="form-check-label" for="antecedentes3">Diabetes mellitus</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes5" value="Falla cardiaca">
                                <label class="form-check-label" for="antecedentes5">Falla cardiaca</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes6" value="Stroke">
                                <label class="form-check-label" for="antecedentes6">Stroke</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes8" value="Dislipidemia">
                                <label class="form-check-label" for="antecedentes8">Dislipidemia</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes9" value="Enfermedad pulmonar obstructiva crónica">
                                <label class="form-check-label" for="antecedentes9">Enfermedad pulmonar obstructiva crónica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes10" value="Infarto miocárdico antiguo">
                                <label class="form-check-label" for="antecedentes10">Infarto miocárdico antiguo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes11" value="Cáncer">
                                <label class="form-check-label" for="antecedentes11">Cáncer</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes12" value="Enfermedad arterial periférica">
                                <label class="form-check-label" for="antecedentes12">Enfermedad arterial periférica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes13" value="Consumo de tabaco">
                                <label class="form-check-label" for="antecedentes13">Consumo de tabaco</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes14" value="Enfermedad coronaria obstructiva crónica">
                                <label class="form-check-label" for="antecedentes14">Enfermedad coronaria obstructiva crónica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes15" value="Ataque isquémico transitorio">
                                <label class="form-check-label" for="antecedentes15">Ataque isquémico transitorio</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes16" value="Fibrilación auricular">
                                <label class="form-check-label" for="antecedentes16">Fibrilación auricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes17" value="ICP previo">
                                <label class="form-check-label" for="antecedentes17">ICP previo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes18" value="CABG previo">
                                <label class="form-check-label" for="antecedentes18">CABG previo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes19" value="Enfermedad renal crónica">
                                <label class="form-check-label" for="antecedentes19">Enfermedad renal crónica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes20" value="COVID-19">
                                <label class="form-check-label" for="antecedentes20">COVID-19</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes21" value="Gestante">
                                <label class="form-check-label" for="antecedentes21">Gestante</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes21" value="hiperuricemia">
                                <label class="form-check-label" for="antecedentes21">Hiperuricemia</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes21" value="Tabaquismo antiguo">
                                <label class="form-check-label" for="antecedentes21">Tabaquismo antiguo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes21" value="Tabaquismo actual">
                                <label class="form-check-label" for="antecedentes21">Tabaquismo actual</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes21" value="otro">
                                <label class="form-check-label" for="antecedentes21">Otro</label>
                            </div>
                            <input type="text" name="otro_antecedentes" class="form-control mt-0 mb-1" id="otro_antecedentes" placeholder="Especificar otro antecedente">

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
                        <label for="fecha_inicio_sintomas" class="form-label mb-0">Fecha y hora de inicio de síntomas </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_inicio_sintomas" class="form-control rounded-left" id="fecha_inicio_sintomas" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_inicio_sintomas" class="form-control rounded-right" id="hora_inicio_sintomas" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="centro_primer_contacto_medico" class="form-label mb-0">Centro del primer contacto médico </label>
                        <input type="text" name="centro_primer_contacto_medico" class="form-control" id="centro_primer_contacto_medico">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_ingreso" class="form-label mb-0">Fecha y hora al centro de primer contacto medico </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_ingreso" class="form-control rounded-left" id="fecha_ingreso" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_ingreso" class="form-control rounded-right" id="hora_ingreso" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_primer_contacto_medico" class="form-label mb-0">Fecha y hora de primer contacto médico </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_primer_contacto_medico" class="form-control rounded-left" id="fecha_primer_contacto_medico" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_primer_contacto_medico" class="form-control rounded-right" id="hora_primer_contacto_medico" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tiempo_inicio_sintomas_primer_contacto" class="form-label mb-0">Tiempo desde el inicio de síntomas al primer contacto médico <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="tiempo_inicio_sintomas_primer_contacto" class="form-control" id="tiempo_inicio_sintomas_primer_contacto" placeholder="Fecha y hora de primer contacto médico - Fecha y hora de inicio de síntomas" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_ecg" class="form-label mb-0">Fecha y hora de ECG </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_ecg" class="form-control rounded-left" id="fecha_ecg" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_ecg" class="form-control rounded-right" id="hora_ecg" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tiempo_primer_contacto_ecg" class="form-label mb-0">Tiempo desde el primer contacto médico hasta el ECG <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="tiempo_primer_contacto_ecg" class="form-control" id="tiempo_primer_contacto_ecg" placeholder="Fecha y hora de ECG - Fecha y hora de primer contacto médico" readonly>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tiempo_total_isquemia" class="form-label mb-0">Tiempo total de isquemia <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="tiempo_total_isquemia" class="form-control" id="tiempo_total_isquemia">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="manifestacionesclinicas1" class="form-label mb-0 d-block">Manifestaciones clínicas </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas1" value="Dolor torácico (inespecifico)">
                                <label class="form-check-label" for="manifestacionesclinicas1">Dolor torácico (inespecifico)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas3" value="Angina">
                                <label class="form-check-label" for="manifestacionesclinicas3">Angina</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas2" value="Disnea">
                                <label class="form-check-label" for="manifestacionesclinicas2">Disnea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas4" value="Palpitaciones">
                                <label class="form-check-label" for="manifestacionesclinicas4">Palpitaciones</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas5" value="Síncope">
                                <label class="form-check-label" for="manifestacionesclinicas5">Síncope</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas6" value="Mareo">
                                <label class="form-check-label" for="manifestacionesclinicas6">Mareo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Fatiga">
                                <label class="form-check-label" for="manifestacionesclinicas7">Fatiga</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Irradiacion a MMSS">
                                <label class="form-check-label" for="manifestacionesclinicas7">Irradiacion a MMSS</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Dolor mandibular">
                                <label class="form-check-label" for="manifestacionesclinicas7">Dolor mandibular </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Dolor de espalda">
                                <label class="form-check-label" for="manifestacionesclinicas7">Dolor de espalda </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Dolor en nuca">
                                <label class="form-check-label" for="manifestacionesclinicas7">Dolor en nuca </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Nauseas o vomitos">
                                <label class="form-check-label" for="manifestacionesclinicas7">Nauseas o vomitos </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Sudoracion">
                                <label class="form-check-label" for="manifestacionesclinicas7">Sudoracion </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas7" value="Ortopnea">
                                <label class="form-check-label" for="manifestacionesclinicas7">Ortopnea </label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas8" value="Soplo cardiaco">
                                <label class="form-check-label" for="manifestacionesclinicas8">Soplo cardiaco</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas9" value="Ruido S3">
                                <label class="form-check-label" for="manifestacionesclinicas9">Ruido S3</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas10" value="Ruido S4">
                                <label class="form-check-label" for="manifestacionesclinicas10">Ruido S4</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas11" value="Ingurgitación yugular">
                                <label class="form-check-label" for="manifestacionesclinicas11">Ingurgitación yugular</label>
                            </div>

                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas11" value="Crepitantes">
                                <label class="form-check-label" for="manifestacionesclinicas11">Crepitantes</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas11" value="Cianosis">
                                <label class="form-check-label" for="manifestacionesclinicas11">Cianosis</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas11" value="Llenado capilar > 2”">
                                <label class="form-check-label" for="manifestacionesclinicas11">Llenado capilar > 2”</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas11" value="Edemas de mmii">
                                <label class="form-check-label" for="manifestacionesclinicas11">Edemas de mmii</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas11" value="Trastorno de conciencia">
                                <label class="form-check-label" for="manifestacionesclinicas11">Trastorno de conciencia</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="clasificacion_kk1" class="form-label mb-0">Clasificación Killip Kimball</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clasificacion_kk" id="clasificacion_kk1" value="1" >
                                <label class="form-check-label" for="clasificacion_kk1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clasificacion_kk" id="clasificacion_kk2" value="2" >
                                <label class="form-check-label" for="clasificacion_kk2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clasificacion_kk" id="clasificacion_kk3" value="3" >
                                <label class="form-check-label" for="clasificacion_kk3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clasificacion_kk" id="clasificacion_kk4" value="4" >
                                <label class="form-check-label" for="clasificacion_kk4">4</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diagnostico_ima1" class="form-label mb-0">Diagnóstico</label>
                        <select class="form-control" name="diagnostico_ima">
                            <option>Seleccionar...</option>
                            <option>IAM con elevacion del ST </option>
                            <option>Sindrome coronario agudo ST no elevado </option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diagnostico_ima1" class="form-label mb-0">ST..... <small>Al seleccionar Sindrome coronario agudo ST no elevado</small> </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diagnostico_ima" id="diagnostico_ima1" value="IAM ST no Elevado" >
                                <label class="form-check-label" for="diagnostico_ima1">IAM ST no Elevado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diagnostico_ima" id="diagnostico_ima2" value="Angina Inestable" >
                                <label class="form-check-label" for="diagnostico_ima2">Angina Inestable</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="riesgo_imanostelevado1" class="form-label mb-0">Riesgo en IMA no ST elevado... <small>al seleccionar: IAM con elevacion del ST</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="riesgo_imanostelevado" id="riesgo_imanostelevado1" value="No alto riesgo" >
                                <label class="form-check-label" for="riesgo_imanostelevado1">No alto riesgo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="riesgo_imanostelevado" id="riesgo_imanostelevado2" value="Alto riesgo" >
                                <label class="form-check-label" for="riesgo_imanostelevado2">Alto riesgo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="riesgo_imanostelevado" id="riesgo_imanostelevado3" value="Muy alto riesgo" >
                                <label class="form-check-label" for="riesgo_imanostelevado3">Muy alto riesgo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="heart_score" class="form-label mb-0">HEART score</label>
                        <select name="heart_score" id="heart_score" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Bajo (0-3 puntos)">Bajo (0-3 puntos)</option>
                            <option value="Intermedio (4-6 puntos)">Intermedio (4-6 puntos)</option>
                            <option value="Alto (>7 puntos)">Alto (>7 puntos)</option>
                        </select>
                    </div>

                    <div class="col-md-5 mb-2">
                        <label for="peso" class="form-label mb-0">Peso actual <small class="text-danger">(Kg)</small></label>
                        <input type="number" name="peso" class="form-control" id="peso" step="0.01">
                    </div>
                    <div class="col-md-5 mb-2">
                        <label for="talla" class="form-label mb-0">Talla actual <small class="text-danger">(m)</small></label>
                        <input type="number" name="talla" class="form-control" id="talla" step="0.01">
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="imc" class="form-label mb-0">IMC</label>
                        <input type="number" name="imc" class="form-control" id="imc" step="0.01" placeholder="IMC: Completar peso y talla" readonly>
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
                        <label for="manejo" class="form-label mb-0">Ritmo</label>
                        <select name="ritmo" id="ritmo" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Sinusal">Sinusal</option>
                            <option value="Fibrilacion Auricular">Fibrilacion Auricular</option>
                            <option value="BAV II O III grado">BAV II O III grado</option>
                            <option value="TV/FV">TV/FV</option>
                        </select>
                    </div>


                    <div class="col-md-12 mb-2">
                        <label for="iamcest_localizacion" class="form-label mb-0">IAMCEST localizacion</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion1" value="Septal (V1-V2)">
                                <label class="form-check-label" for="iamcest_localizacion1">Septal (V1-V2)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion2" value="Anterior (V3-V4)">
                                <label class="form-check-label" for="iamcest_localizacion2">Anterior (V3-V4)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion3" value="Anteroseptal (V1-V4)">
                                <label class="form-check-label" for="iamcest_localizacion3">Anteroseptal (V1-V4)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion4" value="Lateral (I, AVL+ V5- V6)">
                                <label class="form-check-label" for="iamcest_localizacion4">Lateral (I, AVL+ V5- V6)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion5" value="Antero-lateral (I-AVL, V3-V6)">
                                <label class="form-check-label" for="iamcest_localizacion5">Antero-lateral (I-AVL, V3-V6)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion6" value="Anterior extensa (V1-V6, I-AVL)">
                                <label class="form-check-label" for="iamcest_localizacion6">Anterior extensa (V1-V6, I-AVL)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion7" value="Inferior (II-III-AVF)">
                                <label class="form-check-label" for="iamcest_localizacion7">Inferior (II-III-AVF)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion8" value="Posterior (V7-V9)">
                                <label class="form-check-label" for="iamcest_localizacion8">Posterior (V7-V9)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion9" value="Infero-posterior (II-III-AVF, V7-V9)">
                                <label class="form-check-label" for="iamcest_localizacion9">Infero-posterior (II-III-AVF, V7-V9)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion10" value="Infero-postero-lateral (II-III-AVF, I-AVL, V7-V9)">
                                <label class="form-check-label" for="iamcest_localizacion10">Infero-postero-lateral (II-III-AVF, I-AVL, V7-V9)</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_localizacion[]" id="iamcest_localizacion11" value="Infero-postero-lateral + VD (II-III-AVF+V3R-V4R)">
                                <label class="form-check-label" for="iamcest_localizacion11">Infero-postero-lateral + VD (II-III-AVF+V3R-V4R)</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="iamcest_extension" class="form-label mb-0">SCASEST</label>
                        <div class="form-control radioptions">
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension1" value="Depresion del ST T">
                                <label class="form-check-label" for="iamcest_extension1">Depresion del ST T</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension2" value="Ondas T negativas">
                                <label class="form-check-label" for="iamcest_extension2">Ondas T negativas</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension3" value="Wellens">
                                <label class="form-check-label" for="iamcest_extension3">Wellens</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension4" value="Winter">
                                <label class="form-check-label" for="iamcest_extension4">Winter</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension5" value="Bandera Sudafricana">
                                <label class="form-check-label" for="iamcest_extension5">Bandera Sudafricana</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension6" value="Tronco coronario/Multiarterial">
                                <label class="form-check-label" for="iamcest_extension6">Tronco coronario/Multiarterial</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension7" value="ST elevado no persistente">
                                <label class="form-check-label" for="iamcest_extension7">ST elevado no persistente</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension8" value="BCRIHH">
                                <label class="form-check-label" for="iamcest_extension8">BCRIHH</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension9" value="BCRIHH Brugada positivo">
                                <label class="form-check-label" for="iamcest_extension9">BCRIHH Brugada positivo</label>
                            </div>
                            <div class="form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="iamcest_extension[]" id="iamcest_extension10" value="Rectificacion del ST">
                                <label class="form-check-label" for="iamcest_extension10">Rectificacion del ST</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="iamcest_extension" class="form-label mb-0">Otro</label>
                        <input type="text" name="iamcest_extension_otro" class="form-control" id="iamcest_extension_otro">
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
                        <label for="manejo" class="form-label mb-0">Manejo</label>
                        <select name="manejo" id="manejo" class="form-control" >
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
                        <label for="transferido_fibrinolisis1" class="form-label mb-0">¿Tranferido para fibrinólisis?</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="transferido_fibrinolisis" id="transferido_fibrinolisis1" value="Si" >
                                <label class="form-check-label" for="transferido_fibrinolisis1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="transferido_fibrinolisis" id="transferido_fibrinolisis2" value="No" >
                                <label class="form-check-label" for="transferido_fibrinolisis2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="lugar_transferencia_fibrinolisis" class="form-label mb-0">Lugar de transferencia para fibrinólisis</label>
                        <select name="lugar_transferencia_fibrinolisis" id="lugar_transferencia_fibrinolisis" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Mismo centro">Mismo centro</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="lugar_transferencia_fibrinolisis_otro" class="form-control" id="lugar_transferencia_fibrinosis_otro" placeholder="Especificar">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_fibrinolisis" class="form-label mb-0">Fecha y hora de fibrinólisis</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_fibrinolisis" class="form-control rounded-left" id="fecha_fibrinolisis" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_fibrinolisis" class="form-control rounded-right" id="hora_fibrinolisis" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Tiempo desde el ECG hasta fibrinólisis <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="" class="form-control" id="tiempo_ecg_fibrinolisis" placeholder="Fecha y hora de fibrinolisis - Fecha y hora de ECG" readonly>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="tipo_fibrinolisis1" class="form-label mb-0 d-block">Tipo de fibrinólisis </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tipo_fibrinolisis[]" id="tipo_fibrinolisis1" value="Alteplasa">
                                <label class="form-check-label" for="tipo_fibrinolisis1">Alteplasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tipo_fibrinolisis[]" id="tipo_fibrinolisis2" value="Estreptoquinasa">
                                <label class="form-check-label" for="tipo_fibrinolisis2">Estreptoquinasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tipo_fibrinolisis[]" id="tipo_fibrinolisis3" value="Tenecteplasa">
                                <label class="form-check-label" for="tipo_fibrinolisis3">Tenecteplasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tipo_fibrinolisis[]" id="tipo_fibrinolisis4" value="Reteplasa">
                                <label class="form-check-label" for="tipo_fibrinolisis4">Reteplasa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tipo_fibrinolisis[]" id="tipo_fibrinolisis5" value="Otro">
                                <label class="form-check-label" for="tipo_fibrinolisis5">Otro</label>
                                <input type="text" name="tipo_fibrinolisis_otro" class="form-control" id="tipo_fibrinolisis_otro" placeholder="Especificar">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fibrinolisis_exitosa1" class="form-label mb-0">Fibrinólisis exitosa <small class="text-danger">(Caida del ST más del 50%)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fibrinolisis_exitosa" id="fibrinolisis_exitosa1" value="Sí" >
                                <label class="form-check-label" for="fibrinolisis_exitosa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fibrinolisis_exitosa" id="fibrinolisis_exitosa2" value="No" >
                                <label class="form-check-label" for="fibrinolisis_exitosa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="angioplastia_rescate1" class="form-label mb-0">Angioplastía de rescate</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="angioplastia_rescate" id="angioplastia_rescate1" value="Sí" >
                                <label class="form-check-label" for="angioplastia_rescate1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="angioplastia_rescate" id="angioplastia_rescate2" value="No" >
                                <label class="form-check-label" for="angioplastia_rescate2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fibrinolisis_suspendida" class="form-label mb-0">Fibrinólisis suspendida</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fibrinolisis_suspendida" id="fibrinolisis_suspendida1" value="Sí" >
                                <label class="form-check-label" for="fibrinolisis_suspendida1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fibrinolisis_suspendida" id="fibrinolisis_suspendida2" value="No" >
                                <label class="form-check-label" for="fibrinolisis_suspendida2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="causa_suspension" class="form-label mb-0">Causa de suspensión</label>
                        <input type="text" name="causa_suspension" class="form-control" id="causa_suspension">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fuetransferido_icp" class="form-label mb-0">¿Fue transferido para ICP? </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fuetransferido_icp" id="fuetransferido_icp1" value="Sí" >
                                <label class="form-check-label" for="fuetransferido_icp1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fuetransferido_icp" id="fuetransferido_icp2" value="No" >
                                <label class="form-check-label" for="fuetransferido_icp2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="lugar_transferencia_icp" class="form-label mb-0">Lugar de transferencia para ICP</label>
                        <select name="lugar_transferencia_icp" class="form-control" id="lugar_transferencia_icp">
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
                            <option value="OTRO">Otro</option>
                        </select>
                        <input type="text" name="lugar_transferencia_icp_otro" class="form-control" id="lugar_transferencia_icp_otro" placeholder="Especificar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_salida_antes_icp" class="form-label mb-0">Fecha y hora de salida antes de la ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_salida_antes_icp" class="form-control rounded-left" id="fecha_salida_antes_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_salida_antes_icp" class="form-control rounded-right" id="hora_salida_antes_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tiempo_doorin_doorout" class="form-label mb-0">Tiempo del door-in al door-out <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="tiempo_doorin_doorout" class="form-control" id="tiempo_doorin_doorout" placeholder="Fecha y hora de salida antes de la ICP - Fecha y hora de llegada al centro para ICP" readonly>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_llegada_centro_icp" class="form-label mb-0">Fecha y hora de llegada al centro para ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_llegada_centro_icp" class="form-control rounded-left" id="fecha_llegada_centro_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_llegada_centro_icp" class="form-control rounded-right" id="hora_llegada_centro_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tiepo_transporte_icp" class="form-label mb-0">Tiempo promedio de transporte al lugar de la ICP <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="tiepo_transporte_icp" class="form-control" id="tiepo_transporte_icp" placeholder="Fecha y hora de llegada al centro para ICP - Fecha y hora de inicio de ICP" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_inicio_icp" class="form-label mb-0">Fecha y hora de inicio de ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_inicio_icp" class="form-control rounded-left" id="fecha_inicio_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_inicio_icp" class="form-control rounded-right" id="hora_inicio_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tiempo_puerta_balloon" class="form-label mb-0">Modo de Transporte a ICP</label>
                        <select name="modo_transporte_icp" id="modo_transporte_icp" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Terrestre">Terrestre</option>
                            <option value="Aereo">Aereo</option>
                            <option value="Fluvial">Fluvial</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tipo_acceso" class="form-label mb-0">Tipo de acceso</label>
                        <select name="tipo_acceso" id="tipo_acceso" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Radial distal">Radial distal</option>
                            <option value="Radial convencional">Radial convencional</option>
                            <option value="Braquial">Braquial</option>
                            <option value="Femoral">Femoral</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="arteria_responsable" class="form-label mb-0">Arteria responsable del IMA</label>
                        <select name="arteria_responsable" id="arteria_responsable" class="form-control" >
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
                        <label for="fecha_apertura" class="form-label mb-0">Fecha y hora de apertura</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_apertura" class="form-control rounded-left" id="fecha_apertura" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_apertura" class="form-control rounded-right" id="hora_apertura" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="flujo_inicial_timi1" class="form-label mb-0">Flujo inicial según TIMI</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_inicial_timi" id="flujo_inicial_timi1" value="0" >
                                <label class="form-check-label" for="flujo_inicial_timi1">0</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_inicial_timi" id="flujo_inicial_timi2" value="1" >
                                <label class="form-check-label" for="flujo_inicial_timi2">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_inicial_timi" id="flujo_inicial_timi3" value="2" >
                                <label class="form-check-label" for="flujo_inicial_timi3">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_inicial_timi" id="flujo_inicial_timi4" value="3" >
                                <label class="form-check-label" for="flujo_inicial_timi4">3</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="flujo_final_timi" class="form-label mb-0">Flujo final según TIMI</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_final_timi" id="flujo_final_timi1" value="0" >
                                <label class="form-check-label" for="flujo_final_timi1">0</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_final_timi" id="flujo_final_timi2" value="1" >
                                <label class="form-check-label" for="flujo_final_timi2">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_final_timi" id="flujo_final_timi3" value="2" >
                                <label class="form-check-label" for="flujo_final_timi3">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="flujo_final_timi" id="flujo_final_timi4" value="3" >
                                <label class="form-check-label" for="flujo_final_timi4">3</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tipo_stent" class="form-label mb-0">Tipo de stent</label>
                        <select name="tipo_stent" id="tipo_stent" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Solo Angioplastia con balón">Solo Angioplastia con balón</option>
                            <option value="Stent no medicado">Stent no medicado</option>
                            <option value="Stent medicado">Stent medicado</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tipo_stent" class="form-label mb-0">Numero de stents</label>
                        <input type="number" name="numero_stents" class="form-control" id="numero_stents">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diametro_stent" class="form-label mb-0">Diámetro del stent <small class="text-danger">(mm)</small></label>
                        <input type="number" name="diametro_stent" class="form-control" id="diametro_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="longitud_stent" class="form-label mb-0">Longitud del stent <small class="text-danger">(mm)</small></label>
                        <input type="number" name="longitud_stent" class="form-control" id="longitud_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="predilatacion" class="form-label mb-0">Predilatación</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="predilatacion" id="predilatacion1" value="Sí" >
                                <label class="form-check-label" for="predilatacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="predilatacion" id="predilatacion2" value="No" >
                                <label class="form-check-label" for="predilatacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="postdilatacion" class="form-label mb-0">Postdilatación</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="postdilatacion" id="postdilatacion1" value="Sí" >
                                <label class="form-check-label" for="postdilatacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="postdilatacion" id="postdilatacion2" value="No" >
                                <label class="form-check-label" for="postdilatacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="otra_intervencion" class="form-label mb-0">Otra intervención</label>
                        <select name="otra_intervencion" id="otra_intervencion" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="No">No</option>
                            <option value="Aspirador de trombo">Aspirador de trombo</option>
                            <option value="Microcatéter">Microcatéter</option>
                            <option value="Lisis intracoronaria">Lisis intracoronaria</option>
                            <option value="Guideliner">Guideliner</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="exito_icp" class="form-label mb-0">Éxito de ICP</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exito_icp" id="exito_icp1" value="Sí" >
                                <label class="form-check-label" for="exito_icp1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exito_icp" id="exito_icp2" value="No" >
                                <label class="form-check-label" for="exito_icp2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_fin_icp" class="form-label mb-0">Fecha y hora del fin de la ICP</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="date" name="fecha_fin_icp" class="form-control rounded-left" id="fecha_fin_icp" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="time" name="hora_fin_icp" class="form-control rounded-right" id="hora_fin_icp" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-6">
                        <label for="duracion_icp" class="form-label mb-0">Duración de la ICP <small class="text-danger">(minutos)</small></label>
                        <input type="number" name="duracion_icp" class="form-control" id="duracion_icp">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="complicaciones_dela_icp1" class="form-label mb-0 d-block">Complicaciones de la ICP </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp1" value="No">
                                <label class="form-check-label" for="complicaciones_dela_icp1">No</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp2" value="No reflow">
                                <label class="form-check-label" for="complicaciones_dela_icp2">No reflow</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp3" value="Disección coronaria">
                                <label class="form-check-label" for="complicaciones_dela_icp3">Disección coronaria</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp4" value="Trombosis">
                                <label class="form-check-label" for="complicaciones_dela_icp4">Trombosis</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp5" value="Cierre de otra arteria">
                                <label class="form-check-label" for="complicaciones_dela_icp5">Cierre de otra arteria</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp6" value="Infarto miocárdico peri-intervención coronaria percutánea">
                                <label class="form-check-label" for="complicaciones_dela_icp6">Infarto miocárdico peri-intervención coronaria percutánea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp7" value="PCR">
                                <label class="form-check-label" for="complicaciones_dela_icp7">PCR</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp8" value="Bradicardia con colocación de marcapasos">
                                <label class="form-check-label" for="complicaciones_dela_icp8">Bradicardia con colocación de marcapasos</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp9" value="Muerte">
                                <label class="form-check-label" for="complicaciones_dela_icp9">Muerte</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp10" value="Infraexpansión">
                                <label class="form-check-label" for="complicaciones_dela_icp10">Infraexpansión</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp11" value="Sobrexpansión">
                                <label class="form-check-label" for="complicaciones_dela_icp11">Sobrexpansión</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp12" value="ACV">
                                <label class="form-check-label" for="complicaciones_dela_icp12">ACV</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_dela_icp[]" id="complicaciones_dela_icp13" value="Otro">
                                <label class="form-check-label" for="complicaciones_dela_icp13">Otro</label>
                                <input type="text" name="complicaciones_dela_icp_otro" class="form-control" id="complicaciones_dela_icp_otro" placeholder="Especificar">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="otrastenosis_coronaria" class="form-label mb-0">Otra estenosis coronaria</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="otrastenosis_coronaria" id="otrastenosis_coronaria1" value="Sí" >
                                <label class="form-check-label" for="otrastenosis_coronaria1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="otrastenosis_coronaria" id="otrastenosis_coronaria2" value="No" >
                                <label class="form-check-label" for="otrastenosis_coronaria2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="icp_otras_lesiones" class="form-label mb-0">ICP de otras lesiones</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="icp_otras_lesiones" id="icp_otras_lesiones1" value="Sí" >
                                <label class="form-check-label" for="icp_otras_lesiones1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="icp_otras_lesiones" id="icp_otras_lesiones2" value="No" >
                                <label class="form-check-label" for="icp_otras_lesiones2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="decisio_icp_basada" class="form-label mb-0">Decisión basada por</label>
                        <select name="decisio_icp_basada" id="decisio_icp_basada" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Anatomia">Anatomia</option>
                            <option value="Guía de presión">Guía de presión</option>
                            <option value="IVUS">IVUS</option>
                            <option value="Prueba de isquemia">Prueba de isquemia</option>
                            <option value="PEG">PEG</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="momento_icp_otras_lesiones" class="form-label mb-0">Momento del ICP de Otras lesiones</label>
                        <select name="momento_icp_otras_lesiones" id="momento_icp_otras_lesiones" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Durante el procedimiento Indice">Durante el procedimiento Indice</option>
                            <option value="Antes del Alta">Antes del Alta</option>
                            <option value="Despues del Alta">Despues del Alta</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="cuan_dias_antes_despues_alta_icp" class="form-label mb-0">A los Cuantos dias antes o despues del Alta se realizo la ICP de las otras arterias</label>
                        <input type="number" name="cuan_dias_antes_despues_alta_icp" class="form-control" id="cuan_dias_antes_despues_alta_icp">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="revascularizacion_completa" class="form-label mb-0">Revascularización Completa</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="revascularizacion_completa" id="revascularizacion_completa1" value="Sí" >
                                <label class="form-check-label" for="revascularizacion_completa1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="revascularizacion_completa" id="revascularizacion_completa2" value="No" >
                                <label class="form-check-label" for="revascularizacion_completa2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="complicaciones_mecanicas1" class="form-label mb-0 d-block">Complicación mecánicas puesto como variables de seguimiento</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_mecanicas[]" id="complicaciones_mecanicas1" value="No">
                                <label class="form-check-label" for="complicaciones_mecanicas1">No</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_mecanicas[]" id="complicaciones_mecanicas2" value="Rotura de pared libre o pseudoaneurisma">
                                <label class="form-check-label" for="complicaciones_mecanicas2">Rotura de pared libre o pseudoaneurisma</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_mecanicas[]" id="complicaciones_mecanicas3" value="Comunicación interventricular">
                                <label class="form-check-label" for="complicaciones_mecanicas3">Comunicación interventricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_mecanicas[]" id="complicaciones_mecanicas4" value="Rotura de músculo papilar">
                                <label class="form-check-label" for="complicaciones_mecanicas4">Rotura de músculo papilar</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="complicaciones_mecanicas[]" id="complicaciones_mecanicas5" value="Aneurisma ventricular">
                                <label class="form-check-label" for="complicaciones_mecanicas5">Aneurisma ventricular</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="reperfusion" class="form-label mb-0">Reperfusion</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reperfusion" id="reperfusion1" value="Sí" >
                                <label class="form-check-label" for="reperfusion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reperfusion" id="reperfusion2" value="No" >
                                <label class="form-check-label" for="reperfusion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="motivo_deno_reperfusion" class="form-label mb-0">Motivo de no reperfusión</label>
                        <select name="motivo_deno_reperfusion" id="motivo_deno_reperfusion" class="form-control" >
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
                        <input type="text" name="motivo_deno_reperfusion_otro" class="form-control" id="motivo_deno_reperfusion_otro " placeholder="Especificar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="motivo_cabg" class="form-label mb-0">Motivo de CABG</label>
                        <select name="motivo_cabg" id="motivo_cabg" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="ICP frustra">ICP frustra</option>
                            <option value="Complicacion de una ICP">Complicacion de una ICP</option>
                            <option value="Contraindicaciones tecnicas de una ICP por Anatomia">Contraindicaciones tecnicas de una ICP por Anatomia</option>
                            <option value="Complicacion Mecanica asociada">Complicacion Mecanica asociada</option>
                            <option value="Shock Cardiogenico refractario">Shock Cardiogenico refractario</option>
                            <option value="Otras">Otras</option>
                        </select>
                        <input type="text" name="motivo_cabg_otro" class="form-control" id="motivo_cabg_otro" placeholder="Especificar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="puntaje_grace" class="form-label mb-0">Puntaje GRACE</label>
                        <input type="number" name="puntaje_grace" class="form-control" id="puntaje_grace">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="otros_cambios_ecg" class="form-label mb-0">Puntaje Crussade</label>
                        <input type="text" name="punaje_crussade" class="form-control" id="punaje_crussade">
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
                        <label for="aspirina_en_hospitalizacion1" class="form-label mb-0">Aspirina <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aspirina_en_hospitalizacion" id="aspirina_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="aspirina_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aspirina_en_hospitalizacion" id="aspirina_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="aspirina_en_hospitalizacion2">No</label>
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
                        <label for="enoxaparina_en_hospitalizacion1" class="form-label mb-0">Enoxaparina <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enoxaparina_en_hospitalizacion" id="enoxaparina_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="enoxaparina_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enoxaparina_en_hospitalizacion" id="enoxaparina_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="enoxaparina_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="heparina_no_fraccionada_en_hospitalizacion1" class="form-label mb-0">Heparina no fraccionada <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="heparina_no_fraccionada_en_hospitalizacion" id="heparina_no_fraccionada_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="heparina_no_fraccionada_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="heparina_no_fraccionada_en_hospitalizacion" id="heparina_no_fraccionada_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="heparina_no_fraccionada_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="atorvastatina_en_hospitalizacion1" class="form-label mb-0">Atorvastatina <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="atorvastatina_en_hospitalizacion" id="atorvastatina_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="atorvastatina_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="atorvastatina_en_hospitalizacion" id="atorvastatina_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="atorvastatina_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="betabloqueadores_en_hospitalizacion1" class="form-label mb-0">Betabloqueadores <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="betabloqueadores_en_hospitalizacion" id="betabloqueadores_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="betabloqueadores_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="betabloqueadores_en_hospitalizacion" id="betabloqueadores_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="betabloqueadores_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diureticos_de_asa_en_hospitalizacion1" class="form-label mb-0">Diuréticos de asa <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diureticos_de_asa_en_hospitalizacion" id="diureticos_de_asa_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="diureticos_de_asa_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diureticos_de_asa_en_hospitalizacion" id="diureticos_de_asa_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="diureticos_de_asa_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="vasodilatadores_en_hospitalizacion1" class="form-label mb-0">Vasodilatadores <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vasodilatadores_en_hospitalizacion" id="vasodilatadores_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="vasodilatadores_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vasodilatadores_en_hospitalizacion" id="vasodilatadores_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="vasodilatadores_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="vasopresores_en_hospitalizacion1" class="form-label mb-0">Vasopresores <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vasopresores_en_hospitalizacion" id="vasopresores_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="vasopresores_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vasopresores_en_hospitalizacion" id="vasopresores_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="vasopresores_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="inotropicos_en_hospitalizacion1" class="form-label mb-0">Inotrópicos <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inotropicos_en_hospitalizacion" id="inotropicos_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="inotropicos_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inotropicos_en_hospitalizacion" id="inotropicos_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="inotropicos_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ieca_ara_en_hospitalizacion1" class="form-label mb-0">IECA/ARA <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ieca_ara_en_hospitalizacion" id="ieca_ara_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="ieca_ara_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ieca_ara_en_hospitalizacion" id="ieca_ara_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="ieca_ara_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ventilacion_mecanica_en_hospitalizacion1" class="form-label mb-0">Ventilación mecánica <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventilacion_mecanica_en_hospitalizacion" id="ventilacion_mecanica_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="ventilacion_mecanica_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventilacion_mecanica_en_hospitalizacion" id="ventilacion_mecanica_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="ventilacion_mecanica_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="dialisis_en_hospitalizacion1" class="form-label mb-0">Diálisis <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dialisis_en_hospitalizacion" id="dialisis_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="dialisis_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dialisis_en_hospitalizacion" id="dialisis_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="dialisis_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="rehabilitacion_cardiaca_en_hospitalizacion1" class="form-label mb-0">Rehabilitación cardiaca <small class="text-danger">(en hospitalización)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_en_hospitalizacion" id="rehabilitacion_cardiaca_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="rehabilitacion_cardiaca_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_en_hospitalizacion" id="rehabilitacion_cardiaca_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="rehabilitacion_cardiaca_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

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
                        <label for="dmf_diureticos_asa1" class="form-label mb-0">Antagonistas de mineralocorticoides <small class="text-danger">(en hospitalización)</small></label>
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
                        <label for="dmf_diureticos_asa1" class="form-label mb-0">IECA/ARA <small class="text-danger">(en hospitalización)</small></label>
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
                        <label for="dmf_diureticos_asa1" class="form-label mb-0">Inhibidores del receptor P2Y12 <small class="text-danger">(en hospitalización)</small></label>
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
                        <label for="hemoglobina_al_ingreso)" class="form-label mb-0">Hemoglobina <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="hemoglobina_al_ingreso" class="form-control" id="hemoglobina_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="leucocitos_al_ingreso" class="form-label mb-0">Leucocitos <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="leucocitos_al_ingreso" class="form-control" id="leucocitos_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="plaquetas_al_ingreso" class="form-label mb-0">Plaquetas <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="plaquetas_al_ingreso" class="form-control" id="plaquetas_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="creatinina_al_ingreso" class="form-label mb-0">Creatinina <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="creatinina_al_ingreso" class="form-control" id="creatinina_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="urea_al_ingreso" class="form-label mb-0">Úrea <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="urea_al_ingreso" class="form-control" id="urea_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="glucosa_al_ingreso" class="form-label mb-0">Glucosa <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="glucosa_al_ingreso" class="form-control" id="glucosa_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="troponina_t_al_ingreso" class="form-label mb-0">Troponina T <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="troponina_t_al_ingreso" class="form-control" id="troponina_t_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="troponina_i_al_ingreso" class="form-label mb-0">Troponina I <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="troponina_i_al_ingreso" class="form-control" id="troponina_i_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cpk_total_al_ingreso" class="form-label mb-0">CPK total <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="cpk_total_al_ingreso" class="form-control" id="cpk_total_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cpk_mb_al_ingreso" class="form-label mb-0">CPK-MB <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="cpk_mb_al_ingreso" class="form-control" id="cpk_mb_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lactato_al_ingreso" class="form-label mb-0">Lactato <small class="text-danger">(al ingreso)</small></label>
                        <input type="number" name="lactato_al_ingreso" class="form-control" id="lactato_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fevi_ingreso" class="form-label mb-0">Fracción de eyección ventricular izquierda <small class="text-danger">(%, al ingreso)</small></label>
                        <input type="number" name="fevi_ingreso" class="form-control" id="fevi_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fevi_ingreso" class="form-label mb-0">Fracción de eyección ventricular izquierda <small class="text-danger">(%, en hospitalización)</small></label>
                        <input type="number" name="fevi_ingreso" class="form-control" id="fevi_ingreso">
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
                                <label for="aspirina_en_hospitalizacion1" class="form-label mb-0">Aspirina <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aspirina_en_hospitalizacion" id="aspirina_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="aspirina_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aspirina_en_hospitalizacion" id="aspirina_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="aspirina_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ip2y12" class="form-label mb-0">IP2Y12</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ip2y12" id="ip2y121" value="Clopidogrel">
                                        <label class="form-check-label" for="ip2y121">Clopidogrel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ip2y12" id="ip2y122" value="Prasugrel">
                                        <label class="form-check-label" for="ip2y122">Prasugrel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ip2y12" id="ip2y123" value="Ticagrelor">
                                        <label class="form-check-label" for="ip2y123">Ticagrelor</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="enoxaparina_en_hospitalizacion1" class="form-label mb-0">Enoxaparina <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="enoxaparina_en_hospitalizacion" id="enoxaparina_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="enoxaparina_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="enoxaparina_en_hospitalizacion" id="enoxaparina_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="enoxaparina_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="heparina_no_fraccionada_en_hospitalizacion1" class="form-label mb-0">Heparina no fraccionada <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="heparina_no_fraccionada_en_hospitalizacion" id="heparina_no_fraccionada_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="heparina_no_fraccionada_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="heparina_no_fraccionada_en_hospitalizacion" id="heparina_no_fraccionada_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="heparina_no_fraccionada_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="atorvastatina_en_hospitalizacion1" class="form-label mb-0">Atorvastatina <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atorvastatina_en_hospitalizacion" id="atorvastatina_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="atorvastatina_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atorvastatina_en_hospitalizacion" id="atorvastatina_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="atorvastatina_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="betabloqueadores_en_hospitalizacion1" class="form-label mb-0">Betabloqueadores <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="betabloqueadores_en_hospitalizacion" id="betabloqueadores_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="betabloqueadores_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="betabloqueadores_en_hospitalizacion" id="betabloqueadores_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="betabloqueadores_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="diureticos_de_asa_en_hospitalizacion1" class="form-label mb-0">Diuréticos de asa <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="diureticos_de_asa_en_hospitalizacion" id="diureticos_de_asa_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="diureticos_de_asa_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="diureticos_de_asa_en_hospitalizacion" id="diureticos_de_asa_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="diureticos_de_asa_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="vasodilatadores_en_hospitalizacion1" class="form-label mb-0">Vasodilatadores <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasodilatadores_en_hospitalizacion" id="vasodilatadores_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="vasodilatadores_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasodilatadores_en_hospitalizacion" id="vasodilatadores_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="vasodilatadores_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="vasopresores_en_hospitalizacion1" class="form-label mb-0">Vasopresores <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasopresores_en_hospitalizacion" id="vasopresores_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="vasopresores_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasopresores_en_hospitalizacion" id="vasopresores_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="vasopresores_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="inotropicos_en_hospitalizacion1" class="form-label mb-0">Inotrópicos <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inotropicos_en_hospitalizacion" id="inotropicos_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="inotropicos_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inotropicos_en_hospitalizacion" id="inotropicos_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="inotropicos_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ieca_ara_en_hospitalizacion1" class="form-label mb-0">IECA/ARA <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ieca_ara_en_hospitalizacion" id="ieca_ara_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="ieca_ara_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ieca_ara_en_hospitalizacion" id="ieca_ara_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="ieca_ara_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ventilacion_mecanica_en_hospitalizacion1" class="form-label mb-0">Ventilación mecánica <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ventilacion_mecanica_en_hospitalizacion" id="ventilacion_mecanica_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="ventilacion_mecanica_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ventilacion_mecanica_en_hospitalizacion" id="ventilacion_mecanica_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="ventilacion_mecanica_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="dialisis_en_hospitalizacion1" class="form-label mb-0">Diálisis <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dialisis_en_hospitalizacion" id="dialisis_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="dialisis_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dialisis_en_hospitalizacion" id="dialisis_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="dialisis_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="rehabilitacion_cardiaca_en_hospitalizacion1" class="form-label mb-0">Rehabilitación cardiaca <small class="text-danger">(en hospitalización)</small></label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_en_hospitalizacion" id="rehabilitacion_cardiaca_en_hospitalizacion1" value="Sí">
                                        <label class="form-check-label" for="rehabilitacion_cardiaca_en_hospitalizacion1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_en_hospitalizacion" id="rehabilitacion_cardiaca_en_hospitalizacion2" value="No">
                                        <label class="form-check-label" for="rehabilitacion_cardiaca_en_hospitalizacion2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="ventilacion_no_invasiva" class="form-label mb-0">Ventilación no invasiva</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ventilacion_no_invasiva" id="ventilacion_no_invasiva1" value="Sí">
                                        <label class="form-check-label" for="ventilacion_no_invasiva1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="ventilacion_no_invasiva" id="ventilacion_no_invasiva2" value="No">
                                        <label class="form-check-label" for="ventilacion_no_invasiva2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="balon_de_contrapulsacion_intra_aortico" class="form-label mb-0">Balón de contrapulsación intra aórtico</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="balon_de_contrapulsacion_intra_aortico" id="balon_de_contrapulsacion_intra_aortico1" value="Sí">
                                        <label class="form-check-label" for="balon_de_contrapulsacion_intra_aortico1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="balon_de_contrapulsacion_intra_aortico" id="balon_de_contrapulsacion_intra_aortico2" value="No">
                                        <label class="form-check-label" for="balon_de_contrapulsacion_intra_aortico2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="rehabilitacion_cardiaca_intrahospitalaria" class="form-label mb-0">Rehabilitación Cardiaca Intrahospitalaria</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_intrahospitalaria" id="rehabilitacion_cardiaca_intrahospitalaria1" value="Sí">
                                        <label class="form-check-label" for="rehabilitacion_cardiaca_intrahospitalaria1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_intrahospitalaria" id="rehabilitacion_cardiaca_intrahospitalaria2" value="No">
                                        <label class="form-check-label" for="rehabilitacion_cardiaca_intrahospitalaria2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="levosimendan" class="form-label mb-0">Levosimendan</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="levosimendan" id="levosimendan1" value="Sí">
                                        <label class="form-check-label" for="levosimendan1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="levosimendan" id="levosimendan2" value="No">
                                        <label class="form-check-label" for="levosimendan2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="marcapaso" class="form-label mb-0">Marcapasos</label>
                                <div class="form-control radioptions">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marcapaso" id="marcapaso1" value="Transitorio">
                                        <label class="form-check-label" for="marcapaso1">Transitorio</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marcapaso" id="marcapaso2" value="Definitivo">
                                        <label class="form-check-label" for="marcapaso2">Definitivo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marcapaso" id="marcapaso3" value="No">
                                        <label class="form-check-label" for="marcapaso3">No</label>
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
                        <label for="hemoglobina_al_ingreso)" class="form-label mb-0">Hemoglobina</label>
                        <input type="number" name="hemoglobina_al_ingreso" class="form-control" id="hemoglobina_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="leucocitos_al_ingreso" class="form-label mb-0">Leucocitos</label>
                        <input type="number" name="leucocitos_al_ingreso" class="form-control" id="leucocitos_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="plaquetas_al_ingreso" class="form-label mb-0">Plaquetas</label>
                        <input type="number" name="plaquetas_al_ingreso" class="form-control" id="plaquetas_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="creatinina_al_ingreso" class="form-label mb-0">Creatinina</label>
                        <input type="number" name="creatinina_al_ingreso" class="form-control" id="creatinina_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="urea_al_ingreso" class="form-label mb-0">Úrea</label>
                        <input type="number" name="urea_al_ingreso" class="form-control" id="urea_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="glucosa_al_ingreso" class="form-label mb-0">Glucosa</label>
                        <input type="number" name="glucosa_al_ingreso" class="form-control" id="glucosa_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="troponina_t_al_ingreso" class="form-label mb-0">Troponina I o T Primer control</label>
                        <input type="number" name="troponina_t_al_ingreso" class="form-control" id="troponina_t_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="troponina_i_al_ingreso" class="form-label mb-0">Troponina I o T Segundo control</label>
                        <input type="number" name="troponina_i_al_ingreso" class="form-control" id="troponina_i_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cpk_total_al_ingreso" class="form-label mb-0">CPK total</label>
                        <input type="number" name="cpk_total_al_ingreso" class="form-control" id="cpk_total_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cpk_mb_al_ingreso" class="form-label mb-0">CPK-MB</label>
                        <input type="number" name="cpk_mb_al_ingreso" class="form-control" id="cpk_mb_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lactato_al_ingreso" class="form-label mb-0">Lactato</label>
                        <input type="number" name="lactato_al_ingreso" class="form-control" id="lactato_al_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fevi_ingreso" class="form-label mb-0">Fracción de eyección ventricular izquierda</label>
                        <input type="number" name="fevi_ingreso" class="form-control" id="fevi_ingreso">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_FEVI" class="form-label mb-0">Fecha de primera medición de fracción de eyección ventricular izquierda</label>
                        <input type="date" name="fecha_FEVI" class="form-control" id="fecha_FEVI">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="horas_troponina" class="form-label mb-0">Nº de horas al 2º control de Troponina</label>
                        <input type="number" name="horas_troponina" class="form-control" id="horas_troponina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hemoglobina_glicosilada" class="form-label mb-0">Hemoglobina Glicosilada</label>
                        <input type="number" name="hemoglobina_glicosilada" class="form-control" id="hemoglobina_glicosilada">
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
                        <label for="aspirina_al_alta1" class="form-label mb-0">Aspirina <small class="text-danger">(al alta)</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aspirina_al_alta" id="aspirina_al_alta1" value="Sí">
                                <label class="form-check-label" for="aspirina_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="aspirina_al_alta" id="aspirina_al_alta2" value="No">
                                <label class="form-check-label" for="aspirina_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ip2y12_al_alta" class="form-label mb-0">IP2Y12</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ip2y12_al_alta" id="ip2y12_al_alta1" value="Clopidogrel">
                                <label class="form-check-label" for="ip2y12_al_alta1">Clopidogrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ip2y12_al_alta" id="ip2y12_al_alta2" value="Prasugrel">
                                <label class="form-check-label" for="ip2y12_al_alta2">Prasugrel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ip2y12_al_alta" id="ip2y12_al_alta3" value="Ticagrelor">
                                <label class="form-check-label" for="ip2y12_al_alta3">Ticagrelor</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="estatinas_al_alta1" class="form-label mb-0">Estatinas</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estatinas_al_alta" id="estatinas_al_alta1" value="Sí">
                                <label class="form-check-label" for="estatinas_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estatinas_al_alta" id="estatinas_al_alta2" value="No">
                                <label class="form-check-label" for="estatinas_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="betabloqueadores_al_alta1" class="form-label mb-0">Betabloqueadores </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="betabloqueadores_al_alta" id="betabloqueadores_al_alta1" value="Sí">
                                <label class="form-check-label" for="betabloqueadores_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="betabloqueadores_al_alta" id="betabloqueadores_al_alta2" value="No">
                                <label class="form-check-label" for="betabloqueadores_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diureticos_de_asa_al_alta1" class="form-label mb-0">Diuréticos de asa </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diureticos_de_asa_al_alta" id="diureticos_de_asa_al_alta1" value="Sí">
                                <label class="form-check-label" for="diureticos_de_asa_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diureticos_de_asa_al_alta" id="diureticos_de_asa_al_alta2" value="No">
                                <label class="form-check-label" for="diureticos_de_asa_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="antagonistas_de_mineralocorticoides_al_alta1" class="form-label mb-0">Antagonistas de mineralocorticoides </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="antagonistas_de_mineralocorticoides_al_alta" id="antagonistas_de_mineralocorticoides_al_alta1" value="Sí">
                                <label class="form-check-label" for="antagonistas_de_mineralocorticoides_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="antagonistas_de_mineralocorticoides_al_alta" id="antagonistas_de_mineralocorticoides_al_alta2" value="No">
                                <label class="form-check-label" for="antagonistas_de_mineralocorticoides_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ieca_ara_al_alta1" class="form-label mb-0">IECA/ARA </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ieca_ara_al_alta" id="ieca_ara_al_alta1" value="Sí">
                                <label class="form-check-label" for="ieca_ara_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ieca_ara_al_alta" id="ieca_ara_al_alta2" value="No">
                                <label class="form-check-label" for="ieca_ara_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="inhibidores_del_receptor_p2y12_al_alta1" class="form-label mb-0">Inhibidores del receptor P2Y12 </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inhibidores_del_receptor_p2y12_al_alta" id="inhibidores_del_receptor_p2y12_al_alta1" value="Sí">
                                <label class="form-check-label" for="inhibidores_del_receptor_p2y12_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inhibidores_del_receptor_p2y12_al_alta" id="inhibidores_del_receptor_p2y12_al_alta2" value="No">
                                <label class="form-check-label" for="inhibidores_del_receptor_p2y12_al_alta2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nitratos_al_alta1" class="form-label mb-0">Nitratos </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nitratos_al_alta" id="nitratos_al_alta1" value="Sí">
                                <label class="form-check-label" for="nitratos_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nitratos_al_alta" id="nitratos_al_alta2" value="No">
                                <label class="form-check-label" for="nitratos_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="anticoagulacion_al_alta1" class="form-label mb-0">Anticoagulación </label>
                        <select class="form-control" name="anticoagulacion_al_alta" id="anticoagulacion_al_alta">
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
                        <label for="muerte_hospitalaria1" class="form-label mb-0">Muerte hospitalaria</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_hospitalaria" id="muerte_hospitalaria1" value="Sí">
                                <label class="form-check-label" for="muerte_hospitalaria1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_hospitalaria" id="muerte_hospitalaria2" value="No">
                                <label class="form-check-label" for="muerte_hospitalaria2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_muerte_hospitalaria" class="form-label mb-0">Fecha de muerte hospitalaria</label>
                        <input type="date" name="fecha_muerte_hospitalaria" class="form-control" id="fecha_muerte_hospitalaria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="muerte_cardiovascular_al_alta1" class="form-label mb-0">Muerte cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_cardiovascular_al_alta" id="muerte_cardiovascular_al_alta1" value="Sí">
                                <label class="form-check-label" for="muerte_cardiovascular_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_cardiovascular_al_alta" id="muerte_cardiovascular_al_alta2" value="No">
                                <label class="form-check-label" for="muerte_cardiovascular_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_muerte_cardiovascular_al_alta" class="form-label mb-0">Fecha de muerte cardiovascular</label>
                        <input type="date" name="fecha_muerte_cardiovascular_al_alta" class="form-control" id="fecha_muerte_cardiovascular_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="muerte_no_cardiovascular_al_alta1" class="form-label mb-0">Muerte no cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_no_cardiovascular_al_alta" id="muerte_no_cardiovascular_al_alta1" value="Sí">
                                <label class="form-check-label" for="muerte_no_cardiovascular_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_no_cardiovascular_al_alta" id="muerte_no_cardiovascular_al_alta2" value="No">
                                <label class="form-check-label" for="muerte_no_cardiovascular_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_muerte_no_cardiovascular_al_alta" class="form-label mb-0">Fecha de muerte no cardiovascular</label>
                        <input type="date" name="fecha_muerte_no_cardiovascular_al_alta" class="form-control" id="fecha_muerte_no_cardiovascular_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="angina_postinfarto1" class="form-label mb-0">Angina postinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="angina_postinfarto" id="angina_postinfarto1" value="Sí">
                                <label class="form-check-label" for="angina_postinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="angina_postinfarto" id="angina_postinfarto2" value="No">
                                <label class="form-check-label" for="angina_postinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_angina_postinfarto" class="form-label mb-0">Fecha de angina postinfarto</label>
                        <input type="date" name="fecha_angina_postinfarto" class="form-control" id="fecha_angina_postinfarto">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="reinfarto1" class="form-label mb-0">Reinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reinfarto" id="reinfarto1" value="Sí">
                                <label class="form-check-label" for="reinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reinfarto" id="reinfarto2" value="No">
                                <label class="form-check-label" for="reinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_reinfarto" class="form-label mb-0">Fecha de reinfarto</label>
                        <input type="date" name="fecha_reinfarto" class="form-control" id="fecha_reinfarto">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="acv_al_alta1" class="form-label mb-0">ACV al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acv_al_alta" id="acv_al_alta1" value="Sí">
                                <label class="form-check-label" for="acv_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acv_al_alta" id="acv_al_alta2" value="No">
                                <label class="form-check-label" for="acv_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_acv_al_alta" class="form-label mb-0">Fecha de ACV</label>
                        <input type="date" name="fecha_acv_al_alta" class="form-control" id="fecha_acv_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="trombosis_de_stent_al_alta1" class="form-label mb-0">Trombosis de stent al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trombosis_de_stent_al_alta" id="trombosis_de_stent_al_alta1" value="Sí">
                                <label class="form-check-label" for="trombosis_de_stent_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trombosis_de_stent_al_alta" id="trombosis_de_stent_al_alta2" value="No">
                                <label class="form-check-label" for="trombosis_de_stent_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_trombosis_de_stent_al_alta" class="form-label mb-0">Fecha de trombosis de stent</label>
                        <input type="date" name="fecha_trombosis_de_stent_al_alta" class="form-control" id="fecha_trombosis_de_stent_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="rehospitalizacion_por_falla_cardiaca1" class="form-label mb-0">Rehospitalización por falla cardiaca</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehospitalizacion_por_falla_cardiaca" id="rehospitalizacion_por_falla_cardiaca1" value="Sí">
                                <label class="form-check-label" for="rehospitalizacion_por_falla_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehospitalizacion_por_falla_cardiaca" id="rehospitalizacion_por_falla_cardiaca2" value="No">
                                <label class="form-check-label" for="rehospitalizacion_por_falla_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_rehospitalizacion_por_falla_cardiaca" class="form-label mb-0">Fecha de rehospitalización por falla cardiaca</label>
                        <input type="date" name="fecha_rehospitalizacion_por_falla_cardiaca" class="form-control" id="fecha_rehospitalizacion_por_falla_cardiaca">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sangrado1" class="form-label mb-0">Sangrado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado" id="sangrado1" value="Sí">
                                <label class="form-check-label" for="sangrado1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado" id="sangrado2" value="No">
                                <label class="form-check-label" for="sangrado2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sangrado_segun_barc" class="form-label mb-0">Sangrado según BARC:</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc0" value="0">
                                <label class="form-check-label" for="sangrado_segun_barc0">0</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc1" value="1">
                                <label class="form-check-label" for="sangrado_segun_barc1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc2" value="2">
                                <label class="form-check-label" for="sangrado_segun_barc2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc3" value="3">
                                <label class="form-check-label" for="sangrado_segun_barc3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc4" value="4">
                                <label class="form-check-label" for="sangrado_segun_barc4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc5" value="5">
                                <label class="form-check-label" for="sangrado_segun_barc5">5</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_sangrado" class="form-label mb-0">Fecha de sangrado</label>
                        <input type="date" name="fecha_sangrado" class="form-control" id="fecha_sangrado">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="rehabilitacion_cardiaca_al_alta1" class="form-label mb-0">Rehabilitación cardiaca al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_al_alta" id="rehabilitacion_cardiaca_al_alta1" value="Sí">
                                <label class="form-check-label" for="rehabilitacion_cardiaca_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehabilitacion_cardiaca_al_alta" id="rehabilitacion_cardiaca_al_alta2" value="No">
                                <label class="form-check-label" for="rehabilitacion_cardiaca_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="segunda_medicion_FEVI_alta" class="form-label mb-0">Segunda medición de fracción de eyección ventricular izquierda al alta <small class="text-danger">(%)</small></label>
                        <input type="number" name="segunda_medicion_FEVI_alta" class="form-control" id="segunda_medicion_FEVI_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_segunda_FEVI_alta" class="form-label mb-0">Fecha de segunda medición de fracción de eyección ventricular izquierda al alta</label>
                        <input type="date" name="fecha_segunda_FEVI_alta" class="form-control" id="fecha_segunda_FEVI_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_de_alta" class="form-label mb-0">Fecha de Alta </label>
                        <input type="date" name="fecha_de_alta" class="form-control" id="fecha_de_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_de_alta" class="form-label mb-0">Dias de Hospitalización </label>
                        <input type="number" name="dias_de_hospitalizacion" class="form-control" id="dias_de_hospitalizacion">
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
                        <label for="fecha_muerte_hospitalaria" class="form-label mb-0">Fecha de muerte Intra-Hospitalaria</label>
                        <input type="date" name="fecha_muerte_hospitalaria" class="form-control" id="fecha_muerte_hospitalaria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="muerte_cardiovascular_al_alta1" class="form-label mb-0">Muerte cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_cardiovascular_al_alta" id="muerte_cardiovascular_al_alta1" value="Sí">
                                <label class="form-check-label" for="muerte_cardiovascular_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_cardiovascular_al_alta" id="muerte_cardiovascular_al_alta2" value="No">
                                <label class="form-check-label" for="muerte_cardiovascular_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_muerte_cardiovascular_al_alta" class="form-label mb-0">Fecha de muerte cardiovascular</label>
                        <input type="date" name="fecha_muerte_cardiovascular_al_alta" class="form-control" id="fecha_muerte_cardiovascular_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="muerte_no_cardiovascular_al_alta1" class="form-label mb-0">Muerte no cardiovascular al alta</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_no_cardiovascular_al_alta" id="muerte_no_cardiovascular_al_alta1" value="Sí">
                                <label class="form-check-label" for="muerte_no_cardiovascular_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_no_cardiovascular_al_alta" id="muerte_no_cardiovascular_al_alta2" value="No">
                                <label class="form-check-label" for="muerte_no_cardiovascular_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_muerte_no_cardiovascular_al_alta" class="form-label mb-0">Fecha de muerte no cardiovascular</label>
                        <input type="date" name="fecha_muerte_no_cardiovascular_al_alta" class="form-control" id="fecha_muerte_no_cardiovascular_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="angina_postinfarto1" class="form-label mb-0">Angina postinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="angina_postinfarto" id="angina_postinfarto1" value="Sí">
                                <label class="form-check-label" for="angina_postinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="angina_postinfarto" id="angina_postinfarto2" value="No">
                                <label class="form-check-label" for="angina_postinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_angina_postinfarto" class="form-label mb-0">Fecha de angina postinfarto</label>
                        <input type="date" name="fecha_angina_postinfarto" class="form-control" id="fecha_angina_postinfarto">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="reinfarto1" class="form-label mb-0">Reinfarto</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reinfarto" id="reinfarto1" value="Sí">
                                <label class="form-check-label" for="reinfarto1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reinfarto" id="reinfarto2" value="No">
                                <label class="form-check-label" for="reinfarto2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_reinfarto" class="form-label mb-0">Fecha de reinfarto</label>
                        <input type="date" name="fecha_reinfarto" class="form-control" id="fecha_reinfarto">
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
                        <label for="fecha_acv_al_alta" class="form-label mb-0">Fecha de ACV</label>
                        <input type="date" name="fecha_acv_al_alta" class="form-control" id="fecha_acv_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_shock_cardiogenico" class="form-label mb-0">Shock Cardiogenico <small class="text-danger">(tipo SCAI)</small></label>
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
                        <label for="fecha_dx_shock_cardiogenico" class="form-label mb-0">Fecha de Dx. de Shock Cardiogenico</label>
                        <input type="date" name="fecha_dx_shock_cardiogenico" class="form-control" id="fecha_dx_shock_cardiogenico">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="paro_cardiorespiratorio_recuperado" class="form-label mb-0">Paro Cardio Respiratorio Recuperado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paro_cardiorespiratorio_recuperado" id="paro_cardiorespiratorio_recuperado1" value="Si">
                                <label class="form-check-label" for="paro_cardiorespiratorio_recuperado1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paro_cardiorespiratorio_recuperado" id="paro_cardiorespiratorio_recuperado2" value="TV/FV">
                                <label class="form-check-label" for="paro_cardiorespiratorio_recuperado2">TV/FV</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paro_cardiorespiratorio_recuperado" id="paro_cardiorespiratorio_recuperado3" value="Asistolia">
                                <label class="form-check-label" for="paro_cardiorespiratorio_recuperado3">Asistolia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="paro_cardiorespiratorio_recuperado" id="paro_cardiorespiratorio_recuperado4" value="AESP">
                                <label class="form-check-label" for="paro_cardiorespiratorio_recuperado4">AESP</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_paro_cardiorespiratorio_recuperado" class="form-label mb-0">Fecha de Paro Cardio Respiratorio Recuperado</label>
                        <input type="date" name="fecha_paro_cardiorespiratorio_recuperado" class="form-control" id="fecha_paro_cardiorespiratorio_recuperado">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ruptura_de_musculo_papilar" class="form-label mb-0">Ruptura de Musculo Papilar</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ruptura_de_musculo_papilar" id="ruptura_de_musculo_papilar1" value="No">
                                <label class="form-check-label" for="ruptura_de_musculo_papilar1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ruptura_de_musculo_papilar" id="ruptura_de_musculo_papilar2" value="Sí">
                                <label class="form-check-label" for="ruptura_de_musculo_papilar2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_dx_ruptura_de_musculo_papilar" class="form-label mb-0">Fecha de Dx. de Ruptura de Musculo Papilar</label>
                        <input type="date" name="fecha_dx_ruptura_de_musculo_papilar" class="form-control" id="fecha_dx_ruptura_de_musculo_papilar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="comunicacion_interventricular" class="form-label mb-0">Comunicación ínterventricular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="comunicacion_interventricular" id="comunicacion_interventricular1" value="No">
                                <label class="form-check-label" for="comunicacion_interventricular1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="comunicacion_interventricular" id="comunicacion_interventricular2" value="Sí">
                                <label class="form-check-label" for="comunicacion_interventricular2">Sí</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_dx_comunicacion_interventricular" class="form-label mb-0">Fecha de Dx. de Comunicación ínterventricular</label>
                        <input type="date" name="fecha_dx_comunicacion_interventricular" class="form-control" id="fecha_dx_comunicacion_interventricular">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ruptura_pared_libre" class="form-label mb-0">Ruptura de Pared Libre</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ruptura_pared_libre" id="ruptura_pared_libre1" value="No">
                                <label class="form-check-label" for="ruptura_pared_libre1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ruptura_pared_libre" id="ruptura_pared_libre2" value="Sí">
                                <label class="form-check-label" for="ruptura_pared_libre2">Sí</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_dx_ruptura_pared_libre" class="form-label mb-0">Fecha de Dx. de Ruptura pared libre</label>
                        <input type="date" name="fecha_dx_ruptura_pared_libre" class="form-control" id="fecha_dx_ruptura_pared_libre">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_trombosis_de_stent1" class="form-label mb-0">Trombosis de stent</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_trombosis_de_stent" id="sc_trombosis_de_stent1" value="Sí">
                                <label class="form-check-label" for="sc_trombosis_de_stent1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_trombosis_de_stent" id="sc_trombosis_de_stent2" value="No">
                                <label class="form-check-label" for="sc_trombosis_de_stent2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_trombosis_de_stent_al_alta" class="form-label mb-0">Fecha de trombosis de stent</label>
                        <input type="date" name="fecha_trombosis_de_stent_al_alta" class="form-control" id="fecha_trombosis_de_stent_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="rehospitalizacion_por_falla_cardiaca1" class="form-label mb-0">Rehospitalización por falla cardiaca</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehospitalizacion_por_falla_cardiaca" id="rehospitalizacion_por_falla_cardiaca1" value="Sí">
                                <label class="form-check-label" for="rehospitalizacion_por_falla_cardiaca1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rehospitalizacion_por_falla_cardiaca" id="rehospitalizacion_por_falla_cardiaca2" value="No">
                                <label class="form-check-label" for="rehospitalizacion_por_falla_cardiaca2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_rehospitalizacion_por_falla_cardiaca" class="form-label mb-0">Fecha de rehospitalización por falla cardiaca</label>
                        <input type="date" name="fecha_rehospitalizacion_por_falla_cardiaca" class="form-control" id="fecha_rehospitalizacion_por_falla_cardiaca">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sangrado1" class="form-label mb-0">Sangrado</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado" id="sangrado1" value="Sí">
                                <label class="form-check-label" for="sangrado1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado" id="sangrado2" value="No">
                                <label class="form-check-label" for="sangrado2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sangrado_segun_barc" class="form-label mb-0">Sangrado según BARC:</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc0" value="0">
                                <label class="form-check-label" for="sangrado_segun_barc0">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sangrado_segun_barc" id="sangrado_segun_barc1" value="1">
                                <label class="form-check-label" for="sangrado_segun_barc1">5</label>
                            </div>
                        </div>

                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo1" value="A">
                                <label class="form-check-label" for="sc_sangrado_barc_tipo1">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo2" value="B">
                                <label class="form-check-label" for="sc_sangrado_barc_tipo2">B</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sc_sangrado_barc_tipo" id="sc_sangrado_barc_tipo3" value="C">
                                <label class="form-check-label" for="sc_sangrado_barc_tipo3">C</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_sangrado" class="form-label mb-0">Fecha de sangrado</label>
                        <input type="date" name="fecha_sangrado" class="form-control" id="fecha_sangrado">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="sc_prc1" class="form-label mb-0">Programa de Rehabilitacion Cardiaca</label>
                        <select name="sc_prc" id="sc_prc" class="form-control">
                            <option value="No">No</option>
                            <option value="Completo programa">Completo programa</option>
                            <option value="No completo programa">No completo programa</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="segunda_medicion_FEVI_alta" class="form-label mb-0">Segunda medición de fracción de eyección ventricular izquierda<small class="text-danger">(%)</small></label>
                        <input type="number" name="segunda_medicion_FEVI_alta" class="form-control" id="segunda_medicion_FEVI_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_segunda_FEVI_alta" class="form-label mb-0">Fecha de segunda medición de fracción de eyección ventricular izquierda</label>
                        <input type="date" name="fecha_segunda_FEVI_alta" class="form-control" id="fecha_segunda_FEVI_alta">
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


        // Obtiene todos los botones del acordeón
        var accordionButtons = document.querySelectorAll('.accordion_de .card-header button');

        // Agrega un evento 'click' a cada botón
        accordionButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Remueve la clase 'active-accordion' de todos los encabezados de tarjetas
                accordionButtons.forEach(function (btn) {
                    btn.closest('.card-header').classList.remove('active-accordion');
                });

                // Agrega la clase 'active-accordion' solo al encabezado de la tarjeta que se está expandiendo
                button.closest('.card-header').classList.add('active-accordion');
            });
        });

        // Obtiene todos los botones del acordeón otros datos
        var od_accordionButtons = document.querySelectorAll('.accordion_od .card-header button');

        // Agrega un evento 'click' a cada botón
        od_accordionButtons.forEach(function (od_button) {
            od_button.addEventListener('click', function () {
                // Remueve la clase 'active-accordion' de todos los encabezados de tarjetas
                od_accordionButtons.forEach(function (od_btn) {
                    od_btn.closest('.card-header').classList.remove('active-accordion');
                });

                // Agrega la clase 'active-accordion' solo al encabezado de la tarjeta que se está expandiendo
                od_button.closest('.card-header').classList.add('active-accordion');
            });
        });

    });

    //if chage id tratamiento
    document.getElementById('tratamiento').addEventListener('change', function() {
        var tratamiento = document.getElementById('tratamiento').value;

        //reset inputs and radio the divs 'dv_quirurgica' and 'dv_intervencionismo'
        document.getElementById('dv_quirurgica').querySelectorAll('input').forEach(function(input) {
            if (input.type == 'radio') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });

        if (tratamiento == 'Quirúrgica') {
            document.getElementById('dv_quirurgica').classList.remove('d-none');
            document.getElementById('dv_intervencionismo').classList.add('d-none');

        } else if (tratamiento == 'Intervencionismo') {
            document.getElementById('dv_intervencionismo').classList.remove('d-none');
            document.getElementById('dv_quirurgica').classList.add('d-none');
        } else {
            document.getElementById('dv_quirurgica').classList.add('d-none');
            document.getElementById('dv_intervencionismo').classList.add('d-none');
        }
    });


    //if chage radio im_tipoetiologia
    var im_tipoetiologia = document.getElementsByName('im_tipoetiologia');

    im_tipoetiologia.forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (radio.value == 'Secundaria') {
                document.getElementById('dvim_tipoetiologia_secund').classList.remove('d-none');
            } else {
                document.getElementById('dvim_tipoetiologia_secund').classList.add('d-none');
            }
        });
    });

    var it_tipoetiologia = document.getElementsByName('it_tipoetiologia');

    it_tipoetiologia.forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (radio.value == 'Secundaria') {
                document.getElementById('dvit_tipoetiologia_secund').classList.remove('d-none');
            } else {
                document.getElementById('dvit_tipoetiologia_secund').classList.add('d-none');
            }
        });
    });

</script>
@endsection
