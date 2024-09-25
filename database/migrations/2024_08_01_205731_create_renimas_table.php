<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renimas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('centro_salud')->nullable();

            // Datos Epidemiológicos (de_)
                $table->string('de_documento_identidad')->nullable();
                $table->string('de_telefono',10)->nullable();
                $table->string('de_celular',10)->nullable();
                $table->string('de_celular_2',10)->nullable();
                $table->string('de_correo',100)->nullable();
                $table->string('de_departamento',100)->nullable();
                $table->string('de_provincia',100)->nullable();
                $table->string('de_distrito',100)->nullable();
                $table->integer('de_edad')->nullable();
                $table->date('de_nacimiento')->nullable();
                $table->string('de_sexo',10)->nullable();
                $table->string('de_estado_civil',15)->nullable();
                $table->string('de_tipo_seguro',50)->nullable();
                $table->string('de_tipo_seguro_otro',50)->nullable();
                $table->string('de_grado_instruccion',50)->nullable();

            //Datos Clínicos (dc_)
                $table->string('dc_pas',6)->nullable();
                $table->string('dc_pad',6)->nullable();
                $table->string('dc_frecuencia_cardiaca',6)->nullable();
                $table->string('dc_frecuencia_respiratoria',6)->nullable();
                $table->string('dc_temperatura',6)->nullable();
                $table->string('dc_saturacion_oxigeno',6)->nullable();
                $table->text('dc_antecedentes')->nullable(); //luego validar son multiple
                $table->string('dc_otro_antecedentes',150)->nullable();

            // Enfermedad actual (ea_)
                $table->date('ea_fecha_iniciosintomas')->nullable();
                $table->time('ea_hora_iniciosintomas')->nullable();
                $table->string('ea_cpcm',150)->nullable();
                $table->date('ea_cpcm_fecha_ingreso')->nullable();
                $table->time('ea_cpcm_hora_ingreso')->nullable();
                $table->date('ea_fecha_pcm')->nullable();
                $table->time('ea_hora_pcm')->nullable();
                $table->integer('ea_tiempo_ispc')->nullable();
                $table->date('ea_fecha_ecg')->nullable();
                $table->time('ea_hora_ecg')->nullable();
                $table->integer('ea_tpc_ecg')->nullable();
                $table->string('ea_tt_isquemia',6)->nullable();
                $table->string('ea_manif_clinicas')->nullable(); // Luego validar son multiples
                $table->string('ea_clasificacion_kk',6)->nullable();
                $table->string('ea_diagnostico',50)->nullable();
                $table->string('ea_diagnostico_st',50)->nullable();
                $table->string('ea_diagnostico_st_elevado',50)->nullable();
                $table->string('ea_heart_score',50)->nullable();
                $table->string('ea_peso',6)->nullable();
                $table->string('ea_talla',6)->nullable();
                $table->string('ea_imc',6)->nullable();

            //Electrocardiograma (ecg_)
                $table->string('ecg_ritmo',50)->nullable();
                $table->string('ecg_iamcest_localizacion')->nullable(); // Luego validar son multiples
                $table->string('ecg_scasest')->nullable(); // Luego validar son multiples
                $table->string('ecg_otro',100)->nullable();

            //Datos del manejo de intervención en IAMCEST y SCASEST (dis_)
                $table->string('dis_manejo',150)->nullable();
                $table->string('dis_tf',5)->nullable();
                $table->string('dis_lugar_tf',150)->nullable();
                $table->string('dis_lugar_tf_otro')->nullable();
                $table->date('dis_fecha_fibrinolisis')->nullable();
                $table->time('dis_hora_fibrinolisis')->nullable();
                $table->integer('dis_tiempo_ecg_fibrinolisis')->nullable();
                $table->string('dis_tipofibrinolisis')->nullable();
                $table->string('dis_tipofibrinolisis_otro',150)->nullable();
                $table->string('dis_fibrinolisis_exitosa',5)->nullable();
                $table->string('dis_angioplastia_rescate',5)->nullable();
                $table->string('dis_fibrinolisis_suspendida',5)->nullable();
                $table->string('dis_causa_suspension',150)->nullable();
                $table->string('dis_fuetransferido_icp',5)->nullable();
                $table->string('dis_lugar_transferencia_icp',150)->nullable();
                $table->string('dis_lugar_transferencia_icp_otro',150)->nullable();
                $table->date('dis_fecha_salida_antes_icp')->nullable();
                $table->time('dis_hora_salida_antes_icp')->nullable();
                $table->integer('dis_tiempo_doorin_doorout')->nullable();
                $table->date('dis_fecha_llegada_centro_icp')->nullable();
                $table->time('dis_hora_llegada_centro_icp')->nullable();
                $table->integer('dis_tiepo_transporte_icp')->nullable();
                $table->date('dis_fecha_inicio_icp')->nullable();
                $table->time('dis_hora_inicio_icp')->nullable();
                $table->string('dis_modo_transporte_icp',50)->nullable();
                $table->string('dis_tipo_acceso',50)->nullable();
                $table->string('dis_arteria_responsable_ima',50)->nullable();
                $table->date('dis_fecha_apertura')->nullable();
                $table->time('dis_hora_apertura')->nullable();
                $table->string('dis_flujo_inicial_timi',5)->nullable();
                $table->string('dis_flujo_final_timi',5)->nullable();
                $table->string('dis_tipo_stent',50)->nullable();
                $table->integer('dis_numero_stent')->nullable();
                $table->integer('dis_diametro_stent')->nullable();
                $table->integer('dis_longitud_stent')->nullable();
                $table->string('dis_predilatacion',5)->nullable();
                $table->string('dis_postdilatacion',5)->nullable();
                $table->string('dis_otra_intervencion',50)->nullable();
                $table->string('dis_exito_icp',5)->nullable();
                $table->date('dis_fecha_fin_icp')->nullable();
                $table->time('dis_hora_fin_icp')->nullable();
                $table->integer('dis_duracion_icp')->nullable();
                $table->string('dis_complicaciones_dela_icp')->nullable(); // Luego validar son multiples
                $table->string('dis_complicaciones_dela_icp_otro')->nullable();
                $table->string('dis_otrastenosis_coronaria',5)->nullable();
                $table->string('dis_icp_otras_lesiones',5)->nullable();
                $table->string('dis_decisio_basada',100)->nullable();
                $table->string('dis_momento_icp_otras_lesiones',100)->nullable();
                $table->integer('dis_cuan_dias_antes_despues_alta_icp')->nullable();
                $table->string('dis_revascularizacion_completa',5)->nullable();
                $table->string('dis_reperfusion',5)->nullable();
                $table->string('dis_motivo_deno_reperfusion',100)->nullable();
                $table->integer('dis_motivo_deno_reperfusion_otro')->nullable();
                $table->string('dis_motivo_cabg',100)->nullable();
                $table->string('dis_motivo_cabg_otro',150)->nullable();
                $table->integer('dis_puntaje_grace')->nullable();
                $table->integer('dis_puntaje_crussade')->nullable();

            //Datos de medicación farmacologíca (dmf_)
                $table->string('dmf_aspirina',5)->nullable();
                $table->string('dmf_clopidogrel',5)->nullable();
                $table->string('dmf_enoxaparina',5)->nullable();
                $table->string('dmf_heparina_no_fraccionada',5)->nullable();
                $table->string('dmf_atorvastatina',5)->nullable();
                $table->string('dmf_betabloqueadores',5)->nullable();
                $table->string('dmf_diureticos_asa',5)->nullable();
                $table->string('dmf_vasodilatadores',5)->nullable();
                $table->string('dmf_vasopresores',5)->nullable();
                $table->string('dmf_inotropicos',5)->nullable();
                $table->string('dmf_ieca_ara',5)->nullable();
                $table->string('dmf_ventilacion_mecanica',5)->nullable();
                $table->string('dmf_dialisis',5)->nullable();
                $table->string('dmf_rehab_cardiaca',5)->nullable();
                $table->string('dmf_antagonistas_mineraloc',5)->nullable();
                $table->string('dmf_inhibidores_recep_p2y12',5)->nullable();

            //Datos de laboratorio (dl_)
                $table->integer('dl_hemoglobina')->nullable();
                $table->integer('dl_leucocitos')->nullable();
                $table->integer('dl_plaquetas')->nullable();
                $table->integer('dl_creatinina')->nullable();
                $table->integer('dl_urea')->nullable();
                $table->integer('dl_glucosa')->nullable();
                $table->integer('dl_troponina_t')->nullable();
                $table->integer('dl_troponina_i')->nullable();
                $table->integer('dl_cpk_total')->nullable();
                $table->integer('dl_cpk_mb')->nullable();
                $table->integer('dl_lactato')->nullable();
                $table->integer('dl_fevi_ingreso')->nullable();
                $table->integer('dl_fevi_hospitalizacion')->nullable();


            //Terapia Intrahospitalaria (ti_)
                $table->string('ti_aspirina',5)->nullable();
                $table->string('ti_ip2y12',20)->nullable();
                $table->string('ti_enoxaparina',5)->nullable();
                $table->string('ti_heparina_no_fraccionada',5)->nullable();
                $table->string('ti_atorvastatina',5)->nullable();
                $table->string('ti_betabloqueadores',5)->nullable();
                $table->string('ti_diureticos_asa',5)->nullable();
                $table->string('ti_vasodilatadores',5)->nullable();
                $table->string('ti_vasopresores',5)->nullable();
                $table->string('ti_inotropicos',5)->nullable();
                $table->string('ti_ieca_ara',5)->nullable();
                $table->string('ti_ventilacion_mecanica',5)->nullable();
                $table->string('ti_dialisis',5)->nullable();
                $table->string('ti_rehabilitacion_cardiaca',5)->nullable();
                $table->string('ti_ventilacion_no_invasiva',5)->nullable();
                $table->string('ti_balon_contrapulsacion_ia',5)->nullable();
                $table->string('ti_rehab_cardiaca_intrahosp',5)->nullable();
                $table->string('ti_levosimendan',5)->nullable();
                $table->string('ti_marcapaso',10)->nullable();
                $table->string('ti_ecmo',5)->nullable();


            //Analisis Auxiliares Intrahospitalarios (aai_)
                $table->integer('aai_hemoglobina')->nullable();
                $table->integer('aai_leucocitos')->nullable();
                $table->integer('aai_plaquetas')->nullable();
                $table->integer('aai_creatinina')->nullable();
                $table->integer('aai_urea')->nullable();
                $table->integer('aai_glucosa')->nullable();
                $table->integer('aai_troponina_iot_primer')->nullable();
                $table->integer('aai_troponina_iot_segundo')->nullable();
                $table->integer('aai_cpk_total')->nullable();
                $table->integer('aai_cpk_mb')->nullable();
                $table->integer('aai_lactato')->nullable();
                $table->integer('aai_fevi')->nullable();
                $table->date('aai_fecha_pm_fevi')->nullable();
                $table->integer('aai_horas_troponina')->nullable();
                $table->integer('aai_hemoglobina_glicosilada')->nullable();

            //Medicación al Alta (ma_)
                $table->string('ma_aspirina',5)->nullable();
                $table->string('ma_ip2y12',20)->nullable();
                $table->string('ma_estatinas',5)->nullable();
                $table->string('ma_betabloqueadores',5)->nullable();
                $table->string('ma_diureticos_asa',5)->nullable();
                $table->string('ma_antagonistas_mineralocorticoide',5)->nullable();
                $table->string('ma_ieca_ara',5)->nullable();
                $table->string('ma_inhibidores_p2y12',5)->nullable();
                $table->string('ma_nitratos',5)->nullable();
                $table->string('ma_anticoagulacion',50)->nullable();


            //Datos de pronóstico (dp_)
                $table->string('dp_muerte_hospitalaria',5)->nullable();
                $table->date('dp_fecha_muerte_hospitalaria')->nullable();
                $table->string('dp_muerte_cardiovascular_alta',5)->nullable();
                $table->date('dp_fecha_muerte_cardiovascular_alta')->nullable();
                $table->string('dp_muerte_no_cardiovascular_alta',5)->nullable();
                $table->date('dp_fecha_muerte_no_cardiovascular_alta')->nullable();
                $table->string('dp_angina_postinfarto',5)->nullable();
                $table->date('dp_fecha_angina_postinfarto')->nullable();
                $table->string('dp_reinfarto',5)->nullable();
                $table->date('dp_fecha_reinfarto')->nullable();
                $table->string('dp_acv_alta',5)->nullable();
                $table->date('dp_fecha_acv_alta')->nullable();
                $table->string('dp_trombosis_stent_alta',5)->nullable();
                $table->date('dp_fecha_trombosis_stent_alta')->nullable();
                $table->string('dp_rehospitalizacion_falla_cardiaca',5)->nullable();
                $table->date('dp_fecha_rehospitalizacion_falla_cardiaca')->nullable();
                $table->string('dp_sangrado',5)->nullable();
                $table->string('dp_sangrado_segun_barc',5)->nullable();
                $table->date('dp_fecha_sangrado')->nullable();
                $table->string('dp_rehabilitacion_cardiaca_alta',5)->nullable();
                $table->integer('dp_segunda_medicion_fevi_alta')->nullable();
                $table->date('dp_fecha_segunda_fevi_alta')->nullable();
                $table->date('dp_fecha_de_alta')->nullable();
                $table->integer('dp_dias_hospitalizacion')->nullable();

            // Seguimiento Clínico (sc_)
                $table->string('sc_muerte_hospitalaria',5)->nullable();
                $table->date('sc_fecha_muerte_hospitalaria')->nullable();
                $table->string('sc_muerte_cardiovascular_alta',5)->nullable();
                $table->date('sc_fecha_muerte_cardiovascular_alta')->nullable();
                $table->string('sc_muerte_no_cardiovascular_alta',5)->nullable();
                $table->date('sc_fecha_muerte_no_cardiovascular_alta')->nullable();
                $table->string('sc_angina_postinfarto',5)->nullable();
                $table->date('sc_fecha_angina_postinfarto')->nullable();
                $table->string('sc_reinfarto',5)->nullable();
                $table->date('sc_fecha_reinfarto')->nullable();
                $table->string('sc_acv',20)->nullable();
                $table->date('sc_fecha_acv')->nullable();
                $table->string('sc_shock_cardiogenico',5)->nullable();
                $table->date('sc_fecha_shock_cardiogenico')->nullable();
                $table->string('sc_paro_cardiorespiratorio_recuperado',5)->nullable();
                $table->date('sc_fecha_paro_cardiorespiratorio_recuperado')->nullable();
                $table->string('sc_ruptura_musculo_papilar',5)->nullable();
                $table->date('sc_fecha_ruptura_musculo_papilar')->nullable();
                $table->string('sc_comunicacion_interventricular',5)->nullable();
                $table->date('sc_fecha_comunicacion_interventricular')->nullable();
                $table->string('sc_ruptura_pared_libre',5)->nullable();
                $table->date('sc_fecha_ruptura_pared_libre')->nullable();
                $table->string('sc_trombosis_stent',5)->nullable();
                $table->date('sc_fecha_trombosis_stent')->nullable();
                $table->string('sc_rehospitalizacion_falla_cardiaca',5)->nullable();
                $table->date('sc_fecha_rehospitalizacion_falla_cardiaca')->nullable();
                $table->string('sc_sangrado',5)->nullable();
                $table->string('sc_complicaciones_mecanicas')->nullable(); // Luego validar son multiples
                $table->string('sc_sangrado_segun_barc',5)->nullable();
                $table->string('sc_sangrado_barc_tipo',5)->nullable();
                $table->date('sc_fecha_sangrado')->nullable();
                $table->string('sc_prc',40)->nullable();
                $table->integer('sc_segunda_medicion_fevi_alta')->nullable();
                $table->date('sc_fecha_segunda_fevi_alta')->nullable();

            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renimas');
    }
}
