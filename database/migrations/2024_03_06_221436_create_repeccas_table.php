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
            $table->string('sexo');
            $table->string('edad');
            $table->string('estado_civil');
            $table->string('grado_instruccion');
            $table->string('actividad_laboral');
            $table->string('numero_gestas',2);
            $table->string('partos_a_termino',2);
            $table->string('partos_pretermino',2);
            $table->string('abortos',2);
            $table->string('numero_hijos_vivos',2);
            $table->string('diagnostico_especifico');
            $table->string('transicion_cardiologia');
            $table->string('sindrome_genetico_asociado');
            $table->string('sindrome_genetico_asociado_otro')->nullable();
            $table->string('severidad');
            $table->string('clasificacion_anatomica_funcional');
            $table->string('clase_funcional');
            $table->string('dependencia_funcional');
            $table->string('hospitalizaciones');
            $table->string('cianosis');
            $table->string('saturacion_oxigeno');
            $table->string('peso');
            $table->string('talla');
            $table->string('manejo_recibido');
            $table->string('manejo_recibido_otro')->nullable();
            $table->string('protesis_valvulares');
            $table->string('ubicacion_protesis_valvulares_aortica')->nullable();
            $table->string('ubicacion_protesis_valvulares_mitral')->nullable();
            $table->string('ubicacion_protesis_valvulares_pulmonar')->nullable();
            $table->string('ubicacion_protesis_valvulares_tricuspide')->nullable();
            $table->string('procedimiento_electrofisiologico');
            $table->string('marcapasos');
            $table->string('aortoplastia')->nullable();
            $table->string('stent_fistulas');
            $table->string('cirugia_cardiaca');
            $table->string('ventriculo_sistemico');
            $table->string('fraccion_eyeccion');
            $table->string('funcion_sistolica');
            $table->string('tratamiento_medico');
            $table->string('tratamiento_medico_otro')->nullable();
            $table->string('arritmias');
            $table->string('arritmias_otro')->nullable();
            $table->string('comorbilidades');
            $table->string('comorbilidades_otro')->nullable();
            $table->string('enfermedad_renal');
            $table->string('complicaciones')->nullable();
            $table->string('uso_dispositivos');
            $table->string('creatinina_serica');
            $table->string('acido_urico_serico');
            $table->string('glucosa_serica');
            $table->string('colesterol_total');
            $table->string('colesterol_ldl');
            $table->string('trigliceridos');
            $table->string('hemoglobina');
            $table->string('hematocrito');
            $table->string('plaquetas');
            $table->string('ferritina');
            $table->string('hierro_serico');
            $table->string('saturacion_transferrina');
            $table->string('tsh');
            $table->string('t4_libre');
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
