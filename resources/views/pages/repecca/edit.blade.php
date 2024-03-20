@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Repecca</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('repecca.update', $repecca->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Información Responsable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Responsable y seguro.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="responsable" class="form-label mb-0">Responsable <small class="requiredata">*</small></label>
                        <input type="text" name="responsable" class="form-control" id="responsable" value="@if($repecca->trato != ''){{ $repecca->trato.' ' }}@endif{{ $repecca->name }} {{ $repecca->lastname }}" readonly>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tipo_seguro" class="form-label mb-0">Tipo de seguro <small class="requiredata">*</small></label>
                        <select name="tipo_seguro" id="tipo_seguro" class="form-control" required>
                            <option value="" @if($repecca->tipo_seguro == '') selected @endif>Seleccionar...</option>
                            <option value="EsSalud" @if($repecca->tipo_seguro == 'EsSalud') selected @endif>EsSalud</option>
                            <option value="MINSA" @if($repecca->tipo_seguro == 'MINSA') selected @endif>MINSA</option>
                            <option value="Privada" @if($repecca->tipo_seguro == 'Privada') selected @endif>Privada</option>
                            <option value="Fuerzas armadas / policiales" @if($repecca->tipo_seguro == 'Fuerzas armadas / policiales') selected @endif>Fuerzas armadas / policiales</option>
                            <option value="Otros" @if($repecca->tipo_seguro == 'Otros') selected @endif>Otros</option>
                        </select>
                        <input type="text" name="tipo_seguro_otro" class="form-control mt-2 @if($repecca->tipo_seguro != 'Otros') d-none @endif" id="tipo_seguro_otro" placeholder="Especificar otro seguro">
                    </div>
                </div>
            </div>
        </div>

        <!-- Información sociodemográfica -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Información sociodemográfica</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="fecha_ultima_atencion" class="form-label mb-0">Fecha de ultima atención por cardiología <small class="requiredata">*</small></label>
                        <input type="date" name="fecha_ultima_atencion" class="form-control" id="fecha_ultima_atencion" value="{{ $repecca->fecha_ultima_atencion }}" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="numero_historia_clinica" class="form-label mb-0">Número de historia clínica <small class="requiredata">*</small></label>
                        <input type="text" name="numero_historia_clinica" class="form-control" id="numero_historia_clinica" value="{{ $repecca->numero_historia_clinica }}" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="sexo" class="form-label mb-0">Sexo </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="Masculino" @if($repecca->sexo == 'Masculino') checked @endif>
                                <label class="form-check-label" for="sexo1">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="Femenino" @if($repecca->sexo == 'Femenino') checked @endif>
                                <label class="form-check-label" for="sexo2">Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="edad" class="form-label mb-0">Edad (años) </label>
                        <input type="number" name="edad" class="form-control" id="edad" value="{{ $repecca->edad }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="estado_civil" class="form-label mb-0">Estado civil </label>
                        <select name="estado_civil" id="estado_civil" class="form-control" >
                            <option value="" @if($repecca->estado_civil == '') selected @endif>Seleccionar...</option>
                            <option value="Soltero" @if($repecca->estado_civil == 'Soltero') selected @endif>Soltero</option>
                            <option value="Casado/conviviente" @if($repecca->estado_civil == 'Casado/conviviente') selected @endif>Casado/conviviente</option>
                            <option value="Viudo" @if($repecca->estado_civil == 'Viudo') selected @endif>Viudo</option>
                            <option value="Divorciado" @if($repecca->estado_civil == 'Divorciado') selected @endif>Divorciado</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="grado_instruccion" class="form-label mb-0">Grado de instrucción </label>
                        <select name="grado_instruccion" id="grado_instruccion" class="form-control" >
                            <option value="" @if($repecca->grado_instruccion == '') selected @endif>Seleccionar...</option>
                            <option value="Analfabeto" @if($repecca->grado_instruccion == 'Analfabeto') selected @endif>Analfabeto</option>
                            <option value="Primaria" @if($repecca->grado_instruccion == 'Primaria') selected @endif>Primaria</option>
                            <option value="Secundaria" @if($repecca->grado_instruccion == 'Secundaria') selected @endif>Secundaria</option>
                            <option value="Superior" @if($repecca->grado_instruccion == 'Superior') selected @endif>Superior</option>
                            <option value="Universitaria" @if($repecca->grado_instruccion == 'Universitaria') selected @endif>Universitaria</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="actividad_laboral" class="form-label mb-0">Actividad laboral </label>
                        <select name="actividad_laboral" id="actividad_laboral" class="form-control" >
                            <option value="" @if($repecca->actividad_laboral == '') selected @endif>Seleccionar...</option>
                            <option value="Desempleado" @if($repecca->actividad_laboral == 'Desempleado') selected @endif>Desempleado</option>
                            <option value="Empleado tiempo parcial" @if($repecca->actividad_laboral == 'Empleado tiempo parcial') selected @endif>Empleado tiempo parcial</option>
                            <option value="Empleado tiempo completo" @if($repecca->actividad_laboral == 'Empleado tiempo completo') selected @endif>Empleado tiempo completo</option>
                            <option value="Jubilado" @if($repecca->actividad_laboral == 'Jubilado') selected @endif>Jubilado</option>
                            <option value="Independiente" @if($repecca->actividad_laboral == 'Independiente') selected @endif>Independiente</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="numero_gestas" class="form-label mb-0">En caso de sexo femenino completar formula obstétrica</label>
                        <div class="form-control">
                            <div class="table-responsive mt-1">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>>10</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Número de gestas</td>
                                            <td><input type="radio" name="numero_gestas" value="1"></td>
                                            <td><input type="radio" name="numero_gestas" value="2"></td>
                                            <td><input type="radio" name="numero_gestas" value="3"></td>
                                            <td><input type="radio" name="numero_gestas" value="4"></td>
                                            <td><input type="radio" name="numero_gestas" value="5"></td>
                                            <td><input type="radio" name="numero_gestas" value="6"></td>
                                            <td><input type="radio" name="numero_gestas" value="7"></td>
                                            <td><input type="radio" name="numero_gestas" value="8"></td>
                                            <td><input type="radio" name="numero_gestas" value="9"></td>
                                            <td><input type="radio" name="numero_gestas" value="10"></td>
                                        </tr>
                                        <tr>
                                            <td>Partos a termino</td>
                                            <td><input type="radio" name="partos_a_termino" value="1"></td>
                                            <td><input type="radio" name="partos_a_termino" value="2"></td>
                                            <td><input type="radio" name="partos_a_termino" value="3"></td>
                                            <td><input type="radio" name="partos_a_termino" value="4"></td>
                                            <td><input type="radio" name="partos_a_termino" value="5"></td>
                                            <td><input type="radio" name="partos_a_termino" value="6"></td>
                                            <td><input type="radio" name="partos_a_termino" value="7"></td>
                                            <td><input type="radio" name="partos_a_termino" value="8"></td>
                                            <td><input type="radio" name="partos_a_termino" value="9"></td>
                                            <td><input type="radio" name="partos_a_termino" value="10"></td>
                                        </tr>
                                        <tr>
                                            <td>Partos pretermino</td>
                                            <td><input type="radio" name="partos_pretermino" value="1"></td>
                                            <td><input type="radio" name="partos_pretermino" value="2"></td>
                                            <td><input type="radio" name="partos_pretermino" value="3"></td>
                                            <td><input type="radio" name="partos_pretermino" value="4"></td>
                                            <td><input type="radio" name="partos_pretermino" value="5"></td>
                                            <td><input type="radio" name="partos_pretermino" value="6"></td>
                                            <td><input type="radio" name="partos_pretermino" value="7"></td>
                                            <td><input type="radio" name="partos_pretermino" value="8"></td>
                                            <td><input type="radio" name="partos_pretermino" value="9"></td>
                                            <td><input type="radio" name="partos_pretermino" value="10"></td>
                                        </tr>
                                        <tr>
                                            <td>Abortos</td>
                                            <td><input type="radio" name="abortos" value="1"></td>
                                            <td><input type="radio" name="abortos" value="2"></td>
                                            <td><input type="radio" name="abortos" value="3"></td>
                                            <td><input type="radio" name="abortos" value="4"></td>
                                            <td><input type="radio" name="abortos" value="5"></td>
                                            <td><input type="radio" name="abortos" value="6"></td>
                                            <td><input type="radio" name="abortos" value="7"></td>
                                            <td><input type="radio" name="abortos" value="8"></td>
                                            <td><input type="radio" name="abortos" value="9"></td>
                                            <td><input type="radio" name="abortos" value="10"></td>
                                        </tr>
                                        <tr>
                                            <td>Número de hijos vivos</td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="1"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="2"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="3"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="4"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="5"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="6"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="7"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="8"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="9"></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="10"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Diagnóstico y características clínicas -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Diagnóstico y características clínicas.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="diagnostico_especifico" class="form-label mb-0">Diagnóstico específico y año de diagnóstico <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Colocar todos los diagnósticos de cardiopatías congénitas. Ejm: Coartación de aorta - 2014."></span></label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="text" name="diagnostico_especifico" class="form-control rounded-left" id="diagnostico_especifico" placeholder="Diagnóstico" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="number" name="diagnostico_especifico_ano" class="form-control rounded-right" id="diagnostico_especifico_ano" placeholder="Año" style="border-radius: 0px;">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="transicion_cardiologia" class="form-label mb-0">Transición de cardiología pediátrica a adulto <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Considerar solo si fue referido del servicio de cardiología pediátrica a cardiología del adulto."></span></label>
                        <select name="transicion_cardiologia" id="transicion_cardiologia" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="No">No</option>
                            <option value="Sí, de emergencia">Si, de emergencia</option>
                            <option value="Sí, planificado">Sí, planificado</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="sindrome_genetico_asociado1" class="form-label mb-0 d-block">Síndromes genéticos asociados </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado1" value="Ninguna">
                                <label class="form-check-label" for="sindrome_genetico_asociado1">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado2" value="Sd. Down">
                                <label class="form-check-label" for="sindrome_genetico_asociado2">Sd. Down</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado3" value="Sd. Marfan">
                                <label class="form-check-label" for="sindrome_genetico_asociado3">Sd. Marfan</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado4" value="Sd. Turner">
                                <label class="form-check-label" for="sindrome_genetico_asociado4">Sd. Turner</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado5" value="Sd. Williams">
                                <label class="form-check-label" for="sindrome_genetico_asociado5">Sd. Williams</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado6" value="Sd. Di George">
                                <label class="form-check-label" for="sindrome_genetico_asociado6">Sd. Di George</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado7" value="Sd. Noonan">
                                <label class="form-check-label" for="sindrome_genetico_asociado7">Sd. Noonan</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado8" value="VACTERL">
                                <label class="form-check-label" for="sindrome_genetico_asociado8">VACTERL</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado9" value="Otro">
                                <label class="form-check-label" for="sindrome_genetico_asociado9">Otro:</label>
                                <input type="text" name="sindrome_genetico_asociado_otro" class="form-control mb-2 d-none" id="sindrome_genetico_asociado_otro" placeholder="Especificar otro síndrome genético asociado">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="severidad" class="form-label mb-0">Severidad de la cardiopatía congénita <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="(Ver anexo 4)"></span></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="severidad" id="severidad1" value="Simple" >
                                <label class="form-check-label" for="severidad1">Simple</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="severidad" id="severidad2" value="Moderada" >
                                <label class="form-check-label" for="severidad2">Moderada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="severidad" id="severidad3" value="Severa" >
                                <label class="form-check-label" for="severidad3">Severa</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="clasificacion_anatomica" class="form-label mb-0">Clasificación anatómica - funcional (AP) <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="(Ver anexo 5) - Solo marcar una opción."></span></label>
                        <div class="form-control">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Anatómica: I, simple</th>
                                            <th>Anatómica: II, moderada</th>
                                            <th>Anatómica: III, compleja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Funcional: A</td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="I, simple"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="II, moderada"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="III, compleja"></td>
                                        </tr>
                                        <tr>
                                            <td>Funcional: B</td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="I, simple"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="II, moderada"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="III, compleja"></td>
                                        </tr>
                                        <tr>
                                            <td>Funcional: C</td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="I, simple"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="II, moderada"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="III, compleja"></td>
                                        </tr>
                                        <tr>
                                            <td>Funcional: D</td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="I, simple"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="II, moderada"></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="III, compleja"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="clase_funcional" class="form-label mb-0">Clase funcional (NYHA) </label>
                        <select name="clase_funcional" id="clase_funcional" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="NYHA I">NYHA I</option>
                            <option value="NYHA II">NYHA II</option>
                            <option value="NYHA III">NYHA III</option>
                            <option value="NYHA IV">NYHA IV</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dependencia_funcional" class="form-label mb-0">Dependencia funcional del paciente </label>
                        <select name="dependencia_funcional" id="dependencia_funcional" class="form-control" >
                            <option value="">Seleccionar...</option>
                            <option value="Independiente">Independiente</option>
                            <option value="Dependiente parcial">Dependiente parcial</option>
                            <option value="Dependiente total">Dependiente total</option>
                            <option value="Desconocido">Desconocido</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hospitalizaciones" class="form-label mb-0">Hospitalizaciones por descompensación de la CC </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hospitalizaciones" id="hospitalizaciones1" value="No" >
                                <label class="form-check-label" for="hospitalizaciones1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hospitalizaciones" id="hospitalizaciones2" value="Sí" >
                                <label class="form-check-label" for="hospitalizaciones2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cianosis" class="form-label mb-0">Presenta actualmente cianosis </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cianosis" id="cianosis1" value="No" >
                                <label class="form-check-label" for="cianosis1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cianosis" id="cianosis2" value="Sí" >
                                <label class="form-check-label" for="cianosis2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="saturacion_oxigeno" class="form-label mb-0">Saturación de oxigeno (última registrada en %) <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Solo colocar el número entre 0 a 100."></span></label>
                        <input type="number" name="saturacion_oxigeno" class="form-control" id="saturacion_oxigeno" max="100" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="peso" class="form-label mb-0">Peso actual del participante (Kg) </label>
                        <input type="number" name="peso" class="form-control" id="peso" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="talla" class="form-label mb-0">Talla actual del participante (m) </label>
                        <input type="number" name="talla" class="form-control" id="talla" >
                    </div>
                </div>
            </div>
        </div>

        <!-- Manejo de la CC y presentación clínica -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manejo de la CC y presentación clínica.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="manejo_recibido1" class="form-label mb-0 d-block">Manejo  recibido para la cardiopatía </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido1" value="Ninguno">
                                <label class="form-check-label" for="manejo_recibido1">Ninguno</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido2" value="Completamente reparado">
                                <label class="form-check-label" for="manejo_recibido2">Completamente reparado</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido3" value="Reparado con lesión residual">
                                <label class="form-check-label" for="manejo_recibido3">Reparado con lesión residual</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido4" value="Paliado">
                                <label class="form-check-label" for="manejo_recibido4">Paliado</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido5" value="Manejo médico">
                                <label class="form-check-label" for="manejo_recibido5">Manejo médico</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido6" value="Otro">
                                <label class="form-check-label" for="manejo_recibido6">Otro:</label>
                                <input type="text" name="manejo_recibido_otro" class="form-control mb-2 d-none" id="manejo_recibido_otro" placeholder="Especificar otro manejo recibido">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="protesis_valvulares1" class="form-label mb-0 d-block">Colocación de prótesis valvulares </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="protesis_valvulares[]" id="protesis_valvulares1" value="Ninguna">
                                <label class="form-check-label" for="protesis_valvulares1">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="protesis_valvulares[]" id="protesis_valvulares2" value="Percutánea">
                                <label class="form-check-label" for="protesis_valvulares2">Percutánea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="protesis_valvulares[]" id="protesis_valvulares3" value="Quirúrgica">
                                <label class="form-check-label" for="protesis_valvulares3">Quirúrgica</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="ubicacion_protesis_valvulares" class="form-label mb-0 d-block">Ubicación de las prótesis valvulares</label>
                        <div class="form-control">
                            <div class="table-responsive mt-1">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Biológica</th>
                                            <th>Mecánica</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Aórtica</td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_aortica[]" value="Biológica"></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_aortica[]" value="Mecánica"></td>
                                        </tr>
                                        <tr>
                                            <td>Mitral</td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_mitral[]" value="Biológica"></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_mitral[]" value="Mecánica"></td>
                                        </tr>
                                        <tr>
                                            <td>Pulmonar</td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_pulmonar[]" value="Biológica"></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_pulmonar[]" value="Mecánica"></td>
                                        </tr>
                                        <tr>
                                            <td>Tricúspide</td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_tricuspide[]" value="Biológica"></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_tricuspide[]" value="Mecánica"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="procedimiento_electrofisiologico1" class="form-label mb-0 d-block">Procedimiento electrofisiológico </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="procedimiento_electrofisiologico" id="procedimiento_electrofisiologico1" value="No">
                                <label class="form-check-label" for="procedimiento_electrofisiologico1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="procedimiento_electrofisiologico" id="procedimiento_electrofisiologico2" value="Sí">
                                <label class="form-check-label" for="procedimiento_electrofisiologico2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="marcapasos" class="form-label mb-0 d-block">Marcapasos </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marcapasos" id="marcapasos1" value="No">
                                <label class="form-check-label" for="marcapasos1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marcapasos" id="marcapasos2" value="Sí">
                                <label class="form-check-label" for="marcapasos2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aortoplastia" class="form-label mb-0 d-block">Aortoplastía </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="aortoplastia[]" id="aortoplastia1" value="No">
                                <label class="form-check-label" for="aortoplastia1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="aortoplastia[]" id="aortoplastia2" value="Stent">
                                <label class="form-check-label" for="aortoplastia2">Stent</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="aortoplastia[]" id="aortoplastia3" value="Quirúrgica">
                                <label class="form-check-label" for="aortoplastia3">Quirúrgica</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="paciente" class="form-label mb-0 d-block">Stent en fístulas o tracto de salida del ventrículo derecho (TSVD) </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stent_fistulas" id="stent_fistulas1" value="No">
                                <label class="form-check-label" for="stent_fistulas1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stent_fistulas" id="stent_fistulas2" value="Sí">
                                <label class="form-check-label" for="stent_fistulas2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cirugia_cardiaca" class="form-label mb-0">Cirugía cardiaca y año de procedimiento <span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Ejm: Fístula sistémico-pulmonar - 2010 / banding pulmonar  - 2010  / Cierre de defecto septal con parche  - 2010  / ligadura de PCA - 2010  / Corrección de TdF  - 2010  / Glenn  - 2010  / Fontan  - 2010  / Mustard o Senning  - 2010  / Jatene  - 2010  / Rastelli  - 2010  / otras - 2010  )"></span></label>
                        <div class="row">
                            <div class="col-9 col-md-9 pr-0">
                                <input type="text" name="cirugia_cardiaca" class="form-control" id="cirugia_cardiaca" placeholder="Indicar cirugía" style="border-radius: 0px;">
                            </div>
                            <div class="col-3 col-md-3 pl-0">
                                <input type="number" name="cirugia_cardiaca_ano" class="form-control rounded-right" id="cirugia_cardiaca_ano" placeholder="Año" style="border-radius: 0px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="paciente" class="form-label mb-0 d-block">Ventrículo sistémico </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventriculo_sistemico" id="ventriculo_sistemico1" value="Derecho">
                                <label class="form-check-label" for="ventriculo_sistemico1">Derecho</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventriculo_sistemico" id="ventriculo_sistemico2" value="Izquierdo">
                                <label class="form-check-label" for="ventriculo_sistemico2">Izquierdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventriculo_sistemico" id="ventriculo_sistemico3" value="Indeterminado">
                                <label class="form-check-label" for="ventriculo_sistemico3">Indeterminado</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fraccion_eyeccion" class="form-label mb-0">Fracción de eyección del ventrículo izquierdo (FEVI, %)<span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Considerar el último valor registrado de los últimos meses. Colocar solo el valor numérico entre 0 y 100 (Ejm: 60)."></span></label>
                        <input type="number" name="fraccion_eyeccion" class="form-control" id="fraccion_eyeccion" max="100" placeholder="Tu respuesta">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="funcion_sistolica1" class="form-label mb-0 d-block">Función sistólica del ventrículo derecho (VD) </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="funcion_sistolica" id="funcion_sistolica1" value="Normal">
                                <label class="form-check-label" for="funcion_sistolica1">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="funcion_sistolica" id="funcion_sistolica2" value="Disminuida">
                                <label class="form-check-label" for="funcion_sistolica2">Disminuida</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="funcion_sistolica" id="funcion_sistolica3" value="Nunca medida">
                                <label class="form-check-label" for="funcion_sistolica3">Nunca medida</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="paciente" class="form-label mb-0">Tratamiento médico actual<span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Puede marcar más de una respuesta"></span></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico1" value="Ninguno">
                                <label class="form-check-label" for="tratamiento_medico1">Ninguno</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico2" value="IECA">
                                <label class="form-check-label" for="tratamiento_medico2">IECA</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico3" value="ARA II">
                                <label class="form-check-label" for="tratamiento_medico3">ARA II</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico4" value="Betabloqueador">
                                <label class="form-check-label" for="tratamiento_medico4">Betabloqueador</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico5" value="ARM">
                                <label class="form-check-label" for="tratamiento_medico5">ARM</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico6" value="iSGLT2">
                                <label class="form-check-label" for="tratamiento_medico6">iSGLT2</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico7" value="ARNI">
                                <label class="form-check-label" for="tratamiento_medico7">ARNI</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico8" value="Diurético de asa">
                                <label class="form-check-label" for="tratamiento_medico8">Diurético de asa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico9" value="Antiagregante plaquetario">
                                <label class="form-check-label" for="tratamiento_medico9">Antiagregante plaquetario</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico10" value="Anticoagulante">
                                <label class="form-check-label" for="tratamiento_medico10">Anticoagulante</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico11" value="Otro">
                                <label class="form-check-label" for="tratamiento_medico11">Otro:</label>
                                <input type="text" name="tratamiento_medico_otro" class="form-control mb-2 d-none" id="tratamiento_medico_otro" placeholder="Especificar otro tratamiento médico">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Comorbilidades y complicaciones -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Comorbilidades y complicaciones.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="responsable" class="form-label mb-0">Arritmias<span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Puede marcar más de una respuesta"></span></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias1" value="Fibrilación auricular">
                                <label class="form-check-label" for="arritmias1">Fibrilación auricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias2" value="Flutter atrial">
                                <label class="form-check-label" for="arritmias2">Flutter atrial</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias3" value="TPSV registrada">
                                <label class="form-check-label" for="arritmias3">TPSV registrada</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias4" value="Taquicardia ventricular">
                                <label class="form-check-label" for="arritmias4">Taquicardia ventricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias5" value="Disfunción del nodo">
                                <label class="form-check-label" for="arritmias5">Disfunción del nodo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias6" value="Bloqueo AV de 2do o 3er grado">
                                <label class="form-check-label" for="arritmias6">Bloqueo AV de 2do o 3er grado</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias7" value="Ninguna">
                                <label class="form-check-label" for="arritmias7">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias8" value="Otro">
                                <label class="form-check-label" for="arritmias8">Otro:</label>
                                <input type="text" name="arritmias_otro" class="form-control mb-2 d-none" id="arritmias_otro" placeholder="Especificar otra arritmia">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="paciente" class="form-label mb-0">Comorbilidades<span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Puede marcar más de una respuesta"></span></label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades1" value="Ninguna">
                                <label class="form-check-label" for="comorbilidades1">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades2" value="DM">
                                <label class="form-check-label" for="comorbilidades2">DM</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades3" value="HTA">
                                <label class="form-check-label" for="comorbilidades3">HTA</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades4" value="Dislipidemia">
                                <label class="form-check-label" for="comorbilidades4">Dislipidemia</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades5" value="Hipotiroidismo">
                                <label class="form-check-label" for="comorbilidades5">Hipotiroidismo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades6" value="Otro">
                                <label class="form-check-label" for="comorbilidades6">Otro:</label>
                                <input type="text" name="comorbilidades_otro" class="form-control mb-2 d-none" id="comorbilidades_otro" placeholder="Especificar otra comorbilidad">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="enfermedad_renal" class="form-label mb-0">Enfermedad renal crónica</label>
                        <select name="enfermedad_renal" id="enfermedad_renal" class="form-control">
                            <option value="">Seleccionar...</option>
                            <option value="No">No</option>
                            <option value="Estadio I">Estadio I</option>
                            <option value="Estadio II">Estadio II</option>
                            <option value="Estadio III">Estadio III</option>
                            <option value="Estadio IV">Estadio IV</option>
                            <option value="Estadio V">Estadio V</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="paciente" class="form-label mb-0">Complicaciones y tiempo de primera ocurrencia tras diagnóstico<span class="infotoltip" data-toggle="tooltip" data-placement="top" title="Puede completar para más de una complicación. Ejm. 1. Ninguna / 2. ICC - 2010 / 3. Endocarditis - 2010 / 4. Trombosis venosa - 2010 / 5. Cardioembolia - 2010 / 6. Infarto de miocardio - 2010 / 7. stroke isquemico - 2010 / 8. cardiopatia isquémica - 2010 / 9. detallar otros - año"></span></label>
                        <div class="row">
                            <div class="col-8 col-md-8 pr-0">
                                <input type="text" name="complicaciones" class="form-control" id="complicaciones" placeholder="Indicar complicación" style="border-radius: 0px;">
                            </div>
                            <div class="col-4 col-md-4 pl-0">
                                <input type="number" name="complicaciones_ano" class="form-control rounded-right" id="complicaciones_ano" placeholder="Año" style="border-radius: 0px;">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="paciente" class="form-label mb-0">Uso de dispositivos de asistencia</label>
                        <select name="uso_dispositivos" id="uso_dispositivos" class="form-control">
                            <option value="">Seleccionar...</option>
                            <option value="Ninguna">Ninguna</option>
                            <option value="Auriculares">Auriculares</option>
                            <option value="Silla de ruedas">Silla de ruedas</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <input type="text" name="uso_dispositivos_otro" class="form-control mb-2 mt-1 d-none" id="uso_dispositivos_otro" placeholder="Especificar otro dispositivo de asistencia">
                    </div>
                </div>
            </div>
        </div>

        <!-- Laboratorio -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laboratorio. <small>(En caso no tenga alguno de los laboratorios escribir:   NA)</small></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="creatinina_serica" class="form-label mb-0">Creatinina sérica (mg/dL)</label>
                        <input type="text" name="creatinina_serica" class="form-control" id="creatinina_serica">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="acido_urico_serico" class="form-label mb-0">Ácido úrico sérico(mg/dL)</label>
                        <input type="text" name="acido_urico_serico" class="form-control" id="acido_urico_serico">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="glucosa_serica" class="form-label mb-0">Glucosa sérica (mg/dL)</label>
                        <input type="text" name="glucosa_serica" class="form-control" id="glucosa_serica">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="colesterol_total" class="form-label mb-0">Coleterol total (mg/dL)</label>
                        <input type="text" name="colesterol_total" class="form-control" id="colesterol_total">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="colesterol_ldl" class="form-label mb-0">Colesterol LDL(mg/dL)</label>
                        <input type="text" name="colesterol_ldl" class="form-control" id="colesterol_ldl">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trigliceridos" class="form-label mb-0">Triglicéridos (mg/dL)</label>
                        <input type="text" name="trigliceridos" class="form-control" id="trigliceridos">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hemoglobina" class="form-label mb-0">Hemoglobina (g/dL)</label>
                        <input type="text" name="hemoglobina" class="form-control" id="hemoglobina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hematocrito" class="form-label mb-0">Hematocrito (%)</label>
                        <input type="text" name="hematocrito" class="form-control" id="hematocrito">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="plaquetas" class="form-label mb-0">Plaquetas (Número total contabilizado/uL)</label>
                        <input type="text" name="plaquetas" class="form-control" id="plaquetas">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ferritina" class="form-label mb-0">Ferritina (mg/L)</label>
                        <input type="text" name="ferritina" class="form-control" id="ferritina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hierro_serico" class="form-label mb-0">Hierro sérico (ug/dL)</label>
                        <input type="text" name="hierro_serico" class="form-control" id="hierro_serico">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="saturacion_transferrina" class="form-label mb-0">Saturación de transferrina (%)</label>
                        <input type="text" name="saturacion_transferrina" class="form-control" id="saturacion_transferrina">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tsh" class="form-label mb-0">Hormona estimulante de la tiroides (TSH) (mUI/L)</label>
                        <input type="text" name="tsh" class="form-control" id="tsh">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="t4_libre" class="form-label mb-0">Tiroxina libre (T4 libre) (ug/dL)</label>
                        <input type="text" name="t4_libre" class="form-control" id="t4_libre">
                    </div>
                </div>
            </div>
        </div>

        <!-- boton cancel y Submit -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2 mb-sm-0 text-right">
                        <a href="{{ route('repecca.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Cancelar</a>
                        <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Actualizar</button>
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

        //chage select tipo_seguro if otro show input
        document.getElementById('tipo_seguro').addEventListener('change', function() {
            var tipoSeguroOtro = document.getElementById('tipo_seguro_otro');
            if (this.value === 'Otros') {
                tipoSeguroOtro.classList.remove('d-none');
                tipoSeguroOtro.setAttribute('required', 'required');
                tipoSeguroOtro.value = '';
            } else {
                tipoSeguroOtro.classList.add('d-none');
                tipoSeguroOtro.removeAttribute('required');
                tipoSeguroOtro.value = '';
            }
        });

        //if sindrome_genetico_asociado[] = Otro show input
        document.getElementById('sindrome_genetico_asociado9').addEventListener('change', function() {
            var sindromeGeneticoAsociadoOtro = document.getElementById('sindrome_genetico_asociado_otro');
            if (this.checked) {
                sindromeGeneticoAsociadoOtro.classList.remove('d-none');
                sindromeGeneticoAsociadoOtro.setAttribute('required', 'required');
                sindromeGeneticoAsociadoOtro.value = '';
            } else {
                sindromeGeneticoAsociadoOtro.classList.add('d-none');
                sindromeGeneticoAsociadoOtro.removeAttribute('required');
                sindromeGeneticoAsociadoOtro.value = '';
            }
        });

        //if manejo_recibido[] = Otro show input
        document.getElementById('manejo_recibido6').addEventListener('change', function() {
            var manejoRecibidoOtro = document.getElementById('manejo_recibido_otro');
            if (this.checked) {
                manejoRecibidoOtro.classList.remove('d-none');
                manejoRecibidoOtro.setAttribute('required', 'required');
                manejoRecibidoOtro.value = '';
            } else {
                manejoRecibidoOtro.classList.add('d-none');
                manejoRecibidoOtro.removeAttribute('required');
                manejoRecibidoOtro.value = '';
            }
        });

        //if tratamiento_medico[] = Otro show input
        document.getElementById('tratamiento_medico11').addEventListener('change', function() {
            var tratamientoMedicoOtro = document.getElementById('tratamiento_medico_otro');
            if (this.checked) {
                tratamientoMedicoOtro.classList.remove('d-none');
                tratamientoMedicoOtro.setAttribute('required', 'required');
                tratamientoMedicoOtro.value = '';
            } else {
                tratamientoMedicoOtro.classList.add('d-none');
                tratamientoMedicoOtro.removeAttribute('required');
                tratamientoMedicoOtro.value = '';
            }
        });

        //if arritmias[] = Otro show input
        document.getElementById('arritmias8').addEventListener('change', function() {
            var arritmiasOtro = document.getElementById('arritmias_otro');
            if (this.checked) {
                arritmiasOtro.classList.remove('d-none');
                arritmiasOtro.setAttribute('required', 'required');
                arritmiasOtro.value = '';
            } else {
                arritmiasOtro.classList.add('d-none');
                arritmiasOtro.removeAttribute('required');
                arritmiasOtro.value = '';
            }
        });

        //if comorbilidades[] = Otro show input
        document.getElementById('comorbilidades6').addEventListener('change', function() {
            var comorbilidadesOtro = document.getElementById('comorbilidades_otro');
            if (this.checked) {
                comorbilidadesOtro.classList.remove('d-none');
                comorbilidadesOtro.setAttribute('required', 'required');
                comorbilidadesOtro.value = '';
            } else {
                comorbilidadesOtro.classList.add('d-none');
                comorbilidadesOtro.removeAttribute('required');
                comorbilidadesOtro.value = '';
            }
        });

        //if uso_dispositivos = Otro show input
        document.getElementById('uso_dispositivos').addEventListener('change', function() {
            var usoDispositivosOtro = document.getElementById('uso_dispositivos_otro');
            if (this.value === 'Otro') {
                usoDispositivosOtro.classList.remove('d-none');
                usoDispositivosOtro.setAttribute('required', 'required');
                usoDispositivosOtro.value = '';
            } else {
                usoDispositivosOtro.classList.add('d-none');
                usoDispositivosOtro.removeAttribute('required');
                usoDispositivosOtro.value = '';
            }
        });


    });

</script>
@endsection
