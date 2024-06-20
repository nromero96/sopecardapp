@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Renaval</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('renaval.store') }}" method="POST">
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
                        <label for="modalidad_ingreso" class="form-label mb-0">Modalidad de ingreso <small class="requiredata">*</small></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="modalidad_ingreso" id="modalidad_ingreso1" value="Emergencia" >
                                <label class="form-check-label" for="modalidad_ingreso1">Emergencia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="modalidad_ingreso" id="modalidad_ingreso2" value="Ambulatorio" >
                                <label class="form-check-label" for="modalidad_ingreso2">Ambulatorio</label>
                            </div>
                        </div>
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
                        <label for="edad" class="form-label mb-0">Edad (años) </label>
                        <input type="number" name="edad" class="form-control" id="edad" >
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
                        <label for="compli_enfermedad" class="form-label mb-0">Complicaciones de la enfermedad</label>
                        <input type="text" name="compli_enfermedad" class="form-control" id="compli_enfermedad" >
                    </div>
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
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="metodo_diagnostico_valvulopatia" class="form-label mb-0">Método diagnóstico de la valvulopatía</label>
                        <input type="text" name="metodo_diagnostico_valvulopatia" class="form-control rounded-left" id="metodo_diagnostico_valvulopatia">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fecha_diagnostico_valvulopatia" class="form-label mb-0">Fecha de diagnostico <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar método diagnóstico de la valvulopatía y la fecha. Ejm: Metodo... - 17/03/2014."></span></label>
                        <input type="date" name="fecha_diagnostico_valvulopatia" class="form-control rounded-right" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fevi_al_diagnostico" class="form-label mb-0">Fracción de eyección de ventrículo izquierdo al diagnóstico (%) </label>
                        <input type="number" name="fevi_al_diagnostico" class="form-control" id="fevi_al_diagnostico">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="diagnostico_estenosis1" class="form-label mb-0 d-block">Diagnóstico de estenosis </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_estenosis[]" id="diagnostico_estenosis1" value="Mitral">
                                <label class="form-check-label" for="diagnostico_estenosis1">Mitral</label>
                            </div>
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_estenosis[]" id="diagnostico_estenosis2" value="Aórtica">
                                <label class="form-check-label" for="diagnostico_estenosis2">Aórtica</label>
                            </div>
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_estenosis[]" id="diagnostico_estenosis3" value="Tricúspidea">
                                <label class="form-check-label" for="diagnostico_estenosis3">Tricúspidea</label>
                            </div>
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_estenosis[]" id="diagnostico_estenosis4" value="Pulmonar">
                                <label class="form-check-label" for="diagnostico_estenosis4">Pulmonar</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="diagnostico_insuficiencia1" class="form-label mb-0 d-block">Diagnóstico de insuficiencia </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_insuficiencia[]" id="diagnostico_insuficiencia1" value="Mitral">
                                <label class="form-check-label" for="diagnostico_insuficiencia1">Mitral</label>
                            </div>
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_insuficiencia[]" id="diagnostico_insuficiencia2" value="Aórtica">
                                <label class="form-check-label" for="diagnostico_insuficiencia2">Aórtica</label>
                            </div>
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_insuficiencia[]" id="diagnostico_insuficiencia3" value="Tricúspidea">
                                <label class="form-check-label" for="diagnostico_insuficiencia3">Tricúspidea</label>
                            </div>
                            <div class="form-check form-check-inline d-line">
                                <input class="form-check-input" type="checkbox" name="diagnostico_insuficiencia[]" id="diagnostico_insuficiencia4" value="Pulmonar">
                                <label class="form-check-label" for="diagnostico_insuficiencia4">Pulmonar</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="enfermedad_valvular_multiple1" class="form-label mb-0">Diagnóstico de enfermedad valvular múltiple </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enfermedad_valvular_multiple" id="enfermedad_valvular_multiple1" value="No" >
                                <label class="form-check-label" for="enfermedad_valvular_multiple1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enfermedad_valvular_multiple" id="enfermedad_valvular_multiple2" value="Sí" >
                                <label class="form-check-label" for="enfermedad_valvular_multiple2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="etiologias1" class="form-label mb-0 d-block">Etiología de la valvulopatía </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="etiologias[]" id="etiologias1" value="Etiología Degenerativa">
                                <label class="form-check-label" for="etiologias1">Etiología Degenerativa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="etiologias[]" id="etiologias2" value="Etiología Reumática">
                                <label class="form-check-label" for="etiologias2">Etiología Reumática</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="etiologias[]" id="etiologias3" value="Etiología Congénita">
                                <label class="form-check-label" for="etiologias3">Etiología Congénita</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="etiologias[]" id="etiologias4" value="Etiología Isquémica">
                                <label class="form-check-label" for="etiologias4">Etiología Isquémica</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="etiologias[]" id="etiologias5" value="Otros etiología">
                                <label class="form-check-label" for="etiologias5">Otros etiologías:</label>
                                <input type="text" name="etiologias_otro" class="form-control mb-2" id="etiologias_otro" placeholder="Especificar otra etiología...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cha2ds2vasc" class="form-label mb-0">CHA2DS2-VASc </label>
                        <input type="text" name="cha2ds2vasc" class="form-control" id="cha2ds2vasc">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="diagnostico1" class="form-label mb-0 d-block">Diagnóstico de síntomas específicos </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico1" value="Diagnóstico de disnea">
                                <label class="form-check-label" for="diagnostico1">Diagnóstico de disnea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico2" value="Diagnóstico de angina">
                                <label class="form-check-label" for="diagnostico2">Diagnóstico de angina</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico3" value="Diagnóstico de palpitaciones">
                                <label class="form-check-label" for="diagnostico3">Diagnóstico de palpitaciones</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico4" value="Diagnóstico de síncope">
                                <label class="form-check-label" for="diagnostico4">Diagnóstico de síncope</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico5" value="Diagnóstico de edema">
                                <label class="form-check-label" for="diagnostico5">Diagnóstico de edema</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico6" value="Diagnóstico de mareo">
                                <label class="form-check-label" for="diagnostico6">Diagnóstico de mareo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico7" value="Diagnóstico de fatiga">
                                <label class="form-check-label" for="diagnostico7">Diagnóstico de fatiga</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="diagnostico[]" id="diagnostico8" value="Diagnóstico de soplo">
                                <label class="form-check-label" for="diagnostico8">Diagnóstico de soplo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="clasif_nyha" class="form-label mb-0">Clasificación New York Heart Association </label>
                        <input type="text" name="clasif_nyha" class="form-control" id="clasif_nyha">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="enf_coronaria1" class="form-label mb-0">Diagnóstico de enfermedad coronaria </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enf_coronaria" id="enf_coronaria1" value="No" >
                                <label class="form-check-label" for="enf_coronaria1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="enf_coronaria" id="enf_coronaria2" value="Sí" >
                                <label class="form-check-label" for="enf_coronaria2">Sí</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Datos Ecocardiográficos -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos ecocardiográficos</h6>
            </div>
            <div class="card-body">
                <!-- Accordion -->
                <div class="accordion accordion_de" id="accordionDatosEco">
                    <div class="card">
                      <div class="card-header active-accordion" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1.- ESTENOSIS AORTICA
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionDatosEco">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="ea_morfologia_valvula_estenosis_aortica" class="form-label mb-0">Morfología de válvula en estenosis aórtica</label>
                                    <select name="ea_morfologia_valvula_estenosis_aortica" class="form-control" id="ea_morfologia_valvula_estenosis_aortica">
                                        <option value="">Seleccionar...</option>
                                        <option value="Unicúspide">Unicúspide</option>
                                        <option value="Bicúspide">Bicúspide</option>
                                        <option value="Tricúspide">Tricúspide</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    <input type="text" name="morfologia_valvula_estenosis_aortica_otro" class="form-control mt-2" id="morfologia_valvula_estenosis_aortica_otro" placeholder="Especificar otra morfología...">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ea_velocidad_maxima" class="form-label mb-0">Velocidad máxima (m/s)</label>
                                    <input type="number" name="ea_velocidad_maxima" class="form-control" id="ea_velocidad_maxima">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ea_area_valvular" class="form-label mb-0">Área valvular (cm2)</label>
                                    <input type="number" name="ea_area_valvular" class="form-control" id="ea_area_valvular">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ea_gradiente_media" class="form-label mb-0">Gradiente media (mmhg)</label>
                                    <input type="number" name="ea_gradiente_media" class="form-control" id="ea_gradiente_media">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ea_calculo_area_valvular1" class="form-label mb-0">Calculo del área valvular</label>
                                    <div class="form-control radioptions">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ea_calculo_area_valvular" id="ea_calculo_area_valvular1" value="Planimetría" >
                                            <label class="form-check-label" for="ea_calculo_area_valvular1">Planimetría</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ea_calculo_area_valvular" id="ea_calculo_area_valvular2" value="Ecuación de continuidad" >
                                            <label class="form-check-label" for="ea_calculo_area_valvular2">Ecuación de continuidad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ea_severidad_valvulopatia1" class="form-label mb-0">Severidad de valvulopatía</label>
                                    <div class="form-control radioptions">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ea_severidad_valvulopatia" id="ea_severidad_valvulopatia1" value="Leve" >
                                            <label class="form-check-label" for="ea_severidad_valvulopatia1">Leve</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ea_severidad_valvulopatia" id="ea_severidad_valvulopatia2" value="Moderada" >
                                            <label class="form-check-label" for="ea_severidad_valvulopatia2">Moderada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ea_severidad_valvulopatia" id="ea_severidad_valvulopatia3" value="Severa" >
                                            <label class="form-check-label" for="ea_severidad_valvulopatia3">Severa</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ea_etiologia" class="form-label mb-0">Etiología</label>
                                    <input type="text" name="ea_etiologia" class="form-control" id="ea_etiologia">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ea_volumen_sistolico_eyeccion" class="form-label mb-0">Volumen sistólico de eyección (ml)</label>
                                    <input type="number" name="ea_volumen_sistolico_eyeccion" class="form-control" id="ea_volumen_sistolico_eyeccion">
                                </div>

                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2.- INSUFICIENCIA AORTICA
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionDatosEco">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="ia_jet" class="form-label mb-0">JET</label>
                                    <div class="form-control radioptions">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ia_jet" id="ia_jet1" value="Central" >
                                            <label class="form-check-label" for="ia_jet1">Central</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ia_jet" id="jia_jet2" value="Excéntrica" >
                                            <label class="form-check-label" for="ia_jet2">Excéntrica</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ia_vena_contracta" class="form-label mb-0">Vena contracta (cm)</label>
                                    <input type="number" name="ia_vena_contracta" class="form-control" id="ia_vena_contracta">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ia_ore" class="form-label mb-0">ORE (cm2)</label>
                                    <input type="number" name="ia_ore" class="form-control" id="ia_ore">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ia_vol_regurgitante_orificio" class="form-label mb-0">Volumen regurgitante del orificio (ml)</label>
                                    <input type="number" name="ia_vol_regurgitante_orificio" class="form-control" id="ia_vol_regurgitante_orificio">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ia_etiologia" class="form-label mb-0">Etiología</label>
                                    <input type="text" name="ia_etiologia" class="form-control" id="ia_etiologia">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ia_severidad" class="form-label mb-0">Severidad</label>
                                    <select name="ia_severidad" class="form-control" id="ia_severidad">
                                        <option value="">Seleccionar...</option>
                                        <option value="Leve">Leve</option>
                                        <option value="Moderada">Moderada</option>
                                        <option value="Severa">Severa</option>
                                    </select>
                                </div>
                                

                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3.- ESTENOSIS MITRAL
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionDatosEco">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="em_score_wilkins" class="form-label mb-0">Score de Wilkins</label>
                                <input type="text" name="em_score_wilkins" class="form-control" id="em_score_wilkins">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="em_gradiente_media" class="form-label mb-0">Gradiente media (mmhg)</label>
                                <input type="text" name="em_gradiente_media" class="form-control" id="em_gradiente_media">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="em_tiempo_hemipresion" class="form-label mb-0">Tiempo de hemipresión (cm)</label>
                                <input type="number" name="em_tiempo_hemipresion" class="form-control" id="em_tiempo_hemipresion">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="em_area_val_mitral" class="form-label mb-0">Área valvular mitral (cm2)</label>
                                <input type="number" name="em_area_val_mitral" class="form-control" id="em_area_val_mitral">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="em_etiologia" class="form-label mb-0">Etiología</label>
                                <input type="text" name="em_etiologia" class="form-control" id="em_etiologia">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="em_severidad" class="form-label mb-0">Severidad</label>
                                <select name="em_severidad" class="form-control" id="em_severidad">
                                    <option value="">Seleccionar...</option>
                                    <option value="Leve">Leve</option>
                                    <option value="Moderada">Moderada</option>
                                    <option value="Severa">Severa</option>
                                </select>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    4.- INSUFICIENCIA MITRAL
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="im_jet1" class="form-label mb-0">JET</label>
                                        <div class="form-control radioptions">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="im_jet" id="im_jet1" value="Central">
                                                <label class="form-check-label" for="im_jet1">Central</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="im_jet" id="im_jet2" value="Excéntrica">
                                                <label class="form-check-label" for="im_jet2">Excéntrica</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="im_vena_contracta" class="form-label mb-0">Vena contracta (cm)</label>
                                        <input type="number" name="im_vena_contracta" class="form-control" id="im_vena_contracta">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="im_ore" class="form-label mb-0">ORE (cm2)</label>
                                        <input type="number" name="im_ore" class="form-control" id="im_ore">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="im_volumen_regurgitante" class="form-label mb-0">Volumen regurgitante (ml)</label>
                                        <input type="number" name="im_volumen_regurgitante" class="form-control" id="im_volumen_regurgitante">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="im_etiologia" class="form-label mb-0">Etiología</label>
                                        <input type="text" name="im_etiologia" class="form-control" id="im_etiologia">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="im_severidad" class="form-label mb-0">Severidad</label>
                                        <select name="im_severidad" class="form-control" id="im_severidad">
                                            <option value="">Seleccionar...</option>
                                            <option value="Leve">Leve</option>
                                            <option value="Moderada">Moderada</option>
                                            <option value="Severa">Severa</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 mb-2">
                                        <label for="im_carpentier" class="form-label mb-0">Carpentier</label>
                                        <input type="text" name="im_carpentier" class="form-control" id="im_carpentier">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="im_anillo" class="form-label mb-0">Anillo (cm)</label>
                                        <input type="number" name="im_anillo" class="form-control" id="im_anillo">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="im_metodo_eval_anillo" class="form-label mb-0">Método de la evaluación del anillo</label>
                                        <input type="text" name="im_metodo_eval_anillo" class="form-control" id="im_metodo_eval_anillo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5.- ESTENOSIS TRICUSPIDEA
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="et_velocidad_maxima" class="form-label mb-0">Velocidad máxima (m/s)</label>
                                        <input type="number" name="et_velocidad_maxima" class="form-control" id="et_velocidad_maxima">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="et_gradiente_media" class="form-label mb-0">Gradiente media (mmhg)</label>
                                        <input type="number" name="et_gradiente_media" class="form-control" id="et_gradiente_media">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="et_area_valvular" class="form-label mb-0">Área valvular (cm2)</label>
                                        <input type="number" name="et_area_valvular" class="form-control" id="et_area_valvular">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="et_etiologia" class="form-label mb-0">Etiología</label>
                                        <input type="text" name="et_etiologia" class="form-control" id="et_etiologia">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="et_severidad" class="form-label mb-0">Severidad</label>
                                        <select name="et_severidad" class="form-control" id="et_severidad">
                                            <option value="">Seleccionar...</option>
                                            <option value="Leve">Leve</option>
                                            <option value="Moderada">Moderada</option>
                                            <option value="Severa">Severa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                6.- INSUFICIENCIA TRICUSPIDEA
                                </button>
                            </h2>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="it_numero_velos" class="form-label mb-0">Número de velos</label>
                                        <input type="number" name="it_numero_velos" class="form-control" id="it_numero_velos">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_jet1" class="form-label mb-0">JET</label>
                                        <div class="form-control radioptions">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="it_jet" id="it_jet1" value="Central">
                                                <label class="form-check-label" for="it_jet1">Central</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="it_jet" id="it_jet2" value="Excéntrica">
                                                <label class="form-check-label" for="it_jet2">Excéntrica</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_vena_contracta" class="form-label mb-0">Vena contracta (cm)</label>
                                        <input type="number" name="it_vena_contracta" class="form-control" id="it_vena_contracta">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_ore" class="form-label mb-0">ORE (cm2)</label>
                                        <input type="number" name="it_ore" class="form-control" id="it_ore">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_velocidad_maxima" class="form-label mb-0">Velocidad Máxima (m/s)</label>
                                        <input type="number" name="it_velocidad_maxima" class="form-control" id="it_velocidad_maxima">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_gradiente_maxima" class="form-label mb-0">Gradiente Máxima (mmhg)</label>
                                        <input type="number" name="it_gradiente_maxima" class="form-control" id="it_gradiente_maxima">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_volumen_regurgitante" class="form-label mb-0">Volumen regurgitante (ml)</label>
                                        <input type="number" name="it_volumen_regurgitante" class="form-control" id="it_volumen_regurgitante">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_severidad" class="form-label mb-0">Severidad</label>
                                        <select name="it_severidad" class="form-control" id="it_severidad">
                                            <option value="">Seleccionar...</option>
                                            <option value="Leve">Leve</option>
                                            <option value="Moderada">Moderada</option>
                                            <option value="Severa">Severa</option>
                                            <option value="Masiva">Masiva</option>
                                            <option value="Torrencial">Torrencial</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_psap_estimada" class="form-label mb-0">PSAP estimada (mmhg)</label>
                                        <input type="number" name="it_psap_estimada" class="form-control" id="it_psap_estimada">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_anillo" class="form-label mb-0">Anillo (cm)</label>
                                        <input type="number" name="it_anillo" class="form-control" id="it_anillo">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="it_metodo_eval_anillo" class="form-label mb-0">Método de la evaluación del anillo</label>
                                        <input type="text" name="it_metodo_eval_anillo" class="form-control" id="it_metodo_eval_anillo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingSeven">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                7.- ESTENOSIS PULMONAR
                                </button>
                            </h2>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="ep_velocidad_maxima" class="form-label mb-0">Velocidad máxima (m/s)</label>
                                        <input type="number" name="ep_velocidad_maxima" class="form-control" id="ep_velocidad_maxima">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ep_gradiente_media" class="form-label mb-0">Gradiente media (mmhg)</label>
                                        <input type="number" name="ep_gradiente_media" class="form-control" id="ep_gradiente_media">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ep_area_valvular" class="form-label mb-0">Área valvular (cm2)</label>
                                        <input type="number" name="ep_area_valvular" class="form-control" id="ep_area_valvular">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ep_etiologia" class="form-label mb-0">Etiología</label>
                                        <input type="text" name="ep_etiologia" class="form-control" id="ep_etiologia">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ep_severidad" class="form-label mb-0">Severidad</label>
                                        <select name="ep_severidad" class="form-control" id="ep_severidad">
                                            <option value="">Seleccionar...</option>
                                            <option value="Leve">Leve</option>
                                            <option value="Moderada">Moderada</option>
                                            <option value="Severa">Severa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingEight">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                8.- INSUIFICENCIA PULMONAR
                                </button>
                            </h2>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="ip_vena_contracta" class="form-label mb-0">Vena contracta (cm)</label>
                                        <input type="number" name="ip_vena_contracta" class="form-control" id="ip_vena_contracta">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ip_etiologia" class="form-label mb-0">Etiología</label>
                                        <input type="text" name="ip_etiologia" class="form-control" id="ip_etiologia">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ip_severidad" class="form-label mb-0">Severidad</label>
                                        <select name="ip_severidad" class="form-control" id="ip_severidad">
                                            <option value="">Seleccionar...</option>
                                            <option value="Leve">Leve</option>
                                            <option value="Moderada">Moderada</option>
                                            <option value="Severa">Severa</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ip_anillo" class="form-label mb-0">Anillo (cm)</label>
                                        <input type="number" name="ip_anillo" class="form-control" id="ip_anillo">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ip_metodo_eval_anillo" class="form-label mb-0">Método de la evaluación del anillo</label>
                                        <input type="text" name="ip_metodo_eval_anillo" class="form-control" id="ip_metodo_eval_anillo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Otros Datos ecocardiográficos cateterismo-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Otro datos ecocardiográficos y cateterismo</h6>
            </div>

            <div class="card-body">

                <div class="row mb-1">
                    <div class="col-md-6 mb-2">
                        <label for="volumen_auricula_izquierda" class="form-label mb-0">Volumen de la aurícula izquierda/Área de superficie corporal (ml/m2)</label>
                        <input type="number" name="volumen_auricula_izquierda" class="form-control" id="volumen_auricula_izquierda">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="area_auricula_derecha" class="form-label mb-0">Área de la aurícula derecha (cm2)</label>
                        <input type="number" name="area_auricula_derecha" class="form-control" id="area_auricula_derecha">
                    </div>
                </div>

                <!-- Accordion -->
                <div class="accordion accordion_od" id="accordionOtroDatos">
                    <div class="card">
                        <div class="card-header active-accordion" id="od_headingOne">
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#od_collapseOne" aria-expanded="true" aria-controls="od_collapseOne">
                                1.- VENTRÍCULO IZQUIERDO
                            </button>
                            </h2>
                        </div>
                
                        <div id="od_collapseOne" class="collapse show" aria-labelledby="od_headingOne" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="vi_diametro_telesistolico" class="form-label mb-0">Diámetro telesistólico (cm)</label>
                                        <input type="number" name="vi_diametro_telesistolico" class="form-control" id="vi_diametro_telesistolico">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vi_volumen_telediastolico" class="form-label mb-0">Volumen telediastólico (ml)</label>
                                        <input type="number" name="vi_volumen_telediastolico" class="form-control" id="vi_volumen_telediastolico">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vi_volumen_telesistolico" class="form-label mb-0">Volumen telesistólico (ml)</label>
                                        <input type="number" name="vi_volumen_telesistolico" class="form-control" id="vi_volumen_telesistolico">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vi_masa" class="form-label mb-0">Masa (gramos/m2)</label>
                                        <input type="number" name="vi_masa" class="form-control" id="vi_masa">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vi_remodelamiento" class="form-label mb-0">Remodelamiento</label>
                                        <select name="vi_remodelamiento" class="form-control" id="vi_remodelamiento">
                                            <option value="">Seleccionar...</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Remodelamiento concéntrico">Remodelamiento concéntrico</option>
                                            <option value="Hipertrofia concéntrica">Hipertrofia concéntrica</option>
                                            <option value="Hipertrofia excéntrica">Hipertrofia excéntrica</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vi_fraccion_eyeccion_simpson" class="form-label mb-0">Fracción de eyección por Simpson (%)</label>
                                        <input type="number" name="vi_fraccion_eyeccion_simpson" class="form-control" id="vi_fraccion_eyeccion_simpson">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="od_headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#od_collapseTwo" aria-expanded="false" aria-controls="od_collapseTwo">
                                    2.- VENTRÍCULO DERECHO
                                </button>
                            </h2>
                        </div>
                        <div id="od_collapseTwo" class="collapse" aria-labelledby="od_headingTwo" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="vd_base" class="form-label mb-0">Base (cm)</label>
                                        <input type="number" name="vd_base" class="form-control" id="vd_base">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vd_porcion_media" class="form-label mb-0">Porción media (cm)</label>
                                        <input type="number" name="vd_porcion_media" class="form-control" id="vd_porcion_media">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vd_longitud" class="form-label mb-0">Longitud (cm)</label>
                                        <input type="number" name="vd_longitud" class="form-control" id="vd_longitud">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vd_dilatado1" class="form-label mb-0">Dilatado</label>
                                        <div class="form-control radioptions">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="vd_dilatado" id="vd_dilatado1" value="Sí">
                                                <label class="form-check-label" for="vd_dilatado1">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="vd_dilatado" id="vd_dilatado2" value="No">
                                                <label class="form-check-label" for="vd_dilatado2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vd_tapse" class="form-label mb-0">TAPSE (cm)</label>
                                        <input type="number" name="vd_tapse" class="form-control" id="vd_tapse">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="vd_fraccion_acortamiento" class="form-label mb-0">Fracción de acortamiento (%)</label>
                                        <input type="number" name="vd_fraccion_acortamiento" class="form-control" id="vd_fraccion_acortamiento">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="od_headingThree">
                            <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#od_collapseThree" aria-expanded="false" aria-controls="od_collapseThree">
                                3.- RAÍZ DE AORTA
                            </button>
                            </h2>
                        </div>
                        <div id="od_collapseThree" class="collapse" aria-labelledby="od_headingThree" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="rda_union" class="form-label mb-0">Unión (cm)</label>
                                        <input type="number" name="rda_union" class="form-control" id="rda_union">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="rda_senos" class="form-label mb-0">Senos (cm)</label>
                                        <input type="number" name="rda_senos" class="form-control" id="rda_senos">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="rda_anillo" class="form-label mb-0">Anillo (cm)</label>
                                        <input type="number" name="rda_anillo" class="form-control" id="rda_anillo">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="rda_aorta_ascendente" class="form-label mb-0">Aorta ascendente (cm)</label>
                                        <input type="number" name="rda_aorta_ascendente" class="form-control" id="rda_aorta_ascendente">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="od_headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#od_collapseFour" aria-expanded="false" aria-controls="od_collapseFour">
                                    4.- CATETERISMO CARDIACO IZQUIERDA
                                </button>
                            </h2>
                        </div>
                        <div id="od_collapseFour" class="collapse" aria-labelledby="od_headingFour" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="cci_fecha" class="form-label mb-0">Fecha</label>
                                        <input type="date" name="cci_fecha" class="form-control" id="cci_fecha">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Lesión</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>CD</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_cd" id="lesion_cd1" value="Sí">
                                                                <label class="form-check-label" for="lesion_cd1">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_cd" id="lesion_cd2" value="No">
                                                                <label class="form-check-label" for="lesion_cd2">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>TCI</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_tci" id="lesion_tci1" value="Sí">
                                                                <label class="form-check-label" for="lesion_tci1">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_tci" id="lesion_tci2" value="No">
                                                                <label class="form-check-label" for="lesion_tci2">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ADA</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_ada" id="lesion_ada1" value="Sí">
                                                                <label class="form-check-label" for="lesion_ada1">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_ada" id="lesion_ada2" value="No">
                                                                <label class="form-check-label" for="lesion_ada2">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>CX</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_cx" id="lesion_cx1" value="Sí">
                                                                <label class="form-check-label" for="lesion_cx1">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_cx" id="lesion_cx2" value="No">
                                                                <label class="form-check-label" for="lesion_cx2">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
        
                                                    <tr>
                                                        <td>DIAGONAL</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_diagonal" id="lesion_diagonal1" value="Sí">
                                                                <label class="form-check-label" for="lesion_diagonal1">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_diagonal" id="lesion_diagonal2" value="No">
                                                                <label class="form-check-label" for="lesion_diagonal2">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>MARGINAL</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_marginal" id="lesion_marginal1" value="Sí">
                                                                <label class="form-check-label" for="lesion_marginal1">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_marginal" id="lesion_marginal2" value="No">
                                                                <label class="form-check-label" for="lesion_marginal2">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>DESCENDENTE POSTERIOR</td>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_descen_posterior" id="lesion_descen_posterior1" value="Sí">
                                                                <label class="form-check-label" for="lesion_descen_posterior1">Sí</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="lesion_descen_posterior" id="lesion_descen_posterior2" value="No">
                                                                <label class="form-check-label" for="lesion_descen_posterior2">No</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="od_headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#od_collapseFive" aria-expanded="false" aria-controls="od_collapseFive">
                                    5.- CATETERISMO CARDIACO DERECHO
                                </button>
                            </h2>
                        </div>
                        <div id="od_collapseFive" class="collapse" aria-labelledby="od_headingFive" data-parent="#accordionDatosEco">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_fecha" class="form-label mb-0">Fecha</label>
                                        <input type="date" name="ccd_fecha" class="form-control" id="ccd_fecha">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_presartesis_pulmonar" class="form-label mb-0">Presión Arterial Sistólica Pulmonar</label>
                                        <input type="number" name="ccd_presartesis_pulmonar" class="form-control" id="ccd_presartesis_pulmonar">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_psap_cardercho" class="form-label mb-0">PSAP estimada por cateterismo cardiaco derecho (mmhg )</label>
                                        <input type="number" name="ccd_psap_cardercho" class="form-control" id="ccd_psap_cardercho">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_resis_pulmonar" class="form-label mb-0">Resistencia pulmonar (Wood)</label>
                                        <input type="text" name="ccd_resis_pulmonar" class="form-control" id="ccd_resis_pulmonar">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_presart_medpulmunar" class="form-label mb-0">Presión arterial media pulmonar (mmhg)</label>
                                        <input type="number" name="ccd_presart_medpulmunar" class="form-control" id="ccd_presart_medpulmunar">
                                    </div>
        
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_hiper_pulmonar1" class="form-label mb-0">Hipertensión Pulmonar</label>
                                        <div class="form-control radioptions">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ccd_hiper_pulmonar" id="ccd_hiper_pulmonar1" value="No">
                                                <label class="form-check-label" for="ccd_hiper_pulmonar1">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ccd_hiper_pulmonar" id="ccd_hiper_pulmonar2" value="Sí">
                                                <label class="form-check-label" for="ccd_hiper_pulmonar2">Sí</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_diag_hipertension" class="form-label mb-0">Método diagnóstico de hipertensión pulmonar <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Si es que fue diagnosticada"></span></label>
                                        <input type="text" name="ccd_diag_hipertension" class="form-control" id="ccd_diag_hipertension">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_diam_vi_diastole" class="form-label mb-0">Diámetro ventricular izquierdo al final de la diástole (mm)</label>
                                        <input type="number" name="ccd_diam_vi_diastole" class="form-control" id="ccd_diam_vi_diastole">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="ccd_diam_vi_sistole" class="form-label mb-0">Diámetro ventricular izquierdo al final de la sístole (mm)</label>
                                        <input type="number" name="ccd_diam_vi_sistole" class="form-control" id="ccd_diam_vi_sistole">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Interverción y pronóstico -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Interverción y pronóstico</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-2">
                        <label for="fecha_intervencion" class="form-label mb-0">Fecha de intervención</label>
                        <input type="date" name="fecha_intervencion" class="form-control" id="fecha_intervencion">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="valvulas_tratadas" class="form-label mb-0">Valvulas tratadas</label>
                        <input type="text" name="valvulas_tratadas" class="form-control" id="valvulas_tratadas">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tratamiento" class="form-label mb-0">Tratamiento </label>
                        <select name="tratamiento" class="form-control" id="tratamiento">
                            <option value="">Seleccionar...</option>
                            <option value="Quirúrgica">Quirúrgica</option>
                            <option value="Intervencionismo">Intervencionismo</option>
                            <option value="Solo farmacológico">Solo farmacológico</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <div id="dv_quirurgica" class="d-none">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="reparacion1" class="form-label mb-0">Reparación </label>
                                    <div class="form-control radioptions">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reparacion" id="reparacion1" value="Sí" >
                                            <label class="form-check-label" for="reparacion1">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reparacion" id="reparacion2" value="No" >
                                            <label class="form-check-label" for="reparacion2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="valvula_reparada" class="form-label mb-0">Válvula reparada</label>
                                    <input type="text" name="valvula_reparada" class="form-control" id="valvula_reparada">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="dispositivos1" class="form-label mb-0">Dispositivos </label>
                                    <div class="form-control radioptions">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dispositivos" id="dispositivos1" value="Sí" >
                                            <label class="form-check-label" for="dispositivos1">Sí</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="dispositivos" id="dispositivos2" value="No" >
                                            <label class="form-check-label" for="dispositivos2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="valvula_trat_dispositivo" class="form-label mb-0">Válvula tratada con dispositivo</label>
                                    <input type="text" name="valvula_trat_dispositivo" class="form-control" id="valvula_trat_dispositivo">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="protesis1" class="form-label mb-0">Protesis </label>
                                    <div class="form-control radioptions">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="protesis" id="protesis1" value="Biológica" >
                                            <label class="form-check-label" for="protesis1">Biológica</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="protesis" id="protesis2" value="Mecanica" >
                                            <label class="form-check-label" for="protesis2">Mecanica</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="protesis" id="protesis3" value="No" >
                                            <label class="form-check-label" for="protesis3">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="valvula_tratada_protesis" class="form-label mb-0">Válvula tratada con prótesis</label>
                                    <input type="text" name="valvula_tratada_protesis" class="form-control" id="valvula_tratada_protesis">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="otros_procedquirurgicos" class="form-label mb-0">Otros procedimientos quirurgicos</label>
                                    <input type="text" name="otros_procedquirurgicos" class="form-control" id="otros_procedquirurgicos">
                                </div>
                            </div>
                        </div>

                        <div id="dv_intervencionismo" class="d-none">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="interv_tipodispusado" class="form-label mb-0">Tipo de dispositivo usado</label>
                                    <input type="text" name="interv_tipodispusado" class="form-control" id="interv_tipodispusado">
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="form-control">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="border-top: none;">
                                                <label for="listmedicacion" class="form-label mb-0 d-block">Medicación</label>
                                            </th>
                                            <th style="border-top: none;" class="text-center">
                                               
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="listmedicacion">
                                        <tr>
                                            <td>Administración de inhibidores de enzima convertidora de angiotensina</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_ieca" id="medicacion_iecasi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_iecasi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_ieca" id="medicacion_iecano" value="No" >
                                                    <label class="form-check-label" for="medicacion_iecano">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de antagonistas de receptores de angiotensina II</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_ara" id="medicacion_arasi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_arasi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_ara" id="medicacion_arano" value="No" >
                                                    <label class="form-check-label" for="medicacion_arano">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de beta-bloqueadores</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_betabloqueador" id="medicacion_betabloqueadorsi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_betabloqueadorsi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_betabloqueador" id="medicacion_betabloqueadorno" value="No" >
                                                    <label class="form-check-label" for="medicacion_betabloqueadorno">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de digoxina</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_digoxina" id="medicacion_digoxinasi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_digoxinasi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_digoxina" id="medicacion_digoxinano" value="No" >
                                                    <label class="form-check-label" for="medicacion_digoxinano">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de estatinas</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_estatinas" id="medicacion_estatinassi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_estatinasi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_estatinas" id="medicacion_estatinasno" value="No" >
                                                    <label class="form-check-label" for="medicacion_estatinasno">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de diuréticos</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_diureticos" id="medicacion_diureticossi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_diureticossi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_diureticos" id="medicacion_diureticosno" value="No" >
                                                    <label class="form-check-label" for="medicacion_diureticosno">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de calcio antagonistas</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_calcio_antagonista" id="medicacion_calcio_antagonistasi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_calcio_antagonistasi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_calcio_antagonista" id="medicacion_calcio_antagonistano" value="No" >
                                                    <label class="form-check-label" for="medicacion_calcio_antagonistano">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de dabigatrán</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_dabigatran" id="medicacion_dabigtransi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_dabigtransi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_dabigatran" id="medicacion_dabigatranno" value="No" >
                                                    <label class="form-check-label" for="medicacion_dabigatranno">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de Warfarina</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_warfarina" id="medicacion_warfarinasi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_warfarinasi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_warfarina" id="medicacion_warfarinano" value="No" >
                                                    <label class="form-check-label" for="medicacion_warfarinano">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administración de ácido acetil salicílico</td>
                                            <td class="text-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_acido_acetil_salicilico" id="medicacion_acido_acetil_salicilicosi" value="Sí" >
                                                    <label class="form-check-label" for="medicacion_acido_acetil_salicilicosi">Sí</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="medicacion_acido_acetil_salicilico" id="medicacion_acido_acetil_salicilicono" value="No" >
                                                    <label class="form-check-label" for="medicacion_acido_acetil_salicilicono">No</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Otros medicamentos</td>
                                            <td class="text-center">
                                                <input type="text" name="medicacion_otro" class="form-control" id="medicacion_otro" placeholder="Especificar">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="m-0 font-weight-bold text-primary border-bottom">Complicaciones de la intervención</h5>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inmediatas" class="form-label mb-0">Inmediatas (<24 HORAS)</label>
                        <input type="text" name="inmediatas" class="form-control" id="inmediatas">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tardias" class="form-label mb-0">Tardías (24 HORAS A 1 SEMANA)</label>
                        <input type="text" name="tardias" class="form-control" id="tardias">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="muerte_general1" class="form-label mb-0">Muerte general </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_general" id="muerte_general1" value="Sí">
                                <label class="form-check-label" for="muerte_general1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_general" id="muerte_general2" value="No">
                                <label class="form-check-label" for="muerte_general2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="muerte_cardiovascular1" class="form-label mb-0">Muerte cardiovascular </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_cardiovascular" id="muerte_cardiovascular1" value="Sí">
                                <label class="form-check-label" for="muerte_cardiovascular1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="muerte_cardiovascular" id="muerte_cardiovascular2" value="No">
                                <label class="form-check-label" for="muerte_cardiovascular2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fechademuerte" class="form-label mb-0">Fecha de muerte</label>
                        <input type="date" name="fechademuerte" class="form-control" id="fechademuerte">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="hospitalizacion1" class="form-label mb-0">Hospitalización </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hospitalizacion" id="hospitalizacion1" value="Sí">
                                <label class="form-check-label" for="hospitalizacion1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hospitalizacion" id="hospitalizacion2" value="No">
                                <label class="form-check-label" for="hospitalizacion2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tiempo_hospitalizacion" class="form-label mb-0">Tiempo de hospitalización (días)</label>
                        <input type="number" name="tiempo_hospitalizacion" class="form-control" id="tiempo_hospitalizacion">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fecha_hospitalizacion" class="form-label mb-0">Fecha de hospitalización</label>
                        <input type="date" name="fecha_hospitalizacion" class="form-control" id="fecha_hospitalizacion">
                    </div>

                </div>

            </div>
        </div>

        <!-- Datos Cateterismo cardiaco-->
        {{-- <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos Cateterismo cardiaco</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="lesion_cateterismo_cardiaco" class="form-label mb-0">Lesión por cateterismo cardiaco izquierdo </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lesion_cateterismo_cardiaco_izquierdo" id="lesion_cateterismo_cardiaco1" value="Sí" >
                                <label class="form-check-label" for="lesion_cateterismo_cardiaco1">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="lesion_cateterismo_cardiaco_izquierdo" id="lesion_cateterismo_cardiaco2" value="No" >
                                <label class="form-check-label" for="lesion_cateterismo_cardiaco2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="lugar_lesion_cateterismo_cardiaco_izquierdo" class="form-label mb-0">Lugar de lesión por cateterismo cardiaco izquierdo</label>
                        <select name="lugar_lesion_cateterismo_cardiaco_izquierdo" class="form-control" id="lugar_lesion_cateterismo_cardiaco_izquierdo">
                            <option value="">Seleccionar...</option>
                            <option value="CD">CD</option>
                            <option value="TCI">TCI</option>
                            <option value="ADA">ADA</option>
                            <option value="CV">CV</option>
                            <option value="Diagonal">Diagonal</option>
                            <option value="Margina">Margina</option>
                            <option value="Descendente">Descendente</option>
                            <option value="Posterior">Posterior</option>
                        </select>
                    </div>

                </div>

            </div>
        </div> --}}

        <!-- boton cancel y Submit -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2 mb-sm-0 text-right">
                        <a href="{{ route('renaval.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
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





</script>
@endsection
