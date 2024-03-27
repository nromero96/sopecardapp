<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renaval;
use App\Models\User;
use App\Models\Repecca;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'category_name' => 'home',
            'page_name' => 'home_index',
        ];

        //contar para admin
        if (\Auth::user()->hasRole('admin')) {
            $cant_usuarios = User::count();
            $cant_repeccas = Repecca::where('status', 'Activo')->count();
            $cant_renavals = Renaval::where('status', 'Activo')->count();

        } else {
            $cant_usuarios = 0;
            $cant_repeccas = Repecca::where('user_id', auth()->user()->id)->where('status', 'Activo')->count();
            $cant_renavals = Repecca::where('user_id', auth()->user()->id)->where('status', 'Activo')->count();
        }

        return view('home')->with($data)->with('cant_usuarios', $cant_usuarios)->with('cant_repeccas', $cant_repeccas)->with('cant_renavals', $cant_renavals);
    }
}
