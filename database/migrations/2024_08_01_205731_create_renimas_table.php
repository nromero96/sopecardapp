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

            // Datos Epidemiológicos
            $table->string('documento_identidad')->nullable();
            $table->string('celular_contacto',20)->nullable();
            $table->string('departamento',150)->nullable();
            $table->string('provincia',150)->nullable();
            $table->string('ciudad',150)->nullable();
            $table->string('distrito',150)->nullable();
            $table->integer('edad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo',20)->nullable();
            $table->string('gestante',2)->nullable();
            $table->string('estado_civil',20)->nullable();
            $table->string('tipo_seguro',50)->nullable();
            $table->string('grado_instruccion',50)->nullable();

            //Datos Clínicos
            $table->string('pas_diagnostico',10)->nullable();
            $table->string('pad_diagnostico',10)->nullable();
            $table->string('peso',10)->nullable();
            $table->integer('talla')->nullable();
            $table->integer('circunferencia_abdominal')->nullable();
            $table->integer('saturacion_oxigeno')->nullable();
            $table->text('antecedentes')->nullable();
            $table->text('paquete_cigarrillos',50)->nullable();
            $table->date('fecha_inicio_sintomas')->nullable();
            $table->time('hora_inicio_sintomas')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->time('hora_ingreso')->nullable();
            $table->date('fecha_primer_contacto_medico')->nullable();
            $table->time('hora_primer_contacto_medico')->nullable();
            $table->integer('tiempo_inicio_sintomas_primer_contacto')->nullable();
            $table->string('centro_primer_contacto_medico',200)->nullable();
            $table->date('fecha_ecg')->nullable();
            $table->time('hora_ecg')->nullable();
            $table->integer('tiempo_primer_contacto_ecg')->nullable();
            $table->text('manifestacionesclinicas')->nullable();
            $table->string('clasificacion_kk',5)->nullable();
            $table->string('diagnostico_ima',30)->nullable();
            $table->string('riesgo_imanostelevado',30)->nullable();

            //Datos del manejo de intervención
            $table->string('manejo',50)->nullable();
            $table->string('transferido_fibrinolisis',5)->nullable();
            $table->string('lugar_transferencia_fibrinolisis',200)->nullable();
            $table->date('fecha_fibrinolisis')->nullable();
            $table->time('hora_fibrinolisis')->nullable();
            $table->integer('tiempo_ecg_fibrinolisis')->nullable();
            $table->text('tipo_fibrinolisis')->nullable();
            $table->string('fibrinolisis_exitosa',5)->nullable();
            $table->string('angioplastia_rescate',5)->nullable();
            $table->string('fibrinolisis_suspendida',5)->nullable();
            $table->string('causa_suspension',200)->nullable();
            $table->string('fuetransferido_icp',5)->nullable();
            $table->string('lugar_transferencia_icp',200)->nullable();
            $table->date('fecha_salida_antes_icp')->nullable();
            $table->time('hora_salida_antes_icp')->nullable();
            $table->integer('tiempo_doorin_doorout')->nullable();
            $table->date('fecha_llegada_centro_icp')->nullable();
            $table->integer('tiepo_transporte_icp')->nullable();
            $table->date('fecha_inicio_icp')->nullable();
            $table->time('hora_inicio_icp')->nullable();
            $table->string('tipo_acceso',30)->nullable();
            $table->string('arteria_responsable',50)->nullable();
            $table->date('fecha_apertura')->nullable();
            $table->time('hora_apertura')->nullable();
            $table->string('otrastenosis_coronaria',200)->nullable();
            $table->string('flujo_inicial_timi',5)->nullable();
            $table->string('flujo_final_timi',5)->nullable();
            $table->string('tipo_stent',30)->nullable();
            $table->integer('diametro_stent')->nullable();
            $table->integer('longitud_stent')->nullable();
            $table->string('predilatacion',5)->nullable();
            $table->string('postdilatacion',5)->nullable();
            $table->string('otra_intervencion',50)->nullable();
            $table->string('exito_icp',5)->nullable();
            $table->date('fecha_fin_icp')->nullable();
            $table->time('hora_fin_icp')->nullable();
            $table->integer('duracion_icp')->nullable();
            $table->text('complicaciones_dela_icp')->nullable();
            $table->text('complicaciones_mecanicas')->nullable();
            $table->text('motivo_deno_reperfusion',200)->nullable();
            $table->integer('tiempo_total_isquemia')->nullable();
            $table->integer('puntaje_grace')->nullable();
            $table->string('otros_cambios_ecg')->nullable();

            //Datos de laboratorio
            $table->integer('hemoglobina_al_ingreso')->nullable();
            $table->integer('leucocitos_al_ingreso')->nullable();
            $table->integer('plaquetas_al_ingreso')->nullable();
            $table->integer('creatinina_al_ingreso')->nullable();
            $table->integer('urea_al_ingreso')->nullable();
            $table->integer('glucosa_al_ingreso')->nullable();
            $table->integer('troponina_t_al_ingreso')->nullable();
            $table->integer('troponina_i_al_ingreso')->nullable();
            $table->integer('cpk_total_al_ingreso')->nullable();
            $table->integer('cpk_mb_al_ingreso')->nullable();
            $table->integer('lactato_al_ingreso')->nullable();
            $table->integer('fevi_ingreso')->nullable();
            $table->integer('fevi_hospitalizacion')->nullable();

            //Datos de medicación farmacológica
            $table->string('aspirina_en_hospitalizacion',5)->nullable();
            $table->string('clopidogrel_en_hospitalizacion',5)->nullable();
            $table->string('enoxaparina_en_hospitalizacion',5)->nullable();
            $table->string('heparina_no_fraccionada_en_hospitalizacion',5)->nullable();
            $table->string('atorvastatina_en_hospitalizacion',5)->nullable();
            $table->string('betabloqueadores_en_hospitalizacion',5)->nullable();
            $table->string('diureticos_de_asa_en_hospitalizacion',5)->nullable();
            $table->string('vasodilatadores_en_hospitalizacion',5)->nullable();
            $table->string('vasopresores_en_hospitalizacion',5)->nullable();
            $table->string('inotropicos_en_hospitalizacion',5)->nullable();
            $table->string('ieca_ara_en_hospitalizacion',5)->nullable();
            $table->string('ventilacion_mecanica_en_hospitalizacion',5)->nullable();
            $table->string('dialisis_en_hospitalizacion',5)->nullable();
            $table->string('rehabilitacion_cardiaca_en_hospitalizacion',5)->nullable();
            $table->string('aspirina_al_alta',5)->nullable();
            $table->string('clopidogrel_al_alta',5)->nullable();
            $table->string('enoxaparina_al_alta',5)->nullable();
            $table->string('heparina_no_fraccionada_al_alta',5)->nullable();
            $table->string('atorvastatina_al_alta',5)->nullable();
            $table->string('betabloqueadores_al_alta',5)->nullable();
            $table->string('diureticos_de_asa_al_alta',5)->nullable();
            $table->string('antagonistas_de_mineralocorticoides_al_alta',5)->nullable();
            $table->string('ieca_ara_al_alta',5)->nullable();
            $table->string('inhibidores_del_receptor_p2y12_al_alta',5)->nullable();

            //Datos de pronóstico
            $table->integer('medición_FEVI_alta')->nullable();
            $table->date('fecha_FEVI_alta')->nullable();
            $table->string('muerte_hospitalaria',5)->nullable();
            $table->date('fecha_muerte_hospitalaria')->nullable();
            $table->string('muerte_cardiovascular_al_alta',5)->nullable();
            $table->date('fecha_muerte_cardiovascular_al_alta')->nullable();
            $table->string('muerte_no_cardiovascular_al_alta',5)->nullable();
            $table->date('fecha_muerte_no_cardiovascular_al_alta')->nullable();
            $table->string('angina_postinfarto',5)->nullable();
            $table->date('fecha_angina_postinfarto')->nullable();
            $table->string('reinfarto',5)->nullable();
            $table->date('fecha_reinfarto')->nullable();
            $table->string('acv_al_alta',5)->nullable();
            $table->date('fecha_acv_al_alta')->nullable();
            $table->string('trombosis_de_stent_al_alta',5)->nullable();
            $table->date('fecha_trombosis_de_stent_al_alta')->nullable();
            $table->string('rehospitalizacion_por_falla_cardiaca',5)->nullable();
            $table->date('fecha_rehospitalizacion_por_falla_cardiaca')->nullable();
            $table->string('sangrado',5)->nullable();
            $table->string('sangrado_segun_barc',5)->nullable();
            $table->date('fecha_sangrado')->nullable();
            $table->string('rehabilitacion_cardiaca_al_alta',5)->nullable();
            $table->integer('segunda_medicion_FEVI_alta')->nullable();

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
