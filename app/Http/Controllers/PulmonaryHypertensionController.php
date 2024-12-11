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
        //
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
