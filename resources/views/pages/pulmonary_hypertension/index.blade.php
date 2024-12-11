@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hipertensión Pulmonar <span class="text-danger">(BETA)</span></h1>
        <a href="{{ route('pulmonary-hypertension.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Registro</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Lista de registros de Hipertensión Pulmonar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Responsable</th>
                            <th>N° documento</th>
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
                            <th>Doc. de identidad</th>
                            <th>Sexo</th>
                            <th>Edad</th>
                            <th>Datos</th>
                            <th>Fecha Registro</th>
                            <th width="120px"></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($pulmonaryhypertensions as $item)
                        <tr></tr>
                            <td>{{ $item->id }}</td>
                            <td>@if($item->trato != ''){{ $item->trato.' ' }}@endif{{ $item->name }} {{ $item->lastname }}</td>
                            <td>{{ $item->de_documento_identidad }}</td>
                            <td>{{ $item->de_sexo }}</td>
                            <td>{{ $item->de_edad }}</td>
                            <td>
                                @php
                                    $total = 0;
                                    $total += $item->user_id ? 1 : 0;
                                    $total += $item->centro_salud ? 1 : 0;
                                    $total += $item->de_documento_identidad ? 1 : 0;
                                    $total += $item->de_telefono ? 1 : 0;
                                    $total += $item->de_celular ? 1 : 0;
                                    $total += $item->de_celular_2 ? 1 : 0;
                                    $total += $item->de_correo ? 1 : 0;
                                    $total += $item->de_departamento ? 1 : 0;
                                    $total += $item->de_provincia ? 1 : 0;
                                    $total += $item->de_distrito ? 1 : 0;
                                    $total += $item->de_edad ? 1 : 0;
                                    $total += $item->de_nacimiento ? 1 : 0;
                                    $total += $item->de_sexo ? 1 : 0;
                                    $total += $item->de_estado_civil ? 1 : 0;
                                    $total += $item->de_tipo_seguro ? 1 : 0;
                                    $total += $item->de_tipo_seguro_otro ? 1 : 0;
                                    $total += $item->de_grado_instruccion ? 1 : 0;
                                    $total += $item->dc_pas ? 1 : 0;
                                    $total += $item->dc_pad ? 1 : 0;
                                    $total += $item->dc_frecuencia_cardiaca ? 1 : 0;
                                    $total += $item->dc_frecuencia_respiratoria ? 1 : 0;
                                    $total += $item->dc_temperatura ? 1 : 0;
                                    $total += $item->dc_saturacion_oxigeno ? 1 : 0;
                                    $total += $item->dc_antecedentes ? 1 : 0;
                                    $total += $item->dc_otro_antecedentes ? 1 : 0;
                                    $total += $item->ea_fecha_iniciosintomas ? 1 : 0;
                                    $total += $item->ea_hora_iniciosintomas ? 1 : 0;
                                    $total += $item->ea_cpcm ? 1 : 0;
                                    $total += $item->ea_cpcm_fecha_ingreso ? 1 : 0;
                                    $total += $item->ea_cpcm_hora_ingreso ? 1 : 0;
                                    $total += $item->ea_fecha_pcm ? 1 : 0;
                                    $total += $item->ea_hora_pcm ? 1 : 0;
                                    $total += $item->ea_tiempo_ispc ? 1 : 0;
                                    $total += $item->ea_fecha_ecg ? 1 : 0;
                                    $total += $item->ea_hora_ecg ? 1 : 0;
                                    $total += $item->ea_tpc_ecg ? 1 : 0;
                                    $total += $item->ea_tt_isquemia ? 1 : 0;
                                    $total += $item->ea_manif_clinicas ? 1 : 0;
                                    $total += $item->ea_clasificacion_kk ? 1 : 0;
                                    $total += $item->ea_diagnostico ? 1 : 0;
                                    $total += $item->ea_diagnostico_st ? 1 : 0;
                                    $total += $item->ea_diagnostico_st_elevado ? 1 : 0;
                                    $total += $item->ea_heart_score ? 1 : 0;
                                    $total += $item->ea_peso ? 1 : 0;
                                    $total += $item->ea_talla ? 1 : 0;
                                    $total += $item->ea_imc ? 1 : 0;
                                    $total += $item->ecg_ritmo ? 1 : 0;
                                    $total += $item->ecg_iamcest_localizacion ? 1 : 0;
                                    $total += $item->ecg_scasest ? 1 : 0;
                                    $total += $item->ecg_otro ? 1 : 0;
                                    $total += $item->dis_manejo ? 1 : 0;
                                    $total += $item->dis_tf ? 1 : 0;
                                    $total += $item->dis_lugar_tf ? 1 : 0;
                                    $total += $item->dis_lugar_tf_otro ? 1 : 0;
                                    $total += $item->dis_fecha_fibrinolisis ? 1 : 0;
                                    $total += $item->dis_hora_fibrinolisis ? 1 : 0;
                                    $total += $item->dis_tiempo_ecg_fibrinolisis ? 1 : 0;


                                @endphp

                                @php
                                    $porcentaje = floor(($total * 100) / 58);
                                @endphp

                                {{ $porcentaje }}%

                            </td>

                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('renima.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                @if(Auth::user()->id == $item->user_id)
                                    <a href="{{ route('renima.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif

                                @if(Auth::user()->id == $item->user_id)
                                <form action="{{ route('renima.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
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