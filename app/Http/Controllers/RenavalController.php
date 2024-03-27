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
