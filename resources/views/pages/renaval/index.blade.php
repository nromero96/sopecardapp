@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registros Renaval</h1>
        <a href="{{ route('renaval.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
            <h6 class="m-0 font-weight-bold text-primary">Lista de registros Renaval</h6>
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

                        @foreach ($renavals as $item)
                        <tr></tr>
                            <td>{{ $item->id }}</td>
                            <td>@if($item->trato != ''){{ $item->trato.' ' }}@endif{{ $item->name }} {{ $item->lastname }}</td>
                            <td>{{ $item->documento_identidad }}</td>
                            <td>{{ $item->sexo }}</td>
                            <td>{{ $item->edad }}</td>
                            <td>
                                @php
                                    $total = 0;
                                    $total += $item->user_id ? 1 : 0;
                                    $total += $item->centro_salud ? 1 : 0;
                                    $total += $item->documento_identidad ? 1 : 0;
                                    $total += $item->modalidad_ingreso ? 1 : 0;
                                    $total += $item->departamento ? 1 : 0;
                                    $total += $item->provincia ? 1 : 0;
                                    $total += $item->ciudad ? 1 : 0;
                                    $total += $item->edad ? 1 : 0;
                                    $total += $item->sexo ? 1 : 0;
                                    $total += $item->gestante ? 1 : 0;
                                    $total += $item->estado_civil ? 1 : 0;
                                    $total += $item->grado_instruccion ? 1 : 0;
                                    $total += $item->compli_enfermedad ? 1 : 0;
                                    $total += $item->pas_diagnostico ? 1 : 0;
                                    $total += $item->pad_diagnostico ? 1 : 0;
                                    $total += $item->peso ? 1 : 0;
                                    $total += $item->talla ? 1 : 0;
                                    $total += $item->circunferencia_abdominal ? 1 : 0;
                                    $total += $item->antecedentes ? 1 : 0;
                                    $total += $item->metodo_diagnostico_valvulopatia ? 1 : 0;
                                    $total += $item->fecha_diagnostico_valvulopatia ? 1 : 0;
                                    $total += $item->fevi_al_diagnostico ? 1 : 0;
                                    $total += $item->diagnostico_estenosis ? 1 : 0;
                                    $total += $item->diagnostico_insuficiencia ? 1 : 0;
                                    $total += $item->enfermedad_valvular_multiple ? 1 : 0;
                                    $total += $item->etiologias ? 1 : 0;
                                    $total += $item->etiologias_otro ? 1 : 0;
                                    $total += $item->cha2ds2vasc ? 1 : 0;
                                    $total += $item->diagnostico ? 1 : 0;
                                    $total += $item->clasif_nyha ? 1 : 0;
                                    $total += $item->enf_coronaria ? 1 : 0;
                                    $total += $item->ea_morfologia_valvula_estenosis_aortica ? 1 : 0;
                                    $total += $item->ea_morfologia_valvula_estenosis_aortica_otro ? 1 : 0;
                                    $total += $item->ea_velocidad_maxima ? 1 : 0;
                                    $total += $item->ea_area_valvular ? 1 : 0;
                                    $total += $item->ea_gradiente_media ? 1 : 0;
                                    $total += $item->ea_calculo_area_valvular ? 1 : 0;
                                    $total += $item->ea_severidad_valvulopatia ? 1 : 0;
                                    $total += $item->ea_etiologia ? 1 : 0;
                                    $total += $item->ea_volumen_sistolico_eyeccion ? 1 : 0;
                                    $total += $item->ia_jet ? 1 : 0;
                                    $total += $item->ia_vena_contracta ? 1 : 0;
                                    $total += $item->ia_ore ? 1 : 0;
                                    $total += $item->ia_vol_regurgitante_orificio ? 1 : 0;
                                    $total += $item->ia_etiologia ? 1 : 0;
                                    $total += $item->ia_severidad ? 1 : 0;
                                    $total += $item->em_score_wilkins ? 1 : 0;
                                    $total += $item->em_gradiente_media ? 1 : 0;
                                    $total += $item->em_tiempo_hemipresion ? 1 : 0;
                                    $total += $item->em_area_val_mitral ? 1 : 0;
                                    $total += $item->em_etiologia ? 1 : 0;
                                    $total += $item->em_severidad ? 1 : 0;
                                    $total += $item->im_jet ? 1 : 0;
                                    $total += $item->im_vena_contracta ? 1 : 0;
                                    $total += $item->im_ore ? 1 : 0;
                                    $total += $item->im_volumen_regurgitante ? 1 : 0;
                                    $total += $item->im_tipoetiologia ? 1 : 0;
                                    $total += $item->im_tipoetiologia_secund ? 1 : 0;
                                    $total += $item->im_severidad ? 1 : 0;
                                    $total += $item->im_carpentier ? 1 : 0;
                                    $total += $item->im_anillo ? 1 : 0;
                                    $total += $item->im_metodo_eval_anillo ? 1 : 0;
                                    $total += $item->et_velocidad_maxima ? 1 : 0;
                                    $total += $item->et_gradiente_media ? 1 : 0;
                                    $total += $item->et_area_valvular ? 1 : 0;
                                    $total += $item->et_etiologia ? 1 : 0;
                                    $total += $item->et_severidad ? 1 : 0;
                                    $total += $item->it_numero_velos ? 1 : 0;
                                    $total += $item->it_jet ? 1 : 0;
                                    $total += $item->it_vena_contracta ? 1 : 0;
                                    $total += $item->it_ore ? 1 : 0;
                                    $total += $item->it_velocidad_maxima ? 1 : 0;
                                    $total += $item->it_gradiente_maxima ? 1 : 0;
                                    $total += $item->it_tipoetiologia ? 1 : 0;
                                    $total += $item->it_tipoetiologia_secund ? 1 : 0;
                                    $total += $item->it_volumen_regurgitante ? 1 : 0;
                                    $total += $item->it_severidad ? 1 : 0;
                                    $total += $item->it_psap_estimada ? 1 : 0;
                                    $total += $item->it_anillo ? 1 : 0;
                                    $total += $item->it_metodo_eval_anillo ? 1 : 0;
                                    $total += $item->ep_velocidad_maxima ? 1 : 0;
                                    $total += $item->ep_gradiente_media ? 1 : 0;
                                    $total += $item->ep_area_valvular ? 1 : 0;
                                    $total += $item->ep_etiologia ? 1 : 0;
                                    $total += $item->ep_severidad ? 1 : 0;
                                    $total += $item->ip_vena_contracta ? 1 : 0;
                                    $total += $item->ip_etiologia ? 1 : 0;
                                    $total += $item->ip_severidad ? 1 : 0;
                                    $total += $item->ip_anillo ? 1 : 0;
                                    $total += $item->ip_metodo_eval_anillo ? 1 : 0;
                                    $total += $item->volumen_auricula_izquierda ? 1 : 0;
                                    $total += $item->area_auricula_derecha ? 1 : 0;
                                    $total += $item->vi_diametro_telesistolico ? 1 : 0;
                                    $total += $item->vi_volumen_telediastol ? 1 : 0;
                                    $total += $item->vi_volumen_telesistolico ? 1 : 0;
                                    $total += $item->vi_masa ? 1 : 0;
                                    $total += $item->vi_remodelamiento ? 1 : 0;
                                    $total += $item->vi_fraccion_eyeccion_simpson ? 1 : 0;
                                    $total += $item->vd_base ? 1 : 0;
                                    $total += $item->vd_porcion_media ? 1 : 0;
                                    $total += $item->vd_longitud ? 1 : 0;
                                    $total += $item->vd_dilatado ? 1 : 0;
                                    $total += $item->vd_tapse ? 1 : 0;
                                    $total += $item->vd_fraccion_acortamiento ? 1 : 0;
                                    $total += $item->rda_union ? 1 : 0;
                                    $total += $item->rda_senos ? 1 : 0;
                                    $total += $item->rda_anillo ? 1 : 0;
                                    $total += $item->rda_aorta_ascendente ? 1 : 0;
                                    $total += $item->cci_fecha ? 1 : 0;
                                    $total += $item->cci_severidad ? 1 : 0;
                                    $total += $item->lesion_cd ? 1 : 0;
                                    $total += $item->lesion_tci ? 1 : 0;
                                    $total += $item->lesion_ada ? 1 : 0;
                                    $total += $item->lesion_cx ? 1 : 0;
                                    $total += $item->lesion_diagonal ? 1 : 0;
                                    $total += $item->lesion_marginal ? 1 : 0;
                                    $total += $item->lesion_descen_posterior ? 1 : 0;
                                    $total += $item->ccd_fecha ? 1 : 0;
                                    $total += $item->ccd_presartesis_pulmonar ? 1 : 0;
                                    $total += $item->ccd_psap_cardercho ? 1 : 0;
                                    $total += $item->ccd_resis_pulmonar ? 1 : 0;
                                    $total += $item->ccd_presart_medpulmunar ? 1 : 0;
                                    $total += $item->ccd_hiper_pulmonar ? 1 : 0;
                                    $total += $item->ccd_diag_hipertension ? 1 : 0;
                                    $total += $item->ccd_presion_capilar_pulmonar ? 1 : 0;
                                    $total += $item->ccd_diam_vi_diastole ? 1 : 0;
                                    $total += $item->ccd_diam_vi_sistole ? 1 : 0;
                                    $total += $item->fecha_intervencion ? 1 : 0;
                                    $total += $item->valvulas_tratadas ? 1 : 0;
                                    $total += $item->tratamiento ? 1 : 0;
                                    $total += $item->reparacion ? 1 : 0;
                                    $total += $item->valvula_reparada ? 1 : 0;
                                    $total += $item->dispositivos ? 1 : 0;
                                    $total += $item->valvula_trat_dispositivo ? 1 : 0;
                                    $total += $item->protesis ? 1 : 0;
                                    $total += $item->valvula_tratada_protesis ? 1 : 0;
                                    $total += $item->otros_procedquirurgicos ? 1 : 0;
                                    $total += $item->interv_tipodispusado ? 1 : 0;
                                    $total += $item->medicacion_ieca ? 1 : 0;
                                    $total += $item->medicacion_ara ? 1 : 0;
                                    $total += $item->medicacion_betabloqueador ? 1 : 0;
                                    $total += $item->medicacion_digoxina ? 1 : 0;
                                    $total += $item->medicacion_estatinas ? 1 : 0;
                                    $total += $item->medicacion_diureticos ? 1 : 0;
                                    $total += $item->medicacion_calcio_antagonista ? 1 : 0;
                                    $total += $item->medicacion_dabigatran ? 1 : 0;
                                    $total += $item->medicacion_warfarina ? 1 : 0;
                                    $total += $item->medicacion_acido_acetil_salicilico ? 1 : 0;
                                    $total += $item->medicacion_otro ? 1 : 0;
                                    $total += $item->inmediatas ? 1 : 0;
                                    $total += $item->tardias ? 1 : 0;
                                    $total += $item->muerte_general ? 1 : 0;
                                    $total += $item->muerte_cardiovascular ? 1 : 0;
                                    $total += $item->fechademuerte ? 1 : 0;
                                    $total += $item->hospitalizacion ? 1 : 0;
                                    $total += $item->tiempo_hospitalizacion ? 1 : 0;
                                    $total += $item->fecha_hospitalizacion ? 1 : 0;
                                    
                                @endphp

                                @php
                                    $porcentaje = floor(($total * 100) / 157);
                                @endphp

                                {{ $porcentaje }}%

                            </td>

                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('renaval.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-info-circle"></i>
                                </a>

                                @if(Auth::user()->id == $item->user_id)
                                    <a href="{{ route('renaval.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif

                                @if(Auth::user()->id == $item->user_id)
                                <form action="{{ route('renaval.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
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


