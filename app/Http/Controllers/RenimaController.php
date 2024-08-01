<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renima;

class RenimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $data = [
            'category_name' => 'renima',
            'page_name' => 'renima_index',
        ];

        //if auth user is admin, show all renimas
        if (\Auth::user()->hasRole('admin')) {
            //join users table to get user (trato, name, lastname) as responsable
            $renimas = Renima::join('users', 'renimas.user_id', '=', 'users.id')
                ->select('renimas.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('renimas.status', 'Activo')
                ->get();

        } else {
            //join users table to get user (trato, name, lastname) as responsable
            $renimas = Renima::join('users', 'renimas.user_id', '=', 'users.id')
                ->select('renimas.*', 'users.trato', 'users.name', 'users.lastname')
                ->where('renimas.user_id', auth()->user()->id)
                ->where('renimas.status', 'Activo')
                ->get();
            
        }

        return view('pages.renima.index')->with($data)->with('renimas', $renimas);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'renima',
            'page_name' => 'renima_create',
        ];

        return view('pages.renima.create')->with($data);
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
