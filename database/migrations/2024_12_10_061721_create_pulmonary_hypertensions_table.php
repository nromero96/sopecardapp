<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePulmonaryHypertensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulmonary_hypertensions', function (Blueprint $table) {
            $table->id();

            //Responsable y centro
            $table->unsignedBigInteger('user_id');
            $table->string('centro_atencion')->nullable();

            //Datos Epidemiológicos
            $table->string('de_nombre',200)->nullable();
            $table->integer('de_edad')->nullable();
            $table->string('de_procedencia',150)->nullable();
            $table->string('de_residencia',150)->nullable();
            $table->string('de_altura_ciudad',10)->nullable();
            $table->string('de_estratificacion_altura',50)->nullable();
            $table->string('de_tiempo_residencia',4)->nullable();
            $table->string('de_modalidad_ingreso',50)->nullable();
            $table->string('de_intervencion',10)->nullable();
            $table->string('de_gestante',10)->nullable();
            $table->string('de_estado_civil',20)->nullable();
            $table->string('de_grado_instruccion',60)->nullable();

            //Antecedentes
            $table->string('at_tipo_paciente_hp',15)->nullable();
            $table->integer('at_tiempo_sint_diagnostico')->nullable();
            $table->string('at_hipertension_ap',5)->nullable();
            $table->string('at_etiologia_hp',50)->nullable();
            $table->string('at_etiologia_hp_otra',100)->nullable();
            $table->string('at_diagnostico_gestacion',5)->nullable();
            $table->string('at_disnea',5)->nullable();
            $table->string('at_sincope',5)->nullable();
            $table->string('at_angina',5)->nullable();
            $table->text('at_antecedentes')->nullable();
            $table->string('at_otro_antecedentes',150)->nullable();
            $table->string('at_vacunacion',5)->nullable();
            $table->string('at_anticoncepcion',5)->nullable();

            //Examen físico
            $table->string('ef_pas',6)->nullable();
            $table->string('ef_pad',6)->nullable();
            $table->string('ef_fc',6)->nullable();
            $table->string('ef_peso',6)->nullable();
            $table->string('ef_talla',6)->nullable();
            $table->string('ef_imc',6)->nullable();
            $table->string('ef_sato2',6)->nullable();
            $table->string('ef_ingurgitacion_yugular',5)->nullable();
            $table->string('ef_reflujo_hepatoyugular',5)->nullable();
            $table->string('ef_edema_miembros_inferiores',5)->nullable();
            $table->string('ef_hepatomegalia',5)->nullable();
            $table->string('ef_ascitis',5)->nullable();
            $table->string('ef_fenomeno_raynaud',5)->nullable();
            $table->string('ef_ulceras_digitales',5)->nullable();
            $table->string('ef_esclerodactilia',5)->nullable();
            $table->string('ef_calcinosis',5)->nullable();
            $table->string('ef_telangiectasias',5)->nullable();
            $table->string('ef_artritis_artralgia',5)->nullable();
            $table->string('ef_miositis',5)->nullable();
            $table->string('ef_iase',10)->nullable();

            //Ecocardiograma
            $table->string('ec_fe',6)->nullable();
            $table->string('ec_area_ad',6)->nullable();
            $table->string('ec_diametro_vd',6)->nullable();
            $table->string('ec_tapse',6)->nullable();
            $table->string('ec_fa_vd',6)->nullable();
            $table->string('ec_onda_s',5)->nullable();
            $table->string('ec_ie',6)->nullable();
            $table->string('ec_vrt',6)->nullable();
            $table->string('ec_diametro_vci',6)->nullable();
            $table->string('ec_colapso_vci',6)->nullable();
            $table->string('ec_diametro_vci_20',5)->nullable();
            $table->string('ec_colapso_vci_50',5)->nullable();
            $table->string('ec_pad',6)->nullable();
            $table->string('ec_psap',6)->nullable();
            $table->string('ec_derrame_pericardico',5)->nullable();

            //Laboratorio
            $table->string('lb_pro_bnp',6)->nullable();
            $table->string('lb_troponinas',6)->nullable();
            $table->string('lb_hemoglobina',6)->nullable();
            $table->string('lb_leucocitos',6)->nullable();
            $table->string('lb_plaquetas',6)->nullable();
            $table->string('lb_creatinina',6)->nullable();
            $table->string('lb_urea',6)->nullable();
            $table->string('lb_albunina',6)->nullable();
            $table->string('lb_tgo',6)->nullable();
            $table->string('lb_tgp',6)->nullable();
            $table->string('lb_bilirrubinas_totales',6)->nullable();
            $table->string('lb_bilirrubina_directa',6)->nullable();
            $table->string('lb_fosfatasa_alcalina',6)->nullable();
            $table->string('lb_tsh',6)->nullable();
            $table->string('lb_ferritina',6)->nullable();
            $table->string('lb_saturacion_transferrina',6)->nullable();
            $table->string('lb_acido_urico',6)->nullable();
            $table->string('lb_sodio',6)->nullable();

            //Laboratorio para HAP asociada a Tejido Conectivo
            $table->string('lhtc_ana',5)->nullable();
            $table->string('lhtc_patron_ana',150)->nullable();
            $table->string('lhtc_anticentromero',6)->nullable();
            $table->string('lhtc_anti_scl70',6)->nullable();
            $table->string('lhtc_anti_dna',6)->nullable();
            $table->string('lhtc_anti_rnp',6)->nullable();
            $table->string('lhtc_anti_ro',6)->nullable();
            $table->string('lhtc_anti_la',6)->nullable();
            $table->string('lhtc_factor_reumatoideo',6)->nullable();
            $table->string('lhtc_anti_ccp',6)->nullable();
            $table->string('lhtc_anti_jo',6)->nullable();
            $table->string('lhtc_anticuerpo_lupico',6)->nullable();
            $table->string('lhtc_anticardiolipina_igg',6)->nullable();
            $table->string('lhtc_anticardiolipina_igm',6)->nullable();
            $table->string('lhtc_anti_beta_2_glicoproteina_igg',6)->nullable();
            $table->string('lhtc_anti_beta_2_glicoproteina_igm',6)->nullable();

            //Electrocardiograma
            $table->string('ecg_ritmo',5)->nullable();
            $table->string('ecg_fibrilacion_auricular',5)->nullable();
            $table->string('ecg_bloqueo_rama_izquierda',5)->nullable();
            $table->string('ecg_bloqueo_rama_derecha',5)->nullable();
            $table->string('ecg_hipertrofia_ventricular_derecha',5)->nullable();
            $table->string('ecg_frecuencia_cardiaca',6)->nullable();
            $table->string('ecg_tc6m',6)->nullable();
            $table->string('ecg_se_detuvo',5)->nullable();
            $table->string('ecg_requirio_oxigeno',5)->nullable();
            $table->string('ecg_distancia_recorrida',5)->nullable();
            $table->string('ecg_porcentaje_predicho',6)->nullable();
            $table->string('ecg_escala_borg_disnea',6)->nullable();
            $table->string('ecg_escala_borg_fatiga',6)->nullable();
            $table->string('ecg_saturacion_o2_inicial',6)->nullable();
            $table->string('ecg_saturacion_o2_final',6)->nullable();
            $table->string('ecg_frecuencia_cardiaca_inicial',6)->nullable();
            $table->string('ecg_frecuencia_cardiaca_final',6)->nullable();
            $table->string('ecg_frecuencia_cardiaca_primer_minuto',6)->nullable();

            //Cateterismo cardiaco derecho
            $table->string('ccd_indice_cardiaco_fick',5)->nullable();
            $table->string('ccd_indice_cardiaco_termodilucion',5)->nullable();
            $table->string('ccd_frecuencia_cardiaca',6)->nullable();
            $table->string('ccd_presion_auricula_derecha',6)->nullable();
            $table->string('ccd_presion_sistolica_arteria_pulmonar',6)->nullable();
            $table->string('ccd_presion_diastolica_arteria_pulmonar',6)->nullable();
            $table->string('ccd_presion_media_arterial_pulmonar',6)->nullable();
            $table->string('ccd_presion_capilar',6)->nullable();
            $table->string('ccd_gradiente_transpulmonar',6)->nullable();
            $table->string('ccd_indice_cardiaco',6)->nullable();
            $table->string('ccd_saturacion_arteria_pulmonar',6)->nullable();
            $table->string('ccd_resistencia_vascular_pulmonar',6)->nullable();
            $table->string('ccd_resistencia_vascular_pulmonar_indexada',6)->nullable();
            $table->string('ccd_vasoreactividad',10)->nullable();
            $table->string('ccd_droga_vasoreactividad',150)->nullable();
            $table->string('ccd_complicaciones',5)->nullable();
            $table->string('ccd_complicaciones_detalle',200)->nullable();
            

            //Resonancia magnética (opcional) - ventrículo derecho y aurícula derecha
            $table->string('rm_vd_masa',6)->nullable();
            $table->string('rm_vd_volumen_diastolico_final',6)->nullable();
            $table->string('rm_vd_volumen_sistolico_final',6)->nullable();
            $table->string('rm_vd_fraccion_eyeccion',6)->nullable();
            $table->string('rm_ad_area',6)->nullable();
            $table->string('rm_vi_fraccion_eyeccion',6)->nullable();

            //Tomografía axial computarizada de tórax
            $table->string('tac_diametro_arteria_pulmonar',6)->nullable();
            $table->string('tac_relacion_diametro',6)->nullable();
            $table->string('tac_epid',20)->nullable();
            $table->string('tac_epoc',5)->nullable();
            $table->string('tac_capilaroscopia',150)->nullable();
            $table->string('tac_patron_esclerodermico',5)->nullable();
            $table->string('tac_tipo',10)->nullable();


            //Ergoespirometría y otras pruebas (opcional)
            $table->string('ergo_tipo_prueba',20)->nullable();
            $table->string('ergo_consumo_maximo_o2',6)->nullable();
            $table->string('ergo_vef1',6)->nullable();
            $table->string('ergo_cvf',6)->nullable();
            $table->string('ergo_vef1_cvf',6)->nullable();
            $table->string('ergo_dlco_corregida',6)->nullable();
            $table->string('ergo_tlc',6)->nullable();

            //Tratamiento
            $table->text('trmto_farmacologico')->nullable();
            $table->string('trmto_farmacologico_otro', 150)->nullable();
            $table->string('trmto_psicoterapia',5)->nullable();
            $table->string('trmto_rehabilitacion',5)->nullable();
            $table->string('trmto_oxigenoterapia', 5)->nullable();
            $table->string('trmto_estrategia_inicial', 20)->nullable();
            $table->string('trmto_intervencionista', 20)->nullable();
            $table->string('trmto_muerte_perioperatoria', 5)->nullable();
            $table->string('trmto_muerte_dias_postrasplante', 5)->nullable();
            $table->string('trmto_muerte_dias_postrasplante_dias', 5)->nullable();
            $table->string('trmto_muerte_tardia', 10)->nullable();
            $table->string('trmto_muerte_tardia_dias', 10)->nullable();
            $table->string('trmto_ecmo', 5)->nullable();
            $table->string('trmto_rechazo_agudo', 5)->nullable();
            $table->string('trmto_rechazo_cronico', 5)->nullable();
            $table->date('trmto_fecha_terapia_intervencionista')->nullable();
            $table->string('trmto_angioplastia_pulmonar', 20)->nullable();
            $table->date('trmto_fecha_angioplastia')->nullable();
            $table->string('trmto_cantidad_sesiones',6)->nullable();
            $table->string('trmto_cantidad_vasos',6)->nullable();
            $table->string('trmto_complicaciones', 5)->nullable();
            $table->text('trmto_complicaciones_descripcion')->nullable();
            $table->string('trmto_muerte_periprocedimiento', 5)->nullable();
            $table->string('trmto_tromboendarterectomia', 20)->nullable();
            $table->date('trmto_fecha_endarterectomia')->nullable();
            $table->string('trmto_complicaciones_tromboendarterectomia', 10)->nullable();
            $table->text('trmto_complicaciones_tromboendarterectomia_describir')->nullable();
            $table->string('trmto_hipertension_pulmonar_residual', 5)->nullable();
            $table->string('trmto_ecmo_perioperatorio', 5)->nullable();
            $table->string('trmto_estratificacion_riesgo_basal', 20)->nullable();
            $table->string('trmto_guia_europea', 5)->nullable();
            $table->string('trmto_reveal_lite', 5)->nullable();
            $table->string('trmto_estratificacion_riesgo_3meses', 20)->nullable();
            $table->string('trmto_estratificacion_riesgo_6meses', 20)->nullable();
            $table->string('trmto_estratificacion_riesgo_12meses', 20)->nullable();
            $table->string('trmto_estratificacion_riesgo_18meses', 20)->nullable();
            $table->string('trmto_estratificacion_riesgo_24meses', 20)->nullable();
            $table->string('trmto_estratificacion_riesgo_30meses', 20)->nullable();
            $table->string('trmto_estratificacion_riesgo_36meses', 20)->nullable();
            

            //Eventos de interés
            $table->text('ei_morbilidad_hipertension_pulmonar')->nullable();
            $table->date('ei_fecha_morbilidad')->nullable();
            $table->string('ei_mortalidad_global',5)->nullable();
            $table->date('ei_fecha_mortalidad')->nullable();
            $table->string('ei_remodelado_reverso_ventriculo_derecho',5)->nullable();
            $table->date('ei_fecha_remodelado')->nullable();

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
        Schema::dropIfExists('pulmonary_hypertensions');
    }
}
