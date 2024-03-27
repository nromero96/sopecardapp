<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenavalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     */
    public function up()
    {
        Schema::create('renavals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('centro');
            $table->string('departamento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('edad',5)->nullable();
            $table->string('sexo',20)->nullable();
            $table->string('gestante',5)->nullable();
            $table->string('estado_civil',20)->nullable();
            $table->string('grado_instruccion',100)->nullable();
            $table->string('pas_diagnostico',10)->nullable();
            $table->string('pad_diagnostico',10)->nullable();
            $table->string('peso',5)->nullable();
            $table->string('talla',5)->nullable();
            $table->string('circunferencia_abdominal',10)->nullable();
            $table->string('antecedentes')->nullable();
            $table->string('metodo_diagnostico_valvulopatia')->nullable();
            $table->date('fecha_diagnostico_valvulopatia')->nullable();
            $table->string('fevi_al_diagnostico',4)->nullable();
            $table->string('diagnostico_estenosis')->nullable();
            $table->string('diagnostico_insuficiencia')->nullable();
            $table->string('enfermedad_valvular_multiple',2)->nullable();
            $table->string('etiologias')->nullable();
            $table->string('etiologias_otros',80)->nullable();
            $table->string('cha2ds2vasc',5)->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('grado_soplo',5)->nullable();
            $table->string('nyha',10)->nullable();
            $table->string('area_valvular')->nullable();
            $table->string('velo_maxima')->nullable();
            $table->string('itv')->nullable();
            $table->string('vol_sis_expuls')->nullable();
            $table->string('otra_valvula')->nullable();
            $table->string('enf_coronaria')->nullable();
            $table->string('seguimiento_gradiente_media')->nullable();
            $table->date('seguimiento_gradiente_media_fecha')->nullable();
            $table->string('orificio_regurgitante_efectivo',10)->nullable();
            $table->string('pisa',10)->nullable();
            $table->string('morfo_aortica')->nullable();
            $table->string('dilat_ao')->nullable();
            $table->string('gradiente_media')->nullable();
            $table->string('tiempo_hemipresion')->nullable();
            $table->string('diametro_vena_contracta')->nullable();
            $table->string('hipertrofia')->nullable();
            $table->string('tipo_hipertrofia')->nullable();
            $table->string('volumen_ai')->nullable();
            $table->string('htp')->nullable();
            $table->string('htp_severidad')->nullable();
            $table->string('tapse_20')->nullable();
            $table->string('fraccion_de_acortamiento')->nullable();
            $table->string('fevi_seguimiento_1')->nullable();
            $table->date('fecha_fevi_seguimiento_1')->nullable();
            $table->string('fevi_seguimiento_2')->nullable();
            $table->date('fecha_fevi_seguimiento_2')->nullable();
            $table->string('fevi_seguimiento_3')->nullable();
            $table->date('fecha_fevi_seguimiento_3')->nullable();
            $table->string('fevi_seguimiento_4')->nullable();
            $table->date('fecha_fevi_seguimiento_4')->nullable();
            $table->string('fevi_seguimiento_5')->nullable();
            $table->date('fecha_fevi_seguimiento_5')->nullable();
            $table->string('fevi_reducida')->nullable();
            $table->date('fecha_fevi_reducida')->nullable();
            $table->string('diametro_ventricular_izquierda_al_final_de_la_diastole')->nullable();
            $table->date('fecha_diametro_ventricular_izquierda_al_final_de_la_diastole')->nullable();
            $table->string('diametro_ventricular_izquierda_al_final_de_la_sistole')->nullable();
            $table->date('fecha_diametro_ventricular_izquierda_al_final_de_la_sistole')->nullable();
            $table->string('complicaciones_inmediatas_tardias')->nullable();
            $table->string('complicaciones_protesis')->nullable();
            $table->string('complicacion_falla_cardiaca')->nullable();
            $table->date('fecha_complicacion_falla_cardiaca')->nullable();
            $table->string('complicacion_stroke')->nullable();
            $table->date('fecha_complicacion_stroke')->nullable();
            $table->string('complicacion_endocarditis')->nullable();
            $table->date('fecha_complicacion_endocarditis')->nullable();
            $table->string('complicacion_sangrado')->nullable();
            $table->date('fecha_complicacion_sangrado')->nullable();
            $table->string('complicacion_tromboembolismo')->nullable();
            $table->date('fecha_complicacion_tromboembolismo')->nullable();
            $table->string('complicacion_fibrilacion_auricular')->nullable();
            $table->date('fecha_complicacion_fibrilacion_auricular')->nullable();
            $table->string('complicacion_otros_hallazgos_ecg')->nullable();
            $table->date('fecha_complicacion_otros_hallazgos_ecg')->nullable();
            $table->string('complicacion_trombo_auricular')->nullable();
            $table->date('fecha_complicacion_trombo_auricular')->nullable();
            $table->string('complicacion_muerte_general')->nullable();
            $table->date('fecha_complicacion_muerte_general')->nullable();
            $table->string('complicacion_muerte_cardiovascular')->nullable();
            $table->date('fecha_complicacion_muerte_cardiovascular')->nullable();
            $table->string('complicacion_hospitalizacion_cardiovascular')->nullable();
            $table->date('fecha_complicacion_hospitalizacion_cardiovascular')->nullable();
            $table->string('medicacion_ieca')->nullable();
            $table->string('medicacion_ara')->nullable();
            $table->string('medicacion_betabloqueador')->nullable();
            $table->string('medicacion_digoxina')->nullable();
            $table->string('medicacion_estatinas')->nullable();
            $table->string('medicacion_diureticos',2)->nullable();
            $table->string('medicacion_calcio_antagonista',2)->nullable();
            $table->string('medicacion_dabigatran',2)->nullable();
            $table->string('medicacion_warfarina',2)->nullable();
            $table->string('medicacion_acido_acetil_salicilico',2)->nullable();
            $table->string('manejo_reemplazo_valvular',2)->nullable();
            $table->string('medicacion_clopidogrel',2)->nullable();
            $table->string('manejo_qx_intervencionismo_estenosis')->nullable();
            $table->string('manejo_qx_estenosis')->nullable();
            $table->string('tavi')->nullable();
            $table->string('manejo_plastia_reemplazo_insuficiencia')->nullable();
            $table->string('manejo_reemplazo_insuficiencia')->nullable();
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
        Schema::dropIfExists('renavals');
    }
}
