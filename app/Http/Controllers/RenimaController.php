<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Renima;
use App\Models\RenimaUser;

use Illuminate\Support\Facades\Log;

class RenimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = [
            'category_name' => 'renima',
            'page_name' => 'renima_index',
        ];

        //if auth user is admin, show all renimas
        if (\Auth::user()->hasRole('admin')) {
            
            $renimas = RenimaUser::join('renimas', 'renima_users.renima_id', '=', 'renimas.id')
                ->join('users', 'renima_users.user_id', '=', 'users.id')
                ->select(
                    'renimas.*', 
                    'users.trato', 
                    'users.name', 
                    'users.lastname', 
                    'renima_users.user_id as renimauser_userid'
                    )
                ->where('renimas.status', 'Activo')
                ->get();


        } else {
            
            $renimas = RenimaUser::join('renimas', 'renima_users.renima_id', '=', 'renimas.id')
                ->join('users', 'renima_users.user_id', '=', 'users.id')
                ->select('renimas.*', 'users.trato', 'users.name', 'users.lastname', 'renima_users.user_id as renimauser_userid')
                ->where('renima_users.user_id', auth()->user()->id)
                ->where('renimas.status', 'Activo')
                ->get();

            

        }

        return view('pages.renima.index')->with($data)->with('renimas', $renimas);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'renima',
            'page_name' => 'renima_create',
        ];

        //Obterner sede
        $user_auth = User::leftJoin('sedes', 'users.sede', '=', 'sedes.id')
        ->select('users.*', 'sedes.name as sede_nombre', 'sedes.address as sede_direccion')
        ->where('users.id', auth()->user()->id)
        ->first();

        return view('pages.renima.create')->with($data)->with('user_auth', $user_auth);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $renima = new Renima();
        
        // Datos Epidemiológicos (de_)
            $renima->de_documento_identidad = $request->de_documento_identidad;
            $renima->de_telefono = $request->de_telefono;
            $renima->de_celular = $request->de_celular;
            $renima->de_celular_2 = $request->de_celular_2;
            $renima->de_correo = $request->de_correo;
            $renima->de_departamento = $request->de_departamento;
            $renima->de_provincia = $request->de_provincia;
            $renima->de_distrito = $request->de_distrito;
            $renima->de_edad = $request->de_edad;
            $renima->de_nacimiento = $request->de_nacimiento;
            $renima->de_sexo = $request->de_sexo;
            $renima->de_estado_civil = $request->de_estado_civil;
            $renima->de_tipo_seguro = $request->de_tipo_seguro;
            $renima->de_tipo_seguro_otro = $request->de_tipo_seguro_otro;
            $renima->de_grado_instruccion = $request->de_grado_instruccion;

        //Datos Clínicos (dc_)
            $renima->dc_pas = $request->dc_pas;
            $renima->dc_pad = $request->dc_pad;
            $renima->dc_frecuencia_cardiaca = $request->dc_frecuencia_cardiaca;
            $renima->dc_frecuencia_respiratoria = $request->dc_frecuencia_respiratoria;
            $renima->dc_temperatura = $request->dc_temperatura;
            $renima->dc_saturacion_oxigeno = $request->dc_saturacion_oxigeno;
            $renima->dc_peso = $request->dc_peso;
            $renima->dc_talla = $request->dc_talla;
            $renima->dc_imc = $request->dc_imc;

            $dc_antecedentes = $request->dc_antecedentes;
            if(!empty($dc_antecedentes)){
                $renima->dc_antecedentes = implode(',', $dc_antecedentes);
            }else{
                $renima->dc_antecedentes = '';
            }

            $renima->dc_otro_antecedentes = $request->dc_otro_antecedentes;

        // Enfermedad actual (ea_)
            $renima->ea_fecha_iniciosintomas = $request->ea_fecha_iniciosintomas;
            $renima->ea_hora_iniciosintomas = $request->ea_hora_iniciosintomas;
            $renima->ea_cpcm = $request->ea_cpcm;
            $renima->ea_cpcm_fecha_ingreso = $request->ea_cpcm_fecha_ingreso;
            $renima->ea_cpcm_hora_ingreso = $request->ea_cpcm_hora_ingreso;
            $renima->ea_fecha_pcm = $request->ea_fecha_pcm;
            $renima->ea_hora_pcm = $request->ea_hora_pcm;
            $renima->ea_tiempo_ispc = $request->ea_tiempo_ispc;
            $renima->ea_fecha_ecg = $request->ea_fecha_ecg;
            $renima->ea_hora_ecg = $request->ea_hora_ecg;
            $renima->ea_tpc_ecg = $request->ea_tpc_ecg;

            $ea_manif_clinicas = $request->ea_manif_clinicas;
            if(!empty($ea_manif_clinicas)){
                $renima->ea_manif_clinicas = implode(',', $ea_manif_clinicas);
            }else{
                $renima->ea_manif_clinicas = '';
            }

            $renima->ea_clasificacion_kk = $request->ea_clasificacion_kk;
            $renima->ea_diagnostico = $request->ea_diagnostico;
            $renima->ea_diagnostico_st = $request->ea_diagnostico_st;
            $renima->ea_evaluacion_riesgo = $request->ea_evaluacion_riesgo;
            $renima->ea_heart_score = $request->ea_heart_score;
            $renima->ea_otros = $request->ea_otros;

        //Electrocardiograma (ecg_)
            $renima->ecg_ritmo = $request->ecg_ritmo;

            $ecg_iamcest_localizacion = $request->ecg_iamcest_localizacion;
            if(!empty($ecg_iamcest_localizacion)){
                $renima->ecg_iamcest_localizacion = implode(',', $ecg_iamcest_localizacion);
            }else{
                $renima->ecg_iamcest_localizacion = '';
            }

            $ecg_scasest = $request->ecg_scasest;
            if(!empty($ecg_scasest)){
                $renima->ecg_scasest = implode(',', $ecg_scasest);
            }else{
                $renima->ecg_scasest = '';
            }

            $ecg_otros_hallazgos = $request->ecg_otros_hallazgos;
            if(!empty($ecg_otros_hallazgos)){
                $renima->ecg_otros_hallazgos = implode(',', $ecg_otros_hallazgos);
            }else{
                $renima->ecg_otros_hallazgos = '';
            }

            $renima->ecg_otro = $request->ecg_otro;

        //Datos del manejo de intervención en IAMCEST y SCASEST (dis_)
            $renima->dis_manejo = $request->dis_manejo;
            $renima->dis_manejo_icpp_dosis = $request->dis_manejo_icpp_dosis;
            $renima->dis_tf = $request->dis_tf;
            $renima->dis_lugar_tf = $request->dis_lugar_tf;
            $renima->dis_lugar_tf_otro = $request->dis_lugar_tf_otro;
            $renima->dis_fecha_fibrinolisis = $request->dis_fecha_fibrinolisis;
            $renima->dis_hora_fibrinolisis = $request->dis_hora_fibrinolisis;
            $renima->dis_tiempo_ecg_fibrinolisis = $request->dis_tiempo_ecg_fibrinolisis;

            $dis_tipofibrinolisis = $request->dis_tipofibrinolisis;
            if(!empty($dis_tipofibrinolisis)){
                $renima->dis_tipofibrinolisis = implode(',', $dis_tipofibrinolisis);
            }else{
                $renima->dis_tipofibrinolisis = '';
            }

            $renima->dis_tipofibrinolisis_otro = $request->dis_tipofibrinolisis_otro;
            $renima->dis_fibrinolisis_exitosa = $request->dis_fibrinolisis_exitosa;
            $renima->dis_angioplastia_rescate = $request->dis_angioplastia_rescate;
            $renima->dis_fibrinolisis_suspendida = $request->dis_fibrinolisis_suspendida;
            $renima->dis_causa_suspension = $request->dis_causa_suspension;
            $renima->dis_fuetransferido_icp = $request->dis_fuetransferido_icp;
            $renima->dis_lugar_transferencia_icp = $request->dis_lugar_transferencia_icp;
            $renima->dis_lugar_transferencia_icp_otro = $request->dis_lugar_transferencia_icp_otro;
            $renima->dis_fecha_salida_antes_icp = $request->dis_fecha_salida_antes_icp;
            $renima->dis_hora_salida_antes_icp = $request->dis_hora_salida_antes_icp;
            $renima->dis_tiempo_doorin_doorout = $request->dis_tiempo_doorin_doorout;
            $renima->dis_fecha_llegada_centro_icp = $request->dis_fecha_llegada_centro_icp;
            $renima->dis_hora_llegada_centro_icp = $request->dis_hora_llegada_centro_icp;
            $renima->dis_tiepo_transporte_icp = $request->dis_tiepo_transporte_icp;
            $renima->dis_fecha_inicio_icp = $request->dis_fecha_inicio_icp;
            $renima->dis_hora_inicio_icp = $request->dis_hora_inicio_icp;
            $renima->dis_modo_transporte_icp = $request->dis_modo_transporte_icp;
            $renima->dis_tipo_acceso = $request->dis_tipo_acceso;
            $renima->dis_arteria_responsable_ima = $request->dis_arteria_responsable_ima;
            $renima->dis_fecha_apertura = $request->dis_fecha_apertura;
            $renima->dis_hora_apertura = $request->dis_hora_apertura;
            $renima->dis_flujo_inicial_timi = $request->dis_flujo_inicial_timi;
            $renima->dis_flujo_final_timi = $request->dis_flujo_final_timi;
            $renima->dis_tipo_stent = $request->dis_tipo_stent;
            $renima->dis_numero_stent = $request->dis_numero_stent;
            $renima->dis_diametro_stent = $request->dis_diametro_stent;
            $renima->dis_longitud_stent = $request->dis_longitud_stent;
            $renima->dis_predilatacion = $request->dis_predilatacion;
            $renima->dis_postdilatacion = $request->dis_postdilatacion;
            $renima->dis_otra_intervencion = $request->dis_otra_intervencion;
            $renima->dis_exito_icp = $request->dis_exito_icp;
            $renima->dis_fecha_fin_icp = $request->dis_fecha_fin_icp;
            $renima->dis_hora_fin_icp = $request->dis_hora_fin_icp;
            $renima->dis_duracion_icp = $request->dis_duracion_icp;

            $dis_complicaciones_dela_icp = $request->dis_complicaciones_dela_icp;
            if(!empty($dis_complicaciones_dela_icp)){
                $renima->dis_complicaciones_dela_icp = implode(',', $dis_complicaciones_dela_icp);
            }else{
                $renima->dis_complicaciones_dela_icp = '';
            }

            $renima->dis_complicaciones_dela_icp_otro = $request->dis_complicaciones_dela_icp_otro;
            $renima->dis_tt_isquemia = $request->dis_tt_isquemia;
            $renima->dis_otrastenosis_coronaria = $request->dis_otrastenosis_coronaria;

            $dis_otrastenosis_coronaria_lesiones = $request->dis_otrastenosis_coronaria_lesiones;
            if(!empty($dis_otrastenosis_coronaria_lesiones)){
                $renima->dis_otrastenosis_coronaria_lesiones = implode(',', $dis_otrastenosis_coronaria_lesiones);
            }else{
                $renima->dis_otrastenosis_coronaria_lesiones = '';
            }

            $renima->dis_icp_otras_lesiones = $request->dis_icp_otras_lesiones;

            $dis_icp_otras_lesiones_lesiones = $request->dis_icp_otras_lesiones_lesiones;
            if(!empty($dis_icp_otras_lesiones_lesiones)){
                $renima->dis_icp_otras_lesiones_lesiones = implode(',', $dis_icp_otras_lesiones_lesiones);
            }else{
                $renima->dis_icp_otras_lesiones_lesiones = '';
            }

            $renima->dis_decisio_basada = $request->dis_decisio_basada;
            $renima->dis_momento_icp_otras_lesiones = $request->dis_momento_icp_otras_lesiones;
            $renima->dis_cuan_dias_antes_despues_alta_icp = $request->dis_cuan_dias_antes_despues_alta_icp;
            $renima->dis_revascularizacion_completa = $request->dis_revascularizacion_completa;
            $renima->dis_reperfusion = $request->dis_reperfusion;
            $renima->dis_motivo_deno_reperfusion = $request->dis_motivo_deno_reperfusion;
            $renima->dis_motivo_deno_reperfusion_otro = $request->dis_motivo_deno_reperfusion_otro;
            $renima->dis_cabg = $request->dis_cabg;
            $renima->dis_motivo_cabg = $request->dis_motivo_cabg;
            $renima->dis_motivo_cabg_otro = $request->dis_motivo_cabg_otro;
            $renima->dis_puntaje_grace = $request->dis_puntaje_grace;
            $renima->dis_puntaje_crussade = $request->dis_puntaje_crussade;

        //Terapia Intrahospitalaria (ti_)
            $renima->ti_aspirina = $request->ti_aspirina;
            $renima->ti_ip2y12 = $request->ti_ip2y12;
            $renima->ti_enoxaparina = $request->ti_enoxaparina;
            $renima->ti_heparina_no_fraccionada = $request->ti_heparina_no_fraccionada;
            $renima->ti_atorvastatina = $request->ti_atorvastatina;
            $renima->ti_betabloqueadores = $request->ti_betabloqueadores;
            $renima->ti_diureticos_asa = $request->ti_diureticos_asa;
            $renima->ti_vasodilatadores = $request->ti_vasodilatadores;
            $renima->ti_vasopresores = $request->ti_vasopresores;
            $renima->ti_inotropicos = $request->ti_inotropicos;
            $renima->ti_ieca_ara = $request->ti_ieca_ara;
            $renima->ti_insulina = $request->ti_insulina;
            $renima->ti_antagonistas_mineralocorticoide = $request->ti_antagonistas_mineralocorticoide;
            $renima->ti_ventilacion_mecanica = $request->ti_ventilacion_mecanica;
            $renima->ti_dialisis = $request->ti_dialisis;
            $renima->ti_rehabilitacion_cardiaca = $request->ti_rehabilitacion_cardiaca;
            $renima->ti_ventilacion_no_invasiva = $request->ti_ventilacion_no_invasiva;
            $renima->ti_balon_contrapulsacion_ia = $request->ti_balon_contrapulsacion_ia;
            $renima->ti_levosimendan = $request->ti_levosimendan;
            $renima->ti_marcapaso = $request->ti_marcapaso;
            $renima->ti_ecmo = $request->ti_ecmo;
            $renima->ti_dai_resincro = $request->ti_dai_resincro;
            $renima->ti_transplante_cardiaca = $request->ti_transplante_cardiaca;

        //Analisis Auxiliares Intrahospitalarios (aai_)
            $renima->aai_hemoglobina = $request->aai_hemoglobina;
            $renima->aai_leucocitos = $request->aai_leucocitos;
            $renima->aai_plaquetas = $request->aai_plaquetas;
            $renima->aai_creatinina = $request->aai_creatinina;
            $renima->aai_urea = $request->aai_urea;
            $renima->aai_glucosa = $request->aai_glucosa;
            $renima->aai_trigliceridos = $request->aai_trigliceridos;
            $renima->aai_colesterol_total = $request->aai_colesterol_total;
            $renima->aai_colesterol_hdl = $request->aai_colesterol_hdl;
            $renima->aai_colesterol_ldl = $request->aai_colesterol_ldl;
            $renima->aai_tipo_troponina = $request->aai_tipo_troponina;
            $renima->aai_troponina_iot_primer = $request->aai_troponina_iot_primer;
            $renima->aai_troponina_iot_segundo = $request->aai_troponina_iot_segundo;
            $renima->aai_horas_troponina = $request->aai_horas_troponina;
            $renima->aai_cpk_total = $request->aai_cpk_total;
            $renima->aai_cpk_mb = $request->aai_cpk_mb;
            $renima->aai_lactato = $request->aai_lactato;
            $renima->aai_fevi = $request->aai_fevi;
            $renima->aai_fecha_pm_fevi = $request->aai_fecha_pm_fevi;
            $renima->aai_hemoglobina_glicosilada = $request->aai_hemoglobina_glicosilada;
            $renima->aai_detalle = $request->aai_detalle;

        //Datos Clinicos Intrahospitalarios (dci_)
            $renima->dci_muerte_cardiovascular = $request->dci_muerte_cardiovascular;
            $renima->dci_fecha_muerte_cardiovascular_alta = $request->dci_fecha_muerte_cardiovascular_alta;
            $renima->dci_muerte_no_cardiovascular = $request->dci_muerte_no_cardiovascular;
            $renima->dci_fecha_muerte_no_cardiovascular_alta = $request->dci_fecha_muerte_no_cardiovascular_alta;
            $renima->dci_angina_postinfarto = $request->dci_angina_postinfarto;
            $renima->dci_fecha_angina_postinfarto = $request->dci_fecha_angina_postinfarto;
            $renima->dci_reinfarto = $request->dci_reinfarto;
            $renima->dci_fecha_reinfarto = $request->dci_fecha_reinfarto;
            $renima->dci_acv = $request->dci_acv;
            $renima->dci_fecha_acv_alta = $request->dci_fecha_acv_alta;
            $renima->dci_sangrado = $request->dci_sangrado;
            $renima->dci_sangrado_segun_barc = $request->dci_sangrado_segun_barc;
            $renima->dci_sangrado_segun_barc_tipo = $request->dci_sangrado_segun_barc_tipo;
            $renima->dci_fecha_sangrado = $request->dci_fecha_sangrado;
            $renima->dci_shock_cardiogenico = $request->dci_shock_cardiogenico;
            $renima->dci_fecha_shock_cardiogenico = $request->dci_fecha_shock_cardiogenico;
            $renima->dci_paro_cardiorespiratorio_recuperado = $request->dci_paro_cardiorespiratorio_recuperado;
            $renima->dci_fecha_paro_cardiorespiratorio_recuperado = $request->dci_fecha_paro_cardiorespiratorio_recuperado;
            $renima->dci_ruptura_musculo_papilar = $request->dci_ruptura_musculo_papilar;
            $renima->dci_fecha_ruptura_musculo_papilar = $request->dci_fecha_ruptura_musculo_papilar;
            $renima->dci_comunicacion_interventricular = $request->dci_comunicacion_interventricular;
            $renima->dci_fecha_comunicacion_interventricular = $request->dci_fecha_comunicacion_interventricular;
            $renima->dci_ruptura_pared_libre = $request->dci_ruptura_pared_libre;
            $renima->dci_fecha_ruptura_pared_libre = $request->dci_fecha_ruptura_pared_libre;
            $renima->dci_aneurisma_ventricular = $request->dci_aneurisma_ventricular;
            $renima->dci_fecha_aneurisma_ventricular = $request->dci_fecha_aneurisma_ventricular;
            $renima->dci_trombosis_stent = $request->dci_trombosis_stent;
            $renima->dci_fecha_trombosis_stent = $request->dci_fecha_trombosis_stent;
            $renima->dci_fecha_de_alta = $request->dci_fecha_de_alta;
            $renima->dci_dias_hospitalizacion = $request->dci_dias_hospitalizacion;

        //Medicación al Alta (ma_)
            $renima->ma_aspirina = $request->ma_aspirina;
            $renima->ma_ip2y12 = $request->ma_ip2y12;
            $renima->ma_estatinas = $request->ma_estatinas;
            $renima->ma_betabloqueadores = $request->ma_betabloqueadores;
            $renima->ma_diureticos_asa = $request->ma_diureticos_asa;
            $renima->ma_antagonistas_mineralocorticoide = $request->ma_antagonistas_mineralocorticoide;
            $renima->ma_ieca_ara = $request->ma_ieca_ara;
            $renima->ma_nitratos = $request->ma_nitratos;
            $renima->ma_anticoagulacion = $request->ma_anticoagulacion;
            $renima->ma_otros = $request->ma_otros;

        // Seguimiento Clínico (sc_)
            $renima->sc_muerte_cardiovascular = $request->sc_muerte_cardiovascular;
            $renima->sc_fecha_muerte_cardiovascular = $request->sc_fecha_muerte_cardiovascular;
            $renima->sc_muerte_no_cardiovascular = $request->sc_muerte_no_cardiovascular;
            $renima->sc_fecha_muerte_no_cardiovascular = $request->sc_fecha_muerte_no_cardiovascular;
            $renima->sc_angina_postinfarto = $request->sc_angina_postinfarto;
            $renima->sc_fecha_angina_postinfarto = $request->sc_fecha_angina_postinfarto;
            $renima->sc_reinfarto = $request->sc_reinfarto;
            $renima->sc_fecha_reinfarto = $request->sc_fecha_reinfarto;
            $renima->sc_acv = $request->sc_acv;
            $renima->sc_fecha_acv = $request->sc_fecha_acv;
            $renima->sc_rehospitalizacion_falla_cardiaca = $request->sc_rehospitalizacion_falla_cardiaca;
            $renima->sc_fecha_rehospitalizacion_falla_cardiaca = $request->sc_fecha_rehospitalizacion_falla_cardiaca;
            $renima->sc_sangrado = $request->sc_sangrado;
            $renima->sc_sangrado_segun_barc = $request->sc_sangrado_segun_barc;
            $renima->sc_sangrado_barc_tipo = $request->sc_sangrado_barc_tipo;
            $renima->sc_fecha_sangrado = $request->sc_fecha_sangrado;
            $renima->sc_prc = $request->sc_prc;
            $renima->sc_segunda_medicion_fevi_alta = $request->sc_segunda_medicion_fevi_alta;
            $renima->sc_fecha_segunda_fevi_alta = $request->sc_fecha_segunda_fevi_alta;
            $renima->sc_reestenosis_stent = $request->sc_reestenosis_stent;
            $renima->sc_fecha_reestenosis_stent = $request->sc_fecha_reestenosis_stent;
            $renima->sc_trombosis_stent = $request->sc_trombosis_stent;
            $renima->sc_fecha_trombosis_stent = $request->sc_fecha_trombosis_stent;
            $renima->sc_otros = $request->sc_otros;

        $renima->status = 'Activo';
        $renima->save();

        // Guardar el registro en la tabla intermedia renima_user reciecien creado
        $renima_user = new RenimaUser();
        $renima_user->user_id = Auth::user()->id;
        $renima_user->renima_id = $renima->id;
        $renima_user->is_completed = $request->is_completed;

        if($request->is_completed == 1) {
            $renima_user->completed_at = now();
        } else {
            $renima_user->completed_at = null;
        }

        $renima_user->save();

        return redirect()->route('renima.index')->with('success', 'Renima creado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //Solo puede ingresar los que estan asociados al registro
        if (!RenimaUser::where('renima_id', $id)->where('user_id', auth()->user()->id)->exists()) {
            return redirect()->route('renima.index')->with('error', 'No tienes permiso para editar este registro');
        }

        $data = [
            'category_name' => 'renima',
            'page_name' => 'renima_edit',
        ];

        //Obterner usuario que estan asociados al renima
        $user_asociados = RenimaUser::join('users', 'renima_users.user_id', '=', 'users.id')
            ->leftJoin('sedes', 'users.sede', '=', 'sedes.id')
            ->select('users.*', 'renima_users.is_completed', 'renima_users.completed_at', 'sedes.name as sede_name', 'sedes.address as sede_address')
            ->where('renima_users.renima_id', $id)
            ->get();

        $renima = RenimaUser::join('renimas', 'renima_users.renima_id', '=', 'renimas.id')
            ->select('renimas.*', 'renima_users.is_completed as ru_is_completed', 'renima_users.completed_at as ru_completed_at')
            ->where('renima_users.renima_id', $id)
            ->where('renima_users.user_id', auth()->user()->id)
            ->first();

        return view('pages.renima.edit')->with($data)->with('user_asociados', $user_asociados)->with('renima', $renima);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $renima = Renima::find($id);

        // Datos Epidemiológicos (de_)
        $renima->de_documento_identidad = $request->de_documento_identidad;
        $renima->de_telefono = $request->de_telefono;
        $renima->de_celular = $request->de_celular;
        $renima->de_celular_2 = $request->de_celular_2;
        $renima->de_correo = $request->de_correo;
        $renima->de_departamento = $request->de_departamento;
        $renima->de_provincia = $request->de_provincia;
        $renima->de_distrito = $request->de_distrito;
        $renima->de_edad = $request->de_edad;
        $renima->de_nacimiento = $request->de_nacimiento;
        $renima->de_sexo = $request->de_sexo;
        $renima->de_estado_civil = $request->de_estado_civil;
        $renima->de_tipo_seguro = $request->de_tipo_seguro;
        $renima->de_tipo_seguro_otro = $request->de_tipo_seguro_otro;
        $renima->de_grado_instruccion = $request->de_grado_instruccion;

    //Datos Clínicos (dc_)
        $renima->dc_pas = $request->dc_pas;
        $renima->dc_pad = $request->dc_pad;
        $renima->dc_frecuencia_cardiaca = $request->dc_frecuencia_cardiaca;
        $renima->dc_frecuencia_respiratoria = $request->dc_frecuencia_respiratoria;
        $renima->dc_temperatura = $request->dc_temperatura;
        $renima->dc_saturacion_oxigeno = $request->dc_saturacion_oxigeno;
        $renima->dc_peso = $request->dc_peso;
        $renima->dc_talla = $request->dc_talla;
        $renima->dc_imc = $request->dc_imc;

        $dc_antecedentes = $request->dc_antecedentes;
        if(!empty($dc_antecedentes)){
            $renima->dc_antecedentes = implode(',', $dc_antecedentes);
        }else{
            $renima->dc_antecedentes = '';
        }

        $renima->dc_otro_antecedentes = $request->dc_otro_antecedentes;

    // Enfermedad actual (ea_)
        $renima->ea_fecha_iniciosintomas = $request->ea_fecha_iniciosintomas;
        $renima->ea_hora_iniciosintomas = $request->ea_hora_iniciosintomas;
        $renima->ea_cpcm = $request->ea_cpcm;
        $renima->ea_cpcm_fecha_ingreso = $request->ea_cpcm_fecha_ingreso;
        $renima->ea_cpcm_hora_ingreso = $request->ea_cpcm_hora_ingreso;
        $renima->ea_fecha_pcm = $request->ea_fecha_pcm;
        $renima->ea_hora_pcm = $request->ea_hora_pcm;
        $renima->ea_tiempo_ispc = $request->ea_tiempo_ispc;
        $renima->ea_fecha_ecg = $request->ea_fecha_ecg;
        $renima->ea_hora_ecg = $request->ea_hora_ecg;
        $renima->ea_tpc_ecg = $request->ea_tpc_ecg;

        $ea_manif_clinicas = $request->ea_manif_clinicas;
        if(!empty($ea_manif_clinicas)){
            $renima->ea_manif_clinicas = implode(',', $ea_manif_clinicas);
        }else{
            $renima->ea_manif_clinicas = '';
        }

        $renima->ea_clasificacion_kk = $request->ea_clasificacion_kk;
        $renima->ea_diagnostico = $request->ea_diagnostico;
        $renima->ea_diagnostico_st = $request->ea_diagnostico_st;
        $renima->ea_evaluacion_riesgo = $request->ea_evaluacion_riesgo;
        $renima->ea_heart_score = $request->ea_heart_score;
        $renima->ea_otros = $request->ea_otros;

    //Electrocardiograma (ecg_)
        $renima->ecg_ritmo = $request->ecg_ritmo;

        $ecg_iamcest_localizacion = $request->ecg_iamcest_localizacion;
        if(!empty($ecg_iamcest_localizacion)){
            $renima->ecg_iamcest_localizacion = implode(',', $ecg_iamcest_localizacion);
        }else{
            $renima->ecg_iamcest_localizacion = '';
        }

        $ecg_scasest = $request->ecg_scasest;
        if(!empty($ecg_scasest)){
            $renima->ecg_scasest = implode(',', $ecg_scasest);
        }else{
            $renima->ecg_scasest = '';
        }

        $ecg_otros_hallazgos = $request->ecg_otros_hallazgos;
        if(!empty($ecg_otros_hallazgos)){
            $renima->ecg_otros_hallazgos = implode(',', $ecg_otros_hallazgos);
        }else{
            $renima->ecg_otros_hallazgos = '';
        }

        $renima->ecg_otro = $request->ecg_otro;

    //Datos del manejo de intervención en IAMCEST y SCASEST (dis_)
        $renima->dis_manejo = $request->dis_manejo;
        $renima->dis_manejo_icpp_dosis = $request->dis_manejo_icpp_dosis;
        $renima->dis_tf = $request->dis_tf;
        $renima->dis_lugar_tf = $request->dis_lugar_tf;
        $renima->dis_lugar_tf_otro = $request->dis_lugar_tf_otro;
        $renima->dis_fecha_fibrinolisis = $request->dis_fecha_fibrinolisis;
        $renima->dis_hora_fibrinolisis = $request->dis_hora_fibrinolisis;
        $renima->dis_tiempo_ecg_fibrinolisis = $request->dis_tiempo_ecg_fibrinolisis;

        $dis_tipofibrinolisis = $request->dis_tipofibrinolisis;
        if(!empty($dis_tipofibrinolisis)){
            $renima->dis_tipofibrinolisis = implode(',', $dis_tipofibrinolisis);
        }else{
            $renima->dis_tipofibrinolisis = '';
        }

        $renima->dis_tipofibrinolisis_otro = $request->dis_tipofibrinolisis_otro;
        $renima->dis_fibrinolisis_exitosa = $request->dis_fibrinolisis_exitosa;
        $renima->dis_angioplastia_rescate = $request->dis_angioplastia_rescate;
        $renima->dis_fibrinolisis_suspendida = $request->dis_fibrinolisis_suspendida;
        $renima->dis_causa_suspension = $request->dis_causa_suspension;
        $renima->dis_fuetransferido_icp = $request->dis_fuetransferido_icp;
        $renima->dis_lugar_transferencia_icp = $request->dis_lugar_transferencia_icp;
        $renima->dis_lugar_transferencia_icp_otro = $request->dis_lugar_transferencia_icp_otro;
        $renima->dis_fecha_salida_antes_icp = $request->dis_fecha_salida_antes_icp;
        $renima->dis_hora_salida_antes_icp = $request->dis_hora_salida_antes_icp;
        $renima->dis_tiempo_doorin_doorout = $request->dis_tiempo_doorin_doorout;
        $renima->dis_fecha_llegada_centro_icp = $request->dis_fecha_llegada_centro_icp;
        $renima->dis_hora_llegada_centro_icp = $request->dis_hora_llegada_centro_icp;
        $renima->dis_tiepo_transporte_icp = $request->dis_tiepo_transporte_icp;
        $renima->dis_fecha_inicio_icp = $request->dis_fecha_inicio_icp;
        $renima->dis_hora_inicio_icp = $request->dis_hora_inicio_icp;
        $renima->dis_modo_transporte_icp = $request->dis_modo_transporte_icp;
        $renima->dis_tipo_acceso = $request->dis_tipo_acceso;
        $renima->dis_arteria_responsable_ima = $request->dis_arteria_responsable_ima;
        $renima->dis_fecha_apertura = $request->dis_fecha_apertura;
        $renima->dis_hora_apertura = $request->dis_hora_apertura;
        $renima->dis_flujo_inicial_timi = $request->dis_flujo_inicial_timi;
        $renima->dis_flujo_final_timi = $request->dis_flujo_final_timi;
        $renima->dis_tipo_stent = $request->dis_tipo_stent;
        $renima->dis_numero_stent = $request->dis_numero_stent;
        $renima->dis_diametro_stent = $request->dis_diametro_stent;
        $renima->dis_longitud_stent = $request->dis_longitud_stent;
        $renima->dis_predilatacion = $request->dis_predilatacion;
        $renima->dis_postdilatacion = $request->dis_postdilatacion;
        $renima->dis_otra_intervencion = $request->dis_otra_intervencion;
        $renima->dis_exito_icp = $request->dis_exito_icp;
        $renima->dis_fecha_fin_icp = $request->dis_fecha_fin_icp;
        $renima->dis_hora_fin_icp = $request->dis_hora_fin_icp;
        $renima->dis_duracion_icp = $request->dis_duracion_icp;

        $dis_complicaciones_dela_icp = $request->dis_complicaciones_dela_icp;
        if(!empty($dis_complicaciones_dela_icp)){
            $renima->dis_complicaciones_dela_icp = implode(',', $dis_complicaciones_dela_icp);
        }else{
            $renima->dis_complicaciones_dela_icp = '';
        }

        $renima->dis_complicaciones_dela_icp_otro = $request->dis_complicaciones_dela_icp_otro;
        $renima->dis_tt_isquemia = $request->dis_tt_isquemia;
        $renima->dis_otrastenosis_coronaria = $request->dis_otrastenosis_coronaria;

        $dis_otrastenosis_coronaria_lesiones = $request->dis_otrastenosis_coronaria_lesiones;
        if(!empty($dis_otrastenosis_coronaria_lesiones)){
            $renima->dis_otrastenosis_coronaria_lesiones = implode(',', $dis_otrastenosis_coronaria_lesiones);
        }else{
            $renima->dis_otrastenosis_coronaria_lesiones = '';
        }

        $renima->dis_icp_otras_lesiones = $request->dis_icp_otras_lesiones;

        $dis_icp_otras_lesiones_lesiones = $request->dis_icp_otras_lesiones_lesiones;
        if(!empty($dis_icp_otras_lesiones_lesiones)){
            $renima->dis_icp_otras_lesiones_lesiones = implode(',', $dis_icp_otras_lesiones_lesiones);
        }else{
            $renima->dis_icp_otras_lesiones_lesiones = '';
        }

        $renima->dis_decisio_basada = $request->dis_decisio_basada;
        $renima->dis_momento_icp_otras_lesiones = $request->dis_momento_icp_otras_lesiones;
        $renima->dis_cuan_dias_antes_despues_alta_icp = $request->dis_cuan_dias_antes_despues_alta_icp;
        $renima->dis_revascularizacion_completa = $request->dis_revascularizacion_completa;
        $renima->dis_reperfusion = $request->dis_reperfusion;
        $renima->dis_motivo_deno_reperfusion = $request->dis_motivo_deno_reperfusion;
        $renima->dis_motivo_deno_reperfusion_otro = $request->dis_motivo_deno_reperfusion_otro;
        $renima->dis_cabg = $request->dis_cabg;
        $renima->dis_motivo_cabg = $request->dis_motivo_cabg;
        $renima->dis_motivo_cabg_otro = $request->dis_motivo_cabg_otro;
        $renima->dis_puntaje_grace = $request->dis_puntaje_grace;
        $renima->dis_puntaje_crussade = $request->dis_puntaje_crussade;

    //Terapia Intrahospitalaria (ti_)
        $renima->ti_aspirina = $request->ti_aspirina;
        $renima->ti_ip2y12 = $request->ti_ip2y12;
        $renima->ti_enoxaparina = $request->ti_enoxaparina;
        $renima->ti_heparina_no_fraccionada = $request->ti_heparina_no_fraccionada;
        $renima->ti_atorvastatina = $request->ti_atorvastatina;
        $renima->ti_betabloqueadores = $request->ti_betabloqueadores;
        $renima->ti_diureticos_asa = $request->ti_diureticos_asa;
        $renima->ti_vasodilatadores = $request->ti_vasodilatadores;
        $renima->ti_vasopresores = $request->ti_vasopresores;
        $renima->ti_inotropicos = $request->ti_inotropicos;
        $renima->ti_ieca_ara = $request->ti_ieca_ara;
        $renima->ti_insulina = $request->ti_insulina;
        $renima->ti_antagonistas_mineralocorticoide = $request->ti_antagonistas_mineralocorticoide;
        $renima->ti_ventilacion_mecanica = $request->ti_ventilacion_mecanica;
        $renima->ti_dialisis = $request->ti_dialisis;
        $renima->ti_rehabilitacion_cardiaca = $request->ti_rehabilitacion_cardiaca;
        $renima->ti_ventilacion_no_invasiva = $request->ti_ventilacion_no_invasiva;
        $renima->ti_balon_contrapulsacion_ia = $request->ti_balon_contrapulsacion_ia;
        $renima->ti_levosimendan = $request->ti_levosimendan;
        $renima->ti_marcapaso = $request->ti_marcapaso;
        $renima->ti_ecmo = $request->ti_ecmo;
        $renima->ti_dai_resincro = $request->ti_dai_resincro;
        $renima->ti_transplante_cardiaca = $request->ti_transplante_cardiaca;

    //Analisis Auxiliares Intrahospitalarios (aai_)
        $renima->aai_hemoglobina = $request->aai_hemoglobina;
        $renima->aai_leucocitos = $request->aai_leucocitos;
        $renima->aai_plaquetas = $request->aai_plaquetas;
        $renima->aai_creatinina = $request->aai_creatinina;
        $renima->aai_urea = $request->aai_urea;
        $renima->aai_glucosa = $request->aai_glucosa;
        $renima->aai_trigliceridos = $request->aai_trigliceridos;
        $renima->aai_colesterol_total = $request->aai_colesterol_total;
        $renima->aai_colesterol_hdl = $request->aai_colesterol_hdl;
        $renima->aai_colesterol_ldl = $request->aai_colesterol_ldl;
        $renima->aai_tipo_troponina = $request->aai_tipo_troponina;
        $renima->aai_troponina_iot_primer = $request->aai_troponina_iot_primer;
        $renima->aai_troponina_iot_segundo = $request->aai_troponina_iot_segundo;
        $renima->aai_horas_troponina = $request->aai_horas_troponina;
        $renima->aai_cpk_total = $request->aai_cpk_total;
        $renima->aai_cpk_mb = $request->aai_cpk_mb;
        $renima->aai_lactato = $request->aai_lactato;
        $renima->aai_fevi = $request->aai_fevi;
        $renima->aai_fecha_pm_fevi = $request->aai_fecha_pm_fevi;
        $renima->aai_hemoglobina_glicosilada = $request->aai_hemoglobina_glicosilada;
        $renima->aai_detalle = $request->aai_detalle;

    //Datos Clinicos Intrahospitalarios (dci_)
        $renima->dci_muerte_cardiovascular = $request->dci_muerte_cardiovascular;
        $renima->dci_fecha_muerte_cardiovascular_alta = $request->dci_fecha_muerte_cardiovascular_alta;
        $renima->dci_muerte_no_cardiovascular = $request->dci_muerte_no_cardiovascular;
        $renima->dci_fecha_muerte_no_cardiovascular_alta = $request->dci_fecha_muerte_no_cardiovascular_alta;
        $renima->dci_angina_postinfarto = $request->dci_angina_postinfarto;
        $renima->dci_fecha_angina_postinfarto = $request->dci_fecha_angina_postinfarto;
        $renima->dci_reinfarto = $request->dci_reinfarto;
        $renima->dci_fecha_reinfarto = $request->dci_fecha_reinfarto;
        $renima->dci_acv = $request->dci_acv;
        $renima->dci_fecha_acv_alta = $request->dci_fecha_acv_alta;
        $renima->dci_sangrado = $request->dci_sangrado;
        $renima->dci_sangrado_segun_barc = $request->dci_sangrado_segun_barc;
        $renima->dci_sangrado_segun_barc_tipo = $request->dci_sangrado_segun_barc_tipo;
        $renima->dci_fecha_sangrado = $request->dci_fecha_sangrado;
        $renima->dci_shock_cardiogenico = $request->dci_shock_cardiogenico;
        $renima->dci_fecha_shock_cardiogenico = $request->dci_fecha_shock_cardiogenico;
        $renima->dci_paro_cardiorespiratorio_recuperado = $request->dci_paro_cardiorespiratorio_recuperado;
        $renima->dci_fecha_paro_cardiorespiratorio_recuperado = $request->dci_fecha_paro_cardiorespiratorio_recuperado;
        $renima->dci_ruptura_musculo_papilar = $request->dci_ruptura_musculo_papilar;
        $renima->dci_fecha_ruptura_musculo_papilar = $request->dci_fecha_ruptura_musculo_papilar;
        $renima->dci_comunicacion_interventricular = $request->dci_comunicacion_interventricular;
        $renima->dci_fecha_comunicacion_interventricular = $request->dci_fecha_comunicacion_interventricular;
        $renima->dci_ruptura_pared_libre = $request->dci_ruptura_pared_libre;
        $renima->dci_fecha_ruptura_pared_libre = $request->dci_fecha_ruptura_pared_libre;
        $renima->dci_aneurisma_ventricular = $request->dci_aneurisma_ventricular;
        $renima->dci_fecha_aneurisma_ventricular = $request->dci_fecha_aneurisma_ventricular;
        $renima->dci_trombosis_stent = $request->dci_trombosis_stent;
        $renima->dci_fecha_trombosis_stent = $request->dci_fecha_trombosis_stent;
        $renima->dci_fecha_de_alta = $request->dci_fecha_de_alta;
        $renima->dci_dias_hospitalizacion = $request->dci_dias_hospitalizacion;

    //Medicación al Alta (ma_)
        $renima->ma_aspirina = $request->ma_aspirina;
        $renima->ma_ip2y12 = $request->ma_ip2y12;
        $renima->ma_estatinas = $request->ma_estatinas;
        $renima->ma_betabloqueadores = $request->ma_betabloqueadores;
        $renima->ma_diureticos_asa = $request->ma_diureticos_asa;
        $renima->ma_antagonistas_mineralocorticoide = $request->ma_antagonistas_mineralocorticoide;
        $renima->ma_ieca_ara = $request->ma_ieca_ara;
        $renima->ma_nitratos = $request->ma_nitratos;
        $renima->ma_anticoagulacion = $request->ma_anticoagulacion;
        $renima->ma_otros = $request->ma_otros;

    // Seguimiento Clínico (sc_)
        $renima->sc_muerte_cardiovascular = $request->sc_muerte_cardiovascular;
        $renima->sc_fecha_muerte_cardiovascular = $request->sc_fecha_muerte_cardiovascular;
        $renima->sc_muerte_no_cardiovascular = $request->sc_muerte_no_cardiovascular;
        $renima->sc_fecha_muerte_no_cardiovascular = $request->sc_fecha_muerte_no_cardiovascular;
        $renima->sc_angina_postinfarto = $request->sc_angina_postinfarto;
        $renima->sc_fecha_angina_postinfarto = $request->sc_fecha_angina_postinfarto;
        $renima->sc_reinfarto = $request->sc_reinfarto;
        $renima->sc_fecha_reinfarto = $request->sc_fecha_reinfarto;
        $renima->sc_acv = $request->sc_acv;
        $renima->sc_fecha_acv = $request->sc_fecha_acv;
        $renima->sc_rehospitalizacion_falla_cardiaca = $request->sc_rehospitalizacion_falla_cardiaca;
        $renima->sc_fecha_rehospitalizacion_falla_cardiaca = $request->sc_fecha_rehospitalizacion_falla_cardiaca;
        $renima->sc_sangrado = $request->sc_sangrado;
        $renima->sc_sangrado_segun_barc = $request->sc_sangrado_segun_barc;
        $renima->sc_sangrado_barc_tipo = $request->sc_sangrado_barc_tipo;
        $renima->sc_fecha_sangrado = $request->sc_fecha_sangrado;
        $renima->sc_prc = $request->sc_prc;
        $renima->sc_segunda_medicion_fevi_alta = $request->sc_segunda_medicion_fevi_alta;
        $renima->sc_fecha_segunda_fevi_alta = $request->sc_fecha_segunda_fevi_alta;
        $renima->sc_reestenosis_stent = $request->sc_reestenosis_stent;
        $renima->sc_fecha_reestenosis_stent = $request->sc_fecha_reestenosis_stent;
        $renima->sc_trombosis_stent = $request->sc_trombosis_stent;
        $renima->sc_fecha_trombosis_stent = $request->sc_fecha_trombosis_stent;
        $renima->sc_otros = $request->sc_otros;

        //actualizar 
        $renima->status = 'Activo';
        $renima->save();

        // Actualizar en renima_user is_completed 

        $renima_user = RenimaUser::where('renima_id', $id)->where('user_id', auth()->user()->id)->first();
        $renima_user->is_completed = $request->is_completed;
        if($request->is_completed == 1) {
            $renima_user->completed_at = now();
        } else {
            $renima_user->completed_at = null;
        }
        $renima_user->save();

        return redirect()->route('renima.index')->with('success', 'Renima actualizado exitosamente');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //verificar si el renima tiene mas de un asociado
        $renima_user = RenimaUser::where('renima_id', $id)->count();
        if ($renima_user > 1) {
            //si tiene mas de un asociado, eliminar el asociado
            $renima_user = RenimaUser::where('renima_id', $id)->where('user_id', auth()->user()->id)->first();
            $renima_user->delete();
        } else {
            //si no tiene mas de un asociado, eliminar el renima
            $renima = Renima::find($id);
            $renima->delete();
        }
        

        return redirect()->route('renima.index')->with('success', 'Registro #' . $id . ' eliminado exitosamente');
    }


    public function searchcp(Request $request)
    {
        $search = $request->input('search');
        $renima = RenimaUser::join('renimas', 'renima_users.renima_id', '=', 'renimas.id')
            ->leftJoin('users', 'renima_users.user_id', '=', 'users.id')
            ->select('renimas.*', 'users.trato as reponsable_trato' , 'users.name as reponsable_name')
            ->where('renimas.de_documento_identidad', $search)
            ->where('renima_users.is_completed', 1)
            ->get();
        return response()->json($renima);
    }

    public function assignme($id){
        //verificar si el renima esta completado
        $is_completed = RenimaUser::where('renima_id', $id)->where('is_completed', 1)->exists();
        if ($is_completed) {
            //verificar si ya tengo el renima asignado
            $renima_user = RenimaUser::where('renima_id', $id)->where('user_id', auth()->user()->id)->first();

            if ($renima_user) {
                return redirect()->route('renima.index')->with('error', 'Ya tienes el registro #' . $id . ' asignado');
            } else {
                //asignar el renima al usuario
                $renima_user = new RenimaUser();
                $renima_user->user_id = auth()->user()->id;
                $renima_user->renima_id = $id;
                $renima_user->is_completed = 0;
                $renima_user->save();
                return redirect()->route('renima.index')->with('success', 'Registro #' . $id . ' asignado exitosamente');
            }

        } else {
            return redirect()->route('renima.index')->with('error', 'Aún no se ha completado el registro #' . $id);
        }
    }

}
