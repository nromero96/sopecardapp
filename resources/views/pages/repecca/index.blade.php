@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registros Repecca</h1>
        <a href="{{ route('repecca.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Nuevo Registro</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista de registros Repecca</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>N° historia clínica</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Datos</th>
                            <th>Fecha Registro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>N° historia clínica</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Datos</th>
                            <th>Fecha Registro</th>
                            <th width="120px"></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($repeccas as $item)
                        <tr></tr>
                            <td>{{ $item->id }}</td>
                            <td>@if($item->trato != ''){{ $item->trato.' ' }}@endif{{ $item->name }} {{ $item->lastname }}</td>
                            <td>{{ $item->numero_historia_clinica }}</td>
                            <td>{{ $item->sexo }}</td>
                            <td>{{ $item->edad }}</td>

                            <td>

                                @php
                                    $total = 0;
                                    $total += $item->user_id ? 1 : 0;
                                    $total += $item->tipo_seguro ? 1 : 0;
                                    $total += $item->fecha_ultima_atencion ? 1 : 0;
                                    $total += $item->numero_historia_clinica ? 1 : 0;
                                    $total += $item->sexo ? 1 : 0;
                                    $total += $item->edad ? 1 : 0;
                                    $total += $item->estado_civil ? 1 : 0;
                                    $total += $item->grado_instruccion ? 1 : 0;
                                    $total += $item->actividad_laboral ? 1 : 0;
                                    if($item->sexo=='Femenino'){
                                        $total += $item->numero_gestas ? 1 : 0;
                                        $total += $item->partos_a_termino ? 1 : 0;
                                        $total += $item->partos_pretermino ? 1 : 0;
                                        $total += $item->abortos ? 1 : 0;
                                        $total += $item->numero_hijos_vivos ? 1 : 0;
                                    }else{
                                        $total += 5;
                                    }
                                    
                                    $total += $item->diagnostico_especifico ? 1 : 0;
                                    $total += $item->transicion_cardiologia ? 1 : 0;
                                    $total += $item->sindrome_genetico_asociado ? 1 : 0;
                                    $total += $item->severidad ? 1 : 0;
                                    $total += $item->clasificacion_anatomica_funcional ? 1 : 0;
                                    $total += $item->clase_funcional ? 1 : 0;
                                    $total += $item->dependencia_funcional ? 1 : 0;
                                    $total += $item->hospitalizaciones ? 1 : 0;
                                    $total += $item->cianosis ? 1 : 0;
                                    $total += $item->saturacion_oxigeno ? 1 : 0;
                                    $total += $item->peso ? 1 : 0;
                                    $total += $item->talla ? 1 : 0;
                                    $total += $item->manejo_recibido ? 1 : 0;
                                    $total += $item->protesis_valvulares ? 1 : 0;
                                    $total += $item->ubicacion_protesis_valvulares_aortica ? 1 : 0;
                                    $total += $item->ubicacion_protesis_valvulares_mitral ? 1 : 0;
                                    $total += $item->ubicacion_protesis_valvulares_pulmonar ? 1 : 0;
                                    $total += $item->ubicacion_protesis_valvulares_tricuspide ? 1 : 0;
                                    $total += $item->procedimiento_electrofisiologico ? 1 : 0;
                                    $total += $item->marcapasos ? 1 : 0;
                                    $total += $item->aortoplastia ? 1 : 0;
                                    $total += $item->stent_fistulas ? 1 : 0;
                                    $total += $item->cirugia_cardiaca ? 1 : 0;
                                    $total += $item->ventriculo_sistemico ? 1 : 0;
                                    $total += $item->fraccion_eyeccion ? 1 : 0;
                                    $total += $item->funcion_sistolica ? 1 : 0;
                                    $total += $item->tratamiento_medico ? 1 : 0;
                                    $total += $item->arritmias ? 1 : 0;
                                    $total += $item->comorbilidades ? 1 : 0;
                                    $total += $item->enfermedad_renal ? 1 : 0;
                                    $total += $item->complicaciones ? 1 : 0;
                                    $total += $item->uso_dispositivos ? 1 : 0;
                                    $total += $item->creatinina_serica ? 1 : 0;
                                    $total += $item->acido_urico_serico ? 1 : 0;
                                    $total += $item->glucosa_serica ? 1 : 0;
                                    $total += $item->colesterol_total ? 1 : 0;
                                    $total += $item->colesterol_ldl ? 1 : 0;
                                    $total += $item->trigliceridos ? 1 : 0;
                                    $total += $item->hemoglobina ? 1 : 0;
                                    $total += $item->hematocrito ? 1 : 0;
                                    $total += $item->plaquetas ? 1 : 0;
                                    $total += $item->ferritina ? 1 : 0;
                                    $total += $item->hierro_serico ? 1 : 0;
                                    $total += $item->saturacion_transferrina ? 1 : 0;
                                    $total += $item->tsh ? 1 : 0;
                                    $total += $item->t4_libre ? 1 : 0;
                                    $total += $item->status ? 1 : 0;
                                @endphp

                                @php
                                    $porcentaje = floor(($total * 100) / 57);
                                @endphp

                                {{ $porcentaje }}%

                            </td>

                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('repecca.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                @if(Auth::user()->id == $item->user_id)
                                    <a href="{{ route('repecca.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif

                                @if(Auth::user()->id == $item->user_id)
                                <form action="{{ route('repecca.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection



<script>
    function confirmDelete(button) {
        if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
            button.closest('.delete-form').submit();
        }
    }
</script>


