@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Información Repecca #{{ $repecca->id }}</h1>
    </div>

    <!-- Form -->
    <form action="">
        
        <!-- Información Responsable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Responsable y seguro.</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Responsable</label>
                        <p class="form-control">@if($repecca->trato != ''){{ $repecca->trato.' ' }}@endif{{ $repecca->name }} {{ $repecca->lastname }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Tipo de seguro</label>
                        <p class="form-control">{{ $repecca->tipo_seguro }} @if($repecca->tipo_seguro == 'Otros') - {{ $repecca->tipo_seguro_otro }} @endif&nbsp;</p>
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
                        <label class="form-label mb-0">Fecha de ultima atención por cardiología</label>
                        <p class="form-control">{{ date('d/m/Y', strtotime($repecca->fecha_ultima_atencion)) }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Número de historia clínica</label>
                        <p class="form-control">{{ $repecca->numero_historia_clinica }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Sexo </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" @if($repecca->sexo == 'Masculino') checked @endif>
                                <label class="form-check-label">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" @if($repecca->sexo == 'Femenino') checked @endif>
                                <label class="form-check-label" >Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Edad (años) </label>
                        <p class="form-control">{{ $repecca->edad }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Estado civil </label>
                        <p class="form-control">{{ $repecca->estado_civil }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Grado de instrucción </label>
                        <p class="form-control">{{ $repecca->grado_instruccion }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Actividad laboral </label>
                        <p class="form-control">{{ $repecca->actividad_laboral }}&nbsp;</p>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="numero_gestas" class="form-label mb-0">En caso de sexo femenino completar formula obstétrica</label>
                        <div class="form-control">
                            <div class="table-responsive mt-1">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>0</th>
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
                                            <td><input type="radio" name="numero_gestas" value="0" @if($repecca->numero_gestas == '0') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="1" @if($repecca->numero_gestas == '1') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="2" @if($repecca->numero_gestas == '2') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="3" @if($repecca->numero_gestas == '3') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="4" @if($repecca->numero_gestas == '4') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="5" @if($repecca->numero_gestas == '5') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="6" @if($repecca->numero_gestas == '6') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="7" @if($repecca->numero_gestas == '7') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="8" @if($repecca->numero_gestas == '8') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="9" @if($repecca->numero_gestas == '9') checked @endif></td>
                                            <td><input type="radio" name="numero_gestas" value="10" @if($repecca->numero_gestas == '10') checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Partos a termino</td>
                                            <td><input type="radio" name="partos_a_termino" value="0" @if($repecca->partos_a_termino == '0') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="1" @if($repecca->partos_a_termino == '1') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="2" @if($repecca->partos_a_termino == '2') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="3" @if($repecca->partos_a_termino == '3') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="4" @if($repecca->partos_a_termino == '4') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="5" @if($repecca->partos_a_termino == '5') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="6" @if($repecca->partos_a_termino == '6') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="7" @if($repecca->partos_a_termino == '7') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="8" @if($repecca->partos_a_termino == '8') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="9" @if($repecca->partos_a_termino == '9') checked @endif></td>
                                            <td><input type="radio" name="partos_a_termino" value="10" @if($repecca->partos_a_termino == '10') checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Partos pretermino</td>
                                            <td><input type="radio" name="partos_pretermino" value="0" @if($repecca->partos_pretermino == '0') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="1" @if($repecca->partos_pretermino == '1') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="2" @if($repecca->partos_pretermino == '2') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="3" @if($repecca->partos_pretermino == '3') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="4" @if($repecca->partos_pretermino == '4') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="5" @if($repecca->partos_pretermino == '5') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="6" @if($repecca->partos_pretermino == '6') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="7" @if($repecca->partos_pretermino == '7') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="8" @if($repecca->partos_pretermino == '8') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="9" @if($repecca->partos_pretermino == '9') checked @endif></td>
                                            <td><input type="radio" name="partos_pretermino" value="10" @if($repecca->partos_pretermino == '10') checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Abortos</td>
                                            <td><input type="radio" name="abortos" value="0" @if($repecca->abortos == '0') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="1" @if($repecca->abortos == '1') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="2" @if($repecca->abortos == '2') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="3" @if($repecca->abortos == '3') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="4" @if($repecca->abortos == '4') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="5" @if($repecca->abortos == '5') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="6" @if($repecca->abortos == '6') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="7" @if($repecca->abortos == '7') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="8" @if($repecca->abortos == '8') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="9" @if($repecca->abortos == '9') checked @endif></td>
                                            <td><input type="radio" name="abortos" value="10" @if($repecca->abortos == '10') checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Número de hijos vivos</td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="0" @if($repecca->numero_hijos_vivos == '0') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="1" @if($repecca->numero_hijos_vivos == '1') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="2" @if($repecca->numero_hijos_vivos == '2') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="3" @if($repecca->numero_hijos_vivos == '3') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="4" @if($repecca->numero_hijos_vivos == '4') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="5" @if($repecca->numero_hijos_vivos == '5') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="6" @if($repecca->numero_hijos_vivos == '6') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="7" @if($repecca->numero_hijos_vivos == '7') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="8" @if($repecca->numero_hijos_vivos == '8') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="9" @if($repecca->numero_hijos_vivos == '9') checked @endif></td>
                                            <td><input type="radio" name="numero_hijos_vivos" value="10" @if($repecca->numero_hijos_vivos == '10') checked @endif></td>
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
                        <label for="diagnostico_especifico" class="form-label mb-0">Diagnóstico específico y año de diagnóstico</label>
                        @php
                            $diagnostico_especificos = json_decode($repecca->diagnostico_especifico, true);
                        @endphp
                        <p class="form-control">
                            @foreach ($diagnostico_especificos as $index => $diagnostico_especifico)
                                {{ $diagnostico_especifico['diagnostico'] }} - {{ $diagnostico_especifico['ano'] }}
                                @if ($index < count($diagnostico_especificos) - 1)
                                    <br>
                                @endif
                            @endforeach
                        </p>

                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Transición de cardiología pediátrica a adulto</label>
                        <p class="form-control">{{ $repecca->transicion_cardiologia }}&nbsp;</p>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="sindrome_genetico_asociado1" class="form-label mb-0 d-block">Síndromes genéticos asociados </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado1" value="Ninguna" @if(strpos($repecca->sindrome_genetico_asociado, 'Ninguna') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado1">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado2" value="Sd. Down" @if(strpos($repecca->sindrome_genetico_asociado, 'Sd. Down') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado2">Sd. Down</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado3" value="Sd. Marfan" @if(strpos($repecca->sindrome_genetico_asociado, 'Sd. Marfan') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado3">Sd. Marfan</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado4" value="Sd. Turner" @if(strpos($repecca->sindrome_genetico_asociado, 'Sd. Turner') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado4">Sd. Turner</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado5" value="Sd. Williams" @if(strpos($repecca->sindrome_genetico_asociado, 'Sd. Williams') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado5">Sd. Williams</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado6" value="Sd. Di George" @if(strpos($repecca->sindrome_genetico_asociado, 'Sd. Di George') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado6">Sd. Di George</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado7" value="Sd. Noonan" @if(strpos($repecca->sindrome_genetico_asociado, 'Sd. Noonan') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado7">Sd. Noonan</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado8" value="VACTERL" @if(strpos($repecca->sindrome_genetico_asociado, 'VACTERL') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado8">VACTERL</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="sindrome_genetico_asociado[]" id="sindrome_genetico_asociado9" value="Otro" @if(strpos($repecca->sindrome_genetico_asociado, 'Otro') !== false) checked @endif>
                                <label class="form-check-label" for="sindrome_genetico_asociado9">Otro: {{ $repecca->sindrome_genetico_asociado_otro }}</label>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="severidad" class="form-label mb-0">Severidad de la cardiopatía congénita</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="severidad" id="severidad1" value="Simple" @if($repecca->severidad == 'Simple') checked @endif>
                                <label class="form-check-label" for="severidad1">Simple</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="severidad" id="severidad2" value="Moderada" @if($repecca->severidad == 'Moderada') checked @endif>
                                <label class="form-check-label" for="severidad2">Moderada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="severidad" id="severidad3" value="Severa" @if($repecca->severidad == 'Severa') checked @endif>
                                <label class="form-check-label" for="severidad3">Severa</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="clasificacion_anatomica" class="form-label mb-0">Clasificación anatómica - funcional (AP)</label>
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
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: A - Anatómica: I, simple" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: A - Anatómica: I, simple') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: A - Anatómica: II, moderada" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: A - Anatómica: II, moderada') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: A - Anatómica: III, compleja" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: A - Anatómica: III, compleja') checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Funcional: B</td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: B - Anatómica: I, simple" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: B - Anatómica: I, simple') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: B - Anatómica: II, moderada" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: B - Anatómica: II, moderada') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: B - Anatómica: III, compleja" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: B - Anatómica: III, compleja') checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Funcional: C</td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: C - Anatómica: I, simple" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: C - Anatómica: I, simple') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: C - Anatómica: II, moderada" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: C - Anatómica: II, moderada') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: C - Anatómica: III, compleja" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: C - Anatómica: III, compleja') checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Funcional: D</td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: D - Anatómica: I, simple" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: D - Anatómica: I, simple') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: D - Anatómica: II, moderada" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: D - Anatómica: II, moderada') checked @endif></td>
                                            <td><input type="radio" name="clasificacion_anatomica_funcional" value="Funcional: D - Anatómica: III, compleja" @if($repecca->clasificacion_anatomica_funcional == 'Funcional: D - Anatómica: III, compleja') checked @endif></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Clase funcional (NYHA) </label>
                        <p class="form-control">{{ $repecca->clase_funcional }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="dependencia_funcional" class="form-label mb-0">Dependencia funcional del paciente </label>
                        <p class="form-control">{{ $repecca->dependencia_funcional }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hospitalizaciones" class="form-label mb-0">Hospitalizaciones por descompensación de la CC </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hospitalizaciones" id="hospitalizaciones1" value="No" @if($repecca->hospitalizaciones == 'No') checked @endif>
                                <label class="form-check-label" for="hospitalizaciones1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hospitalizaciones" id="hospitalizaciones2" value="Sí" @if($repecca->hospitalizaciones == 'Sí') checked @endif>
                                <label class="form-check-label" for="hospitalizaciones2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cianosis" class="form-label mb-0">Presenta actualmente cianosis </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cianosis" id="cianosis1" value="No" @if($repecca->cianosis == 'No') checked @endif>
                                <label class="form-check-label" for="cianosis1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cianosis" id="cianosis2" value="Sí" @if($repecca->cianosis == 'Sí') checked @endif>
                                <label class="form-check-label" for="cianosis2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="saturacion_oxigeno" class="form-label mb-0">Saturación de oxigeno (última registrada en %)</label>
                        <input type="number" name="saturacion_oxigeno" class="form-control" id="saturacion_oxigeno" max="100" value="{{ $repecca->saturacion_oxigeno }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="peso" class="form-label mb-0">Peso actual del participante (Kg) </label>
                        <input type="number" name="peso" class="form-control" id="peso" value="{{ $repecca->peso }}" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="talla" class="form-label mb-0">Talla actual del participante (m) </label>
                        <input type="number" name="talla" class="form-control" id="talla" value="{{ $repecca->talla }}" >
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
                        <label for="manejo_recibido1" class="form-label mb-0 d-block">Manejo recibido para la cardiopatía </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido1" value="Ninguno" @if(strpos($repecca->manejo_recibido, 'Ninguno') !== false) checked @endif>
                                <label class="form-check-label" for="manejo_recibido1">Ninguno</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido2" value="Completamente reparado" @if(strpos($repecca->manejo_recibido, 'Completamente reparado') !== false) checked @endif>
                                <label class="form-check-label" for="manejo_recibido2">Completamente reparado</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido3" value="Reparado con lesión residual" @if(strpos($repecca->manejo_recibido, 'Reparado con lesión residual') !== false) checked @endif>
                                <label class="form-check-label" for="manejo_recibido3">Reparado con lesión residual</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido4" value="Paliado" @if(strpos($repecca->manejo_recibido, 'Paliado') !== false) checked @endif>
                                <label class="form-check-label" for="manejo_recibido4">Paliado</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido5" value="Manejo médico" @if(strpos($repecca->manejo_recibido, 'Manejo médico') !== false) checked @endif>
                                <label class="form-check-label" for="manejo_recibido5">Manejo médico</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="manejo_recibido[]" id="manejo_recibido6" value="Otro" @if(strpos($repecca->manejo_recibido, 'Otro') !== false) checked @endif>
                                <label class="form-check-label" for="manejo_recibido6">Otro: {{ $repecca->manejo_recibido_otro }}</label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="protesis_valvulares1" class="form-label mb-0 d-block">Colocación de prótesis valvulares </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="protesis_valvulares[]" id="protesis_valvulares1" value="Ninguna" @if(strpos($repecca->protesis_valvulares, 'Ninguna') !== false) checked @endif>
                                <label class="form-check-label" for="protesis_valvulares1">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="protesis_valvulares[]" id="protesis_valvulares2" value="Percutánea" @if(strpos($repecca->protesis_valvulares, 'Percutánea') !== false) checked @endif>
                                <label class="form-check-label" for="protesis_valvulares2">Percutánea</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="protesis_valvulares[]" id="protesis_valvulares3" value="Quirúrgica" @if(strpos($repecca->protesis_valvulares, 'Quirúrgica') !== false) checked @endif>
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
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_aortica[]" value="Biológica" @if(strpos($repecca->ubicacion_protesis_valvulares_aortica, 'Biológica') !== false) checked @endif></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_aortica[]" value="Mecánica" @if(strpos($repecca->ubicacion_protesis_valvulares_aortica, 'Mecánica') !== false) checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Mitral</td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_mitral[]" value="Biológica" @if(strpos($repecca->ubicacion_protesis_valvulares_mitral, 'Biológica') !== false) checked @endif></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_mitral[]" value="Mecánica" @if(strpos($repecca->ubicacion_protesis_valvulares_mitral, 'Mecánica') !== false) checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Pulmonar</td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_pulmonar[]" value="Biológica" @if(strpos($repecca->ubicacion_protesis_valvulares_pulmonar, 'Biológica') !== false) checked @endif></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_pulmonar[]" value="Mecánica" @if(strpos($repecca->ubicacion_protesis_valvulares_pulmonar, 'Mecánica') !== false) checked @endif></td>
                                        </tr>
                                        <tr>
                                            <td>Tricúspide</td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_tricuspide[]" value="Biológica" @if(strpos($repecca->ubicacion_protesis_valvulares_tricuspide, 'Biológica') !== false) checked @endif></td>
                                            <td><input type="checkbox" name="ubicacion_protesis_valvulares_tricuspide[]" value="Mecánica" @if(strpos($repecca->ubicacion_protesis_valvulares_tricuspide, 'Mecánica') !== false) checked @endif></td>
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
                                <input class="form-check-input" type="radio" name="procedimiento_electrofisiologico" id="procedimiento_electrofisiologico1" value="No" @if($repecca->procedimiento_electrofisiologico == 'No') checked @endif>
                                <label class="form-check-label" for="procedimiento_electrofisiologico1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="procedimiento_electrofisiologico" id="procedimiento_electrofisiologico2" value="Sí" @if($repecca->procedimiento_electrofisiologico == 'Sí') checked @endif>
                                <label class="form-check-label" for="procedimiento_electrofisiologico2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="marcapasos" class="form-label mb-0 d-block">Marcapasos </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marcapasos" id="marcapasos1" value="No" @if($repecca->marcapasos == 'No') checked @endif>
                                <label class="form-check-label" for="marcapasos1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="marcapasos" id="marcapasos2" value="Sí" @if($repecca->marcapasos == 'Sí') checked @endif>
                                <label class="form-check-label" for="marcapasos2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="aortoplastia" class="form-label mb-0 d-block">Aortoplastía </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="aortoplastia[]" id="aortoplastia1" value="No" @if(strpos($repecca->aortoplastia, 'No') !== false) checked @endif>
                                <label class="form-check-label" for="aortoplastia1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="aortoplastia[]" id="aortoplastia2" value="Stent" @if(strpos($repecca->aortoplastia, 'Stent') !== false) checked @endif>
                                <label class="form-check-label" for="aortoplastia2">Stent</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="aortoplastia[]" id="aortoplastia3" value="Quirúrgica" @if(strpos($repecca->aortoplastia, 'Quirúrgica') !== false) checked @endif>
                                <label class="form-check-label" for="aortoplastia3">Quirúrgica</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0 d-block">Stent en fístulas o tracto de salida del ventrículo derecho (TSVD) </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stent_fistulas" id="stent_fistulas1" value="No" @if($repecca->stent_fistulas == 'No') checked @endif>
                                <label class="form-check-label" for="stent_fistulas1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stent_fistulas" id="stent_fistulas2" value="Sí" @if($repecca->stent_fistulas == 'Sí') checked @endif>
                                <label class="form-check-label" for="stent_fistulas2">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="cirugia_cardiaca" class="form-label mb-0">Cirugía cardiaca y año de procedimiento</label>
                        @php
                            $cirugia_cardiacas = json_decode($repecca->cirugia_cardiaca, true);
                        @endphp

                        <p class="form-control">
                            @foreach ($cirugia_cardiacas as $index => $cirugia_cardiaca)
                                {{ $cirugia_cardiaca['cirugia'] }} - {{ $cirugia_cardiaca['ano'] }}
                                @if ($index < count($cirugia_cardiacas) - 1)
                                    <br>
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0 d-block">Ventrículo sistémico </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventriculo_sistemico" id="ventriculo_sistemico1" value="Derecho" @if($repecca->ventriculo_sistemico == 'Derecho') checked @endif>
                                <label class="form-check-label" for="ventriculo_sistemico1">Derecho</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventriculo_sistemico" id="ventriculo_sistemico2" value="Izquierdo" @if($repecca->ventriculo_sistemico == 'Izquierdo') checked @endif>
                                <label class="form-check-label" for="ventriculo_sistemico2">Izquierdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ventriculo_sistemico" id="ventriculo_sistemico3" value="Indeterminado" @if($repecca->ventriculo_sistemico == 'Indeterminado') checked @endif>
                                <label class="form-check-label" for="ventriculo_sistemico3">Indeterminado</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="fraccion_eyeccion" class="form-label mb-0">Fracción de eyección del ventrículo izquierdo (FEVI, %)</label>
                        <input type="number" name="fraccion_eyeccion" class="form-control" id="fraccion_eyeccion" max="100" placeholder="Tu respuesta" value="{{ $repecca->fraccion_eyeccion }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="funcion_sistolica1" class="form-label mb-0 d-block">Función sistólica del ventrículo derecho (VD) </label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="funcion_sistolica" id="funcion_sistolica1" value="Normal" @if($repecca->funcion_sistolica == 'Normal') checked @endif>
                                <label class="form-check-label" for="funcion_sistolica1">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="funcion_sistolica" id="funcion_sistolica2" value="Disminuida" @if($repecca->funcion_sistolica == 'Disminuida') checked @endif>
                                <label class="form-check-label" for="funcion_sistolica2">Disminuida</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="funcion_sistolica" id="funcion_sistolica3" value="Nunca medida" @if($repecca->funcion_sistolica == 'Nunca medida') checked @endif>
                                <label class="form-check-label" for="funcion_sistolica3">Nunca medida</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label mb-0">Tratamiento médico actual</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico1" value="Ninguno" @if(strpos($repecca->tratamiento_medico, 'Ninguno') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico1">Ninguno</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico2" value="IECA" @if(strpos($repecca->tratamiento_medico, 'IECA') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico2">IECA</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico3" value="ARA II" @if(strpos($repecca->tratamiento_medico, 'ARA II') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico3">ARA II</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico4" value="Betabloqueador" @if(strpos($repecca->tratamiento_medico, 'Betabloqueador') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico4">Betabloqueador</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico5" value="ARM" @if(strpos($repecca->tratamiento_medico, 'ARM') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico5">ARM</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico6" value="iSGLT2" @if(strpos($repecca->tratamiento_medico, 'iSGLT2') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico6">iSGLT2</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico7" value="ARNI" @if(strpos($repecca->tratamiento_medico, 'ARNI') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico7">ARNI</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico8" value="Diurético de asa" @if(strpos($repecca->tratamiento_medico, 'Diurético de asa') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico8">Diurético de asa</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico9" value="Antiagregante plaquetario" @if(strpos($repecca->tratamiento_medico, 'Antiagregante plaquetario') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico9">Antiagregante plaquetario</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico10" value="Anticoagulante" @if(strpos($repecca->tratamiento_medico, 'Anticoagulante') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico10">Anticoagulante</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="tratamiento_medico[]" id="tratamiento_medico11" value="Otro" @if(strpos($repecca->tratamiento_medico, 'Otro') !== false) checked @endif>
                                <label class="form-check-label" for="tratamiento_medico11">Otro: {{ $repecca->tratamiento_medico_otro }}</label>
                                
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
                        <label for="responsable" class="form-label mb-0">Arritmias</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias1" value="Fibrilación auricular" @if(strpos($repecca->arritmias, 'Fibrilación auricular') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias1">Fibrilación auricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias2" value="Flutter atrial" @if(strpos($repecca->arritmias, 'Flutter atrial') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias2">Flutter atrial</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias3" value="TPSV registrada" @if(strpos($repecca->arritmias, 'TPSV registrada') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias3">TPSV registrada</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias4" value="Taquicardia ventricular" @if(strpos($repecca->arritmias, 'Taquicardia ventricular') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias4">Taquicardia ventricular</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias5" value="Disfunción del nodo" @if(strpos($repecca->arritmias, 'Disfunción del nodo') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias5">Disfunción del nodo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias6" value="Bloqueo AV de 2do o 3er grado" @if(strpos($repecca->arritmias, 'Bloqueo AV de 2do o 3er grado') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias6">Bloqueo AV de 2do o 3er grado</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias7" value="Ninguna" @if(strpos($repecca->arritmias, 'Ninguna') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias7">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="arritmias[]" id="arritmias8" value="Otro" @if(strpos($repecca->arritmias, 'Otro') !== false) checked @endif>
                                <label class="form-check-label" for="arritmias8">Otro: {{ $repecca->arritmias_otro }}</label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label mb-0">Comorbilidades</label>
                        <div class="form-control radioptions">
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades1" value="Ninguna" @if(strpos($repecca->comorbilidades, 'Ninguna') !== false) checked @endif>
                                <label class="form-check-label" for="comorbilidades1">Ninguna</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades2" value="DM" @if(strpos($repecca->comorbilidades, 'DM') !== false) checked @endif>
                                <label class="form-check-label" for="comorbilidades2">DM</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades3" value="HTA" @if(strpos($repecca->comorbilidades, 'HTA') !== false) checked @endif>
                                <label class="form-check-label" for="comorbilidades3">HTA</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades4" value="Dislipidemia" @if(strpos($repecca->comorbilidades, 'Dislipidemia') !== false) checked @endif>
                                <label class="form-check-label" for="comorbilidades4">Dislipidemia</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades5" value="Hipotiroidismo" @if(strpos($repecca->comorbilidades, 'Hipotiroidismo') !== false) checked @endif>
                                <label class="form-check-label" for="comorbilidades5">Hipotiroidismo</label>
                            </div>
                            <div class="form-check form-check-inline d-block">
                                <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorbilidades6" value="Otro" @if(strpos($repecca->comorbilidades, 'Otro') !== false) checked @endif>
                                <label class="form-check-label" for="comorbilidades6">Otro: {{ $repecca->comorbilidades_otro }}</label>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="enfermedad_renal" class="form-label mb-0">Enfermedad renal crónica</label>
                        <p class="form-control">{{ $repecca->enfermedad_renal }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="complicaciones" class="form-label mb-0">Complicaciones y tiempo de primera ocurrencia tras diagnóstico</label>
                        @php
                            $complicaciones = json_decode($repecca->complicaciones, true);
                        @endphp
                        <p class="form-control">
                            @foreach ($complicaciones as $index => $complicacion)
                                {{ $complicacion['complicacion'] }} - {{ $complicacion['ano'] }}
                                @if ($index < count($complicaciones) - 1)
                                    <br>
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Uso de dispositivos de asistencia</label>
                        <p class="form-control">{{ $repecca->uso_dispositivos }} @if($repecca->uso_dispositivos == 'Otro') - {{ $repecca->uso_dispositivos_otro }} @endif &nbsp;</p>
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
                        <p class="form-control">{{ $repecca->creatinina_serica }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="acido_urico_serico" class="form-label mb-0">Ácido úrico sérico(mg/dL)</label>
                        <p class="form-control">{{ $repecca->acido_urico_serico }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="glucosa_serica" class="form-label mb-0">Glucosa sérica (mg/dL)</label>
                        <p class="form-control">{{ $repecca->glucosa_serica }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="colesterol_total" class="form-label mb-0">Coleterol total (mg/dL)</label>
                        <p class="form-control">{{ $repecca->colesterol_total }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="colesterol_ldl" class="form-label mb-0">Colesterol LDL(mg/dL)</label>
                        <p class="form-control">{{ $repecca->colesterol_ldl }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="trigliceridos" class="form-label mb-0">Triglicéridos (mg/dL)</label>
                        <p class="form-control">{{ $repecca->trigliceridos }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hemoglobina" class="form-label mb-0">Hemoglobina (g/dL)</label>
                        <p class="form-control">{{ $repecca->hemoglobina }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hematocrito" class="form-label mb-0">Hematocrito (%)</label>
                        <p class="form-control">{{ $repecca->hematocrito }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="plaquetas" class="form-label mb-0">Plaquetas (Número total contabilizado/uL)</label>
                        <p class="form-control">{{ $repecca->plaquetas }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="ferritina" class="form-label mb-0">Ferritina (mg/L)</label>
                        <p class="form-control">{{ $repecca->ferritina }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="hierro_serico" class="form-label mb-0">Hierro sérico (ug/dL)</label>
                        <p class="form-control">{{ $repecca->hierro_serico }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="saturacion_transferrina" class="form-label mb-0">Saturación de transferrina (%)</label>
                        <p class="form-control">{{ $repecca->saturacion_transferrina }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="tsh" class="form-label mb-0">Hormona estimulante de la tiroides (TSH) (mUI/L)</label>
                        <p class="form-control">{{ $repecca->tsh }}&nbsp;</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="t4_libre" class="form-label mb-0">Tiroxina libre (T4 libre) (ug/dL)</label>
                        <p class="form-control">{{ $repecca->t4_libre }}&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- boton cancel y Submit -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2 mb-sm-0 text-right">
                        <a href="{{ route('repecca.index') }}" class="btn btn-outline-primary mb-2 mb-sm-0">Regresar</a>
                        <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Imprimir</button>
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
    window.onload = function() {
        disableClickOnRadioAndCheckbox();
    };

    function disableClickOnRadioAndCheckbox() {
        var radioButtons = document.querySelectorAll('input[type="radio"]');
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('click', function(event) {
                event.preventDefault();
            });
        });

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', function(event) {
                event.preventDefault();
            });
        });
    }
</script>
@endsection
