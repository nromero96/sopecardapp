<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PulmonaryHypertension;

class PulmonaryHypertensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'category_name' => 'pulmonary_hypertension',
            'page_name' => 'pulmonary_hypertension_index',
        ];

        //if auth user is admin, show all pulmonary_hypertensions
        if (\Auth::user()->hasRole('admin')) {
            //join users table to get user (trato, name, lastname) as responsable
            $pulmonaryhypertensions = PulmonaryHypertension::join('users', 'pulmonary_hypertensions.user_id', '=', 'users.id')
                ->select('pulmonary_hypertensions.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('pulmonary_hypertensions.status', 'Activo')
                ->get();
        } else {
            //join users table to get user (trato, name, lastname) as responsable
            $pulmonaryhypertensions = PulmonaryHypertension::join('users', 'pulmonary_hypertensions.user_id', '=', 'users.id')
                ->select('pulmonary_hypertensions.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('pulmonary_hypertensions.user_id', auth()->user()->id)
                ->where('pulmonary_hypertensions.status', 'Activo')
                ->get();
        }

        return view('pages.pulmonary_hypertension.index')->with($data)->with('pulmonaryhypertensions', $pulmonaryhypertensions);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'pulmonary_hypertension',
            'page_name' => 'pulmonary_hypertension_create',
        ];

        return view('pages.pulmonary_hypertension.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $phn = new PulmonaryHypertension();
            $phn->user_id = auth()->user()->id;
            $phn->centro_atencion = $request->centro_atencion;

            //Datos Epidemiológicos
            $phn->de_nombre = $request->de_nombre;
            $phn->de_edad = $request->de_edad;
            $phn->de_procedencia = $request->de_procedencia;
            $phn->de_residencia = $request->de_residencia;
            $phn->de_altura_ciudad = $request->de_altura_ciudad;
            $phn->de_estratificacion_altura = $request->de_estratificacion_altura;
            $phn->de_tiempo_residencia = $request->de_tiempo_residencia;
            $phn->de_modalidad_ingreso = $request->de_modalidad_ingreso;
            $phn->de_intervencion = $request->de_intervencion;
            $phn->de_gestante = $request->de_gestante;
            $phn->de_estado_civil = $request->de_estado_civil;
            $phn->de_grado_instruccion = $request->de_grado_instruccion;

            //Antecedentes
            $phn->at_tipo_paciente_hp = $request->at_tipo_paciente_hp;
            $phn->at_tiempo_sint_diagnostico = $request->at_tiempo_sint_diagnostico;
            $phn->at_hipertension_ap = $request->at_hipertension_ap;
            $phn->at_etiologia_hp = $request->at_etiologia_hp;
            $phn->at_etiologia_hp_otra = $request->at_etiologia_hp_otra;
            $phn->at_diagnostico_gestacion = $request->at_diagnostico_gestacion;
            $phn->at_disnea = $request->at_disnea;
            $phn->at_sincope = $request->at_sincope;
            $phn->at_angina = $request->at_angina;

            $at_antecedentes = $request->at_antecedentes;
            if(!empty($at_antecedentes)){
                $phn->at_antecedentes = implode(",", $at_antecedentes);
            }else{
                $phn->at_antecedentes = '';
            }

            $phn->at_otro_antecedentes = $request->at_otro_antecedentes;
            $phn->at_vacunacion = $request->at_vacunacion;
            $phn->at_anticoncepcion = $request->at_anticoncepcion;

            //Examen físico
            $phn->ef_pas = $request->ef_pas;
            $phn->ef_pad = $request->ef_pad;
            $phn->ef_fc = $request->ef_fc;
            $phn->ef_peso = $request->ef_peso;
            $phn->ef_talla = $request->ef_talla;
            $phn->ef_imc = $request->ef_imc;
            $phn->ef_sato2 = $request->ef_sato2;
            $phn->ef_ingurgitacion_yugular = $request->ef_ingurgitacion_yugular;
            $phn->ef_reflujo_hepatoyugular = $request->ef_reflujo_hepatoyugular;
            $phn->ef_edema_miembros_inferiores = $request->ef_edema_miembros_inferiores;
            $phn->ef_hepatomegalia = $request->ef_hepatomegalia;
            $phn->ef_ascitis = $request->ef_ascitis;
            $phn->ef_fenomeno_raynaud = $request->ef_fenomeno_raynaud;
            $phn->ef_ulceras_digitales = $request->ef_ulceras_digitales;
            $phn->ef_esclerodactilia = $request->ef_esclerodactilia;
            $phn->ef_calcinosis = $request->ef_calcinosis;
            $phn->ef_telangiectasias = $request->ef_telangiectasias;
            $phn->ef_artritis_artralgia = $request->ef_artritis_artralgia;
            $phn->ef_miositis = $request->ef_miositis;
            $phn->ef_iase = $request->ef_iase;


            //Ecocardiograma
            $phn->ec_fe = $request->ec_fe;
            $phn->ec_area_ad = $request->ec_area_ad;
            $phn->ec_diametro_vd = $request->ec_diametro_vd;
            $phn->ec_tapse = $request->ec_tapse;
            $phn->ec_fa_vd = $request->ec_fa_vd;
            $phn->ec_onda_s = $request->ec_onda_s;
            $phn->ec_ie = $request->ec_ie;
            $phn->ec_vrt = $request->ec_vrt;
            $phn->ec_diametro_vci = $request->ec_diametro_vci;
            $phn->ec_colapso_vci = $request->ec_colapso_vci;
            $phn->ec_diametro_vci_20 = $request->ec_diametro_vci_20;
            $phn->ec_colapso_vci_50 = $request->ec_colapso_vci_50;
            $phn->ec_pad = $request->ec_pad;
            $phn->ec_psap = $request->ec_psap;
            $phn->ec_derrame_pericardico = $request->ec_derrame_pericardico;

            //Laboratorio
            $phn->lb_pro_bnp = $request->lb_pro_bnp;
            $phn->lb_troponinas = $request->lb_troponinas;
            $phn->lb_hemoglobina = $request->lb_hemoglobina;
            $phn->lb_leucocitos = $request->lb_leucocitos;
            $phn->lb_plaquetas = $request->lb_plaquetas;
            $phn->lb_creatinina = $request->lb_creatinina;
            $phn->lb_urea = $request->lb_urea;
            $phn->lb_albunina = $request->lb_albunina;
            $phn->lb_tgo = $request->lb_tgo;
            $phn->lb_tgp = $request->lb_tgp;
            $phn->lb_bilirrubinas_totales = $request->lb_bilirrubinas_totales;
            $phn->lb_bilirrubina_directa = $request->lb_bilirrubina_directa;
            $phn->lb_fosfatasa_alcalina = $request->lb_fosfatasa_alcalina;
            $phn->lb_tsh = $request->lb_tsh;
            $phn->lb_ferritina = $request->lb_ferritina;
            $phn->lb_saturacion_transferrina = $request->lb_saturacion_transferrina;
            $phn->lb_acido_urico = $request->lb_acido_urico;
            $phn->lb_sodio = $request->lb_sodio;

            //Laboratorio para HAP asociada a Tejido Conectivo
            $phn->lhtc_ana = $request->lhtc_ana;
            $phn->lhtc_patron_ana = $request->lhtc_patron_ana;
            $phn->lhtc_anticentromero = $request->lhtc_anticentromero;
            $phn->lhtc_anti_scl70 = $request->lhtc_anti_scl70;
            $phn->lhtc_anti_dna = $request->lhtc_anti_dna;
            $phn->lhtc_anti_rnp = $request->lhtc_anti_rnp;
            $phn->lhtc_anti_ro = $request->lhtc_anti_ro;
            $phn->lhtc_anti_la = $request->lhtc_anti_la;
            $phn->lhtc_factor_reumatoideo = $request->lhtc_factor_reumatoideo;
            $phn->lhtc_anti_ccp = $request->lhtc_anti_ccp;
            $phn->lhtc_anti_jo = $request->lhtc_anti_jo;
            $phn->lhtc_anticuerpo_lupico = $request->lhtc_anticuerpo_lupico;
            $phn->lhtc_anticardiolipina_igg = $request->lhtc_anticardiolipina_igg;
            $phn->lhtc_anticardiolipina_igm = $request->lhtc_anticardiolipina_igm;
            $phn->lhtc_anti_beta_2_glicoproteina_igg = $request->lhtc_anti_beta_2_glicoproteina_igg;
            $phn->lhtc_anti_beta_2_glicoproteina_igm = $request->lhtc_anti_beta_2_glicoproteina_igm;
            
            //Electrocardiograma
            $phn->ecg_ritmo = $request->ecg_ritmo;
            $phn->ecg_fibrilacion_auricular = $request->ecg_fibrilacion_auricular;
            $phn->ecg_bloqueo_rama_izquierda = $request->ecg_bloqueo_rama_izquierda;
            $phn->ecg_bloqueo_rama_derecha = $request->ecg_bloqueo_rama_derecha;
            $phn->ecg_hipertrofia_ventricular_derecha = $request->ecg_hipertrofia_ventricular_derecha;
            $phn->ecg_frecuencia_cardiaca = $request->ecg_frecuencia_cardiaca;
            $phn->ecg_tc6m = $request->ecg_tc6m;
            $phn->ecg_se_detuvo = $request->ecg_se_detuvo;
            $phn->ecg_requirio_oxigeno = $request->ecg_requirio_oxigeno;
            $phn->ecg_distancia_recorrida = $request->ecg_distancia_recorrida;
            $phn->ecg_porcentaje_predicho = $request->ecg_porcentaje_predicho;
            $phn->ecg_escala_borg_disnea = $request->ecg_escala_borg_disnea;
            $phn->ecg_escala_borg_fatiga = $request->ecg_escala_borg_fatiga;
            $phn->ecg_saturacion_o2_inicial = $request->ecg_saturacion_o2_inicial;
            $phn->ecg_saturacion_o2_final = $request->ecg_saturacion_o2_final;
            $phn->ecg_frecuencia_cardiaca_inicial = $request->ecg_frecuencia_cardiaca_inicial;
            $phn->ecg_frecuencia_cardiaca_final = $request->ecg_frecuencia_cardiaca_final;
            $phn->ecg_frecuencia_cardiaca_primer_minuto = $request->ecg_frecuencia_cardiaca_primer_minuto;

            //Cateterismo cardiaco derecho
            $phn->ccd_indice_cardiaco_fick = $request->ccd_indice_cardiaco_fick;
            $phn->ccd_indice_cardiaco_termodilucion = $request->ccd_indice_cardiaco_termodilucion;
            $phn->ccd_frecuencia_cardiaca = $request->ccd_frecuencia_cardiaca;
            $phn->ccd_presion_auricula_derecha = $request->ccd_presion_auricula_derecha;
            $phn->ccd_presion_sistolica_arteria_pulmonar = $request->ccd_presion_sistolica_arteria_pulmonar;
            $phn->ccd_presion_diastolica_arteria_pulmonar = $request->ccd_presion_diastolica_arteria_pulmonar;
            $phn->ccd_presion_media_arterial_pulmonar = $request->ccd_presion_media_arterial_pulmonar;
            $phn->ccd_presion_capilar = $request->ccd_presion_capilar;
            $phn->ccd_gradiente_transpulmonar = $request->ccd_gradiente_transpulmonar;
            $phn->ccd_indice_cardiaco = $request->ccd_indice_cardiaco;
            $phn->ccd_saturacion_arteria_pulmonar = $request->ccd_saturacion_arteria_pulmonar;
            $phn->ccd_resistencia_vascular_pulmonar = $request->ccd_resistencia_vascular_pulmonar;
            $phn->ccd_resistencia_vascular_pulmonar_indexada = $request->ccd_resistencia_vascular_pulmonar_indexada;
            $phn->ccd_vasoreactividad = $request->ccd_vasoreactividad;
            $phn->ccd_droga_vasoreactividad = $request->ccd_droga_vasoreactividad;
            $phn->ccd_complicaciones = $request->ccd_complicaciones;
            $phn->ccd_complicaciones_detalle = $request->ccd_complicaciones_detalle;

            //Resonancia magnética (opcional) - ventrículo derecho y aurícula derecha
            $phn->rm_vd_masa = $request->rm_vd_masa;
            $phn->rm_vd_volumen_diastolico_final = $request->rm_vd_volumen_diastolico_final;
            $phn->rm_vd_volumen_sistolico_final = $request->rm_vd_volumen_sistolico_final;
            $phn->rm_vd_fraccion_eyeccion = $request->rm_vd_fraccion_eyeccion;
            $phn->rm_ad_area = $request->rm_ad_area;
            $phn->rm_vi_fraccion_eyeccion = $request->rm_vi_fraccion_eyeccion;

            //Tomografía axial computarizada de tórax
            $phn->tac_diametro_arteria_pulmonar = $request->tac_diametro_arteria_pulmonar;
            $phn->tac_relacion_diametro = $request->tac_relacion_diametro;
            $phn->tac_epid = $request->tac_epid;
            $phn->tac_epoc = $request->tac_epoc;
            $phn->tac_capilaroscopia = $request->tac_capilaroscopia;
            $phn->tac_patron_esclerodermico = $request->tac_patron_esclerodermico;
            $phn->tac_tipo = $request->tac_tipo;

            //Ergoespirometría y otras pruebas (opcional)
            $phn->ergo_tipo_prueba = $request->ergo_tipo_prueba;
            $phn->ergo_consumo_maximo_o2 = $request->ergo_consumo_maximo_o2;
            $phn->ergo_vef1 = $request->ergo_vef1;
            $phn->ergo_cvf = $request->ergo_cvf;
            $phn->ergo_vef1_cvf = $request->ergo_vef1_cvf;
            $phn->ergo_dlco_corregida = $request->ergo_dlco_corregida;
            $phn->ergo_tlc = $request->ergo_tlc;

            //Tratamiento
            $trmto_farmacologico = $request->trmto_farmacologico;
            if(!empty($trmto_farmacologico)){
                $phn->trmto_farmacologico = implode(",", $trmto_farmacologico);
            }else{
                $phn->trmto_farmacologico = '';
            }

            $phn->trmto_farmacologico_otro = $request->trmto_farmacologico_otro;
            $phn->trmto_psicoterapia = $request->trmto_psicoterapia;
            $phn->trmto_rehabilitacion = $request->trmto_rehabilitacion;
            $phn->trmto_oxigenoterapia = $request->trmto_oxigenoterapia;
            $phn->trmto_estrategia_inicial = $request->trmto_estrategia_inicial;
            $phn->trmto_intervencionista = $request->trmto_intervencionista;
            $phn->trmto_muerte_perioperatoria = $request->trmto_muerte_perioperatoria;
            $phn->trmto_muerte_dias_postrasplante = $request->trmto_muerte_dias_postrasplante;
            $phn->trmto_muerte_dias_postrasplante_dias = $request->trmto_muerte_dias_postrasplante_dias;
            $phn->trmto_muerte_tardia = $request->trmto_muerte_tardia;
            $phn->trmto_muerte_tardia_dias = $request->trmto_muerte_tardia_dias;
            $phn->trmto_ecmo = $request->trmto_ecmo;
            $phn->trmto_rechazo_agudo = $request->trmto_rechazo_agudo;
            $phn->trmto_rechazo_cronico = $request->trmto_rechazo_cronico;
            $phn->trmto_fecha_terapia_intervencionista = $request->trmto_fecha_terapia_intervencionista;
            $phn->trmto_angioplastia_pulmonar = $request->trmto_angioplastia_pulmonar;
            $phn->trmto_fecha_angioplastia = $request->trmto_fecha_angioplastia;
            $phn->trmto_cantidad_sesiones = $request->trmto_cantidad_sesiones;
            $phn->trmto_cantidad_vasos = $request->trmto_cantidad_vasos;
            $phn->trmto_complicaciones = $request->trmto_complicaciones;
            $phn->trmto_complicaciones_descripcion = $request->trmto_complicaciones_descripcion;
            $phn->trmto_muerte_periprocedimiento = $request->trmto_muerte_periprocedimiento;
            $phn->trmto_tromboendarterectomia = $request->trmto_tromboendarterectomia;
            $phn->trmto_fecha_endarterectomia = $request->trmto_fecha_endarterectomia;
            $phn->trmto_complicaciones_tromboendarterectomia = $request->trmto_complicaciones_tromboendarterectomia;
            $phn->trmto_complicaciones_tromboendarterectomia_describir = $request->trmto_complicaciones_tromboendarterectomia_describir;
            $phn->trmto_hipertension_pulmonar_residual = $request->trmto_hipertension_pulmonar_residual;
            $phn->trmto_ecmo_perioperatorio = $request->trmto_ecmo_perioperatorio;
            $phn->trmto_estratificacion_riesgo_basal = $request->trmto_estratificacion_riesgo_basal;
            $phn->trmto_guia_europea = $request->trmto_guia_europea;
            $phn->trmto_reveal_lite = $request->trmto_reveal_lite;
            $phn->trmto_estratificacion_riesgo_3meses = $request->trmto_estratificacion_riesgo_3meses;
            $phn->trmto_estratificacion_riesgo_6meses = $request->trmto_estratificacion_riesgo_6meses;
            $phn->trmto_estratificacion_riesgo_12meses = $request->trmto_estratificacion_riesgo_12meses;
            $phn->trmto_estratificacion_riesgo_18meses = $request->trmto_estratificacion_riesgo_18meses;
            $phn->trmto_estratificacion_riesgo_24meses = $request->trmto_estratificacion_riesgo_24meses;
            $phn->trmto_estratificacion_riesgo_30meses = $request->trmto_estratificacion_riesgo_30meses;
            $phn->trmto_estratificacion_riesgo_36meses = $request->trmto_estratificacion_riesgo_36meses;

            //Eventos de interés
            $ei_morbilidad_hipertension_pulmonar = $request->ei_morbilidad_hipertension_pulmonar;
            if(!empty($ei_morbilidad_hipertension_pulmonar)){
                $phn->ei_morbilidad_hipertension_pulmonar = implode(",", $ei_morbilidad_hipertension_pulmonar);
            }else{
                $phn->ei_morbilidad_hipertension_pulmonar = '';
            }

            $phn->ei_fecha_morbilidad = $request->ei_fecha_morbilidad;
            $phn->ei_mortalidad_global = $request->ei_mortalidad_global;
            $phn->ei_fecha_mortalidad = $request->ei_fecha_mortalidad;
            $phn->ei_remodelado_reverso_ventriculo_derecho = $request->ei_remodelado_reverso_ventriculo_derecho;
            $phn->ei_fecha_remodelado = $request->ei_fecha_remodelado;

            $phn->status = 'Activo';
            $phn->save();

            return redirect()->route('pulmonary-hypertension.index')->with('success', 'Registro creado satisfactoriamente');


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
        $data = [
            'category_name' => 'pulmonary_hypertension',
            'page_name' => 'pulmonary_hypertension_edit',
        ];

        $ph = PulmonaryHypertension::find($id);

        return view('pages.pulmonary_hypertension.edit')->with($data)->with('ph', $ph);
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
        $phn = PulmonaryHypertension::find($id);

        $phn->centro_atencion = $request->centro_atencion;

        //Datos Epidemiológicos
        $phn->de_nombre = $request->de_nombre;
        $phn->de_edad = $request->de_edad;
        $phn->de_procedencia = $request->de_procedencia;
        $phn->de_residencia = $request->de_residencia;
        $phn->de_altura_ciudad = $request->de_altura_ciudad;
        $phn->de_estratificacion_altura = $request->de_estratificacion_altura;
        $phn->de_tiempo_residencia = $request->de_tiempo_residencia;
        $phn->de_modalidad_ingreso = $request->de_modalidad_ingreso;
        $phn->de_intervencion = $request->de_intervencion;
        $phn->de_gestante = $request->de_gestante;
        $phn->de_estado_civil = $request->de_estado_civil;
        $phn->de_grado_instruccion = $request->de_grado_instruccion;

        //Antecedentes
        $phn->at_tipo_paciente_hp = $request->at_tipo_paciente_hp;
        $phn->at_tiempo_sint_diagnostico = $request->at_tiempo_sint_diagnostico;
        $phn->at_hipertension_ap = $request->at_hipertension_ap;
        $phn->at_etiologia_hp = $request->at_etiologia_hp;
        $phn->at_etiologia_hp_otra = $request->at_etiologia_hp_otra;
        $phn->at_diagnostico_gestacion = $request->at_diagnostico_gestacion;
        $phn->at_disnea = $request->at_disnea;
        $phn->at_sincope = $request->at_sincope;
        $phn->at_angina = $request->at_angina;

        $at_antecedentes = $request->at_antecedentes;
        if(!empty($at_antecedentes)){
            $phn->at_antecedentes = implode(",", $at_antecedentes);
        }else{
            $phn->at_antecedentes = '';
        }

        $phn->at_otro_antecedentes = $request->at_otro_antecedentes;
        $phn->at_vacunacion = $request->at_vacunacion;
        $phn->at_anticoncepcion = $request->at_anticoncepcion;

        //Examen físico
        $phn->ef_pas = $request->ef_pas;
        $phn->ef_pad = $request->ef_pad;
        $phn->ef_fc = $request->ef_fc;
        $phn->ef_peso = $request->ef_peso;
        $phn->ef_talla = $request->ef_talla;
        $phn->ef_imc = $request->ef_imc;
        $phn->ef_sato2 = $request->ef_sato2;
        $phn->ef_ingurgitacion_yugular = $request->ef_ingurgitacion_yugular;
        $phn->ef_reflujo_hepatoyugular = $request->ef_reflujo_hepatoyugular;
        $phn->ef_edema_miembros_inferiores = $request->ef_edema_miembros_inferiores;
        $phn->ef_hepatomegalia = $request->ef_hepatomegalia;
        $phn->ef_ascitis = $request->ef_ascitis;
        $phn->ef_fenomeno_raynaud = $request->ef_fenomeno_raynaud;
        $phn->ef_ulceras_digitales = $request->ef_ulceras_digitales;
        $phn->ef_esclerodactilia = $request->ef_esclerodactilia;
        $phn->ef_calcinosis = $request->ef_calcinosis;
        $phn->ef_telangiectasias = $request->ef_telangiectasias;
        $phn->ef_artritis_artralgia = $request->ef_artritis_artralgia;
        $phn->ef_miositis = $request->ef_miositis;
        $phn->ef_iase = $request->ef_iase;


        //Ecocardiograma
        $phn->ec_fe = $request->ec_fe;
        $phn->ec_area_ad = $request->ec_area_ad;
        $phn->ec_diametro_vd = $request->ec_diametro_vd;
        $phn->ec_tapse = $request->ec_tapse;
        $phn->ec_fa_vd = $request->ec_fa_vd;
        $phn->ec_onda_s = $request->ec_onda_s;
        $phn->ec_ie = $request->ec_ie;
        $phn->ec_vrt = $request->ec_vrt;
        $phn->ec_diametro_vci = $request->ec_diametro_vci;
        $phn->ec_colapso_vci = $request->ec_colapso_vci;
        $phn->ec_diametro_vci_20 = $request->ec_diametro_vci_20;
        $phn->ec_colapso_vci_50 = $request->ec_colapso_vci_50;
        $phn->ec_pad = $request->ec_pad;
        $phn->ec_psap = $request->ec_psap;
        $phn->ec_derrame_pericardico = $request->ec_derrame_pericardico;

        //Laboratorio
        $phn->lb_pro_bnp = $request->lb_pro_bnp;
        $phn->lb_troponinas = $request->lb_troponinas;
        $phn->lb_hemoglobina = $request->lb_hemoglobina;
        $phn->lb_leucocitos = $request->lb_leucocitos;
        $phn->lb_plaquetas = $request->lb_plaquetas;
        $phn->lb_creatinina = $request->lb_creatinina;
        $phn->lb_urea = $request->lb_urea;
        $phn->lb_albunina = $request->lb_albunina;
        $phn->lb_tgo = $request->lb_tgo;
        $phn->lb_tgp = $request->lb_tgp;
        $phn->lb_bilirrubinas_totales = $request->lb_bilirrubinas_totales;
        $phn->lb_bilirrubina_directa = $request->lb_bilirrubina_directa;
        $phn->lb_fosfatasa_alcalina = $request->lb_fosfatasa_alcalina;
        $phn->lb_tsh = $request->lb_tsh;
        $phn->lb_ferritina = $request->lb_ferritina;
        $phn->lb_saturacion_transferrina = $request->lb_saturacion_transferrina;
        $phn->lb_acido_urico = $request->lb_acido_urico;
        $phn->lb_sodio = $request->lb_sodio;

        //Laboratorio para HAP asociada a Tejido Conectivo
        $phn->lhtc_ana = $request->lhtc_ana;
        $phn->lhtc_patron_ana = $request->lhtc_patron_ana;
        $phn->lhtc_anticentromero = $request->lhtc_anticentromero;
        $phn->lhtc_anti_scl70 = $request->lhtc_anti_scl70;
        $phn->lhtc_anti_dna = $request->lhtc_anti_dna;
        $phn->lhtc_anti_rnp = $request->lhtc_anti_rnp;
        $phn->lhtc_anti_ro = $request->lhtc_anti_ro;
        $phn->lhtc_anti_la = $request->lhtc_anti_la;
        $phn->lhtc_factor_reumatoideo = $request->lhtc_factor_reumatoideo;
        $phn->lhtc_anti_ccp = $request->lhtc_anti_ccp;
        $phn->lhtc_anti_jo = $request->lhtc_anti_jo;
        $phn->lhtc_anticuerpo_lupico = $request->lhtc_anticuerpo_lupico;
        $phn->lhtc_anticardiolipina_igg = $request->lhtc_anticardiolipina_igg;
        $phn->lhtc_anticardiolipina_igm = $request->lhtc_anticardiolipina_igm;
        $phn->lhtc_anti_beta_2_glicoproteina_igg = $request->lhtc_anti_beta_2_glicoproteina_igg;
        $phn->lhtc_anti_beta_2_glicoproteina_igm = $request->lhtc_anti_beta_2_glicoproteina_igm;
        
        //Electrocardiograma
        $phn->ecg_ritmo = $request->ecg_ritmo;
        $phn->ecg_fibrilacion_auricular = $request->ecg_fibrilacion_auricular;
        $phn->ecg_bloqueo_rama_izquierda = $request->ecg_bloqueo_rama_izquierda;
        $phn->ecg_bloqueo_rama_derecha = $request->ecg_bloqueo_rama_derecha;
        $phn->ecg_hipertrofia_ventricular_derecha = $request->ecg_hipertrofia_ventricular_derecha;
        $phn->ecg_frecuencia_cardiaca = $request->ecg_frecuencia_cardiaca;
        $phn->ecg_tc6m = $request->ecg_tc6m;
        $phn->ecg_se_detuvo = $request->ecg_se_detuvo;
        $phn->ecg_requirio_oxigeno = $request->ecg_requirio_oxigeno;
        $phn->ecg_distancia_recorrida = $request->ecg_distancia_recorrida;
        $phn->ecg_porcentaje_predicho = $request->ecg_porcentaje_predicho;
        $phn->ecg_escala_borg_disnea = $request->ecg_escala_borg_disnea;
        $phn->ecg_escala_borg_fatiga = $request->ecg_escala_borg_fatiga;
        $phn->ecg_saturacion_o2_inicial = $request->ecg_saturacion_o2_inicial;
        $phn->ecg_saturacion_o2_final = $request->ecg_saturacion_o2_final;
        $phn->ecg_frecuencia_cardiaca_inicial = $request->ecg_frecuencia_cardiaca_inicial;
        $phn->ecg_frecuencia_cardiaca_final = $request->ecg_frecuencia_cardiaca_final;
        $phn->ecg_frecuencia_cardiaca_primer_minuto = $request->ecg_frecuencia_cardiaca_primer_minuto;

        //Cateterismo cardiaco derecho
        $phn->ccd_indice_cardiaco_fick = $request->ccd_indice_cardiaco_fick;
        $phn->ccd_indice_cardiaco_termodilucion = $request->ccd_indice_cardiaco_termodilucion;
        $phn->ccd_frecuencia_cardiaca = $request->ccd_frecuencia_cardiaca;
        $phn->ccd_presion_auricula_derecha = $request->ccd_presion_auricula_derecha;
        $phn->ccd_presion_sistolica_arteria_pulmonar = $request->ccd_presion_sistolica_arteria_pulmonar;
        $phn->ccd_presion_diastolica_arteria_pulmonar = $request->ccd_presion_diastolica_arteria_pulmonar;
        $phn->ccd_presion_media_arterial_pulmonar = $request->ccd_presion_media_arterial_pulmonar;
        $phn->ccd_presion_capilar = $request->ccd_presion_capilar;
        $phn->ccd_gradiente_transpulmonar = $request->ccd_gradiente_transpulmonar;
        $phn->ccd_indice_cardiaco = $request->ccd_indice_cardiaco;
        $phn->ccd_saturacion_arteria_pulmonar = $request->ccd_saturacion_arteria_pulmonar;
        $phn->ccd_resistencia_vascular_pulmonar = $request->ccd_resistencia_vascular_pulmonar;
        $phn->ccd_resistencia_vascular_pulmonar_indexada = $request->ccd_resistencia_vascular_pulmonar_indexada;
        $phn->ccd_vasoreactividad = $request->ccd_vasoreactividad;
        $phn->ccd_droga_vasoreactividad = $request->ccd_droga_vasoreactividad;
        $phn->ccd_complicaciones = $request->ccd_complicaciones;
        $phn->ccd_complicaciones_detalle = $request->ccd_complicaciones_detalle;

        //Resonancia magnética (opcional) - ventrículo derecho y aurícula derecha
        $phn->rm_vd_masa = $request->rm_vd_masa;
        $phn->rm_vd_volumen_diastolico_final = $request->rm_vd_volumen_diastolico_final;
        $phn->rm_vd_volumen_sistolico_final = $request->rm_vd_volumen_sistolico_final;
        $phn->rm_vd_fraccion_eyeccion = $request->rm_vd_fraccion_eyeccion;
        $phn->rm_ad_area = $request->rm_ad_area;
        $phn->rm_vi_fraccion_eyeccion = $request->rm_vi_fraccion_eyeccion;

        //Tomografía axial computarizada de tórax
        $phn->tac_diametro_arteria_pulmonar = $request->tac_diametro_arteria_pulmonar;
        $phn->tac_relacion_diametro = $request->tac_relacion_diametro;
        $phn->tac_epid = $request->tac_epid;
        $phn->tac_epoc = $request->tac_epoc;
        $phn->tac_capilaroscopia = $request->tac_capilaroscopia;
        $phn->tac_patron_esclerodermico = $request->tac_patron_esclerodermico;
        $phn->tac_tipo = $request->tac_tipo;

        //Ergoespirometría y otras pruebas (opcional)
        $phn->ergo_tipo_prueba = $request->ergo_tipo_prueba;
        $phn->ergo_consumo_maximo_o2 = $request->ergo_consumo_maximo_o2;
        $phn->ergo_vef1 = $request->ergo_vef1;
        $phn->ergo_cvf = $request->ergo_cvf;
        $phn->ergo_vef1_cvf = $request->ergo_vef1_cvf;
        $phn->ergo_dlco_corregida = $request->ergo_dlco_corregida;
        $phn->ergo_tlc = $request->ergo_tlc;

        //Tratamiento
        $trmto_farmacologico = $request->trmto_farmacologico;
        if(!empty($trmto_farmacologico)){
            $phn->trmto_farmacologico = implode(",", $trmto_farmacologico);
        }else{
            $phn->trmto_farmacologico = '';
        }

        $phn->trmto_farmacologico_otro = $request->trmto_farmacologico_otro;
        $phn->trmto_psicoterapia = $request->trmto_psicoterapia;
        $phn->trmto_rehabilitacion = $request->trmto_rehabilitacion;
        $phn->trmto_oxigenoterapia = $request->trmto_oxigenoterapia;
        $phn->trmto_estrategia_inicial = $request->trmto_estrategia_inicial;
        $phn->trmto_intervencionista = $request->trmto_intervencionista;
        $phn->trmto_muerte_perioperatoria = $request->trmto_muerte_perioperatoria;
        $phn->trmto_muerte_dias_postrasplante = $request->trmto_muerte_dias_postrasplante;
        $phn->trmto_muerte_dias_postrasplante_dias = $request->trmto_muerte_dias_postrasplante_dias;
        $phn->trmto_muerte_tardia = $request->trmto_muerte_tardia;
        $phn->trmto_muerte_tardia_dias = $request->trmto_muerte_tardia_dias;
        $phn->trmto_ecmo = $request->trmto_ecmo;
        $phn->trmto_rechazo_agudo = $request->trmto_rechazo_agudo;
        $phn->trmto_rechazo_cronico = $request->trmto_rechazo_cronico;
        $phn->trmto_fecha_terapia_intervencionista = $request->trmto_fecha_terapia_intervencionista;
        $phn->trmto_angioplastia_pulmonar = $request->trmto_angioplastia_pulmonar;
        $phn->trmto_fecha_angioplastia = $request->trmto_fecha_angioplastia;
        $phn->trmto_cantidad_sesiones = $request->trmto_cantidad_sesiones;
        $phn->trmto_cantidad_vasos = $request->trmto_cantidad_vasos;
        $phn->trmto_complicaciones = $request->trmto_complicaciones;
        $phn->trmto_complicaciones_descripcion = $request->trmto_complicaciones_descripcion;
        $phn->trmto_muerte_periprocedimiento = $request->trmto_muerte_periprocedimiento;
        $phn->trmto_tromboendarterectomia = $request->trmto_tromboendarterectomia;
        $phn->trmto_fecha_endarterectomia = $request->trmto_fecha_endarterectomia;
        $phn->trmto_complicaciones_tromboendarterectomia = $request->trmto_complicaciones_tromboendarterectomia;
        $phn->trmto_complicaciones_tromboendarterectomia_describir = $request->trmto_complicaciones_tromboendarterectomia_describir;
        $phn->trmto_hipertension_pulmonar_residual = $request->trmto_hipertension_pulmonar_residual;
        $phn->trmto_ecmo_perioperatorio = $request->trmto_ecmo_perioperatorio;
        $phn->trmto_estratificacion_riesgo_basal = $request->trmto_estratificacion_riesgo_basal;
        $phn->trmto_guia_europea = $request->trmto_guia_europea;
        $phn->trmto_reveal_lite = $request->trmto_reveal_lite;
        $phn->trmto_estratificacion_riesgo_3meses = $request->trmto_estratificacion_riesgo_3meses;
        $phn->trmto_estratificacion_riesgo_6meses = $request->trmto_estratificacion_riesgo_6meses;
        $phn->trmto_estratificacion_riesgo_12meses = $request->trmto_estratificacion_riesgo_12meses;
        $phn->trmto_estratificacion_riesgo_18meses = $request->trmto_estratificacion_riesgo_18meses;
        $phn->trmto_estratificacion_riesgo_24meses = $request->trmto_estratificacion_riesgo_24meses;
        $phn->trmto_estratificacion_riesgo_30meses = $request->trmto_estratificacion_riesgo_30meses;
        $phn->trmto_estratificacion_riesgo_36meses = $request->trmto_estratificacion_riesgo_36meses;

        //Eventos de interés
        $ei_morbilidad_hipertension_pulmonar = $request->ei_morbilidad_hipertension_pulmonar;
        if(!empty($ei_morbilidad_hipertension_pulmonar)){
            $phn->ei_morbilidad_hipertension_pulmonar = implode(",", $ei_morbilidad_hipertension_pulmonar);
        }else{
            $phn->ei_morbilidad_hipertension_pulmonar = '';
        }

        $phn->ei_fecha_morbilidad = $request->ei_fecha_morbilidad;
        $phn->ei_mortalidad_global = $request->ei_mortalidad_global;
        $phn->ei_fecha_mortalidad = $request->ei_fecha_mortalidad;
        $phn->ei_remodelado_reverso_ventriculo_derecho = $request->ei_remodelado_reverso_ventriculo_derecho;
        $phn->ei_fecha_remodelado = $request->ei_fecha_remodelado;

        
        $phn->save();

        return redirect()->route('pulmonary-hypertension.index')->with('success', 'Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete in database
        $ph = PulmonaryHypertension::find($id);
        $ph->delete();
        return redirect()->route('pulmonary-hypertension.index')->with('success', 'Registro eliminado satisfactoriamente');

    }
}
