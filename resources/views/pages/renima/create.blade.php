@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Renima <small class="text-danger">(EN CONSTRUCCION)</small> </h1>
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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos Epidemiológicos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="documento_identidad" class="form-label mb-0">Documento de identidad (DNI) <small class="requiredata">*</small></label>
                        <input type="number" name="documento_identidad" class="form-control" id="documento_identidad" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Celular de contacto <small class="requiredata">*</small></label>
                        <input type="number" name="" class="form-control" id="" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Centro de médico <small class="requiredata">*</small></label>
                        <input type="number" name="" class="form-control" id="" required>
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
                        <label for="ciudad" class="form-label mb-0">Ciudad <small class="requiredata">*</small></label>
                        <input type="text" name="ciudad" class="form-control" id="ciudad">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Ditrito <small class="requiredata">*</small></label>
                        <input type="text" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="edad" class="form-label mb-0">Edad (años) </label>
                        <input type="number" name="edad" class="form-control" id="edad" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de nacimiento </label>
                        <input type="date" name="" class="form-control" id="" >
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
                        <label for="gestante1" class="form-label mb-0">Gestante </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gestante" id="gestante1" value="Sí" >
                                <label class="form-check-label" for="gestante1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gestante" id="gestante2" value="No" >
                                <label class="form-check-label" for="gestante2">No</label>
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
                        <label for="" class="form-label mb-0">Tipo de seguro </label>
                        <input type="text" name="" class="form-control" id="" >
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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos Clínicos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="pas_diagnostico" class="form-label mb-0">Presión arterial sistólica (mmHg)</label>
                        <input type="number" name="pas_diagnostico" class="form-control" id="pas_diagnostico" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="pad_diagnostico" class="form-label mb-0">Presión arterial diastólica (mmHg)</label>
                        <input type="number" name="pad_diagnostico" class="form-control" id="pad_diagnostico" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="peso" class="form-label mb-0">Peso actual (Kg) </label>
                        <input type="number" name="peso" class="form-control" id="peso" step="0.01">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="talla" class="form-label mb-0">Talla actual (m) </label>
                        <input type="number" name="talla" class="form-control" id="talla" step="0.01">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="circunferencia_abdominal" class="form-label mb-0">Circunferencia abdominal (cm) </label>
                        <input type="number" name="circunferencia_abdominal" class="form-control" id="circunferencia_abdominal">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Saturación de oxígeno (%) </label>
                        <input type="number" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="antecedentes1" class="form-label mb-0 d-block">Antecedentes </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes1" value="Uso de drogas intravenosas">
                                <label class="form-check-label" for="antecedentes1">Uso de drogas intravenosas</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes2" value="Hipertensión arterial">
                                <label class="form-check-label" for="antecedentes2">Hipertensión arterial</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes3" value="Diabetes mellitus">
                                <label class="form-check-label" for="antecedentes3">Diabetes mellitus</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes4" value="Fiebre reumática">
                                <label class="form-check-label" for="antecedentes4">Fiebre reumática</label>
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
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes7" value="Endocarditis">
                                <label class="form-check-label" for="antecedentes7">Endocarditis</label>
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
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes10" value="Infarto miocárdico agudo">
                                <label class="form-check-label" for="antecedentes10">Infarto miocárdico agudo</label>
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
                                <input class="form-check-input" type="checkbox" name="antecedentes[]" id="antecedentes14" value="Enfermedad coronaria">
                                <label class="form-check-label" for="antecedentes14">Enfermedad coronaria</label>
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
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Paquete/año de cigarrillos </label>
                        <input type="text" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de inicio de síntomas </label>
                        <input type="date" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de inicio de síntomas </label>
                        <input type="time" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de ingreso </label>
                        <input type="date" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de ingreso </label>
                        <input type="time" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de primer contacto médico </label>
                        <input type="date" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de primer contacto médico </label>
                        <input type="time" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Tiempo desde el inicio de síntomas al primer contacto médico (minutos) </label>
                        <input type="number" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Centro del primer contacto médico </label>
                        <input type="text" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de ECG </label>
                        <input type="date" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de ECG </label>
                        <input type="time" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Tiempo desde el primer contacto médico hasta el ECG (minutos) </label>
                        <input type="number" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="manifestacionesclinicas1" class="form-label mb-0 d-block">Manifestaciones clínicas </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas1" value="Dolor torácico">
                                <label class="form-check-label" for="manifestacionesclinicas1">Dolor torácico</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas2" value="Disnea">
                                <label class="form-check-label" for="manifestacionesclinicas2">Disnea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas3" value="Angina">
                                <label class="form-check-label" for="manifestacionesclinicas3">Angina</label>
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
                                <input class="form-check-input" type="checkbox" name="manifestacionesclinicas[]" id="manifestacionesclinicas8" value="Soplo">
                                <label class="form-check-label" for="manifestacionesclinicas8">Soplo</label>
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
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diagnostico_ima" id="diagnostico_ima1" value="IMAST elevado" >
                                <label class="form-check-label" for="diagnostico_ima1">IMAST elevado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diagnostico_ima" id="diagnostico_ima2" value="IMA sin elevación del ST" >
                                <label class="form-check-label" for="diagnostico_ima2">IMA sin elevación del ST</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="riesgo_imanostelevado1" class="form-label mb-0">Riesgo en IMA no ST elevado</label>
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

                </div>
            </div>
        </div>

        <!-- Datos Ecocardiográficos -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos del manejo de intervención</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2">
                        <label for="manejo" class="form-label mb-0">Manejo</label>
                        <select name="manejo" id="manejo" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Solo lisis">Solo lisis</option>
                            <option value="Farmacoinvasiva">Farmacoinvasiva</option>
                            <option value="Intervención coronaria percutánea">Intervención coronaria percutánea</option>
                            <option value="Bypass coronario">Bypass coronario</option>
                            <option value="Solo tratamiento médico">Solo tratamiento médico</option>
                            <option value="Estrategia selectiva invasiva">Estrategia selectiva invasiva</option>
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
                        <label for="" class="form-label mb-0">Lugar de transferencia para fibrinólisis</label>
                        <input type="text" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de fibrinólisis</label>
                        <input type="date" name="" class="form-control" id="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de fibrinólisis</label>
                        <input type="time" name="" class="form-control" id="">
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Tiempo desde el ECG hasta fibrinólisis (minutos)</label>
                        <input type="number" name="" class="form-control" id="">
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
                            
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fibrinolisis_exitosa1" class="form-label mb-0">Fibrinólisis exitosa</label>
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
                        <label for="" class="form-label mb-0">Causa de suspensión</label>
                        <input type="text" name="" class="form-control" id="">
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
                        <label for="" class="form-label mb-0">Lugar de transferencia para ICP</label>
                        <input type="text" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de salida antes de la ICP</label>
                        <input type="date" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de salida antes de la ICP</label>
                        <input type="time" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Tiempo del door-in al door-out (minutos)</label>
                        <input type="number" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de llegada al centro para ICP</label>
                        <input type="date" name="" class="form-control" id="">
                    </div> 

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Tiempo de transporte al lugar de ICP</label>
                        <input type="number" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Fecha de inicio de ICP</label>
                        <input type="date" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de ICP</label>
                        <input type="time" name="" class="form-control" id="">
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
                        <label for="" class="form-label mb-0">Fecha de apertura</label>
                        <input type="date" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Hora de apertura</label>
                        <input type="time" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="" class="form-label mb-0">Otra estenosis coronaria</label>
                        <input type="text" name="" class="form-control" id="">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="flujo_inicial" class="form-label mb-0">Flujo inicial según TIMI</label>
                        <select name="flujo_inicial" id="flujo_inicial" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="flujo_final" class="form-label mb-0">Flujo final según TIMI</label>
                        <select name="flujo_final" id="flujo_final" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tipo_stent" class="form-label mb-0">Tipo de stent</label>
                        <select name="tipo_stent" id="tipo_stent" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Angioplastia con balón">Angioplastia con balón</option>
                            <option value="Convencional no medicado">Convencional no medicado</option>
                            <option value="Stent medicado">Stent medicado</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diametro_stent" class="form-label mb-0">Diámetro del stent (mm)</label>
                        <input type="number" name="diametro_stent" class="form-control" id="diametro_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="longitud_stent" class="form-label mb-0">Longitud del stent (mm)</label>
                        <input type="number" name="longitud_stent" class="form-control" id="longitud_stent">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="predilatacion" class="form-label mb-0">Predilatación</label>
                        <select name="predilatacion" id="predilatacion" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="postdilatacion" class="form-label mb-0">Postdilatación</label>
                        <select name="postdilatacion" id="postdilatacion" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
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
                        <select name="exito_icp" id="exito_icp" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-6">
                        <label for="complicaciones_icp" class="form-label mb-0">Fecha del fin de la ICP</label>
                        <input type="date" name="complicaciones_icp" class="form-control" id="complicaciones_icp">
                    </div>

                    <div class="col-md-6 mb-6">
                        <label for="complicaciones_icp" class="form-label mb-0">Hora del fin de la ICP</label>
                        <input type="time" name="complicaciones_icp" class="form-control" id="complicaciones_icp">
                    </div>

                    <div class="col-md-6 mb-6">
                        <label for="complicaciones_icp" class="form-label mb-0">Duración de la ICP (minutos)</label>
                        <input type="number" name="complicaciones_icp" class="form-control" id="complicaciones_icp">
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
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="complicaciones_mecanicas1" class="form-label mb-0 d-block">Complicación mecánicas </label>
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
                        <label for="motivo_deno_reperfusion" class="form-label mb-0">Motivo de no reperfusión</label>
                        <input type="text" name="motivo_deno_reperfusion" class="form-control" id="motivo_deno_reperfusion">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tiempo_total_isquemia" class="form-label mb-0">Tiempo total de isquemia (minutos)</label>
                        <input type="number" name="tiempo_total_isquemia" class="form-control" id="tiempo_total_isquemia">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="puntaje_grace" class="form-label mb-0">Puntaje GRACE</label>
                        <input type="number" name="puntaje_grace" class="form-control" id="puntaje_grace">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="otros_cambios_ecg" class="form-label mb-0">Otros cambios en el ECG</label>
                        <input type="text" name="otros_cambios_ecg" class="form-control" id="otros_cambios_ecg">
                    </div>
                </div>
            </div>
        </div>

        <!--Datos de laboratorio-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos de laboratorio</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2">
                        <label for="hemoglobina_al_ingreso)" class="form-label mb-0">Hemoglobina (al ingreso)</label>
                        <input type="number" name="hemoglobina_al_ingreso" class="form-control" id="hemoglobina_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="leucocitos_al_ingreso" class="form-label mb-0">Leucocitos (al ingreso)</label>
                        <input type="number" name="leucocitos_al_ingreso" class="form-control" id="leucocitos_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="plaquetas_al_ingreso" class="form-label mb-0">Plaquetas (al ingreso)</label>
                        <input type="number" name="plaquetas_al_ingreso" class="form-control" id="plaquetas_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="creatinina_al_ingreso" class="form-label mb-0">Creatinina (al ingreso)</label>
                        <input type="number" name="creatinina_al_ingreso" class="form-control" id="creatinina_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="urea_al_ingreso" class="form-label mb-0">Úrea (al ingreso)</label>
                        <input type="number" name="urea_al_ingreso" class="form-control" id="urea_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="glucosa_al_ingreso" class="form-label mb-0">Glucosa (al ingreso)</label>
                        <input type="number" name="glucosa_al_ingreso" class="form-control" id="glucosa_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="troponina_t_al_ingreso" class="form-label mb-0">Troponina T (al ingreso)</label>
                        <input type="number" name="troponina_t_al_ingreso" class="form-control" id="troponina_t_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="troponina_i_al_ingreso" class="form-label mb-0">Troponina I (al ingreso)</label>
                        <input type="number" name="troponina_i_al_ingreso" class="form-control" id="troponina_i_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="cpk_total_al_ingreso" class="form-label mb-0">CPK total (al ingreso)</label>
                        <input type="number" name="cpk_total_al_ingreso" class="form-control" id="cpk_total_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="cpk_mb_al_ingreso" class="form-label mb-0">CPK-MB (al ingreso)</label>
                        <input type="number" name="cpk_mb_al_ingreso" class="form-control" id="cpk_mb_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="lactato_al_ingreso" class="form-label mb-0">Lactato (al ingreso)</label>
                        <input type="number" name="lactato_al_ingreso" class="form-control" id="lactato_al_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fraccion_eyectada_izquierda_ingreso" class="form-label mb-0">Fracción de eyección ventricular izquierda (%, al ingreso)</label>
                        <input type="number" name="fraccion_eyectada_izquierda_ingreso" class="form-control" id="fraccion_eyectada_izquierda_ingreso">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fraccion_eyectada_izquierda_hospitalizacion" class="form-label mb-0">Fracción de eyección ventricular izquierda (%, en hospitalización)</label>
                        <input type="number" name="fraccion_eyectada_izquierda_hospitalizacion" class="form-control" id="fraccion_eyectada_izquierda_hospitalizacion">
                    </div>

                </div>
            </div>
        </div>

        <!--Datos de medicación farmacológica-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos de medicación farmacológica</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="aspirina_en_hospitalizacion1" class="form-label mb-0">Aspirina (en hospitalización)</label>
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
                        <label for="clopidogrel_en_hospitalizacion1" class="form-label mb-0">Clopidogrel (en hospitalización)</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clopidogrel_en_hospitalizacion" id="clopidogrel_en_hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="clopidogrel_en_hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clopidogrel_en_hospitalizacion" id="clopidogrel_en_hospitalizacion2" value="No">
                                <label class="form-check-label" for="clopidogrel_en_hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="enoxaparina_en_hospitalizacion1" class="form-label mb-0">Enoxaparina (en hospitalización)</label>
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
                        <label for="heparina_no_fraccionada_en_hospitalizacion1" class="form-label mb-0">Heparina no fraccionada (en hospitalización)</label>
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
                        <label for="atorvastatina_en_hospitalizacion1" class="form-label mb-0">Atorvastatina (en hospitalización)</label>
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
                        <label for="betabloqueadores_en_hospitalizacion1" class="form-label mb-0">Betabloqueadores (en hospitalización)</label>
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
                        <label for="diureticos_de_asa_en_hospitalizacion1" class="form-label mb-0">Diuréticos de asa (en hospitalización)</label>
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
                        <label for="vasodilatadores_en_hospitalizacion1" class="form-label mb-0">Vasodilatadores (en hospitalización)</label>
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
                        <label for="vasopresores_en_hospitalizacion1" class="form-label mb-0">Vasopresores (en hospitalización)</label>
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
                        <label for="inotropicos_en_hospitalizacion1" class="form-label mb-0">Inotrópicos (en hospitalización)</label>
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
                        <label for="ieca_ara_en_hospitalizacion1" class="form-label mb-0">IECA/ARA (en hospitalización)</label>
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
                        <label for="ventilacion_mecanica_en_hospitalizacion1" class="form-label mb-0">Ventilación mecánica (en hospitalización)</label>
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
                        <label for="dialisis_en_hospitalizacion1" class="form-label mb-0">Diálisis (en hospitalización)</label>
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
                        <label for="rehabilitacion_cardiaca_en_hospitalizacion1" class="form-label mb-0">Rehabilitación cardiaca en hospitalización</label>
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
                        <label for="aspirina_al_alta1" class="form-label mb-0">Aspirina (al alta)</label>
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
                        <label for="clopidogrel_al_alta1" class="form-label mb-0">Clopidogrel (al alta)</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clopidogrel_al_alta" id="clopidogrel_al_alta1" value="Sí">
                                <label class="form-check-label" for="clopidogrel_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clopidogrel_al_alta" id="clopidogrel_al_alta2" value="No">
                                <label class="form-check-label" for="clopidogrel_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="enoxaparina_al_alta1" class="form-label mb-0">Enoxaparina (al alta)</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enoxaparina_al_alta" id="enoxaparina_al_alta1" value="Sí">
                                <label class="form-check-label" for="enoxaparina_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enoxaparina_al_alta" id="enoxaparina_al_alta2" value="No">
                                <label class="form-check-label" for="enoxaparina_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="heparina_no_fraccionada_al_alta1" class="form-label mb-0">Heparina no fraccionada (al alta)</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="heparina_no_fraccionada_al_alta" id="heparina_no_fraccionada_al_alta1" value="Sí">
                                <label class="form-check-label" for="heparina_no_fraccionada_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="heparina_no_fraccionada_al_alta" id="heparina_no_fraccionada_al_alta2" value="No">
                                <label class="form-check-label" for="heparina_no_fraccionada_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="atorvastatina_al_alta1" class="form-label mb-0">Atorvastatina (al alta)</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="atorvastatina_al_alta" id="atorvastatina_al_alta1" value="Sí">
                                <label class="form-check-label" for="atorvastatina_al_alta1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="atorvastatina_al_alta" id="atorvastatina_al_alta2" value="No">
                                <label class="form-check-label" for="atorvastatina_al_alta2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="betabloqueadores_al_alta1" class="form-label mb-0">Betabloqueadores (al alta)</label>
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
                        <label for="diureticos_de_asa_al_alta1" class="form-label mb-0">Diuréticos de asa (al alta)</label>
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
                        <label for="antagonistas_de_mineralocorticoides_al_alta1" class="form-label mb-0">Antagonistas de mineralocorticoides (al alta)</label>
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
                        <label for="ieca_ara_al_alta1" class="form-label mb-0">IECA/ARA (al alta)</label>
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
                        <label for="inhibidores_del_receptor_p2y12_al_alta1" class="form-label mb-0">Inhibidores del receptor P2Y12 (al alta)</label>
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

                </div>
            </div>
        </div>

        <!--Datos de pronóstico-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos de pronóstico</h6>
            </div>
            <div class="card-body">
                <div class="row mb-1">

                    <div class="col-md-6 mb-2">
                        <label for="primera_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-label mb-0">Primera medición de fracción de eyección ventricular izquierda al alta (%)</label>
                        <input type="number" name="primera_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-control" id="primera_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_primera_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-label mb-0">Fecha de primera medición de fracción de eyección ventricular izquierda al alta</label>
                        <input type="date" name="fecha_primera_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-control" id="fecha_primera_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta">
                    </div>

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
                        <label for="segunda_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-label mb-0">Segunda medición de fracción de eyección ventricular izquierda al alta (%)</label>
                        <input type="number" name="segunda_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-control" id="segunda_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_segunda_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-label mb-0">Fecha de segunda medición de fracción de eyección ventricular izquierda al alta</label>
                        <input type="date" name="fecha_segunda_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta" class="form-control" id="fecha_segunda_medicion_de_fraccion_de_eyeccion_ventricular_izquierda_al_alta">
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
