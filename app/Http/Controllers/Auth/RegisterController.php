<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'trato' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'sede' => ['nullable', 'string', 'max:255'],
            'registro' => ['required', 'string', 'max:255'],
            'is_acept_terms' => ['required', 'boolean'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'trato' => $data['trato'],
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'sede' => $data['sede'],
        ]);

        // syncRoles 2 = medico
        $user->syncRoles(2);

        //assign permissions
        if($data['registro'] == 'REPECCA'){
            $user->syncPermissions(['dashboard.index', 'repecca.create', 'repecca.destroy', 'repecca.edit', 'repecca.index']);
        }else if($data['registro'] == 'RENAVAL'){
            $user->syncPermissions(['dashboard.index', 'renaval.create', 'renaval.destroy', 'renaval.edit', 'renaval.index']);
        }else if($data['registro'] == 'RENIMA'){
            $user->syncPermissions(['dashboard.index', 'renima.create', 'renima.destroy', 'renima.edit', 'renima.index']);
        }else if($data['registro'] == 'INPER-HP'){
            $user->syncPermissions(['dashboard.index', 'pulmonary-hypertension.create', 'pulmonary-hypertension.destroy', 'pulmonary-hypertension.edit', 'pulmonary-hypertension.index']);
        }else{
            $user->syncPermissions(['dashboard.index']);
        }

        return $user;

    }
}
