<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renaval;

class RenavalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'category_name' => 'renaval',
            'page_name' => 'renaval_index',
        ];

        //if auth user is admin, show all renavals
        if (\Auth::user()->hasRole('admin')) {
            //join users table to get user (trato, name, lastname) as responsable
            $renavals = Renaval::join('users', 'renavals.user_id', '=', 'users.id')
                ->select('renavals.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('renavals.status', 'Activo')
                ->get();

        } else {
            //join users table to get user (trato, name, lastname) as responsable
            $renavals = Renaval::join('users', 'renavals.user_id', '=', 'users.id')
                ->select('renavals.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('renavals.user_id', auth()->user()->id)
                ->where('renavals.status', 'Activo')
                ->get();
            
        }

        return view('pages.renaval.index')->with($data)->with('renavals', $renavals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'renaval',
            'page_name' => 'renaval_create',
        ];

        return view('pages.renaval.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $renaval = new Renaval();
        $renaval->user_id = auth()->user()->id;
        $renaval->centro_salud = $request->centro_salud;
        $renaval->documento_identidad = $request->documento_identidad;
        $renaval->modalidad_ingreso = $request->modalidad_ingreso;
        $renaval->departamento = $request->departamento;
        $renaval->provincia = $request->provincia;
        $renaval->ciudad = $request->ciudad;
        $renaval->edad = $request->edad;
        $renaval->sexo = $request->sexo;
        $renaval->gestante = $request->gestante;
        $renaval->estado_civil = $request->estado_civil;
        $renaval->grado_instruccion = $request->grado_instruccion;
        $renaval->compli_enfermedad = $request->compli_enfermedad;
        $renaval->pas_diagnostico = $request->pas_diagnostico;
        $renaval->pad_diagnostico = $request->pad_diagnostico;
        $renaval->peso = $request->peso;
        $renaval->talla = $request->talla;
        $renaval->circunferencia_abdominal = $request->circunferencia_abdominal;
        
        $antecedentes = $request->antecedentes;
        if(!empty($antecedentes)){
            $renaval->antecedentes = implode(',', $antecedentes);
        }else{
            $renaval->antecedentes = '';
        }
    
        $renaval->metodo_diagnostico_valvulopatia = $request->metodo_diagnostico_valvulopatia;
        $renaval->fecha_diagnostico_valvulopatia = $request->fecha_diagnostico_valvulopatia;
        $renaval->fevi_al_diagnostico = $request->fevi_al_diagnostico;
        
        $diagnostico_estenosis = $request->diagnostico_estenosis;
        if(!empty($diagnostico_estenosis)){
            $renaval->diagnostico_estenosis = implode(',', $diagnostico_estenosis);
        }else{
            $renaval->diagnostico_estenosis = '';
        }
        
        $diagnostico_insuficiencia = $request->diagnostico_insuficiencia;
        if(!empty($diagnostico_insuficiencia)){
            $renaval->diagnostico_insuficiencia = implode(',', $diagnostico_insuficiencia);
        }else{
            $renaval->diagnostico_insuficiencia = '';
        }
        
        $renaval->enfermedad_valvular_multiple = $request->enfermedad_valvular_multiple;
        
        $etiologias = $request->etiologias;
        if(!empty($etiologias)){
            $renaval->etiologias = implode(',', $etiologias);
        }else{
            $renaval->etiologias = '';
        }

        $renaval->etiologias_otro = $request->etiologias_otro;
        $renaval->cha2ds2vasc = $request->cha2ds2vasc;

        $diagnostico = $request->diagnostico;
        if(!empty($diagnostico)){
            $renaval->diagnostico = implode(',', $diagnostico);
        }else{
            $renaval->diagnostico = '';
        }

        $renaval->clasif_nyha = $request->clasif_nyha;
        $renaval->enf_coronaria = $request->enf_coronaria;
        $renaval->ea_morfologia_valvula_estenosis_aortica = $request->ea_morfologia_valvula_estenosis_aortica;
        $renaval->ea_morfologia_valvula_estenosis_aortica_otro = $request->ea_morfologia_valvula_estenosis_aortica_otro;
        $renaval->ea_velocidad_maxima = $request->ea_velocidad_maxima;
        $renaval->ea_area_valvular = $request->ea_area_valvular;
        $renaval->ea_gradiente_media = $request->ea_gradiente_media;
        $renaval->ea_calculo_area_valvular = $request->ea_calculo_area_valvular;
        $renaval->ea_severidad_valvulopatia = $request->ea_severidad_valvulopatia;
        $renaval->ea_etiologia = $request->ea_etiologia;
        $renaval->ea_volumen_sistolico_eyeccion = $request->ea_volumen_sistolico_eyeccion;
        $renaval->ia_jet = $request->ia_jet;
        $renaval->ia_vena_contracta = $request->ia_vena_contracta;
        $renaval->ia_ore = $request->ia_ore;
        $renaval->ia_vol_regurgitante_orificio = $request->ia_vol_regurgitante_orificio;
        $renaval->ia_etiologia = $request->ia_etiologia;
        $renaval->ia_severidad = $request->ia_severidad;
        $renaval->em_score_wilkins = $request->em_score_wilkins;
        $renaval->em_gradiente_media = $request->em_gradiente_media;
        $renaval->em_tiempo_hemipresion = $request->em_tiempo_hemipresion;
        $renaval->em_area_val_mitral = $request->em_area_val_mitral;
        $renaval->em_etiologia = $request->em_etiologia;
        $renaval->em_severidad = $request->em_severidad;
        $renaval->im_jet = $request->im_jet;
        $renaval->im_vena_contracta = $request->im_vena_contracta;
        $renaval->im_ore = $request->im_ore;
        $renaval->im_volumen_regurgitante = $request->im_volumen_regurgitante;
        $renaval->im_tipoetiologia = $request->im_tipoetiologia;
        $renaval->im_tipoetiologia_secund = $request->im_tipoetiologia_secund;
        $renaval->im_severidad = $request->im_severidad;
        $renaval->im_carpentier = $request->im_carpentier;
        $renaval->im_anillo = $request->im_anillo;
        $renaval->im_metodo_eval_anillo = $request->im_metodo_eval_anillo;
        $renaval->et_velocidad_maxima = $request->et_velocidad_maxima;
        $renaval->et_gradiente_media = $request->et_gradiente_media;
        $renaval->et_area_valvular = $request->et_area_valvular;
        $renaval->et_etiologia = $request->et_etiologia;
        $renaval->et_severidad = $request->et_severidad;
        $renaval->it_numero_velos = $request->it_numero_velos;
        $renaval->it_jet = $request->it_jet;
        $renaval->it_vena_contracta = $request->it_vena_contracta;
        $renaval->it_ore = $request->it_ore;
        $renaval->it_velocidad_maxima = $request->it_velocidad_maxima;
        $renaval->it_gradiente_maxima = $request->it_gradiente_maxima;
        $renaval->it_tipoetiologia = $request->it_tipoetiologia;
        $renaval->it_tipoetiologia_secund = $request->it_tipoetiologia_secund;
        $renaval->it_volumen_regurgitante = $request->it_volumen_regurgitante;
        $renaval->it_severidad = $request->it_severidad;
        $renaval->it_psap_estimada = $request->it_psap_estimada;
        $renaval->it_anillo = $request->it_anillo;
        $renaval->it_metodo_eval_anillo = $request->it_metodo_eval_anillo;
        $renaval->ep_velocidad_maxima = $request->ep_velocidad_maxima;
        $renaval->ep_gradiente_media = $request->ep_gradiente_media;
        $renaval->ep_area_valvular = $request->ep_area_valvular;
        $renaval->ep_etiologia = $request->ep_etiologia;
        $renaval->ep_severidad = $request->ep_severidad;
        $renaval->ip_vena_contracta = $request->ip_vena_contracta;
        $renaval->ip_etiologia = $request->ip_etiologia;
        $renaval->ip_severidad = $request->ip_severidad;
        $renaval->ip_anillo = $request->ip_anillo;
        $renaval->ip_metodo_eval_anillo = $request->ip_metodo_eval_anillo;
        $renaval->volumen_auricula_izquierda = $request->volumen_auricula_izquierda;
        $renaval->area_auricula_derecha = $request->area_auricula_derecha;
        $renaval->vi_diametro_telesistolico = $request->vi_diametro_telesistolico;
        $renaval->vi_volumen_telediastolico = $request->vi_volumen_telediastolico;
        $renaval->vi_volumen_telesistolico = $request->vi_volumen_telesistolico;
        $renaval->vi_masa = $request->vi_masa;
        $renaval->vi_remodelamiento = $request->vi_remodelamiento;
        $renaval->vi_fraccion_eyeccion_simpson = $request->vi_fraccion_eyeccion_simpson;
        $renaval->vd_base = $request->vd_base;
        $renaval->vd_porcion_media = $request->vd_porcion_media;
        $renaval->vd_longitud = $request->vd_longitud;
        $renaval->vd_dilatado = $request->vd_dilatado;
        $renaval->vd_tapse = $request->vd_tapse;
        $renaval->vd_fraccion_acortamiento = $request->vd_fraccion_acortamiento;
        $renaval->rda_union = $request->rda_union;
        $renaval->rda_senos = $request->rda_senos;
        $renaval->rda_anillo = $request->rda_anillo;
        $renaval->rda_aorta_ascendente = $request->rda_aorta_ascendente;
        $renaval->cci_fecha = $request->cci_fecha;
        $renaval->cci_severidad = $request->cci_severidad;
        $renaval->lesion_cd = $request->lesion_cd;
        $renaval->lesion_tci = $request->lesion_tci;
        $renaval->lesion_ada = $request->lesion_ada;
        $renaval->lesion_cx = $request->lesion_cx;
        $renaval->lesion_diagonal = $request->lesion_diagonal;
        $renaval->lesion_marginal = $request->lesion_marginal;
        $renaval->lesion_descen_posterior = $request->lesion_descen_posterior;
        $renaval->ccd_fecha = $request->ccd_fecha;
        $renaval->ccd_presartesis_pulmonar = $request->ccd_presartesis_pulmonar;
        $renaval->ccd_psap_cardercho = $request->ccd_psap_cardercho;
        $renaval->ccd_resis_pulmonar = $request->ccd_resis_pulmonar;
        $renaval->ccd_presart_medpulmunar = $request->ccd_presart_medpulmunar;
        $renaval->ccd_hiper_pulmonar = $request->ccd_hiper_pulmonar;
        $renaval->ccd_diag_hipertension = $request->ccd_diag_hipertension;
        $renaval->ccd_presion_capilar_pulmonar = $request->ccd_presion_capilar_pulmonar;
        $renaval->ccd_diam_vi_diastole = $request->ccd_diam_vi_diastole;
        $renaval->ccd_diam_vi_sistole = $request->ccd_diam_vi_sistole;
        $renaval->fecha_intervencion = $request->fecha_intervencion;
        $renaval->valvulas_tratadas = $request->valvulas_tratadas;
        $renaval->tratamiento = $request->tratamiento;
        $renaval->reparacion = $request->reparacion;
        $renaval->valvula_reparada = $request->valvula_reparada;
        $renaval->dispositivos = $request->dispositivos;
        $renaval->valvula_trat_dispositivo = $request->valvula_trat_dispositivo;
        $renaval->protesis = $request->protesis;
        $renaval->valvula_tratada_protesis = $request->valvula_tratada_protesis;
        $renaval->otros_procedquirurgicos = $request->otros_procedquirurgicos;
        $renaval->interv_tipodispusado = $request->interv_tipodispusado;
        $renaval->medicacion_ieca = $request->medicacion_ieca;
        $renaval->medicacion_ara = $request->medicacion_ara;
        $renaval->medicacion_betabloqueador = $request->medicacion_betabloqueador;
        $renaval->medicacion_digoxina = $request->medicacion_digoxina;
        $renaval->medicacion_estatinas = $request->medicacion_estatinas;
        $renaval->medicacion_diureticos = $request->medicacion_diureticos;
        $renaval->medicacion_calcio_antagonista = $request->medicacion_calcio_antagonista;
        $renaval->medicacion_dabigatran = $request->medicacion_dabigatran;
        $renaval->medicacion_warfarina = $request->medicacion_warfarina;
        $renaval->medicacion_acido_acetil_salicilico = $request->medicacion_acido_acetil_salicilico;
        $renaval->medicacion_otro = $request->medicacion_otro;
        $renaval->inmediatas = $request->inmediatas;
        $renaval->tardias = $request->tardias;
        $renaval->muerte_general = $request->muerte_general;
        $renaval->muerte_cardiovascular = $request->muerte_cardiovascular;
        $renaval->fechademuerte = $request->fechademuerte;
        $renaval->hospitalizacion = $request->hospitalizacion;
        $renaval->tiempo_hospitalizacion = $request->tiempo_hospitalizacion;
        $renaval->fecha_hospitalizacion = $request->fecha_hospitalizacion;
        $renaval->status = 'Activo';
        $renaval->save();

        return redirect()->route('renaval.index')->with('success', 'Renaval creado correctamente');

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
