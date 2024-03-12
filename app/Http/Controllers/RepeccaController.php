<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repecca;

//log
use Illuminate\Support\Facades\Log;

class RepeccaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'category_name' => 'repecca',
            'page_name' => 'repecca_index',
        ];

        //if auth user is admin, show all repeccas
        if (auth()->user()->role == 'admin') {
            //join users table to get user (trato, name, lastname) as responsable
            $repeccas = Repecca::join('users', 'repeccas.user_id', '=', 'users.id')
                ->select('repeccas.*', 'users.trato', 'users.name', 'users.lastname')
                ->get();

        } else {
            //join users table to get user (trato, name, lastname) as responsable
            $repeccas = Repecca::join('users', 'repeccas.user_id', '=', 'users.id')
                ->select('repeccas.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('repeccas.user_id', auth()->user()->id)
                ->get();
            
        }

        return view('pages.repecca.index')->with($data)->with('repeccas', $repeccas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'repecca',
            'page_name' => 'repecca_create',
        ];

        return view('pages.repecca.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //insert data into database
        $repecca = new Repecca;
        $repecca->user_id = auth()->user()->id;
        $repecca->tipo_seguro = $request->input('tipo_seguro');
        $repecca->tipo_seguro_otro = $request->input('tipo_seguro_otro');
        $repecca->fecha_ultima_atencion = $request->input('fecha_ultima_atencion');
        $repecca->numero_historia_clinica = $request->input('numero_historia_clinica');
        $repecca->sexo = $request->input('sexo');
        $repecca->edad = $request->input('edad');
        $repecca->estado_civil = $request->input('estado_civil');
        $repecca->grado_instruccion = $request->input('grado_instruccion');
        $repecca->actividad_laboral = $request->input('actividad_laboral');
        $repecca->numero_gestas = $request->input('numero_gestas');
        $repecca->partos_a_termino = $request->input('partos_a_termino');
        $repecca->partos_pretermino = $request->input('partos_pretermino');
        $repecca->abortos = $request->input('abortos');
        $repecca->numero_hijos_vivos = $request->input('numero_hijos_vivos');
        $repecca->diagnostico_especifico = $request->input('diagnostico_especifico');
        $repecca->transicion_cardiologia = $request->input('transicion_cardiologia');
        $repecca->sindrome_genetico_asociado = implode(", ", $request->input('sindrome_genetico_asociado'));
        $repecca->sindrome_genetico_asociado_otro = $request->input('sindrome_genetico_asociado_otro');
        $repecca->severidad = $request->input('severidad');
        $repecca->clasificacion_anatomica_funcional = $request->input('clasificacion_anatomica_funcional');
        $repecca->clase_funcional = $request->input('clase_funcional');
        $repecca->dependencia_funcional = $request->input('dependencia_funcional');
        $repecca->hospitalizaciones = $request->input('hospitalizaciones');
        $repecca->cianosis = $request->input('cianosis');
        $repecca->saturacion_oxigeno = $request->input('saturacion_oxigeno');
        $repecca->peso = $request->input('peso');
        $repecca->talla = $request->input('talla');
        $repecca->manejo_recibido = implode(", ", $request->input('manejo_recibido'));
        $repecca->manejo_recibido_otro = $request->input('manejo_recibido_otro');
        $repecca->protesis_valvulares = implode(", ", $request->input('protesis_valvulares'));
        $repecca->ubicacion_protesis_valvulares_aortica = implode(", ", $request->input('ubicacion_protesis_valvulares_aortica'));
        $repecca->ubicacion_protesis_valvulares_mitral = implode(", ", $request->input('ubicacion_protesis_valvulares_mitral'));
        $repecca->ubicacion_protesis_valvulares_pulmonar = implode(", ", $request->input('ubicacion_protesis_valvulares_pulmonar'));
        $repecca->ubicacion_protesis_valvulares_tricuspide = implode(", ", $request->input('ubicacion_protesis_valvulares_tricuspide'));
        $repecca->procedimiento_electrofisiologico = $request->input('procedimiento_electrofisiologico');
        $repecca->marcapasos = $request->input('marcapasos');
        $repecca->aortoplastia = implode(", ", $request->input('aortoplastia'));
        $repecca->stent_fistulas = $request->input('stent_fistulas');
        $repecca->cirugia_cardiaca = $request->input('cirugia_cardiaca');
        $repecca->ventriculo_sistemico = $request->input('ventriculo_sistemico');
        $repecca->fraccion_eyeccion = $request->input('fraccion_eyeccion');
        $repecca->funcion_sistolica = $request->input('funcion_sistolica');
        $repecca->tratamiento_medico = implode(", ", $request->input('tratamiento_medico'));
        $repecca->tratamiento_medico_otro = $request->input('tratamiento_medico_otro');
        $repecca->arritmias = implode(", ", $request->input('arritmias'));
        $repecca->arritmias_otro = $request->input('arritmias_otro');
        $repecca->comorbilidades = implode(", ", $request->input('comorbilidades'));
        $repecca->comorbilidades_otro = $request->input('comorbilidades_otro');
        $repecca->enfermedad_renal = $request->input('enfermedad_renal');
        $repecca->complicaciones = $request->input('complicaciones');
        $repecca->uso_dispositivos = $request->input('uso_dispositivos');
        $repecca->creatinina_serica = $request->input('creatinina_serica');
        $repecca->acido_urico_serico = $request->input('acido_urico_serico');
        $repecca->glucosa_serica = $request->input('glucosa_serica');
        $repecca->colesterol_total = $request->input('colesterol_total');
        $repecca->colesterol_ldl = $request->input('colesterol_ldl');
        $repecca->trigliceridos = $request->input('trigliceridos');
        $repecca->hemoglobina = $request->input('hemoglobina');
        $repecca->hematocrito = $request->input('hematocrito');
        $repecca->plaquetas = $request->input('plaquetas');
        $repecca->ferritina = $request->input('ferritina');
        $repecca->hierro_serico = $request->input('hierro_serico');
        $repecca->saturacion_transferrina = $request->input('saturacion_transferrina');
        $repecca->tsh = $request->input('tsh');
        $repecca->t4_libre = $request->input('t4_libre');
        $repecca->status = 'Activo'; //default value (Activo, Eliminado)
        $repecca->save();

        //return redirect to repecca index con mensaje
        return redirect('/repecca')->with('success', 'REPECCA creado exitosamente.');
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
