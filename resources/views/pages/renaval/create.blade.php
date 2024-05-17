@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrar Renaval</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('repecca.store') }}" method="POST">
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
                        <label for="centro" class="form-label mb-0">Centro de salud <small class="requiredata">*</small></label>
                        <input type="text" name="centro" class="form-control" id="centro">
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
                        <input type="text" name="documento_identidad" class="form-control" id="documento_identidad">
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
                    <div class="col-md-6 mb-2">
                        <label for="pas_diagnostico" class="form-label mb-0">Presión arterial sistólica (mmHg)</label>
                        <input type="text" name="pas_diagnostico" class="form-control" id="pas_diagnostico" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="pad_diagnostico" class="form-label mb-0">Presión arterial diastólica (mmHg)</label>
                        <input type="text" name="pad_diagnostico" class="form-control" id="pad_diagnostico" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="peso" class="form-label mb-0">Peso actual (Kg) </label>
                        <input type="number" name="peso" class="form-control" id="peso" step="0.01">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="talla" class="form-label mb-0">Talla actual (m) </label>
                        <input type="number" name="talla" class="form-control" id="talla" step="0.01">
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
                        <label for="metodo_diagnostico_valvulopatia" class="form-label mb-0">Método diagnóstico de la valvulopatía <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar método diagnóstico de la valvulopatía y la fecha. Ejm: Metodo... - 17/03/2014."></span></label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="text" name="metodo_diagnostico_valvulopatia" class="form-control rounded-left" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_diagnostico_valvulopatia" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
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
                        <input type="number" name="cha2ds2vasc" class="form-control" id="cha2ds2vasc">
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
                        <label for="grado_soplo" class="form-label mb-0">Grado de severidad del soplo </label>
                        <input type="number" name="grado_soplo" class="form-control" id="grado_soplo">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="nyha" class="form-label mb-0">Clasificación New York Heart Association </label>
                        <input type="number" name="nyha" class="form-control" id="nyha">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="area_valvular" class="form-label mb-0">Área valvular</label>
                        <input type="number" name="area_valvular" class="form-control" id="area_valvular">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="velo_maxima" class="form-label mb-0">Velocidad máxima (en estenosis aórtica e insuficiencia tricuspídea) </label>
                        <input type="number" name="velo_maxima" class="form-control" id="velo_maxima">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="itv" class="form-label mb-0">Colocar el valor del ITV</label>
                        <input type="number" name="itv" class="form-control" id="itv">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="vol_sis_expuls" class="form-label mb-0">Colocar el valor del volumen sistólico de expulsión</label>
                        <input type="number" name="vol_sis_expuls" class="form-control" id="vol_sis_expuls">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="otra_valvula" class="form-label mb-0">Otra válvula afectada <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="En caso de haber otra válvula afectada, colocar el nombre de la válvula"></span></label>
                        <input type="text" name="otra_valvula" class="form-control" id="otra_valvula">
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
                    <div class="col-md-6 mb-2">
                        <label for="seguimiento_gradiente_media" class="form-label mb-0">Seguimiento de gradiente media <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar el valor del gradiente medio y la fecha. Ejm: 20 - 17/03/2014."></span></label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="text" name="seguimiento_gradiente_media" class="form-control rounded-left" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="seguimiento_gradiente_media_fecha" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="orificio_regurgitante_efectivo" class="form-label mb-0">Orificio regurgitante efectivo (cm2) </label>
                        <input type="number" name="orificio_regurgitante_efectivo" class="form-control" id="orificio_regurgitante_efectivo">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="pisa" class="form-label mb-0">Colocar el valor de PISA</label>
                        <input type="number" name="pisa" class="form-control" id="pisa">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="morfo_aortica" class="form-label mb-0">Morfología de la válvula aórtica </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="morfo_aortica" id="morfo_aortica1" value="Bicúspide" >
                                <label class="form-check-label" for="morfo_aortica1">Bicúspide</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="morfo_aortica" id="morfo_aortica2" value="Tricúspide" >
                                <label class="form-check-label" for="morfo_aortica2">Tricúspide</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dilat_ao" class="form-label mb-0">Dilatación de la aorta al diagnóstico </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dilat_ao" id="dilat_ao1" value="Dilatada" >
                                <label class="form-check-label" for="dilat_ao1">Dilatada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dilat_ao" id="dilat_ao2" value="No dilatada" >
                                <label class="form-check-label" for="dilat_ao2">No dilatada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dilat_ao" id="dilat_ao3" value="Aneurismática" >
                                <label class="form-check-label" for="dilat_ao3">Aneurismática</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="gradiente_media" class="form-label mb-0">Gradiente media </label>
                        <input type="number" name="gradiente_media" class="form-control" id="gradiente_media">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="diametro_vena_contracta" class="form-label mb-0">Diámetro de la vena contracta </label>
                        <input type="text" name="diametro_vena_contracta" class="form-control" id="diametro_vena_contracta">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="morfo_aortica" class="form-label mb-0">Diagnóstico de hipertrofia miocárdica </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hipertrofia" id="hipertrofiasi" value="Sí" >
                                <label class="form-check-label" for="hipertrofiasi">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hipertrofia" id="hipertrofiano" value="No" >
                                <label class="form-check-label" for="hipertrofiano">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="remod_ventri_izq1" class="form-label mb-0">Remodelamiento de ventrículo Izquierdo </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="remod_ventri_izq" id="remod_ventri_izq1" value="Normal" >
                                <label class="form-check-label" for="remod_ventri_izq1">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="remod_ventri_izq" id="remod_ventri_izq2" value="Concéntrica" >
                                <label class="form-check-label" for="remod_ventri_izq2">Concéntrica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="remod_ventri_izq" id="remod_ventri_izq3" value="Eccéntrica" >
                                <label class="form-check-label" for="remod_ventri_izq3">Eccéntrica</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="volumen_ai" class="form-label mb-0">Volumen de la aurícula izquierda </label>
                        <input type="text" name="volumen_ai" class="form-control" id="volumen_ai">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="htpcat1" class="form-label mb-0">Diagnóstico de hipertensión pulmonar categoría </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="htpcat" id="htpcat1" value="Ecocardiografía" >
                                <label class="form-check-label" for="htpcat1">Ecocardiografía</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="htpcat" id="htpcat2" value="Cateterismo derecho" >
                                <label class="form-check-label" for="htpcat2">Cateterismo derecho</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="htpsi" class="form-label mb-0">Diagnóstico de hipertensión pulmonar </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="htp" id="htpsi" value="Sí" >
                                <label class="form-check-label" for="htpsi">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="htp" id="htpno" value="No" >
                                <label class="form-check-label" for="htpno">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="htp_severidad1" class="form-label mb-0">Severidad de hipertensión pulmonar </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="htp_severidad" id="htp_severidad1" value="Leve" >
                                <label class="form-check-label" for="htp_severidad1">Leve</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="htp_severidad" id="htp_severidad2" value="Moderada" >
                                <label class="form-check-label" for="htp_severidad2">Moderada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="htp_severidad" id="htp_severidad3" value="Severa" >
                                <label class="form-check-label" for="htp_severidad3">Severa</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tapse_20si" class="form-label mb-0">TAPSE mayor a 20 </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tapse_20" id="tapse_20si" value="Sí" >
                                <label class="form-check-label" for="tapse_20si">Si</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tapse_20" id="tapse_20no" value="No" >
                                <label class="form-check-label" for="tapse_20no">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fraccion_de_acortamiento" class="form-label mb-0">Fracción de acortamiento <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar si el valor de la fracción de acortamiento es más de 35."></span></label>
                        <input type="number" name="fraccion_de_acortamiento" class="form-control" id="fraccion_de_acortamiento">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fevi_seguimiento" class="form-label mb-0">Fracción de eyección ventricular izquierda <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar el valor (solo números, no colocar el %) del FEVI y Fecha (DD/MM/AA) de medición del FEVI."></span></label>
                        <div id="fevi_seguimiento_container">
                            <div class="fevi_seguimiento_row row align-items-center">
                                <div class="col-7 col-md-7 pr-0">
                                    <input type="number" name="fevi_seguimiento[0][valor]" class="form-control rounded-left" placeholder="Valor en %" style="border-radius: 0px;">
                                </div>
                                <div class="col-4 col-md-4 pl-0">
                                    <input type="date" name="fevi_seguimiento[0][fecha]" class="form-control rounded-right" placeholder="Fecha" style="border-radius: 0px;">
                                </div>
                                <div class="col-1 col-md-1 pl-0">
                                    <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm rounded disabled remove_fevi_seguimiento" title="Eliminar diagnóstico"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm mt-2" id="add_fevi_seguimiento">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Agregar FEVI
                        </a>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fevi_reducidasi" class="form-label mb-0">Diagnóstico de la fracción de eyección ventricular menor a 40% <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="¿La FEVI se redujo menor o igual al 40% durante el seguimiento.? y la fecha DD-MM-YYYY."></span></label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fevi_reducida" id="fevi_reducidasi" value="Sí" >
                                        <label class="form-check-label" for="fevi_reducidasi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fevi_reducida" id="fevi_reducidano" value="No" >
                                        <label class="form-check-label" for="fevi_reducidano">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_fevi_reducida" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diametro_ventricular_izquierda_al_final_de_la_diastole" class="form-label mb-0">Diámetro ventricular izquierdo al final de la diástole (mm) <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar el valor del diámetro ventricular izquierdo al final de la diástole (solo el número) detectado durante el seguimiento y la fecha."></span></label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="number" name="diametro_ventricular_izquierda_al_final_de_la_diastole" class="form-control rounded-left" style="border-radius: 0px;" placeholder="Diámetro en mm">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_diametro_ventricular_izquierda_al_final_de_la_diastole" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="diametro_ventricular_izquierda_al_final_de_la_sistole" class="form-label mb-0">Diámetro ventricular izquierdo al final de la sístole (mm) <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar el valor del diámetro ventricular izquierdo al final de la sístole (solo el número) detectado durante el seguimiento y la fecha."></span></label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="number" name="diametro_ventricular_izquierda_al_final_de_la_sistole" class="form-control rounded-left" style="border-radius: 0px;" placeholder="Diámetro en mm">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_diametro_ventricular_izquierda_al_final_de_la_sistole" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Datos ecocardiográficos-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos ecocardiográficos</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="complicaciones_inmediatas" class="form-label mb-0">Complicaciones inmediatas o tardías </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="complicaciones_inmediatas_tardias" id="complicaciones_inmediatas" value="Inmediatas" >
                                <label class="form-check-label" for="complicaciones_inmediatas">Inmediatas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="complicaciones_inmediatas_tardias" id="complicaciones_tardias" value="Tardías" >
                                <label class="form-check-label" for="complicaciones_tardias">Tardías</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicaciones_protesis" class="form-label mb-0">Complicaciones de la prótesis </label>
                        <select name="complicaciones_protesis" class="form-control" id="complicaciones_protesis">
                            <option value="">Seleccionar...</option>
                            <option value="Leeks paravalvulares">Leeks paravalvulares</option>
                            <option value="Mismatch">Mismatch</option>
                            <option value="Trombosis">Trombosis</option>
                            <option value="Pannus">Pannus</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicación_falla_cardiacasi" class="form-label mb-0">Falla cardiaca como complicación de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicación_falla_cardiaca" id="complicación_falla_cardiacasi" value="Sí" >
                                        <label class="form-check-label" for="complicación_falla_cardiacasi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicación_falla_cardiaca" id="complicación_falla_cardiacano" value="No" >
                                        <label class="form-check-label" for="complicación_falla_cardiacano">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicación_falla_cardiaca" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_strokesi" class="form-label mb-0">Stroke como complicación de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_stroke" id="complicacion_strokesi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_strokesi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_stroke" id="complicacion_strokeno" value="No" >
                                        <label class="form-check-label" for="complicacion_strokeno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_stroke" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_endocarditissi" class="form-label mb-0">Endocarditis como complicación de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_endocarditis" id="complicacion_endocarditissi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_endocarditissi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_endocarditis" id="complicacion_endocarditisno" value="No" >
                                        <label class="form-check-label" for="complicacion_endocarditisno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_endocarditis" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_sangradosi" class="form-label mb-0">Sangrado como complicación de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_sangrado" id="complicacion_sangradosi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_sangradosi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_sangrado" id="complicacion_sangradono" value="No" >
                                        <label class="form-check-label" for="complicacion_sangradono">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_sangrado" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_tromboembolismosi" class="form-label mb-0">Tromboembolismo como complicación de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_tromboembolismo" id="complicacion_tromboembolismosi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_tromboembolismosi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_tromboembolismo" id="complicacion_tromboembolismono" value="No" >
                                        <label class="form-check-label" for="complicacion_tromboembolismono">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_tromboembolismo" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 mb-2">
                        <label for="complicacion_fibrilacion_auricularsi" class="form-label mb-0">Fibrilación auricular como complicación de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_fibrilacion_auricular" id="complicacion_fibrilacion_auricularsi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_fibrilacion_auricularsi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_fibrilacion_auricular" id="complicacion_fibrilacion_auricularno" value="No" >
                                        <label class="form-check-label" for="complicacion_fibrilacion_auricularno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_fibrilacion_auricular" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_otros_hallazgos_ecgsi" class="form-label mb-0">Otros hallazgos en el electrocardiograma como complicaciones de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_otros_hallazgos_ecg" id="complicacion_otros_hallazgos_ecgsi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_tromboembolismosi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_otros_hallazgos_ecg" id="complicacion_otros_hallazgos_ecgno" value="No" >
                                        <label class="form-check-label" for="complicacion_tromboembolismono">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_otros_hallazgos_ecg" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_trombo_auricularsi" class="form-label mb-0">Trombo auricular como complicación de la valvulopatía </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_trombo_auricular" id="complicacion_trombo_auricularsi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_trombo_auricularsi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_trombo_auricular" id="complicacion_trombo_auricularno" value="No" >
                                        <label class="form-check-label" for="complicacion_trombo_auricularno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_trombo_auricular" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_muerte_generalsi" class="form-label mb-0">Muerte de causa general (causas no cardiovasculares) </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_muerte_general" id="complicacion_muerte_generalsi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_muerte_generalsi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_muerte_general" id="complicacion_muerte_generalno" value="No" >
                                        <label class="form-check-label" for="complicacion_muerte_generalno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_muerte_general" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_muerte_cardiovascularsi" class="form-label mb-0">Muerte de causa cardiovascular (causas cardiovasculares)</label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_muerte_cardiovascular" id="complicacion_muerte_cardiovascularsi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_muerte_cardiovascularsi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_muerte_cardiovascular" id="complicacion_muerte_cardiovascularno" value="No" >
                                        <label class="form-check-label" for="complicacion_muerte_cardiovascularno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_muerte_cardiovascular" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="complicacion_hospitalizacion_cardiovascularsi" class="form-label mb-0">Hospitalización de causa cardiovascular </label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <div class="form-control rounded-left radioptions" style="border-radius: 0px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_hospitalizacion_cardiovascular" id="complicacion_hospitalizacion_cardiovascularsi" value="Sí" >
                                        <label class="form-check-label" for="complicacion_hospitalizacion_cardiovascularsi">Si</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="complicacion_hospitalizacion_cardiovascular" id="complicacion_hospitalizacion_cardiovascularno" value="No" >
                                        <label class="form-check-label" for="complicacion_hospitalizacion_cardiovascularno">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="date" name="fecha_complicacion_hospitalizacion_cardiovascular" class="form-control rounded-right" style="border-radius: 0px;padding: 5px 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="ava_planimetria" class="form-label mb-0">AVA por planimetría para estenosis aórtica</label>
                        <input type="text" name="ava_planimetria" class="form-control" id="ava_planimetria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="modalidad_diagnostico_estenosis_aortica1" class="form-label mb-0">Modalidad de diagnóstico en estenosis aórtica</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="modalidad_diagnostico_estenosis_aortica" id="modalidad_diagnostico_estenosis_aortica1" value="Ecocardiografía" >
                                <label class="form-check-label" for="modalidad_diagnostico_estenosis_aortica1">Ecocardiografía</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="modalidad_diagnostico_estenosis_aortica" id="modalidad_diagnostico_estenosis_aortica2" value="ETE" >
                                <label class="form-check-label" for="modalidad_diagnostico_estenosis_aortica2">ETE</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="vena_contracta" class="form-label mb-0">Vena contracta (agregar que es para insuficiencia aórtica, insuficiencia tricuspídea, insuficiencia mitral, insuficiencia pulmonar)</label>
                        <input type="text" name="vena_contracta" class="form-control" id="vena_contracta">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="avm_planimetria" class="form-label mb-0">AVM por planimetría para estenosis mitral</label>
                        <input type="text" name="avm_planimetria" class="form-control" id="avm_planimetria">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="vc" class="form-label mb-0">VC (estenosis pulmonar, insuficiencia aórtica e insuficiencia mitral)</label>
                        <input type="text" name="vc" class="form-control" id="vc">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="clasificacion_carpentier" class="form-label mb-0">Clasificación carpentier para insuficiencia aórtica, insuficiencia mitral  e insuficiencia tricuspídea (categorías: IA, IB, IC, ID, II, III)</label>
                        <input type="text" name="clasificacion_carpentier" class="form-control" id="clasificacion_carpentier">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="volumen_regurgitante" class="form-label mb-0">Volumen regurgitante para insuficiencia aórtica e insuficiencia mitral</label>
                        <input type="text" name="volumen_regurgitante" class="form-control" id="volumen_regurgitante">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="compromiso_ventriculo_derecho" class="form-label mb-0">Compromiso de ventrículo derecho</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compromiso_ventriculo_derecho" id="compromiso_ventriculo_derecho1" value="Sí" >
                                <label class="form-check-label" for="compromiso_ventriculo_derecho1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compromiso_ventriculo_derecho" id="compromiso_ventriculo_derecho2" value="No" >
                                <label class="form-check-label" for="compromiso_ventriculo_derecho2">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="velocidad_onda_s" class="form-label mb-0">Velocidad de onda S</label>
                        <input type="text" name="velocidad_onda_s" class="form-control" id="velocidad_onda_s">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="morfologia_valvula_insuficiencia_tricuspidea" class="form-label mb-0">Morfología para insuficiencia tricuspídea</label>
                        <input type="text" name="morfologia_valvula_insuficiencia_tricuspidea" class="form-control" id="morfologia_valvula_insuficiencia_tricuspidea">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="numero_velos_insuficiencia_tricuspidea" class="form-label mb-0">Número de velos para insuficiencia tricuspídea</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="numero_velos_insuficiencia_tricuspidea" id="numero_velos_insuficiencia_tricuspidea1" value="2" >
                                <label class="form-check-label" for="numero_velos_insuficiencia_tricuspidea1">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="numero_velos_insuficiencia_tricuspidea" id="numero_velos_insuficiencia_tricuspidea2" value="3" >
                                <label class="form-check-label" for="numero_velos_insuficiencia_tricuspidea2">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="numero_velos_insuficiencia_tricuspidea" id="numero_velos_insuficiencia_tricuspidea3" value="4" >
                                <label class="form-check-label" for="numero_velos_insuficiencia_tricuspidea3">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="numero_velos_insuficiencia_tricuspidea" id="numero_velos_insuficiencia_tricuspidea4" value="Otros" >
                                <label class="form-check-label" for="numero_velos_insuficiencia_tricuspidea4">Otros</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="psap_estimada_cateterismo" class="form-label mb-0">PSAP estimada por cateterismo cardiaco derecho</label>
                        <input type="text" name="psap_estimada_cateterismo" class="form-control" id="psap_estimada_cateterismo">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="psap_estimada" class="form-label mb-0">PSAP estimada</label>
                        <input type="text" name="psap_estimada" class="form-control" id="psap_estimada">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="resistencia_pulmonar" class="form-label mb-0">Resistencia pulmonar</label>
                        <input type="text" name="resistencia_pulmonar" class="form-control" id="resistencia_pulmonar">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="volumen_auricula_izquierda" class="form-label mb-0">Volumen de aurícula izquierda en cm3</label>
                        <input type="text" name="volumen_auricula_izquierda" class="form-control" id="volumen_auricula_izquierda">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="area_auricula_derecha" class="form-label mb-0">Área de aurícula derecha en cm2</label>
                        <input type="text" name="area_auricula_derecha" class="form-control" id="area_auricula_derecha">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="remodelamiento_ventriculo_izquierdo" class="form-label mb-0">Remodelamiento de ventrículo izquierdo</label>
                        <select name="remodelamiento_ventriculo_izquierdo" class="form-control" id="remodelamiento_ventriculo_izquierdo">
                            <option value="">Seleccionar...</option>
                            <option value="Normal">Normal</option>
                            <option value="Concéntrico">Concéntrico</option>
                            <option value="Excéntrico">Excéntrico</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="fraccion_eyeccion_simpson" class="form-label mb-0">Fracción de eyección por Simpson</label>
                        <input type="text" name="fraccion_eyeccion_simpson" class="form-control" id="fraccion_eyeccion_simpson">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="situacion_ventriculo_derecho" class="form-label mb-0">Situación de ventrículo derecho</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="situacion_ventriculo_derecho" id="situacion_ventriculo_derecho1" value="Normal" >
                                <label class="form-check-label" for="situacion_ventriculo_derecho1">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="situacion_ventriculo_derecho" id="situacion_ventriculo_derecho2" value="Dilatado" >
                                <label class="form-check-label" for="situacion_ventriculo_derecho2">Dilatado</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="valor_tapse" class="form-label mb-0">Valor del TAPSE</label>
                        <input type="text" name="valor_tapse" class="form-control" id="valor_tapse">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="senos_raiz_aorta_ascendente" class="form-label mb-0">Senos de raíz de aorta ascendente</label>
                        <input type="text" name="senos_raiz_aorta_ascendente" class="form-control" id="senos_raiz_aorta_ascendente">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="volumen_regurgitante_tricuspidea" class="form-label mb-0">Volumen regurgitante para insuficiencia tricuspídea</label>
                        <input type="text" name="volumen_regurgitante_tricuspidea" class="form-control" id="volumen_regurgitante_tricuspidea">
                    </div>

                </div>

                <!-- Accordion -->
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header active-accordion" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1.- ESTENOSIS AORTICA
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="morfologia_valvula_estenosis_aortica" class="form-label mb-0">Morfología de válvula en estenosis aórtica</label>
                                    <select name="morfologia_valvula_estenosis_aortica" class="form-control" id="morfologia_valvula_estenosis_aortica">
                                        <option value="">Seleccionar...</option>
                                        <option value="Unicúspide">Unicúspide</option>
                                        <option value="Bicúspide">Bicúspide</option>
                                        <option value="Tricúspide">Tricúspide</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="velocidad_maxima" class="form-label mb-0">Velocidad máxima (Estenosis tricuspidea, insuficiencia tricuspidea, estenosis pulmonar)</label>
                                    <input type="text" name="velocidad_maxima" class="form-control" id="velocidad_maxima">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="area_valvular_mitral" class="form-label mb-0">Área valvular mitral</label>
                                    <input type="text" name="area_valvular_mitral" class="form-control" id="area_valvular_mitral">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="severidad_valvulopatia" class="form-label mb-0">Severidad de valvulopatía</label>
                                    <div class="form-control radioptions">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="severidad_valvulopatia" id="severidad_valvulopatia1" value="Leve" >
                                            <label class="form-check-label" for="severidad_valvulopatia1">Leve</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="severidad_valvulopatia" id="severidad_valvulopatia2" value="Moderada" >
                                            <label class="form-check-label" for="severidad_valvulopatia2">Moderada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="severidad_valvulopatia" id="severidad_valvulopatia3" value="Severa" >
                                            <label class="form-check-label" for="severidad_valvulopatia3">Severa</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="etiologia" class="form-label mb-0">Etiología</label>
                                    <input type="text" name="etiologia" class="form-control" id="etiologia">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="volumen_sistolico_eyeccion" class="form-label mb-0">Volumen sistólico de eyección para estenosis aórtica</label>
                                    <input type="text" name="volumen_sistolico_eyeccion" class="form-control" id="volumen_sistolico_eyeccion">
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
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="jet" class="form-label mb-0">JET para insuficiencia aórtica, insuficiencia tricuspídea, insuficiencia mitral (central o excéntrica)</label>
                                    <input type="text" name="jet" class="form-control" id="jet">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="ore" class="form-label mb-0">ORE para insuficiencia aórtica e insuficiencia mitral</label>
                                    <input type="text" name="ore" class="form-control" id="ore">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="severidad_insuficiencia_tricuspidea" class="form-label mb-0">Severidad de insuficiencia tricuspídea</label>
                                    <select name="severidad_insuficiencia_tricuspidea" class="form-control" id="severidad_insuficiencia_tricuspidea">
                                        <option value="">Seleccionar...</option>
                                        <option value="Leve">Leve</option>
                                        <option value="Moderada">Moderada</option>
                                        <option value="Severa">Severa</option>
                                        <option value="Masiva">Masiva</option>
                                        <option value="Torrencial">Torrencial</option>
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
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="score_wilkins" class="form-label mb-0">Score de Wilkins para estenosis mitral</label>
                                <input type="text" name="score_wilkins" class="form-control" id="score_wilkins">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="gradiente_media" class="form-label mb-0">Gradiente media (Estenosis tricuspidea, estenosis pulmonar)</label>
                                <input type="text" name="gradiente_media" class="form-control" id="gradiente_media">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="tiempo_hemipresion" class="form-label mb-0">Tiempo de hemipresión (Para estenosis mitral)</label>
                                <input type="number" name="tiempo_hemipresion" class="form-control" id="tiempo_hemipresion">
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
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                Contenido INSUFICIENCIA MITRAL
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
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                Contenido ESTENOSIS TRICUSPIDEA
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
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
                                Contenido INSUFICIENCIA TRICUSPIDEA
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
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                            <div class="card-body">
                                Contenido ESTENOSIS PULMONAR
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
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                Contenido INSUIFICENCIA PULMONAR
                            </div>
                        </div>
                    </div>
                    

                  </div>

            </div>
        </div>

        <!-- Datos Cateterismo cardiaco-->
        <div class="card shadow mb-4">
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
        </div>

        <!-- Datos Tratamiento Valvular-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Datos Tratamiento Valvular</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-2">
                        <label for="fecha_intervencion" class="form-label mb-0">Fecha de intervención</label>
                        <input type="date" name="fecha_intervencion" class="form-control" id="fecha_intervencion">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="valvulas_tratadas" class="form-label mb-0">Válvulas tratadas</label>
                        <input type="text" name="valvulas_tratadas" class="form-control" id="valvulas_tratadas">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="manejo_quirurgico" class="form-label mb-0">Manejo quirúrgico</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_quirurgico" id="manejo_quirurgico1" value="Reparación" >
                                <label class="form-check-label" for="manejo_quirurgico1">Reparación</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_quirurgico" id="manejo_quirurgico2" value="Dispositivo" >
                                <label class="form-check-label" for="manejo_quirurgico2">Dispositivo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_quirurgico" id="manejo_quirurgico3" value="Prótesis" >
                                <label class="form-check-label" for="manejo_quirurgico3">Prótesis</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="protesis" class="form-label mb-0">Prótesis</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="protesis" id="protesis1" value="Biologica" >
                                <label class="form-check-label" for="protesis1">Biologica</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="protesis" id="protesis2" value="Mecanica" >
                                <label class="form-check-label" for="protesis2">Mecanica</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tipo_dispositivo_intervencionismo" class="form-label mb-0">Tipo de dispositivo en intervencionismo</label>
                        <input type="text" name="tipo_dispositivo_intervencionismo" class="form-control" id="tipo_dispositivo_intervencionismo">
                    </div>

                </div>
            </div>
        </div>

        <!-- Otros -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Otros</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-control">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="border-top: none;">
                                                <label for="ubicacion_protesis_valvulares" class="form-label mb-0 d-block">Medicación</label>
                                            </th>
                                            <th style="border-top: none;" class="text-center">
                                               
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="manejo_reemplazo_valvularsi" class="form-label">Reemplazo valvular</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_reemplazo_valvular" id="manejo_reemplazo_valvularsi" value="Sí" >
                                <label class="form-check-label" for="manejo_reemplazo_valvularsi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_reemplazo_valvular" id="manejo_reemplazo_valvularno" value="No" >
                                <label class="form-check-label" for="manejo_reemplazo_valvularno">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="medicacion_clopidogrelsi" class="form-label mb-0">Administración de clopidrogel</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="medicacion_clopidogrel" id="medicacion_clopidogrelsi" value="Sí" >
                                <label class="form-check-label" for="medicacion_clopidogrelsi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="medicacion_clopidogrel" id="medicacion_clopidogrelno" value="No" >
                                <label class="form-check-label" for="medicacion_clopidogrelno">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="manejo_qx_intervencionismo_estenosis1" class="form-label mb-0">Para las estenosis, manejo quirúrgico o intervencionismo</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_qx_intervencionismo_estenosis" id="manejo_qx_intervencionismo_estenosis1" value="Quirúrgico" >
                                <label class="form-check-label" for="manejo_qx_intervencionismo_estenosis1">Quirúrgico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_qx_intervencionismo_estenosis" id="manejo_qx_intervencionismo_estenosis2" value="Intervencionismo" >
                                <label class="form-check-label" for="manejo_qx_intervencionismo_estenosis2">Intervencionismo </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="manejo_qx_estenosis1" class="form-label mb-0">Para las estenosis, tipo de manejo quirúrgico: reemplazo quirúrgico o manejo hemodinámico</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_qx_estenosis" id="manejo_qx_estenosis1" value="Reemplazo quirúrgico" >
                                <label class="form-check-label" for="manejo_qx_estenosis1">Reemplazo quirúrgico </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_qx_estenosis" id="manejo_qx_estenosis2" value="Hemodinámico" >
                                <label class="form-check-label" for="manejo_qx_estenosis2">Hemodinámico </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="tavisi" class="form-label mb-0">Implantación de la válvula aórtica transcatéter</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tavi" id="tavisi" value="Sí" >
                                <label class="form-check-label" for="tavisi">Sí </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tavi" id="tavino" value="No" >
                                <label class="form-check-label" for="tavino">No </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="manejo_plastia_reemplazo_insuficiencia1" class="form-label mb-0">Para las insuficiencias, manejo tipo plastia o reemplazo valvular (Aplica para las insuficiencias)</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_plastia_reemplazo_insuficiencia" id="manejo_plastia_reemplazo_insuficiencia1" value="Plastia" >
                                <label class="form-check-label" for="manejo_plastia_reemplazo_insuficiencia1">Plastia </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_plastia_reemplazo_insuficiencia" id="manejo_plastia_reemplazo_insuficiencia2" value="Reemplazo" >
                                <label class="form-check-label" for="manejo_plastia_reemplazo_insuficiencia2">Reemplazo </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="manejo_reemplazo_insuficiencia1" class="form-label mb-0">Para las insuficiencias, tipo de reemplazo valvular: mecánico o biológico (Aplica para las insuficiencias)</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_reemplazo_insuficiencia" id="manejo_reemplazo_insuficiencia1" value="Plastia" >
                                <label class="form-check-label" for="manejo_reemplazo_insuficiencia1">Mecánica </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="manejo_reemplazo_insuficiencia" id="manejo_reemplazo_insuficiencia2" value="Reemplazo" >
                                <label class="form-check-label" for="manejo_reemplazo_insuficiencia2">Biológica  </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

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
        var accordionButtons = document.querySelectorAll('.accordion .card-header button');

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

    });



    // Inicialización del contador de campos de diagnóstico específico
    let cc_contador = 0;

    // Función para agregar más campos de Diagnóstico específico dinámicamente
    document.getElementById('add_fevi_seguimiento').addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        const container = document.getElementById('fevi_seguimiento_container');
        const nuevaFila = document.createElement('div');
        nuevaFila.classList.add('fevi_seguimiento_row', 'row', 'align-items-center', 'mt-2');
        cc_contador++; // Incrementar el contador antes de crear la nueva fila
        nuevaFila.innerHTML = `
            <div class="col-7 col-md-7 pr-0">
                <input type="number" name="fevi_seguimiento[${cc_contador}][valor]" class="form-control rounded-left" placeholder="Valor en %" style="border-radius: 0;">
            </div>
            <div class="col-4 col-md-4 pl-0">
                <input type="date" name="fevi_seguimiento[${cc_contador}][fecha]" class="form-control rounded-right" placeholder="Fecha" style="border-radius: 0;">
            </div>
            <div class="col-1 col-md-1 pl-0">
                <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm rounded remove_fevi_seguimiento" title="Eliminar FEVI" style="display: none;"><i class="fas fa-trash"></i></a>
            </div>
        `;
        container.appendChild(nuevaFila);
        
        // Ocultar todos los botones "Eliminar diagnóstico" excepto el último
        document.querySelectorAll('.remove_fevi_seguimiento').forEach(btn => btn.style.display = 'none');
        nuevaFila.querySelector('.remove_fevi_seguimiento').style.display = 'block';

        // Agregar evento de clic a todos los botones "Eliminar diagnóstico"
        document.querySelectorAll('.remove_fevi_seguimiento').forEach(btn => {
            btn.addEventListener('click', cc_eliminarFila);
        });
    });

    // Función para eliminar la fila de diagnóstico específico
    function cc_eliminarFila(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        const fila = event.target.closest('.fevi_seguimiento_row');
        fila.remove();
        cc_contador--; // Reducir el contador al eliminar una fila
        
        // Mostrar el botón "Eliminar diagnóstico" en el último row
        const rows = document.querySelectorAll('.fevi_seguimiento_row');
        if (rows.length > 0) {
            rows[rows.length - 1].querySelector('.remove_fevi_seguimiento').style.display = 'block';
        }
        
        console.log('Fila eliminada');
    }

    // Agregar evento de clic a los botones "Eliminar diagnóstico" existentes
    document.querySelectorAll('.remove_fevi_seguimiento').forEach(btn => {
        btn.addEventListener('click', cc_eliminarFila);
    });



</script>
@endsection
