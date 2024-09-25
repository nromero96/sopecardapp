<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renima;

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
            //join users table to get user (trato, name, lastname) as responsable
            $renimas = Renima::join('users', 'renimas.user_id', '=', 'users.id')
                ->select('renimas.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('renimas.status', 'Activo')
                ->get();

        } else {
            //join users table to get user (trato, name, lastname) as responsable
            $renimas = Renima::join('users', 'renimas.user_id', '=', 'users.id')
                ->select('renimas.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('renimas.user_id', auth()->user()->id)
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

        return view('pages.renima.create')->with($data);
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
        $renima->user_id = auth()->user()->id;
        $renima->centro_salud = $request->centro_salud;
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
            $renima->ea_tt_isquemia = $request->ea_tt_isquemia;

            $ea_manif_clinicas = $request->ea_manif_clinicas;
            if(!empty($ea_manif_clinicas)){
                $renima->ea_manif_clinicas = implode(',', $ea_manif_clinicas);
            }else{
                $renima->ea_manif_clinicas = '';
            }

            $renima->ea_clasificacion_kk = $request->ea_clasificacion_kk;
            $renima->ea_diagnostico = $request->ea_diagnostico;
            $renima->ea_diagnostico_st = $request->ea_diagnostico_st;
            $renima->ea_diagnostico_st_elevado = $request->ea_diagnostico_st_elevado;
            $renima->ea_heart_score = $request->ea_heart_score;
            $renima->ea_peso = $request->ea_peso;
            $renima->ea_talla = $request->ea_talla;
            $renima->ea_imc = $request->ea_imc;

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

            $renima->ecg_otro = $request->ecg_otro;

        //Datos del manejo de intervención en IAMCEST y SCASEST (dis_)
            $renima->dis_manejo = $request->dis_manejo;
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
            $renima->dis_otrastenosis_coronaria = $request->dis_otrastenosis_coronaria;
            $renima->dis_icp_otras_lesiones = $request->dis_icp_otras_lesiones;
            $renima->dis_decisio_basada = $request->dis_decisio_basada;
            $renima->dis_momento_icp_otras_lesiones = $request->dis_momento_icp_otras_lesiones;
            $renima->dis_cuan_dias_antes_despues_alta_icp = $request->dis_cuan_dias_antes_despues_alta_icp;
            $renima->dis_revascularizacion_completa = $request->dis_revascularizacion_completa;
            $renima->dis_reperfusion = $request->dis_reperfusion;
            $renima->dis_motivo_deno_reperfusion = $request->dis_motivo_deno_reperfusion;
            $renima->dis_motivo_deno_reperfusion_otro = $request->dis_motivo_deno_reperfusion_otro;
            $renima->dis_motivo_cabg = $request->dis_motivo_cabg;
            $renima->dis_motivo_cabg_otro = $request->dis_motivo_cabg_otro;
            $renima->dis_puntaje_grace = $request->dis_puntaje_grace;
            $renima->dis_puntaje_crussade = $request->dis_puntaje_crussade;

        //Datos de medicación farmacologíca (dmf_)
            $renima->dmf_aspirina = $request->dmf_aspirina;
            $renima->dmf_clopidogrel = $request->dmf_clopidogrel;
            $renima->dmf_enoxaparina = $request->dmf_enoxaparina;
            $renima->dmf_heparina_no_fraccionada = $request->dmf_heparina_no_fraccionada;
            $renima->dmf_atorvastatina = $request->dmf_atorvastatina;
            $renima->dmf_betabloqueadores = $request->dmf_betabloqueadores;
            $renima->dmf_diureticos_asa = $request->dmf_diureticos_asa;
            $renima->dmf_vasodilatadores = $request->dmf_vasodilatadores;
            $renima->dmf_vasopresores = $request->dmf_vasopresores;
            $renima->dmf_inotropicos = $request->dmf_inotropicos;
            $renima->dmf_ieca_ara = $request->dmf_ieca_ara;
            $renima->dmf_ventilacion_mecanica = $request->dmf_ventilacion_mecanica;
            $renima->dmf_dialisis = $request->dmf_dialisis;
            $renima->dmf_rehab_cardiaca = $request->dmf_rehab_cardiaca;
            $renima->dmf_antagonistas_mineraloc = $request->dmf_antagonistas_mineraloc;
            $renima->dmf_inhibidores_recep_p2y12 = $request->dmf_inhibidores_recep_p2y12;

        //Datos de laboratorio (dl_)
            $renima->dl_hemoglobina = $request->dl_hemoglobina;
            $renima->dl_leucocitos = $request->dl_leucocitos;
            $renima->dl_plaquetas = $request->dl_plaquetas;
            $renima->dl_creatinina = $request->dl_creatinina;
            $renima->dl_urea = $request->dl_urea;
            $renima->dl_glucosa = $request->dl_glucosa;
            $renima->dl_troponina_t = $request->dl_troponina_t;
            $renima->dl_troponina_i = $request->dl_troponina_i;
            $renima->dl_cpk_total = $request->dl_cpk_total;
            $renima->dl_cpk_mb = $request->dl_cpk_mb;
            $renima->dl_lactato = $request->dl_lactato;
            $renima->dl_fevi_ingreso = $request->dl_fevi_ingreso;
            $renima->dl_fevi_hospitalizacion = $request->dl_fevi_hospitalizacion;

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
            $renima->ti_ventilacion_mecanica = $request->ti_ventilacion_mecanica;
            $renima->ti_dialisis = $request->ti_dialisis;
            $renima->ti_rehabilitacion_cardiaca = $request->ti_rehabilitacion_cardiaca;
            $renima->ti_ventilacion_no_invasiva = $request->ti_ventilacion_no_invasiva;
            $renima->ti_balon_contrapulsacion_ia = $request->ti_balon_contrapulsacion_ia;
            $renima->ti_rehab_cardiaca_intrahosp = $request->ti_rehab_cardiaca_intrahosp;
            $renima->ti_levosimendan = $request->ti_levosimendan;
            $renima->ti_marcapaso = $request->ti_marcapaso;
            $renima->ti_ecmo = $request->ti_ecmo;

        //Analisis Auxiliares Intrahospitalarios (aai_)
            $renima->aai_hemoglobina = $request->aai_hemoglobina;
            $renima->aai_leucocitos = $request->aai_leucocitos;
            $renima->aai_plaquetas = $request->aai_plaquetas;
            $renima->aai_creatinina = $request->aai_creatinina;
            $renima->aai_urea = $request->aai_urea;
            $renima->aai_glucosa = $request->aai_glucosa;
            $renima->aai_troponina_iot_primer = $request->aai_troponina_iot_primer;
            $renima->aai_troponina_iot_segundo = $request->aai_troponina_iot_segundo;
            $renima->aai_cpk_total = $request->aai_cpk_total;
            $renima->aai_cpk_mb = $request->aai_cpk_mb;
            $renima->aai_lactato = $request->aai_lactato;
            $renima->aai_fevi = $request->aai_fevi;
            $renima->aai_fecha_pm_fevi = $request->aai_fecha_pm_fevi;
            $renima->aai_horas_troponina = $request->aai_horas_troponina;
            $renima->aai_hemoglobina_glicosilada = $request->aai_hemoglobina_glicosilada;

        //Medicación al Alta (ma_)
            $renima->ma_aspirina = $request->ma_aspirina;
            $renima->ma_ip2y12 = $request->ma_ip2y12;
            $renima->ma_estatinas = $request->ma_estatinas;
            $renima->ma_betabloqueadores = $request->ma_betabloqueadores;
            $renima->ma_diureticos_asa = $request->ma_diureticos_asa;
            $renima->ma_antagonistas_mineralocorticoide = $request->ma_antagonistas_mineralocorticoide;
            $renima->ma_ieca_ara = $request->ma_ieca_ara;
            $renima->ma_inhibidores_p2y12 = $request->ma_inhibidores_p2y12;
            $renima->ma_nitratos = $request->ma_nitratos;
            $renima->ma_anticoagulacion = $request->ma_anticoagulacion;

        //Datos de pronóstico (dp_)
            $renima->dp_muerte_hospitalaria = $request->dp_muerte_hospitalaria;
            $renima->dp_fecha_muerte_hospitalaria = $request->dp_fecha_muerte_hospitalaria;
            $renima->dp_muerte_cardiovascular_alta = $request->dp_muerte_cardiovascular_alta;
            $renima->dp_fecha_muerte_cardiovascular_alta = $request->dp_fecha_muerte_cardiovascular_alta;
            $renima->dp_muerte_no_cardiovascular_alta = $request->dp_muerte_no_cardiovascular_alta;
            $renima->dp_fecha_muerte_no_cardiovascular_alta = $request->dp_fecha_muerte_no_cardiovascular_alta;
            $renima->dp_angina_postinfarto = $request->dp_angina_postinfarto;
            $renima->dp_fecha_angina_postinfarto = $request->dp_fecha_angina_postinfarto;
            $renima->dp_reinfarto = $request->dp_reinfarto;
            $renima->dp_fecha_reinfarto = $request->dp_fecha_reinfarto;
            $renima->dp_acv_alta = $request->dp_acv_alta;
            $renima->dp_fecha_acv_alta = $request->dp_fecha_acv_alta;
            $renima->dp_trombosis_stent_alta = $request->dp_trombosis_stent_alta;
            $renima->dp_fecha_trombosis_stent_alta = $request->dp_fecha_trombosis_stent_alta;
            $renima->dp_rehospitalizacion_falla_cardiaca = $request->dp_rehospitalizacion_falla_cardiaca;
            $renima->dp_fecha_rehospitalizacion_falla_cardiaca = $request->dp_fecha_rehospitalizacion_falla_cardiaca;
            $renima->dp_sangrado = $request->dp_sangrado;
            $renima->dp_sangrado_segun_barc = $request->dp_sangrado_segun_barc;
            $renima->dp_fecha_sangrado = $request->dp_fecha_sangrado;
            $renima->dp_rehabilitacion_cardiaca_alta = $request->dp_rehabilitacion_cardiaca_alta;
            $renima->dp_segunda_medicion_fevi_alta = $request->dp_segunda_medicion_fevi_alta;
            $renima->dp_fecha_segunda_fevi_alta = $request->dp_fecha_segunda_fevi_alta;
            $renima->dp_fecha_de_alta = $request->dp_fecha_de_alta;
            $renima->dp_dias_hospitalizacion = $request->dp_dias_hospitalizacion;

        // Seguimiento Clínico (sc_)
            $renima->sc_muerte_hospitalaria = $request->sc_muerte_hospitalaria;
            $renima->sc_fecha_muerte_hospitalaria = $request->sc_fecha_muerte_hospitalaria;
            $renima->sc_muerte_cardiovascular_alta = $request->sc_muerte_cardiovascular_alta;
            $renima->sc_fecha_muerte_cardiovascular_alta = $request->sc_fecha_muerte_cardiovascular_alta;
            $renima->sc_muerte_no_cardiovascular_alta = $request->sc_muerte_no_cardiovascular_alta;
            $renima->sc_fecha_muerte_no_cardiovascular_alta = $request->sc_fecha_muerte_no_cardiovascular_alta;
            $renima->sc_angina_postinfarto = $request->sc_angina_postinfarto;
            $renima->sc_fecha_angina_postinfarto = $request->sc_fecha_angina_postinfarto;
            $renima->sc_reinfarto = $request->sc_reinfarto;
            $renima->sc_fecha_reinfarto = $request->sc_fecha_reinfarto;
            $renima->sc_acv = $request->sc_acv;
            $renima->sc_fecha_acv = $request->sc_fecha_acv;
            $renima->sc_shock_cardiogenico = $request->sc_shock_cardiogenico;
            $renima->sc_fecha_shock_cardiogenico = $request->sc_fecha_shock_cardiogenico;
            $renima->sc_paro_cardiorespiratorio_recuperado = $request->sc_paro_cardiorespiratorio_recuperado;
            $renima->sc_fecha_paro_cardiorespiratorio_recuperado = $request->sc_fecha_paro_cardiorespiratorio_recuperado;
            $renima->sc_ruptura_musculo_papilar = $request->sc_ruptura_musculo_papilar;
            $renima->sc_fecha_ruptura_musculo_papilar = $request->sc_fecha_ruptura_musculo_papilar;
            $renima->sc_comunicacion_interventricular = $request->sc_comunicacion_interventricular;
            $renima->sc_fecha_comunicacion_interventricular = $request->sc_fecha_comunicacion_interventricular;
            $renima->sc_ruptura_pared_libre = $request->sc_ruptura_pared_libre;
            $renima->sc_fecha_ruptura_pared_libre = $request->sc_fecha_ruptura_pared_libre;
            $renima->sc_trombosis_stent = $request->sc_trombosis_stent;
            $renima->sc_fecha_trombosis_stent = $request->sc_fecha_trombosis_stent;
            $renima->sc_rehospitalizacion_falla_cardiaca = $request->sc_rehospitalizacion_falla_cardiaca;
            $renima->sc_fecha_rehospitalizacion_falla_cardiaca = $request->sc_fecha_rehospitalizacion_falla_cardiaca;
            $renima->sc_sangrado = $request->sc_sangrado;

            $sc_complicaciones_mecanicas = $request->sc_complicaciones_mecanicas;
            if(!empty($sc_complicaciones_mecanicas)){
                $renima->sc_complicaciones_mecanicas = implode(',', $sc_complicaciones_mecanicas);
            }else{
                $renima->sc_complicaciones_mecanicas = '';
            }

            $renima->sc_sangrado_segun_barc = $request->sc_sangrado_segun_barc;
            $renima->sc_sangrado_barc_tipo = $request->sc_sangrado_barc_tipo;
            $renima->sc_fecha_sangrado = $request->sc_fecha_sangrado;
            $renima->sc_prc = $request->sc_prc;
            $renima->sc_segunda_medicion_fevi_alta = $request->sc_segunda_medicion_fevi_alta;
            $renima->sc_fecha_segunda_fevi_alta = $request->sc_fecha_segunda_fevi_alta;




        $renima->status = 'Activo';
        $renima->save();


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
