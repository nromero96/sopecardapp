<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepeccasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repeccas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tipo_seguro');
            $table->string('tipo_seguro_otro')->nullable();
            $table->date('fecha_ultima_atencion');
            $table->string('numero_historia_clinica');
            $table->string('sexo')->nullable();
            $table->string('edad')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('grado_instruccion')->nullable();
            $table->string('actividad_laboral')->nullable();
            $table->string('numero_gestas',2)->nullable();
            $table->string('partos_a_termino',2)->nullable();
            $table->string('partos_pretermino',2)->nullable();
            $table->string('abortos',2)->nullable();
            $table->string('numero_hijos_vivos',2)->nullable();
            $table->string('diagnostico_especifico')->nullable();
            $table->string('diagnostico_especifico_ano')->nullable();
            $table->string('transicion_cardiologia')->nullable();
            $table->string('sindrome_genetico_asociado')->nullable();
            $table->string('sindrome_genetico_asociado_otro')->nullable();
            $table->string('severidad')->nullable();
            $table->string('clasificacion_anatomica_funcional')->nullable();
            $table->string('clase_funcional')->nullable();
            $table->string('dependencia_funcional')->nullable();
            $table->string('hospitalizaciones')->nullable();
            $table->string('cianosis')->nullable();
            $table->string('saturacion_oxigeno')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('manejo_recibido')->nullable();
            $table->string('manejo_recibido_otro')->nullable();
            $table->string('protesis_valvulares')->nullable();
            $table->string('ubicacion_protesis_valvulares_aortica')->nullable();
            $table->string('ubicacion_protesis_valvulares_mitral')->nullable();
            $table->string('ubicacion_protesis_valvulares_pulmonar')->nullable();
            $table->string('ubicacion_protesis_valvulares_tricuspide')->nullable();
            $table->string('procedimiento_electrofisiologico')->nullable();
            $table->string('marcapasos')->nullable();
            $table->string('aortoplastia')->nullable();
            $table->string('stent_fistulas')->nullable();
            $table->string('cirugia_cardiaca')->nullable();
            $table->string('cirugia_cardiaca_ano')->nullable();
            $table->string('ventriculo_sistemico')->nullable();
            $table->string('fraccion_eyeccion')->nullable();
            $table->string('funcion_sistolica')->nullable();
            $table->string('tratamiento_medico')->nullable();
            $table->string('tratamiento_medico_otro')->nullable();
            $table->string('arritmias')->nullable();
            $table->string('arritmias_otro')->nullable();
            $table->string('comorbilidades')->nullable();
            $table->string('comorbilidades_otro')->nullable();
            $table->string('enfermedad_renal')->nullable();
            $table->string('complicaciones')->nullable();
            $table->string('complicaciones_ano')->nullable();
            $table->string('uso_dispositivos')->nullable();
            $table->string('uso_dispositivos_otro')->nullable();
            $table->string('creatinina_serica')->nullable();
            $table->string('acido_urico_serico')->nullable();
            $table->string('glucosa_serica')->nullable();
            $table->string('colesterol_total')->nullable();
            $table->string('colesterol_ldl')->nullable();
            $table->string('trigliceridos')->nullable();
            $table->string('hemoglobina')->nullable();
            $table->string('hematocrito')->nullable();
            $table->string('plaquetas')->nullable();
            $table->string('ferritina')->nullable();
            $table->string('hierro_serico')->nullable();
            $table->string('saturacion_transferrina')->nullable();
            $table->string('tsh')->nullable();
            $table->string('t4_libre')->nullable();
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
        Schema::dropIfExists('repeccas');
    }
}
